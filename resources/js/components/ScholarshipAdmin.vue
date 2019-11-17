<template>
    <div class="container-fluid">
        <div class="row mt-5" v-if="$gate.isSubadminOrOfficial()">

            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Scholarships</h3>

                        <div class="card-tools">
                            <div class="row">

                                <div class="col-sm-5" v-if="$gate.isOfficial()">

                                </div><!--<form>
                                        <select @change="getType()" v-model="form.type" class="form-control">
                                            <option selected value="">&#45;&#45;Sort By&#45;&#45;</option>
                                            <option value="1">All</option>
                                            <option value="2">Pending</option>
                                            <option value="3">Awarded</option>
                                            <option value="4">Rejected</option>
                                        </select>
                                    </form>-->
<!--                                <div class="col-sm-5" v-if="$gate.isOfficial()">-->
<!--                                    <form>-->
<!--                                        <select @change="getType()" v-model="form.type" class="form-control">-->
<!--                                            <option selected value="">&#45;&#45;Sort By&#45;&#45;</option>-->
<!--                                            <option value="1">All</option>-->
<!--                                            <option value="2">Pending</option>-->
<!--                                            <option value="3">Awarded</option>-->
<!--                                            <option value="4">Rejected</option>-->
<!--                                        </select>-->
<!--                                    </form>-->
<!--                                </div>-->

                                <div class="col-sm-12" v-if="$gate.isSubadmin()">
                                    <button @click="recommended" class="btn btn-success btn-sm">Recommended</button>
                                    <button @click="rejected" class="btn btn-danger btn-sm">Rejected</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body table-responsive no-padding">
                        <table class="table table-hover">
                            <tbody>
                            <tr>
                                <th>Serial N.o</th>
                                <th>First Name</th>
                                <th>Last Name</th>
                                <th>Gender</th>
                                <th>Status</th>
                                <th>Type</th>
                                <th>View More</th>

                            </tr>
                            <tr v-for="application in applications.data" :key="application.id">
                                <td>{{application.serial}}</td>
                                <td>{{application.firstName}}</td>
                                <td>{{application.lastName}}</td>
                                <td>{{application.gender}}</td>
                                <td>
                                    <span v-if="application.status==1" style="color: purple;">Recommended.({{application.recommendation}})</span>
                                    <span v-if="application.status==0" style="color: purple;">Pending...</span>
                                    <span v-if="application.status==2" style="color: red;">Rejected</span>
                                </td>
                                <td>{{application.bursary_type}}</td>
                                <td>
                                    <router-link :to="{path:'/scholarship-admin-details/'+ application.id}" type="button"
                                                 class="btn btn-primary btn-sm">view
                                    </router-link>
                                </td>

                            </tr>


                            </tbody>
                        </table>
                    </div>
                    <!-- /.box-body -->
                    <div class="card-footer">
                        <!-- <pagination :data="users" @pagination-change-page="getResults"></pagination> -->
                    </div>
                </div>
                <!-- /.box -->
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        name: "ScholarshipAdmin",
        data(){
            return{
                applications: {}
            }
        },
        methods:{
            rejected(){
                if (this.$gate.isSubadmin()) {
                    axios.get('api/scholarshipRej').then(({data}) => ([this.applications = data]));
                }
            },
            recommended(){
                if (this.$gate.isSubadmin()) {
                    axios.get('api/scholarshipRec').then(({data}) => ([this.applications = data]));
                }
            },
            getApplications(){
                if (this.$gate.isSubadminOrOfficial()) {
                    axios.get('api/scholarshipApps').then(({data}) => ([this.applications = data]));
                }
            }
        },
        created() {
           this.getApplications();
        }
    }
</script>

<style scoped>

</style>
