@extends("admin.layouts.app", ['loadVUE' => true, 'loadAxios' => true])
@section("title", "Register New Agent")

@section("content")
    <div class="container-fluid py-4" id="create-agent-section">

    <div class="col-md-12 mb-4">
              <div class="p-4">

              <div class="card mt-4">
                <div class="card-header pb-0 p-3">
                  <div class="row">
                    <div class="col-6 d-flex align-items-center">
                      <h6 class="mb-0">Register New Agent</h6>
                    </div>
                  </div>
                </div>
                <form class="mt-4"  style="margin: 15px;">
          <div class="row">

            <div class="col-md-6">
                <div class="form-group">
                  <label class="form-control-label">First Name - Last Name</label>
                  <input class="form-control" type="text" v-model="name" placeholder="Name">
                </div>
            </div>

            <div class="col-md-6">
                <div class="form-group">
                    <label for="country_code" class="form-control-label">Country code</label>
                    <select v-model="country_code" class="form-control">
                        @foreach(\DB::table('countries')->get() as $countries)
                            <option value="{{ $countries->name }}">{{ $countries->name }} +{{ $countries->phonecode }}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="col-md-6">
                <div class="form-group">
                  <label class="form-control-label">Mobile Number</label>
                  <input class="form-control" type="text" name="mobileNumber" v-model="mobileNumber" @input="mobileNumber_check" placeholder="Mobile Number">
                  <p class="frmValidation" :class="{'frmValidation--passed' : mobileNumber.length < 10}"><i class="frmIcon fas" :class="mobileNumber.length < 10 ? 'fa-check' : 'fa-times'"></i> Must Be Less than 10</p>
                  <p class="frmValidation" :class="{'frmValidation--passed' : mobileNumber.length > 8}"><i class="frmIcon fas" :class="mobileNumber.length > 8 ? 'fa-check' : 'fa-times'"></i> Must Be Equal to 9</p>
                  <p class="frmValidation" :class="{'frmValidation--passed' : has_number_for_mobile }"><i class="frmIcon fas" :class="has_number_for_mobile ? 'fa-check' : 'fa-times'"></i> Has a number</p>
                </div>
            </div>

            <div class="col-md-6">
                                <div class="form-group">
                                <label class="form-control-label">District</label>
                                <select class="form-control" name="district" v-model="district" required>
                                <option value="">Select</option>
                                    <option value="Lwengo">Lwengo</option>
                                    <option value="Kyotela">Kyotela</option>
                                    <option value="Mpigi">Mpigi</option>
                                    <option value="Mityana">Mityana</option>
                                    <option value="Luweero">Luweero</option>
                                    <option value="Nakaseke">Nakaseke</option>
                                    <option value="Mbarara">Mbarara</option>
                                    <option value="Mukono">Mukono</option>
                                    <option value="Buyende">Buyende</option>
                                    <option value="Rakai">Rakai</option>
                                    <option value="Lira">Lira</option>
                                    <option value="Wakiso">Wakiso</option>
                                </select>
                                </div>
                            </div>

            <div class="col-md-6">
                <div class="form-group">
                    <label class="form-control-label">Country</label>
                        <select class="form-control" name="country" v-model="country" required>
                            <option value="">Select</option>
                            <option value="Uganda">Uganda</option>
                        </select>
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
                    <input class="form-control" id="myInput" type="password" name="password" v-model="password" @input="password_check" placeholder="Password">
                    <input type="checkbox" onclick="myFunction()">Show Password
                    <p class="frmValidation" :class="{'frmValidation--passed' : password.length >= 8}"><i class="frmIcon fas" :class="password.length >= 8 ? 'fa-check' : 'fa-times'"></i> Longer than 8 characters</p>
                    <p class="frmValidation" :class="{'frmValidation--passed' : has_uppercase }"><i class="frmIcon fas" :class="has_uppercase ? 'fa-check' : 'fa-times'"></i> Has a capital letter</p>
                    <p class="frmValidation" :class="{'frmValidation--passed' : has_lowercase }"><i class="frmIcon fas" :class="has_lowercase ? 'fa-check' : 'fa-times'"></i> Has a lowercase letter</p>
                    <p class="frmValidation" :class="{'frmValidation--passed' : has_number }"><i class="frmIcon fas" :class="has_number ? 'fa-check' : 'fa-times'"></i> Has a number</p>
                    <p class="frmValidation" :class="{'frmValidation--passed' : has_special }"><i class="frmIcon fas" :class="has_special ? 'fa-check' : 'fa-times'"></i> Has a special character ( " !"#$%&'()*+,-./:;<=>?@[\]^_`{|}~") </p>
                </div>
            </div>

            <div class="col-md-6"></div>

            <div class="col-md-6" v-if="password.length >= 8">
                <button v-on:click="createAdmin" class="btn btn-primary" type="button">Submit</button>
            </div>

            <div class="clearfix"></div>
            <div class="row" v-if="password.length < 8">
             <div class="col-md-12">
                    <div class="form-group">
                        <input class="form-control" type="text" value="Please make sure that password length equal or great than 8 char. (include numbers, mixed case, symbols and letters)" disabled="" readonly="">
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
    const create_Agent = {
        data () {
            return {
                name: "",
                email: "",
                country_code: "",
                mobileNumber: "",
                district: "",
                country: "",
                password: "",
                role: "",
                message: "",
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
                  url: '{{ route("admin.new_agent.save") }}',
                  headers: {'csrf-token': '{{ csrf_token() }}'},
                  data: {
                    name: this.name,
                    email: this.email,
                    country_code: this.country_code,
                    mobileNumber: this.mobileNumber,
                    district: this.district,
                    country: this.country,
                    password: this.password,
                    role: this.role
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

    var app = Vue.createApp(create_Agent).mount("#create-agent-section");


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
