<template>
    <div class="container">
        <router-link to="/dashboard" class="fas fa-arrow-circle-left pull-left">back </router-link><br>
        <h3 class="justify-content-center mt-5">Summary of Scholarship Applications</h3>
                        <div class="row mt-5">
                            <div class="col-sm-4" v-for="ward in wards" :key="ward.id">
                            <div class="card card-widget widget-user">
                                <!-- Add the bg color to the header using any of the bg-* classes -->
                                <div class="widget-user-headers bg-info">
                                    <h3 class="widget-user-username">{{ward.name}} Ward</h3>
                                </div>
                                <div class="card-footer">
                                    <div class="row">
                                        <div class="col-sm-4 border-right">
                                            <div class="description-block">
                                                <h5 class="description-header">{{ward.total}}</h5>
                                                <span class="description-text">Total</span>
                                            </div>
                                            <!-- /.description-block -->
                                        </div>
                                        <!-- /.col -->
                                        <div class="col-sm-4 border-right">
                                            <div class="description-block">
                                                <h5 class="description-header">{{ward.awarded}}</h5>
                                                <span class="description-text">Awarded</span>
                                            </div>
                                            <!-- /.description-block -->
                                        </div>
                                        <!-- /.col -->
                                        <div class="col-sm-4">
                                            <div class="description-block">
                                                <h5 class="description-header">{{ward.rejected}}</h5>
                                                <span class="description-text">Rejected</span>
                                            </div>
                                            <!-- /.description-block -->
                                        </div>
                                        <!-- /.col -->
                                    </div>
                                    <!-- /.row -->
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
                wards:{}
            }
        },

        methods : {
            getWards(){
                axios.get("/api/MyWardz").then(({data}) => ([this.wards = data['parent']]));
            }
        },
        created() {
            this.getWards();
        }
    }
</script>
<style>
    .widget-user-headers {
        background-position: center center;
        background-size: cover;
        padding: 15px;
        height: 90px !important

    }
</style>
