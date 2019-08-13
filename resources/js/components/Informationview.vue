<template>
	<div>
		<div class="text-center pt-2">
			<h3>Student Information</h3>
		</div>
		<div class="row pl-3">
			<img src="/img/logo.jpg" alt="">
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
						 <p> Stephen Mathew </p> 
						 <p> 12/04/1990 </p> 
						 <p> Male </p> 
						 <p> EN 354-123/10 </p> 
						 <p> 0722222222 </p> 
					</div>	
				</div>
			</div>
			<div class="col-md-4 pt-5">
				<div class="row">
					<div class="col-md-8">
						<p class="rounded p-2 mt-2 text-center bg-b">Aplicant ID/ Birth Cert</p>
					</div>
					<div class="col-md-4">
						<h5 class="rounded p-2 mt-2 text-center bg-success">View</h5>
					</div>
				</div>	
			</div>
		</div>
		<div class="row">
			<div class="col-md-8">
				<h5 class=" rounded bg-success p-2 mt-2 text-center">FAMIMILY STATUS</h5>
			</div>
		</div>
		<div class="row">
			<div class="col-md-8">
				<div class="row mx-2 pl-3 pt-2 border border-success rounded">
					<div class="col-md-4">
						 <p> Father</p> 
						 <p>Name</p> 
						 <p>Status</p> 
						 <p>Tel. </p>
						 <p>Income per year </p>
						 <p>Occupation </p>
						 <p>MOTHER</p>
						 <p>Name</p>
						 <p>Status</p> 
						 <p>Tel</p> 
						 <p>Income per year Ksh.</p> 
						 <p>Occupation</p> 
						 <p>GUADIAN</p>
						 <p>Name</p> 
						 <p>Tel</p> 
						 <p>Income per year Ksh.</p> 
						 <p>Occupation</p> 
					</div>	
					<div class="col-md-4">
						<P> _____</P>
						<P>Richard Oklou Martin</P>
						<P>Dead</P>
						<P>None</P>
						<P>None</P>
						<P>None</P>
						<P>_____</P>
						<P>Pamella Oklou Martin </P>
						<P>Alive </P>
						<P>0722222222 </P>
						<P> 10,000</P>
						<p>Farmer</p>
						<P> _____</P>
						<p>Mercy Mukami Andera</p>
						<p>0722222222</p>
						<p>33,000</p>
						<p>Business</p>
					</div>	
				</div>
			</div>
			<div class="col-md-4 pt-5">
				<div class="row pt-5">
					<div class="col-md-8">
						<p class="rounded p-2 mt-2 text-center bg-b">Father ID/ Death Cert</p>
					</div>
					<div class="col-md-4">
						<h5 class="rounded p-2 mt-2 text-center bg-success">View</h5>
					</div>
				</div>	
				<div class="row pt-5">
					<div class="col-md-8 pt-5">
						<p class="rounded p-2 mt-2 text-center bg-b">Father ID/ Death Cert</p>
					</div>
					<div class="col-md-4 pt-5">
						<h5 class="rounded p-2 mt-2 text-center bg-success">View</h5>
					</div>
				</div>	
				<div class="row pt-5">
					<div class="col-md-8 pt-5">
						<p class="rounded p-2 mt-2 text-center bg-b">Father ID/ Death Cert</p>
					</div>
					<div class="col-md-4 pt-5">
						<h5 class="rounded p-2 mt-2 text-center bg-success">View</h5>
					</div>
				</div>	
			</div>
		</div>
		<div class="row">
			<div class="col-md-8">
				<h5 class=" rounded bg-yellow p-2 mt-2 text-center">GEOGRAPHICAL INFORMATION</h5>
			</div>
		</div>
		<div class="row">
			<div class="col-md-8">
				<div class="row mx-2 pl-3 pt-2 border border-success rounded">
					<div class="col-md-4">
						 <p> Sub-County </p>  
						 <p> DOB  </p> 
						 <p> Division </p>  
						 <p> Ward </p>  
						 <p> Location  </p> 
						 <p>Sub-Location </p>
						 <p>Village</p>
					</div>	
					<div class="col-md-4">
						 <p> Makueni </p> 
						 <p> Makueni East </p> 
						 <p> Malel </p> 
						 <p> Malel East</p> 
						 <p>Malel </p>
						 <p> Rumbi </p> 
						 <p>Manyalle</p>
					</div>	
				</div>
			</div>
		</div>
		<hr>
		<div class="row mb-3">
			<div class="col-md-6">
				<button class="btn btn-success px-5 offset-md-1">Send</button>
			</div>
			<div class="col-md-6">
				<button class="btn btn-danger px-5 offset-md-3" >Reject</button>
			</div>
		</div>
	</div>
</template>

<script>
	export default {
    	data(){
			return{
        	info:{}
			}
		},
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