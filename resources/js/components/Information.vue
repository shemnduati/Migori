<template>
    <div class="container">
        <div class="row mt-5" v-if="$gate.isSubadminOrOfficial()">

            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">County bursary Information Table</h3>
                        <div class="card-tools">
                            <div class="row">
                                <div class="col-sm-12" v-if="$gate.isSubadmin()">
                                    <form>
                                        <select @change="getType()" v-model="form.type" class="form-control">
                                            <option selected value="">--Sort By--</option>
                                            <option value="1">All</option>
                                            <option value="2">Pending</option>
                                            <option value="3">Recommended</option>
                                            <option value="4">Rejected</option>
                                        </select>
                                    </form>
                                </div>
                                <div class="col-sm-12" v-if="$gate.isOfficial()">
                                    <form>
                                        <select @change="sortByWard()" v-model="formf.sWard" class="form-control" name="sWard"
                                                :class="{ 'is-invalid': form.errors.has('sWard') }">
                                            <option selected value="">--Sort By Ward--</option>
                                            <option v-for="wardy in wards" :key="wardy.id" :value="wardy.id">{{
                                                wardy.name}}
                                            </option>
                                        </select>
                                        <has-error :form="form" field="sWard"></has-error>
                                    </form>
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
                                <th v-if="$gate.isOfficial()">Status</th>
                                <th>Recomm.</th>
                                <th>Type</th>
                                <th>View to Send</th>

                            </tr>
                            <tr v-for="application in applications" :key="application.id">
                                <td>{{application.serial}}</td>
                                <td>{{application.firstName}}</td>
                                <td>{{application.lastName}}</td>
                                <td>{{application.gender}}</td>
                                <td v-if="$gate.isOfficial()">
                                    <span v-if="application.status==1" style="color: purple;">Verified.</span>
                                    <span v-if="application.status==0" style="color: purple;">Pending...</span>
                                    <span v-if="application.status==2" style="color: red;">Rejected</span>
                                    <span v-if="application.status==3" style="color: green;">Awarded</span>
                                </td>
                                <td>
                                    <span class="badge badge-primary" v-if="!application.recommendation">Pending</span>
                                    <span class="badge badge-success" v-if="application.recommendation == 'Yes'">Yes / High</span>
                                    <span class="badge badge-warning" v-if="application.recommendation == 'Partially'">Partially</span>
                                    <span class="badge badge-danger" v-if="application.recommendation == 'No'">No</span>
                                </td>
                                <td>{{application.bursary_type}}</td>
                                <td>
                                    <router-link :to="{path:'/informationview/'+ application.id}" type="button"
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
        <!-- Modal -->


    </div>
</template>

<script>
    export default {
        data() {
            return {
                applications: {},
                wards: {},
                formf: new Form({
                    sWard: '',
                }),
                form: new Form({
                    type: ''
                })
            }
        },
        methods: {
            sortByWard(){
                if (this.$gate.isOfficial()) {
                    axios.get('api/getbyward/' + this.formf.sWard).then(({data}) => ([this.applications = data['applications']]));
                }
            },
            getMyWards() {
                if (this.$gate.isOfficial()) {
                    axios.get('api/mywards/').then(({data}) => ([this.wards = data]));
                }
            },
            getBursary(type) {
                axios.get('api/getbursarytype/' + type).then(({data}) => ([this.applications = data['applications']]));
            },
            getApplications() {
                if (this.$gate.isSubadmin()) {
                    axios.get('api/getbusary').then(({data}) => ([this.applications = data['applications']]));
                }
                if (this.$gate.isOfficial()) {
                    axios.get('api/getCountyBursary').then(({data}) => ([this.applications = data['applications']]));
                }
            },
            getType() {
                if (this.$gate.isOfficial()) {
                    axios.get('api/gettype/' + this.form.type).then(({data}) => ([this.applications = data['applications']]));
                }
                if (this.$gate.isSubadmin()) {
                    axios.get('api/getstatus/' + this.form.type).then(({data}) => ([this.applications = data['applications']]));
                }
                if (this.$gate.isOfficial()) {
                    axios.get('api/gettype/' + this.form.type).then(({data}) => ([this.applications = data['applications']]));
                }
            }
        },
        created() {
            this.$Progress.start();
            Fire.$on('searching', () => {
                this.$Progress.start();
                let query = this.$parent.search;
                axios.get('api/findbursary?q=' + query)
                    .then((data) => {
                        this.applications = data.data;
                        this.$Progress.finish();
                    })
                    .catch(() => {
                    })
            })
            this.getApplications();
            this.getMyWards();
            Fire.$on('AfterCreate', () => {
                this.getApplications();
            })
        }
    }
</script>
