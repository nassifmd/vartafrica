@extends("admin.layouts.app", ['loadVUE' => true, 'loadAxios' => true])
@section("title", "Generate Card")

@section("content")
    <div class="container-fluid py-4" id="amount-section">

    <div class="col-md-12 mb-4">
              <div class="p-4">

              <div class="card mt-4">
                <div class="card-header pb-0 p-3">
                  <div class="row">
                    <div class="col-6 d-flex align-items-center">
                      <h6 class="mb-0">Generate Code</h6>
                    </div>
                  </div>
                </div>
                <form class="mt-4"  style="margin: 15px;">
          <div class="row">
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="form-control-label">Amount</label>
                        <select class="form-control" v-model="addmore.amount" placeholder="Select amount">
                            <option v-for="amountValue in selectAmount" :value="amountValue">@{{ amountValue }}</option>
                        </select>
                    </div>
                </div>
            </div>

            <div class="col-md-6">
              <div class="form-group" v-if="amount == 'Custom'">
                <label class="form-control-label">Custom amount</label>
                <input class="form-control" type="number" v-model="customAmount" placeholder="Custom amount">
              </div>
            </div>

            <div class="col-md-6"></div>
            <div class="col-md-6" v-if="(amount && amount != 'Custom') || (amount == 'Custom' && customAmount)">
                <button v-on:click="getSerialCode" class="btn btn-primary" type="button">Generate Serial</button>
            </div>
            <div class="clearfix"></div>
            <div class="row" v-if="generatedSerial">
                <div class="col-md-12">
                    <div class="form-group">
                        <label class="form-control-label">Serial</label>
                        <input class="form-control" type="text" v-model="generatedSerial" disabled="" readonly="">
                      </div>
              </div>
              <div class="col-md-4">
                <button v-on:click="copySerial" class="btn btn-primary" type="button">Copy Serial
                </button>
                <div class="alert alert-primary" style="color: white;" v-if="serialCopied">@{{ serialCopied }}</div>
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
    const amountDiv = {
        data () {
            return {
                generatedSerial: "",
                serialCopied: "",
                customAmount: 0,
                amount:0,
                selectAmount: [5000, 10000, 20000, 50000, "Custom"],
            };
        },
        methods: {
            getSerialCode () {
                let that = this;
                this.serialCopied = "";
                axios({
                  method: 'post',
                  url: '{{ route("admin.cards.save") }}',
                  headers: {'csrf-token': '{{ csrf_token() }}'},
                  data: {
                    amount: this.amount == "Custom" ? this.customAmount : this.inputs,
                  }
                }).then(function (response) {
                    if(response.data.success == true){
                        that.generatedSerial = response.data.serial;
                    }
                    else
                        alert(response.data.message);
                });
            },
            copySerial() {
                navigator.clipboard.writeText(this.generatedSerial);
                this.serialCopied = "Serial copied to clipboard";
            }
        }
    };

    var app = Vue.createApp(amountDiv).mount("#amount-section");

</script>
@endsection
