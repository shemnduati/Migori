<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">County Bursary Application</h3>
                    </div>
                    <div class="card-body">
                        <form autocomplete="off">
                            <section v-if="step==1">
                                <div class="row justify-content-center">
                                    <div class="col-sm-6 justify-content-center">
                                        <div class="form-group">
                                            <div class="col">
                                                <label>Select Application Year</label>
                                                <select v-model="form.yearz" class="form-control" name="yearz"
                                                        :class="{ 'is-invalid': form.errors.has('yearz') }">
                                                    <option selected value="">--Select Application Year--</option>
                                                    <option v-for="year in yearz" :key="year.id" :value="year.year">
                                                        {{
                                                        year.year}}
                                                    </option>
                                                </select>
                                                <has-error :form="form" field="year"></has-error>
                                                <small style="color: red" v-if="error && errors.year">{{ errors.year[0] }}</small>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <hr>
                                <p class="text-right">
                                <button type="button" class="btn btn-primary"
                                        @click.prevent="nextStep">Next Step
                                </button>
                                </p>
                            </section>
                            <section v-if="step==2">
                                <h3>PERSONAL DETAILS</h3>

                                <div class="form-row ">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>First/Baptismal Name</label>
                                            <input v-model="form.firstName" type="text" name="firstName"
                                                   class="form-control"
                                                   :class="{ 'is-invalid': form.errors.has('firstName') }">
                                            <has-error :form="form" field="firstName"></has-error>
                                            <small style="color: red" v-if="error && errors.firstName">{{ errors.firstName[0] }}</small>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Middle Name</label>
                                            <input v-model="form.middleName" type="text" name="middleName"
                                                   class="form-control"
                                                   :class="{ 'is-invalid': form.errors.has('middleName') }">
                                            <has-error :form="form" field="middleName"></has-error>
                                            <small style="color: red" v-if="error && errors.middleName">{{ errors.middleName[0] }}</small>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Surname/ Family Name</label>
                                            <input v-model="form.lastName" type="text" name="lastName"
                                                   class="form-control"
                                                   :class="{ 'is-invalid': form.errors.has('lastName') }">
                                            <has-error :form="form" field="lastName"></has-error>
                                            <small style="color: red" v-if="error && errors.lastName">{{ errors.lastName[0] }}</small>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-row">
                                    <div class="col">
                                        <div class="form-group">
                                            <label>ID Number</label>
                                            <input v-model="form.idNo" type="number" name="idNo" class="form-control"
                                                   :class="{ 'is-invalid': form.errors.has('idNo') }">
                                            <has-error :form="form" field="idNo"></has-error>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-group">
                                            <label>Email</label>
                                            <input v-model="form.email = info['email']" type="email" name="email"
                                                   class="form-control"
                                                   :class="{ 'is-invalid': form.errors.has('email') }">
                                            <has-error :form="form" field="email"></has-error>
                                            <small style="color: red" v-if="error && errors.email">{{ errors.email[0] }}</small>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-group">
                                            <label>DOB</label>
                                            <input v-model="form.dob" type="date" name="dob"
                                                   class="form-control"
                                                   :class="{ 'is-invalid': form.errors.has('dob') }">
                                            <has-error :form="form" field="dob"></has-error>
                                            <small style="color: red" v-if="error && errors.dob">{{ errors.dob[0] }}</small>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-row">
                                    <div class="col">
                                        <label for="gender">Gender</label><br>
                                        <div class="form-check form-check-inline">
                                            <input v-model="form.gender" class="form-check-input" type="radio"
                                                   name="gender" id="gender" value="male"
                                                   :class="{ 'is-invalid': form.errors.has('gender') }">
                                            <label class="form-check-label">Male</label>
                                            <has-error :form="form" field="gender"></has-error>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input v-model="form.gender" class="form-check-input" type="radio"
                                                   name="gender" value="female"
                                                   :class="{ 'is-invalid': form.errors.has('gender') }">
                                            <label class="form-check-label">Female</label>
                                            <has-error :form="form" field="gender"></has-error>
                                        </div>
                                        <small style="color: red" v-if="error && errors.gender">{{ errors.gender[0] }}</small>
                                    </div>
                                    <div class="col">
                                        <div class="form-group">
                                            <label>Telephone</label>
                                            <VuePhoneNumberInput v-model="form.telephone" default-country-code="KE"/>
                                            <small style="color: red;">{{e_telephone}}</small>
                                            <small style="color: red" v-if="error && errors.telephone">{{ errors.telephone[0] }}</small>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-row">
                                    <div class="col">
                                        <div class="form-group">
                                            <label>Reg/Admission Number</label>
                                            <input v-model="form.regNo" type="text" name="regNo"
                                                   class="form-control"
                                                   :class="{ 'is-invalid': form.errors.has('regNo') }">
                                            <has-error :form="form" field="regNo"></has-error>
                                            <small style="color: red" v-if="error && errors.regNo">{{ errors.regNo[0] }}</small>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-group">
                                            <label for="passport">Attach Passport Photo</label>
                                            <input type="file" @change="fieldChange($event, 1)" class="form-control-file"
                                                   id="passport" accept="image/*, application/pdf, application/vnd.openxmlformats-officedocument.wordprocessingml.document(.docx)"
                                                   :class="{ 'is-invalid': form.errors.has('passport') }">
                                            <has-error :form="form" field="passport"></has-error>
                                            <small style="color: red" v-if="error && errors.passport">{{ errors.passport[0] }}</small>
                                        </div>
                                    </div>
                                </div>
                                <hr>
                                <p class="text-right">
                                    <button type="button" class="btn btn-primary " @click.prevent="prevStep">
                                        Previous Step
                                    </button>
                                    <button type="button" class="btn btn-primary"
                                            @click.prevent="nextStep">Next Step
                                    </button>
                                </p>
                            </section>
                            <section v-if="step==3">
                                <h3>Family Background</h3>
                                <div class="form-row">
                                    <div class="col">
                                        <div class="form-group">
                                            <label>Father's Name</label>
                                            <input v-model="form.fname" type="text" name="name"
                                                   class="form-control"
                                                   :class="{ 'is-invalid': form.errors.has('fname') }">
                                            <has-error :form="form" field="fname"></has-error>
                                            <small style="color: red" v-if="error && errors.fname">{{ errors.fname[0] }}</small>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <label>Alive/Dead</label><br>
                                        <div class="form-check form-check-inline">
                                            <input v-model="form.fliving" class="form-check-input" type="radio"
                                                   name="fliving" value="Alive"
                                                   :class="{ 'is-invalid': form.errors.has('fliving') }">
                                            <label class="form-check-label">Alive</label>
                                            <has-error :form="form" field="fliving"></has-error>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input v-model="form.fliving" class="form-check-input" type="radio"
                                                   name="fliving" id="fliving" value="Dead"
                                                   :class="{ 'is-invalid': form.errors.has('fliving') }">
                                            <label class="form-check-label">Dead</label>
                                            <has-error :form="form" field="fliving"></has-error>
                                        </div>
                                        <small style="color: red" v-if="error && errors.fliving">{{ errors.fliving[0] }}</small>
                                    </div>
                                    <div class="col">
                                        <div class="form-group">
                                            <label>Attach Father’s ID/Death Cert</label>
                                            <input type="file" @change="fieldChange($event, 2)" class="form-control-file" id="fId"
                                                   accept="image/*, application/pdf, application/vnd.openxmlformats-officedocument.wordprocessingml.document(.docx)"
                                                   :class="{ 'is-invalid': form.errors.has('fatherId') }">
                                            <has-error :form="form" field="fatherId"></has-error>
                                            <small style="color: red" v-if="error && errors.fatherId">{{ errors.fatherId[0] }}</small>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="col">
                                        <div class="form-group">
                                            <label>Occupation</label>
                                            <input v-model="form.foccupation" type="text" name="foccupation"
                                                   class="form-control"
                                                   :class="{ 'is-invalid': form.errors.has('foccupation') }">
                                            <has-error :form="form" field="foccupation"></has-error>
                                            <small style="color: red" v-if="error && errors.foccupation">{{ errors.foccupation[0] }}</small>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-group">
                                            <label>Telephone</label>
                                            <VuePhoneNumberInput v-model="form.ftelephone" default-country-code="KE"/>
                                            <small style="color: red;">{{e_ftelephone}}</small>
                                            <small style="color: red" v-if="error && errors.ftelephone">{{ errors.ftelephone[0] }}</small>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-group">
                                            <label>Income per Year</label>
                                            <input v-model="form.fincome" type="number" name="fincome"
                                                   class="form-control"
                                                   :class="{ 'is-invalid': form.errors.has('fincome') }">
                                            <has-error :form="form" field="fincome"></has-error>
                                            <small style="color: red" v-if="error && errors.fincome">{{ errors.fincome[0] }}</small>
                                        </div>
                                    </div>
                                </div>
                                <hr>
                                <div class="form-row">
                                    <div class="col">
                                        <div class="form-group">
                                            <label>Mother's Name</label>
                                            <input v-model="form.mname" type="text" name="mname"
                                                   class="form-control"
                                                   :class="{ 'is-invalid': form.errors.has('mname') }">
                                            <has-error :form="form" field="mname"></has-error>
                                            <small style="color: red" v-if="error && errors.mname">{{ errors.mname[0] }}</small>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <label>Alive/Dead</label><br>
                                        <div class="form-check form-check-inline">
                                            <input v-model="form.mliving" class="form-check-input" type="radio"
                                                   name="mliving" value="Alive"
                                                   :class="{ 'is-invalid': form.errors.has('mliving') }">
                                            <label class="form-check-label">Alive</label>
                                            <has-error :form="form" field="mliving"></has-error>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input v-model="form.mliving" class="form-check-input" type="radio"
                                                   name="mliving" id="mliving" value="Dead"
                                                   :class="{ 'is-invalid': form.errors.has('mliving') }">
                                            <label class="form-check-label">Dead</label>
                                            <has-error :form="form" field="mliving"></has-error>
                                        </div>
                                        <small style="color: red" v-if="error && errors.mliving">{{ errors.mliving[0] }}</small>
                                    </div>
                                    <div class="col">
                                        <div class="form-group">
                                            <label>Attach Mother’s ID/Death Cert</label>
                                            <input type="file" @change="fieldChange($event, 3)" class="form-control-file" id="mID"
                                                   accept="image/*, application/pdf, application/vnd.openxmlformats-officedocument.wordprocessingml.document(.docx)"
                                                   :class="{ 'is-invalid': form.errors.has('motherId') }">
                                            <has-error :form="form" field="motherId"></has-error>
                                            <small style="color: red" v-if="error && errors.motherId">{{ errors.motherId[0] }}</small>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="col">
                                        <div class="form-group">
                                            <label>Occupation</label>
                                            <input v-model="form.moccupation" type="text" name="moccupation"
                                                   class="form-control"
                                                   :class="{ 'is-invalid': form.errors.has('moccupation') }">
                                            <has-error :form="form" field="moccupation"></has-error>
                                            <small style="color: red" v-if="error && errors.moccupation">{{ errors.moccupation[0] }}</small>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-group">
                                            <label>Telephone</label>
                                            <VuePhoneNumberInput v-model="form.mtelephone" default-country-code="KE"/>
                                            <small style="color: red;">{{e_mtelephone}}</small>
                                            <small style="color: red" v-if="error && errors.mtelephone">{{ errors.mtelephone[0] }}</small>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-group">
                                            <label>Income per Year</label>
                                            <input v-model="form.mincome" type="number" name="mincome"
                                                   class="form-control"
                                                   :class="{ 'is-invalid': form.errors.has('mincome') }">
                                            <has-error :form="form" field="mincome"></has-error>
                                            <small style="color: red" v-if="error && errors.mincome">{{ errors.mincome[0] }}</small>
                                        </div>
                                    </div>
                                </div>
                                <hr>
                                <div class="form-row">
                                    <div class="col">
                                        <div class="form-group">
                                            <label>Guardian's Name</label>
                                            <input v-model="form.gname" type="text" name="gname"
                                                   class="form-control"
                                                   :class="{ 'is-invalid': form.errors.has('gname') }">
                                            <has-error :form="form" field="gname"></has-error>
                                            <small style="color: red" v-if="error && errors.gname">{{ errors.gname[0] }}</small>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <label>Alive/Dead</label><br>
                                        <div class="form-check form-check-inline">
                                            <input v-model="form.gliving" class="form-check-input" type="radio"
                                                   name="gliving" value="Alive"
                                                   :class="{ 'is-invalid': form.errors.has('gliving') }">
                                            <label class="form-check-label">Alive</label>
                                            <has-error :form="form" field="gliving"></has-error>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input v-model="form.gliving" class="form-check-input" type="radio"
                                                   name="gliving" value="Dead"
                                                   :class="{ 'is-invalid': form.errors.has('gliving') }">
                                            <label class="form-check-label">Dead</label>
                                            <has-error :form="form" field="gliving"></has-error>
                                            <small style="color: red" v-if="error && errors.gliving">{{ errors.gliving[0] }}</small>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-group">
                                            <label>Attach Guardian’s ID/Death Cert</label>
                                            <input type="file" @change="fieldChange($event, 4)" class="form-control-file"
                                                   id="gId" accept="image/*, application/pdf, application/vnd.openxmlformats-officedocument.wordprocessingml.document(.docx)"
                                                   :class="{ 'is-invalid': form.errors.has('guardianId') }">
                                            <has-error :form="form" field="guardianId"></has-error>
                                            <small style="color: red" v-if="error && errors.guardianId">{{ errors.guardianId[0] }}</small>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="col">
                                        <div class="form-group">
                                            <label>Occupation</label>
                                            <input v-model="form.goccupation" type="text" name="goccupation"
                                                   class="form-control"
                                                   :class="{ 'is-invalid': form.errors.has('goccupation') }">
                                            <has-error :form="form" field="goccupation"></has-error>
                                            <small style="color: red" v-if="error && errors.goccupation">{{ errors.goccupation[0] }}</small>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-group">
                                            <label>Telephone</label>
                                            <VuePhoneNumberInput v-model="form.gtelephone" default-country-code="KE"/>
                                            <small style="color: red;">{{e_gtelephone}}</small>
                                            <small style="color: red" v-if="error && errors.gtelephone">{{ errors.gtelephone[0] }}</small>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-group">
                                            <label>Income per Year</label>
                                            <input v-model="form.gincome" type="number" name="gincome"
                                                   class="form-control"
                                                   :class="{ 'is-invalid': form.errors.has('gincome') }">
                                            <has-error :form="form" field="gincome"></has-error>
                                            <small style="color: red" v-if="error && errors.gincome">{{ errors.gincome[0] }}</small>
                                        </div>
                                    </div>
                                </div>
                                <hr>
                                <div class="form-row">
                                    <div class="col">
                                        <div class="form-group">
                                            <label>TOTAL NUMBER OF SIBLING (S)</label>
                                            <input v-model="form.tSiblings" type="number" name="tSiblings"
                                                   class="form-control" min="1"
                                                   :class="{ 'is-invalid': form.errors.has('tSiblings') }">
                                            <has-error :form="form" field="tSiblings"></has-error>
                                            <small style="color: red" v-if="error && errors.tSiblings">{{ errors.tSiblings[0] }}</small>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-group">
                                            <label>SIBLING(S) IN SCHOOL</label>
                                            <input v-model="form.inSchool" type="number" name="inSchool"
                                                   class="form-control" min="1"
                                                   :class="{ 'is-invalid': form.errors.has('inSchool') }">
                                            <has-error :form="form" field="inSchool"></has-error>
                                            <small style="color: red" v-if="error && errors.inSchool">{{ errors.inSchool[0] }}</small>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-group">
                                            <label>WORKING/BUSINESS</label>
                                            <input v-model="form.sWorking" type="number" name="sWorking"
                                                   class="form-control" min="1"
                                                   :class="{ 'is-invalid': form.errors.has('sWorking') }">
                                            <has-error :form="form" field="sWorking"></has-error>
                                            <small style="color: red" v-if="error && errors.sWorking">{{ errors.sWorking[0] }}</small>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="col">
                                        <div class="form-group">
                                            <label>WHO PAYS YOUR SCHOOL FEES?</label>
                                            <input v-model="form.pFees" type="text" name="pFees"
                                                   class="form-control"
                                                   :class="{ 'is-invalid': form.errors.has('pFees') }">
                                            <has-error :form="form" field="pFees"></has-error>
                                            <small style="color: red" v-if="error && errors.pFees">{{ errors.pFees[0] }}</small>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-group">
                                            <label>Relationship</label>
                                            <select v-model="form.pRelationship" class="form-control"
                                                    name="pRelationship" id="pRelationship"
                                                    :class="{ 'is-invalid': form.errors.has('pRelationship') }">
                                                <option selected value="">--Select Relationship--</option>
                                                <option value="Father">Father</option>
                                                <option value="Mother">Mother</option>
                                                <option value="Guardian">Guardian</option>
                                            </select>
                                            <has-error :form="form" field="pRelationship"></has-error>
                                            <small style="color: red" v-if="error && errors.pRelationship">{{ errors.pRelationship[0] }}</small>
                                        </div>
                                    </div>
                                </div>
                                <hr>
                                <p class="text-right">
                                    <button type="button" class="btn btn-primary " @click.prevent="prevStep">
                                        Previous Step
                                    </button>
                                    <button type="button" class="btn btn-primary"
                                            @click.prevent="nextStep">Next Step
                                    </button>
                                </p>
                            </section>
                            <section v-if="step==4">
                                <h3>Geographical Details</h3>
                                <div class="form-row">

                                    <div class="col">
                                        <div class="form-group">
                                            <label for="ward">Ward</label>
                                            <select v-model="form.ward" class="form-control" name="ward" id="ward"
                                                    :class="{ 'is-invalid': form.errors.has('ward') }">
                                                <option selected value="">--Select Ward--</option>
                                                <option v-for="wardy in wards" :key="wardy.id" :value="wardy.id">{{
                                                    wardy.name}}
                                                </option>
                                            </select>
                                            <has-error :form="form" field="ward"></has-error>
                                            <small style="color: red" v-if="error && errors.ward">{{ errors.ward[0] }}</small>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="col">
                                            <div class="form-group">
                                                <label>Constituency</label>
                                                <input v-model="form.constituency" type="text" name="constituency"
                                                       class="form-control"
                                                       :class="{ 'is-invalid': form.errors.has('constituency') }">
                                                <has-error :form="form" field="constituency"></has-error>
                                                <small style="color: red" v-if="error && errors.constituency">{{ errors.constituency[0] }}</small>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="col">
                                        <div class="form-group">
                                            <label>Division</label>
                                            <input v-model="form.division" type="text" name="division"
                                                   class="form-control"
                                                   :class="{ 'is-invalid': form.errors.has('division') }">
                                            <has-error :form="form" field="division"></has-error>
                                            <small style="color: red" v-if="error && errors.division">{{ errors.division[0] }}</small>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-group">
                                            <label>Location</label>
                                            <input v-model="form.location" type="text" name="location"
                                                   class="form-control"
                                                   :class="{ 'is-invalid': form.errors.has('location') }">
                                            <has-error :form="form" field="location"></has-error>
                                            <small style="color: red" v-if="error && errors.location">{{ errors.location[0] }}</small>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="col">
                                        <div class="form-group">
                                            <label>Sub-Location</label>
                                            <input v-model="form.sublocation" type="text" name="sublocation"
                                                   class="form-control"
                                                   :class="{ 'is-invalid': form.errors.has('sublocation') }">
                                            <has-error :form="form" field="sublocation"></has-error>
                                            <small style="color: red" v-if="error && errors.sublocation">{{ errors.sublocation[0] }}</small>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-group">
                                            <label>Village</label>
                                            <input v-model="form.village" type="text" name="village"
                                                   class="form-control"
                                                   :class="{ 'is-invalid': form.errors.has('village') }">
                                            <has-error :form="form" field="village"></has-error>
                                            <small style="color: red" v-if="error && errors.village">{{ errors.village[0] }}</small>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-group">
                                            <label>Polling Station</label>
                                            <input v-model="form.polling" type="text" name="polling"
                                                   class="form-control"
                                                   :class="{ 'is-invalid': form.errors.has('polling') }">
                                            <has-error :form="form" field="polling"></has-error>
                                            <small style="color: red" v-if="error && errors.polling">{{ errors.polling[0] }}</small>
                                        </div>
                                    </div>
                                </div>
                                <hr>
                                <p class="text-right">
                                    <button type="button" class="btn btn-primary " @click.prevent="prevStep">
                                        Previous Step
                                    </button>
                                    <button type="button" class="btn btn-primary"
                                            @click.prevent="nextStep">Next Step
                                    </button>
                                </p>
                            </section>
                            <section v-if="step==5">
                                <h3>INSTITUTION AND FEE DETAILS</h3>
                                <div class="form-row">
                                    <div class="col">
                                        <div class="form-group">
                                            <label>Name of Institution</label>
                                            <input v-model="form.iname" type="text" name="iname"
                                                   class="form-control"
                                                   :class="{ 'is-invalid': form.errors.has('iname') }">
                                            <has-error :form="form" field="iname"></has-error>
                                            <small style="color: red" v-if="error && errors.iname">{{ errors.iname[0] }}</small>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-group">
                                            <label>Branch/Campus</label>
                                            <input v-model="form.branch" type="text" name="branch"
                                                   class="form-control"
                                                   :class="{ 'is-invalid': form.errors.has('branch') }">
                                            <has-error :form="form" field="branch"></has-error>
                                            <small style="color: red" v-if="error && errors.branch">{{ errors.branch[0] }}</small>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-group">
                                            <label>Course</label>
                                            <input v-model="form.class" type="text" name="class"
                                                   class="form-control"
                                                   :class="{ 'is-invalid': form.errors.has('class') }">
                                            <has-error :form="form" field="class"></has-error>
                                            <small style="color: red" v-if="error && errors.class">{{ errors.class[0] }}</small>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-group">
                                            <label>Current Year of Study</label>
                                            <input v-model="form.year" type="number" name="year" min="1" max="6"
                                                   step="1" class="form-control"
                                                   :class="{ 'is-invalid': form.errors.has('year') }">
                                            <has-error :form="form" field="year"></has-error>
                                            <small style="color: red" v-if="error && errors.year">{{ errors.year[0] }}</small>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="col">
                                        <div class="form-group">
                                            <label>Annual Fees</label>
                                            <input v-model="form.payable" type="number" name="payable"
                                                   class="form-control"
                                                   :class="{ 'is-invalid': form.errors.has('payable') }">
                                            <has-error :form="form" field="payable"></has-error>
                                            <small style="color: red" v-if="error && errors.payable">{{ errors.payable[0] }}</small>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-group">
                                            <label>Amount Paid</label>
                                            <input v-model="form.paid" type="number" name="paid"
                                                   class="form-control"
                                                   :class="{ 'is-invalid': form.errors.has('paid') }">
                                            <has-error :form="form" field="paid"></has-error>
                                            <small style="color: red" v-if="error && errors.paid">{{ errors.paid[0] }}</small>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-group">
                                            <label>Outstanding Balance</label>
                                            <input  type="number" name="balance" readonly
                                                   class="form-control"
                                                   :value="total"
                                                   :class="{ 'is-invalid': form.errors.has('balance') }">
                                            <has-error :form="form" field="balance"></has-error>
                                            <small style="color: red" v-if="error && errors.balance">{{ errors.balance[0] }}</small>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="col">
                                        <div class="form-group">
                                            <label>Bank Name</label>
                                            <input v-model="form.bank" type="text" name="bank"
                                                   class="form-control"
                                                   :class="{ 'is-invalid': form.errors.has('bank') }">
                                            <has-error :form="form" field="bank"></has-error>
                                            <small style="color: red" v-if="error && errors.bank">{{ errors.bank[0] }}</small>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-group">
                                            <label>Account Number</label>
                                            <input v-model="form.account" type="number" name="account"
                                                   class="form-control"
                                                   :class="{ 'is-invalid': form.errors.has('account') }">
                                            <has-error :form="form" field="account"></has-error>
                                            <small style="color: red" v-if="error && errors.account">{{ errors.account[0] }}</small>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-group">
                                            <label>Branch</label>
                                            <input v-model="form.bran" type="text" name="branch"
                                                   class="form-control"
                                                   :class="{ 'is-invalid': form.errors.has('bran') }">
                                            <has-error :form="form" field="bran"></has-error>
                                            <small style="color: red" v-if="error && errors.bran">{{ errors.bran[0] }}</small>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="col">
                                        <div class="form-group justify-content-center">
                                            <label for="files">Attach recommendation letter by head of
                                                institution</label>
                                            <input type="file" class="form-control-file" @change="fieldChange($event, 5)"
                                                   id="files">
                                            <has-error :form="form" field="files"></has-error>
                                            <small style="color: red" v-if="error && errors.files">{{ errors.files[0] }}</small>
                                        </div>
                                    </div>
                                    <div class="col">

                                    </div>
                                </div>
                                <hr>
                                <p class="text-right">
                                    <button type="button" class="btn btn-primary " @click.prevent="prevStep">
                                        Previous Step
                                    </button>
                                    <button type="button" class="btn btn-success btn-submit"
                                            @click.prevent="sendApp()" :disabled="loading">
                                        Submit Application
                                    </button>
                                </p>
                            </section>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import VuePhoneNumberInput from 'vue-phone-number-input';
    import 'vue-phone-number-input/dist/vue-phone-number-input.css';
    export default {
        components:{
            VuePhoneNumberInput,
        },
        data() {
            return {
                errors: {},
                error: false,
                step: 1,
                counties: {},
                wards: {},
                info: {},
                loading: false,
                watch: 0,
                yearz:{},
                passport: [],
                motherId: [],
                fatherId: [],
                guardianId: [],
                attachments: [],
                e_telephone: '',
                e_ftelephone: '',
                e_mtelephone: '',
                e_gtelephone: '',
                formf: new FormData(),
                form: new Form({
                    type: 'County',
                    firstName: '',
                    middleName: '',
                    lastName: '',
                    dob: '',
                    email: '',
                    gender: '',
                    telephone: '',
                    regNo: '',
                    class: '',
                    idNo: '',
                    fname: '',
                    fliving: '',
                    foccupation: '',
                    mname: '',
                    mliving: '',
                    moccupation: '',
                    gname: '',
                    gliving: '',
                    goccupation: '',
                    fincome: '',
                    mincome: '',
                    gincome: '',
                    county: 1,
                    ward: '',
                    constituency: '',
                    location: '',
                    division: '',
                    sublocation: '',
                    village: '',
                    polling: '',
                    iname: '',
                    branch: '',
                    year: '',
                    yearz:'',
                    payable: '',
                    paid: '',
                    balance: '',
                    tSiblings: '',
                    inSchool: '',
                    sWorking: '',
                    pFees: '',
                    pRelationship: '',
                    ftelephone: '',
                    mtelephone: '',
                    gtelephone: '',
                    bank: '',
                    account: '',
                    bran: '',
                })
            }
        },
        methods: {
            sendApp() {
                for (let i = 0; i < this.attachments.length; i++) {
                    this.formf.append('files[]', this.attachments[i]);
                }

                for (let i = 0; i < this.passport.length; i++) {
                    this.formf.append('passport[]', this.passport[i]);
                }

                for (let i = 0; i < this.fatherId.length; i++) {
                    this.formf.append('fatherId[]', this.fatherId[i]);
                }

                for (let i = 0; i < this.motherId.length; i++) {
                    this.formf.append('motherId[]', this.motherId[i]);
                }

                for (let i = 0; i < this.guardianId.length; i++) {
                    this.formf.append('guardianId[]', this.guardianId[i]);
                }

                this.formf.append('type', this.form.type);
                this.formf.append('firstName', this.form.firstName);
                this.formf.append('middleName', this.form.middleName);
                this.formf.append('lastName', this.form.lastName);
                this.formf.append('dob', this.form.dob);
                this.formf.append('email', this.form.email);
                this.formf.append('gender', this.form.gender);
                this.formf.append('telephone', this.form.telephone);
                this.formf.append('regNo', this.form.regNo);
                this.formf.append('class', this.form.class);
                this.formf.append('idNo', this.form.idNo);
                this.formf.append('fname', this.form.fname);
                this.formf.append('fliving', this.form.fliving);
                this.formf.append('foccupation', this.form.foccupation);
                this.formf.append('mname', this.form.mname);
                this.formf.append('mliving', this.form.mliving);
                this.formf.append('moccupation', this.form.moccupation);
                this.formf.append('gname', this.form.gname);
                this.formf.append('gliving', this.form.gliving);
                this.formf.append('goccupation', this.form.goccupation);
                this.formf.append('fincome', this.form.fincome);
                this.formf.append('mincome', this.form.mincome);
                this.formf.append('gincome', this.form.gincome);
                this.formf.append('county', this.form.county);
                this.formf.append('ward', this.form.ward);
                this.formf.append('constituency', this.form.constituency);
                this.formf.append('location', this.form.location);
                this.formf.append('division', this.form.division);
                this.formf.append('sublocation', this.form.sublocation);
                this.formf.append('village', this.form.village);
                this.formf.append('polling', this.form.polling);
                this.formf.append('iname', this.form.iname);
                this.formf.append('branch', this.form.branch);
                this.formf.append('year', this.form.year);
                this.formf.append('yearz', this.form.yearz);
                this.formf.append('payable', this.form.payable);
                this.formf.append('paid', this.form.paid);
                this.formf.append('balance', this.form.balance);
                this.formf.append('tSiblings', this.form.tSiblings);
                this.formf.append('inSchool', this.form.inSchool);
                this.formf.append('sWorking', this.form.sWorking);
                this.formf.append('pFees', this.form.pFees);
                this.formf.append('pRelationship', this.form.pRelationship);
                this.formf.append('passport', this.form.passport);
                this.formf.append('fatherId', this.form.fatherId);
                this.formf.append('motherId', this.form.motherId);
                this.formf.append('guardianId', this.form.guardianId);
                this.formf.append('ftelephone', this.form.ftelephone);
                this.formf.append('mtelephone', this.form.mtelephone);
                this.formf.append('gtelephone', this.form.gtelephone);
                this.formf.append('bank', this.form.bank);
                this.formf.append('account', this.form.account);
                this.formf.append('bran', this.form.bran);
                const config = {headers: {'Content-Type': 'multipart/form-data'}};

                // this.loading = true;
                axios.post('/api/apply', this.formf, config).then(response => {
                    this.loading = false;
                    Fire.$emit('AfterCreate');
                    Swal.fire({
                        type: 'success',
                        title: 'Submited!!',
                        text: 'Application Submitted Successfully',

                    })
                    this.form.reset();
                    this.$Progress.finish();
                    window.location.href = "/student"

                })
                    .catch(error => {
                        this.loading = false;
                        this.error = true;
                        this.errors = error.response.data.errors;
                        Swal.fire({
                            type: 'error',
                            title: 'Error!!',
                            text: "Your application contains invalid data. Please review your inputs and provide valid details.",

                        })
                    });
            },
            fieldChange(event, type) {
                let selectedFiles = event.target.files;
                if (!selectedFiles.length) {
                    return false;
                }
                if (type == 1){
                    for (let i = 0; i < selectedFiles.length; i++) {
                        this.passport.push(selectedFiles[i]);
                    }
                }

                if (type == 2){
                    for (let i = 0; i < selectedFiles.length; i++) {
                        this.fatherId.push(selectedFiles[i]);
                    }
                }

                if (type == 3){
                    for (let i = 0; i < selectedFiles.length; i++) {
                        this.motherId.push(selectedFiles[i]);
                    }
                }

                if (type == 4){
                    for (let i = 0; i < selectedFiles.length; i++) {
                        this.guardianId.push(selectedFiles[i]);
                    }
                }

                if (type == 5){
                    for (let i = 0; i < selectedFiles.length; i++) {
                        this.attachments.push(selectedFiles[i]);
                    }
                }

            },
            next() {
                this.step++;
            },
            sendApplication() {
                if (this.$gate.isStudent()) {
                    this.loading = true;
                    this.form.post('api/apply')
                        .then(({data}) => {

                            this.uploadLetter(data);
                        })
                        .catch(error => {
                            this.loading = false;
                            this.errors = error.response.data.errors;
                            Swal.fire({
                                type: 'error',
                                title: 'Error!!',
                                text: error.response.data.msg,

                            })
                        })
                } else {
                    Swal.fire({
                        type: 'error',
                        title: 'Ooops...',
                        text: 'You are not eligible to make an application',
                    })
                }
            },
            nextStep() {
                if (this.step == 1) {
                    if (!this.form.yearz) {
                        this.form.errors.set({
                            yearz: 'This field is required'
                        })
                        return false;
                    } else if (this.enable == 0) {
                        this.watch = 1;
                    } else {
                        this.step++;
                        return false;
                    }
                }

                if (this.step == 2) {
                    if (!this.form.firstName) {
                        this.form.errors.set({
                            firstName: 'This field is required'
                        })
                        return false;
                    } else if (!this.form.middleName) {
                        this.form.errors.set({
                            middleName: 'This field is required'
                        })
                        return false;
                    } else if (!this.form.lastName) {
                        this.form.errors.set({
                            lastName: 'This field is required'
                        })
                        return false;
                    } else if (!this.form.email) {
                        this.form.errors.set({
                            email: 'This field is required'
                        })
                        return false;
                    } else if (!this.form.idNo) {
                        this.form.errors.set({
                            idNo: 'This field is required'
                        })
                        return false;
                    } else if (!this.form.dob) {
                        this.form.errors.set({
                            dob: 'This field is required'
                        })
                        return false;
                    } else if (!this.form.gender) {
                        this.form.errors.set({
                            gender: 'This field is required'
                        })
                        return false;
                    } else if (!this.form.telephone) {
                        this.e_telephone = 'This field is required';
                        return false;
                    } else if (!this.form.regNo) {
                        this.form.errors.set({
                            regNo: 'This field is required'
                        })
                        return false;
                    } else {
                        this.step++;
                        return false;
                    }
                }

                if (this.step == 3) {
                    if (!this.form.fname) {
                        // set(type, 'required');
                        this.form.errors.set({
                            fname: 'This field is required'
                        })
                        return false;
                    } else if (!this.form.fliving) {
                        this.form.errors.set({
                            fliving: 'This field is required'
                        })
                        return false;
                    } else if (!this.form.foccupation) {
                        this.form.errors.set({
                            foccupation: 'This field is required'
                        })
                        return false;
                    } else if (!this.form.fincome) {
                        this.form.errors.set({
                            fincome: 'This field is required'
                        })
                        return false;
                    } else if (!this.form.ftelephone) {
                        this.e_ftelephone = 'This field is required';
                        return false;
                    } else if (!this.form.mtelephone) {
                        this.e_mtelephone = 'This field is required';
                        return false;
                    } else if (!this.form.gtelephone) {
                        this.e_gtelephone = 'This field is required';
                        return false;
                    } else if (!this.form.mname) {
                        this.form.errors.set({
                            mname: 'This field is required'
                        })
                        return false;
                    } else if (!this.form.mliving) {
                        this.form.errors.set({
                            mliving: 'This field is required'
                        })
                        return false;
                    } else if (!this.form.moccupation) {
                        this.form.errors.set({
                            moccupation: 'This field is required'
                        })
                        return false;
                    } else if (!this.form.mincome) {
                        this.form.errors.set({
                            mincome: 'This field is required'
                        })
                        return false;
                    } else if (!this.form.gname) {
                        this.form.errors.set({
                            gname: 'This field is required'
                        })
                        return false;
                    } else if (!this.form.gliving) {
                        this.form.errors.set({
                            gliving: 'This field is required'
                        })
                        return false;
                    } else if (!this.form.goccupation) {
                        this.form.errors.set({
                            goccupation: 'This field is required'
                        })
                        return false;
                    } else if (!this.form.gincome) {
                        this.form.errors.set({
                            gincome: 'This field is required'
                        })
                        return false;
                    } else if (!this.form.tSiblings) {
                        this.form.errors.set({
                            tSiblings: 'This field is required'
                        })
                        return false;
                    } else if (!this.form.inSchool) {
                        this.form.errors.set({
                            inSchool: 'This field is required'
                        })
                        return false;
                    } else if (!this.form.sWorking) {
                        this.form.errors.set({
                            sWorking: 'This field is required'
                        })
                        return false;
                    } else if (!this.form.pFees) {
                        this.form.errors.set({
                            pFees: 'This field is required'
                        })
                        return false;
                    } else if (!this.form.pRelationship) {
                        this.form.errors.set({
                            pRelationship: 'This field is required'
                        })
                        return false;
                    } else {
                        this.step++;
                        return false;
                    }
                }

                if (this.step == 4) {
                    if (!this.form.county) {
                        // set(type, 'required');
                        this.form.errors.set({
                            county: 'This field is required'
                        })
                        return false;
                    } else if (!this.form.ward) {
                        this.form.errors.set({
                            ward: 'This field is required'
                        })
                        return false;
                    } else if (!this.form.constituency) {
                        this.form.errors.set({
                            constituency: 'This field is required'
                        })
                        return false;
                    } else if (!this.form.division) {
                        this.form.errors.set({
                            division: 'This field is required'
                        })
                        return false;
                    } else if (!this.form.location) {
                        this.form.errors.set({
                            location: 'This field is required'
                        })
                        return false;
                    } else if (!this.form.sublocation) {
                        this.form.errors.set({
                            sublocation: 'This field is required'
                        })
                        return false;
                    } else if (!this.form.village) {
                        this.form.errors.set({
                            village: 'This field is required'
                        })
                        return false;
                    } else {
                        this.step++;
                        return false;
                    }
                }

                if (this.step == 5) {
                    if (!this.form.iname) {
                        // set(type, 'required');
                        this.form.errors.set({
                            iname: 'This field is required'
                        })
                        return false;
                    } else if (!this.form.branch) {
                        this.form.errors.set({
                            branch: 'This field is required'
                        })
                        return false;
                    } else if (!this.form.class) {
                        this.form.errors.set({
                            class: 'This field is required'
                        })
                        return false;
                    } else if (!this.form.year) {
                        this.form.errors.set({
                            year: 'This field is required'
                        })
                        return false;
                    } else if (!this.form.payable) {
                        this.form.errors.set({
                            gender: 'This field is required'
                        })
                        return false;
                    } else if (!this.form.paid) {
                        this.form.errors.set({
                            paid: 'This field is required'
                        })
                        return false;
                    } else if (!this.form.balance) {
                        this.form.errors.set({
                            balance: 'This field is required'
                        })
                        return false;
                    } else if (this.form.balance <= 0) {
                        this.form.errors.set({
                            balance: 'The Outstanding balance must be great than zero'
                        })
                        return false;
                    } else {
                        this.step++;
                        return false;
                    }
                }
            },
            prevStep() {
                this.step--;
            },
            getCounties() {
                axios.get("api/getcounties").then(({data}) => ([this.counties = data['counties']]));
            },
            getCountyWards() {
                this.getStatus();
                axios.get("api/getcountywards/" + this.form.county).then(({data}) => ([this.wards = data['wards']]));
            },
            getDetails() {
                axios.get("api/getdetails").then(({data}) => ([this.info = data['user']]));
            },
            getApplication(){
                axios.get("api/getApplicationYears/" + this.form.county).then(({data}) => ([this.yearz = data['year']]));
            },

        },
        computed: {

            total: function() {
                let Outstanding = this.form.payable - this.form.paid;
                this.form.balance = Outstanding;

                return Outstanding;
            }
        },
        created() {
            this.getCounties();
            this.getDetails();
            this.getApplication();
            this. getCountyWards();

        }
    }
</script>
<style>
    .btn-submit {
        cursor: pointer;

    &
    :hover {
        background: #38c172;
    }

    &
    :disabled {
        background: #f6993f;
        cursor: not-allowed;
    }

    }
    .loader {
        position: absolute;
        right: 50%;
    }

    .lds-roller {
        display: inline-block;
        position: relative;
        width: 25px;
        height: 25px;

    }

    .lds-roller div {
        animation: lds-roller 1.2s cubic-bezier(0.5, 0, 0.5, 1) infinite;
        transform-origin: 32px 32px;
    }

    .lds-roller div:after {
        content: " ";
        display: block;
        position: absolute;
        width: 6px;
        height: 6px;
        border-radius: 50%;
        background: #4dc0b5;
        margin: -3px 0 0 -3px;

    }

    .lds-roller div:nth-child(1) {
        animation-delay: -0.036s;
    }

    .lds-roller div:nth-child(1):after {
        top: 50px;
        left: 50px;
    }

    .lds-roller div:nth-child(2) {
        animation-delay: -0.072s;
    }

    .lds-roller div:nth-child(2):after {
        top: 54px;
        left: 45px;
    }

    .lds-roller div:nth-child(3) {
        animation-delay: -0.108s;
    }

    .lds-roller div:nth-child(3):after {
        top: 57px;
        left: 39px;
    }

    .lds-roller div:nth-child(4) {
        animation-delay: -0.144s;
    }

    .lds-roller div:nth-child(4):after {
        top: 58px;
        left: 32px;
    }

    .lds-roller div:nth-child(5) {
        animation-delay: -0.18s;
    }

    .lds-roller div:nth-child(5):after {
        top: 57px;
        left: 25px;
    }

    .lds-roller div:nth-child(6) {
        animation-delay: -0.216s;
    }

    .lds-roller div:nth-child(6):after {
        top: 54px;
        left: 19px;
    }

    .lds-roller div:nth-child(7) {
        animation-delay: -0.252s;
    }

    .lds-roller div:nth-child(7):after {
        top: 50px;
        left: 14px;
    }

    .lds-roller div:nth-child(8) {
        animation-delay: -0.288s;
    }

    .lds-roller div:nth-child(8):after {
        top: 45px;
        left: 10px;
    }

    @keyframes lds-roller {
        0% {
            transform: rotate(0deg);
        }
        100% {
            transform: rotate(360deg);
        }
    }

</style>
