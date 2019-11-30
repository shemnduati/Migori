<template>
    <div class="container">
        <router-link to="/dashboard" class="fas fa-arrow-circle-left pull-left">back </router-link>
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card mt-5">
                    <div class="card-header">MY Wards County bursaries Applicants</div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-3 col-6" v-for="ward in wards" :key="ward.id">
                                <!-- small box -->
                                <div class="small-box bg-success">
                                    <div class="inner">
                                        <h5>Total Applicants</h5>
                                        <h3>{{ward.total}}</h3>
                                        <p>{{ward.name}}</p>
                                    </div>
                                    <div class="icon">
                                        <i class="fas fa-user-tie white"></i>
                                    </div>
                                </div>
                            </div>
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
                  wards:{}
              }
            },

        methods : {
            getWards(){
                axios.get("/api/MyWards").then(({data}) => ([this.wards = data['parent']]));
            }
        },
       created() {
            this.getWards();
        }
    }
</script>
