<template>
    <div class="container">
        <div class="row pt-3" v-if="$gate.isAdmin()">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">List of the Counties</h3>

                <div class="card-tools">
					         <button class="btn btn-sm btn-primary" @click="newModal">Add County</button>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body table-responsive p-0">
                <table class="table table-hover">
                  <thead>
                    <tr>
                      <th>County Name</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr v-for="counties in county" :key="county.id">
                      <td>{{counties.name}}</td>
                      <td>
                      	<a href="#" @click="editModal(counties)">
                      		<i class="fa fa-edit p-1 text-primary"></i>
                      	</a>
                      	<a href="#" @click="deleteCounty(counties.id)">
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
        				<h5 v-show="!editMode" class="modal-title" id="addnewLabel">Add County</h5>
                <h5 v-show="editMode" class="modal-title" id="addnewLabel">Edit County</h5>
        				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
        				<span aria-hidden="true">&times;</span>
        				</button>
        			</div>
        			<form @submit.prevent="editMode ? updateCounty() : addCounty()">
        			<div class="modal-body">
        				<div class="form-group">
        			      <label>County Name</label>
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
        county:{},
				form: new Form({
          id:'',
					name: '',
				})
			}
		},
        created() {
            this.loadCounty();
            Fire.$on('entry', () => {
                this.loadCounty();
            });
        },
        methods: {
			addCounty(){
				this.$Progress.start();
				this.form.post('api/county')
					.then(()=>{
					    Fire.$emit('entry');
					    $('#addnew').modal('hide');
					    Toast.fire({
					        type: 'success',
					        title: 'County created successfully'
					    });
					    this.$Progress.finish();
					})
					.catch(()=>{
            this.$Progress.fail();
					});
			},
			loadCounty(){
                if (this.$gate.isAdmin()) {
                    axios.get("api/county").then(({data}) => (this.county = data));
                }
			},
			deleteCounty(id){
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
            this.form.delete("api/county/"+id).then(()=>{
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
      newModal(){
        this.editMode = false;
        this.form.reset();
        $('#addnew').modal('show');
      },
      editModal(counties){
        this.editMode = true;
        this.form.reset();
        $('#addnew').modal('show');
        this.form.fill(counties);
      },
      updateCounty(){
        this.$Progress.start();
        this.form.put('api/county/'+this.form.id)
          .then(()=>{
            $('#addnew').modal('hide');
            swal(
              'Updated!',
              'Your County has been updated.',
              'success'
              )
            this.$Progress.finish();
            Fire.$emit('entry');
          })
          .catch(()=>{
            this.$Progress.fail();
          })
        console.log('I can edit');
      }
		},
    }
</script>

<style>

</style>
