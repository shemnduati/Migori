<style>
    .widget-user-header{
        background-position: center center;
        background-size: cover;
        height: 250px !important;
    }
    .widget-user .card-footer{
        padding: 0;
    }
</style>
<template>
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-12 mt-3">
                <div class="card card-widget widget-user">
                    <!-- Add the bg color to the header using any of the bg-* classes -->
                    <div class="widget-user-header bg-black" style="background: url('./img/church4.jpg') center center;">
                        <h3 class="widget-user-username">{{this.form.name}}</h3>
                        <h5 class="widget-user-desc">{{this.form.type}}</h5>
                    </div>
                    <div class="box-footer">
                        <div class="row">
                            <div class="col-sm-6 border-right">
                                <div class="description-block">
                                    <h5 class="description-header">{{this.form.name}}</h5>
                                    <span class="description-text">Name</span>
                                </div>
                                <!-- /.description-block -->
                            </div>
                            <!-- /.col -->
                            <div class="col-sm-6 border-right">
                                <div class="description-block">
                                    <h5 class="description-header">{{this.form.email}}</h5>
                                    <span class="description-text">email</span>
                                </div>
                                <!-- /.description-block -->
                            </div>
                            <!-- /.col -->
                            <!-- /.description-block -->
                            <!-- /.col -->
                        </div>
                        <!-- /.row -->
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header p-2">
                            <ul class="nav nav-pills">
                                <li class="active"><a  class="nav-link active show" href="#settings" data-toggle="tab" >Settings</a></li>
                            </ul>
                        </div><!-- /.card-header -->
                        <div class="card-body">
                            <div class="tab-content">
                                <!-- Activity Tab -->
                                <!-- /.tab-pane -->
                                <div class="tab-pane active" id="settings">
                                    <form class="form-horizontal">
                                        <div class="form-group">
                                            <label for="inputName"  class="col-sm-2 control-label">Name</label>

                                            <div class="col-sm-10">
                                                <input type="text" v-model="form.name" class="form-control" id="inputName" placeholder="Name" :class="{ 'is-invalid': form.errors.has('name') }">
                                                <has-error :form="form" field="name"></has-error>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="inputEmail" class="col-sm-2 control-label">Email</label>

                                            <div class="col-sm-10">
                                                <input type="email" v-model="form.email" class="form-control" id="inputEmail" placeholder="Email"  :class="{ 'is-invalid': form.errors.has('email') }">
                                                <has-error :form="form" field="email"></has-error>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label for="inputSkills" class="col-sm-6 control-label">Password (leave empty if not changing)</label>

                                            <div class="col-sm-10">
                                                <input type="password" v-model="form.password"class="form-control" id="inputSkills" placeholder="password"  :class="{ 'is-invalid': form.errors.has('password') }">
                                                <has-error :form="form" field="password"></has-error>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <div class="col-sm-offset-2 col-sm-10">
                                                <button type="submit" @click.prevent="updateInfo" class="btn btn-danger">Update</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <!-- /.tab-pane -->
                            </div>
                            <!-- /.tab-content -->
                        </div>
                        <!-- /.card-body -->
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
                form: new Form({
                    id:'',
                    name:'',
                    email: '',
                    password:'',
                    role:'',
                })
            }
        },
        methods: {
            updateInfo() {
                this.$Progress.start();
                this.form.put('api/profile/')
                    .then(() => {
                        Fire.$emit('AfterCreate');
                        this.$Progress.finish();
                        toast.fire({
                            type: 'success',
                            title: 'User info updated successfully'
                        })
                    })
                    .catch(() => {
                        this.$Progress.fail();
                        Swal.fire("Failed to update profile!", "There was something wrong.");
                    });

            },
        },
        created() {
            axios.get("api/profile")
                .then(({ data }) => (this.form.fill(data)));
        }
    }
</script>
