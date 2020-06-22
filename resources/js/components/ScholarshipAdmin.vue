<template>
    <div class="container-fluid">
        <div class="row mt-5" v-if="$gate.isSubadminOrOfficial() || $gate.isSubofficial() ">

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
                        <h3 class="card-title">County Scholarships Information Table</h3>
                        <div class="card-tools">
                            <div class="row">
                                <div class="col-sm-12" v-if="$gate.isSubadmin() || $gate.isOfficial() || $gate.isSubofficial()">
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
                        <span v-if="props.row.status==1"  style="color: purple;">Recommended.({{props.row.recommendation}})</span>
                                    <span v-if="props.row.status==0" style="color: purple;">Pending...</span>
                                    <span v-if="props.row.status==2" style="color: red;">Rejected</span>

                </span>
                                <span v-else-if="props.column.field == 'action'">
                   <router-link :to="{path:'/scholarship-admin-details/'+ props.row.id}" type="button"
                                class="btn btn-primary btn-sm">view
                                    </router-link>
                </span>
                            </template>
                        </vue-good-table>
                        <vue-good-table v-if="this.$gate.isOfficial() || this.$gate.isSubofficial()"
                                        :columns="columns2"
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
                                <span v-if="props.column.field == 'statu'">
                    <span v-if="props.row.approved==null" style="color: purple;">Pending...</span>
                    <span v-if="props.row.approved==2" style="color: red;">Rejected</span>
                    <span v-if="props.row.approved==3" style="color: green;">Awarded</span>
                </span>
                                <span v-else-if="props.column.field == 'reco'">
                    <span class="badge badge-primary" v-if="!props.row.recommendation">Pending</span>
                    <span class="badge badge-success" v-if="props.row.recommendation == 'high'"> High</span>
                    <span class="badge badge-warning" v-if="props.row.recommendation == 'partially'">Partially</span>
                    <span class="badge badge-danger" v-if="props.row.recommendation == 'No'">No</span>
                </span>
                                <span v-else-if="props.column.field == 'action'">
                     <router-link :to="{path:'/scholarship-admin-details/'+ props.row.id}" >
                          <button class="btn btn-success btn-sm m-1"><i class="fa fa-eye"></i>more</button>
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
                            <div class="form-group">
                                <label>Select Year</label>
                                <select v-model="form.year" class="form-control">
                                    <option selected value="">--Year--</option>
                                    <option v-for="co in conf" :key="co['year']"
                                            :value="co['year']">{{ co.year}}
                                    </option>
                                </select>
                            </div>
                            <div class="form-group" v-if="$gate.isSubadmin()" >
                                <label>Select Type</label>
                                <select v-model="form.type" class="form-control">
                                    <option selected value="">--Type--</option>
                                    <option value="1">All</option>
                                    <option value="2">Pending</option>
                                    <option value="3">Recommended</option>
                                    <option value="4">Rejected</option>
                                </select>
                            </div>
                            <div class="form-group" v-if="$gate.isOfficial() || $gate.isSubofficial()" >
                                <label>Select Type</label>
                                <select v-model="form.type" class="form-control">
                                    <option selected value="">--Type--</option>
                                    <option value="1">All</option>
                                    <option value="2">Pending</option>
                                    <option value="3">Awarded</option>
                                    <option value="4">Rejected</option>
                                </select>
                            </div>
                            <div class="form-group" v-if="$gate.isOfficial() || $gate.isSubofficial()">
                                <label>Select Ward</label>
                                <select v-model="form.ward" class="form-control">
                                    <option selected value="">--Sort By Ward--</option>
                                    <option value="0">All</option>
                                    <option v-for="wardy in wards" :key="wardy.id" :value="wardy.id">{{
                                        wardy.name}}
                                    </option>
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
                columns2: [
                    {
                        label: 'Serial',
                        field: 'serial',
                    },
                    {
                        label: 'Year',
                        field: 'application_year',
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
                        field: 'statu',
                    },
                    {
                        label: 'Recommendation',
                        field: 'reco',
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
                form: {
                    type: '',
                    year: '',
                    ward:'',
                },
                conf: [],
            }
        },
        computed: {
            app() {
                if (this.$gate.isSubadmin()) {
                    if (!this.form.type && !this.form.year) {
                        return this.$store.state.scholar;
                    }
                    if (!this.form.type && this.form.year) {
                        return this.$store.state.scholar.filter(m => m.application_year == this.form.year)
                    }
                    if (this.form.type && this.form.year) {
                        if (this.form.type == 1) {
                            return this.$store.state.scholar.filter(m => m.application_year == this.form.year)
                        }

                        if (this.form.type == 2) {
                            return this.$store.state.scholar.filter(m => m.application_year == this.form.year && m.status == 0)
                        }

                        if (this.form.type == 3) {
                            return this.$store.state.scholar.filter(m => m.application_year == this.form.year && (m.recommendation == 'high' ||
                                m.recommendation == 'partially'))
                        }

                        if (this.form.type == 4) {
                            return this.$store.state.scholar.filter(m => m.application_year == this.form.year && m.status == 2)
                        }
                    }
                    if (this.form.type && !this.form.year) {
                        if (this.form.type == 1) {
                            return this.$store.state.scholar
                        }

                        if (this.form.type == 2) {
                            return this.$store.state.scholar.filter(m =>  m.status == 0)
                        }

                        if (this.form.type == 3) {
                            return this.$store.state.scholar.filter(m => (m.recommendation == 'high' || m.recommendation == 'partially'))
                        }

                        if (this.form.type == 4) {
                            return this.$store.state.scholar.filter(m =>  m.status == 2)
                        }
                    }
                }
                if (this.$gate.isOfficial() || this.$gate.isSubofficial()) {
                    if (!this.form.year && !this.form.ward && !this.form.type) {
                        return this.$store.state.scholar.filter(m => m.recommendation == 'high' || m.recommendation == 'partially')
                    }
                }
                if (this.form.year && !this.form.ward && !this.form.type) {
                    return this.$store.state.scholar.filter(m => m.application_year == this.form.year &&
                        (m.recommendation == 'high' || m.recommendation == 'partially'))
                }
                if (!this.form.year && this.form.ward && !this.form.type) {
                    if (this.form.ward == 0) {
                        return this.$store.state.scholar.filter(m => (m.recommendation == 'high' || m.recommendation == 'partially'))
                    } else {
                        return this.$store.state.scholar.filter(m => m.ward_id == this.form.ward && (m.recommendation == 'high' || m.recommendation == 'partially'))
                    }
                }
                if (!this.form.year && !this.form.ward && this.form.type) {
                    if (this.form.type == 1) {
                        return this.$store.state.scholar.filter(m => m.recommendation == 'high' || m.recommendation == 'partially')
                    }

                    if (this.form.type == 2) {
                        return this.$store.state.scholar.filter(m => m.status == 1 && m.approved == null && (m.recommendation == 'high' ||
                            m.recommendation == 'partially'))
                    }

                    if (this.form.type == 3) {
                        return this.$store.state.scholar.filter(m => m.approved == 3 && (m.recommendation == 'high' ||
                            m.recommendation == 'partially'))
                    }

                    if (this.form.type == 4) {
                        return this.$store.state.scholar.filter(m => m.status == 2 && (m.recommendation == 'high' ||
                            m.recommendation == 'partially'))
                    }
                }
                if (this.form.year && this.form.ward && !this.form.type) {
                    if (this.form.ward == 0){
                        return this.$store.state.scholar.filter(m => m.application_year == this.form.year
                            && (m.recommendation == 'high' || m.recommendation == 'partially'))
                    }
                    return this.$store.state.scholar.filter(m => m.application_year == this.form.year &&
                        m.ward_id == this.form.ward && (m.recommendation == 'high' || m.recommendation == 'partially'))
                }

                if (this.form.year && !this.form.ward && this.form.type) {
                    if (this.form.type == 1) {
                        return this.$store.state.scholar.filter(m =>  m.application_year == this.form.year &&
                            (m.recommendation == 'high' || m.recommendation == 'partially'))
                    }

                    if (this.form.type == 2) {
                        return this.$store.state.scholar.filter(m =>  m.application_year == this.form.year && m.status == 1 && m.approved == null &&
                            (m.recommendation == 'high' || m.recommendation == 'partially'))
                    }

                    if (this.form.type == 3) {
                        return this.$store.state.scholar.filter(m => m.application_year == this.form.year &&  m.approved == 3 &&
                            (m.recommendation == 'high' || m.recommendation == 'partially'))
                    }
                    if (this.form.type == 4) {
                        return this.$store.state.scholar.filter(m => m.application_year == this.form.year &&  m.status == 2 &&
                            (m.recommendation == 'high' || m.recommendation == 'partially'))
                    }

                }
                if (!this.form.year && this.form.ward && this.form.type) {
                    if (this.form.type == 1) {
                        if (this.form.ward == 0){
                            return this.$store.state.scholar.filter(m =>  m.recommendation == 'high' || m.recommendation == 'partially')
                        }
                        return this.$store.state.scholar.filter(m => m.ward_id == this.form.ward &&
                            (m.recommendation == 'high' || m.recommendation == 'partially'))
                    }
                    if (this.form.type == 2) {
                        if (this.form.ward == 0){
                            return this.$store.state.scholar.filter(m =>m.status == 1 && m.approved ==null && m.recommendation == 'high' || m.recommendation == 'partially')
                        }
                        return this.$store.state.scholar.filter(m => m.status == 1 && m.approved ==null && m.ward_id == this.form.ward &&
                            (m.recommendation == 'high' || m.recommendation == 'partially') )
                    }

                    if (this.form.type == 3) {
                        if (this.form.ward == 0){
                            return this.$store.state.scholar.filter(m => m.approved == 3 && (m.recommendation == 'high' || m.recommendation == 'partially'))
                        }
                        return this.$store.state.scholar.filter(m => m.ward_id == this.form.ward && m.approved == 3 &&
                            (m.recommendation == 'high' || m.recommendation == 'partially'))
                    }
                    if (this.form.type == 4) {
                        if (this.form.ward == 0){
                            return this.$store.state.scholar.filter(m => m.status == 2 && (m.recommendation == 'high' || m.recommendation == 'partially'))
                        }
                        return this.$store.state.scholar.filter(m => m.ward_id == this.form.ward && m.status == 2 &&
                            (m.recommendation == 'high' || m.recommendation == 'partially'))
                    }

                }
                if (this.form.year && this.form.ward && this.form.type) {
                    if (this.form.type == 1) {
                        if (this.form.ward == 0){
                            return this.$store.state.scholar.filter(m => m.application_year == this.form.year &&
                                (m.recommendation == 'high' || m.recommendation == 'partially'))
                        }
                        return this.$store.state.bursary.filter(m => m.application_year == this.form.year &&
                            m.ward_id == this.form.ward &&
                            (m.recommendation == 'high' || m.recommendation == 'partially'))
                    }

                    if (this.form.type == 2) {
                        if (this.form.ward == 0){
                            return this.$store.state.scholar.filter(m =>  m.status == 1 && m.approved == null && m.application_year == this.form.year && m.status == 2)
                        }
                        return this.$store.state.scholar.filter(m => m.application_year == this.form.year &&
                            m.ward_id == this.form.ward &&
                            (m.recommendation == 'high' || m.recommendation == 'partially') )
                    }

                    if (this.form.type == 3) {
                        if (this.form.ward == 0){
                            return this.$store.state.scholar.filter(m => m.approved == 3 && m.application_year == this.form.year &&
                                (m.recommendation == 'high' || m.recommendation == 'partially'))
                        }
                        return this.$store.state.scholar.filter(m => m.approved == 3 && m.application_year == this.form.year &&
                            m.ward_id == this.form.ward &&  (m.recommendation == 'high' || m.recommendation == 'partially'))
                    }
                    if (this.form.type == 4) {
                        if (this.form.ward == 0){
                            return this.$store.state.scholar.filter(m => m.status == 2 && m.application_year == this.form.year &&
                                (m.recommendation == 'high' || m.recommendation == 'partially'))
                        }
                        return this.$store.state.scholar.filter(m => m.status == 2 && m.application_year == this.form.year &&
                            m.ward_id == this.form.ward &&  (m.recommendation == 'high' || m.recommendation == 'partially'))
                    }
                }
            }


            },
        methods:{
            allApp() {
                this.form = {
                    type: '',
                    year:'',
                }
            },
            sortByWard(){
                if (this.$gate.isOfficial()) {
                    axios.get('api/getbywardscholarship/' + this.form.sWard).then(({data}) => ([this.applications = data]));
                }
            },
            getConfYears() {
                if (this.$gate.isSubadmin() || this.$gate.isOfficial() || this.$gate.isSubofficial()) {
                    axios.get('api/sconf_years').then(data => {
                        this.conf = data.data
                    });
                }
            },
            filter() {
                $('#filterModal').modal('show');
            },
            getMyWards() {
                if (this.$gate.isOfficial()) {
                    axios.get('api/mywards').then(({data}) => ([this.wards = data]));
                }
                if (this.$gate.isSubofficial()) {
                    axios.get('api/mywards').then(({data}) => ([this.wards = data]));
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
                if (this.$gate.isSubofficial()) {
                    axios.get('api/scholarshipApps').then(({data}) => ([this.applications = data]));
                }
            },
            getApps(){
                this.$store.dispatch('getScholarshipSub');
            }
        },
        created() {
           this.getApplications();
           this.getApps();
           this.getMyWards();
           this.getConfYears();
        }
    }
</script>

<style scoped>

</style>
