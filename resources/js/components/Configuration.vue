<template>
        <div class="container">
            <div class="row pt-3">
              <div class="col-12">
                <div class="card">
                  <div class="card-header">
                    <h3 class="card-title">List of the Counties</h3>

                    <div class="card-tools">
                        <button class="btn btn-sm btn-primary" @click="newModal">Add Year</button>
                    </div>
                  </div>
                  <!-- /.card-header -->
                  <div class="card-body table-responsive p-0">
                    <table class="table table-hover">
                      <thead>
                        <tr>
                          <th>Apllication Year</th>
                          <th>OFF/ON</th>
                          <th>Action</th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr v-for="configurations in configuration" :key="configuration.id">
                          <td>{{configurations.year}}</td>
                            <td>
                            <span class="text-danger font-weight-bolder" v-if="configurations.status == 0">OFF</span>
                            <span class="text-success font-weight-bolder" v-if="configurations.status == 1">ON</span>
                          </td>
                          <td>
                            <a href="#" @click="editModal(configurations)">
                                <i class="fa fa-edit p-1 text-primary"></i>
                            </a>
                            <a href="#" @click="deleteConfiguration(configurations.id)">
                                <i class="fa fa-trash p-1 text-danger"></i>
                            </a>
                          </td>
                        </tr>
                      </tbody>
                    </table>
                  </div>
                  <!-- /.card-body -->
                </div>
                <!-- /.card -->
              </div>
            </div>
            <!-- //Modal -->
            <div class="modal fade" id="addnew" tabindex="-1" role="dialog" aria-labelledby="addnewLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 v-show="!editMode" class="modal-title" id="addnewLabel">Apllication Year</h5>
                            <h5 v-show="editMode" class="modal-title" id="addnewLabel">Edit year</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <form @submit.prevent="editMode ? updateConfiguration() : addConfiguration()">
                        <div class="modal-body">
                            <div class="form-group">
                              <label>Apllication Year</label>
                              <input v-model="form.year" type="text" name="year"
                                placeholder="Enter Year"
                                class="form-control" :class="{ 'is-invalid': form.errors.has('year') }">
                              <has-error :form="form" field="year"></has-error>
                            </div>
                            <div class="form-group">
                                <select name="status" v-model="form.status" id="status" class="form-control"   :class="{ 'is-invalid': form.errors.has('status') }">
                                  <option value="">Select Status</option>
                                  <option value="1">On</option>
                                  <option value="0">Off</option>
                                </select>
                                <has-error :form="form" field="status"></has-error>
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
            configuration:{},
                form: new Form({
                  id:'',
                  year: '',
                  status: ''
                })
            }
        },
        created() {
            this.loadConfiguration();
            Fire.$on('entry', () => {
            this.loadConfiguration();
            });
        },
        methods: {
            addConfiguration(){
                this.$Progress.start();
                this.form.post('api/configuration')
                    .then(()=>{
                        Fire.$emit('entry');
                        $('#addnew').modal('hide');
                        toast.fire({
                            type: 'success',
                            title: 'configuration created successfully'
                        });
                        this.$Progress.finish();
                    })
                    .catch(()=>{
                    this.$Progress.fail();
                        Swal.fire({
                            type: 'error',
                            title: 'Ooops...',
                            text: 'There is an application that is currently running! Ensure you turn it OFF!!',
                        })
                    });
            },
            updateConfiguration(){
              this.$Progress.start();
              this.form.put('api/configuration/'+this.form.id)
                .then(()=>{
                  Fire.$emit('entry');
                  $('#addnew').modal('hide');
                  swal(
                    'Updated!',
                    'Your configuration has been updated.',
                    'success'
                    )
                  this.$Progress.finish();

                })
                .catch(()=>{
                  this.$Progress.fail();
                })
              console.log('I can edit');
            },
            deleteConfiguration(id){
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
                this.form.delete("api/configuration/"+id).then(()=>{
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
            loadConfiguration(){
                if (this.$gate.isAdmin()) {
                    axios.get("api/configuration").then(({data}) => (this.configuration = data));
                }
            },
            newModal(){
                this.editMode = false;
                this.form.reset();
                $('#addnew').modal('show');
            },
            editModal(configuration){
              this.editMode = true;
              this.form.reset();
              $('#addnew').modal('show');
              this.form.fill(configuration);
            }
        },
    }
</script>
