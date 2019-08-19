<template>
  <div class="container-fluid">
    <div class="row justify-content-center" style="margin-bottom: 20px;">
      <button type="button" class="btn btn-primary">Download</button>
    </div>
    <div class="container" v-if="this.verified == 1" style="border: 1px solid black;">
    <div class="row pt-2">
        <img src="/img/kel.png" class="mx-auto d-block" alt="">
    </div>
    <div class="row pt-2">
      <div class="col-md-4">
        <h5>{{application.serial}}</h5>
      </div>
      <div class="text-center col-md-4">
        <h5>{{geographical.County}}</h5>
      </div>
      <div class="text-right col-md-4">
        <h5>{{application.bursary_type}} Bursary {{application.year}}</h5>
      </div>
    </div>
    <div class="row p-2">
      <div class="text-center col-md-12">
        <h5>{{geographical.Ward}}</h5>
      </div>
    </div>
      <div class="row pb-3">
        <h5 class="pl-3"> 1. Applicant's Personal Information</h5>
      </div>
      <div class="form-group row">
          <label for="staticEmail" class="col-sm-2 col-form-label">OFFICIAL NAME</label>
          <div class="col-sm-4">
            <input type="text" v-model="application.name" readonly class="form-control" >
          </div>
          <label for="staticEmail" class="col-sm-3 col-form-label">REG/ADMISSION NUMBER</label>
          <div class="col-sm-3">
            <input type="text" v-model="application.reg_no" readonly class="form-control" >
          </div>
      </div>
      <div class="form-group row">
          <label for="staticEmail" class="col-sm-1 col-form-label">GENDER</label>
          <div class="col-sm-2">
            <input type="text" v-model="application.gender" readonly class="form-control" >
          </div>
          <label for="staticEmail" class="col-sm-1 col-form-label">DOB</label>
          <div class="col-sm-2">
            <input type="text" v-model="application.dob" readonly class="form-control" >
          </div>
          <label for="staticEmail" class="col-sm-1 col-form-label">ID NO</label>
          <div class="col-sm-2">
            <input type="text" v-model="application.id_no" readonly class="form-control" >
          </div>
          <label for="staticEmail" class="col-sm-1 col-form-label">TEL</label>
          <div class="col-sm-2">
            <input type="text" v-model="application.tel" readonly class="form-control" >
          </div>
      </div>
      <div class="row pb-3">
        <h5 class="pl-3"> 2. Geographical Information</h5>
      </div>
      <div class="row form-group">
        <label for="staticEmail" class="col-sm-2 col-form-label">COUNTY</label>
          <div class="col-sm-2">
            <input type="text" v-model="geographical.County" readonly class="form-control" >
          </div>
          <label for="staticEmail" class="col-sm-1 col-form-label">WARD</label>
          <div class="col-sm-3">
            <input type="text" v-model="geographical.Ward" readonly class="form-control" >
          </div>
          <label for="staticEmail" class="col-sm-1 col-form-label">DIVISION</label>
          <div class="col-sm-3">
            <input type="text" v-model="geographical.Division" readonly class="form-control" >
          </div>
      </div>
      <div class="row form-group">
        <label for="staticEmail" class="col-sm-2 col-form-label">SUB-LOCATION</label>
          <div class="col-sm-2">
            <input type="text" v-model="geographical.Sublocation" readonly class="form-control" >
          </div>
          <label for="staticEmail" class="col-sm-1 col-form-label">LOCATION</label>
          <div class="col-sm-3">
            <input type="text" v-model="geographical.Location" readonly class="form-control" >
          </div>
          <label for="staticEmail" class="col-sm-1 col-form-label">VILLAGE</label>
          <div class="col-sm-3">
            <input type="text" v-model="geographical.Village" readonly class="form-control" >
          </div>
      </div>
      <div class="row pb-3">
        <h5 class="pl-3"> 3. Family Status</h5>
      </div>
      <div class="row px-4">
        <table class="table table-bordered">
          <thead>
            <tr>
              <th scope="col"></th>
              <th scope="col">NAME</th>
              <th scope="col">DEAD/ALIVE</th>
              <th scope="col">OCCUPATION</th>
              <th scope="col">TELL</th>
              <th scope="col">INCOME/YEAR</th>
            </tr>
          </thead>
          <tbody>
            <tr v-for="fam in family" :key="fam.id">
              <th scope="row">{{fam.relationship}}</th>
              <td>{{fam.name}}</td>
              <td>{{fam.living}}</td>
              <td>{{fam.occupation}}</td>
              <td>{{fam.tel}}</td>
              <td>{{fam.income}}</td>
            </tr>
          </tbody>
        </table>
        <div class="row form-group">
            <label for="staticEmail" class="col-sm-3 col-form-label">TOTAL NUMBER OF SIBLINGS</label>
              <div class="col-sm-1">
                <input type="text" v-model="morefamily.totalSiblings" readonly class="form-control" >
              </div>
              <label for="staticEmail" class="col-sm-2 col-form-label">IN SCHOOLS</label>
              <div class="col-sm-2">
                <input type="text" v-model="morefamily.schoolSiblings" readonly class="form-control" >
              </div>
              <label for="staticEmail" class="col-sm-3 col-form-label">WORKING/BUSINESS</label>
              <div class="col-sm-1">
                <input type="text" v-model="morefamily.workingSiblings" readonly class="form-control" >
              </div>
          </div>
          <div class="row form-group">
            <label for="staticEmail" class="col-sm-4 col-form-label">WHO PAYS YOUR SCHOOL FEES?</label>
              <div class="col-sm-4">
                <input type="text" v-model="morefamily.pFees" readonly class="form-control" >
              </div>
              <label for="staticEmail" class="col-sm-2 col-form-label">RELATIONSHIP</label>
              <div class="col-sm-2">
                <input type="text" v-model="morefamily.pFeesRelationship" readonly class="form-control" >
              </div>
          </div>
      </div>
      <div class="row pb-3">
        <h5 class="pl-3"> 4. Institution and Fee Details</h5>
      </div>
      <div class="row form-group">
        <label for="staticEmail" class="col-sm-3 col-form-label">NAME OF INSTITUTION</label>
          <div class="col-sm-3">
            <input type="text" v-model="institution.name" readonly class="form-control" >
          </div>
          <label for="staticEmail" class="col-sm-1 col-form-label">BRANCH</label>
          <div class="col-sm-3">
            <input type="text" v-model="institution.branch" readonly class="form-control" >
          </div>
          <label for="staticEmail" class="col-sm-1 col-form-label">CLASS</label>
          <div class="col-sm-1">
            <input type="text" v-model="institution.class" readonly class="form-control" >
          </div>
      </div>
      <div class="row form-group">
        <label for="staticEmail" class="col-sm-1 col-form-label">YEAR OF STUDY</label>
          <div class="col-sm-1">
            <input type="text" v-model="institution.yearofstudy" readonly class="form-control" >
          </div>
        <label for="staticEmail" class="col-sm-3 col-form-label">ANNUAL FEES</label>
          <div class="col-sm-3">
            <input type="text" v-model="institution.fees" readonly class="form-control" >
          </div>
          <label for="staticEmail" class="col-sm-1 col-form-label">AMOUNT PAID</label>
          <div class="col-sm-3">
            <input type="text" v-model="institution.amount_paid" readonly class="form-control" >
          </div>
      </div>
      <div class="row form-group">
          <label for="staticEmail" class="col-sm-2 col-form-label">REMAINING BALANCE</label>
          <div class="col-sm-3">
            <input type="text" v-model="institution.balance" readonly class="form-control" >
          </div>
          <div class="col-sm-3">

          </div>
          <p class="pl-3">(Kindly attach fees structure. First year to attach there calling letter duly stamped)</p>
          <p class="pl-3">FOR OFFICIAL USE ONLY. (To be filled by head of institution/Bursar/Finacial officer)</p>
      </div>
      <div class="row form-group">
        <label for="staticEmail" class="col-sm-4 col-form-label">BANK ACCOUNT NUMBER</label>
        <div class="col-sm-3">
          <input type="text" readonly class="form-control" >
        </div>
        <label for="staticEmail" class="col-sm-2 col-form-label">ACCOUNT NAME</label>
        <div class="col-sm-3">
          <input type="text" readonly class="form-control" >
        </div>
      </div>
      <div class="row form-group">
        <label for="staticEmail" class="col-sm-3 col-form-label">BRANCH</label>
        <div class="col-sm-9">
          <input type="text" readonly class="form-control" >
        </div>
      </div>
      <div class="row form-group">
        <label for="staticEmail" class="col-sm-5 col-form-label">HEAD OF INSTITUTION RECOMMENDATION</label>
        <p class="pt-2">__________________________________________________________________________________</p>
      </div>
      <div class="row form-group">
        <label for="staticEmail" class="col-sm-1 col-form-label">NAME</label>
        <p class="pt-2">_____________________________________</p>
        <label for="staticEmail" class="col-sm-1 col-form-label">TELL</label>
        <p class="pt-2">______________________________</p>
        <label for="staticEmail" class="col-sm-1 col-form-label">SIGNATURE</label>
        <p class="pt-2 pl-4">______________________________________</p>
      </div>
      <div class="row pb-3">
        <h5 class="pl-3"> 5. Official Use Only (vetting Committee)</h5>
      </div>
      <div class="row form-group">
        <label for="staticEmail" class="col-sm-3 col-form-label">RECCOMENDATION</label>
        <div class="col-sm-3">
          <input type="text" readonly class="form-control" >
        </div>
        <label for="staticEmail" class="col-sm-3 col-form-label">NOT RECOMMENDED</label>
        <div class="col-sm-3">
          <input type="text" readonly class="form-control" >
        </div>
      </div>
      <div class="row form-group">
        <label for="staticEmail" class="col-sm-2 col-form-label">DEFFERED</label>
        <div class="col-sm-3">
          <input type="text" readonly class="form-control" >
        </div>
        <label for="staticEmail" class="col-sm-2 col-form-label">COMMENT</label>
        <p class="pt-2">____________________________________________</p>
      </div>
      <div class="row pb-3">
        <h5 class="pl-3"> Bursar Committee</h5>
      </div>
      <div class="row form-group">
        <label for="staticEmail" class="col-sm-1 col-form-label">Approved</label>
        <p class="pt-2">_____________________________________</p>
        <label for="staticEmail" class="col-sm-2 col-form-label">Not Approved</label>
        <p class="pt-2">______________________________</p>
        <label for="staticEmail" class="col-sm-1 col-form-label">Deffered</label>
        <p class="pt-2 pl-4">___________________________</p>
      </div>
      <div class="row form-group">
        <label for="staticEmail" class="col-sm-4 col-form-label">Bursar Awarded in Ksh:</label>
        <div class="col-sm-8">
          <input type="text" readonly class="form-control" >
        </div>
      </div>
      <div class="row form-group">
        <label for="staticEmail" class="col-sm-3 col-form-label">Reasones for Disapproval</label>
        <p class="pt-2 pl-4">___________________________________________________________________________________</p>
      </div>
      <div class="row form-group">
        <label for="staticEmail" class="col-sm-1 col-form-label">Chairperson</label>
        <p class="pt-2 pl-4">_____________________________________</p>
        <label for="staticEmail" class="col-sm-3 col-form-label">Fund Account Manager</label>
        <p class="pt-2">__________________________</p>
        <label for="staticEmail" class="col-sm-1 col-form-label">Date</label>
        <p class="pt-2">____________________</p>
      </div>
      <div class="row form-group d-flex flex-row-reverse">
        <p class="pt-2 pl-4">_____________________________________</p>
        <label for="staticEmail" class="col-sm-2 col-form-label">Student Signature</label>

      </div>
  </div>
  </div>
</template>

<script>
export default {
  data(){
        return{
          application:{},
            family:{},
            morefamily:{},
            geographical:{},
            institution:{},
            verified:{}
        }
  },
  methods:{
    getApplications(){
        axios.get("/api/form").then(({ data }) => ([this.application = data['application']]));
        axios.get("/api/form").then(({ data }) => ([this.family = data['family']]));
        axios.get("/api/form").then(({ data }) => ([this.morefamily = data['morefamily']]));
        axios.get("/api/form").then(({ data }) => ([this.geographical = data['geographical']]));
        axios.get("/api/form").then(({ data }) => ([this.institution = data['institution']]));
        axios.get("/api/form").then(({ data }) => ([this.verified = data['verified']]));
      },
  },
  created(){
      this.getApplications();

    }
}
</script>

<style scoped>
.zz{
  padding-left: 45%;
}
</style>
