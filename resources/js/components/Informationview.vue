<template>
    <div v-if="geographical.show == 1">
        <div class="text-center pt-2">
            <h3>Student Information</h3>
        </div>
        <button @click="$router.go(-1)" type="button" class="btn btn-primary">
            <i class="fa fa-hand-point-left"></i>
            Back
        </button>
        <button @click="print()" id="print" type="button" class="btn btn-primary">
            <i class="fa fa-print"></i>
            Print
        </button>

        <div class="row mt-3">
            <div class="col-lg-8">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="col-md-12">
                                <h5 class=" rounded bgc p-2 mt-2 text-center">APPLICANT’S BIO</h5>
                            </div>
                            <table class="table mb-0 table-borderless">
                                <tbody>
                                <tr>
                                    <th>Application Year</th>
                                    <td>{{application['application_year']}}</td>
                                </tr>
                                <tr>
                                    <th>First Name</th>
                                    <td>{{application['firstName']}}</td>
                                </tr>
                                <tr>
                                    <th>Middle Name</th>
                                    <td>{{application['middleName']}}</td>
                                </tr>
                                <tr>
                                    <th>Last Name</th>
                                    <td>{{application['lastName']}}</td>
                                </tr>
                                <tr>
                                    <th>Date of Birth</th>
                                    <td>{{application['dob']}}</td>
                                </tr>
                                <tr>
                                    <th>Gender</th>
                                    <td>{{application['gender']}}</td>
                                </tr>
                                <tr>
                                    <th>Reg No.</th>
                                    <td>{{application['reg_no']}}</td>
                                </tr>
                                <tr>
                                    <th>Phone</th>
                                    <td>{{application['tel']}}</td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="col-md-12">
                                <h5 class=" rounded bg-success p-2 mt-2 text-center">FAMILY STATUS</h5>
                            </div>
                           <div class="row">
                               <div class="col-sm-6" v-for="fam in family" :key="fam.id">
                                   <div class="card table-responsive">
                                       <table class="table mb-0 table-borderless">
                                           <tbody>
                                           <tr>
                                               <th>Name</th>
                                               <td>{{fam['name']}}</td>
                                           </tr>
                                           <tr>
                                               <th>Relationship</th>
                                               <td>{{fam['relationship']}}</td>
                                           </tr>
                                           <tr>
                                               <th>Status</th>
                                               <td>{{fam['living']}}</td>
                                           </tr>
                                           <tr>
                                               <th>Telephone</th>
                                               <td>{{fam['tel']}}</td>
                                           </tr>
                                           <tr>
                                               <th>Occupation</th>
                                               <td>{{fam['occupation']}}</td>
                                           </tr>
                                           <tr>
                                               <th>Income per Year</th>
                                               <td>Ksh. {{fam['income']}}</td>
                                           </tr>
                                           </tbody>
                                       </table>
                                   </div>
                               </div>
                           </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="col-md-12">
                                <h5 class=" rounded bg-blue p-2 mt-2 text-center">INSTITUTION INFORMATION</h5>
                            </div>
                            <table class="table mb-0 table-borderless">
                                <tbody>
                                <tr>
                                    <th>Institution</th>
                                    <td>{{institution['name']}}</td>
                                </tr>
                                <tr>
                                    <th>Branch</th>
                                    <td>{{application['firstName']}}</td>
                                </tr>
                                <tr>
                                    <th>Year of study</th>
                                    <td>{{application['middleName']}}</td>
                                </tr>
                                <tr>
                                    <th>Last Name</th>
                                    <td>{{application['lastName']}}</td>
                                </tr>
                                <tr>
                                    <th>Date of Birth</th>
                                    <td>{{application['dob']}}</td>
                                </tr>
                                <tr>
                                    <th>Gender</th>
                                    <td>{{application['gender']}}</td>
                                </tr>
                                <tr>
                                    <th>Reg No.</th>
                                    <td>{{application['reg_no']}}</td>
                                </tr>
                                <tr>
                                    <th>Phone</th>
                                    <td>{{application['tel']}}</td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="col-md-12">
                    <h5 class="rounded p-2 mt-2 text-center bg-a">Attachments</h5>
                </div>
                <div class="box">
                    <div class="box-body">
                        <div class="row">
                            <div class="col-md-6 col-sm-6 col-xs-12" v-for="file in files"
                                 :key="file.id">
                                <div class="info-box">
                                    <div class="info-box-content">
                                        <span class="info-box-text"><small>{{file.kind}}</small></span>
                                        <hr>
                                        <button type="button" class="btn btn-primary btn-sm"
                                                @click.prevent="download(file.id, file.path)">
                                            <i class="fas fa-download"></i>
                                        </button>
                                    </div>
                                    <!-- /.info-box-content -->
                                </div>
                                <!-- /.info-box -->
                            </div>
                            <!--                                            <button type="button" class="btn btn-primary" @click="downloadAll">Download all files</button>-->
                        </div>
                    </div>
                    <div class="alert alert-warning alert-dismissible" v-if="files.length == 0">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                        <h5><i class="icon fa fa-ban"></i> Alert!</h5>
                        No files attached!!
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-8">
                <h5 class=" rounded bg-blue p-2 mt-2 text-center">INSTITUTION INFORMATION</h5>
            </div>
        </div>
        <div class="row">
            <div class="col-md-8">
                <div class="row mx-2 pl-3 pt-2 border border-success rounded">
                    <div class="col-md-4">
                        <p>Institution</p>
                        <p> Branch </p>
                        <p> Year of Study </p>
                        <p>Annual Fees </p>
                        <p> Amount Paid </p>
                        <p>Outstanding Balance</p>

                    </div>
                    <div class="col-md-4">
                        <p> {{institution['name']}} </p>
                        <p> {{institution['branch']}} </p>
                        <p> {{institution['yearofstudy']}} </p>
                        <p> {{institution['fees']}} </p>
                        <p> {{institution['amount_paid']}} </p>
                        <p> {{institution['balance']}} </p>
                    </div>
                </div>
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="col-md-8">
                <h5 class=" rounded bg-yellow p-2 mt-2 text-center">GEOGRAPHICAL INFORMATION</h5>
            </div>
        </div>
        <div class="row">
            <div class="col-md-8">
                <div class="row mx-2 pl-3 pt-2 border border-success rounded">
                    <div class="col-md-4">
                        <p>County</p>
                        <p> Division </p>
                        <p> Location </p>
                        <p>Sub-Location </p>
                        <p> Ward </p>
                        <p>Village</p>

                    </div>
                    <div class="col-md-4">
                        <p> {{geographical['County']}} </p>
                        <p> {{geographical['Division']}} </p>
                        <p> {{geographical['Location']}} </p>
                        <p> {{geographical['Sublocation']}} </p>
                        <p> {{geographical['Ward']}} </p>
                        <p> {{geographical['Village']}} </p>
                    </div>
                </div>
            </div>
        </div>
        <hr>
        <div class="row mb-3">
            <div class="col-md-6">
                <button class="btn btn-success px-5 offset-md-1"
                        v-if="$gate.isSubadmin() && !application.recommendation && geographical.show == 1">
                    Recommendation
                </button>
                <h4 v-if="$gate.isOfficial() && application.awarded == 0">Award?</h4>
                <h4 v-if="$gate.isOfficial() && application.awarded == 1"><b>Awarded:</b> Ksh {{application.amount}}</h4>
                <button type="button" class="btn btn-success" @click="newModal"
                        v-if="$gate.isOfficial() && application.awarded == 0">Yes
                </button>
                <button type="button" class="btn btn-danger" @click="notAward"
                        v-if="$gate.isOfficial() && application.awarded == 0">No
                </button>
            </div>
            <div class="col-md-6" v-if="$gate.isSubadmin() && !application.recommendation && geographical.show == 1">
                <div class="form-check form-check-inline">
                    <input v-model="form.recommendation" class="form-check-input" type="radio" name="yes" id="yes"
                           value="Yes"
                           :class="{ 'is-invalid': form.errors.has('yes') }" @click="recommendApplication">
                    <label class="form-check-label">Yes</label>
                </div>
                <div class="form-check form-check-inline">
                    <input v-model="form.recommendation" class="form-check-input" type="radio" name="partially"
                           id="partially" value="Partially"
                           :class="{ 'is-invalid': form.errors.has('partially') }" @click="recommendApplication">
                    <label class="form-check-label">Partially</label>
                </div>
                <div class="form-check form-check-inline">
                    <input v-model="form.recommendation" class="form-check-input" type="radio" name="no" id="no"
                           value="No"
                           :class="{ 'is-invalid': form.errors.has('no') }" @click="recommendNo">
                    <label class="form-check-label">No</label>
                </div>
                <!-- <button @click="reject()" v-if="$gate.isSubadmin() && (application['status'] == 0)" class="btn btn-danger px-5 offset-md-3" >Reject</button> -->
            </div>
        </div>
        <div class="modal fade" id="new" tabindex="-1" role="dialog" aria-labelledby="addnewLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="addnewLabel">Award</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form @submit.prevent="award()">
                        <div class="modal-body">
                            <div class="form-group">
                                <label>Amount</label>
                                <input v-model="formf.amount" type="text" name="name"
                                       placeholder="Amount"
                                       class="form-control" :class="{ 'is-invalid': formf.errors.has('amount') }">
                                <has-error :form="formf" field="amount"></has-error>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-success">
                                <i class="fas fa-save"></i>
                                Save
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div v-else>
        <div class="container pt-4">
            <h3 style="color: red;">Not authorized</h3>
        </div>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                applicantId: this.$route.params.applicationId,
                application: {},
                family: {},
                morefamily: {},
                geographical: {},
                institution: {},
                photo: '',
                myWard: '',
                myCounty: '',
                files: '',
                form: new Form({
                    recommendation: '',
                }),
                formf: new Form({
                    amount: ''
                })
            }

        },
        methods: {
            print(){
                window.print();
            },
            recommendApplication() {
                if (this.$gate.isSubadmin()) {
                    Swal.fire({
                        title: 'Are you sure?',
                        text: "You won't be able to revert this!",
                        //type: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'Yes!'
                    }).then((result) => {
                        if (result.value) {
                            this.form.post("/api/recommendapp/" + this.application.id).then(() => {
                                this.$store.dispatch('getBursarySub');
                                this.getApplications();
                                Swal.fire(
                                    'Success!',
                                    'Operation successful.',
                                    'success'
                                )
                                Fire.$emit('entry');
                            }).catch(() => {
                                Swal.fire('Failed!', 'There was something wrong')
                            });
                        }
                    })
                }
            },
            download(id, path) {
                axios.get("/api/download/" + id, {responseType: 'blob'})
                    .then((response) => {
                        var fileURL = window.URL.createObjectURL(new Blob([response.data]));
                        var fileLink = document.createElement('a');
                        console.log(fileLink);
                        fileLink.href = fileURL;
                        fileLink.setAttribute('download', path.substring(8));
                        document.body.appendChild(fileLink);
                        fileLink.click();
                    });
            },
            getFiles() {
                axios.get("/api/getfiles/" + this.applicantId).then(({data}) => ([this.files = data]));
            },
            getMyDetails() {
                axios.get("/api/getMyWardId/").then(({data}) => ([this.myWard = data]));
                axios.get("/api/getMyCountyId/").then(({data}) => ([this.myCounty = data]));
            },
            notAward() {
                Swal.fire({
                    title: 'Are you sure?',
                    text: "You won't be able to revert this!",
                    //type: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes!'
                }).then((result) => {
                    if (result.value) {
                        this.form.post("/api/notaward/" + this.application.id).then(() => {
                            this.$store.dispatch('getBursaryOfficial');
                            Swal.fire(
                                'Success!',
                                'Operation successful.',
                                'success'
                            )
                            Fire.$emit('entry');
                        }).catch(() => {
                            Swal.fire('Failed!', 'There was something wrong')
                        });
                    }
                })
            },
            award() {
                if (this.$gate.isOfficial()) {
                    this.formf.post("/api/award/" + this.application.id).then(() => {
                        this.$store.dispatch('getBursaryOfficial');
                        Swal.fire(
                            'Success!',
                            'Successfully Awarded.',
                            'success'
                        );
                        Fire.$emit('entry');
                        $('#new').modal('hide');
                    }).catch(() => {
                        Swal.fire('Failed!', 'There was something wrong')
                    });
                }
            },
            newModal() {
                this.formf.reset();
                this.formf.clear();
                $('#new').modal('show');
            },
            recommendNo() {
                Swal.fire({
                    title: 'Are you sure?',
                    text: "You won't be able to revert this!",
                    //type: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes!'
                }).then((result) => {
                    if (result.value) {
                        this.form.post("/api/recommend/" + this.application.id).then(() => {
                            this.$store.dispatch('getBursarySub');
                            Swal.fire(
                                'Success!',
                                'Operation successful.',
                                'success'
                            )
                            Fire.$emit('entry');
                        }).catch(() => {
                            Swal.fire('Failed!', 'There was something wrong')
                        });
                    }
                })
            },
            getApplications() {
                axios.get("/api/getappdetails/" + this.applicantId).then(({data}) => ([this.application = data['application']]));
                axios.get("/api/getappdetails/" + this.applicantId).then(({data}) => ([this.family = data['family']]));
                axios.get("/api/getappdetails/" + this.applicantId).then(({data}) => ([this.morefamily = data['morefamily']]));
                axios.get("/api/getappdetails/" + this.applicantId).then(({data}) => ([this.geographical = data['geographical']]));
                axios.get("/api/getappdetails/" + this.applicantId).then(({data}) => ([this.institution = data['institution']]));
            },
            send() {
                axios.put("/api/send/" + this.applicantId).then(response => {
                    Fire.$emit('AfterCreate');
                    Swal.fire({
                        type: 'success',
                        title: 'Success',
                        text: 'Sent!!',
                    })
                    this.$router.push('/Information');
                });
            },
            accept() {
                this.$Progress.start();
                axios.put("/api/accept/" + this.applicantId).then(response => {
                    this.$store.dispatch('getBursarySub');
                    Fire.$emit('AfterCreate');
                    Swal.fire({
                        type: 'success',
                        title: 'Success',
                        text: 'Accepted!',
                    })
                    this.$router.push('/Information');
                    this.$Progress.finish();
                });
            },
            reject() {
                this.$Progress.start();
                axios.put("/api/reject/" + this.applicantId).then(response => {
                    this.$store.dispatch('getBursarySub');
                    Fire.$emit('AfterCreate');
                    Swal.fire({
                        type: 'success',
                        title: 'Rejected!!',
                        text: 'You rejected the application',
                    })
                    this.$router.push('/Information');
                    his.$Progress.finish();
                });
            }
        },
        created() {
            this.getApplications();
            this.getMyDetails();
            this.getFiles();
            Fire.$on('entry', () => {
                this.getApplications();
            })
        }
    }
</script>

<style scoped>
    .bg-b {
        background-color: #bfbfbf;
    }

    .bg-a {
        background-color: #77933c;
    }

    .bgc {
        background-color: #1db5b5;

    }
</style>
