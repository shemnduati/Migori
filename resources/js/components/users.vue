<template>
    <div class="container">
        <div class="row mt-5" v-if="$gate.isAdmin()">

            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">User Table</h3>
                        <div class="card-tools">
                        </div>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body table-responsive no-padding">
                        <table class="table table-hover">
                            <tbody><tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Type</th>
                                <th>Registered At</th>
                                <th>Modify</th>
                            </tr>
                            <tr v-for="user in users.data" :key="user.id">
                                <td>{{user.id}}</td>
                                <td>{{user.name}}</td>
                                <td>{{user.email}}</td>
                                <td>{{user.role | upText}}</td>
                                <td>{{user.created_at | myDate}}</td>
                                <td>
                                    <a href="#" @click="deleteUser(user.id)">
                                        <i class="fa fa-trash red"></i>
                                    </a>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                    <!-- /.box-body -->
                    <div class="card-footer">
                        <pagination :data="users" @pagination-change-page="getResults"></pagination>
                    </div>
                </div>
                <!-- /.box -->
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
                form: new Form({
                    id:'',
                    name:'',
                    email: '',
                    phone: '',
                    password:'',
                    type:'',
                    boi:'',
                    photo:''
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
                        swal.fire(
                            'Edited!',
                            'User information updated.',
                            'success'
                        )
                        this.$Progress.finish();
                        Fire.$emit('AfterCreate');
                    })
                    .catch(()=>{
                        this.$Progress.fail();

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
                    confirmButtonText: 'Yes, delete it!'
                }).then((result) => {
                    // send the request to the controller
                    if (result.value) {
                        this.form.delete('api/user/'+ id).then(()=>{

                            Swal.fire(
                                'Deleted!',
                                'Your file has been deleted.',
                                'success'
                            )
                            Fire.$emit('AfterCreate');

                        });
                    }
                }).catch(()=>{
                    swal("Failed!", "There was something wrong.", "warning");
                })
            },
            loadUsers(){
                if (this.$gate.isAdmin()){
                    axios.get("api/user").then(({ data }) => (this.users = data));
                }

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
