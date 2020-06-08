<template>
    <div class="container">
        <div class="row mt-5" v-if="$gate.isSubadminOrOfficial() || $gate.isSubofficial()">

            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">County Bursary Applicants Details</h3>

                        <div class="card-tools">
                            <div class="row">
                                <div class="col-sm-6" v-if="$gate.isOfficial() || $gate.isSubofficial()">
                                    <form>
                                        <select @change="getType()" v-model="form.type" class="form-control">
                                            <option selected value="">--Sort By--</option>
                                            <option value="0">county</option>
                                            <option v-for="wardy in wards" :key="wardy.id" :value="wardy.id">{{
                                                wardy.name}} ward
                                            </option>
                                        </select>
                                    </form>
                                </div>
                                <div class="col-sm-12">
                                    <button @click="allApp" type="button" class="btn btn-sm btn-info">
                                        Reset
                                    </button>
                                    <button @click="filter" type="button" class="btn btn-sm btn-primary">
                                        <i class="fa fa-sort"></i>
                                        Sort
                                    </button>
                                    <button type="button" class="btn btn-success btn-sm" @click="createPDF">
                                        <i class="fas fa-download"></i>
                                        Download
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body table-responsive no-padding">
                        <table class="table table-hover" id="my-table">
                            <tbody>
                            <tr>
                                <th>Year</th>
                                <th>Name</th>
                                <th>Fathers Name</th>
                                <th>Institution</th>
                                <th>Ward</th>
                                <th>Polling station</th>
                                <th>Fee balance</th>
                                <th v-if="$gate.isOfficial() || $gate.isSubofficial()">Awarded Amount</th>
                                <th v-if="$gate.isSubofficial()">Cheque</th>
                            </tr>
                            <tr v-for="application in app" :key="application.id">
                                <td>{{application.application_year}}</td>
                                <td>{{application.firstName}} {{application.lastName}}</td>
                                <td>{{application.family[0].name}}</td>
                                <td>{{application.institution.name}}</td>
                                <td>{{application.geographical.ward.name}}</td>
                                <td>{{application.geographical.polling}}</td>
                                <td>Ksh. {{application.institution.balance }}</td>
                                <td v-if="$gate.isOfficial() || $gate.isSubofficial()">Ksh. {{application.amount }}</td>
                                <td v-if="$gate.isSubofficial()">
                                    <i v-if="!application.cheque" class="fas fa-check-circle"
                                       style="font-size: 20px; color: purple;" @click="issueCheque(application.id)"></i>
                                    <span v-if="application.cheque == 1" class="badge badge-success">Issued</span>
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
                applications: {},
                wards: {},
                myward: '',
                mycounty: '',
                selectedWard: '',
                wardsCounty: '',
                mywardy: '',
                form: {
                    year: ''
                },
                conf: []
            }
        },
        computed: {
            app() {
                if (!this.form.year) {
                    return this.$store.state.bursary.filter(m => m.recommendation == 'Yes' || m.recommendation == 'Partially')
                }

                if (this.form.year) {
                    return this.$store.state.bursary.filter(m => m.application_year == this.form.year && (m.recommendation == 'Yes'
                        || m.recommendation == 'Partially'))
                }
            }
        },
        methods: {
            allApp() {
                this.form = {
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
            issueCheque(applicationId) {
                Swal.fire({
                    title: 'Are you sure?',
                    text: "Mark as issued?? You won't be able to revert this!",
                    //type: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes!'
                }).then((result) => {
                    if (result.value) {
                        axios.post("/api/issuedcheque/" + applicationId).then(() => {
                            Swal.fire(
                                'Success!',
                                'Operation successful.',
                                'success'
                            )
                            Fire.$emit('entry');
                            Fire.$emit('AfterCreate');
                        }).catch(() => {
                            Swal.fire('Failed!', 'There was something wrong')
                        });
                    }
                })
            },
            createPDF() {
                var specialElementHandlers = {
                    "#editor": function (element, renderer) {
                        return true;
                    }
                }
                var doc = new jsPDF();

                if (this.$gate.isSubadmin()) {
                    doc.setFontSize(18);
                    if (this.form.year) {
                        doc.text('Recommended Bursary Applications(' + this.form.year + ')', 14, 22);
                    }else{
                        doc.text('Recommended Bursary Applications', 14, 22);
                    }
                    doc.setFontSize(11);
                    doc.setTextColor(100);
                }

                if (!this.$gate.isSubadmin()) {
                    doc.setFontSize(18);
                    if (this.form.year) {
                        doc.text('Approved Bursary Applications(' + this.form.year + ')', 14, 22);
                    }else{
                        doc.text('Approved Bursary Applications', 14, 22);
                    }
                    doc.setFontSize(11);
                    doc.setTextColor(100);
                }

                if (this.$gate.isOfficial() || this.$gate.isSubofficial()) {
                    doc.setFontSize(13);
                    doc.text(this.mycounty + ' County', 14, 30);
                    doc.setFontSize(11);
                    doc.setTextColor(100);
                }

                if (this.$gate.isSubadmin()) {
                    doc.setFontSize(13);
                    doc.text(this.wardsCounty + ' County', 14, 30);
                    doc.setFontSize(11);
                    doc.setTextColor(100);
                }

                if (this.$gate.isOfficial() || this.$gate.isSubofficial()) {
                    if (this.selectedWard) {
                        doc.setFontSize(12);
                        doc.text(this.selectedWard + ' Ward', 14, 36);
                        doc.setFontSize(11);
                        doc.setTextColor(100)
                    }
                }

                if (this.$gate.isSubadmin()) {
                    doc.setFontSize(12);
                    doc.text(this.mywardy + ' Ward', 14, 36);
                    doc.setFontSize(11);
                    doc.setTextColor(100)
                }

                doc.autoTable({
                    showHead: 'firstPage',
                    html: '#my-table',
                    startY: 40,
                });
                if (this.$gate.isSubadmin()) {
                    doc.save(this.mywardy + '.pdf');
                }
                if (this.$gate.isOfficial() || this.$gate.isSubofficial()) {
                    if (this.selectedWard){
                        doc.save(this.mycounty + '|' + this.selectedWard + '.pdf');
                    }else {
                        doc.save(this.mycounty + '.pdf');
                    }
                }
            },
            getApplications() {
                if (this.$gate.isOfficial()) {
                    axios.get('api/getApplicants').then(({data}) => ([this.applications = data['parent']]));
                }
                if (this.$gate.isSubadmin()) {
                    axios.get('api/getApp').then(({data}) => ([this.applications = data['parent']]));
                }

                if (this.$gate.isSubofficial()) {
                    axios.get('api/getApp').then(({data}) => ([this.applications = data['parent']]));
                }
            },
            getType() {
                this.selectedWard = "";
                if (this.$gate.isOfficial() || this.$gate.isSubofficial()) {
                    axios.get('api/getWardsById/' + this.form.type).then(({data}) => ([this.applications = data['parent']]));

                    if (this.form.type > 0) {
                        axios.get('/api/wardname/' + this.form.type).then(({data}) => ([this.selectedWard = data]));
                    }
                }
            },
            getWards() {
                axios.get("api/getMyWards").then(({data}) => ([this.wards = data['wards']]));
            },
            subWard() {
                if (this.$gate.isSubadmin()) {
                    axios.get("api/subAdminWard").then(({data}) => ([this.mywardy = data]));
                }
            },
            getCounty() {
                if (this.$gate.isOfficial() || this.$gate.isSubofficial()) {
                    axios.get("api/getMyCounty").then(({data}) => ([this.mycounty = data['counties']]));
                }
                if (this.$gate.isSubadmin()) {
                    axios.get("api/wardsCounty").then(({data}) => ([this.wardsCounty = data]));
                }
            },

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
            this.getWards();
            this.getCounty();
            this.subWard();
            this.getConfYears();
            Fire.$on('AfterCreate', () => {
                this.getApplications();
                this.getWards();
            })
        }
    }
</script>
