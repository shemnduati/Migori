<template>
  <div class="container-fluid">
    <div class="row pt-2">
        <img src="/img/kel.png" class="mx-auto d-block" alt="">
    </div>
    <div class="row pt-2">
      <div class="col-md-4">
        <h5>serial no.</h5>
      </div>
      <div class="text-center col-md-4">
        <h5>county</h5>
      </div>
      <div class="text-right col-md-4">
        <h5>type</h5>
      </div>
    </div>
    <div class="row p-2">
      <div class="text-center col-md-12">
        <h5>Ward</h5>
      </div>
    </div>
      <div class="row pb-3">
        <h5 class="pl-3"> 1. Applicant's Personal Information</h5>
      </div>
      <div class="form-group row">
          <label  class="col-sm-2 col-form-label">OFFICIAL NAME</label>
          <div class="col-sm-4">
              <input type="text" v-model="application.name" readonly class="form-control" >
          </div>
          <label for="staticEmail" class="col-sm-3 col-form-label">REG/ADMISSION NUMBER</label>
          <div class="col-sm-3">
            <input type="text" readonly class="form-control" >
          </div>
      </div>
      <div class="form-group row">
          <label for="staticEmail" class="col-sm-1 col-form-label">GENDER</label>
          <div class="col-sm-2">
            <input type="text" readonly class="form-control" >
          </div>
          <label for="staticEmail" class="col-sm-1 col-form-label">DOB</label>
          <div class="col-sm-2">
            <input type="text" readonly class="form-control" >
          </div>
          <label for="staticEmail" class="col-sm-1 col-form-label">ID NO</label>
          <div class="col-sm-2">
            <input type="text" readonly class="form-control" >
          </div>
          <label for="staticEmail" class="col-sm-1 col-form-label">TELL</label>
          <div class="col-sm-2">
            <input type="text" readonly class="form-control" >
          </div>
      </div>
      <div class="row pb-3">
        <h5 class="pl-3"> 2. Geographical Information</h5>
      </div>
      <div class="row form-group">
        <label for="staticEmail" class="col-sm-2 col-form-label">SUB-COUNTY</label>
          <div class="col-sm-2">
            <input type="text" readonly class="form-control" >
          </div>
          <label for="staticEmail" class="col-sm-1 col-form-label">WARD</label>
          <div class="col-sm-3">
            <input type="text" readonly class="form-control" >
          </div>
          <label for="staticEmail" class="col-sm-1 col-form-label">DIVISION</label>
          <div class="col-sm-3">
            <input type="text" readonly class="form-control" >
          </div>
      </div>
      <div class="row form-group">
        <label for="staticEmail" class="col-sm-2 col-form-label">SUB-LOCATION</label>
          <div class="col-sm-2">
            <input type="text" readonly class="form-control" >
          </div>
          <label for="staticEmail" class="col-sm-1 col-form-label">LOCATION</label>
          <div class="col-sm-3">
            <input type="text" readonly class="form-control" >
          </div>
          <label for="staticEmail" class="col-sm-1 col-form-label">VILLAGE</label>
          <div class="col-sm-3">
            <input type="text" readonly class="form-control" >
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
            <tr>
              <th scope="row">FATHER</th>
              <td>Mark</td>
              <td>Otto</td>
              <td>@mdo</td>
              <td>@mdo</td>
              <td>@mdo</td>
            </tr>
            <tr>
              <th scope="row">MOTHER</th>
              <td>Jacob</td>
              <td>Thornton</td>
              <td>@fat</td>
              <td>@fat</td>
              <td>@fat</td>
            </tr>
            <tr>
              <th scope="row">GURDIAN</th>
              <td>Jacob</td>
              <td>Thornton</td>
              <td>@fat</td>
              <td>@fat</td>
              <td>@fat</td>
            </tr>
          </tbody>
        </table>
        <div class="row form-group">
            <label for="staticEmail" class="col-sm-3 col-form-label">TOTAL NUMBER OF SIBLINGS</label>
              <div class="col-sm-1">
                <input type="text" readonly class="form-control" >
              </div>
              <label for="staticEmail" class="col-sm-2 col-form-label">IN SCHOOLS</label>
              <div class="col-sm-2">
                <input type="text" readonly class="form-control" >
              </div>
              <label for="staticEmail" class="col-sm-3 col-form-label">WORKING/BUSINESS</label>
              <div class="col-sm-1">
                <input type="text" readonly class="form-control" >
              </div>
          </div>
          <div class="row form-group">
            <label for="staticEmail" class="col-sm-4 col-form-label">WHO PAYS YOUR SCHOOL FEES?</label>
              <div class="col-sm-4">
                <input type="text" readonly class="form-control" >
              </div>
              <label for="staticEmail" class="col-sm-2 col-form-label">RELATIONSHIP</label>
              <div class="col-sm-2">
                <input type="text" readonly class="form-control" >
              </div>
          </div>
      </div>
      <div class="row pb-3">
        <h5 class="pl-3"> 4. Institution and Fee Details</h5>
      </div>
      <div class="row form-group">
        <label for="staticEmail" class="col-sm-3 col-form-label">NAME OF INSTITUTION</label>
          <div class="col-sm-3">
            <input type="text" readonly class="form-control" >
          </div>
          <label for="staticEmail" class="col-sm-1 col-form-label">BRANCH</label>
          <div class="col-sm-3">
            <input type="text" readonly class="form-control" >
          </div>
          <label for="staticEmail" class="col-sm-1 col-form-label">CLASS</label>
          <div class="col-sm-1">
            <input type="text"  value="application.name" readonly class="form-control" >
          </div>
      </div>
      <div class="row form-group">
          <label for="staticEmail" class="col-sm-4 col-form-label">WHO PAYS YOUR SCHOOL FEES</label>
          <div class="col-sm-3">
            <input type="text" readonly class="form-control" >
          </div>
          <label for="staticEmail" class="col-sm-2 col-form-label">RELATIONSHIP</label>
          <div class="col-sm-3">
            <input type="text" readonly class="form-control" >
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
</template>

<script>
export default {
    data() {
        return {
            application:{},


        }

    },

    methods: {
        getApplications() {
            axios.get("api/getApplication" ).then(({ data}) => ([this.application = data['applications']]));

        }

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
