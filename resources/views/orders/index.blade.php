<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Orders') }}
        </h2>
    </x-slot>
    <!--     Fonts and icons     -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
    <!-- Nucleo Icons -->
    <link href="DBoard/css/nucleo-icons.css" rel="stylesheet" />
    <link href="DBoard/css/nucleo-svg.css" rel="stylesheet" />
    <!-- Font Awesome Icons -->
    <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
    <link href="DBoard/css/nucleo-svg.css" rel="stylesheet" />
    <!-- CSS Files -->
    <link id="pagestyle" href="DBoard/css/soft-ui-dashboard.css?v=1.0.3" rel="stylesheet" />
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />
    <style>
        label{
            float: left;
        }
    </style>
    <div class="container-fluid py-12" id="orders-section">
        @if($message = Session::get('msg'))
            <div class="alert alert-success">
                {{$message}}
            </div>
        @endif
        <div class="contianer">
            <div class="login-contianer shadow-lg p-3 mb-5 bg-white rounded">
                <center>
                <div class="form-cc pull-left">
                    <div class="col-sm-12 col-md-5 col-offset-md-2" >
                        <x-guest-layout>
                            <x-jet-validation-errors class="mb-4" />
                            <form method="POST" action="{{ route('user.register') }}">
                                @csrf
                                <input type="hidden" name="user_side" />
                                <div class="mt-4">
                                    <x-jet-label for="crop_cultivated" value="{{ __('crop cultivated') }}" />
                                    <select required name="crop_cultivated" class="block mt-1 w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm">
                                        @foreach(\DB::table('crops')->get() as $crops)
                                            <option value="{{ $crops->name }}">{{ $crops->name }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="mt-4">
                                    <x-jet-label for="target_package" value="{{ __('Variety') }}" />
                                    <select required name="target_package" class="block mt-1 w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm">
                                        @foreach(\DB::table('varieties')->get() as $varieties)
                                            <option value="{{ $varieties->name }}">{{ $varieties->name }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="mt-4">
                                    <x-jet-label for="seed_quantity" value="{{ __('Seed Quantity') }}" />
                                    <x-jet-input id="seed_quantity" class="block mt-1 w-full" type="text" name="seed_quantity" v-model="seed_quantity" :value="old('seed_quantity')" required />
                                </div>

                                <div class="mt-4">
                                    <x-jet-label for="unit_price" value="{{ __('Unit Price (UGX)') }}" />
                                    <x-jet-input @keyup="findTotal" id="unit_price" class="block mt-1 w-full" type="text" name="unit_price" v-model="unit_price" :value="old('unit_price')" required />
                                </div>

                                <div class="mt-4">
                                    <x-jet-label for="total_price" value="{{ __('Total Price (UGX)') }}" />
                                    <x-jet-input id="total_price" class="block mt-1 w-full" type="text" name="total_price" v-model="total_price" :value="old('total_price')" required />
                                </div>

                                <div class="mt-4">
                                    <x-jet-label for="dis_val_per_unit" value="{{ __('Discounted Value Per Unit (UGX)') }}" />
                                    <x-jet-input @keyup="findNetOrder" id="dis_val_per_unit" class="block mt-1 w-full" type="text" name="dis_val_per_unit" v-model="dis_val_per_unit" :value="old('dis_val_per_unit')" required />
                                </div>

                                <div class="mt-4">
                                    <x-jet-label for="net_order_val" value="{{ __('Net Order Value (UGX)') }}" />
                                    <x-jet-input id="net_order_val" class="block mt-1 w-full" type="text" name="net_order_val" v-model="net_order_val" :value="old('net_order_val')" required />
                                </div>

                                <div class="mt-4">
                                    <x-jet-label for="total_net_saving_goal" value="{{ __('Total Net Saving Goal (UGX)') }}" />
                                    <x-jet-input id="total_net_saving_goal" class="block mt-1 w-full" type="text" name="total_net_saving_goal" :value="old('total_net_saving_goal')" required />
                                </div>

                                <div class="mt-4">
                                    <x-jet-label for="save_amount" value="{{ __('Target Saving Amount (UGX)') }}" />
                                    <x-jet-input id="save_amount" class="block mt-1 w-full" type="text" name="save_amount" :value="old('save_amount')" required />
                                </div>

                                <!-- <div class="mt-4">
                                    <x-jet-label for="prcnt_of_net_saving_goal" value="{{ __('% Of Net Saving Goal (UGX)') }}" />
                                    <x-jet-input id="prcnt_of_net_saving_goal" class="block mt-1 w-full" type="text" name="prcnt_of_net_saving_goal" :value="old('prcnt_of_net_saving_goal')" required />
                                </div>

                                <div class="mt-4">
                                    <x-jet-label for="period_of_package_delivery" value="{{ __('Period Of Package Delivery') }}" />
                                    <x-jet-input id="period_of_package_delivery" class="block mt-1 w-full" type="text" name="period_of_package_delivery" :value="old('period_of_package_delivery')" required />
                                </div> -->

                                @if (Laravel\Jetstream\Jetstream::hasTermsAndPrivacyPolicyFeature())
                                    <div class="mt-4">
                                        <x-jet-label for="terms">
                                            <div class="flex items-center">
                                                <x-jet-checkbox name="terms" id="terms"/>

                                                <div class="ml-2">
                                                    {!! __('I agree to the :terms_of_service and :privacy_policy', [
                                                            'terms_of_service' => '<a target="_blank" href="'.route('terms.show').'" class="underline text-sm text-gray-600 hover:text-gray-900">'.__('Terms of Service').'</a>',
                                                            'privacy_policy' => '<a target="_blank" href="'.route('policy.show').'" class="underline text-sm text-gray-600 hover:text-gray-900">'.__('Privacy Policy').'</a>',
                                                    ]) !!}
                                                </div>
                                            </div>
                                        </x-jet-label>
                                    </div>
                                @endif

                                <div class="flex items-center justify-end mt-4">
                                <a style="margin-right: 140px;" href="{{url('index')}}" title="homelink">Return Home</a>

                                    <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('login') }}">
                                        {{ __('Already registered?') }}
                                    </a>

                                    <x-jet-button class="ml-4">
                                        {{ __('Register') }}
                                    </x-jet-button>
                                </div>
                            </form>
                        </x-guest-layout>
                    </div>
                </div>
                </center>
            </div>
        </div>

        <footer class="footer pt-3  ">
            <div class="container-fluid">
            <div class="row align-items-center justify-content-lg-between">
                <div class="col-lg-6 mb-lg-0 mb-4">
                <div class="copyright text-center text-sm text-muted text-lg-start">
                    © <script>
                    document.write(new Date().getFullYear())
                    </script>

                </div>
                </div>
            </div>
            </div>
        </footer>

        <!--   Core JS Files   -->
        <script src="../DBoard/js/core/popper.min.js"></script>
        <script src="../DBoard/js/core/bootstrap.min.js"></script>
        <script src="../DBoard/js/plugins/perfect-scrollbar.min.js"></script>
        <script src="../DBoard/js/plugins/smooth-scrollbar.min.js"></script>
        <script src="../DBoard/js/plugins/chartjs.min.js"></script>

    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

    <script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
    <script src="https://unpkg.com/vue@3.2.4/dist/vue.global.js"></script>
    <script type="text/javascript">
        const createOrder = {
            data () {
                return {
                    seed_quantity: "",
                    unit_price: "",
                    total_price: "",
                    dis_val_per_unit: "",
                    net_order_val: "",
                };
            },
            methods: {
                findTotal () {
                    this.total_price = this.seed_quantity * this.unit_price;

                    if(this.dis_val_per_unit!='')
                        this.net_order_val = this.total_price - (this.dis_val_per_unit);
                },
                findNetOrder(){
                    this.net_order_val = this.total_price - (this.dis_val_per_unit);
                }
            }
        };

        var app = Vue.createApp(createOrder).mount("#orders-section");
    </script>

</x-app-layout>
