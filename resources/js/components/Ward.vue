<template>
    <div class="container">
        <div class="row pt-3"  v-if="$gate.isAdmin()">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Add wards to each county</h3>

                <div class="card-tools">
                  <button class="btn btn-sm btn-primary" @click="newModal">Add Ward</button>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body table-responsive p-0">
                <table class="table table-hover">
                  <thead>
                    <tr>
                      <th>County</th>
                      <th>Ward</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr v-for="wards in ward.data">
                      <td>{{wards.county.name}}</td>
                      <td>{{wards.name}}</td>
                      <td>
                          <a href="#" @click="editModal(wards)">
                            <i class="fa fa-edit p-1 text-primary"></i>
                          </a>
                          <a href="#" @click="deleteWard(wards.id)">
                            <i class="fa fa-trash p-1 text-danger"></i>
                          </a>
                      </td>
                    </tr>
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
                <div class="card-footer">
                    <pagination :data="ward" @pagination-change-page="getResults"></pagination>
                </div>
            </div>
            <!-- /.card -->
          </div>
        </div>
        <!-- Modal -->
        <div class="modal fade" id="addnew" tabindex="-1" role="dialog" aria-labelledby="addnewLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 v-show="!editMode" class="modal-title" id="addnewLabel">Add Ward</h5>
                <h5 v-show="editMode" class="modal-title" id="addnewLabel">Edit Ward</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form @submit.prevent="editMode ? updateWard() : addWard()">
                    <div class="modal-body">

                        <div class="form-group">
                          <label>Select County</label>
                          <select name="county_id" v-model="form.county_id" class="form-control" :class="{'is-invalid': form.errors.has('county_id')}"  id="county_id">
                            <option v-for="krymes in kryme" :key="krymes.id" :value="krymes.id"> {{krymes.name}}</option>
                          </select>
                          <has-error :form="form" field="bio"></has-error>
                        </div>
                        <div class="form-group">
                          <label>Ward Name</label>
                          <input v-model="form.name" type="text" name="name"
                            placeholder="Enter County"
                            class="form-control" :class="{ 'is-invalid': form.errors.has('name') }">
                          <has-error :form="form" field="name"></has-error>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                        <button v-show="!editMode" type="submit" class="btn btn-success">Create</button>
                        <button v-show="editMode" type="submit" class="btn btn-primary">Update</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        data(){
            return{
                editMode:false,
                ward:{},
                kryme:{},
                county:{},
                form: new Form({
                    id:'',
                    county_id: '',
                    name: '',
                })
            }
        },
        methods: {
            getResults(page = 1) {
                axios.get('api/ward?page=' + page)
                    .then(response => {
                        this.ward = response.data;
                    });
            },
            newModal(){
              this.editMode = false;
              this.form.reset();
              $('#addnew').modal('show');
            },
            addWard(){
                this.$Progress.start();
                this.form.post('api/ward')
                    .then(()=>{
                        Fire.$emit('entry');
                        $('#addnew').modal('hide');
                        toast.fire({
                            type: 'success',
                            title: 'Ward created successfully'
                        });
                        this.$Progress.finish();
                    })
                    .catch(()=>{
                        this.$Progress.fail();
                    });
            },
            loadWard(){
                if (this.$gate.isAdmin()) {
                    axios.get("api/ward").then(({data}) => (this.ward = data));
                    axios.get("api/kryme").then(({data}) => (this.kryme = data));
                }
            },
            editModal(wards){
                this.editMode = true;
                this.form.reset();
                $('#addnew').modal('show');
                this.form.fill(wards);
            },
            updateWard(){
              this.$Progress.start();
              this.form.put('api/ward/'+this.form.id)
                .then(()=>{
                  $('#addnew').modal('hide');
                  swal(
                    'Updated!',
                    'Your Ward has been updated.',
                    'success'
                    )
                  this.$Progress.finish();
                  Fire.$emit('entry');
                })
                .catch(()=>{
                  this.$Progress.fail();
                })
              console.log('I can edit');
            },
            deleteWard(id){
                Swal.fire({
                  title: 'Are you sure?',
                  text: "You won't be able to revert this!",
                  //type: 'warning',
                  showCancelButton: true,
                  confirmButtonColor: '#3085d6',
                  cancelButtonColor: '#d33',
                  confirmButtonText: 'Yes, delete it!'
                }).then((result) => {
                  if(result.value){
                    this.form.delete("api/ward/"+id).then(()=>{
                      swal(
                        'Delete!',
                        'Your file has been deleted.',
                        'success'
                        )
                            Fire.$emit('entry');
                        }).catch(()=>{
                      swal('Failed!','There was something wrong')
                    });
                    }
                })
            },

        },

        created() {
            Fire.$on('searching', ()=>{
                let query = this.$parent.search;
                axios.get('api/findWard?q=' + query)
                    .then((data)=>{
                        this.ward = data.data;
                    })
                    .catch(()=>{

                    })
            })
            this.loadWard();
            Fire.$on('AfterCreate', () =>{
                this.loadWard();
            })
            //setInterval(() => this.loadUsers(), 3000);
        },

    }
</script>
