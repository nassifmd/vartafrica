@extends("admin.layouts.app", ['loadVUE' => true, 'loadAxios' => true])
@section("title", "Register New Farmer")

@section("content")
    <div class="container-fluid py-4" id="create-farmer-section">
        <div class="col-md-12 mb-4">
            <div class="p-4">
                <div class="card mt-4">
                    @if($message = Session::get('msg'))
                        <div class="alert alert-success">
                            {{$message}}
                        </div>
                    @endif
                    @if($errors->any())
                        <div class="alert alert-danger">
                            @foreach ($errors->all() as $error)
                                <p style="color: #fff;">{{ $error }}</p>
                            @endforeach
                        </div>
                    @endif
                    <div class="card-header pb-0 p-3">
                        <div class="row">
                            <div class="col-6 d-flex align-items-center">
                            <h6 class="mb-0">Register New Farmer</h6>
                            </div>
                        </div>
                    </div>
                    <form action="{{ route("admin.new_farmer.save") }}" method="POST" class="mt-4"  style="margin: 15px;">
                        @csrf
                        <div class="row">

                            <div class="col-md-6">
                                <div class="form-group">
                                <label class="form-control-label">First Name</label>
                                <input class="form-control" type="text" name="first_name" placeholder="First Name" required>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                <label class="form-control-label">Last Name</label>
                                <input class="form-control" type="text" name="last_name" placeholder="Last Name" required>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                <label class="form-control-label">Username</label>
                                <input class="form-control" type="text" name="user_name" placeholder="Add letters and numbers not more than 8 characters" required>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="country_code" class="form-control-label">Country Code</label>
                                    <select v-model="country_code" name="country_code" class="form-control" required>
                                        @foreach(\DB::table('countries')->get() as $countries)
                                            <option value="{{ $countries->phonecode }}">{{ $countries->name }} +{{ $countries->phonecode }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                  <label class="form-control-label">Mobile Number</label>
                                  <input class="form-control" type="text" name="mobileNumber" v-model="mobileNumber" @input="mobileNumber_check" placeholder="Mobile Number"required>
                                  <p class="frmValidation" :class="{'frmValidation--passed' : mobileNumber.length < 10 }"><i class="frmIcon fas" :class="mobileNumber.length < 10 ? 'fa-check' : 'fa-times'"></i> Must Be Less than 10</p>
                                  <p class="frmValidation" :class="{'frmValidation--passed' : mobileNumber.length > 0 }"><i class="frmIcon fas" :class="mobileNumber.length > 0 ? 'fa-check' : 'fa-times'"></i> Must Be more than 0</p>
                                  <p class="frmValidation" :class="{'frmValidation--passed' : has_number_for_mobile }"><i class="frmIcon fas" :class="has_number_for_mobile ? 'fa-check' : 'fa-times'"></i> Has a number</p>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                <label class="form-control-label">Village</label>
                                <input class="form-control" name="village"  placeholder="Village" required>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                <label class="form-control-label">Parish</label>
                                <input class="form-control" name="parish"  placeholder="Parish" required>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="sub_county" class="form-control-label">Sub-county</label>
                                    <select v-model="sub_county" name="sub_county" class="form-control" required>
                                        @foreach(\DB::table('sub_county')->get() as $sub_county)
                                            <option value="{{ $sub_county->name }}">{{ $sub_county->name }}</option>
                                        @endforeach
                                        <option > Others </option>
                                    </select>
                                    <input class="form-control" name="sub_county"  placeholder="Sub-County">
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="district" class="form-control-label">District</label>
                                    <select v-model="district" name="district" class="form-control" required>
                                        @foreach(\DB::table('district')->get() as $district)
                                            <option value="{{ $district->name }}">{{ $district->name }}</option>
                                        @endforeach
                                        <option > Others </option>
                                    </select>
                                    <input class="form-control" name="district"  placeholder="District">
                                </div>
                            </div>




                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="country" class="form-control-label">Country</label>
                                    <select v-model="country" name="country" class="form-control" required>
                                        @foreach(\DB::table('countries')->get() as $countries)
                                            <option value="{{ $countries->name }}">{{ $countries->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                <label class="form-control-label">Sex</label>
                                <select class="form-control" name="sex" required>
                                    <option value="">Select</option>
                                    <option value="male">Male</option>
                                    <option value="female">Female</option>
                                </select>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="age" class="form-control-label">Age (year of birth)</label>
                                    <select v-model="age" name="age" class="form-control" required>
                                        @foreach(\DB::table('age')->get() as $age)
                                            <option value="{{ $age->name }}">{{ $age->name }}</option>
                                        @endforeach
                                    <option > Others </option>
                                    </select>
                                    <input class="form-control" name="age"  placeholder="Age">
                                </div>
                            </div>

                            <div class="col-md-6" id="show_save_amount"></div>


                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-control-label">Name of Next of Kin</label>
                                    <input class="form-control" type="text" name="next_of_kin_name" placeholder="Next of kin name">
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-control-label">Mobile Number of Next of Kin</label>
                                    <input class="form-control" type="text" name="next_of_kin_phone" placeholder="Phone Number of Next of kin">
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
                                    <p class="frmValidation" :class="{'frmValidation--passed' : has_special }"><i class="frmIcon fas" :class="has_special ? 'fa-check' : 'fa-times'"></i> Has a special character</p>
                                </div>
                            </div>

                            <hr>
                    <button type="button" class="collapsible">Optional Field</button>
                    <div class="content">

                                <div class="col-md-6">
                                    <div class="form-group">
                                    <label class="form-control-label">Disability Status</label>
                                    <select class="form-control" name="disability_status">
                                        <option value="">Select</option>
                                        <option value="yes">Yes</option>
                                        <option value="no">No</option>
                                    </select>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                    <label class="form-control-label">Land Area</label>
                                    <select class="form-control" name="land_area">
                                        <option value="">Select</option>
                                        <option value="1-5">1 - 10</option>
                                        <option value="6-10">6 - 10</option>
                                        <option value="10+">10+</option>
                                    </select>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                    <label class="form-control-label">Need Mechanization Service</label>
                                    <select class="form-control" name="mechanization_needed">
                                        <option value="">Select</option>
                                        <option value="yes">Yes</option>
                                        <option value="no">No</option>
                                    </select>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                    <label class="form-control-label">Fertilizer</label>
                                    <select class="form-control" name="fertilizer">
                                        <option value="">Select</option>
                                        <option value="yes">Yes</option>
                                        <option value="no">No</option>
                                    </select>
                                    </div>
                                </div>

                                <div class="col-md-6">

                                    <p id="demo"></p>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-control-label">Location Coordinates</label>
                                        {{-- <input id="demo" type="text" /> --}}
                                        <input disabled selected value id="latitude" name="latitude" type="text" />
                                        <input disabled selected value id="longitude" name="longitude" type="text" />
                                    </div>
                                </div>
                    </div>

                            <div class="col-md-6"></div>

                            <div class="col-md-6" v-if="password.length >= 8 && has_uppercase && has_lowercase && has_number && has_special">
                                <button class="btn btn-primary" onclick="javascript:return validateMyForm();" type="submit">Submit</button>
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
    $(document).ready(function () {
        var count_target_package=0;

        $("#show_save_amount").css('display', 'none');

        $('#target_package').select2({
            'placeholder': 'Select',
            maximumSelectionLength: 2,
            allowClear: true
        });

        $('#target_package').on('select2:select', function (e) {
            count_target_package++;
            if(count_target_package==2){
                $("#show_save_amount").css('display', 'block');
                $('#show_save_amount').html('<div class="form-group"><label class="form-control-label">Target Saving Amount (UGX)</label><input class="form-control" type="text" name="save_amount2" placeholder="Target Saving Amount (UGX)" required></div>');
            }
        });

        $('#target_package').on('select2:unselect', function (e) {
            count_target_package--;
            $('#show_save_amount').html('');
            $("#show_save_amount").css('display', 'none');
        });
    });

    const create_Admin = {
        data () {
            return {
                password: "",
                mobileNumber: "",
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
        }
    };

    var app = Vue.createApp(create_Admin).mount("#create-farmer-section");


    function myFunction() {
  var x = document.getElementById("myInput");
  if (x.type === "password") {
    x.type = "text";
  } else {
    x.type = "password";
  }
}
</script>

<script>
    function getLocation()
    {
        if (navigator.geolocation)
        {
            navigator.geolocation.getCurrentPosition(showPosition);
        }
    }

    function showPosition(position)
    {
        document.getElementById("latitude").value = position.coords.latitude;
        document.getElementById("longitude").value = position.coords.longitude;
    }
    getLocation();

</script>

<script>
    var coll = document.getElementsByClassName("collapsible");
    var i;

    for (i = 0; i < coll.length; i++) {
      coll[i].addEventListener("click", function() {
        this.classList.toggle("active");
        var content = this.nextElementSibling;
        if (content.style.display === "block") {
          content.style.display = "none";
        } else {
          content.style.display = "block";
        }
      });
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

<style>
    .collapsible {
      background-color: #777;
      color: white;
      cursor: pointer;
      padding: 18px;
      width: 100%;
      border: none;
      text-align: left;
      outline: none;
      font-size: 15px;
    }

    .content {
      padding: 0 18px;
      display: none;
      overflow: hidden;
      background-color: #f1f1f1;
    }
    </style>

@endsection
