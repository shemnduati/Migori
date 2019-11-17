<template>
    <div class="">
        <div class="text-center pt-2">
            <h3>Student Information</h3>
        </div>
        <div class="row pl-3">
<!--            <img :src="application['app'].resultslip" alt="" style="width: 200px">-->
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
                        <p> First name </p>
                        <p> Middle name </p>
                        <p> Last name </p>
                        <p> DOB </p>
                        <p> Gender </p>
                        <p> Parent Name </p>
                        <p>Postal Address</p>
                        <p> Tel. </p>
                        <p>Alternative Tel. </p>
                        <p>County</p>
                        <p>Ward</p>
                        <p>Sub-County</p>
                        <p>Location</p>
                        <p>Sub-Location</p>
                        <p>KCPE Index No.</p>
                        <p>KCPE Marks</p>
                        <p>KCPE Year</p>
                        <p>KCPE attempts, how many times, why and scores attained</p>
                        <p>Repeated any class? Which one</p>
                        <p>Name of secondary school of admission</p>
                        <p>School Classification</p>
                    </div>
                    <div class="col-md-4">
                        <p> {{application['app']['firstName']}} </p>
                        <p> {{application['app']['middleName']}} </p>
                        <p> {{application['app']['lastName']}} </p>
                        <p> {{application['app']['dob']}} </p>
                        <p> {{application['app']['gender']}} </p>
                        <p> {{application['app']['parentName']}} </p>
                        <p> {{application['app']['box']}} </p>
                        <p> {{application['app']['tel']}} </p>
                        <p> {{application['app']['alt_tel']}} </p>
                        <p> {{application['County']}} </p>
                        <p> {{application['Ward']}} </p>
                        <p> {{application['app']['subcounty']}} </p>
                        <p> {{application['app']['location']}} </p>
                        <p> {{application['app']['sublocation']}} </p>
                        <p> {{application['app']['indexNo']}} </p>
                        <p> {{application['app']['kcpeMarks']}} </p>
                        <p> {{application['app']['kcpeYear']}} </p>
                        <p> {{application['app']['kcpeQuiz']}} </p><br><br>
                        <p> {{application['app']['repeatQuiz']}} </p><br>
                        <p> {{application['app']['secSchoolName']}} </p><br>
                        <p> {{application['app']['classification']}} </p>
                    </div>
                </div>
            </div>
            <div class="col-md-4 pt-5">
                <div class="row">
                    <div class="col-md-8">
                        <p class="rounded p-2 mt-2 text-center bg-b">Results Slip</p>
                    </div>
                    <div class="col-md-4">
                        <button @click="launch(application['app'].resultslip)" class="btn btn-lg bg-success">View</button>
                    </div>
                </div>
            </div>
        </div>
        <div class="row col-md-12">
            <div class="col-md-8">
                <h5 class=" rounded bg-success p-2 mt-2 text-center">APPLICANT'S FAMILY INFORMATION</h5>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="row mx-2 pl-3 pt-2 border border-success rounded">
                    <div class="col-md-4" v-for="fam in family" :key="fam.id">
                        <span>Relationship: </span> <span style="font-weight: bold">{{fam['who']}}</span><br>
                        <span>First Name: </span> <span>{{fam['firstName']}}</span><br>
                        <span>Middle Name: </span> <span>{{fam['middleName']}}</span><br>
                        <span>Last Name: </span> <span>{{fam['lastName']}}</span><br>
                        <span v-if="fam.living">Status: </span> <span v-if="fam.living">{{fam['living']}}</span><br>
                        <span>Id Number: </span> <span>{{fam['idNumber']}}</span><br>
                        <span>Telephone: </span> <span>{{fam['tel']}}</span><br>
                        <span>Alt Telephone: </span> <span>{{fam['alt_tel']}}</span><br>
                        <span>Occupation: </span> <span>{{fam['occupation']}}</span><br>
                        <p v-if="fam.subcounty">Sub-County: {{fam.subcounty}}</p>
                        <p v-if="fam.location">Location: {{fam.location}}</p>
                        <p v-if="fam.sublocation">Sub-Location: {{fam.sublocation}}</p>
                        <hr>
                    </div>
                    <div class="col-md-12">
                        <div class="col-md-12">
                            <h5 class=" rounded bg-success p-2 mt-2 text-center">SIBLINGS</h5>
                        </div>
                        <div class="row col-md-12">

                            <div class="col-sm-6" v-for="sib in siblings">
                                <p>Name: {{sib.name}} </p>
                                <p>Age: {{sib.age}} </p>
                                <p>School/Employer: {{sib.schoolOrEmployer}} </p>
                                <p>Class/Salary: {{sib.classOrSalary}} </p>
                                <p>Others: {{sib.others}} </p>
                                <hr>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4 pt-5">
                <div class="row pt-5" v-for="fam in family" :key="fam.id">
                    <div class="col-md-8" v-if="fam.cert">
                        <p class="rounded p-2 mt-2 text-center bg-b">{{fam['who']}}'s ID/ Death Cert</p>
                    </div>
                    <div class="col-md-4" v-if="fam.cert">
                        <button @click="launch(fam.cert)" class="btn btn-lg bg-success">Views</button>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-8">
                <h5 class=" rounded bg-blue p-2 mt-2 text-center">APPLICANT'S EVIDENCE OF NEED</h5>
            </div>
        </div>
        <div class="row">
            <div class="col-md-8">
                <div class="row mx-2 pl-3 pt-2 border border-success rounded">
                    <div class="col-md-6">
                        <label>Do you have any form of inheritance from your parents/guardians/grandparents or any other source?</label>
                        <p style="color:blue;">{{evidence.inheritance}}</p>
                    </div>
                    <div class="col-md-6">

                    </div>
                </div>
                <div class="row mx-2 pl-3 pt-2 border border-success rounded">
                    <div class="col-md-6">
                      <label>Why are you applying for a scholarship?</label>
                        <p style="color:blue;">{{evidence.whyApply}}</p>
                    </div>
                    <div class="col-md-6">
                        <label>Have you received any financial
                            support/Bursaries in the past? Please provide
                            documentation</label>
                        <p style="color:blue;">{{evidence.finSupport}}</p>
                    </div>
                </div>
                <div class="row mx-2 pl-3 pt-2 border border-success rounded">
                    <div class="col-md-6">
                        <label>Do you have any special need? For example:
                            Chronic illness, disability. Please provide
                            documentation</label>
                        <p style="color:blue;">{{evidence.specialNeeds}}</p>
                    </div>
                    <div class="col-md-6">
                        <label>Any other cause for special needs? describe:</label>
                        <p style="color:blue;">{{evidence.OtherSpecialNeeds}}</p>
                    </div>
                </div>
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="col-md-8">
                <h5 class=" rounded bg-yellow p-2 mt-2 text-center">PARENT GUARDIAN INFORMATION</h5>
            </div>
        </div>
        <div class="row">
            <div class="col-md-8">
                <div class="row mx-2 pl-3 pt-2 border border-success rounded">
                    <div class="col-md-6" v-for="more in moreEvidence">
                        <h5>{{more.who}}</h5>
                        <label>Age:</label>
                        <p>{{more.age}}</p>
                        <label>Disability:</label>
                        <p>{{more.disability}}</p>
                        <label>Chronic Diseases or Ailment:</label>
                        <p>{{more.ailment}}</p>
                        <label>Abandoned your family:</label>
                        <p>{{more.abandon}}</p>
                        <label>Details of Job and salary per month:</label>
                        <p>{{more.employment}}</p>
                        <label>Own Business:</label>
                        <p>{{more.business}}</p>
                        <label>Land:</label>
                        <p>{{more.land}}</p>
                        <label>Assets:</label>
                        <p>{{more.assets}}</p>
                    <hr>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-8">
                <h5 class=" rounded bg-blue p-2 mt-2 text-center">FAMILY INFORMATION</h5>
            </div>
        </div>
        <div class="row">
            <div class="col-md-8">
                <div class="row mx-2 pl-3 pt-2 border border-success rounded">
                    <div class="col-md-6">
                        <label>Has your family been affected by civil
                            conflict or natural disasters such as flooding,
                            drought, fire, or famine? Describe:</label>
                        <p style="color:blue;">{{evidence.familyConflict}}</p>
                    </div>
                    <div class="col-md-6">
                        <label>What type of house do you live in? Describe</label>
                        <p style="color:blue;">{{evidence.familyHouse}}</p>
                    </div>
                </div>
                <div class="row mx-2 pl-3 pt-2 border border-success rounded">
                    <div class="col-md-6">
                        <label>Please describe any other cause of
                            disadvantage or vulnerability?</label>
                        <p style="color:blue;">{{evidence.otherDisabilities}}</p>
                    </div>
                    <div class="col-md-6">
                        <label>How many siblings are in secondary school,
                            collage and tertiary level.</label>
                        <p style="color:blue;">{{evidence.siblingsInfo}}</p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-8">
                        <h5 class=" rounded bg-blue p-2 mt-2 text-center">HOW DID YOU LEARN:</h5>
                    </div>
                </div>
                <div class="row mx-2 pl-3 pt-2 border border-success rounded">
                    <div class="col-md-6">
                        <label>How did you first learn about the Governor&#39;s scholarship program?</label>
                        <p style="color:blue;">{{evidence.hear}}</p>
                        <p v-if="evidence.hearDetails">Specify: {{evidence.hearDetails}}</p>
                    </div>
                    <div class="col-md-6">

                    </div>
                </div>
            </div>
        </div>
        <div class="modal fade" id="addnew" tabindex="-1" role="dialog" aria-labelledby="addnewLabel"
             aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body" style="height: auto;">
                        <!-- <img :src="'/uploads/' + this.photo" alt="" style="width: 400px;"> -->
                        <img :src="this.photo" alt="" style="width: 700px;">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        name: "ScholarshipAdminDetails",
        data(){
            return{
                applicationId: this.$route.params.applicationId,
                application: {},
                family: {},
                evidence: {},
                moreEvidence:{},
                siblings: {},
                photo: {}
            }
        },
        methods:{
            launch(passport) {
                $('#addnew').modal('show');
                this.photo = passport;
            },
            getApplications() {
                axios.get("/api/scholarshipdetails/" + this.applicationId).then(({data}) => ([this.application = data['application']]));
                axios.get("/api/scholarshipdetails/" + this.applicationId).then(({data}) => ([this.family = data['family']]));
                axios.get("/api/scholarshipdetails/" + this.applicationId).then(({data}) => ([this.evidence = data['evidence']]));
                axios.get("/api/scholarshipdetails/" + this.applicationId).then(({data}) => ([this.moreEvidence = data['moreEvidence']]));
                axios.get("/api/scholarshipdetails/" + this.applicationId).then(({data}) => ([this.siblings = data['siblings']]));
            },
        },
        created() {
            this.getApplications();
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