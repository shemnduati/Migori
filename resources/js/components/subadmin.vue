<template>
    <div class="container">
        <div class="row mt-5">

            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Sub-Admin Table</h3>
                        <div class="card-tools">
                            <button class="btn btn-success" @click="newModal">Add new user<i class="fa fa-user-plus fa-fw"></i></button>
                        </div>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body table-responsive no-padding">
                        <table class="table table-hover">
                            <tbody><tr>
                                <th>id</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Role</th>
                                <th>Ward</th>
                                <th>Registered At</th>
                                <th>Modify</th>
                            </tr>
                            <tr v-for="user in users" :key="user.id">
                                <td>{{user.id}}</td>
                                <td>{{user.name}}</td>
                                <td>{{user.email}}</td>
                                <td>{{user.role | upText}}</td>
                                <td>{{user.ward}}</td>
                                <td>{{user.reg | myDate}}</td>
                                <td>
                                    <a href="#" @click="editModal(user)" >
                                        <i class="fa fa-edit teal"></i>
                                    </a>
                                    <a href="#" @click="deleteUser(user.id)">
                                        <i class="fa fa-trash red"></i>
                                    </a>
                                </td>
                            </tr>



                            </tbody></table>
                    </div>
                    <!-- /.box-body -->
                    <div class="card-footer">
<!--                        <pagination :data="users" @pagination-change-page="getResults"></pagination>-->
                    </div>
                </div>
                <!-- /.box -->
            </div>
        </div>
        <!-- Modal -->
        <div class="modal fade" id="addnew" tabindex="-1" role="dialog" aria-labelledby="addnew" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content ">
                    <div class="modal-header">
                        <h5 class="modal-title" v-show="!editMode" id="addnew">Add user</h5>
                        <h5 class="modal-title" v-show="editMode" id="addnew">Update User info</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form @submit.prevent="editMode ? updateUser() :createUser()">
                        <div class="modal-body">
                            <div class="form-group">
                                <input v-model="form.name" type="text" name="name" placeholder="Name"
                                       class="form-control" :class="{ 'is-invalid': form.errors.has('name') }">
                                <has-error :form="form" field="name"></has-error>
                            </div>
                            <div class="form-group">
                                <input v-model="form.email" type="email" name="email" placeholder="Email"
                                       class="form-control" :class="{ 'is-invalid': form.errors.has('email') }">
                                <has-error :form="form" field="email"></has-error>
                            </div>
                            <div class="form-group">
                                <select name="pastor" v-model="form.ward" id="ward" class="form-control" :class="{ 'is-invalid': form.errors.has('ward') }">
                                    <option value="">Allocate ward to Sub-Admin</option>
                                    <option v-for="ward in wards" :key="ward.id" :value="ward.id">{{ward.name}}</option>
                                </select>
                                <has-error :form="form" field="ward"></has-error>
                            </div>

                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                            <button v-show="editMode" type="submit" class="btn btn-primary">Edit</button>
                            <button v-show="!editMode" type="submit" class="btn btn-primary">Add user</button>
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
                editMode: false,
                users :{},
                wards:{},
                form: new Form({
                    id:'',
                    name:'',
                    email: '',
                    ward:'',
                })


            }
        },
        methods:{
            getResults(page = 1) {
                axios.get('api/user?page=' + page)
                    .then(response => {
                        this.users = response.data;
                    });
            },
            updateUser(){
                this.$Progress.start();
                this.form.put('api/user/'+this.form.id)
                    .then(()=>{
                        $('#addnew').modal('hide');
                        Swal.fire(
                            'Edited!',
                            'User information updated.',
                            'success'
                        )
                        this.$Progress.finish();
                        Fire.$emit('AfterCreate');
                    })
                    .catch(()=>{
                        this.$Progress.fail();
                        Swal.fire("Failed to Edit!", "Check if you have permission to Edit.");
                    })
            },
            editModal(user){
                this.editMode = true;
                this.form.reset();
                this.form.fill(user);
                $('#addnew').modal('show');
            },
            newModal(){
                this.editMode = false;
                this.form.reset();
                $('#addnew').modal('show');
            },
            deleteUser(id){
                Swal.fire({
                    title: 'Are you sure?',
                    text: "You won't be able to revert this!",
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, delete it!',
                }).then((result) => {
                    // send the request to the controller
                    if (result.value) {
                        this.form.delete('api/user/'+ id).then(()=>{

                            Swal.fire(
                                'Deleted!',
                                'Your file has been deleted.',
                                'success'
                            )
                            this.$Progress.finish();
                            Fire.$emit('AfterCreate');
                        })
                    }
                }).catch(()=>{
                    this.$Progress.fail();
                    Swal.fire("Failed to Delete!", "There was something wrong.");
                })
            },
            loadUsers(){
                    axios.get("api/subadmin").then(({ data }) => (this.users = data['parent']));
                    axios.get("api/wards").then(({ data }) => (this.wards = data));
            },
            createUser(){
                this.$Progress.start();
                this.form.post('api/user')
                    .then(() => {
                        Fire.$emit('AfterCreate');
                        $('#addnew').modal('hide')
                        toast.fire({
                            type: 'success',
                            title: 'User Created in successfully'
                        })
                        this.$Progress.finish();
                    })
                    .catch(() => {
                        Swal.fire("Failed to Create new user!", "There was something wrong.");
                    })
            }
        },


        created() {
            Fire.$on('searching', ()=>{
                let query = this.$parent.search;
                axios.get('api/findUser?q=' + query)
                    .then((data)=>{
                        this.users = data.data;
                    })
                    .catch(()=>{

                    })
            })
            this.loadUsers();
            Fire.$on('AfterCreate', () =>{
                this.loadUsers();
            })
            //setInterval(() => this.loadUsers(), 3000);
        }
    }
</script>
