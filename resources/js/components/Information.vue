<template>
    <div class="container">
        <div class="row mt-5" v-if="$gate.isSubadminOrOfficial()">

            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Information Table</h3>

                        <div class="card-tools">
                            <div class="row">
                                <div class="col-sm-6">
                                    <form>
                                        <select @change="getType()" v-model="form.type" class="form-control">
                                            <option selected value="">--Sort By--</option>
                                            <option value="1">All</option>
                                            <option value="2">Pending</option>
                                            <option value="3">Sent</option>
                                            <option value="4">Rejected</option>
                                        </select>
                                    </form>
                                </div>
                                <div class="col-sm-6">
                                    <button @click="getBursary('CDF')" class="btn btn-success btn-sm">CDF</button>
                                    <button @click="getBursary('County')" class="btn btn-success btn-sm">County</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body table-responsive no-padding">
                        <table class="table table-hover">
                            <tbody><tr>
                                <th>Serial N.o</th>
                                <th>Name</th>
                                <th>Gender</th>
                                <th>Status</th>
                                <th>View to Send</th>
                                <th>Type</th>

                            </tr>
                            <tr v-for="application in applications" :key="application.id">
                                <td>{{application.serial}}</td>
                                <td>{{application.name}}</td>
                                <td>{{application.gender}}</td>
                                <td>
                                    <span v-if="application.status==0" style="color: purple;">Pending...</span>
                                    <span v-if="application.status==2" style="color: red;">Rejected</span>
                                    <span v-if="application.status==1" style="color: blue;">Sent</span>
                                    <span v-if="application.status==3" style="color: green;">Accepted</span>
                               </td>
                                <td><router-link :to="{path:'/informationview/'+ application.user_id}" type="button" class="btn btn-primary btn-sm">view</router-link></td>
                                <td>{{application.bursary_type}}</td>

                            </tr>



                            </tbody></table>
                    </div>
                    <!-- /.box-body -->
                    <div class="card-footer">
                        <!-- <pagination :data="users" @pagination-change-page="getResults"></pagination> -->
                    </div>
                </div>
                <!-- /.box -->
            </div>
        </div>
        <!-- Modal -->




    </div>
</template>

<script>
    export default {
        data(){
            return{
                applications :{},
                form: new Form({
                   type: ''
                })


            }
        },
        methods:{
            getBursary(type){
               axios.get('api/getbursarytype/' + type).then(({data}) => ([this.applications = data['applications']]));
            },
            getApplications(){
                if (this.$gate.isSubadmin()) {
                    axios.get('api/getbusary').then(({data}) => ([this.applications = data['applications']]));
                }
                if(this.$gate.isOfficial()){
                    axios.get('api/getCountyBursary').then(({data}) => ([this.applications = data['applications']]));
                }
            },
            getType(){
                if (this.$gate.isAdmin()) {
                    axios.get('api/gettype/' + this.form.type).then(({data}) => ([this.applications = data['applications']]));
                }
                if (this.$gate.isSubadmin()) {
                    axios.get('api/getstatus/' + this.form.type).then(({data}) => ([this.applications = data['applications']]));
                }
            }
        },


        created() {
            this.$Progress.start();
            Fire.$on('searching', ()=>{
                this.$Progress.start();
                let query = this.$parent.search;
                axios.get('api/findbursary?q=' + query)
                    .then((data)=>{
                        this.applications = data.data;
                        this.$Progress.finish();
                    })
                    .catch(()=>{

                    })
            })
            this.getApplications();
            Fire.$on('AfterCreate', () =>{
                this.getApplications();
            })
        }
    }
</script>
