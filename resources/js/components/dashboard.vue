<template>
    <div class="container">
        <div class="row justify-content-center"  v-if="$gate.isAccepted()">
            <div class="col-md-12">
                <div class="row mt-5">
                    <div class="col-lg-3 col-6" v-if="$gate.isAdmin()">
                        <!-- small box -->
                        <div class="small-box bg-info">
                            <div class="inner">
                                <h3>{{dash['total_student']}}</h3>

                                <p>Students</p>
                            </div>
                            <div class="icon">
                                <i class="fas fa-user-graduate white"></i>
                            </div>

                        </div>
                    </div>
                    <!-- ./col -->
                    <div class="col-lg-3 col-6" v-if="$gate.isAdmin()">
                        <!-- small box -->
                        <div class="small-box bg-success">
                            <div class="inner">
                                <h3>{{dash['total_subadmin']}}</h3>
                                <p>Sub-admins</p>
                            </div>
                            <div class="icon">
                                <i class="fas fa-user-tie white"></i>
                            </div>

                        </div>
                    </div>
                    <!-- ./col -->
                    <div class="col-lg-3 col-6" v-if="$gate.isAdmin() || $gate.isSubadmin()" >
                        <!-- small box -->
                        <div class="small-box bg-warning"  >
                            <div class="inner">
                                <h3>{{dash['total_application']}}</h3>
                                <span>Bursary</span><br>
                                <span>Applications</span>
                            </div>
                            <div class="icon">
                                <i class="fas fa-file-signature white"></i>
                            </div>
                        </div>
                    </div>
                    <!-- ./col -->
                    <div class="col-lg-3 col-6"  v-if="$gate.isAdmin() || $gate.isSubadmin()">
                        <!-- small box -->
                        <div class="small-box bg-danger white" >
                            <div class="inner">
                                <h3>{{dash['total_awarded']}}</h3>

                                <span>Awarded</span><br>
                                <span>Bursaries</span>
                            </div>
                            <div class="icon">
                                <i class="fas fa-award white"></i>
                            </div>
                        </div>
                    </div>
                    <!-- ./col -->
                    <div class="col-lg-3 col-6" v-if="$gate.isSubadmin()">
                        <!-- small box -->
                        <div class="small-box bg-danger white" >
                            <div class="inner">
                                <h3>{{dash['total_recommended']}}</h3>

                                <span>Recommended</span><br>
                                <span>Bursaries</span>
                            </div>
                            <div class="icon">
                                <i class="fas fa-award white"></i>
                            </div>
                        </div>
                    </div>
                    <!-- ./col -->
                    <div class="col-lg-3 col-6" v-if="$gate.isSubadmin()">
                        <!-- small box -->
                        <div class="small-box bg-success">
                            <div class="inner">
                                <h3>{{dash['budget']}}</h3>

                                <p>Ward's Budget(Ksh)</p>
                            </div>
                            <div class="icon">
                                <i class="fas fa-dollar-sign white"></i>
                            </div>

                        </div>
                    </div>
                    <div class="col-lg-3 col-6" v-if="$gate.isSubadmin()">
                        <!-- small box -->
                        <div class="small-box bg-danger white">
                            <div class="inner">
                                <h3>{{dash['remaining']}}</h3>

                                <p>Remaining(Ksh)</p>
                            </div>
                            <div class="icon">
                                <i class="fas fa-coins white"></i>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-6" v-if="$gate.isSubofficial()">
                        <!-- small box -->
                        <div class="small-box bg-success white">
                            <div class="inner">
                                <h3>{{dash['total_County_applicants']}}</h3><br>
                                <p>Total county Applications</p>
                            </div>
                            <div class="icon">
                                <i class="fas fa-users fa-2x white"></i>
                            </div>
                            <router-link to="/CountyApps" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></router-link>
                        </div>
                    </div>
                    <div class="col-lg-6 col-6" v-if="$gate.isSubofficial()">
                        <!-- small box -->
                        <div class="small-box bg-warning white">
                            <div class="inner">
                                <h3>{{dash['total_scholarship_applicants']}}</h3><br>
                                <p>Total Scholarship Applications</p>
                            </div>
                            <div class="icon">
                                <i class="fas fa-users white"></i>
                            </div>
                            <router-link to="/ScholarshipApps" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></router-link>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        data(){
            return{
                dash:{},
            }
        },
        methods: {

            loadUsers() {
                if (this.$gate.isAdmin()) {
                    axios.get("api/dashboard").then(({data}) => ([this.dash = data['data']]));
                }
                if (this.$gate.isSubadmin()) {
                    axios.get("api/dash").then(({data}) => ([this.dash = data['data']]));
                }
                if (this.$gate.isSubofficial()) {
                    axios.get("api/total").then(({data}) => ([this.dash = data['data']]));
                }
            },
        },
        created() {
            this.loadUsers();
        }
    }
</script>
