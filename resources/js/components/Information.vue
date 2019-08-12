<template>
    <div class="container">
        <div class="row mt-5">

            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">information Table</h3>

                        <div class="card-tools">
                        </div>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body table-responsive no-padding">
                        <table class="table table-hover">
                            <tbody><tr>
                                
                                <th>Name</th>
                                <th>Gender</th>
                                <th>Status</th>
                                <th>View to Send</th>
                                <th>Type</th>
                                
                            </tr>
                            <tr v-for="application in applications" :key="application.id">
                               
                                <td>{{application.name}}</td>
                                <td>{{application.gender}}</td>
                                <td>{{application.status}}</td>
                                <td><a href=""></a>view</td>
                                <td>{{application.bursary_type}}</td>
                              
                            </tr>



                            </tbody></table>
                    </div>
                    <!-- /.box-body -->
                    <div class="card-footer">
                        <pagination :data="users" @pagination-change-page="getResults"></pagination>
                    </div>
                </div>
                <!-- /.box -->
            </div>
        </div>
        <!-- Modal -->
       
                    
                    <form @submit.prevent="editMode ? updateUser() :createUser()">
                       

                       
                    </form>
               
    </div>
</template>

<script>
    export default {
        data(){
            return{
                editMode: false,
                applications :{},
                form: new Form({
                    id:'',
                    role:'',
                })


            }
        },
        methods:{
            getApplications(){
                axios.get('api/Information').then(({ data }) => ([this.applications = data['applications']]));
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
