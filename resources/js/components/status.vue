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
                            </tr>
                            </tbody></table>
                        <a href="#" data-toggle="collapse"  role="button" aria-expanded="false" @click="getMyStatus">Read more..</a>
                        <div class="col-md-12">
                            <div class="row" v-if="status === 0">Your form has been successfully submitted and await verification</div>
                            <div class="row" v-if="status === 2">Your form has been successfully verified</div>
                            <div class="row" v-if="status === 3">Your form has been rejected due to misinformation.Please contact your ward
                            administrator for more information</div>
                            <div class="row" v-if="status === 4">You have been awarded Ksh xxx</div>
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
            return {
                status:{},
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
            getMyStatus(){
                axios.get('api/getMyStatus').then(({data}) => ([this.status = data['status']]));
            },
        },
        created() {
            this.getApplications();
            this. getMyApplications();
        }
    }
</script>
