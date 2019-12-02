<template>
    <div class="container">
        <div class="row mt-5" v-if="$gate.isSubadminOrOfficial() || $gate.isSubofficial()">

            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Scholarship Applicants Details</h3>

                        <div class="card-tools">
                            <div class="row">
                                <div class="col-sm-6" v-if="$gate.isOfficial() || $gate.isSubofficial()">
                                    <form>
                                        <select @change="sortScholarship" v-model="form.type" class="form-control">
                                            <option selected value="">--Sort By--</option>
                                            <option value="0">county</option>
                                            <option v-for="wardy in wards" :key="wardy.id" :value="wardy.id">{{ wardy.name}} ward</option>
                                        </select>
                                    </form>
                                </div>
                                <div class="col-sm-6">
                                    <button type="button" class="btn btn-primary btn-sm" @click="createPDF">
                                        <i class="fas fa-download"></i>
                                        Download
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body table-responsive no-padding">
                        <table class="table table-hover" id="my-table">
                            <tbody><tr>
                                <th>First Name</th>
                                <th>Middile Name</th>
                                <th>Last Name</th>
                                <th>Index N.O</th>
                                <th>School</th>
                                <th>Recommendation</th>
                                <th>Ward</th>
                                <th>Date</th>
                            </tr>
                            <tr v-for="application in applications" :key="application.id">
                                <td>{{application.fname}}</td>
                                <td>{{application.Mname}}</td>
                                <td>{{application.Lname}}</td>
                                <td>{{application.indexNo}}</td>
                                <td>{{application.school}}</td>
                                <td>{{application.reco}}</td>
                                <td>{{application.ward}}</td>
                                <td>{{application.date | myDate}}</td>
                            </tr>



                            </tbody></table>
                    </div>
                    <!-- /.box-body -->
                    <div class="card-footer">
                        <!-- <pagination :data="users" @pagination-change-page="getResults"></pagination> -->
                    </div>
                </div>
                <!-- /.box -->
            </div>
        </div>
        <!-- Modal -->




    </div>
</template>

<script>
    export default {
        data(){
            return{
                applications :{},
                wards:{},
                myward:'',
                mywardy: '',
                mycounty: '',
                selectedWard: '',
                wardsCounty: '',
                form: new Form({
                    type: ''
                })


            }
        },
        methods:{
            subWard() {
                if (this.$gate.isSubadmin()) {
                    axios.get("api/subAdminWard").then(({data}) => ([this.mywardy = data]));
                }
            },
            createPDF(){
                var specialElementHandlers = {
                    "#editor":function(element, renderer){
                        return true;
                    }
                }
                var doc = new jsPDF();

                doc.setFontSize(18);
                doc.text('Approved Scholarship Applications', 14, 22);
                doc.setFontSize(11);
                doc.setTextColor(100);

                if (this.$gate.isOfficial() || this.$gate.isSubofficial()) {
                    doc.setFontSize(15);
                    doc.text(this.mycounty + ' County', 14, 30);
                    doc.setFontSize(11);
                    doc.setTextColor(100);
                }

                if (this.$gate.isSubadmin()) {
                    doc.setFontSize(15);
                    doc.text(this.wardsCounty + ' County', 14, 30);
                    doc.setFontSize(11);
                    doc.setTextColor(100);
                }

                if (this.$gate.isOfficial() || this.$gate.isSubofficial()) {
                    if (this.selectedWard) {
                        doc.setFontSize(14);
                        doc.text(this.selectedWard + ' Ward', 14, 36);
                        doc.setFontSize(11);
                        doc.setTextColor(100)
                    }
                }

                if (this.$gate.isSubadmin()) {
                    doc.setFontSize(14);
                    doc.text(this.mywardy + ' Ward', 14, 36);
                    doc.setFontSize(11);
                    doc.setTextColor(100)
                }

                doc.autoTable({
                    showHead: 'firstPage',
                    html: '#my-table',
                    startY: 40,
                });
                if (this.$gate.isSubadmin()) {
                    doc.save(this.mywardy + '.pdf');
                }
                if (this.$gate.isOfficial() || this.$gate.isSubofficial()) {
                   if (this.selectedWard){
                       doc.save(this.mycounty + '|' + this.selectedWard + '.pdf');
                   }else {
                       doc.save(this.mycounty + '.pdf');
                   }
                }
            },
            getApplications(){
                if(this.$gate.isOfficial() || this.$gate.isSubofficial()) {
                    axios.get('api/getApplicantz').then(({data}) => ([this.applications = data['parent']]));
                }

                if(this.$gate.isSubadmin()) {
                    axios.get('api/getAppnts').then(({data}) => ([this.applications = data['parent']]));
                }
            },
            sortScholarship(){
                this.selectedWard = "";
                if(this.$gate.isOfficial() || this.$gate.isSubofficial()) {
                    axios.get('api/sortscholarship/' + this.form.type).then(({data}) => ([this.applications = data['parent']]));

                    if (this.form.type > 0){
                        axios.get('/api/wardname/' + this.form.type).then(({data}) => ([this.selectedWard = data]));
                    }
                }
            },
            getWards(){
                axios.get("api/getMyWards").then(({ data }) => ([this.wards = data['wards']]));
            },

            getCounty(){
                if (this.$gate.isOfficial() || this.$gate.isSubofficial()) {
                    axios.get("api/getMyCounty").then(({data}) => ([this.mycounty = data['counties']]));
                }
                if (this.$gate.isSubadmin()) {
                    axios.get("api/wardsCounty").then(({data}) => ([this.wardsCounty = data]));
                }
            },

        },


        created() {
            this.$Progress.start();
            Fire.$on('searching', ()=>{
                this.$Progress.start();
                let query = this.$parent.search;
                axios.get('api/findbursary?q=' + query)
                    .then((data)=>{
                        this.applications = data.data;
                        this.$Progress.finish();
                    })
                    .catch(()=>{

                    })
            })
            this.getApplications();
            this.getWards();
            this.getCounty();
            this.subWard();
            Fire.$on('AfterCreate', () =>{
                this.getApplications();
                this.getWards();
            })
        }
    }
</script>
