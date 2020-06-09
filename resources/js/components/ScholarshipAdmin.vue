<template>
    <div class="container-fluid">
        <div class="row mt-5" v-if="$gate.isSubadminOrOfficial()">

            <!--<div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Scholarships</h3>

                        <div class="card-tools">
                            <div class="row">

                                <div class="col-sm-12" v-if="$gate.isOfficial()">
                                    <form>
                                        <select @change="sortByWard()" v-model="form.sWard" class="form-control" name="sWard"
                                                :class="{ 'is-invalid': form.errors.has('sWard') }">
                                            <option selected value="">&#45;&#45;Sort By Ward&#45;&#45;</option>
                                            <option v-for="wardy in wards" :key="wardy.id" :value="wardy.id">{{
                                                wardy.name}}
                                            </option>
                                        </select>
                                        <has-error :form="form" field="sWard"></has-error>
                                    </form>
                                </div>

                                <div class="col-sm-12" v-if="$gate.isSubadmin()">
                                    <button @click="recommended" class="btn btn-success btn-sm">Recommended</button>
                                    <button @click="rejected" class="btn btn-danger btn-sm">Rejected</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    &lt;!&ndash; /.box-header &ndash;&gt;
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
                                    <span v-if="application.status==3" style="color: green;">Approved</span>
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
                    &lt;!&ndash; /.box-body &ndash;&gt;
                    <div class="card-footer">
                        &lt;!&ndash; <pagination :data="users" @pagination-change-page="getResults"></pagination> &ndash;&gt;
                    </div>
                </div>
                &lt;!&ndash; /.box &ndash;&gt;
            </div>-->
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">County bursary Information Table</h3>
                        <div class="card-tools">
                            <div class="row">
                                <div class="col-sm-12" v-if="$gate.isSubadmin() || $gate.isOfficial()">
                                    <button @click="allApp" type="button" class="btn btn-sm btn-info">
                                        Reset
                                    </button>

                                    <button @click="filter" type="button" class="btn btn-sm btn-primary">
                                        <i class="fa fa-sort"></i>
                                        Sort
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body table-responsive no-padding">
                        <vue-good-table v-if="this.$gate.isSubadmin()"
                                        :columns="columns"
                                        :rows="app"
                                        :line-numbers="true"
                                        :pagination-options="{
                   enabled: true,
                   mode: 'pages',
                   perPage: 10
                 }"
                                        :search-options="{
                    enabled: true,
                    placeholder: 'Search this table',
                  }">
                            <template slot="table-row" slot-scope="props">
                <span v-if="props.column.field == 'status'">
                    <span v-if="props.row.status==1" style="color: purple;">Recommended.({{application.recommendation}})</span>
                                    <span v-if="props.row.status==2" style="color: red;">Rejected</span>
                                    <span v-if="props.row.status==3" style="color: green;">Approved</span>
                </span>
                                <span v-else-if="props.column.field == 'action'">
                   <router-link :to="{path:'/scholarship-admin-details/'+ application.id}" type="button"
                                class="btn btn-primary btn-sm">view
                                    </router-link>
                </span>
                            </template>
                        </vue-good-table>

                    </div>
                </div>
                <!-- /.box -->
            </div>
        </div>
        <div id="filterModal" class="modal fade bd-example-modal-sm" tabindex="-1" role="dialog"
             aria-labelledby="mySmallModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-sm">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Filter applications</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form>
                            <div class="form-group" >
                                <label>Select Type</label>
                                <select v-model="form.type" class="form-control">
                                    <option selected value="">--Type--</option>
                                    <option value="3">Recommended</option>
                                    <option value="4">Rejected</option>
                                </select>
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary" data-dismiss="modal">Go</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        name: "ScholarshipAdmin",
        data(){
            return{
                columns: [
                    {
                        label: 'Serial',
                        field: 'serial',
                    },

                    {
                        label: 'First Name',
                        field: 'firstName',
                    },
                    {
                        label: 'Last Name',
                        field: 'lastName',
                    },
                    {
                        label: 'Gender',
                        field: 'gender',
                    },
                    {
                        label: 'Status',
                        field: 'status',
                    },
                    {
                        label: 'Type',
                        field: 'bursary_type',
                    },
                    {
                        label: 'Action',
                        field: 'action'
                    }
                ],
                applications: {},
                wards: {},
                form: new Form({
                    sWard: '',
                }),
            }
        },
        computed: {
            app() {
                return this.$store.state.scholar;
                if (this.$gate.isOfficial()) {

                }
            }

            },
        methods:{
            sortByWard(){
                if (this.$gate.isOfficial()) {
                    axios.get('api/getbywardscholarship/' + this.form.sWard).then(({data}) => ([this.applications = data]));
                }
            },
            filter() {
                $('#filterModal').modal('show');
            },
            getMyWards() {
                if (this.$gate.isOfficial()) {
                    axios.get('api/mywards/').then(({data}) => ([this.wards = data]));
                }
            },
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
            },
            getApps(){
                this.$store.dispatch(' getScholarshipSub');
            }
        },
        created() {
           this.getApplications();
           this.getApps();
           this.getMyWards();
        }
    }
</script>

<style scoped>

</style>
