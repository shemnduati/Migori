<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card" v-if="enable==1">
                    <div class="card-header">Application Component</div>

                    <div class="card-body">
                        <form>

                            <section v-if="step==1">
                                <div class="row justify-content-center">
                                <div class="col-sm-6 justify-content-center">
                                <h3>Type</h3>
                                <div class="form-group">
                                    <label for="type">Bursary Type</label>
                                    <select v-model="form.type" class="form-control" name="type" id="type"
                                            :class="{ 'is-invalid': form.errors.has('type') }">
                                        <option selected value="">--Select Status--</option>
                                        <option value="CDF">CDF</option>
                                        <option value="County">County</option>
                                    </select>
                                    <has-error :form="form" field="type"></has-error>
                                </div>
                                </div>
                            </div>
                            </section>

                            <section v-if="step==2">
                            <h3>PERSONAL DETAILS</h3>

                            <div class="form-row ">
                                <div class="col-md-6">
                                    <div class="form-group">
                                    <label>Name</label>
                                    <input v-model="form.name = info['name']" type="text" name="name"
                                        class="form-control" :class="{ 'is-invalid': form.errors.has('name') }">
                                    <has-error :form="form" field="name"></has-error>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Email</label>
                                        <input v-model="form.email = info['email']" type="email" name="email"
                                            class="form-control" :class="{ 'is-invalid': form.errors.has('email') }">
                                        <has-error :form="form" field="email"></has-error>
                                    </div>
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="col">
                                    <div class="form-group">
                                    <label>ID Number</label>
                                    <input v-model="form.idNo"  type="number" name="idNo" class="form-control" :class="{ 'is-invalid': form.errors.has('idNo') }">
                                    <has-error :form="form" field="idNo"></has-error>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group">
                                        <label>DOB</label>
                                        <input v-model="form.dob" type="date" name="dob"
                                            class="form-control" :class="{ 'is-invalid': form.errors.has('dob') }">
                                        <has-error :form="form" field="dob"></has-error>
                                    </div>
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="col">
                                  <label for="gender">Gender</label><br>
                                <div class="form-check form-check-inline">
                                <input v-model="form.gender" class="form-check-input" type="radio" name="gender" id="gender" value="male"
                                        :class="{ 'is-invalid': form.errors.has('gender') }">
                                <label class="form-check-label" for="inlineRadio1">Male</label>
                                <has-error :form="form" field="gender"></has-error>
                                </div>
                                <div class="form-check form-check-inline">
                                <input v-model="form.gender" class="form-check-input" type="radio" name="gender" id="gender" value="female"
                                          :class="{ 'is-invalid': form.errors.has('gender') }">
                                <label class="form-check-label" for="inlineRadio1">Female</label>
                                <has-error :form="form" field="gender"></has-error>
                                </div>
                                </div>
                                <div class="col">
                                  <div class="form-group">
                                    <label>Telephone</label>
                                    <input v-model="form.telephone" type="tel" pattern="[0-9]" name="telephone"
                                        class="form-control" :class="{ 'is-invalid': form.errors.has('telephone') }">
                                    <has-error :form="form" field="telephone"></has-error>
                                    </div>
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="col">
                                  <div class="form-group">
                                    <label>Reg/Admission Number</label>
                                    <input v-model="form.regNo" type="text" name="regNo"
                                        class="form-control" :class="{ 'is-invalid': form.errors.has('regNo') }">
                                    <has-error :form="form" field="regNo"></has-error>
                                    </div>
                                </div>
                                <div class="col">
                                  <div class="form-group">
                                    <label for="passport">Attach Passport Photo</label>
                                    <input type="file" @change="getPassport" class="form-control-file" id="passport" accept="image/*" :class="{ 'is-invalid': form.errors.has('passport') }">
                                    <has-error :form="form" field="passport"></has-error>
                                  </div>
                                </div>
                            </div>

                            </section>
                            <section v-if="step==3">
                               <h3>Family Background</h3>
                               <div class="form-row">
                                <div class="col">
                                    <div class="form-group">
                                    <label>Father's Name</label>
                                    <input v-model="form.fname" type="text" name="name"
                                        class="form-control" :class="{ 'is-invalid': form.errors.has('fname') }">
                                    <has-error :form="form" field="fname"></has-error>
                                    </div>
                                </div>
                                <div class="col">
                                    <label for="alive">Alive/Dead</label><br>
                                <div class="form-check form-check-inline">
                                <input v-model="form.fliving" class="form-check-input" type="radio" name="fliving" id="fliving" value="Alive"
                                        :class="{ 'is-invalid': form.errors.has('fliving') }">
                                <label class="form-check-label" for="inlineRadio1">Alive</label>
                                <has-error :form="form" field="fliving"></has-error>
                                </div>
                                <div class="form-check form-check-inline">
                                <input v-model="form.fliving" class="form-check-input" type="radio" name="fliving" id="fliving" value="Dead"
                                          :class="{ 'is-invalid': form.errors.has('fliving') }">
                                <label class="form-check-label" for="inlineRadio1">Dead</label>
                                <has-error :form="form" field="fliving"></has-error>
                                </div>
                                </div>
                                <div class="col">
                                    <div class="form-group">
                                    <label for="fpassport">Attach Father’s ID/Death Cert</label>
                                    <input type="file" @change="getFatherId" class="form-control-file" id="fId" accept="image/*" :class="{ 'is-invalid': form.errors.has('fatherId') }">
                                    <has-error :form="form" field="fatherId"></has-error>
                                  </div>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="col">
                                  <div class="form-group">
                                    <label>Occupation</label>
                                    <input v-model="form.foccupation" type="text" name="foccupation"
                                        class="form-control" :class="{ 'is-invalid': form.errors.has('foccupation') }">
                                    <has-error :form="form" field="foccupation"></has-error>
                                    </div>
                                </div>
                                <div class="col">
                                  <div class="form-group">
                                    <label>Telephone</label>
                                    <input v-model="form.ftelephone" type="tel" pattern="[0-9]" name="ftelephone"
                                        class="form-control" :class="{ 'is-invalid': form.errors.has('ftelephone') }">
                                    <has-error :form="form" field="ftelephone"></has-error>
                                    </div>
                                </div>
                                <div class="col">
                                  <div class="form-group">
                                        <label>Income per Year</label>
                                        <input v-model="form.fincome" type="number" name="fincome"
                                            class="form-control" :class="{ 'is-invalid': form.errors.has('fincome') }">
                                        <has-error :form="form" field="fincome"></has-error>
                                    </div>
                                </div>
                              </div>
                              <hr>
                              <div class="form-row">
                                <div class="col">
                                    <div class="form-group">
                                    <label>Mother's Name</label>
                                    <input v-model="form.mname" type="text" name="mname"
                                        class="form-control" :class="{ 'is-invalid': form.errors.has('mname') }">
                                    <has-error :form="form" field="mname"></has-error>
                                    </div>
                                </div>
                                <div class="col">
                                    <label for="alive">Alive/Dead</label><br>
                                <div class="form-check form-check-inline">
                                <input v-model="form.mliving" class="form-check-input" type="radio" name="mliving" id="mliving" value="Alive"
                                        :class="{ 'is-invalid': form.errors.has('mliving') }">
                                <label class="form-check-label" for="inlineRadio1">Alive</label>
                                <has-error :form="form" field="mliving"></has-error>
                                </div>
                                <div class="form-check form-check-inline">
                                <input v-model="form.mliving" class="form-check-input" type="radio" name="mliving" id="mliving" value="Dead"
                                          :class="{ 'is-invalid': form.errors.has('mliving') }">
                                <label class="form-check-label" for="inlineRadio1">Dead</label>
                                <has-error :form="form" field="mliving"></has-error>
                                </div>
                                </div>
                                <div class="col">
                                    <div class="form-group">
                                    <label for="mpassport">Attach Mother’s ID/Death Cert</label>
                                    <input type="file" @change="getMotherId" class="form-control-file" id="mID" accept="image/*" :class="{ 'is-invalid': form.errors.has('motherId') }">
                                    <has-error :form="form" field="motherId"></has-error>
                                  </div>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="col">
                                  <div class="form-group">
                                    <label>Occupation</label>
                                    <input v-model="form.moccupation" type="text" name="moccupation"
                                        class="form-control" :class="{ 'is-invalid': form.errors.has('moccupation') }">
                                    <has-error :form="form" field="moccupation"></has-error>
                                    </div>
                                </div>
                                <div class="col">
                                  <div class="form-group">
                                    <label>Telephone</label>
                                    <input v-model="form.mtelephone" type="tel" pattern="[0-9]" name="mtelephone"
                                        class="form-control" :class="{ 'is-invalid': form.errors.has('mtelephone') }">
                                    <has-error :form="form" field="mtelephone"></has-error>
                                    </div>
                                </div>
                                <div class="col">
                                  <div class="form-group">
                                        <label>Income per Year</label>
                                        <input v-model="form.mincome" type="number" name="mincome"
                                            class="form-control" :class="{ 'is-invalid': form.errors.has('mincome') }">
                                        <has-error :form="form" field="mincome"></has-error>
                                    </div>
                                </div>
                              </div>
                              <hr>
                              <div class="form-row">
                                <div class="col">
                                    <div class="form-group">
                                    <label>Guardian's Name</label>
                                    <input v-model="form.gname" type="text" name="gname"
                                        class="form-control" :class="{ 'is-invalid': form.errors.has('gname') }">
                                    <has-error :form="form" field="gname"></has-error>
                                    </div>
                                </div>
                                <div class="col">
                                    <label for="alive">Alive/Dead</label><br>
                                <div class="form-check form-check-inline">
                                <input v-model="form.gliving" class="form-check-input" type="radio" name="gliving" id="gliving" value="Alive"
                                        :class="{ 'is-invalid': form.errors.has('gliving') }">
                                <label class="form-check-label" for="inlineRadio1">Alive</label>
                                <has-error :form="form" field="gliving"></has-error>
                                </div>
                                <div class="form-check form-check-inline">
                                <input v-model="form.gliving" class="form-check-input" type="radio" name="gliving" id="gliving" value="Dead"
                                          :class="{ 'is-invalid': form.errors.has('gliving') }">
                                <label class="form-check-label" for="inlineRadio1">Dead</label>
                                <has-error :form="form" field="gliving"></has-error>
                                </div>
                                </div>
                                <div class="col">
                                    <div class="form-group">
                                    <label for="gpassport">Attach Guardian’s ID/Death Cert</label>
                                    <input type="file" @change="getGuardianId" class="form-control-file" id="gId" accept="image/*" :class="{ 'is-invalid': form.errors.has('guardianId') }">
                                    <has-error :form="form" field="guardianId"></has-error>
                                  </div>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="col">
                                  <div class="form-group">
                                    <label>Occupation</label>
                                    <input v-model="form.goccupation" type="text" name="goccupation"
                                        class="form-control" :class="{ 'is-invalid': form.errors.has('goccupation') }">
                                    <has-error :form="form" field="goccupation"></has-error>
                                    </div>
                                </div>
                                <div class="col">
                                  <div class="form-group">
                                    <label>Telephone</label>
                                    <input v-model="form.gtelephone" type="tel" pattern="[0-9]" name="gtelephone"
                                        class="form-control" :class="{ 'is-invalid': form.errors.has('gtelephone') }">
                                    <has-error :form="form" field="gtelephone"></has-error>
                                    </div>
                                </div>
                                <div class="col">
                                  <div class="form-group">
                                        <label>Income per Year</label>
                                        <input v-model="form.gincome" type="number" name="gincome"
                                            class="form-control" :class="{ 'is-invalid': form.errors.has('gincome') }">
                                        <has-error :form="form" field="gincome"></has-error>
                                    </div>
                                </div>
                              </div>
                              <hr>
                              <div class="form-row">
                                <div class="col">
                                  <div class="form-group">
                                        <label>TOTAL NUMBER OF SIBLING (S)</label>
                                        <input v-model="form.tSiblings" type="number" name="tSiblings"
                                            class="form-control" min="1" :class="{ 'is-invalid': form.errors.has('tSiblings') }">
                                        <has-error :form="form" field="tSiblings"></has-error>
                                    </div>
                                </div>
                                <div class="col">
                                  <div class="form-group">
                                        <label>SIBLING(S) IN SCHOOL</label>
                                        <input v-model="form.inSchool" type="number" name="inSchool"
                                            class="form-control" min="1" :class="{ 'is-invalid': form.errors.has('inSchool') }">
                                        <has-error :form="form" field="inSchool"></has-error>
                                    </div>
                                </div>
                                <div class="col">
                                  <div class="form-group">
                                        <label>WORKING/BUSINESS</label>
                                        <input v-model="form.sWorking" type="number" name="sWorking"
                                            class="form-control" min="1" :class="{ 'is-invalid': form.errors.has('sWorking') }">
                                        <has-error :form="form" field="sWorking"></has-error>
                                    </div>
                                </div>
                              </div>
                              <div class="form-row">
                                <div class="col">
                                  <div class="form-group">
                                    <label>WHO PAYS YOUR SCHOOL FEES?</label>
                                    <input v-model="form.pFees" type="text" name="pFees"
                                        class="form-control" :class="{ 'is-invalid': form.errors.has('pFees') }">
                                    <has-error :form="form" field="pFees"></has-error>
                                    </div>
                                </div>
                                <div class="col">
                                  <div class="form-group">
                                <label for="relationship">Relationship</label>
                                <select v-model="form.pRelationship" class="form-control" name="pRelationship" id="pRelationship"
                                        :class="{ 'is-invalid': form.errors.has('pRelationship') }">
                                    <option selected value="">--Select Relationship--</option>
                                    <option value="Father">Father</option>
                                    <option value="Mother">Mother</option>
                                    <option value="Guardian">Guardian</option>
                                </select>
                                <has-error :form="form" field="pRelationship"></has-error>
                            </div>
                              </div>
                          </div>
                            </section>
                            <section v-if="step==4">
                               <h3>Geographical Details</h3>
                               <div class="form-row">
                                <div class="col">
                                  <div class="form-group">
                                <label for="county">County</label>
                                <select v-model="form.county" @change='getCountyWards()' class="form-control" name="county" id="county"
                                        :class="{ 'is-invalid': form.errors.has('county') }">
                                    <option selected value="">--Select county--</option>
                                    <option v-for="count in counties" :key="count.id" :value="count.id">{{ count.name}}</option>
                                </select>
                                <has-error :form="form" field="county"></has-error>
                            </div>
                                </div>
                                <div class="col">
                                  <div class="form-group">
                                <label for="ward">Ward</label>
                                <select v-model="form.ward" class="form-control" name="ward" id="ward"
                                        :class="{ 'is-invalid': form.errors.has('ward') }">
                                    <option selected value="">--Select Ward--</option>
                                    <option v-for="wardy in wards" :key="wardy.id" :value="wardy.id">{{ wardy.name}}</option>
                                </select>
                                <has-error :form="form" field="ward"></has-error>
                            </div>
                                </div>
                                <div class="col">
                                  <div class="col">
                                    <div class="form-group">
                                    <label>Constituency</label>
                                    <input v-model="form.constituency" type="text" name="constituency"
                                        class="form-control" :class="{ 'is-invalid': form.errors.has('constituency') }">
                                    <has-error :form="form" field="constituency"></has-error>
                                    </div>
                                </div>
                                </div>
                              </div>
                              <div class="form-row">
                                <div class="col">
                                  <div class="form-group">
                                    <label>Division</label>
                                    <input v-model="form.division" type="text" name="division"
                                        class="form-control" :class="{ 'is-invalid': form.errors.has('division') }">
                                    <has-error :form="form" field="division"></has-error>
                                    </div>
                                </div>
                                <div class="col">
                                  <div class="form-group">
                                    <label>Location</label>
                                    <input v-model="form.location" type="text" name="location"
                                        class="form-control" :class="{ 'is-invalid': form.errors.has('location') }">
                                    <has-error :form="form" field="location"></has-error>
                                    </div>
                                </div>
                              </div>
                               <div class="form-row">
                                <div class="col">
                                  <div class="form-group">
                                    <label>Sub-Location</label>
                                    <input v-model="form.sublocation" type="text" name="sublocation"
                                        class="form-control" :class="{ 'is-invalid': form.errors.has('sublocation') }">
                                    <has-error :form="form" field="sublocation"></has-error>
                                    </div>
                                </div>
                                <div class="col">
                                  <div class="form-group">
                                    <label>Village</label>
                                    <input v-model="form.village" type="text" name="village"
                                        class="form-control" :class="{ 'is-invalid': form.errors.has('village') }">
                                    <has-error :form="form" field="village"></has-error>
                                    </div>
                                </div>
                              </div>
                            </section>
                            <section v-if="step==5">
                               <h3>INSTITUTION AND FEE DETAILS</h3>
                               <div class="form-row">
                                  <div class="col">
                                    <div class="form-group">
                                    <label>Name of Institution</label>
                                    <input v-model="form.iname" type="text" name="iname"
                                        class="form-control" :class="{ 'is-invalid': form.errors.has('iname') }">
                                    <has-error :form="form" field="iname"></has-error>
                                    </div>
                                </div>
                                <div class="col">
                                  <div class="form-group">
                                    <label>Branch/Campus</label>
                                    <input v-model="form.branch" type="text" name="branch"
                                        class="form-control" :class="{ 'is-invalid': form.errors.has('branch') }">
                                    <has-error :form="form" field="branch"></has-error>
                                    </div>
                                </div>
                                <div class="col">
                                  <div class="form-group">
                                    <label>Class/Course</label>
                                    <input v-model="form.class" type="text" name="class"
                                        class="form-control" :class="{ 'is-invalid': form.errors.has('class') }">
                                    <has-error :form="form" field="class"></has-error>
                                    </div>
                                </div>
                                <div class="col">
                                  <div class="form-group">
                                    <label>Year of Study</label>
                                    <input v-model="form.year" type="number" name="year" min="1" max="6" step="1" class="form-control" :class="{ 'is-invalid': form.errors.has('year') }">
                                    <has-error :form="form" field="year"></has-error>
                                    </div>
                                </div>
                              </div>
                              <div class="form-row">
                                <div class="col">
                                  <div class="form-group">
                                        <label>Annual Fees</label>
                                        <input v-model="form.payable" type="number" name="payable"
                                            class="form-control" :class="{ 'is-invalid': form.errors.has('payable') }">
                                        <has-error :form="form" field="payable"></has-error>
                                    </div>
                                </div>
                                <div class="col">
                                  <div class="form-group">
                                        <label>Amount Paid</label>
                                        <input v-model="form.paid" type="number" name="paid"
                                            class="form-control" :class="{ 'is-invalid': form.errors.has('paid') }">
                                        <has-error :form="form" field="paid"></has-error>
                                    </div>
                                </div>
                                <div class="col">
                                  <div class="form-group">
                                        <label>Outstanding Balance</label>
                                        <input v-model="form.balance" type="number" name="balance"
                                            class="form-control" :class="{ 'is-invalid': form.errors.has('balance') }">
                                        <has-error :form="form" field="balance"></has-error>
                                    </div>
                                </div>
                              </div>
                            </section>

                            <button v-if="step != 1" type="button" class="btn btn-primary" @click.prevent="prevStep">Previous Step</button>
                            <button v-if="step != totalSteps" type="button" class="btn btn-primary" @click.prevent="nextStep">Next Step</button>
                            <button v-if="step == 5" type="button" class="btn btn-success" @click.prevent="sendApplication()">Submit Application</button>

                        </form>
                    </div>
                </div>
                <div v-if="enable == 0">
                    <div class="card">
                      <div class="card-header">
                        Aplication Form not Available
                      </div>
                      <div class="card-body">
                        <h5 class="card-title">Application window closed</h5>
                        <p class="card-text">The application window has been clossed for now wait until the window is opened</p>
                        <a href="/" class="btn btn-danger">Go Back Home</a>
                      </div>
                    </div>
                </div>
        </div>
    </div>
</div>
</template>

<script>
    export default {
        data(){
            return{
                step:1,
                totalSteps: 5,
                counties: {},
                wards: {},
                info: {},
                enable:{},
                form: new Form({
                    type:'',
                    name: '',
                    dob: '',
                    email: '',
                    gender:'',
                    telephone: '',
                    regNo:'',
                    class:'',
                    idNo: '',
                    fname:'',
                    fliving:'',
                    foccupation:'',
                    mname:'',
                    mliving:'',
                    moccupation:'',
                    gname:'',
                    gliving:'',
                    goccupation:'',
                    fincome: '',
                    mincome: '',
                    gincome: '',
                    county:'',
                    ward:'',
                    constituency:'',
                    location:'',
                    division:'',
                    sublocation:'',
                    village:'',
                    iname:'',
                    branch:'',
                    year:'',
                    payable:'',
                    paid:'',
                    balance:'',
                    tSiblings:'',
                    inSchool:'',
                    sWorking:'',
                    pFees:'',
                    pRelationship:'',
                    passport: '',
                    fatherId:'',
                    motherId:'',
                    guardianId:'',
                    ftelephone:'',
                    mtelephone:'',
                    gtelephone:'',
                })
            }
        },
        methods:{
            sendApplication(){
               this.form.post('api/apply')
                    .then(() => {
                        Fire.$emit('AfterCreate');
                        Swal.fire({
                          type: 'success',
                          title: 'Submited!!',
                          text: 'Application Submitted Successfully',

                        })
                        this.form.reset();
                        this.$Progress.finish();
                    })
                    .catch(error => {
                        this.errors = error.response.data.errors;
                        Swal.fire({
                          type: 'error',
                          title: 'Error!!',
                          text: error.response.data.msg,

                        })
                    })
            },
            getGuardianId(e){
              let file = e.target.files[0];
                var reader = new FileReader();
                if (file['size'] < 2111775) {
                if (file['type']=='image/png' || file['type']=='image/jpg' || file['type']=='image/jpeg') {
                    reader.onloadend = (file) => {
                    // console.log('Result', reader.result)
                    this.form.guardianId = reader.result;
                }

                reader.readAsDataURL(file);
            }else {
                Swal.fire({
                    type: 'error',
                    title: 'Ooops...',
                    text: 'Only images and pdfs are allowed',
                })
            }

            }else {
                Swal.fire({
                    type: 'error',
                    title: 'Ooops...',
                    text: 'You are uploading a large file',
                })
            }
            },

            getFatherId(e){
                console.log('Father');
              let file = e.target.files[0];
                var reader = new FileReader();
                if (file['size'] < 2111775) {
                if (file['type']=='image/png' || file['type']=='image/jpg' || file['type']=='image/jpeg') {
                    reader.onloadend = (file) => {
                    // console.log('Result', reader.result)
                    this.form.fatherId = reader.result;
                }

                reader.readAsDataURL(file);
            }else {
                Swal.fire({
                    type: 'error',
                    title: 'Ooops...',
                    text: 'Only images and pdfs are allowed',
                })
            }

            }else {
                Swal.fire({
                    type: 'error',
                    title: 'Ooops...',
                    text: 'You are uploading a large file',
                })
            }
            },
            getMotherId(e){
                let file = e.target.files[0];
                var reader = new FileReader();
                if (file['size'] < 2111775) {
                if (file['type']=='image/png' || file['type']=='image/jpg' || file['type']=='image/jpeg') {
                    reader.onloadend = (file) => {
                    // console.log('Result', reader.result)
                    this.form.motherId = reader.result;
                }

                reader.readAsDataURL(file);
            }else {
                Swal.fire({
                    type: 'error',
                    title: 'Ooops...',
                    text: 'Only images and pdfs are allowed',
                })
            }

            }else {
                Swal.fire({
                    type: 'error',
                    title: 'Ooops...',
                    text: 'You are uploading a large file',
                })
            }
           },
           nextStep(){

            if(this.step == 1){
                if (!this.form.type) {
                    // set(type, 'required');
                    this.form.errors.set({
                      type: 'This field is required'

                    })
                    return false;
                }else{
                   this.step++;
                   return false;
                }
            }

            if(this.step == 2){
                if (!this.form.name) {
                    // set(type, 'required');
                    this.form.errors.set({
                      name: 'This field is required'
                    })
                    return false;
                }else if (!this.form.email) {
                    this.form.errors.set({
                      email: 'This field is required'
                    })
                    return false;
                }else if (!this.form.idNo) {
                    this.form.errors.set({
                      idNo: 'This field is required'
                    })
                    return false;
                }else if (!this.form.dob) {
                    this.form.errors.set({
                      dob: 'This field is required'
                    })
                    return false;
                }else if (!this.form.gender) {
                    this.form.errors.set({
                      gender: 'This field is required'
                    })
                    return false;
                }else if (!this.form.telephone) {
                    this.form.errors.set({
                      telephone: 'This field is required'
                    })
                    return false;
                }else if (!this.form.regNo) {
                    this.form.errors.set({
                      regNo: 'This field is required'
                    })
                    return false;
                }else if (!this.form.passport) {
                    this.form.errors.set({
                      passport: 'This field is required'
                    })
                    return false;
                }else{
                    this.step++;
                    return false;
                }
            }

            if(this.step == 3){
                if (!this.form.fname) {
                    // set(type, 'required');
                    this.form.errors.set({
                      fname: 'This field is required'
                    })
                    return false;
                }else if (!this.form.fliving) {
                    this.form.errors.set({
                      fliving: 'This field is required'
                    })
                    return false;
                }else if (!this.form.foccupation) {
                    this.form.errors.set({
                      foccupation: 'This field is required'
                    })
                    return false;
                }else if (!this.form.fincome) {
                    this.form.errors.set({
                      fincome: 'This field is required'
                    })
                    return false;
                }else if (!this.form.ftelephone) {
                    this.form.errors.set({
                      ftelephone: 'This field is required'
                    })
                    return false;
                }else if (!this.form.mtelephone) {
                    this.form.errors.set({
                      mtelephone: 'This field is required'
                    })
                    return false;
                }else if (!this.form.gtelephone) {
                    this.form.errors.set({
                      gtelephone: 'This field is required'
                    })
                    return false;
                }else if (!this.form.mname) {
                    this.form.errors.set({
                      mname: 'This field is required'
                    })
                    return false;
                }else if (!this.form.mliving) {
                    this.form.errors.set({
                      mliving: 'This field is required'
                    })
                    return false;
                }else if (!this.form.moccupation) {
                    this.form.errors.set({
                      moccupation: 'This field is required'
                    })
                    return false;
                }else if (!this.form.mincome) {
                    this.form.errors.set({
                      mincome: 'This field is required'
                    })
                    return false;
                }
                else if (!this.form.gname) {
                    this.form.errors.set({
                      gname: 'This field is required'
                    })
                    return false;
                }else if (!this.form.gliving) {
                    this.form.errors.set({
                      gliving: 'This field is required'
                    })
                    return false;
                }else if (!this.form.goccupation) {
                    this.form.errors.set({
                      goccupation: 'This field is required'
                    })
                    return false;
                }else if (!this.form.gincome) {
                    this.form.errors.set({
                      gincome: 'This field is required'
                    })
                    return false;
                }else if (!this.form.tSiblings) {
                    this.form.errors.set({
                      tSiblings: 'This field is required'
                    })
                    return false;
                }else if (!this.form.inSchool) {
                    this.form.errors.set({
                      inSchool: 'This field is required'
                    })
                    return false;
                }else if (!this.form.sWorking) {
                    this.form.errors.set({
                      sWorking: 'This field is required'
                    })
                    return false;
                }else if (!this.form.pFees) {
                    this.form.errors.set({
                      pFees: 'This field is required'
                    })
                    return false;
                }else if (!this.form.pRelationship) {
                    this.form.errors.set({
                      pRelationship: 'This field is required'
                    })
                    return false;
                }else if (!this.form.fatherId) {
                    this.form.errors.set({
                      fatherId: 'This field is required'
                    })
                    return false;
                }else if (!this.form.motherId) {
                    this.form.errors.set({
                      motherId: 'This field is required'
                    })
                    return false;
                }else if (!this.form.guardianId) {
                    this.form.errors.set({
                      guardianId: 'This field is required'
                    })
                    return false;
                }else{
                    this.step++;
                    return false;
                }
            }

            if(this.step == 4){
                if (!this.form.county) {
                    // set(type, 'required');
                    this.form.errors.set({
                      county: 'This field is required'
                    })
                    return false;
                }else if (!this.form.ward) {
                    this.form.errors.set({
                      ward: 'This field is required'
                    })
                    return false;
                }else if (!this.form.constituency) {
                    this.form.errors.set({
                      constituency: 'This field is required'
                    })
                    return false;
                }else if (!this.form.division) {
                    this.form.errors.set({
                      division: 'This field is required'
                    })
                    return false;
                }else if (!this.form.location) {
                    this.form.errors.set({
                      location: 'This field is required'
                    })
                    return false;
                }else if (!this.form.sublocation) {
                    this.form.errors.set({
                      sublocation: 'This field is required'
                    })
                    return false;
                }else if (!this.form.village) {
                    this.form.errors.set({
                      village: 'This field is required'
                    })
                    return false;
                }else{
                    this.step++;
                    return false;
                }
            }

            if(this.step == 5){
                if (!this.form.iname) {
                    // set(type, 'required');
                    this.form.errors.set({
                      iname: 'This field is required'
                    })
                    return false;
                }else if (!this.form.branch) {
                    this.form.errors.set({
                      branch: 'This field is required'
                    })
                    return false;
                }else if (!this.form.class) {
                    this.form.errors.set({
                      class: 'This field is required'
                    })
                    return false;
                }else if (!this.form.year) {
                    this.form.errors.set({
                      year: 'This field is required'
                    })
                    return false;
                }else if (!this.form.payable) {
                    this.form.errors.set({
                      gender: 'This field is required'
                    })
                    return false;
                }else if (!this.form.paid) {
                    this.form.errors.set({
                      paid: 'This field is required'
                    })
                    return false;
                }else if (!this.form.balance) {
                    this.form.errors.set({
                      balance: 'This field is required'
                    })
                    return false;
                }else{
                    this.step++;
                    return false;
                }
            }
           },
           prevStep(){
            this.step--;
           },
           getCounties(){
              axios.get("api/getcounties").then(({ data }) => ([this.counties = data['counties']]));
           },
           getWards(){
              axios.get("api/getwards").then(({ data }) => ([this.wards = data['wards']]));
           },
           getCountyWards(){
              axios.get("api/getcountywards/" + this.form.county).then(({ data }) => ([this.wards = data['wards']]));
           },
           getPassport(e){
                let file = e.target.files[0];
                var reader = new FileReader();
                console.log(file);

                if (file['size'] < 2111775) {
                if (file['type']=='image/png' || file['type']=='image/jpg' || file['type']=='image/jpeg') {
                    reader.onloadend = (file) => {
                    // console.log('Result', reader.result)
                    this.form.passport = reader.result;
                }

                reader.readAsDataURL(file);
            }else {
                Swal.fire({
                    type: 'error',
                    title: 'Ooops...',
                    text: 'Only images are allowed',
                })
            }

            }else {
                Swal.fire({
                    type: 'error',
                    title: 'Ooops...',
                    text: 'You are uploading a large file',
                })
            }

            },
            getDetails(){
                axios.get("api/getdetails").then(({ data }) => ([this.info = data['user']]));
            },
            getStatus(){
                axios.get("api/status").then(({ data }) => ([this.enable = data['num']]));
            }
        },
        created() {
            this.getCounties();
            this.getWards();
            this.getDetails();
            this.getStatus();
        }
    }
</script>
