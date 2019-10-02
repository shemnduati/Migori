<template>
    <div class="container" v-if="count > 0">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Check your Application Status</div>

                    <div class="card-body">
                        <div class="col-sm-12">
                            <div class="alert alert-warning" role="alert" v-if="this.count == 0">
                                You have not made any application yet.
                            </div>
                            <div class="accordion" id="accordionExample" v-if="this.count > 0">
                                <div class="card" v-for="application in applications" :key="application.id">
                                    <div class="card-header" id="headingOne">
                                        <h2 class="mb-0">
                                            <button class="btn" type="button" data-toggle="collapse"
                                                    :data-target="'#' + 'w' + application.id" aria-expanded="true"
                                                    aria-controls="collapseOne">
                                                {{application.bursary_type}} ({{application.year}}) - Click for more...
                                            </button>
                                        </h2>
                                    </div>

                                    <div :id="'w' + application.id" class="collapse" aria-labelledby="headingOne"
                                         data-parent="#accordionExample">
                                        <div class="card-body">
                                            <p>Serial No: {{application.serial}}</p>
                                            <table class="table table-hover">
                                                <tbody>
                                                <tr>
                                                    <th>
                                                        Status: <span v-if="application.status==0" style="color: purple;">Received</span>
                                                        <span v-if="application.status==2"
                                                              style="color: red;">Rejected</span>
                                                        <span v-if="application.status==1" style="color: green;">Verified</span>
                                                        <span v-if="application.status==3"
                                                              style="color: green;">Awarded</span>
                                                    </th>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <span v-if="application.status === 0">Your form has been successfully submitted and await verification</span>
                                                        <span v-if="application.status === 1">Your form has been successfully verified</span>
                                                        <span v-if="application.status === 2">Your form has been rejected due to misinformation.Please contact your ward
                                                            administrator for more information</span>
                                                        <span v-if="application.status === 3">You have been awarded Ksh {{amount}}</span>
                                                    </td>
                                                </tr>
                                                </tbody>
                                            </table>
                                        </div>
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
        data() {
            return {
                status: {},
                amount: {},
                applications: {},
                count: {},
            }
        },
        methods: {
            getApplications() {
                axios.get('api/getMyBursary').then(({data}) => ([this.applications = data['applications']]));
            },
            getMyApplications() {
                axios.get('api/getApplication').then(({data}) => ([this.count = data['count']]));
            },
            getMyStatus() {
                axios.get('api/getMyStatus').then(({data}) => ([this.status = data['status']]));
            },
            getMyAmount() {
                axios.get('api/getMyAmount').then(({data}) => ([this.amount = data['amount']]));
            },
        },
        created() {
            this.getApplications();
            this.getMyApplications();
            this.getMyAmount();
        }
    }
</script>
