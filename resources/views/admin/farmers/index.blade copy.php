@extends("admin.layouts.app", ['loadVUE' => true, 'loadAxios' => true])
@section("title", "Register New Farmer")

@section("content")
    <div class="container-fluid py-4" id="create-agent-section">

    <div class="col-md-12 mb-4">
              <div class="p-4">

              <div class="card mt-4">
                <div class="card-header pb-0 p-3">
                  <div class="row">
                    <div class="col-6 d-flex align-items-center">
                      <h6 class="mb-0">Register New Farmer</h6>
                    </div>
                  </div>
                </div>
                <form class="mt-4"  style="margin: 15px;">
          <div class="row">

            <div class="col-md-6">
                <div class="form-group">
                  <label class="form-control-label">First Name</label>
                  <input class="form-control" type="text" v-model="first_name" placeholder="First Name" required>
                </div>
            </div>

            <div class="col-md-6">
                <div class="form-group">
                  <label class="form-control-label">Last Name</label>
                  <input class="form-control" type="text" v-model="last_name" placeholder="Last Name" required>
                </div>
            </div>

            <div class="col-md-6">
                <div class="form-group">
                  <label class="form-control-label">Username</label>
                  <input class="form-control" type="text" v-model="user_name" placeholder="Username" required>
                </div>
            </div>

            <div class="col-md-6">
                <div class="form-group">
                  <label class="form-control-label">Mobile Number</label>
                  <input class="form-control" type="text" v-model="mobileNumber" placeholder="Mobile Number" required>
                </div>
            </div>

            <div class="col-md-12">
                <div class="form-group">
                  <label class="form-control-label">Village</label>
                  <textarea  rows="5" class="form-control" v-model="village"  placeholder="Village" required></textarea>
                </div>
            </div>

            <div class="col-md-12">
                <div class="form-group">
                  <label class="form-control-label">Parish</label>
                  <textarea  rows="5" class="form-control" v-model="parish"  placeholder="parish" required></textarea>
                </div>
            </div>

            <div class="col-md-6">
                <div class="form-group">
                  <label class="form-control-label">Sub-county</label>
                  <select class="form-control" v-model="sub_county" required>
                      <option value="">Select</option>
                      <option value="Kingo">Kingo</option>
                      <option value="Kaliliso">Kaliliso</option>
                      <option value="Muduuma">Muduuma</option>
                      <option value="Wabiruko">Wabiruko</option>
                      <option value="Nkozi">Nkozi</option>
                      <option value="Katikamu">Katikamu</option>
                      <option value="Butalangu">Butalangu</option>
                      <option value="Kakika">Kakika</option>
                      <option value="Nakifuma">Nakifuma</option>
                      <option value="Butanswa">Butanswa</option>
                      <option value="Lwanda">Lwanda</option>
                      <option value="Barr">Barr</option>
                      <option value="Gobero">Gobero</option>
                      <option value="Kiseka">Kiseka</option>
                      <option value="Nabigasa">Nabigasa</option>
                      <option value="Buloba">Buloba</option>
                      <option value="Bulera">Bulera</option>
                      <option value="Buwuma">Buwuma</option>
                      <option value="Bombo">Bombo</option>
                      <option value="Wakyato">Wakyato</option>
                      <option value="Kibega">Kibega</option>
                      <option value="Ndese">Ndese</option>
                      <option value="Namwendwa">Namwendwa</option>
                      <option value="Dwaniro">Dwaniro</option>
                      <option value="Ngetta">Ngetta</option>
                      <option value="Kasenge">Kasenge</option>
                      <option value="Kinono">Kinono</option>
                      <option value="Kirumba">Kirumba</option>
                      <option value="Buwalula">Buwalula</option>
                      <option value="Namutamba">Namutamba</option>
                      <option value="kayabwe">kayabwe</option>
                      <option value="Wobulenzi">Wobulenzi</option>
                      <option value="Kyamutakasa">Kyamutakasa</option>
                      <option value="Kasana">Kasana</option>
                      <option value="Kalagi">Kalagi</option>
                      <option value="Nawanyago">Nawanyago</option>
                      <option value="Byakabanda">Byakabanda</option>
                      <option value="Bar Apwo">Bar Apwo</option>
                      <option value="Namayumba">Namayumba</option>
                  </select>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                  <label class="form-control-label">District</label>
                  <select class="form-control" v-model="district" required>
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
                  <select class="form-control" v-model="country" required>
                      <option value="">Select</option>
                      <option value="Uganda">Uganda</option>
                  </select>
                </div>
            </div>

            <div class="col-md-6">
                <div class="form-group">
                  <label class="form-control-label">Sex</label>
                  <select class="form-control" v-model="sex" required>
                      <option value="">Select</option>
                      <option value="male">Male</option>
                      <option value="female">Female</option>
                  </select>
                </div>
            </div>

            <div class="col-md-6">
                <div class="form-group">
                  <label class="form-control-label">Age</label>
                  <input class="form-control" type="date" v-model="age" placeholder="Age" required>
                </div>
            </div>

            <div class="col-md-6">
                <div class="form-group">
                  <label class="form-control-label">Password</label>
                  <input class="form-control" type="password" v-model="password" placeholder="Password" required>
                </div>
            </div>

            <div class="col-md-6">
                <div class="form-group">
                    <label class="form-control-label">Name of Next of Kin</label>
                    <input class="form-control" type="text" v-model="next_of_kin_name" placeholder="Next of kin name">
                </div>
            </div>

            <div class="col-md-6">
                <div class="form-group">
                    <label class="form-control-label">Phone Number of Next of Kin</label>
                    <input class="form-control" type="text" v-model="next_of_kin_phone" placeholder="Phone Number of Next of kin">
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
    $(document).ready(function () {
        $('#target_package').select2({
            'placeholder': 'Select',
            maximumSelectionLength: 2,
            allowClear: true
        });

        var that = this;
        $('#target_package').select2().on("change", function() {
            that.target_package = $(this).val().join(", ");
            console.log(that.target_package);
        });

    });

    const create_Agent = {
        data () {
            return {
                first_name: "",
                last_name: "",
                user_name: "",
                mobileNumber: "",
                location: "",
                sex: "",
                age: "",
                target_package:[],
                save_amount: "",
                next_of_kin_name: "",
                next_of_kin_phone: "",
                password: "",
                message: ""
            };
        },
        methods: {
            createAdmin () {
                let that = this;
                this.message = "";
                axios({
                  method: 'post',
                  url: '{{ route("admin.new_farmer.save") }}',
                  headers: {'csrf-token': '{{ csrf_token() }}'},
                  data: {
                    first_name: this.first_name,
                    last_name: this.last_name,
                    user_name: this.user_name,
                    mobileNumber: this.mobileNumber,
                    location: this.location,
                    sex: this.sex,
                    age: this.age,
                    target_package: this.target_package,
                    save_amount: this.save_amount,
                    next_of_kin_name: this.next_of_kin_name,
                    next_of_kin_phone: this.next_of_kin_phone,
                    password: this.password
                  }
                }).then(function (response) {
                    if(response.data.success == true){
                        console.log(response.data.message);
                        //alert(response.data.message);
                        //window.location.reload();
                    } else
                        that.message = response.data.message;
                });
            },
        }
    };

    var app = Vue.createApp(create_Agent).mount("#create-agent-section");
</script>
@endsection
