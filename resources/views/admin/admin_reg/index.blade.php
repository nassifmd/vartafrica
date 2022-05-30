@extends("admin.layouts.app", ['loadVUE' => true, 'loadAxios' => true])
@section("title", "Register New Admin")

@section("content")
    <div class="container-fluid py-4" id="create-admin-section">

        <div class="col-md-12 mb-4">
            <div class="p-4">

              <div class="card mt-4">
                <div class="card-header pb-0 p-3">
                  <div class="row">
                    <div class="col-6 d-flex align-items-center">
                      <h6 class="mb-0">Register New Admin</h6>
                    </div>
                  </div>
                </div>

                <form class="mt-4"  style="margin: 15px;">
                   <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-control-label">First Name - Last Name</label>
                                <input class="form-control" type="text" v-model="Name" placeholder="Name">
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-control-label">Company Name</label>
                                <input class="form-control" type="text" v-model="companyName" placeholder="Company Name">
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-control-label">Contact Person's Name</label>
                                <input class="form-control" type="text" v-model="contactPersonName" placeholder="Contact Persons Name">
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-control-label">Email</label>
                                <input class="form-control" type="email" v-model="email" placeholder="Email">
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="country_code" class="form-control-label">Country Code</label>
                                <select v-model="country_code" class="form-control">
                                    @foreach(\DB::table('countries')->get() as $countries)
                                        <option value="{{ $countries->phonecode }}">{{ $countries->name }}+{{ $countries->phonecode }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                              <label class="form-control-label">Mobile Number</label>
                              <input class="form-control" type="text" name="mobileNumber" v-model="mobileNumber" @input="mobileNumber_check" placeholder="Mobile Number">
                              <p class="frmValidation" :class="{'frmValidation--passed' : mobileNumber.length < 10}"><i class="frmIcon fas" :class="mobileNumber.length < 10 ? 'fa-check' : 'fa-times'"></i> Must Be Less than 10</p>
                              <p class="frmValidation" :class="{'frmValidation--passed' : mobileNumber.length > 8}"><i class="frmIcon fas" :class="mobileNumber.length > 8 ? 'fa-check' : 'fa-times'"></i> Must Be More than 8</p>
                              <p class="frmValidation" :class="{'frmValidation--passed' : has_number_for_mobile }"><i class="frmIcon fas" :class="has_number_for_mobile ? 'fa-check' : 'fa-times'"></i> Has a number</p>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-control-label">Country</label>
                                <select name="country" v-model="country" class="form-control">
                                    <option value="">Select</option>
                                    <option value="Uganda">Uganda</option>
                                </select>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-control-label">Role</label>
                                <select name="role" v-model="role" class="form-control">
                                    <option value="">Select</option>
                                    @foreach ($roles as $role)
                                        <option value="{{ $role->id }}">{{ $role->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-control-label">Password</label>
                                <input class="form-control" id="myInput" type="password" v-model="password" @input="password_check" placeholder="Password">
                                <input type="checkbox" onclick="myFunction()">Show Password
                                <p class="frmValidation" :class="{'frmValidation--passed' : password.length >= 8}"><i class="frmIcon fas" :class="password.length >= 8 ? 'fa-check' : 'fa-times'"></i> Longer than 8 characters</p>
                                <p class="frmValidation" :class="{'frmValidation--passed' : has_uppercase }"><i class="frmIcon fas" :class="has_uppercase ? 'fa-check' : 'fa-times'"></i> Has a capital letter</p>
                                <p class="frmValidation" :class="{'frmValidation--passed' : has_lowercase }"><i class="frmIcon fas" :class="has_lowercase ? 'fa-check' : 'fa-times'"></i> Has a lowercase letter</p>
                                <p class="frmValidation" :class="{'frmValidation--passed' : has_number }"><i class="frmIcon fas" :class="has_number ? 'fa-check' : 'fa-times'"></i> Has a number</p>
                                <p class="frmValidation" :class="{'frmValidation--passed' : has_special }"><i class="frmIcon fas" :class="has_special ? 'fa-check' : 'fa-times'"></i> Has a special character</p>
                            </div>

                        </div>

                        <div class="col-md-6"></div>

                        <div class="col-md-6" v-if="password.length >= 8 && has_uppercase && has_lowercase && has_number && has_special">
                            <button v-on:click="createAdmin" class="btn btn-primary" type="button">Submit</button>
                        </div>
                        <div class="clearfix"></div>
                   </div>
                </form>
              </div>
            </div>
        </div>
    </div>
@endsection

@section("js")
 <script type="text/javascript">
    const create_Admin = {
        data () {
            return {
                Name: "",
                companyName: "",
                contactPersonName: "",
                email: "",
                country_code: "",
                mobileNumber: "",
                country: "",
                password: "",
                role: "",
                message: "",
                errors: [],
                has_number:    false,
                has_lowercase: false,
                has_uppercase: false,
                has_special:   false,
                has_number_for_mobile: false
            };
        },
        methods: {
            password_check() {
                this.has_number    = /\d/.test(this.password);
                this.has_lowercase = /[a-z]/.test(this.password);
                this.has_uppercase = /[A-Z]/.test(this.password);
                this.has_special   = /[!@#\$%\^\&*\)\(+=._-]/.test(this.password);
            },
            mobileNumber_check() {
                this.has_number_for_mobile    = /\d/.test(this.mobileNumber);
            },
            createAdmin () {
                let that = this;
                this.message = "";
                axios({
                  method: 'post',
                  url: '{{ route("admin.new_admin.save") }}',
                  headers: {'csrf-token': '{{ csrf_token() }}'},
                  data: {
                    Name: this.Name,
                    companyName: this.companyName,
                    contactPersonName: this.contactPersonName,
                    email: this.email,
                    country_code: this.country_code,
                    mobileNumber: this.mobileNumber,
                    country: this.country,
                    password: this.password,
                    role: this.role
                  }
                }).then(function (response) {
                    if(response.data.success == true){
                        alert(response.data.message);
                        window.location.reload();
                    } else{
                        alert(error.response.data.errors);
                    }
                });
            },
        }
    };

    var app = Vue.createApp(create_Admin).mount("#create-admin-section");


function myFunction() {
  var x = document.getElementById("myInput");
  if (x.type === "password") {
    x.type = "text";
  } else {
    x.type = "password";
  }
}
</script>

<style scoped>
    body{
        background-color: #EFEFEF;
    }
    .container{
        width:400px;
        margin:50px auto;
        background: white;
        padding:10px;
        font-family: Arial, Helvetica, sans-serif, sans-serif;
        border-radius: 3px;
    }
    h1{
        font-size: 24px;
        text-align: center;
        text-transform: uppercase;
    }
    .frmField{
        background-color:white;
        color:#495057;
        line-height: 1.25;
        font-size: 16px;
        font-family: 'Roboto', sans-serif;
        border:0;
        padding: 10px;
        border:1px solid #dbdbdb;
        border-radius: 3px;
        width:90%;
    }
    .frmLabel{
        display: block;
        margin-bottom: 10px;
        font-weight: bold;
    }
    .frmValidation{
        font-size: 13px;
    }
    .frmValidation--passed{
        color:#717b85;
    }
    .frmValidation--passed .frmIcon{
        color:#0fa140;
    }
    .frmIcon{
        color:#EB0029;
    }
</style>

@endsection
