<template>
    <div class="container">
        <div class="row mt-5" v-if="$gate.isOfficial()">

            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Wards Budget table</h3>
                        <div class="card-tools">
                            <button class="btn btn-success" @click="newModal">Add Budget &nbsp;<i class="fas fa-donate"></i></button>
                        </div>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body table-responsive no-padding">
                        <table class="table table-hover">
                            <tbody><tr>
                                <th>Ward</th>
                                <th>Budget</th>
                                <th>Current Balance</th>
                                <th>Budget year</th>
                                <th>Modify</th>
                            </tr>
                            <tr v-for="budget in budgets" :key="budget.id">
                                <td>{{budget.name}}</td>
                                <td>{{budget.amount}}</td>
                                <td>{{budget.remaining}}</td>
                                <td>{{budget.year}}</td>
                                <td>
                                    <a href="#" @click="editModal(budget)" >
                                        <i class="fa fa-edit teal"></i>
                                    </a>
                                    <a href="#" @click="deleteUser(budget.id)">
                                        <i class="fa fa-trash red"></i>
                                    </a>
                                </td>
                            </tr>



                            </tbody></table>
                    </div>
                    <!-- /.box-body -->
                    <div class="card-footer">
                        <!--<pagination :data="users" @pagination-change-page="getResults"></pagination>-->
                    </div>
                </div>
                <!-- /.box -->
            </div>
        </div>
        <!-- Modal -->
        <div class="modal fade" id="addnew" tabindex="-1" role="dialog" aria-labelledby="addnew" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content ">
                    <div class="modal-header">
                        <h5 class="modal-title" v-show="!editMode" id="addnew">Award Wards Budgets&nbsp;<i class="fas fa-donate"></i></h5>
                        <h5 class="modal-title" v-show="editMode" id="addnew">Update Budget info</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form @submit.prevent="editMode ? updateBudget() :createBudget()">
                        <div class="modal-body">
                            <div class="form-group">
                                <label for="ward">Ward</label>
                                <select name="ward" v-model="form.ward" class="form-control"  id="ward" :class="{ 'is-invalid': form.errors.has('ward') }">
                                    <option v-for="wardy in wards" :key="wardy.id" :value="wardy.id">{{ wardy.name}}</option>
                                </select>
                                <has-error :form="form" field="ward"></has-error>
                            </div>
                            <div class="form-group">
                                <label>Budget Amount</label>
                                <input v-model="form.amount" type="text" name="amount" placeholder="Budget Amount"
                                       class="form-control" :class="{ 'is-invalid': form.errors.has('amount') }">
                                <has-error :form="form" field="amount"></has-error>
                            </div>
                            <div class="form-group">
                                <label>Budget Year</label>
                                <input v-model="form.year" type="text" name="year"
                                       placeholder="Enter Year"
                                       class="form-control" :class="{ 'is-invalid': form.errors.has('year') }">
                                <has-error :form="form" field="year"></has-error>
                            </div>
                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                            <button v-show="editMode" type="submit" class="btn btn-primary">Edit</button>
                            <button v-show="!editMode" type="submit" class="btn btn-primary">Add Budget</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        data(){
            return{
                editMode: false,
                wards:{},
                budgets:{},
                form: new Form({
                    id:'',
                    ward:'',
                    amount:'',
                    year: '',
                })


            }
        },
        methods:{
            updateBudget(){
                this.$Progress.start();
                this.form.put('api/budget/'+this.form.id)
                    .then(()=>{
                        $('#addnew').modal('hide');
                        Swal.fire(
                            'Edited!',
                            'Budget information updated.',
                            'success'
                        )
                        this.$Progress.finish();
                        Fire.$emit('AfterCreate');
                    })
                    .catch(()=>{
                        this.$Progress.fail();
                        Swal.fire("Failed to Edit!", "Check if you have permission to Edit.");
                    })
            },
            editModal(budget){
                this.editMode = true;
                this.form.reset();
                this.form.fill(budget);
                $('#addnew').modal('show');
            },
            newModal(){
                this.editMode = false;
                this.form.reset();
                $('#addnew').modal('show');
            },
            deleteUser(id){
                Swal.fire({
                    title: 'Are you sure?',
                    text: "You won't be able to revert this!",
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, delete it!',
                }).then((result) => {
                    // send the request to the controller
                    if (result.value) {
                        this.form.delete('api/budget/'+ id).then(()=>{

                            Swal.fire(
                                'Deleted!',
                                'Your file has been deleted.',
                                'success'
                            )
                            this.$Progress.finish();
                            Fire.$emit('AfterCreate');
                        })
                    }
                }).catch(()=>{
                    this.$Progress.fail();
                    Swal.fire("Failed to Delete!", "There was something wrong.");
                })
            },
            getMyWards(){
                axios.get("api/getMyWard").then(({ data }) => ([this.wards = data['wards']]));
            },
            getBudget(){
               axios.get("api/budget").then(({data})=>([this.budgets = data['parent']]));
            },
            createBudget(){
                this.$Progress.start();
                this.form.post('api/budget')
                    .then(() => {
                        Fire.$emit('AfterCreate');
                        $('#addnew').modal('hide')
                        toast.fire({
                            type: 'success',
                            title: 'Budget Created in successfully'
                        })
                        this.$Progress.finish();
                    })
                    .catch(() => {
                        Swal.fire("Failed to Create new budget!", "There was something wrong.");
                    })
            }
        },


        created() {
            Fire.$on('searching', ()=>{
                let query = this.$parent.search;
                axios.get('api/findUser?q=' + query)
                    .then((data)=>{
                        this.users = data.data;
                    })
                    .catch(()=>{

                    })
            })
            this.getMyWards();
            this.getBudget();
            Fire.$on('AfterCreate', () =>{
                this.getMyWards();
                this.getBudget();
            })
            //setInterval(() => this.loadUsers(), 3000);
        }
    }
</script>
