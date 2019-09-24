<template>
    <div class="container" v-if="count > 0">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Application Status</div>

                    <div class="card-body">
                        <table class="table table-hover">
                            <tbody><tr>
                                <th>Status</th>
                            </tr>
                            <tr v-for="application in applications" :key="application.id">
                                <td>
                                    <span v-if="application.status==0" style="color: purple;">Received</span>
                                    <span v-if="application.status==2" style="color: red;">Rejected</span>
                                    <span v-if="application.status==3" style="color: green;">Verified</span>
                                </td>
                                <td>Read More</td>
                            </tr>



                            </tbody></table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        data(){
            return {
                applications :{},
                count : {},
            }
        },
        methods:{
            getApplications(){
                    axios.get('api/getMyBursary').then(({data}) => ([this.applications = data['applications']]));
            },
            getMyApplications(){
                axios.get('api/getApplication').then(({data}) => ([this.count = data['count']]));
            },
        },
        created() {
            this.getApplications();
            this. getMyApplications();
        }
    }
</script>
