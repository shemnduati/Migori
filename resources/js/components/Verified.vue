<template>
  <div class="">
    <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Responsive Hover Table</h3>

                <div class="card-tools">
                  <div class="input-group input-group-sm" style="width: 150px;">
                    <input type="text" name="table_search" class="form-control float-right" placeholder="Search">

                    <div class="input-group-append">
                      <button type="submit" class="btn btn-default"><i class="fas fa-search"></i></button>
                    </div>
                  </div>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body table-responsive p-0">
                <table class="table table-hover">
                  <thead>
                    <tr>
                      <th>Serial No.</th>
                      <th>User</th>
                      <th>Ward</th>
                      <th>View</th>
                      <th>Type</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td>BAZA56183</td>
                      <td>John Doe</td>
                      <td>Huruma</td>
                      <td> <router-link to="verifiedform" class="btn btn-primary btn-sm">View</router-link></td>
                      <td>CDF</td>
                    </tr>
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
        </div>
  </div>
</template>

<script>
export default {
    mounted() {
        console.log('Component mounted.')
    }
}
</script>

<style scoped>
</style>
