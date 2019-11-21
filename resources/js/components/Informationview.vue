<template>
    <div>
        <div class="text-center pt-2">
            <h3>Student Information</h3>
        </div>
        <div class="row pl-3">
            <img :src="application.passport" alt="" style="width: 200px">
        </div>
        <div class="row">
            <div class="col-md-8">
                <h5 class=" rounded bgc p-2 mt-2 text-center">APPLICANT’S BIO</h5>
            </div>
            <div class="col-md-4">
                <h5 class="rounded p-2 mt-2 text-center bg-a">Attachments</h5>
            </div>
        </div>
        <div class="row">
            <div class="col-md-8">
                <div class="row mx-2 pl-3 pt-2 border border-success rounded">
                    <div class="col-md-4">
                        <p> Official name </p>
                        <p> DOB </p>
                        <p> Gender </p>
                        <p> Reg/Adm No. </p>
                        <p> Tel. </p>
                    </div>
                    <div class="col-md-4">
                        <p> {{application['name']}} </p>
                        <p> {{application['dob']}} </p>
                        <p> {{application['gender']}} </p>
                        <p> {{application['reg_no']}} </p>
                        <p> {{application['tel']}} </p>
                    </div>
                </div>
            </div>
            <div class="col-md-4 pt-5">
                <div class="row">
                    <div class="col-md-8">
                        <p class="rounded p-2 mt-2 text-center bg-b">Aplicant ID/ Birth Cert</p>
                    </div>
                    <div class="col-md-4">
                        <button @click="launch(application['passport'])" class="btn btn-lg bg-success">View</button>
                    </div>
                </div>
            </div>
        </div>
        <div class="row col-md-12">
            <div class="col-md-8">
                <h5 class=" rounded bg-success p-2 mt-2 text-center">FAMILY STATUS</h5>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="row mx-2 pl-3 pt-2 border border-success rounded">
                    <div class="col-md-12" v-for="fam in family" :key="fam.id">
                        <span>Name: </span> <span>{{fam['name']}}</span><br>
                        <span>Relationship: </span> <span>{{fam['relationship']}}</span><br>
                        <span>Status: </span> <span>{{fam['living']}}</span><br>
                        <span>Telephone: </span> <span>{{fam['tel']}}</span><br>
                        <span>Occupation: </span> <span>{{fam['occupation']}}</span><br>
                        <span>Income per Year: </span> <span>{{fam['income']}}</span><br>
                        <hr>
                    </div>
                    <div class="col-md-12">
                        <div class="row col-md-12">
                            <div class="col-md-12">
                                <h5 class=" rounded bg-success p-2 mt-2 text-center">MORE</h5>
                            </div>
                            <div class="col-sm-4">
                                <p>Total No. Siblings </p>
                                <p>Siblings in School </p>
                                <p>Working Siblings </p>
                                <p>Fees Payer </p>
                                <p>Relationship </p>
                            </div>
                            <div class="col-sm-4">
                                <p>{{morefamily['totalSiblings']}}</p>
                                <p>{{morefamily['schoolSiblings']}}</p>
                                <p>{{morefamily['workingSiblings']}}</p>
                                <p>{{morefamily['pFees']}}</p>
                                <p>{{morefamily['pFeesRelationship']}}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4 pt-5">
                <div class="row pt-5" v-for="fam in family" :key="fam.id">
                    <div class="col-md-8">
                        <p class="rounded p-2 mt-2 text-center bg-b">{{fam['relationship']}}'s ID/ Death Cert</p>
                    </div>
                    <div class="col-md-4">
                        <button @click="launch(fam.cert)" class="btn btn-lg bg-success">Views</button>
                    </div>
                </div>
                <div class="row">
                    <div class="box">
                        <div class="box-header">
                            <h4 class="box-title">Letter of Recommendation (Click to download)</h4>
                        </div>
                        <div class="box" style="margin-bottom: 10px;">

                        </div>
                        <div class="box-body">
                            <div class="row">
                                <div class="col-md-6 col-sm-6 col-xs-12" v-for="file in files" :key="file.id">
                                    <a @click.prevent="download(file.id, file.path)">
                                        <div class="info-box">
                                            <span class="info-box-icon" style="background-color: green;"><i
                                                    class="fas fa-download" style="color: white;"></i></span>

                                            <div class="info-box-content">
                                                <span class="info-box-text">Download</span>
                                            </div>
                                            <!-- /.info-box-content -->
                                        </div>
                                    </a>
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
                        v-if="$gate.isSubadmin() && !application.recommendation">Recommendation
                </button>
                <h4 v-if="$gate.isOfficial() && !application.amount && application.status != 2">Award?</h4>
                <h4 v-if="$gate.isOfficial() && application.amount"><b>Awarded:</b> Ksh {{application.amount}}</h4>
                <button type="button" class="btn btn-success" @click="newModal"
                        v-if="$gate.isOfficial() && !application.amount && application.status != 2">Yes
                </button>
                <button type="button" class="btn btn-danger" @click="notAward"
                        v-if="$gate.isOfficial() && !application.amount && application.status != 2">No
                </button>
            </div>
            <div class="col-md-6" v-if="$gate.isSubadmin() && !application.recommendation">
                <div class="form-check form-check-inline">
                    <input v-model="form.recommendation" class="form-check-input" type="radio" name="yes" id="yes"
                           value="Yes"
                           :class="{ 'is-invalid': form.errors.has('yes') }" @click="recommend">
                    <label class="form-check-label">Yes</label>
                </div>
                <div class="form-check form-check-inline">
                    <input v-model="form.recommendation" class="form-check-input" type="radio" name="partially"
                           id="partially" value="Partially"
                           :class="{ 'is-invalid': form.errors.has('partially') }" @click="recommend">
                    <label class="form-check-label">Partially</label>
                </div>
                <div class="form-check form-check-inline">
                    <input v-model="form.recommendation" class="form-check-input" type="radio" name="no" id="no"
                           value="No"
                           :class="{ 'is-invalid': form.errors.has('no') }" @click="recommendNo">
                    <label class="form-check-label" for="inlineRadio1">No</label>
                </div>
                <!-- <button @click="reject()" v-if="$gate.isSubadmin() && (application['status'] == 0)" class="btn btn-danger px-5 offset-md-3" >Reject</button> -->
            </div>
        </div>
        <!-- Modal -->
        <div class="modal fade" id="addnew" tabindex="-1" role="dialog" aria-labelledby="addnewLabel"
             aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <!-- <img :src="'/uploads/' + this.photo" alt="" style="width: 400px;"> -->
                        <img :src="this.photo" alt="" style="width: 400px;">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                    </div>
                </div>
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
        <div class="modal fade" id="recommendation" tabindex="-1" role="dialog" aria-labelledby="addnewLabel"
             aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="addnewLabel">Recommend Amount</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form @submit.prevent="award()">
                        <div class="modal-body">
                            <div class="form-group">
                                <label>Amount</label>
                                <input v-model="form.amount" type="text" name="name"
                                       placeholder="Amount"
                                       class="form-control" :class="{ 'is-invalid': form.errors.has('amount') }">
                                <has-error :form="form" field="amount"></has-error>
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
                form: new Form({
                    recommendation: '',
                    amount: ''
                }),
                formf: new Form({
                    amount: ''
                })
            }

        },
        methods: {
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
            getMyDetails(){
                axios.get("/api/getMyWardId/").then(({data}) => ([this.myWard = data]));
                axios.get("/api/getMyCountyId/").then(({data}) => ([this.myCounty = data]));
            },
            recommend() {
                this.form.reset();
                $('#recommendation').modal('show');
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
                        Swal.fire(
                            'Success!',
                            'Successfully Awarded.',
                            'success'
                        )
                        Fire.$emit('entry');
                        $('#new').modal('hide');
                    }).catch(() => {
                        Swal.fire('Failed!', 'There was something wrong')
                    });
                }

                if (this.$gate.isSubadmin()) {
                    this.form.post("/api/recommendAmount/" + this.application.id).then(() => {
                        Swal.fire(
                            'Success!',
                            'Successfully Awarded.',
                            'success'
                        )
                        Fire.$emit('entry');
                        $('#recommendation').modal('hide');
                    }).catch(error => {
                        this.errors = error.response.data.errors;
                        Swal.fire({
                            type: 'error',
                            title: 'Error!',
                            text: error.response.data.msg
                        })
                    });
                }
            },
            newModal() {
                this.formf.reset();
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
            launch(passport) {
                $('#addnew').modal('show');
                this.photo = passport;
            },
            send() {
                axios.put("/api/send/" + this.applicantId).then(response => {
                    Fire.$emit('AfterCreate');
                    Swal.fire({
                        type: 'success',
                        title: 'Success',
                        text: 'Sent!!',
                        text: 'Sent to Admin!',
                    })
                    this.$router.push('/Information');
                });
            },
            accept() {
                this.$Progress.start();
                axios.put("/api/accept/" + this.applicantId).then(response => {
                    Fire.$emit('AfterCreate');
                    Swal.fire({
                        type: 'success',
                        title: 'Success',
                        text: 'Accept',
                        text: 'Accepted!',
                    })
                    this.$router.push('/Information');
                    this.$Progress.finish();
                });
            },
            reject() {
                this.$Progress.start();
                axios.put("/api/reject/" + this.applicantId).then(response => {
                    Fire.$emit('AfterCreate');
                    Swal.fire({
                        type: 'success',
                        title: 'Success',
                        text: 'Rejected!!',
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
