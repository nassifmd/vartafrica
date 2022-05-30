@extends("admin.layouts.app", ['loadVUE' => true, 'loadAxios' => true])
@section("title", "Change Password")

@section("content")
    <div class="container-fluid py-4" id="password-section">

    <div class="col-md-12 mb-4">
              <div class="p-4">

              <div class="card mt-4">
                <div class="card-header pb-0 p-3">
                  <div class="row">
                    <div class="col-6 d-flex align-items-center">
                      <h6 class="mb-0">Change Password</h6>
                    </div>
                  </div>
                </div>
                <form class="mt-4"  style="margin: 15px;">
          <div class="row">

            <div class="col-md-6">

              <div class="form-group">
                <label class="form-control-label">Old Password</label>
                <input class="form-control" type="password" v-model="oldPassword" placeholder="Old Password">
              </div>
            </div>

            <div class="col-md-6">

              <div class="form-group">
                <label class="form-control-label">New Password</label>
                <input class="form-control" type="password" v-model="newPassword" placeholder="New Password">
              </div>
            </div>

            <div class="col-md-6" v-if="oldPassword && newPassword.length >= 8">
                <button v-on:click="changePassword" class="btn btn-primary" type="button">Change</button>
            </div>

            <div class="clearfix"></div>
            <div class="row" v-if="newPassword.length < 8">
             <div class="col-md-12">
                    <div class="form-group">
                        <input class="form-control" type="text" value="Please make sure that new password length equal or great than 8 char." disabled="" readonly="">
                      </div>
              </div>
             </div>

              <div class="row" v-if="message">
                <div class="col-md-12">
                    <div class="form-group">
                        <input class="form-control" type="text" v-model="message" disabled="" readonly="">
                      </div>
              </div>
          </div>

        </form>
              </div>
            </div>
            </div>
      </div>
@endsection

@section("js")
 <script type="text/javascript">
    const passwordDiv = {
        data () {
            return {
                oldPassword: "",
                newPassword: "",
                message: "",
            };
        },
        methods: {
            changePassword () {
                let that = this;
                this.message = "";
                axios({
                  method: 'post',
                  url: '{{ route("admin.change_password.save") }}',
                  headers: {'csrf-token': '{{ csrf_token() }}'},
                  data: {
                    old_password: this.oldPassword, new_password: this.newPassword
                  }
                }).then(function (response) {
                    if(response.data.success == true){
                        alert(response.data.message);
                        window.location.reload();
                    } else
                        that.message = response.data.message;
                });
            },
        }
    };

    var app = Vue.createApp(passwordDiv).mount("#password-section");
</script>
@endsection
