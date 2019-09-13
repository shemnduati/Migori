<template>
    <div class="container">
        <div class="row mt-5" v-if="$gate.isSubadminOrOfficial()">

            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Applicants Table</h3>

                        <div class="card-tools">
                            <div class="row">
                                <div class="col-sm-12">
                                    <form>
                                        <select @change="getType()" v-model="form.type" class="form-control">
                                            <option selected value="">--Sort By--</option>
                                            <option value="0">county</option>
                                            <option v-for="wardy in wards" :key="wardy.id" :value="wardy.id">{{ wardy.name}} ward</option>
                                        </select>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body table-responsive no-padding">
                        <table class="table table-hover">
                            <tbody><tr>
                                <th>Name</th>
                                <th>Adm/Reg</th>
                                <th>Institution</th>
                                <th>Ward</th>
                                <th>Amount</th>
                                <th>Date</th>
                            </tr>
                            <tr v-for="application in applications" :key="application.id">
                                <td>{{application.name}}</td>
                                <td>{{application.reg}}</td>
                                <td>{{application.institution}}</td>
                                <td>{{application.ward}}</td>
                                <td>{{application.amount}}</td>
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
                county:{},
                form: new Form({
                    type: ''
                })


            }
        },
        methods:{
            getApplications(){
                    axios.get('api/getApplicants').then(({data}) => ([this.applications = data['parent']]));
            },
            getType(){
                    axios.get('api/getWardsById/' + this.form.type).then(({data}) => ([this.applications = data['parent']]));
            },
            getWards(){
                axios.get("api/getMyWards").then(({ data }) => ([this.wards = data['wards']]));
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
            Fire.$on('AfterCreate', () =>{
                this.getApplications();
                this.getWards();
            })
        }
    }
</script>
