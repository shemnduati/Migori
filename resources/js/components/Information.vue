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
                                    <button @click="allApp" type="button" class="btn btn-sm btn-info">
                                        Reset
                                    </button>

                                    <button @click="filter" type="button" class="btn btn-sm btn-primary">
                                        <i class="fa fa-sort"></i>
                                        Sort
                                    </button>
                                </div>
                                <div class="col-sm-12" v-if="$gate.isOfficial()">
                                    <form>
                                        <select @change="sortByWard()" v-model="formf.sWard" class="form-control"
                                                name="sWard">
                                            <option selected value="">--Sort By Ward--</option>
                                            <option v-for="wardy in wards" :key="wardy.id" :value="wardy.id">{{
                                                wardy.name}}
                                            </option>
                                        </select>
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
                                    <span v-if="application.status==1" style="color: purple;">Pending...</span>
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
                <span v-if="props.column.field == 'reco'">
                    <span class="badge badge-primary" v-if="!props.row.recommendation">Pending</span>
                    <span class="badge badge-success" v-if="props.row.recommendation == 'Yes'">Yes / High</span>
                    <span class="badge badge-warning" v-if="props.row.recommendation == 'Partially'">Partially</span>
                    <span class="badge badge-danger" v-if="props.row.recommendation == 'No'">No</span>
                </span>
                                <span v-else-if="props.column.field == 'action'">
                    <router-link :to="{path:'/informationview/'+ props.row.id}">
                        <button class="btn btn-primary btn-sm m-1"><i class="fa fa-eye"></i>more</button>
                    </router-link>
                </span>
                            </template>
                        </vue-good-table>
                        <vue-good-table v-if="this.$gate.isOfficial()"
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
                    <span v-if="props.row.status==1" style="color: purple;">Pending...</span>
                    <span v-if="props.row.status==2" style="color: red;">Rejected</span>
                    <span v-if="props.row.status==3" style="color: green;">Awarded</span>
                </span>
                <span v-else-if="props.column.field == 'reco'">
                    <span class="badge badge-primary" v-if="!props.row.recommendation">Pending</span>
                    <span class="badge badge-success" v-if="props.row.recommendation == 'Yes'">Yes / High</span>
                    <span class="badge badge-warning" v-if="props.row.recommendation == 'Partially'">Partially</span>
                    <span class="badge badge-danger" v-if="props.row.recommendation == 'No'">No</span>
                </span>
                                <span v-else-if="props.column.field == 'action'">
                    <router-link :to="{path:'/informationview/'+ props.row.id}">
                        <button class="btn btn-primary btn-sm m-1"><i class="fa fa-eye"></i>more</button>
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
                            <div class="form-group">
                                <label>Select Type</label>
                                <select v-model="form.type" class="form-control">
                                    <option selected value="">--Type--</option>
                                    <option value="1">All</option>
                                    <option value="2">Pending</option>
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
        data() {
            return {
                columns: [
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
                formf: new Form({
                    sWard: '',
                }),
                form: {
                    type: '',
                    year: ''
                },
                conf: []
            }
        },
        computed: {
            app() {
                if (this.$gate.isSubadmin()) {
                    if (!this.form.type && !this.form.year) {
                        return this.$store.state.bursary;
                    }

                    if (!this.form.type && this.form.year) {
                        return this.$store.state.bursary.filter(m => m.application_year == this.form.year)
                    }

                    if (this.form.type && this.form.year) {
                        if (this.form.type == 1) {
                            return this.$store.state.bursary.filter(m => m.application_year == this.form.year)
                        }

                        if (this.form.type == 2) {
                            return this.$store.state.bursary.filter(m => m.application_year == this.form.year && m.status == 0)
                        }

                        if (this.form.type == 3) {
                            return this.$store.state.bursary.filter(m => m.application_year == this.form.year && m.recommendation != null)
                        }

                        if (this.form.type == 4) {
                            return this.$store.state.bursary.filter(m => m.application_year == this.form.year && m.status == 2)
                        }
                    }
                }

                if (this.$gate.isOfficial()) {
                    if (!this.form.year) {
                        return this.$store.state.bursary.filter(m => m.recommendation == 'Yes' || m.recommendation == 'Partially')
                    }
                }
            }
        },
        methods: {
            allApp() {
                this.form = {
                    type: '',
                    year: ''
                }
            },
            getConfYears() {
                if (this.$gate.isSubadmin()) {
                    axios.get('api/conf_years').then(data => {
                        this.conf = data.data
                    });
                }
            },
            filter() {
                $('#filterModal').modal('show');
            },
            sortByWard() {
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
                    this.$store.dispatch('getBursarySub');
                }
                if (this.$gate.isOfficial()) {
                    this.$store.dispatch('getBursaryOfficial');
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
            this.getApplications();
            this.getMyWards();
            this.getConfYears();
            Fire.$on('AfterCreate', () => {
                this.getApplications();
            })
        }
    }
</script>
