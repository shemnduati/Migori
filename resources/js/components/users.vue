<template>
    <div class="container">
        <div class="row mt-5" v-if="$gate.isAdmin()">

            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Users</h3>
                        <div class="card-tools">

                        </div>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body table-responsive no-padding">
                        <vue-good-table
                                        :columns="columns"
                                        :rows="app"
                                        :line-numbers="true"
                                        :pagination-options="{
                   enabled: true,
                   mode: 'pages',
                   perPage: 10
                 }"
                                        :search-options="{
                    enabled: true,
                    placeholder: 'Search this table',
                  }">
                            <template slot="table-row" slot-scope="props">
                                <span v-if="props.column.field == 'action'">
                    <a href="#" @click="deleteUser(user.id)">
                                        <i class="fa fa-trash red"></i>
                                    </a>
                </span>
                            </template>
                        </vue-good-table>
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
                columns: [
                    {
                        label: 'First Name',
                        field: 'name',
                    },
                    {
                        label: 'Last Name',
                        field: 'last_name',
                    },
                    {
                        label: 'Email',
                        field: 'email',
                    },
                    {
                        label: 'Phone',
                        field: 'phone',
                    },
                    {
                        label: 'ID Number',
                        field: 'ID_number',
                    },
                    {
                        label: 'Area of residence',
                        field: 'place',
                    },
                    {
                        label: 'Role',
                        field: 'role',
                    },
                    {
                        label: 'Action',
                        field: 'action',
                    },
                ],
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
        computed: {
            app() {
                    return this.$store.state.user.filter(m => m.role == 'student')
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
            getUsers(){
                this.$store.dispatch('getUsers');
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
            this.getUsers();
            this.loadUsers();
            Fire.$on('AfterCreate', () =>{
                this.loadUsers();
            })
            //setInterval(() => this.loadUsers(), 3000);
        }
    }
</script>
