@extends("admin.layouts.app", ['loadVUE' => true, 'loadAxios' => true])
@section("title", "Debit Farmer Form")

@section("css")
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
@endsection

@section("content")
<div class="container-fluid py-4" id="debit-form-section">
  <div class="col-md-12 mb-4">
      <div class="p-4">
        <div class="card mt-4">
          <div class="card-header pb-0 p-3">
            <div class="row">
              <div class="col-6 d-flex align-items-center">
                <h6 class="mb-0">Debit Farmer</h6>
              </div>
            </div>
          </div>
          <form class="mt-4"  style="margin: 15px;">
            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <label class="form-control-label">User</label>
                  <select class="form-control userlist" v-model="user_id" placeholder="Select user">
                      <option v-for="user in users" v-bind:value="user.id">@{{ user.id +" (UGX"+user.balance+")" }}</option>
                  </select>
                </div>
              </div>

              {{-- <div class="col-md-6">
                <div class="form-group">
                  <label class="form-control-label">User Packages</label>
                  <select class="form-control userpackagelist" v-model="user_package_id" placeholder="Select Package">
                      <option v-for="(user_package, index) in user_packages" v-bind:value="user_package">@{{ user_package }} - @{{ user_package_amount[index]}}</option>
                  </select>
                </div>
              </div> --}}

              <div class="col-md-6">
                <div class="form-group">
                  <label class="form-control-label">Amount</label>
                  <input class="form-control" type="number" v-model="amount" placeholder="Custom amount">
                </div>
              </div>

              <div class="col-md-6"></div>

              <div class="col-md-6" v-if="amount && user_id">
                  <button v-on:click="debitNow" class="btn btn-primary" type="button">Debit now</button>
              </div>
              <div class="clearfix"></div>
              <div class="row" v-if="response_message">
                <div class="col-md-12">
                  <div class="alert" v-bind:class="response_class">@{{ response_message }}</div>
                </div>
              </div>

          </form>
      </div>
    </div>
  </div>
</div>

@endsection

@section("js")
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
 <script type="text/javascript">
    const debitForm = {
        data () {
            return {
                user_id: null,
                amount: 0,
                response_class: "",
                response_message: "",
                users: [],
                user_package_id: null,
                user_packages: [],
                user_package_amount: []
            };
        },
        mounted () {
           let that = this;
           $('.userlist').select2();
           $('.userpackagelist').select2();
           $('.userlist').on('select2:select', function (e) {
              that.user_id = e.params.data.id;

              axios.get('{{ route("admin.user_debits.get_packages") }}',
                {
                  params: {
                    id: that.user_id
                  }
                }
              )
              .then((response) => {
                  that.user_packages = response.data.target_package;
                  that.user_packages = that.user_packages.split(",");
                  that.user_package_amount = response.data.save_amount;
                  that.user_package_amount = that.user_package_amount.split(",");
                }
                )
              .catch((error) => console.log(error.message))
           });
          axios.get('{{ route("admin.user_debits.get_users") }}')
              .then((response) => this.users = response.data)
              .catch((error) => console.log(error.message))

        },
        methods: {
            debitNow () {
                let that = this;
                that.response_class = "";
                that.response_message = "";
                axios({
                  method: 'post',
                  url: '{{ route("admin.user_debits.save") }}',
                  headers: {'csrf-token': '{{ csrf_token() }}'},
                  data: {
                    amount: this.amount,
                    user_id: this.user_id
                  }
                }).then(function (response) {
                    if(response.data.success == true){
                        that.response_message = response.data.message;
                        that.response_class = "alert-success";
                    } else {
                        that.response_message = response.data.message;
                        that.response_class = "alert-danger";
                    }
                });
            }
        }
    };
    var app = Vue.createApp(debitForm).mount("#debit-form-section");
</script>
@endsection
