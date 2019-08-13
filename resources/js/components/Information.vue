<template>
    <div class="container">
        <div class="row mt-5"  v-if="$gate.isSubadmin()">

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
                                <td>
                                    <span v-if="application.status==0">Pending...</span>
                                    <span v-if="application.status==2" style="color: red;">Rejected</span>
                                    <span v-if="application.status==1">Sent</span>
                               </td>
                                <td><router-link to="/informationview" type="button" class="btn btn-primary">view</router-link></td>
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


            }
        },
        methods:{
            getApplications(){
                if (this.$gate.isSubadmin()) {
                    axios.get('api/getapplications').then(({data}) => ([this.applications = data['applications']]));
                }
            }
        },


        created() {
            //setInterval(() => this.loadUsers(), 3000);
            this.getApplications();
        }
    }
</script>
