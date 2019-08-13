<template>
    <div class="container">
        <div class="row justify-content-center"  v-if="$gate.isAdmin()">
            <div class="col-md-12">
                <div class="row mt-5">
                    <div class="col-lg-3 col-6">
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
                    <div class="col-lg-3 col-6">
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
                    <div class="col-lg-3 col-6">
                        <!-- small box -->
                        <div class="small-box bg-warning">
                            <div class="inner">
                                <h3>{{dash['total_application']}}</h3>
                                <p>Applications</p>
                            </div>
                            <div class="icon">
                                <i class="fas fa-file-signature white"></i>
                            </div>
                        </div>
                    </div>
                    <!-- ./col -->
                    <div class="col-lg-3 col-6">
                        <!-- small box -->
                        <div class="small-box bg-danger white">
                            <div class="inner">
                                <h3>{{dash['total_awarded']}}</h3>

                                <p>Awarded-bursaries</p>
                            </div>
                            <div class="icon">
                                <i class="fas fa-award white"></i>
                            </div>
                        </div>
                    </div>
                    <!-- ./col -->
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
            },
        },
        created() {
            this.loadUsers();
        }
    }
</script>
