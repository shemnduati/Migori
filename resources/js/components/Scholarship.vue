<template>
    <div class="container">
        <div class="row justify-content-center" style="margin-top: 40%">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Scholarship Application</h3>
                    </div>

                    <div class="card-body">
                        <form autocomplete="off">
                            <section v-if="step==1">
                                <div class="row justify-content-center">
                                    <div class="col-sm-6 justify-content-center">
                                        <div class="form-group">
                                            <div class="col">
                                                <label>Select Application Year</label><span class="text-danger">&#42;</span>
                                                <select v-model="form.yearz" class="form-control" name="yearz"
                                                        :class="{ 'is-invalid': form.errors.has('yearz') }"
                                                        :disabled="!enable">
                                                    <option selected value="">--Select Application Year--</option>
                                                    <option v-for="year in yearz" :key="year.id" :value="year.year">
                                                        {{
                                                        year.year}}
                                                    </option>
                                                </select>
                                                <has-error :form="form" field="yearz"></has-error>
                                                <small style="color: red" v-if="error && errors.yearz">{{
                                                    errors.yearz[0] }}</small>
                                                <small style="color: red" v-if="!enable">There is currently no open
                                                    application. Please try again later</small>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </section>
                            <section v-if="step==2">
                                <h3>PERSONAL DETAILS</h3>

                                <div class="form-row ">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>First/Baptismal Name</label><span class="text-danger">&#42;</span>
                                            <input v-model="form.firstName" type="text" name="firstName"
                                                   class="form-control"
                                                   :class="{ 'is-invalid': form.errors.has('firstName') }">
                                            <has-error :form="form" field="firstName"></has-error>
                                            <small style="color: red" v-if="error && errors.firstName">{{
                                                errors.firstName[0] }}</small>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Middle Name</label><span class="text-danger">&#42;</span>
                                            <input v-model="form.middleName" type="text" name="middleName"
                                                   class="form-control"
                                                   :class="{ 'is-invalid': form.errors.has('middleName') }">
                                            <has-error :form="form" field="middleName"></has-error>
                                            <small style="color: red" v-if="error && errors.middleName">{{
                                                errors.middleName[0] }}</small>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Surname/ Family Name</label><span class="text-danger">&#42;</span>
                                            <input v-model="form.lastName" type="text" name="lastName"
                                                   class="form-control"
                                                   :class="{ 'is-invalid': form.errors.has('lastName') }">
                                            <has-error :form="form" field="lastName"></has-error>
                                            <small style="color: red" v-if="error && errors.lastName">{{
                                                errors.lastName[0] }}</small>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-row ">
                                    <div class="col">
                                        <label>Gender</label><span class="text-danger">&#42;</span><br>
                                        <div class="form-check form-check-inline">
                                            <input v-model="form.gender" class="form-check-input" type="radio"
                                                   name="gender" value="male"
                                                   :class="{ 'is-invalid': form.errors.has('gender') }">
                                            <label class="form-check-label">Male</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input v-model="form.gender" class="form-check-input" type="radio"
                                                   name="gender" value="female"
                                                   :class="{ 'is-invalid': form.errors.has('gender') }">
                                            <label class="form-check-label">Female</label>
                                            <br><br>
                                            <has-error :form="form" field="gender"></has-error>
                                        </div>
                                        <small style="color: red" v-if="error && errors.gender">{{ errors.gender[0]
                                            }}</small>
                                    </div>
                                    <div class="col">
                                        <div class="form-group">
                                            <label>DOB</label><span class="text-danger">&#42;</span>
                                            <input v-model="form.dob" type="date" name="dob"
                                                   class="form-control"
                                                   :class="{ 'is-invalid': form.errors.has('dob') }">
                                            <has-error :form="form" field="dob"></has-error>
                                            <small style="color: red" v-if="error && errors.dob">{{ errors.dob[0]
                                                }}</small>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-group">
                                            <label>Parent/Guardian Name</label><span class="text-danger">&#42;</span>
                                            <input v-model="form.parentName" type="text" name="parentName"
                                                   class="form-control"
                                                   :class="{ 'is-invalid': form.errors.has('parentName') }">
                                            <has-error :form="form" field="parentName"></has-error>
                                            <small style="color: red" v-if="error && errors.parentName">{{
                                                errors.parentName[0] }}</small>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-row ">
                                    <div class="col">
                                        <label>Postal Address: P.O. Box</label><span class="text-danger">&#42;</span><br>
                                        <input v-model="form.box" type="text" name="box"
                                               class="form-control"
                                               :class="{ 'is-invalid': form.errors.has('box') }">
                                        <has-error :form="form" field="box"></has-error>
                                        <small style="color: red" v-if="error && errors.box">{{ errors.box[0] }}</small>
                                    </div>
                                    <div class="col">
                                        <div class="form-group">
                                            <label>Tel/Mobile Number</label><span class="text-danger">&#42;</span>
                                            <VuePhoneNumberInput v-model="form.telephone" default-country-code="KE"/>
                                            <small style="color: red;">{{e_telephone}}</small>
                                            <small style="color: red" v-if="error && errors.telephone">{{
                                                errors.telephone[0] }}</small>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-group">
                                            <label>Alternative /mobile No.</label><span class="text-danger">&#42;</span>
                                            <VuePhoneNumberInput v-model="form.alt_telephone"
                                                                 default-country-code="KE"/>
                                            <small style="color: red;">{{e_alt_telephone}}</small>
                                            <small style="color: red" v-if="error && errors.alt_telephone">{{
                                                errors.alt_telephone[0] }}</small>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-row ">
                                    <div class="col">
                                        <div class="form-group">
                                            <label>Ward</label><span class="text-danger">&#42;</span>
                                            <select v-model="form.ward" class="form-control" name="ward"
                                                    :class="{ 'is-invalid': form.errors.has('ward') }">
                                                <option selected value="">--Select Ward--</option>
                                                <option v-for="wardy in wards" :key="wardy.id" :value="wardy.id">{{
                                                    wardy.name}}
                                                </option>
                                            </select>
                                            <has-error :form="form" field="ward"></has-error>
                                            <small style="color: red" v-if="error && errors.ward">{{ errors.ward[0]
                                                }}</small>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-group">
                                            <label>Sub-County</label><span class="text-danger">&#42;</span>
                                            <input v-model="form.subcounty" type="text" name="subcounty"
                                                   class="form-control"
                                                   :class="{ 'is-invalid': form.errors.has('subcounty') }">
                                            <has-error :form="form" field="subcounty"></has-error>
                                            <small style="color: red" v-if="error && errors.subcounty">{{
                                                errors.subcounty[0] }}</small>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-row">
                                    <div class="col">
                                        <div class="form-group">
                                            <label>Location</label><span class="text-danger">&#42;</span>
                                            <input v-model="form.location" type="text" name="location"
                                                   class="form-control"
                                                   :class="{ 'is-invalid': form.errors.has('location') }">
                                            <has-error :form="form" field="location"></has-error>
                                            <small style="color: red" v-if="error && errors.location">{{
                                                errors.location[0] }}</small>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-group">
                                            <label>Sub-Location</label><span class="text-danger">&#42;</span>
                                            <input v-model="form.sublocation" type="text" name="sublocation"
                                                   class="form-control"
                                                   :class="{ 'is-invalid': form.errors.has('sublocation') }">
                                            <has-error :form="form" field="sublocation"></has-error>
                                            <small style="color: red" v-if="error && errors.sublocation">{{
                                                errors.sublocation[0] }}</small>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-row">
                                    <div class="col">
                                        <div class="form-group">
                                            <label>K.C.P.E. INDEX Number</label><span class="text-danger">&#42;</span>
                                            <input v-model="form.indexNo" type="text" name="indexNo"
                                                   class="form-control"
                                                   :class="{ 'is-invalid': form.errors.has('indexNo') }">
                                            <has-error :form="form" field="indexNo"></has-error>
                                            <small style="color: red" v-if="error && errors.indexNo">{{
                                                errors.indexNo[0] }}</small>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-group">
                                            <label>K.C.P.E. Points/Marks</label><span class="text-danger">&#42;</span>
                                            <input v-model="form.kcpeMarks" type="number" name="kcpeMarks"
                                                   class="form-control"
                                                   :class="{ 'is-invalid': form.errors.has('kcpeMarks') }">
                                            <has-error :form="form" field="kcpeMarks"></has-error>
                                            <small style="color: red" v-if="error && errors.kcpeMarks">{{
                                                errors.kcpeMarks[0] }}</small>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-group">
                                            <label>Attach copy of results slip</label><span class="text-danger">&#42;</span>
                                            <input type="file" @change="fieldChange($event, 1)"
                                                   class="form-control-file"
                                                   :class="{ 'is-invalid': form.errors.has('resultslip') }" accept="image/*, application/pdf">
                                            <has-error :form="form" field="resultslip"></has-error>
                                            <small style="color: red" v-if="error && errors.slip">{{ errors.slip[0]
                                                }}</small>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-row">
                                    <div class="col">
                                        <div class="form-group">
                                            <label>K.C.P.E. Year</label><span class="text-danger">&#42;</span>
                                            <input v-model="form.kcpeYear" type="number" name="kcpeYear" min="1960"
                                                   :max="now"
                                                   class="form-control"
                                                   :class="{ 'is-invalid': form.errors.has('kcpeYear') }">
                                            <has-error :form="form" field="kcpeYear"></has-error>
                                            <small style="color: red" v-if="error && errors.kcpeYear">{{
                                                errors.kcpeYear[0] }}</small>
                                        </div>
                                    </div>
                                    <div class="col">

                                    </div>
                                </div>

                                <div class="form-row">
                                    <div class="col">
                                        <div class="form-group">
                                            <label for="task">Have you attempted KCPE previous years? If more than once,
                                                how many times and why? Give the scores attained in the previous
                                                years</label><span class="text-danger">&#42;</span>
                                            <textarea v-model="form.kcpeQuiz" class="form-control" id="task" rows="3"
                                                      :class="{ 'is-invalid': form.errors.has('kcpeQuiz') }"></textarea>
                                            <has-error :form="form" field="kcpeQuiz"></has-error>
                                            <small style="color: red" v-if="error && errors.kcpeQuiz">{{
                                                errors.kcpeQuiz[0] }}</small>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-group">
                                            <label>Have you repeated any class? If yes, which ones??</label><span class="text-danger">&#42;</span>
                                            <br><br>
                                            <textarea v-model="form.repeatQuiz" class="form-control" rows="3"
                                                      :class="{ 'is-invalid': form.errors.has('repeatQuiz') }"></textarea>
                                            <has-error :form="form" field="repeatQuiz"></has-error>
                                            <small style="color: red" v-if="error && errors.repeatQuiz">{{
                                                errors.repeatQuiz[0] }}</small>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-row">
                                    <div class="col">
                                        <div class="form-group">
                                            <label>Name of secondary school ( of admission)</label><span class="text-danger">&#42;</span>
                                            <input v-model="form.secSchoolName" type="text" name="secSchoolName"
                                                   class="form-control"
                                                   :class="{ 'is-invalid': form.errors.has('secSchoolName') }">
                                            <has-error :form="form" field="secSchoolName"></has-error>
                                            <small style="color: red" v-if="error && errors.secSchoolName">{{
                                                errors.secSchoolName[0] }}</small>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <label>Classification</label><span class="text-danger">&#42;</span><br>
                                        <div class="form-check form-check-inline">
                                            <input v-model="form.classification" class="form-check-input" type="radio"
                                                   name="classification" value="National"
                                                   :class="{ 'is-invalid': form.errors.has('classification') }">
                                            <label class="form-check-label">National</label>
                                            <has-error :form="form" field="classification"></has-error>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input v-model="form.classification" class="form-check-input" type="radio"
                                                   name="classification" value="County"
                                                   :class="{ 'is-invalid': form.errors.has('classification') }">
                                            <label class="form-check-label">County</label>
                                            <has-error :form="form" field="classification"></has-error>
                                        </div>
                                        <small style="color: red" v-if="error && errors.classification">{{
                                            errors.classification[0] }}</small>
                                    </div>
                                </div>

                            </section>
                            <section v-if="step==3">
                                <h3>PART B: APPLICANT'S FAMILY INFORMATION</h3>
                                <div class="form-row ">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Father's First Name</label><span class="text-danger">&#42;</span>
                                            <input v-model="form.fatherFirstName" type="text" name="fatherFirstName"
                                                   class="form-control"
                                                   :class="{ 'is-invalid': form.errors.has('fatherFirstName') }">
                                            <has-error :form="form" field="fatherFirstName"></has-error>
                                            <small style="color: red" v-if="error && errors.fatherFirstName">{{
                                                errors.fatherFirstName[0] }}</small>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Father's Middle Name</label><span class="text-danger">&#42;</span>
                                            <input v-model="form.fatherMiddleName" type="text" name="fatherMiddleName"
                                                   class="form-control"
                                                   :class="{ 'is-invalid': form.errors.has('fatherMiddleName') }">
                                            <has-error :form="form" field="fatherMiddleName"></has-error>
                                            <small style="color: red" v-if="error && errors.fatherMiddleName">{{
                                                errors.fatherMiddleName[0] }}</small>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Father's Last Name</label><span class="text-danger">&#42;</span>
                                            <input v-model="form.fatherLastName" type="text" name="fatherLastName"
                                                   class="form-control"
                                                   :class="{ 'is-invalid': form.errors.has('fatherLastName') }">
                                            <has-error :form="form" field="fatherLastName"></has-error>
                                            <small style="color: red" v-if="error && errors.fatherLastName">{{
                                                errors.fatherLastName[0] }}</small>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="col">
                                        <div class="form-group">
                                            <label>Father's ID Number</label><span class="text-danger">&#42;</span>
                                            <input v-model="form.fatherIdNo" type="number" name="fatherIdNo"
                                                   class="form-control"
                                                   :class="{ 'is-invalid': form.errors.has('fatherIdNo') }">
                                            <has-error :form="form" field="fatherIdNo"></has-error>
                                            <small style="color: red" v-if="error && errors.fatherIdNo">{{
                                                errors.fatherIdNo[0] }}</small>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <label>Alive/Dead</label><span class="text-danger">&#42;</span><br>
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
                                        <small style="color: red" v-if="error && errors.fliving">{{ errors.fliving[0]
                                            }}</small>
                                    </div>
                                    <div class="col">
                                        <div class="form-group">
                                            <label>Attach Father’s ID/Death Cert</label><span class="text-danger">&#42;</span>
                                            <input type="file" @change="fieldChange($event, 2)"
                                                   class="form-control-file" id="fId"
                                                   accept="image/*, application/pdf"
                                                   :class="{ 'is-invalid': form.errors.has('fatherId') }">
                                            <has-error :form="form" field="fatherId"></has-error>
                                            <small style="color: red" v-if="error && errors.fatherId">{{
                                                errors.fatherId[0] }}</small>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="col">
                                        <div class="form-group">
                                            <label>Occupation</label><span class="text-danger">&#42;</span>
                                            <input v-model="form.fatherOccupation" type="text" name="fatherOccupation"
                                                   class="form-control"
                                                   :class="{ 'is-invalid': form.errors.has('fatherOccupation') }">
                                            <has-error :form="form" field="fatherOccupation"></has-error>
                                            <small style="color: red" v-if="error && errors.fatherOccupation">{{
                                                errors.fatherOccupation[0] }}</small>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-group">
                                            <label>Telephone</label><span class="text-danger">&#42;</span>
                                            <VuePhoneNumberInput v-model="form.ftelephone" default-country-code="KE"/>
                                            <small style="color: red;">{{e_ftelephone}}</small>
                                            <small style="color: red" v-if="error && errors.ftelephone">{{
                                                errors.ftelephone[0] }}</small>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-group">
                                            <label>Alternative Telephone</label><span class="text-danger">&#42;</span>
                                            <VuePhoneNumberInput v-model="form.alt_ftelephone"
                                                                 default-country-code="KE"/>
                                            <small style="color: red;">{{e_alt_ftelephone}}</small>
                                            <small style="color: red" v-if="error && errors.alt_ftelephone">{{
                                                errors.alt_ftelephone[0] }}</small>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="col">
                                        <label>Postal Address: P.O. Box</label><span class="text-danger">&#42;</span><br>
                                        <input v-model="form.fbox" type="text" name="fbox"
                                               class="form-control"
                                               :class="{ 'is-invalid': form.errors.has('fbox') }">
                                        <has-error :form="form" field="fbox"></has-error>
                                        <small style="color: red" v-if="error && errors.fbox">{{ errors.fbox[0]
                                            }}</small>
                                    </div>
                                    <div class="col">

                                    </div>
                                    <div class="col">

                                    </div>
                                </div>
                                <hr>
                                <div class="form-row ">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Mother's First Name</label><span class="text-danger">&#42;</span>
                                            <input v-model="form.motherFirstName" type="text" name="motherFirstName"
                                                   class="form-control"
                                                   :class="{ 'is-invalid': form.errors.has('motherFirstName') }">
                                            <has-error :form="form" field="motherFirstName"></has-error>
                                            <small style="color: red" v-if="error && errors.motherFirstName">{{
                                                errors.motherFirstName[0] }}</small>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Mother's Middle Name</label><span class="text-danger">&#42;</span>
                                            <input v-model="form.motherMiddleName" type="text" name="motherMiddleName"
                                                   class="form-control"
                                                   :class="{ 'is-invalid': form.errors.has('motherMiddleName') }">
                                            <has-error :form="form" field="motherMiddleName"></has-error>
                                            <small style="color: red" v-if="error && errors.motherMiddleName">{{
                                                errors.motherMiddleName[0] }}</small>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Mother's Last Name</label><span class="text-danger">&#42;</span>
                                            <input v-model="form.motherLastName" type="text" name="motherLastName"
                                                   class="form-control"
                                                   :class="{ 'is-invalid': form.errors.has('motherLastName') }">
                                            <has-error :form="form" field="motherLastName"></has-error>
                                            <small style="color: red" v-if="error && errors.motherLastName">{{
                                                errors.motherLastName[0] }}</small>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="col">
                                        <div class="form-group">
                                            <label>Mother's ID Number</label><span class="text-danger">&#42;</span>
                                            <input v-model="form.motherIdNo" type="number" name="motherIdNo"
                                                   class="form-control"
                                                   :class="{ 'is-invalid': form.errors.has('motherIdNo') }">
                                            <has-error :form="form" field="motherIdNo"></has-error>
                                            <small style="color: red" v-if="error && errors.motherIdNo">{{
                                                errors.motherIdNo[0] }}</small>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <label>Alive/Dead</label><span class="text-danger">&#42;</span><br>
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
                                        <small style="color: red" v-if="error && errors.mliving">{{ errors.mliving[0]
                                            }}</small>
                                    </div>
                                    <div class="col">
                                        <div class="form-group">
                                            <label>Attach Mother’s ID/Death Cert</label><span class="text-danger">&#42;</span>
                                            <input type="file" @change="fieldChange($event, 3)"
                                                   class="form-control-file"
                                                   accept="image/*, application/pdf"
                                                   :class="{ 'is-invalid': form.errors.has('motherId') }">
                                            <has-error :form="form" field="motherId"></has-error>
                                            <small style="color: red" v-if="error && errors.motherId">{{
                                                errors.motherId[0] }}</small>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="col">
                                        <div class="form-group">
                                            <label>Occupation</label><span class="text-danger">&#42;</span>
                                            <input v-model="form.motherOccupation" type="text" name="motherOccupation"
                                                   class="form-control"
                                                   :class="{ 'is-invalid': form.errors.has('motherOccupation') }">
                                            <has-error :form="form" field="motherOccupation"></has-error>
                                            <small style="color: red" v-if="error && errors.motherOccupation">{{
                                                errors.motherOccupation[0] }}</small>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-group">
                                            <label>Telephone</label><span class="text-danger">&#42;</span>
                                            <VuePhoneNumberInput v-model="form.mtelephone" default-country-code="KE"/>
                                            <small style="color: red;">{{e_mtelephone}}</small>
                                            <small style="color: red" v-if="error && errors.mtelephone">{{
                                                errors.mtelephone[0] }}</small>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-group">
                                            <label>Alternative Telephone</label><span class="text-danger">&#42;</span>
                                            <VuePhoneNumberInput v-model="form.alt_mtelephone"
                                                                 default-country-code="KE"/>
                                            <small style="color: red;">{{e_alt_mtelephone}}</small>
                                            <small style="color: red" v-if="error && errors.alt_mtelephone">{{
                                                errors.alt_mtelephone[0] }}</small>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="col">
                                        <label>Postal Address: P.O. Box</label><span class="text-danger">&#42;</span><br>
                                        <input v-model="form.mbox" type="text" name="mbox"
                                               class="form-control"
                                               :class="{ 'is-invalid': form.errors.has('mbox') }">
                                        <has-error :form="form" field="mbox"></has-error>
                                        <small style="color: red" v-if="error && errors.mbox">{{ errors.mbox[0]
                                            }}</small>
                                    </div>
                                    <div class="col">

                                    </div>
                                    <div class="col">

                                    </div>
                                </div>
                                <hr>
                                <div class="form-row ">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Guardian's First Name</label><span class="text-danger">&#42;</span>
                                            <input v-model="form.guardianFirstName" type="text" name="guardianFirstName"
                                                   class="form-control"
                                                   :class="{ 'is-invalid': form.errors.has('guardianFirstName') }">
                                            <has-error :form="form" field="guardianFirstName"></has-error>
                                            <small style="color: red" v-if="error && errors.guardianFirstName">{{
                                                errors.guardianFirstName[0] }}</small>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Guardian's Middle Name</label><span class="text-danger">&#42;</span>
                                            <input v-model="form.guardianMiddleName" type="text"
                                                   name="guardianMiddleName"
                                                   class="form-control"
                                                   :class="{ 'is-invalid': form.errors.has('guardianMiddleName') }">
                                            <has-error :form="form" field="guardianMiddleName"></has-error>
                                            <small style="color: red" v-if="error && errors.guardianMiddleName">{{
                                                errors.guardianMiddleName[0] }}</small>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Guardian's Last Name</label><span class="text-danger">&#42;</span>
                                            <input v-model="form.guardianLastName" type="text" name="guardianLastName"
                                                   class="form-control"
                                                   :class="{ 'is-invalid': form.errors.has('guardianLastName') }">
                                            <has-error :form="form" field="guardianLastName"></has-error>
                                            <small style="color: red" v-if="error && errors.guardianLastName">{{
                                                errors.guardianLastName[0] }}</small>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="col">
                                        <div class="form-group">
                                            <label>Guardian's ID Number</label><span class="text-danger">&#42;</span>
                                            <input v-model="form.guardianIdNo" type="number" name="guardianIdNo"
                                                   class="form-control"
                                                   :class="{ 'is-invalid': form.errors.has('guardianIdNo') }">
                                            <has-error :form="form" field="guardianIdNo"></has-error>
                                            <small style="color: red" v-if="error && errors.guardianIdNo">{{
                                                errors.guardianIdNo[0] }}</small>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-group">
                                            <label>Relationship to the student</label><span class="text-danger">&#42;</span>
                                            <input v-model="form.relationship" type="text" name="relationship"
                                                   class="form-control"
                                                   :class="{ 'is-invalid': form.errors.has('relationship') }">
                                            <has-error :form="form" field="relationship"></has-error>
                                            <small style="color: red" v-if="error && errors.relationship">{{
                                                errors.relationship[0] }}</small>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-group">
                                            <label>Occupation</label><span class="text-danger">&#42;</span>
                                            <input v-model="form.guardianOccupation" type="text"
                                                   name="guardianOccupation"
                                                   class="form-control"
                                                   :class="{ 'is-invalid': form.errors.has('guardianOccupation') }">
                                            <has-error :form="form" field="guardianOccupation"></has-error>
                                            <small style="color: red" v-if="error && errors.guardianOccupation">{{
                                                errors.guardianOccupation[0] }}</small>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="col">
                                        <div class="form-group">
                                            <label>Telephone</label><span class="text-danger">&#42;</span>
                                            <VuePhoneNumberInput v-model="form.gtelephone" default-country-code="KE"/>
                                            <small style="color: red;">{{e_gtelephone}}</small>
                                            <small style="color: red" v-if="error && errors.gtelephone">{{
                                                errors.gtelephone[0] }}</small>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-group">
                                            <label>Alternative Telephone</label><span class="text-danger">&#42;</span>
                                            <VuePhoneNumberInput v-model="form.alt_gtelephone"
                                                                 default-country-code="KE"/>
                                            <small style="color: red;">{{e_alt_gtelephone}}</small>
                                            <small style="color: red" v-if="error && errors.alt_gtelephone">{{
                                                errors.alt_gtelephone[0] }}</small>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-group">
                                            <label>Postal Address: P.O. Box</label><span class="text-danger">&#42;</span><br>
                                            <input v-model="form.gbox" type="text" name="gbox"
                                                   class="form-control"
                                                   :class="{ 'is-invalid': form.errors.has('gbox') }">
                                            <has-error :form="form" field="gbox"></has-error>
                                            <small style="color: red" v-if="error && errors.gbox">{{ errors.gbox[0]
                                                }}</small>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-row ">
                                    <div class="col">
                                        <label>Guardian's County</label><span class="text-danger">&#42;</span>
                                        <select v-model="form.gcounty"
                                                class="form-control" name="county"
                                                :class="{ 'is-invalid': form.errors.has('gcounty') }">
                                            <option selected value="">--Select county--</option>
                                            <option value='Baringo'>Baringo</option>
                                            <option value='Bomet'>Bomet</option>
                                            <option value='Bungoma'>Bungoma</option>
                                            <option value='Busia'>Busia</option>
                                            <option value='Elgeyo-Marakwet'>Elgeyo-Marakwet</option>
                                            <option value='Embu'>Embu</option>
                                            <option value='Garissa'>Garissa</option>
                                            <option value='Homa Bay'>Homa Bay</option>
                                            <option value='Isiolo'>Isiolo</option>
                                            <option value='Kajiado'>Kajiado</option>
                                            <option value='Kakamega'>Kakamega</option>
                                            <option value='Kericho'>Kericho</option>
                                            <option value='Kiambu'>Kiambu</option>
                                            <option value='Kilifi'>Kilifi</option>
                                            <option value='Kirinyaga'>Kirinyaga</option>
                                            <option value='Kisii'>Kisii</option>
                                            <option value='Kisumu'>Kisumu</option>
                                            <option value='Kitui'>Kitui</option>
                                            <option value='Kwale'>Kwale</option>
                                            <option value='Laikipia'>Laikipia</option>
                                            <option value='Lamu'>Lamu</option>
                                            <option value='Machakos'>Machakos</option>
                                            <option value='Makueni'>Makueni</option>
                                            <option value='Mandera'>Mandera</option>
                                            <option value='Marsabit'>Marsabit</option>
                                            <option value='Meru'>Meru</option>
                                            <option value='Migori'>Migori</option>
                                            <option value='Mombasa'>Mombasa</option>
                                            <option value='Muranga'>Murang'a</option>
                                            <option value='Nairobi City'>Nairobi City</option>
                                            <option value='Nakuru'>Nakuru</option>
                                            <option value='Nandi'>Nandi</option>
                                            <option value='Narok'>Narok</option>
                                            <option value='Nyamira'>Nyamira</option>
                                            <option value='Nyandarua'>Nyandarua</option>
                                            <option value='Nyeri'>Nyeri</option>
                                            <option value='Samburu'>Samburu</option>
                                            <option value='Siaya'>Siaya</option>
                                            <option value='Taita-Taveta'>Taita-Taveta</option>
                                            <option value='Tana River'>Tana River</option>
                                            <option value='Tharaka-Nithi'>Tharaka-Nithi</option>
                                            <option value='Trans Nzoia'>Trans Nzoia</option>
                                            <option value='Turkana'>Turkana</option>
                                            <option value='Uasin Gishu'>Uasin Gishu</option>
                                            <option value='Vihiga'>Vihiga</option>
                                            <option value='West Pokot'>West Pokot</option>
                                            <option value='Wajir'>Wajir</option>
                                        </select>
                                        <small style="color: red" v-if="error && errors.gcounty">{{ errors.gcounty[0]
                                            }}</small>
                                    </div>
                                    <div class="col">
                                        <div class="form-group">
                                            <label>Ward</label><span class="text-danger">&#42;</span>
                                            <input v-model="form.gward" type="text" name="gward"
                                                   class="form-control"
                                                   :class="{ 'is-invalid': form.errors.has('gward') }">
                                            <small style="color: red" v-if="error && errors.gward">{{ errors.gward[0]
                                                }}</small>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-group">
                                            <label>Sub-County</label><span class="text-danger">&#42;</span>
                                            <input v-model="form.gsubcounty" type="text" name="gsubcounty"
                                                   class="form-control"
                                                   :class="{ 'is-invalid': form.errors.has('gsubcounty') }">
                                            <small style="color: red" v-if="error && errors.gsubcounty">{{
                                                errors.gsubcounty[0] }}</small>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="col">
                                        <div class="form-group">
                                            <label>Location</label><span class="text-danger">&#42;</span>
                                            <input v-model="form.glocation" type="text" name="glocation"
                                                   class="form-control"
                                                   :class="{ 'is-invalid': form.errors.has('glocation') }">
                                            <small style="color: red" v-if="error && errors.glocation">{{
                                                errors.glocation[0] }}</small>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-group">
                                            <label>Sub-Location</label><span class="text-danger">&#42;</span>
                                            <input v-model="form.gsublocation" type="text" name="gsublocation"
                                                   class="form-control"
                                                   :class="{ 'is-invalid': form.errors.has('gsublocation') }">
                                            <small style="color: red" v-if="error && errors.gsublocation">{{
                                                errors.gsublocation[0] }}</small>
                                        </div>
                                    </div>
                                </div>
                                <hr>
                                <div class="form-row">
                                    <div class="col">
                                        <div class="form-group">
                                            <label>Do you have any form of inheritance from your
                                                parents/guardians/grandparents or any other source? If yes
                                                describe</label><span class="text-danger">&#42;</span>
                                            <textarea v-model="form.inheritance" class="form-control" name="inheritance"
                                                      rows="3"
                                                      :class="{ 'is-invalid': form.errors.has('inheritance') }"></textarea>
                                            <small style="color: red" v-if="error && errors.inheritance">{{
                                                errors.inheritance[0] }}</small>
                                        </div>
                                    </div>
                                </div>
                            </section>
                            <section v-if="step==4">
                                <h3>PART B Section ii</h3>
                                <div class="col-sm-12">
                                    <h4>SIBLING INFORMATION</h4>
                                    <p>List all the applicants' brothers and sisters starting with the oldest and state
                                        what each is doing
                                        (If working describe job and monthly salary, if in university state it, if in
                                        school state the form or standard, if
                                        in training describe it, if a sister is married show the occupation of the
                                        husband, if a brother is married show
                                        the occupation of the wife)</p>
                                    <p style="color: red">Leave Others Blank if Done</p>
                                    <div class="card" style="padding: 20px;">
                                        <h4>First Sibling</h4>
                                        <div class="form-row">
                                            <div class="col">
                                                <div class="form-group">
                                                    <label>SIBLING NAME</label>
                                                    <input v-model="form.firstSibName" type="text"
                                                           name="firstSibName"
                                                           class="form-control"
                                                           :class="{ 'is-invalid': form.errors.has('firstSibName') }">
                                                    <has-error :form="form" field="firstSibName"></has-error>
                                                </div>
                                            </div>
                                            <div class="col">
                                                <div class="form-group">
                                                    <label>SIBLING AGE</label><span class="text-danger">&#42;</span>
                                                    <input v-model="form.firstSibAge" type="number"
                                                           name="firstSibAge"
                                                           class="form-control" min="1"
                                                           :class="{ 'is-invalid': form.errors.has('firstSibAge') }">
                                                    <has-error :form="form" field="firstSibAge"></has-error>
                                                </div>
                                            </div>
                                            <div class="col">
                                                <div class="form-group">
                                                    <label>SCHOOL/EMPLOYER</label><span class="text-danger">&#42;</span>
                                                    <input v-model="form.firstSibSchoolOrEmployer" type="text"
                                                           name="firstSibSchoolOrEmployer"
                                                           class="form-control"
                                                           :class="{ 'is-invalid': form.errors.has('firstSibSchoolOrEmployer') }">
                                                    <has-error :form="form"
                                                               field="firstSibSchoolOrEmployer"></has-error>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="col">
                                                <div class="form-group">
                                                    <label>CLASS/SALARY</label><span class="text-danger">&#42;</span>
                                                    <input v-model="form.firstSibClassOrSalary" type="text"
                                                           name="firstSibClassOrSalary"
                                                           class="form-control"
                                                           :class="{ 'is-invalid': form.errors.has('firstSibClassOrSalary') }">
                                                    <has-error :form="form" field="firstSibClassOrSalary"></has-error>
                                                </div>
                                            </div>
                                            <div class="col">
                                                <div class="form-group">
                                                    <label>OTHER INFORMATION (if any)</label><span class="text-danger">&#42;</span>
                                                    <textarea v-model="form.firstSibOthers" class="form-control"
                                                              rows="3"
                                                              :class="{ 'is-invalid': form.errors.has('firstSibOthers') }"></textarea>
                                                    <has-error :form="form" field="firstSibOthers"></has-error>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card" style="padding: 20px;">
                                        <h4>Second Sibling</h4>
                                        <div class="form-row">
                                            <div class="col">
                                                <div class="form-group">
                                                    <label>SIBLING NAME</label>
                                                    <input v-model="form.secondSibName" type="text"
                                                           name="secondSibName"
                                                           class="form-control"
                                                           :class="{ 'is-invalid': form.errors.has('secondSibName') }">
                                                    <has-error :form="form" field="secondSibName"></has-error>
                                                </div>
                                            </div>
                                            <div class="col">
                                                <div class="form-group">
                                                    <label>SIBLING AGE</label>
                                                    <input v-model="form.secondSibAge" type="number"
                                                           name="secondSibAge"
                                                           class="form-control" min="1"
                                                           :class="{ 'is-invalid': form.errors.has('secondSibAge') }">
                                                    <has-error :form="form" field="secondSibAge"></has-error>
                                                </div>
                                            </div>
                                            <div class="col">
                                                <div class="form-group">
                                                    <label>SCHOOL/EMPLOYER</label>
                                                    <input v-model="form.secondSibSchoolOrEmployer" type="text"
                                                           name="secondSibSchoolOrEmployer"
                                                           class="form-control"
                                                           :class="{ 'is-invalid': form.errors.has('secondSibSchoolOrEmployer') }">
                                                    <has-error :form="form"
                                                               field="secondSibSchoolOrEmployer"></has-error>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="col">
                                                <div class="form-group">
                                                    <label>CLASS/SALARY</label>
                                                    <input v-model="form.secondSibClassOrSalary" type="text"
                                                           name="secondSibClassOrSalary"
                                                           class="form-control"
                                                           :class="{ 'is-invalid': form.errors.has('secondSibClassOrSalary') }">
                                                    <has-error :form="form" field="secondSibClassOrSalary"></has-error>
                                                </div>
                                            </div>
                                            <div class="col">
                                                <div class="form-group">
                                                    <label>OTHER INFORMATION (if any)</label>
                                                    <textarea v-model="form.secondSibOthers" class="form-control"
                                                              rows="3"
                                                              :class="{ 'is-invalid': form.errors.has('secondSibOthers') }"></textarea>
                                                    <has-error :form="form" field="secondSibOthers"></has-error>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card" style="padding: 20px;">
                                        <h4>Third Sibling</h4>
                                        <div class="form-row">
                                            <div class="col">
                                                <div class="form-group">
                                                    <label>SIBLING NAME</label>
                                                    <input v-model="form.thirdSibName" type="text"
                                                           name="thirdSibName"
                                                           class="form-control"
                                                           :class="{ 'is-invalid': form.errors.has('thirdSibName') }">
                                                    <has-error :form="form" field="thirdSibName"></has-error>
                                                </div>
                                            </div>
                                            <div class="col">
                                                <div class="form-group">
                                                    <label>SIBLING AGE</label>
                                                    <input v-model="form.thirdSibAge" type="number"
                                                           name="thirdSibAge"
                                                           class="form-control" min="1"
                                                           :class="{ 'is-invalid': form.errors.has('thirdSibAge') }">
                                                    <has-error :form="form" field="thirdSibAge"></has-error>
                                                </div>
                                            </div>
                                            <div class="col">
                                                <div class="form-group">
                                                    <label>SCHOOL/EMPLOYER</label>
                                                    <input v-model="form.thirdSibSchoolOrEmployer" type="text"
                                                           name="thirdSibSchoolOrEmployer"
                                                           class="form-control"
                                                           :class="{ 'is-invalid': form.errors.has('thirdSibSchoolOrEmployer') }">
                                                    <has-error :form="form"
                                                               field="thirdSibSchoolOrEmployer"></has-error>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="col">
                                                <div class="form-group">
                                                    <label>CLASS/SALARY</label>
                                                    <input v-model="form.thirdSibClassOrSalary" type="text"
                                                           name="thirdSibClassOrSalary"
                                                           class="form-control"
                                                           :class="{ 'is-invalid': form.errors.has('thirdSibClassOrSalary') }">
                                                    <has-error :form="form" field="thirdSibClassOrSalary"></has-error>
                                                </div>
                                            </div>
                                            <div class="col">
                                                <div class="form-group">
                                                    <label>OTHER INFORMATION (if any)</label>
                                                    <textarea v-model="form.thirdSibOthers" class="form-control"
                                                              rows="3"
                                                              :class="{ 'is-invalid': form.errors.has('thirdSibOthers') }"></textarea>
                                                    <has-error :form="form" field="thirdSibOthers"></has-error>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card" style="padding: 20px;">
                                        <h4>Forth Sibling</h4>
                                        <div class="form-row">
                                            <div class="col">
                                                <div class="form-group">
                                                    <label>SIBLING NAME</label>
                                                    <input v-model="form.forthSibName" type="text"
                                                           name="forthSibName"
                                                           class="form-control"
                                                           :class="{ 'is-invalid': form.errors.has('forthSibName') }">
                                                    <has-error :form="form" field="forthSibName"></has-error>
                                                </div>
                                            </div>
                                            <div class="col">
                                                <div class="form-group">
                                                    <label>SIBLING AGE</label>
                                                    <input v-model="form.forthSibAge" type="number"
                                                           name="forthSibAge"
                                                           class="form-control" min="1"
                                                           :class="{ 'is-invalid': form.errors.has('forthSibAge') }">
                                                    <has-error :form="form" field="forthSibAge"></has-error>
                                                </div>
                                            </div>
                                            <div class="col">
                                                <div class="form-group">
                                                    <label>SCHOOL/EMPLOYER</label>er">
                                                    <input v-model="form.forthSibSchoolOrEmployer" type="text"
                                                           name="forthSibSchoolOrEmployer"
                                                           class="form-control"
                                                           :class="{ 'is-invalid': form.errors.has('forthSibSchoolOrEmployer') }">
                                                    <has-error :form="form"
                                                               field="forthSibSchoolOrEmployer"></has-error>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="col">
                                                <div class="form-group">
                                                    <label>CLASS/SALARY</label>
                                                    <input v-model="form.forthSibClassOrSalary" type="text"
                                                           name="forthSibClassOrSalary"
                                                           class="form-control"
                                                           :class="{ 'is-invalid': form.errors.has('forthSibClassOrSalary') }">
                                                    <has-error :form="form" field="forthSibClassOrSalary"></has-error>
                                                </div>
                                            </div>
                                            <div class="col">
                                                <div class="form-group">
                                                    <label>OTHER INFORMATION (if any)</label>
                                                    <textarea v-model="form.forthSibOthers" class="form-control"
                                                              rows="3"
                                                              :class="{ 'is-invalid': form.errors.has('forthSibOthers') }"></textarea>
                                                    <has-error :form="form" field="firstSibOthers"></has-error>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card" style="padding: 20px;">
                                        <h4>Fifth Sibling</h4>
                                        <div class="form-row">
                                            <div class="col">
                                                <div class="form-group">
                                                    <label>SIBLING NAME</label>
                                                    <input v-model="form.fifthSibName" type="text"
                                                           name="fifthSibName"
                                                           class="form-control"
                                                           :class="{ 'is-invalid': form.errors.has('fifthSibName') }">
                                                    <has-error :form="form" field="fifthSibName"></has-error>
                                                </div>
                                            </div>
                                            <div class="col">
                                                <div class="form-group">
                                                    <label>SIBLING AGE</label>
                                                    <input v-model="form.fifthSibAge" type="number"
                                                           name="fifthSibAge"
                                                           class="form-control" min="1"
                                                           :class="{ 'is-invalid': form.errors.has('fifthSibAge') }">
                                                    <has-error :form="form" field="fifthSibAge"></has-error>
                                                </div>
                                            </div>
                                            <div class="col">
                                                <div class="form-group">
                                                    <label>SCHOOL/EMPLOYER</label>
                                                    <input v-model="form.fifthSibSchoolOrEmployer" type="text"
                                                           name="fifthSibSchoolOrEmployer"
                                                           class="form-control"
                                                           :class="{ 'is-invalid': form.errors.has('fifthSibSchoolOrEmployer') }">
                                                    <has-error :form="form"
                                                               field="fifthSibSchoolOrEmployer"></has-error>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="col">
                                                <div class="form-group">
                                                    <label>CLASS/SALARY</label>
                                                    <input v-model="form.fifthSibClassOrSalary" type="text"
                                                           name="fifthSibClassOrSalary"
                                                           class="form-control"
                                                           :class="{ 'is-invalid': form.errors.has('fifthSibClassOrSalary') }">
                                                    <has-error :form="form" field="fifthSibClassOrSalary"></has-error>
                                                </div>
                                            </div>
                                            <div class="col">
                                                <div class="form-group">
                                                    <label>OTHER INFORMATION (if any)</label>
                                                    <textarea v-model="form.fifthSibOthers" class="form-control"
                                                              rows="3"
                                                              :class="{ 'is-invalid': form.errors.has('fifthSibOthers') }"></textarea>
                                                    <has-error :form="form" field="fifthSibOthers"></has-error>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card" style="padding: 20px;">
                                        <h4>Sixth Sibling</h4>
                                        <div class="form-row">
                                            <div class="col">
                                                <div class="form-group">
                                                    <label>SIBLING NAME</label>
                                                    <input v-model="form.sixthSibName" type="text"
                                                           name="sixthSibName"
                                                           class="form-control"
                                                           :class="{ 'is-invalid': form.errors.has('sixthSibName') }">
                                                    <has-error :form="form" field="sixthSibName"></has-error>
                                                </div>
                                            </div>
                                            <div class="col">
                                                <div class="form-group">
                                                    <label>SIBLING AGE</label>
                                                    <input v-model="form.sixthSibAge" type="number"
                                                           name="sixthSibAge"
                                                           class="form-control" min="1"
                                                           :class="{ 'is-invalid': form.errors.has('sixthSibAge') }">
                                                    <has-error :form="form" field="sixthSibAge"></has-error>
                                                </div>
                                            </div>
                                            <div class="col">
                                                <div class="form-group">
                                                    <label>SCHOOL/EMPLOYER</label>
                                                    <input v-model="form.sixthSibSchoolOrEmployer" type="text"
                                                           name="firstSibSchoolOrEmployer"
                                                           class="form-control"
                                                           :class="{ 'is-invalid': form.errors.has('sixthSibSchoolOrEmployer') }">
                                                    <has-error :form="form"
                                                               field="sixthSibSchoolOrEmployer"></has-error>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="col">
                                                <div class="form-group">
                                                    <label>CLASS/SALARY</label>
                                                    <input v-model="form.sixthSibClassOrSalary" type="text"
                                                           name="sixthSibClassOrSalary"
                                                           class="form-control"
                                                           :class="{ 'is-invalid': form.errors.has('sixthSibClassOrSalary') }">
                                                    <has-error :form="form" field="sixthSibClassOrSalary"></has-error>
                                                </div>
                                            </div>
                                            <div class="col">
                                                <div class="form-group">
                                                    <label>OTHER INFORMATION (if any)</label>
                                                    <textarea v-model="form.sixthSibOthers" class="form-control"
                                                              rows="3"
                                                              :class="{ 'is-invalid': form.errors.has('sixthSibOthers') }"></textarea>
                                                    <has-error :form="form" field="sixthSibOthers"></has-error>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </section>
                            <section v-if="step==5">
                                <h3>PART C: APPLICANT'S EVIDENCE OF NEED</h3>
                                <h4>Applicant's Information</h4>
                                <div class="form-row">
                                    <div class="col">
                                        <div class="form-group">
                                            <label>Why are you applying for a scholarship?</label><span class="text-danger">&#42;</span><br><br>
                                            <textarea v-model="form.whyApply" class="form-control" name="whyApply"
                                                      rows="3"
                                                      :class="{ 'is-invalid': form.errors.has('whyApply') }"></textarea>
                                            <has-error :form="form" field="whyApply"></has-error>
                                            <small style="color: red" v-if="error && errors.whyApply">{{
                                                errors.whyApply[0] }}</small>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-group">
                                            <label>Have you received any financial
                                                support/Bursaries in the past? Please provide
                                                documentation</label>
                                            <textarea v-model="form.finSupport" class="form-control" name="finSupport"
                                                      rows="3"
                                                      :class="{ 'is-invalid': form.errors.has('finSupport') }"></textarea>
                                            <has-error :form="form" field="finSupport"></has-error>
                                            <small style="color: red" v-if="error && errors.finSupport">{{
                                                errors.finSupport[0] }}</small>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="col">
                                        <div class="form-group">
                                            <label>Do you have any special need? For example:
                                                Chronic illness, disability. Please provide
                                                documentation</label><span class="text-danger">&#42;</span>
                                            <textarea v-model="form.specialNeeds" class="form-control"
                                                      name="specialNeeds"
                                                      rows="3"
                                                      :class="{ 'is-invalid': form.errors.has('specialNeeds') }"></textarea>
                                            <has-error :form="form" field="specialNeeds"></has-error>
                                            <small style="color: red" v-if="error && errors.specialNeeds">{{
                                                errors.specialNeeds[0] }}</small>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-group">
                                            <label>Any other cause for special needs? describe:</label><br><br>
                                            <textarea v-model="form.otherSpecialNeeds" class="form-control"
                                                      name="otherSpecialNeeds"
                                                      rows="3"
                                                      :class="{ 'is-invalid': form.errors.has('otherSpecialNeeds') }"></textarea>
                                            <has-error :form="form" field="otherSpecialNeeds"></has-error>
                                            <small style="color: red" v-if="error && errors.otherSpecialNeeds">{{
                                                errors.otherSpecialNeeds[0] }}</small>
                                        </div>
                                    </div>
                                </div>
                                <h4>Applicant's Information</h4>
                                <hr>
                                <div>
                                    <h5>Age of your parents / guardians:</h5>
                                </div>
                                <div class="form-row">
                                    <div class="col">
                                        <div class="form-group">
                                            <label>Father/Male Guardian</label>
                                            <input v-model="form.fOrGAge" type="number" name="fOrGAge" min="1"
                                                   class="form-control"
                                                   :class="{ 'is-invalid': form.errors.has('fOrGAge') }">
                                            <has-error :form="form" field="fOrGAge"></has-error>
                                            <small style="color: red" v-if="error && errors.fOrGAge">{{
                                                errors.fOrGAge[0] }}</small>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-group">
                                            <label>Mother/ Female Guardian</label>
                                            <input v-model="form.mOrGAge" type="number" name="mOrGAge" min="1"
                                                   class="form-control"
                                                   :class="{ 'is-invalid': form.errors.has('mOrGAge') }">
                                            <has-error :form="form" field="mOrGAge"></has-error>
                                            <small style="color: red" v-if="error && errors.mOrGAge">{{
                                                errors.mOrGAge[0] }}</small>
                                        </div>
                                    </div>
                                </div>
                                <hr>
                                <div>
                                    <h5>Is the parent(s) disabled? Describe the disability:</h5>
                                </div>
                                <div class="form-row">
                                    <div class="col">
                                        <div class="form-group">
                                            <label>Father/Male Guardian</label>
                                            <textarea v-model="form.fOrGDisability" class="form-control"
                                                      name="fOrGDisability"
                                                      rows="3"
                                                      :class="{ 'is-invalid': form.errors.has('fOrGDisability') }"></textarea>
                                            <has-error :form="form" field="fOrGDisability"></has-error>
                                            <small style="color: red" v-if="error && errors.fOrGDisability">{{
                                                errors.fOrGDisability[0] }}</small>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-group">
                                            <label>Mother/ Female Guardian</label>
                                            <textarea v-model="form.mOrGDisability" class="form-control"
                                                      name="mOrGDisability"
                                                      rows="3"
                                                      :class="{ 'is-invalid': form.errors.has('mOrGDisability') }"></textarea>
                                            <has-error :form="form" field="mOrGDisability"></has-error>
                                            <small style="color: red" v-if="error && errors.mOrGDisability">{{
                                                errors.mOrGDisability[0] }}</small>
                                        </div>
                                    </div>
                                </div>
                                <hr>
                                <div>
                                    <h5>Does either of your parents / guardians
                                        suffer from a chronic disease or ailment,
                                        describe:</h5>
                                </div>
                                <div class="form-row">
                                    <div class="col">
                                        <div class="form-group">
                                            <label>Father/Male Guardian</label>
                                            <textarea v-model="form.fOrGAilment" class="form-control"
                                                      name="fOrGAilment"
                                                      rows="3"
                                                      :class="{ 'is-invalid': form.errors.has('fOrGAilment') }"></textarea>
                                            <has-error :form="form" field="fOrGAilment"></has-error>
                                            <small style="color: red" v-if="error && errors.fOrGAilment">{{
                                                errors.fOrGAilment[0] }}</small>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-group">
                                            <label>Mother/ Female Guardian</label>
                                            <textarea v-model="form.mOrGAilment" class="form-control"
                                                      name="mOrGDisability"
                                                      rows="3"
                                                      :class="{ 'is-invalid': form.errors.has('mOrGAilment') }"></textarea>
                                            <has-error :form="form" field="mOrGAilment"></has-error>
                                            <small style="color: red" v-if="error && errors.mOrGAilment">{{
                                                errors.mOrGAilment[0] }}</small>
                                        </div>
                                    </div>
                                </div>
                                <hr>
                                <div>
                                    <h5>Have either of your parents abandoned your
                                        family? Describe:</h5>
                                </div>
                                <div class="form-row">
                                    <div class="col">
                                        <div class="form-group">
                                            <label>Father/Male Guardian</label>
                                            <textarea v-model="form.fOrGAbandon" class="form-control"
                                                      name="fOrGAbandon"
                                                      rows="3"
                                                      :class="{ 'is-invalid': form.errors.has('fOrGAbandon') }"></textarea>
                                            <has-error :form="form" field="fOrGAbandon"></has-error>
                                            <small style="color: red" v-if="error && errors.fOrGAbandon">{{
                                                errors.fOrGAbandon[0] }}</small>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-group">
                                            <label>Mother/ Female Guardian</label>
                                            <textarea v-model="form.mOrGAbandon" class="form-control"
                                                      name="mOrGAbandon"
                                                      rows="3"
                                                      :class="{ 'is-invalid': form.errors.has('mOrGAbandon') }"></textarea>
                                            <has-error :form="form" field="mOrGAbandon"></has-error>
                                            <small style="color: red" v-if="error && errors.mOrGAbandon">{{
                                                errors.mOrGAbandon[0] }}</small>
                                        </div>
                                    </div>
                                </div>
                                <hr>
                                <div>
                                    <h5>Are your parents / guardians employed? Give
                                        details of job and salary per month: attach
                                        Payslip</h5>
                                </div>
                                <div class="form-row">
                                    <div class="col">
                                        <div class="form-group">
                                            <label>Father/Male Guardian</label>
                                            <textarea v-model="form.fOrGEmployment" class="form-control"
                                                      name="fOrGEmployment"
                                                      rows="3"
                                                      :class="{ 'is-invalid': form.errors.has('fOrGEmployment') }"></textarea>
                                            <has-error :form="form" field="fOrGEmployment"></has-error>
                                            <small style="color: red" v-if="error && errors.fOrGEmployment">{{
                                                errors.fOrGEmployment[0] }}</small>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-group">
                                            <label>Mother/ Female Guardian</label>
                                            <textarea v-model="form.mOrGEmployment" class="form-control"
                                                      name="mOrGEmployment"
                                                      rows="3"
                                                      :class="{ 'is-invalid': form.errors.has('mOrGEmployment') }"></textarea>
                                            <has-error :form="form" field="mOrGEmployment"></has-error>
                                            <small style="color: red" v-if="error && errors.mOrGEmployment">{{
                                                errors.mOrGEmployment[0] }}</small>
                                        </div>
                                    </div>
                                </div>
                                <hr>
                                <div>
                                    <h5>Do your parents / guardians own a business?
                                        Describe and show the average monthly
                                        income: Attach Bank Statement</h5>
                                </div>
                                <div class="form-row">
                                    <div class="col">
                                        <div class="form-group">
                                            <label>Father/Male Guardian</label>
                                            <textarea v-model="form.fOrGBusiness" class="form-control"
                                                      name="fOrGBusiness"
                                                      rows="3"
                                                      :class="{ 'is-invalid': form.errors.has('fOrGBusiness') }"></textarea>
                                            <has-error :form="form" field="fOrGBusiness"></has-error>
                                            <small style="color: red" v-if="error && errors.fOrGBusiness">{{
                                                errors.fOrGBusiness[0] }}</small>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-group">
                                            <label>Mother/ Female Guardian</label>
                                            <textarea v-model="form.mOrGBusiness" class="form-control"
                                                      name="mOrGBusiness"
                                                      rows="3"
                                                      :class="{ 'is-invalid': form.errors.has('mOrGBusiness') }"></textarea>
                                            <has-error :form="form" field="mOrGBusiness"></has-error>
                                            <small style="color: red" v-if="error && errors.mOrGBusiness">{{
                                                errors.mOrGBusiness[0] }}</small>
                                        </div>
                                    </div>
                                </div>
                                <hr>
                                <div>
                                    <h5>Do your parents / guardians own land? state
                                        number of acres, type of crops grown,
                                        number of cows/sheep/goats/donkeys and
                                        income from such assets:</h5>
                                </div>
                                <div class="form-row">
                                    <div class="col">
                                        <div class="form-group">
                                            <label>Father/Male Guardian</label>
                                            <textarea v-model="form.fOrGLand" class="form-control"
                                                      name="fOrGLand"
                                                      rows="3"
                                                      :class="{ 'is-invalid': form.errors.has('fOrGLand') }"></textarea>
                                            <has-error :form="form" field="fOrGLand"></has-error>
                                            <small style="color: red" v-if="error && errors.fOrGLand">{{
                                                errors.fOrGLand[0] }}</small>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-group">
                                            <label>Mother/ Female Guardian</label>
                                            <textarea v-model="form.mOrGLand" class="form-control"
                                                      name="mOrGLand"
                                                      rows="3"
                                                      :class="{ 'is-invalid': form.errors.has('mOrGLand') }"></textarea>
                                            <has-error :form="form" field="mOrGLand"></has-error>
                                            <small style="color: red" v-if="error && errors.mOrGLand">{{
                                                errors.mOrGLand[0] }}</small>
                                        </div>
                                    </div>
                                </div>
                                <hr>
                                <div>
                                    <h5>Do your parents / guardians have any other
                                        assets or source of income, including casual
                                        labour? Indicate the approximate monthly
                                        income</h5>
                                </div>
                                <div class="form-row">
                                    <div class="col">
                                        <div class="form-group">
                                            <label>Father/Male Guardian</label>
                                            <textarea v-model="form.fOrGAssets" class="form-control"
                                                      name="fOrGAssets"
                                                      rows="3"
                                                      :class="{ 'is-invalid': form.errors.has('fOrGAssets') }"></textarea>
                                            <has-error :form="form" field="fOrGAssets"></has-error>
                                            <small style="color: red" v-if="error && errors.fOrGAssets">{{
                                                errors.fOrGAssets[0] }}</small>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-group">
                                            <label>Mother/ Female Guardian</label>
                                            <textarea v-model="form.mOrGAssets" class="form-control"
                                                      name="mOrGAssets"
                                                      rows="3"
                                                      :class="{ 'is-invalid': form.errors.has('mOrGAssets') }"></textarea>
                                            <has-error :form="form" field="mOrGAssets"></has-error>
                                            <small style="color: red" v-if="error && errors.mOrGAssets">{{
                                                errors.mOrGAssets[0] }}</small>
                                        </div>
                                    </div>
                                </div>
                                <h4>Family Information</h4>
                                <div class="form-row">
                                    <div class="col">
                                        <div class="form-group">
                                            <label>Has your family been affected by civil
                                                conflict or natural disasters such as flooding,
                                                drought, fire, or famine? Describe:</label>
                                            <textarea v-model="form.familyConflict" class="form-control"
                                                      name="familyConflict"
                                                      rows="3"
                                                      :class="{ 'is-invalid': form.errors.has('familyConflict') }"></textarea>
                                            <has-error :form="form" field="familyConflict"></has-error>
                                            <small style="color: red" v-if="error && errors.familyConflict">{{
                                                errors.familyConflict[0] }}</small>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-group">
                                            <label>What type of house do you live in? Describe</label><br><br>
                                            <textarea v-model="form.familyHouse" class="form-control" name="familyHouse"
                                                      rows="3"
                                                      :class="{ 'is-invalid': form.errors.has('familyHouse') }"></textarea>
                                            <has-error :form="form" field="familyHouse"></has-error>
                                            <small style="color: red" v-if="error && errors.familyHouse">{{
                                                errors.familyHouse[0] }}</small>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="col">
                                        <div class="form-group">
                                            <label>Please describe any other cause of
                                                disadvantage or vulnerability?</label>
                                            <textarea v-model="form.otherDis" class="form-control"
                                                      name="otherDis"
                                                      rows="3"
                                                      :class="{ 'is-invalid': form.errors.has('otherDis') }"></textarea>
                                            <small style="color: red" v-if="error && errors.otherDis">{{
                                                errors.otherDis[0] }}</small>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-group">
                                            <label>How many siblings are in secondary school,
                                                collage and tertiary level.</label>
                                            <textarea v-model="form.siblingsInfo" class="form-control"
                                                      name="siblingsInfo"
                                                      rows="3"
                                                      :class="{ 'is-invalid': form.errors.has('siblingsInfo') }"></textarea>
                                            <small style="color: red" v-if="error && errors.siblingsInfo">{{
                                                errors.siblingsInfo[0] }}</small>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="col">
                                        <div class="form-group justify-content-center">
                                            <label for="files">Please attach all RELEVANT DOCUMENTS. Copies of ALL
                                                DOCUMENTS required must be provided by the applicant. Any applications
                                                without
                                                relevant documents will be rejected</label>
                                            <input type="file" multiple class="form-control-file" @change="fieldChange($event, 4)"
                                                   id="files" accept="image/*, application/pdf, application/vnd.openxmlformats-officedocument.wordprocessingml.document(.docx)">
                                            <small style="color: red" v-if="error && errors.attachments">{{
                                                errors.attachments[0] }}</small>
                                        </div>
                                    </div>
                                    <div class="col">

                                    </div>
                                </div>
                            </section>
                            <section v-if="step==6">
                                <h3>PART D</h3>
                                <div class="form-row">
                                    <div class="col">
                                        <div class="form-group">
                                            <label>How did you first learn about the Governor's scholarship
                                                program?</label>
                                            <div class="form-check form-check-inline">
                                                <input v-model="form.hear" class="form-check-input" type="radio"
                                                       name="classification" value="Ward Level"
                                                       :class="{ 'is-invalid': form.errors.has('hear') }">
                                                <label class="form-check-label">Ward Level</label>
                                            </div>
                                            <br>
                                            <div class="form-check form-check-inline">
                                                <input v-model="form.hear" class="form-check-input" type="radio"
                                                       name="classification"
                                                       value="School - teacher, principal or Ward Representative"
                                                       :class="{ 'is-invalid': form.errors.has('hear') }">
                                                <label class="form-check-label">School - teacher, principal or Ward
                                                    Representative</label>
                                            </div>
                                            <br>
                                            <div class="form-check form-check-inline">
                                                <input v-model="form.hear" class="form-check-input" type="radio"
                                                       name="Church, mosques, synagogue"
                                                       value="Church, mosques, synagogue"
                                                       :class="{ 'is-invalid': form.errors.has('hear') }">
                                                <label class="form-check-label">Church, mosques, synagogue</label>
                                            </div>
                                            <br>
                                            <div class="form-check form-check-inline">
                                                <input v-model="form.hear" class="form-check-input" type="radio"
                                                       name="Friends, parents, guardians or relative"
                                                       value="Friends, parents, guardians or relative"
                                                       :class="{ 'is-invalid': form.errors.has('hear') }">
                                                <label class="form-check-label">Friends, parents, guardians or
                                                    relative</label>
                                            </div>
                                            <br>
                                            <div class="form-check form-check-inline">
                                                <input v-model="form.hear" class="form-check-input" type="radio"
                                                       name="Internet" value="Internet"
                                                       :class="{ 'is-invalid': form.errors.has('hear') }">
                                                <label class="form-check-label">Internet</label>
                                            </div>
                                            <br>
                                            <div class="form-check form-check-inline">
                                                <input v-model="form.hear" class="form-check-input" type="radio"
                                                       name="Radio, TV" value="Radio, TV"
                                                       :class="{ 'is-invalid': form.errors.has('hear') }">
                                                <label class="form-check-label">Radio, TV</label>
                                            </div>
                                            <br>
                                            <div class="form-check form-check-inline">
                                                <input v-model="form.hear" class="form-check-input" type="radio"
                                                       name="Newspaper, magazine" value="Newspaper, magazine"
                                                       :class="{ 'is-invalid': form.errors.has('hear') }">
                                                <label class="form-check-label">Newspaper, magazine</label>
                                            </div>
                                            <br>
                                            <div class="form-check form-check-inline">
                                                <input v-model="form.hear" class="form-check-input" type="radio"
                                                       name="Social work such as face book, Twitter, MySpace"
                                                       value="Social work such as face book, Twitter, MySpace"
                                                       :class="{ 'is-invalid': form.errors.has('hear') }">
                                                <label class="form-check-label">Social work such as face book, Twitter,
                                                    MySpace</label>
                                            </div>
                                            <br>
                                            <div class="form-check form-check-inline">
                                                <input v-model="form.hear" class="form-check-input" type="radio"
                                                       name="other" value="Other"
                                                       :class="{ 'is-invalid': form.errors.has('hear') }">
                                                <label class="form-check-label">Other</label>
                                                <has-error :form="form" field="classification"></has-error>
                                            </div>
                                            <small style="color: red" v-if="error && errors.hear">{{ errors.hear[0]
                                                }}</small>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-group"
                                             v-if="this.form.hear == 'School - teacher, principal or Ward Representative'">
                                            <label>Enter Name</label>
                                            <input v-model="form.hearDetails" type="text" name="hearDetails"
                                                   class="form-control"
                                                   :class="{ 'is-invalid': form.errors.has('hearDetails') }">
                                            <has-error :form="form" field="hearDetails"></has-error>
                                        </div>
                                        <div class="form-group" v-if="this.form.hear == 'Church, mosques, synagogue'">
                                            <label>Specify Name</label>
                                            <input v-model="form.hearDetails" type="text" name="hearDetails"
                                                   class="form-control"
                                                   :class="{ 'is-invalid': form.errors.has('hearDetails') }">
                                            <has-error :form="form" field="hearDetails"></has-error>
                                        </div>
                                        <div class="form-group" v-if="this.form.hear == 'Internet'">
                                            <label>Specify Site</label>
                                            <input v-model="form.hearDetails" type="text" name="hearDetails"
                                                   class="form-control"
                                                   :class="{ 'is-invalid': form.errors.has('hearDetails') }">
                                            <has-error :form="form" field="hearDetails"></has-error>
                                        </div>
                                        <div class="form-group" v-if="this.form.hear == 'Radio, TV'">
                                            <label>Specify</label>
                                            <input v-model="form.hearDetails" type="text" name="hearDetails"
                                                   class="form-control"
                                                   :class="{ 'is-invalid': form.errors.has('hearDetails') }">
                                            <has-error :form="form" field="hearDetails"></has-error>
                                        </div>
                                        <div class="form-group" v-if="this.form.hear == 'Newspaper, magazine'">
                                            <label>Specify</label>
                                            <input v-model="form.hearDetails" type="text" name="hearDetails"
                                                   class="form-control"
                                                   :class="{ 'is-invalid': form.errors.has('hearDetails') }">
                                            <has-error :form="form" field="hearDetails"></has-error>
                                        </div>
                                        <div class="form-group"
                                             v-if="this.form.hear == 'Social work such as face book, Twitter, MySpace'">
                                            <label>Specify</label>
                                            <input v-model="form.hearDetails" type="text" name="hearDetails"
                                                   class="form-control"
                                                   :class="{ 'is-invalid': form.errors.has('hearDetails') }">
                                            <has-error :form="form" field="hearDetails"></has-error>
                                        </div>
                                        <div class="form-group" v-if="this.form.hear == 'Other'">
                                            <label>Specify</label>
                                            <input v-model="form.hearDetails" type="text" name="hearDetails"
                                                   class="form-control"
                                                   :class="{ 'is-invalid': form.errors.has('hearDetails') }">
                                            <has-error :form="form" field="hearDetails"></has-error>
                                        </div>
                                    </div>
                                </div>
                            </section>

                            <button v-if="step != 1" type="button" class="btn btn-success " @click.prevent="prevStep">
                                Previous Step
                            </button>
                            <button v-if="step != totalSteps" type="button" class="btn btn-success"
                                    @click.prevent="nextStep">Next Step
                            </button>
                            <button v-if="step == 6" type="button" class="btn btn-success btn-submit"
                                    @click.prevent="sendApplication()" :disabled="loading">
                                <div class="loader">
                                    <div class="lds-roller" v-if="loading">
                                        <div></div>
                                        <div></div>
                                        <div></div>
                                        <div></div>
                                        <div></div>
                                        <div></div>
                                        <div></div>
                                        <div></div>
                                    </div>
                                </div>
                                Submit Application
                            </button>

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
        components: {
            VuePhoneNumberInput,
        },
        data() {
            return {
                motherId: [],
                fatherId: [],
                slip: [],
                errors: {},
                error: false,
                step: 1,
                totalSteps: 6,
                counties: {},
                wards: {},
                Gwards: {},
                info: {},
                now: moment().format('YYYY'),
                enable: {},
                watch: 0,
                yearz: {},
                loading: false,
                attachments: [],
                e_ftelephone: '',
                e_alt_ftelephone: '',
                e_mtelephone: '',
                e_alt_mtelephone: '',
                e_gtelephone: '',
                e_alt_gtelephone: '',
                e_telephone: '',
                e_alt_telephone: '',
                formf: new FormData(),
                form: new Form({
                    type: 'scholarship',
                    yearz: '',
                    firstName: '',
                    middleName: '',
                    lastName: '',
                    dob: '',
                    parentName: '',
                    box: '',
                    gender: '',
                    telephone: '',
                    alt_telephone: '',
                    county: 1,
                    ward: '',
                    subcounty: '',
                    location: '',
                    sublocation: '',
                    kcpeMarks: '',
                    indexNo: '',
                    kcpeYear: '',
                    kcpeQuiz: '',
                    repeatQuiz: '',
                    secSchoolName: '',
                    classification: '',

                    fatherFirstName: '',
                    fatherMiddleName: '',
                    fatherLastName: '',
                    motherFirstName: '',
                    motherMiddleName: '',
                    motherLastName: '',
                    guardianFirstName: '',
                    guardianMiddleName: '',
                    guardianLastName: '',
                    fatherIdNo: '',
                    motherIdNo: '',
                    guardianIdNo: '',
                    fatherOccupation: '',
                    motherOccupation: '',
                    guardianOccupation: '',
                    fliving: '',
                    mliving: '',
                    ftelephone: '',
                    mtelephone: '',
                    gtelephone: '',
                    alt_ftelephone: '',
                    alt_mtelephone: '',
                    alt_gtelephone: '',
                    fbox: '',
                    mbox: '',
                    gbox: '',
                    relationship: '',
                    gcounty: '',
                    gward: '',
                    gsubcounty: '',
                    glocation: '',
                    gsublocation: '',
                    inheritance: '',

                    whyApply: '',
                    finSupport: '',
                    specialNeeds: '',
                    otherSpecialNeeds: '',
                    fOrGAge: '',
                    mOrGAge: '',
                    fOrGDisability: '',
                    mOrGDisability: '',
                    fOrGAilment: '',
                    mOrGAilment: '',
                    fOrGAbandon: '',
                    mOrGAbandon: '',
                    fOrGEmployment: '',
                    mOrGEmployment: '',
                    fOrGBusiness: '',
                    mOrGBusiness: '',
                    fOrGLand: '',
                    mOrGLand: '',
                    fOrGAssets: '',
                    mOrGAssets: '',
                    familyConflict: '',
                    familyHouse: '',
                    otherDis: '',
                    siblingsInfo: '',
                    hear: '',
                    hearDetails: '',

                    firstSibName: '',
                    firstSibAge: '',
                    firstSibSchoolOrEmployer: '',
                    firstSibClassOrSalary: '',
                    firstSibOthers: '',

                    secondSibName: '',
                    secondSibSchoolOrEmployer: '',
                    secondSibAge: '',
                    secondSibClassOrSalary: '',
                    secondSibOthers: '',

                    thirdSibName: '',
                    thirdSibAge: '',
                    thirdSibSchoolOrEmployer: '',
                    thirdSibClassOrSalary: '',
                    thirdSibOthers: '',

                    forthSibName: '',
                    forthSibAge: '',
                    forthSibSchoolOrEmployer: '',
                    forthSibClassOrSalary: '',
                    forthSibOthers: '',

                    fifthSibName: '',
                    fifthSibAge: '',
                    fifthSibSchoolOrEmployer: '',
                    fifthSibClassOrSalary: '',
                    fifthSibOthers: '',

                    sixthSibName: '',
                    sixthSibAge: '',
                    sixthSibSchoolOrEmployer: '',
                    sixthSibClassOrSalary: '',
                    sixthSibOthers: '',
                })
            }
        },
        methods: {
            printSib() {
                console.log(this.sibling);
            },
            fieldChange(event, type) {
                let selectedFiles = event.target.files;
                if (!selectedFiles.length) {
                    return false;
                }
                if (type == 1) {
                    for (let i = 0; i < selectedFiles.length; i++) {
                        if (selectedFiles[i].size < 10000000) {
                            this.slip.push(selectedFiles[i]);
                        } else {
                            Swal.fire({
                                type: 'error',
                                title: 'Ooops...',
                                text: 'File too large. Only under 10mbs allowed',
                            })
                        }
                    }
                }

                if (type == 2) {
                    for (let i = 0; i < selectedFiles.length; i++) {
                        if (selectedFiles[i].size < 10000000) {
                            this.fatherId.push(selectedFiles[i]);
                        } else {
                            Swal.fire({
                                type: 'error',
                                title: 'Ooops...',
                                text: 'File too large. Only under 10mbs allowed',
                            })
                        }
                    }
                }

                if (type == 3) {
                    for (let i = 0; i < selectedFiles.length; i++) {
                        if (selectedFiles[i].size < 10000000) {
                            this.motherId.push(selectedFiles[i]);
                        } else {
                            Swal.fire({
                                type: 'error',
                                title: 'Ooops...',
                                text: 'File too large. Only under 10mbs allowed',
                            })
                        }
                    }
                }

                if (type == 4) {
                    for (let i = 0; i < selectedFiles.length; i++) {
                        if (selectedFiles[i].size < 10000000) {
                            this.attachments.push(selectedFiles[i]);
                        } else {
                            Swal.fire({
                                type: 'error',
                                title: 'Ooops...',
                                text: 'File too large. Only under 10mbs allowed',
                            })
                        }
                    }
                }
            },
            sendOther(applicationId) {
                for (let i = 0; i < this.attachments.length; i++) {
                    this.formf.append('files[]', this.attachments[i]);
                }

                for (let i = 0; i < this.slip.length; i++) {
                    this.formf.append('slip[]', this.slip[i]);
                }

                for (let i = 0; i < this.motherId.length; i++) {
                    this.formf.append('motherId[]', this.motherId[i]);
                }


                for (let i = 0; i < this.fatherId.length; i++) {
                    this.formf.append('fatherId[]', this.fatherId[i]);
                }


                this.formf.append('applicationId', applicationId);
                const config = {headers: {'Content-Type': 'multipart/form-data'}};

                axios.post('/api/complete', this.formf, config).then(response => {
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
                        this.errors = error.response.data.errors;
                        Swal.fire({
                            type: 'error',
                            title: 'Error!!',
                            text: error.response.data.msg,

                        })
                    });
            },
            next() {
                this.step++
            },
            removeSiblingForm(index) {
                this.sibling.splice(index, 1);
            },
            addSibling() {
                this.sibling.push({
                    name: '',
                    age: '',
                    schoolOrEmployer: '',
                    classOrSalary: '',
                    others: '',
                });
            },
            sendApplication() {
                if (this.$gate.isStudent()) {
                    this.loading = true;
                    this.form.post('api/applyScholarship')
                        .then(({data}) => {
                            this.sendOther(data);

                        })
                        .catch(error => {
                            this.loading = false;
                            this.error = true;
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
            getGuardianId(e) {
                let file = e.target.files[0];
                var reader = new FileReader();
                if (file['size'] < 2111775) {
                    if (file['type'] == 'image/png' || file['type'] == 'image/jpg' || file['type'] == 'image/jpeg') {
                        reader.onloadend = (file) => {
                            // console.log('Result', reader.result)
                            this.form.guardianId = reader.result;
                        }

                        reader.readAsDataURL(file);
                    } else {
                        Swal.fire({
                            type: 'error',
                            title: 'Ooops...',
                            text: 'Only images and pdfs are allowed',
                        })
                    }

                } else {
                    Swal.fire({
                        type: 'error',
                        title: 'Ooops...',
                        text: 'You are uploading a large file',
                    })
                }
            },

            getFatherId(e) {
                console.log('Father');
                let file = e.target.files[0];
                var reader = new FileReader();
                if (file['size'] < 2111775) {
                    if (file['type'] == 'image/png' || file['type'] == 'image/jpg' || file['type'] == 'image/jpeg') {
                        reader.onloadend = (file) => {
                            // console.log('Result', reader.result)
                            this.form.fatherId = reader.result;
                        }

                        reader.readAsDataURL(file);
                    } else {
                        Swal.fire({
                            type: 'error',
                            title: 'Ooops...',
                            text: 'Only images and pdfs are allowed',
                        })
                    }

                } else {
                    Swal.fire({
                        type: 'error',
                        title: 'Ooops...',
                        text: 'You are uploading a large file',
                    })
                }
            },
            getMotherId(e) {
                let file = e.target.files[0];
                var reader = new FileReader();
                if (file['size'] < 2111775) {
                    if (file['type'] == 'image/png' || file['type'] == 'image/jpg' || file['type'] == 'image/jpeg') {
                        reader.onloadend = (file) => {
                            // console.log('Result', reader.result)
                            this.form.motherId = reader.result;
                        }

                        reader.readAsDataURL(file);
                    } else {
                        Swal.fire({
                            type: 'error',
                            title: 'Ooops...',
                            text: 'Only images and pdfs are allowed',
                        })
                    }

                } else {
                    Swal.fire({
                        type: 'error',
                        title: 'Ooops...',
                        text: 'You are uploading a large file',
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
                    } else if (!this.form.gender) {
                        this.form.errors.set({
                            gender: 'This field is required'
                        })
                        return false;
                    } else if (!this.form.dob) {
                        this.form.errors.set({
                            dob: 'This field is required'
                        })
                        return false;
                    } else if (!this.form.parentName) {
                        this.form.errors.set({
                            parentName: 'This field is required'
                        })
                        return false;
                    } else if (!this.form.box) {
                        this.form.errors.set({
                            box: 'This field is required'
                        })
                        return false;
                    } else if (!this.form.telephone) {
                        this.e_telephone = 'This field is required';
                        return false;
                    } else if (!this.form.alt_telephone) {
                        this.e_alt_telephone = 'This field is required';
                        return false;
                    } else if (!this.form.ward) {
                        this.form.errors.set({
                            ward: 'This field is required'
                        })
                        return false;
                    } else if (!this.form.subcounty) {
                        this.form.errors.set({
                            subcounty: 'This field is required'
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
                    } else if (!this.form.kcpeMarks) {
                        this.form.errors.set({
                            kcpeMarks: 'This field is required'
                        })
                        return false;
                    } else if (!this.form.indexNo) {
                        this.form.errors.set({
                            indexNo: 'This field is required'
                        })
                        return false;
                    } else if (!this.slip.length) {
                        this.form.errors.set({
                            resultslip: 'This field is required'
                        })
                        return false;
                    } else if (!this.form.kcpeYear) {
                        this.form.errors.set({
                            kcpeYear: 'This field is required'
                        })
                        return false;
                    } else if (!this.form.kcpeQuiz) {
                        this.form.errors.set({
                            kcpeQuiz: 'This field is required'
                        })
                        return false;
                    } else if (!this.form.repeatQuiz) {
                        this.form.errors.set({
                            repeatQuiz: 'This field is required'
                        })
                        return false;
                    } else if (!this.form.secSchoolName) {
                        this.form.errors.set({
                            secSchoolName: 'This field is required'
                        })
                        return false;
                    } else if (!this.form.classification) {
                        this.form.errors.set({
                            classification: 'This field is required'
                        })
                        return false;
                    } else {
                        this.step++;
                        return false;
                    }
                }

                if (this.step == 3) {
                    if (!this.form.fatherFirstName) {
                        this.form.errors.set({
                            fatherFirstName: 'This field is required'
                        })
                        return false;
                    } else if (!this.form.fatherMiddleName) {
                        this.form.errors.set({
                            fatherMiddleName: 'This field is required'
                        })
                        return false;
                    } else if (!this.form.fatherLastName) {
                        this.form.errors.set({
                            fatherLastName: 'This field is required'
                        })
                        return false;
                    } else if (!this.form.fatherIdNo) {
                        this.form.errors.set({
                            fatherIdNo: 'This field is required'
                        })
                        return false;
                    } else if (!this.fatherId.length) {
                        this.form.errors.set({
                            fatherId: 'This field is required'
                        })
                        return false;
                    } else if (!this.form.fliving) {
                        this.form.errors.set({
                            fliving: 'This field is required'
                        })
                        return false;
                    } else if (!this.form.fatherOccupation) {
                        this.form.errors.set({
                            fatherOccupation: 'This field is required'
                        })
                        return false;
                    } else if (!this.form.ftelephone) {
                        this.e_ftelephone = 'This field is required';
                        return false;
                    } else if (!this.form.alt_ftelephone) {
                        this.e_alt_ftelephone = 'This field is required';
                        return false;
                    } else if (!this.form.fbox) {
                        this.form.errors.set({
                            fbox: 'This field is required'
                        })
                        return false;
                    } else if (!this.form.motherFirstName) {
                        this.form.errors.set({
                            motherFirstName: 'This field is required'
                        })
                        return false;
                    } else if (!this.form.motherMiddleName) {
                        this.form.errors.set({
                            motherMiddleName: 'This field is required'
                        })
                        return false;
                    } else if (!this.form.motherLastName) {
                        this.form.errors.set({
                            motherLastName: 'This field is required'
                        })
                        return false;
                    } else if (!this.form.motherIdNo) {
                        this.form.errors.set({
                            motherIdNo: 'This field is required'
                        })
                        return false;
                    } else if (!this.form.mliving) {
                        this.form.errors.set({
                            mliving: 'This field is required'
                        })
                        return false;
                    } else if (!this.form.motherOccupation) {
                        this.form.errors.set({
                            motherOccupation: 'This field is required'
                        })
                        return false;
                    } else if (!this.motherId.length) {
                        this.form.errors.set({
                            motherId: 'This field is required'
                        })
                        return false;
                    } else if (!this.form.mtelephone) {
                        this.e_mtelephone = 'This field is required';
                        return false;
                    } else if (!this.form.alt_mtelephone) {
                        this.e_alt_mtelephone = 'This field is required';
                        return false;
                    } else if (!this.form.mbox) {
                        this.form.errors.set({
                            mbox: 'This field is required'
                        })
                        return false;
                    } else if (!this.form.guardianFirstName) {
                        this.form.errors.set({
                            guardianFirstName: 'This field is required'
                        })
                        return false;
                    } else if (!this.form.guardianMiddleName) {
                        this.form.errors.set({
                            guardianMiddleName: 'This field is required'
                        })
                        return false;
                    } else if (!this.form.guardianLastName) {
                        this.form.errors.set({
                            guardianLastName: 'This field is required'
                        })
                        return false;
                    } else if (!this.form.guardianIdNo) {
                        this.form.errors.set({
                            guardianIdNo: 'This field is required'
                        })
                        return false;
                    } else if (!this.form.relationship) {
                        this.form.errors.set({
                            relationship: 'This field is required'
                        })
                        return false;
                    } else if (!this.form.guardianOccupation) {
                        this.form.errors.set({
                            guardianOccupation: 'This field is required'
                        })
                        return false;
                    } else if (!this.form.gtelephone) {
                        this.e_gtelephone = 'This field is required';
                        return false;
                    } else if (!this.form.alt_gtelephone) {
                        this.e_alt_gtelephone = 'This field is required';
                        return false;
                    } else if (!this.form.gcounty) {
                        this.form.errors.set({
                            gcounty: 'This field is required'
                        })
                        return false;
                    } else if (!this.form.gward) {
                        this.form.errors.set({
                            gward: 'This field is required'
                        })
                        return false;
                    } else if (!this.form.gbox) {
                        this.form.errors.set({
                            gbox: 'This field is required'
                        })
                        return false;
                    } else if (!this.form.gsubcounty) {
                        this.form.errors.set({
                            gsubcounty: 'This field is required'
                        })
                        return false;
                    } else if (!this.form.glocation) {
                        this.form.errors.set({
                            glocation: 'This field is required'
                        })
                        return false;
                    } else if (!this.form.gsubcounty) {
                        this.form.errors.set({
                            gsubcounty: 'This field is required'
                        })
                        return false;
                    } else if (!this.form.gsublocation) {
                        this.form.errors.set({
                            gsublocation: 'This field is required'
                        })
                        return false;
                    } else if (!this.form.inheritance) {
                        this.form.errors.set({
                            inheritance: 'This field is required'
                        })
                        return false;
                    } else {
                        this.step++;
                        return false;
                    }
                }

                if (this.step == 4) {
                    this.step++;
                    return false;
                }

                if (this.step == 5) {
                    if (!this.form.whyApply) {
                        // set(type, 'required');
                        this.form.errors.set({
                            whyApply: 'This field is required'
                        })
                        return false;
                    } else if (!this.form.finSupport) {
                        this.form.errors.set({
                            finSupport: 'This field is required'
                        })
                        return false;
                    } else if (!this.form.specialNeeds) {
                        this.form.errors.set({
                            specialNeeds: 'This field is required'
                        })
                        return false;
                    } else if (!this.form.otherSpecialNeeds) {
                        this.form.errors.set({
                            otherSpecialNeeds: 'This field is required'
                        })
                        return false;
                    } else if (!this.form.fOrGAge) {
                        this.form.errors.set({
                            fOrGAge: 'This field is required'
                        })
                        return false;
                    } else if (!this.form.mOrGAge) {
                        this.form.errors.set({
                            mOrGAge: 'This field is required'
                        })
                        return false;
                    } else if (!this.form.fOrGDisability) {
                        this.form.errors.set({
                            fOrGDisability: 'This field is required'
                        })
                        return false;
                    } else if (!this.form.mOrGDisability) {
                        this.form.errors.set({
                            mOrGDisability: 'This field is required'
                        })
                        return false;
                    } else if (!this.form.fOrGAilment) {
                        this.form.errors.set({
                            fOrGAilment: 'This field is required'
                        })
                        return false;
                    } else if (!this.form.mOrGAilment) {
                        this.form.errors.set({
                            mOrGAilment: 'This field is required'
                        })
                        return false;
                    } else if (!this.form.fOrGAbandon) {
                        this.form.errors.set({
                            fOrGAbandon: 'This field is required'
                        })
                        return false;
                    } else if (!this.form.mOrGAbandon) {
                        this.form.errors.set({
                            mOrGAbandon: 'This field is required'
                        })
                        return false;
                    } else if (!this.form.fOrGEmployment) {
                        this.form.errors.set({
                            fOrGEmployment: 'This field is required'
                        })
                        return false;
                    } else if (!this.form.mOrGEmployment) {
                        this.form.errors.set({
                            mOrGEmployment: 'This field is required'
                        })
                        return false;
                    } else if (!this.form.fOrGBusiness) {
                        this.form.errors.set({
                            fOrGBusiness: 'This field is required'
                        })
                        return false;
                    } else if (!this.form.mOrGBusiness) {
                        this.form.errors.set({
                            mOrGBusiness: 'This field is required'
                        })
                        return false;
                    } else if (!this.form.fOrGLand) {
                        this.form.errors.set({
                            fOrGLand: 'This field is required'
                        })
                        return false;
                    } else if (!this.form.mOrGLand) {
                        this.form.errors.set({
                            mOrGLand: 'This field is required'
                        })
                        return false;
                    } else if (!this.form.fOrGAssets) {
                        this.form.errors.set({
                            fOrGAssets: 'This field is required'
                        })
                        return false;
                    } else if (!this.form.mOrGAssets) {
                        this.form.errors.set({
                            mOrGAssets: 'This field is required'
                        })
                        return false;
                    } else if (!this.form.familyConflict) {
                        this.form.errors.set({
                            familyConflict: 'This field is required'
                        })
                        return false;
                    } else if (!this.form.familyHouse) {
                        this.form.errors.set({
                            familyHouse: 'This field is required'
                        })
                        return false;
                    } else if (!this.form.otherDis) {
                        this.form.errors.set({
                            otherDis: 'This field is required'
                        })
                        return false;
                    } else if (!this.form.siblingsInfo) {
                        this.form.errors.set({
                            siblingsInfo: 'This field is required'
                        })
                        return false;
                    } else {
                        this.step++;
                        return false;
                    }
                }

                if (this.step == 6) {
                    if (!this.form.hear) {
                        // set(type, 'required');
                        this.form.errors.set({
                            hear: 'This field is required'
                        })
                        return false;
                    } else if (this.form.hear == 'School - teacher, principal or Ward Representative' && !this.form.hearDetails) {
                        this.form.errors.set({
                            hearDetails: 'This field is required'
                        })
                        return false;
                    } else if (this.form.hear == 'Church, mosques, synagogue' && !this.form.hearDetails) {
                        this.form.errors.set({
                            hearDetails: 'This field is required'
                        })
                        return false;
                    } else if (this.form.hear == 'Internet' && !this.form.hearDetails) {
                        this.form.errors.set({
                            hearDetails: 'This field is required'
                        })
                        return false;
                    } else if (this.form.hear == 'Radio, TV' && !this.form.hearDetails) {
                        this.form.errors.set({
                            hearDetails: 'This field is required'
                        })
                        return false;
                    } else if (this.form.hear == 'Newspaper, magazine' && !this.form.hearDetails) {
                        this.form.errors.set({
                            hearDetails: 'This field is required'
                        })
                        return false;
                    } else if (this.form.hear == 'Social work such as face book, Twitter, MySpace' && !this.form.hearDetails) {
                        this.form.errors.set({
                            hearDetails: 'This field is required'
                        })
                        return false;
                    } else if (this.form.hear == 'Other' && !this.form.hearDetails) {
                        this.form.errors.set({
                            hearDetails: 'This field is required'
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
            getGuardianWards() {
                this.getStatus();
                axios.get("api/getcountywards/" + this.form.gcounty).then(({data}) => ([this.Gwards = data['wards']]));
            },
            getResultSlip(e) {
                let file = e.target.files[0];
                var reader = new FileReader();
                console.log(file);

                if (file['size'] < 2111775) {
                    if (file['type'] == 'image/png' || file['type'] == 'image/jpg' || file['type'] == 'image/jpeg') {
                        reader.onloadend = (file) => {
                            // console.log('Result', reader.result)
                            this.form.resultslip = reader.result;
                        }

                        reader.readAsDataURL(file);
                    } else {
                        Swal.fire({
                            type: 'error',
                            title: 'Ooops...',
                            text: 'Only images are allowed',
                        })
                    }

                } else {
                    Swal.fire({
                        type: 'error',
                        title: 'Ooops...',
                        text: 'You are uploading a large file',
                    })
                }

            },
            getDetails() {
                axios.get("api/getdetails").then(({data}) => ([this.info = data['user']]));
            },
            getStatus() {
                axios.get("api/statuz/" + this.form.county).then(({data}) => ([this.enable = data['num']]));
            },
            getApplication() {
                axios.get("api/getAppYears/" + this.form.county).then(({data}) => ([this.yearz = data['year']]));
            },
        },
        created() {
            this.getCounties();
            this.getDetails();
            this.getStatus();
            this.getApplication();
            this.getCountyWards();

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
