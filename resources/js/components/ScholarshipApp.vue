<template>
    <div class="container">
        <div class="row mt-5" v-if="$gate.isSubadminOrOfficial() || $gate.isSubofficial()">

            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Scholarship Applicants Details</h3>

                        <div class="card-tools">
                            <div class="row">
                                <!--<div class="col-sm-6" v-if="$gate.isOfficial() || $gate.isSubofficial()">
                                    <form>
                                        <select @change="sortScholarship" v-model="form.type" class="form-control">
                                            <option selected value="">&#45;&#45;Sort By&#45;&#45;</option>
                                            <option value="0">county</option>
                                            <option v-for="wardy in wards" :key="wardy.id" :value="wardy.id">{{ wardy.name}} ward</option>
                                        </select>
                                    </form>
                                </div>-->
                                <div class="col-sm-12">
                                    <button @click="allApp" type="button" class="btn btn-sm btn-info">
                                        Reset
                                    </button>
                                    <button @click="filter" type="button" class="btn btn-sm btn-primary">
                                        <i class="fa fa-sort"></i>
                                        Sort
                                    </button>
                                    <button type="button" class="btn btn-success btn-sm" @click="createPDF">
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
        <div id="filterModal" class="modal fade bd-example-modal-sm" tabindex="-1" role="dialog"
             aria-labelledby="mySmallModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-sm">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Filter applications</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form>
                            <div class="form-group">
                                <label>Select Year</label>
                                <select v-model="form.year" class="form-control">
                                    <option selected value="">--Year--</option>
                                    <option v-for="co in conf" :key="co['year']"
                                            :value="co['year']">{{ co.year}}-{{ co.yearEnd}}
                                    </option>
                                </select>
                            </div>
                            <div class="form-group" v-if="$gate.isOfficial() || $gate.isSubofficial()">
                                <label>Ward</label>
                                <select v-model="form.ward" class="form-control">
                                    <option selected value="">--Sort By--</option>
                                    <option value="0">All</option>
                                    <option v-for="wardy in wards" :key="wardy.id" :value="wardy.id">{{
                                        wardy.name}} ward
                                    </option>
                                </select>
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary" data-dismiss="modal">Go</button>
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
                applications :{},
                wards:{},
                myward:'',
                mywardy: '',
                mycounty: '',
                selectedWard: '',
                wardsCounty: '',
                form: {
                    year: '',
                    ward: '',
                },
                conf: []

            }
        },
        computed: {
            app() {
                if (this.$gate.isSubadmin()) {
                    if (!this.form.year) {
                        return this.$store.state.scholar.filter(m => m.recommendation == 'high' || m.recommendation == 'partially')
                    }

                    if (this.form.year) {
                        return this.$store.state.scholar.filter(m => m.application_year == this.form.year && (m.recommendation == 'high'
                            || m.recommendation == 'partially'))
                    }
                }

                if (this.$gate.isOfficial()) {
                    if (!this.form.year && !this.form.ward) {
                        return this.$store.state.scholar.filter(m => m.approved == 3)
                    }

                    if (this.form.year && !this.form.ward) {
                        return this.$store.state.scholar.filter(m => m.approved == 3 && m.application_year == this.form.year)
                    }

                    if (!this.form.year && this.form.ward) {
                        if (this.form.ward == 0) {
                            return this.$store.state.scholar.filter(m => m.approved == 3)
                        }
                        return this.$store.state.scholar.filter(m => m.approved == 3 && m.ward_id == this.form.ward)
                    }

                    if (this.form.year && this.form.ward) {
                        if (this.form.ward == 0) {
                            return this.$store.state.scholar.filter(m => m.approved == 3 && m.application_year == this.form.year)
                        }
                        return this.$store.state.scholar.filter(m => m.approved == 3 && m.ward_id == this.form.ward
                            && m.application_year == this.form.year)
                    }
                }

                if (this.$gate.isSubofficial()) {
                    if (!this.form.year && !this.form.ward && !this.form.cheque) {
                        return this.$store.state.scholar.filter(m => m.approved == 3)
                    }

                    if (this.form.year && !this.form.ward) {
                        return this.$store.state.scholar.filter(m =>m.approved == 3 && m.application_year == this.form.year)
                    }

                    if (!this.form.year && this.form.ward) {
                        if (this.form.ward == 0) {
                            return this.$store.state.scholar.filter(m => m.approved == 3)
                        }
                        return this.$store.state.bursary.filter(m =>m.approved == 3 && m.ward_id == this.form.ward)
                    }

                    if (this.form.year && this.form.ward ) {
                        if (this.form.ward == 0) {
                            return this.$store.state.scholar.filter(m => m.approved == 3 && m.application_year == this.form.year)
                        }
                        return this.$store.state.scholar.filter(m => m.approved == 3 && m.ward_id == this.form.ward
                            && m.application_year == this.form.year)
                    }

                }
            }
        },
        methods:{
            allApp() {
                this.form = {
                    year: '',
                    ward: '',
                }
            },
            subWard() {
                if (this.$gate.isSubadmin()) {
                    axios.get("api/subAdminWard").then(({data}) => ([this.mywardy = data]));
                }
            },
            filter() {
                $('#filterModal').modal('show');
            },
            getConfYears() {
                if (this.$gate.isSubadmin() || this.$gate.isOfficial() || this.$gate.isSubofficial()) {
                    axios.get('api/zconf_years').then(data => {
                        this.conf = data.data
                    });
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
            this.getConfYears();
            this.subWard();
            Fire.$on('AfterCreate', () =>{
                this.getApplications();
                this.getWards();
            })
        }
    }
</script>
