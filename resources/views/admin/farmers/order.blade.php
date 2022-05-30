@extends("admin.layouts.app", ['loadVUE' => true, 'loadAxios' => true])
@section("title", "Create New Order")

@section("content")
    <div class="container-fluid py-4" id="orders-section">

        <div class="col-md-12 mb-4">
            <div class="p-4">

                <div class="card mt-4">
                    <div class="card-header pb-0 p-3">
                        <div class="row">
                            <div class="col-6 d-flex align-items-center">
                                <h6 class="mb-0">Create New Order</h6>
                            </div>
                        </div>
                        @if($message = Session::get('msg'))
                            <div class="alert alert-success">
                                {{$message}}
                            </div>
                        @endif
                    </div>
                    <form method="POST" action="{{ route('admin.new_farmer.register') }}" class="mt-4"  style="margin: 15px;">
                        @csrf
                        <div class="row">

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-control-label">Select Farmer (Mobile number)</label>
                                    <select required name="farmers" class="form-control">
                                        <option value="">Select</option>
                                        @foreach ($farmers as $farmer)
                                            <option value="{{ $farmer->contact }}">{{ $farmer->contact}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-control-label">Crop Cultivated</label>
                                    <select required name="crop_cultivated" class="form-control">
                                        @foreach(\DB::table('crops')->get() as $crops)
                                            <option value="{{ $crops->name }}">{{ $crops->name }}</option>
                                        @endforeach
                                        <option > Others </option>
                                    </select>
                                    <input class="form-control" name="crop_cultivated"  placeholder="Crop cultivated">
                                </div>
                            </div>

                            <hr>
                            <div class="row" v-for="(field, index) in fields">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-control-label">Variety</label>
                                        <select required name="variety[]" v-model="field.variety" id="variety" class="form-control">
                                            @foreach(\DB::table('varieties')->get() as $varieties)
                                            <option value="{{ $varieties->name }}">{{ $varieties->name }}</option>
                                        @endforeach
                                        <option > Others </option>
                                    </select>
                                    <input class="form-control" name="variety[]"  placeholder="Variety">
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-control-label">Seed Quantity</label>
                                        <input id="seed_quantity" class="form-control" type="text" name="seed_quantity[]" v-model="field.seed_quantity" value="{{ old('seed_quantity') }}" required />
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-control-label">Unit Price (UGX)</label>
                                        <input @keyup="findTotal(index)" id="unit_price" class="form-control" type="text" name="unit_price[]" v-model="field.unit_price" value="{{ old('unit_price') }}" required />
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-control-label">Total Price (UGX)</label>
                                        <input id="total_price" class="form-control" type="text" name="total_price[]" v-model="field.total_price" value="{{ old('total_price') }}" required />
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <button class="btn btn-success" @click="AddField" type="button">+ Add More Variety</button>
                            </div>
                            <hr>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-control-label">Discounted Value Per Unit (UGX)</label>
                                    <input @keyup="findNetOrder" id="dis_val_per_unit" class="form-control" type="text" name="dis_val_per_unit" v-model="dis_val_per_unit" value="{{ old('dis_val_per_unit') }}" required />
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-control-label">Net Order Value (UGX)</label>
                                    <input id="net_order_val" class="form-control" type="text" name="net_order_val" v-model="net_order_val" value="{{ old('net_order_val') }}" required />
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-control-label">Total Net Saving Goal (UGX)</label>
                                    <input id="total_net_saving_goal" class="form-control" type="text" name="total_net_saving_goal" value="{{ old('total_net_saving_goal') }}" required />
                                </div>
                            </div>

                            <!-- <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-control-label">Target Saving Amount (UGX)</label>
                                    <input id="save_amount" class="form-control" type="text" name="save_amount" value="{{ old('save_amount') }}" required />
                                </div>
                            </div>


                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-control-label">Period Of Package Delivery</label>
                                    <input id="period_of_package_delivery" class="form-control" type="date" name="period_of_package_delivery" value="{{ old('period_of_package_delivery') }}" required />
                                </div>
                            </div> -->

                            <div class="col-md-6"></div>

                            <div class="col-md-6">
                                <button class="btn btn-primary" type="submit">Submit</button>
                            </div>

                            <div class="clearfix"></div>

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
        // $('#variety').select2({
        //     'placeholder': 'Select',
        //     allowClear: true
        // });
    });

    const createOrder = {
        data () {
            return {
                fields: [{
                    variety: "",
                    seed_quantity: "",
                    unit_price: "",
                    total_price: ""
                }],
                total: "",
                dis_val_per_unit: "",
                net_order_val: "",
            };
        },
        methods: {
            AddField: function () {
                this.fields.push({ variety: "",seed_quantity: "", unit_price: "", total_price: "" });
            },
            findTotal (index) {
                this.fields[index].total_price = this.fields[index].seed_quantity * this.fields[index].unit_price;

                if(this.dis_val_per_unit!='')
                    this.net_order_val = this.fields[index].total_price - (this.dis_val_per_unit);
            },
            findNetOrder(){
                this.total = 0;
                for(let i=0; i<this.fields.length; i++){
                    this.total +=  this.fields[i].total_price;
                }
                this.net_order_val = 0;
                this.net_order_val = this.total - (this.dis_val_per_unit);
            }
        }
    };

    var app = Vue.createApp(createOrder).mount("#orders-section");
</script>
@endsection
