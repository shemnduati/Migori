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
						 <p> DOB  </p>
						 <p> Gender </p>
						 <p> Reg/Adm No. </p>
						 <p> Tel.  </p>
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
						 <p> Year of Study  </p>
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
						 <p> Location  </p>
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
		<div class="row mb-3" v-if="$gate.isSubadmin() && !application.recommendation">
			<div class="col-md-6">
				<button class="btn btn-success px-5 offset-md-1">Recommendation</button>
			</div>
			<div class="col-md-6">
				<div class="form-check form-check-inline">
                <input v-model="form.recommendation" class="form-check-input" type="radio" name="yes" id="yes" value="Yes"
                        :class="{ 'is-invalid': form.errors.has('yes') }" @click="recommend">
                <label class="form-check-label" for="inlineRadio1">Yes</label>
                </div>
                <div class="form-check form-check-inline">
                <input v-model="form.recommendation" class="form-check-input" type="radio" name="partially" id="partially" value="Partially"
                        :class="{ 'is-invalid': form.errors.has('partially') }" @click="recommend">
                <label class="form-check-label" for="inlineRadio1">Partially</label>
                </div>
                <div class="form-check form-check-inline">
                <input v-model="form.recommendation" class="form-check-input" type="radio" name="no" id="no" value="No"
                        :class="{ 'is-invalid': form.errors.has('no') }" @click="recommend">
                <label class="form-check-label" for="inlineRadio1">No</label>
                </div>
				<!-- <button @click="reject()" v-if="$gate.isSubadmin() && (application['status'] == 0)" class="btn btn-danger px-5 offset-md-3" >Reject</button> -->
			</div>
		</div>
		<!-- Modal -->
        <div class="modal fade" id="addnew" tabindex="-1" role="dialog" aria-labelledby="addnewLabel" aria-hidden="true">
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
	</div>
</template>

<script>
	export default {
    	data(){
			return{
				applicantId: this.$route.params.applicantId,
	        	application:{},
	        	family:{},
	        	morefamily:{},
	        	geographical:{},
	        	institution:{},
	        	photo: '',
	        	form: new Form({
                   recommendation: ''
	        	})
			}

		},
		methods:{
			recommend(){
               Swal.fire({
                  title: 'Are you sure?',
                  text: "You won't be able to revert this!",
                  //type: 'warning',
                  showCancelButton: true,
                  confirmButtonColor: '#3085d6',
                  cancelButtonColor: '#d33',
                  confirmButtonText: 'Yes!'
                }).then((result) => {
                  if(result.value){
                    this.form.post("/api/recommend/" + this.application.id).then(()=>{
                      Swal.fire(
                        'Success!',
                        'Operation successful.',
                        'success'
                        )
                            Fire.$emit('entry');
                        }).catch(()=>{
                      swal('Failed!','There was something wrong')
                    });
                    }
                })
			},
			getApplications(){
				axios.get("/api/getappdetails/" + this.applicantId).then(({ data }) => ([this.application = data['application']]));
				axios.get("/api/getappdetails/" + this.applicantId).then(({ data }) => ([this.family = data['family']]));
				axios.get("/api/getappdetails/" + this.applicantId).then(({ data }) => ([this.morefamily = data['morefamily']]));
				axios.get("/api/getappdetails/" + this.applicantId).then(({ data }) => ([this.geographical = data['geographical']]));
				axios.get("/api/getappdetails/" + this.applicantId).then(({ data }) => ([this.institution = data['institution']]));
			},
			launch(passport){
				$('#addnew').modal('show');
				this.photo = passport;
			},
			send(){
               		axios.put("/api/send/" + this.applicantId).then( response => {
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
			accept(){
                this.$Progress.start();
               		axios.put("/api/accept/" + this.applicantId).then( response => {
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
			reject(){
                this.$Progress.start();
                axios.put("/api/reject/" + this.applicantId).then( response => {
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
		created(){
			this.getApplications();
            Fire.$on('entry', () =>{
                this.getApplications();
            })
		}
	}
</script>

<style scoped>
	.bg-b{
		background-color: #bfbfbf;
	}
	.bg-a{
		background-color: #77933c;
	}
	.bgc{
		background-color: #1db5b5;

	}
</style>
