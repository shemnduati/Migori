<template>
    <div class="container">
        <div class="row mt-5" v-if="$gate.isAdminOrOfficial()">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Sub-Admin Table</h3>
                        <div class="card-tools">
                            <button class="btn btn-success" @click="newModal">Add Sub-admin<i class="fa fa-user-plus fa-fw"></i></button>
                        </div>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body table-responsive no-padding">
                        <table class="table table-hover">
                            <tbody><tr>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Role</th>
                                <th>County</th>
                                <th>Ward</th>
                                <th>Registered At</th>
                                <th>Modify</th>
                            </tr>
                            <tr v-for="user in users" :key="user.id">
                                <td>{{user.name}}</td>
                                <td>{{user.email}}</td>
                                <td>{{user.role | upText}}</td>
                                <td>{{user.county}}</td>
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
                            <label for="Name">Full Name</label><span class="text-danger">&#42;</span>
                            <div class="form-group">
                                <input v-model="form.name" type="text" name="name" placeholder="Name"
                                       class="form-control" :class="{ 'is-invalid': form.errors.has('name') }">
                                <has-error :form="form" field="name"></has-error>
                            </div>
                            <div class="form-group">
                                <label for="email">Email</label><span class="text-danger">&#42;</span>
                                <input v-model="form.email" type="email" name="email" placeholder="Email"
                                       class="form-control" :class="{ 'is-invalid': form.errors.has('email') }">
                                <has-error :form="form" field="email"></has-error>
                            </div>
                            <div class="form-group" v-show="editMode">
                                <label for="county">County</label>
                                <input v-model="form.county" type="county" name="county" placeholder="Email" readonly
                                       class="form-control" :class="{ 'is-invalid': form.errors.has('county') }">
                                <has-error :form="form" field="county"></has-error>
                            </div>
                            <!--<div class="form-group">
                                <label for="county">County</label>
                                <select v-model="form.county" @change='getCountyWards()' class="form-control" name="county" id="county" readonly
                                        :class="{ 'is-invalid': form.errors.has('county') }">
                                    <option selected value="">&#45;&#45;Select county&#45;&#45;</option>
                                    <option v-for="county in counties" :key="county.id" :value="county.id">{{ county.name}}</option>
                                </select>
                                <has-error :form="form" field="county"></has-error>
                            </div>-->
                            <div class="form-group">
                                <label for="ward">Ward</label><span class="text-danger">&#42;</span>
                                <select v-model="form.ward" class="form-control" name="ward" id="ward"
                                        :class="{ 'is-invalid': form.errors.has('ward') }">
                                    <option selected value="">--Select Ward--</option>
                                    <option v-for="wardy in wards" :key="wardy.id" :value="wardy.id">{{ wardy.name}}</option>
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
                counties: [],
                form: new Form({
                    id:'',
                    name:'',
                    email: '',
                    ward:'',
                    county:1,
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
                if (this.$gate.isAdmin()){
                    axios.get("api/subadmin").then(({ data }) => (this.users = data['parent']));
                    axios.get("api/wards").then(({ data }) => (this.wards = data));
                }
                if (this.$gate.isOfficial()){
                    axios.get("api/MySubAdmin").then(({ data }) => (this.users = data['parent']));
                    axios.get("api/wards").then(({ data }) => (this.wards = data));
                }
            },
            getCounties(){
                if (this.$gate.isAdmin()){
                    axios.get("api/getcounty").then(({ data }) => ([this.counties = data['counties']]));
                }
                if (this.$gate.isOfficial()){
                    axios.get("api/myCounty").then(({ data }) => ([this.counties = data]));
                }

            },
            getWards(){
                axios.get("api/getward").then(({ data }) => ([this.wards = data['wards']]));
            },
            getCountyWards(){
                axios.get("api/getcountyward/" + this.form.county).then(({ data }) => ([this.wards = data['wards']]));
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
            this.getCounties();
            this.getWards();
            Fire.$on('AfterCreate', () =>{
                this.loadUsers();
                this.getCounties();
                this.getWards();
            })
            //setInterval(() => this.loadUsers(), 3000);
        }
    }
</script>
