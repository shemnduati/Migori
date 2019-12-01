<template>
    <div class="container">
        <div class="row mt-5" v-if="$gate.isSubadminOrOfficial() || $gate.isSubofficial()">

            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">County Bursary Applicants Details</h3>

                        <div class="card-tools">
                            <div class="row">
                                <div class="col-sm-6" v-if="$gate.isOfficial()">
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
                                <div class="col-sm-6">
                                    <button type="button" class="btn btn-primary btn-sm" @click="createPDF">
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
                                <th>Name</th>
                                <th>Fathers Name</th>
                                <th>Institution</th>
                                <th>Ward</th>
                                <th>Polling station</th>
                                <th>Fee balance</th>
                                <th v-if="$gate.isOfficial() || $gate.isSubofficial()">Awarded Amount</th>
                                <th v-if="$gate.isSubofficial()">Cheque</th>
                            </tr>
                            <tr v-for="application in applications" :key="application.id">
                                <td>{{application.firstName}} {{application.lastName}}</td>
                                <td>{{application.father}}</td>
                                <td>{{application.institution}}</td>
                                <td>{{application.ward}}</td>
                                <td>{{application.polling}}</td>
                                <td>Ksh. {{application.balance }}</td>
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
        <!-- Modal -->


    </div>
</template>

<script>
    export default {
        data() {
            return {
                applications: {},
                wards: {},
                myward: '',
                mycounty: {},
                selectedWard: '',
                wardsCounty: '',
                mywardy: '',
                form: new Form({
                    type: ''
                })


            }
        },
        methods: {
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

                doc.setFontSize(18);
                doc.text('Approved Bursary Applications', 14, 22);
                doc.setFontSize(11);
                doc.setTextColor(100);

                if (this.$gate.isOfficial()) {
                    doc.setFontSize(15);
                    doc.text(this.mycounty + ' County', 14, 30);
                    doc.setFontSize(11);
                    doc.setTextColor(100);
                }

                if (this.$gate.isSubadmin()) {
                    doc.setFontSize(15);
                    doc.text(this.wardsCounty + ' County', 14, 30);
                    doc.setFontSize(11);
                    doc.setTextColor(100);
                }

                if (this.$gate.isOfficial()) {
                    if (this.selectedWard) {
                        doc.setFontSize(14);
                        doc.text(this.selectedWard + ' Ward', 14, 36);
                        doc.setFontSize(11);
                        doc.setTextColor(100)
                    }
                }

                if (this.$gate.isSubadmin()) {
                    doc.setFontSize(14);
                    doc.text(this.mywardy + ' Ward', 14, 36);
                    doc.setFontSize(11);
                    doc.setTextColor(100)
                }

                doc.autoTable({
                    showHead: 'firstPage',
                    html: '#my-table',
                    startY: 40,
                });
                doc.save('Week' + '.pdf');
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
                if (this.$gate.isOfficial()) {
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
                if (this.$gate.isOfficial()) {
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
            Fire.$on('AfterCreate', () => {
                this.getApplications();
                this.getWards();
            })
        }
    }
</script>
