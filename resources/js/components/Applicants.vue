<template>
    <div class="container">
        <div class="row mt-5" v-if="$gate.isSubadminOrOfficial() || $gate.isSubofficial()">

            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">County Bursary Applicants Details</h3>

                        <div class="card-tools">
                            <div class="row">
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
                                    <button @click="issueCheque(application.id)" type="button" class="btn btn-dark btn-sm" v-if="!application.cheque">
                                        <i class="fas fa-check-circle"
                                           style="font-size: 15px;"></i>
                                    </button>
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
                            <div class="form-group" v-if="$gate.isOfficial() || $gate.isSubofficial()">
                                <label>Ward</label>
                                <select v-model="form.ward" class="form-control">
                                    <option selected value="">--Sort By--</option>
                                    <option value="0">All</option>
                                    <option v-for="wardy in wards" :key="wardy.id" :value="wardy.id">{{
                                        wardy.name}} ward
                                    </option>
                                </select>
                            </div>
                            <div class="form-group" v-if="$gate.isSubofficial()">
                                <label>Cheque</label>
                                <select v-model="form.cheque" class="form-control">
                                    <option selected value="">--Sort By--</option>
                                    <option value="0">All</option>
                                    <option value="1">Issued</option>
                                    <option value="2">Not issued</option>
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
                    year: '',
                    ward: '',
                    cheque: ''
                },
                conf: []
            }
        },
        computed: {
            app() {
                if (this.$gate.isSubadmin()) {
                    if (!this.form.year) {
                        return this.$store.state.bursary.filter(m => m.recommendation == 'Yes' || m.recommendation == 'Partially')
                    }

                    if (this.form.year) {
                        return this.$store.state.bursary.filter(m => m.application_year == this.form.year && (m.recommendation == 'Yes'
                            || m.recommendation == 'Partially'))
                    }
                }

                if (this.$gate.isOfficial()) {
                    if (!this.form.year && !this.form.ward) {
                        return this.$store.state.bursary.filter(m => m.awarded == 1)
                    }

                    if (this.form.year && !this.form.ward) {
                        return this.$store.state.bursary.filter(m => m.awarded == 1 && m.application_year == this.form.year)
                    }

                    if (!this.form.year && this.form.ward) {
                        if (this.form.ward == 0) {
                            return this.$store.state.bursary.filter(m => m.awarded == 1)
                        }
                        return this.$store.state.bursary.filter(m => m.awarded == 1 && m.ward_id == this.form.ward)
                    }

                    if (this.form.year && this.form.ward) {
                        if (this.form.ward == 0) {
                            return this.$store.state.bursary.filter(m => m.awarded == 1 && m.application_year == this.form.year)
                        }
                        return this.$store.state.bursary.filter(m => m.awarded == 1 && m.ward_id == this.form.ward
                            && m.application_year == this.form.year)
                    }
                }

                if (this.$gate.isSubofficial()) {
                    if (!this.form.year && !this.form.ward && !this.form.cheque) {
                        return this.$store.state.bursary.filter(m => m.awarded == 1)
                    }

                    if (this.form.year && !this.form.ward && !this.form.cheque) {
                        return this.$store.state.bursary.filter(m => m.awarded == 1 && m.application_year == this.form.year)
                    }

                    if (!this.form.year && this.form.ward && !this.form.cheque) {
                        if (this.form.ward == 0) {
                            return this.$store.state.bursary.filter(m => m.awarded == 1)
                        }
                        return this.$store.state.bursary.filter(m => m.awarded == 1 && m.ward_id == this.form.ward)
                    }

                    if (!this.form.year && !this.form.ward && this.form.cheque) {
                        if (this.form.cheque == 0) {
                            return this.$store.state.bursary.filter(m => m.awarded == 1)
                        }

                        if (this.form.cheque == 1) {
                            return this.$store.state.bursary.filter(m => m.awarded == 1 && m.cheque == 1)
                        }

                        if (this.form.cheque == 2) {
                            return this.$store.state.bursary.filter(m => m.awarded == 1 && m.cheque == null)
                        }
                    }

                    if (this.form.year && this.form.ward && !this.form.cheque) {
                        if (this.form.ward == 0) {
                            return this.$store.state.bursary.filter(m => m.awarded == 1 && m.application_year == this.form.year)
                        }
                        return this.$store.state.bursary.filter(m => m.awarded == 1 && m.ward_id == this.form.ward
                            && m.application_year == this.form.year)
                    }

                    if (this.form.year && !this.form.ward && this.form.cheque) {
                        if (this.form.cheque == 0) {
                            return this.$store.state.bursary.filter(m => m.awarded == 1 && m.application_year == this.form.year)
                        }

                        if (this.form.cheque == 1) {
                            return this.$store.state.bursary.filter(m => m.awarded == 1 && m.cheque == 1
                                && m.application_year == this.form.year)
                        }

                        if (this.form.cheque == 2) {
                            return this.$store.state.bursary.filter(m => m.awarded == 1 && m.cheque == null
                                && m.application_year == this.form.year)
                        }
                    }

                    if (!this.form.year && this.form.ward && this.form.cheque) {
                        if (this.form.cheque == 0) {
                            if (this.form.ward == 0) {
                                return this.$store.state.bursary.filter(m => m.awarded == 1)
                            }
                            return this.$store.state.bursary.filter(m => m.awarded == 1 && m.ward_id == this.form.ward)
                        }

                        if (this.form.cheque == 1) {
                            if (this.form.ward == 0) {
                                return this.$store.state.bursary.filter(m => m.awarded == 1 && m.cheque == 1)
                            }
                            return this.$store.state.bursary.filter(m => m.awarded == 1 && m.cheque == 1
                                && m.ward_id == this.form.ward)
                        }

                        if (this.form.cheque == 2) {
                            if (this.form.ward == 0) {
                                return this.$store.state.bursary.filter(m => m.awarded == 1 && m.cheque == null)
                            }
                            return this.$store.state.bursary.filter(m => m.awarded == 1 && m.cheque == null
                                && m.ward_id == this.form.ward)
                        }
                    }

                    if (this.form.year && this.form.ward && this.form.cheque) {
                        if (this.form.cheque == 0) {
                            if (this.form.ward == 0) {
                                return this.$store.state.bursary.filter(m => m.awarded == 1 &&
                                    m.application_year == this.form.year)
                            }
                            return this.$store.state.bursary.filter(m => m.awarded == 1 && m.ward_id == this.form.ward
                                && m.application_year == this.form.year)
                        }

                        if (this.form.cheque == 1) {
                            if (this.form.ward == 0) {
                                return this.$store.state.bursary.filter(m => m.awarded == 1 && m.cheque == 1
                                    && m.application_year == this.form.year)
                            }
                            return this.$store.state.bursary.filter(m => m.awarded == 1 && m.cheque == 1
                                && m.ward_id == this.form.ward && m.application_year == this.form.year)
                        }

                        if (this.form.cheque == 2) {
                            if (this.form.ward == 0) {
                                return this.$store.state.bursary.filter(m => m.awarded == 1 && m.cheque == null &&
                                    m.application_year == this.form.year)
                            }
                            return this.$store.state.bursary.filter(m => m.awarded == 1 && m.cheque == null
                                && m.ward_id == this.form.ward && m.application_year == this.form.year)
                        }
                    }
                }
            }
        },
        methods: {
            allApp() {
                this.form = {
                    year: '',
                    ward: '',
                    cheque: ''
                }
            },
            getConfYears() {
                if (this.$gate.isSubadmin() || this.$gate.isOfficial() || this.$gate.isSubofficial()) {
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
                            if (this.$gate.isSubofficial()) {
                                this.$store.dispatch('getAwarded');
                            }
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
                    } else {
                        doc.text('Recommended Bursary Applications', 14, 22);
                    }
                    doc.setFontSize(11);
                    doc.setTextColor(100);
                }

                if (!this.$gate.isSubadmin()) {
                    doc.setFontSize(18);
                    if (this.form.year) {
                        doc.text('Approved Bursary Applications(' + this.form.year + ')', 14, 22);
                    } else {
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
                    if (this.selectedWard) {
                        doc.save(this.mycounty + '|' + this.selectedWard + '.pdf');
                    } else {
                        doc.save(this.mycounty + '.pdf');
                    }
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
            if (this.$gate.isSubofficial()) {
                this.$store.dispatch('getAwarded');
            }
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
