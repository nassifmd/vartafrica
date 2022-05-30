@extends("admin.layouts.app", ['loadVUE' => true, 'loadAxios' => true])
@section("title", "Reports")

@section("css")
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />
<style type="text/css">
    .select2-container {
        width: 100% !important;
    }
</style>
@endsection

@section("content")
<div class="container-fluid py-4" id="reports-section">

<ul class="nav nav-tabs" id="myTab" role="tablist">
    @if(\Auth::user()->type=='Agent')
        <li class="nav-item" role="presentation">
            <button class="nav-link active" id="used-cards-tab" data-bs-toggle="tab" data-bs-target="#used-cards" type="button" role="tab" aria-controls="Used Cards" aria-selected="false">Used Cards</button>
        </li>
        <li class="nav-item" role="presentation">
            <button class="nav-link" id="farmer-order-tab" data-bs-toggle="tab" data-bs-target="#farmer-order" type="button" role="tab" aria-controls="Farmers Orders" aria-selected="false">Farmers Orders</button>
        </li>
        <li class="nav-item" role="presentation">
            <button class="nav-link" id="farmer-balance-tab" data-bs-toggle="tab" data-bs-target="#farmer-balance" type="button" role="tab" aria-controls="Farmers Balances" aria-selected="true">Farmers Orders/Balance</button>
        </li>
    @elseif(\Auth::user()->type=='Admin-1')
        <li class="nav-item" role="presentation">
            <button class="nav-link active" id="active-cards-tab" data-bs-toggle="tab" data-bs-target="#active-cards" type="button" role="tab" aria-controls="Active Cards" aria-selected="true">Active Cards</button>
        </li>
        <li class="nav-item" role="presentation">
            <button class="nav-link" id="used-cards-tab" data-bs-toggle="tab" data-bs-target="#used-cards" type="button" role="tab" aria-controls="Used Cards" aria-selected="false">Used Cards</button>
        </li>
        <li class="nav-item" role="presentation">
            <button class="nav-link" id="agent-tab" data-bs-toggle="tab" data-bs-target="#agent" type="button" role="tab" aria-controls="Agents" aria-selected="false">Agents</button>
        </li>
        <li class="nav-item" role="presentation">
            <button class="nav-link" id="farmer-tab" data-bs-toggle="tab" data-bs-target="#farmer" type="button" role="tab" aria-controls="Farmers" aria-selected="false">Farmers</button>
        </li>
        <li class="nav-item" role="presentation">
            <button class="nav-link" id="farmer-order-tab" data-bs-toggle="tab" data-bs-target="#farmer-order" type="button" role="tab" aria-controls="Farmers Orders" aria-selected="false">Farmers Orders</button>
        </li>
        <li class="nav-item" role="presentation">
            <button class="nav-link" id="deductions-tab" data-bs-toggle="tab" data-bs-target="#deductions" type="button" role="tab" aria-controls="Deductions" aria-selected="false">Deductions</button>
        </li>
    @elseif(\Auth::user()->type=='Admin-2')
    {{-- <li class="nav-item" role="presentation">
        <button class="nav-link active" id="active-cards-tab" data-bs-toggle="tab" data-bs-target="#active-cards" type="button" role="tab" aria-controls="Active Cards" aria-selected="true">Active Cards</button>
    </li> --}}
    <li class="nav-item" role="presentation">
        <button class="nav-link" id="farmer-order-tab" data-bs-toggle="tab" data-bs-target="#farmer-order" type="button" role="tab" aria-controls="Farmers Orders" aria-selected="false">Farmers Orders</button>
    </li>
    <li class="nav-item" role="presentation">
        <button class="nav-link" id="used-cards-tab" data-bs-toggle="tab" data-bs-target="#used-cards" type="button" role="tab" aria-controls="Used Cards" aria-selected="false">Used Cards</button>
    </li>
    <li class="nav-item" role="presentation">
        <button class="nav-link" id="agent-tab" data-bs-toggle="tab" data-bs-target="#agent" type="button" role="tab" aria-controls="Agents" aria-selected="false">Agents</button>
    </li>
    <li class="nav-item" role="presentation">
        <button class="nav-link" id="farmer-tab" data-bs-toggle="tab" data-bs-target="#farmer" type="button" role="tab" aria-controls="Farmers" aria-selected="false">Farmers</button>
    </li>
    <li class="nav-item" role="presentation">
        <button class="nav-link" id="deductions-tab" data-bs-toggle="tab" data-bs-target="#deductions" type="button" role="tab" aria-controls="Deductions" aria-selected="false">Deductions</button>
    </li>
@endif
    {{-- <li class="nav-item" role="presentation">
        <button class="nav-link" id="debits-tab" data-bs-toggle="tab" data-bs-target="#debits" type="button" role="tab" aria-controls="Debits" aria-selected="false">Debits</button>
    </li>

    <li class="nav-item" role="presentation">
        <button class="nav-link" id="user-balance-tab" data-bs-toggle="tab" data-bs-target="#user-balance" type="button" role="tab" aria-controls="User balance" aria-selected="false">User Balance</button>
    </li>

    <li class="nav-item" role="presentation">
        <button class="nav-link" id="user-profile-tab" data-bs-toggle="tab" data-bs-target="#user-profile" type="button" role="tab" aria-controls="User profile" aria-selected="false">User Profile</button>
    </li> --}}

</ul>

<div class="tab-content" id="myTabContent">

    @if(\Auth::user()->type=='Agent')
        <div class="tab-pane fade show active" id="used-cards" role="tabpanel" aria-labelledby="used-cards-tab">
            @include("admin.reports.forms.cards.used")
        </div>
        <div class="tab-pane fade" id="farmer-order" role="tabpanel" aria-labelledby="farmer-tab">
            @include("admin.reports.forms.farmer_orders")
        </div>
        <div class="tab-pane fade" id="farmer-balance" role="tabpanel" aria-labelledby="farmer-tab">
            @include("admin.reports.forms.farmer_balance")
        </div>
    @elseif(\Auth::user()->type=='Admin-1')
    <div class="tab-pane fade show active" id="active-cards" role="tabpanel" aria-labelledby="active-cards-tab">
            @include("admin.reports.forms.cards.active")
    </div>

    <div class="tab-pane fade" id="used-cards" role="tabpanel" aria-labelledby="used-cards-tab">
            @include("admin.reports.forms.cards.used")
    </div>

    <div class="tab-pane fade" id="debits" role="tabpanel" aria-labelledby="debits-tab">
            @include("admin.reports.forms.debits")
    </div>

    <div class="tab-pane fade" id="user-balance" role="tabpanel" aria-labelledby="user-balance-tab">
            @include("admin.reports.forms.user_balance")
    </div>

    <div class="tab-pane fade" id="user-profile" role="tabpanel" aria-labelledby="user-profile-tab">
            @include("admin.reports.forms.user_profile")
    </div>

    <div class="tab-pane fade" id="agent" role="tabpanel" aria-labelledby="agent-tab">
        @include("admin.reports.forms.agents")
    </div>

    <div class="tab-pane fade" id="farmer" role="tabpanel" aria-labelledby="farmer-tab">
        @include("admin.reports.forms.farmers")
    </div>

    <div class="tab-pane fade" id="farmer-order" role="tabpanel" aria-labelledby="farmer-tab">
        @include("admin.reports.forms.farmer_orders")
    </div>

    <div class="tab-pane fade" id="farmer-balance" role="tabpanel" aria-labelledby="farmer-tab">
        @include("admin.reports.forms.farmer_balance")
    </div>

    <div class="tab-pane fade" id="deductions" role="tabpanel" aria-labelledby="deductions-tab">
        @include("admin.reports.forms.deductions")
    </div>

    @elseif(\Auth::user()->type=='Admin-2')
    <div class="tab-pane fade show active" id="active-cards" role="tabpanel" aria-labelledby="active-cards-tab">
            @include("admin.reports.forms.cards.active")
    </div>
    <div class="tab-pane fade" id="used-cards" role="tabpanel" aria-labelledby="used-cards-tab">
            @include("admin.reports.forms.cards.used")
    </div>

    <div class="tab-pane fade" id="debits" role="tabpanel" aria-labelledby="debits-tab">
            @include("admin.reports.forms.debits")
    </div>

    <div class="tab-pane fade" id="user-balance" role="tabpanel" aria-labelledby="user-balance-tab">
            @include("admin.reports.forms.user_balance")
    </div>

    <div class="tab-pane fade" id="user-profile" role="tabpanel" aria-labelledby="user-profile-tab">
            @include("admin.reports.forms.user_profile")
    </div>

    <div class="tab-pane fade" id="agent" role="tabpanel" aria-labelledby="agent-tab">
        @include("admin.reports.forms.agents")
    </div>

    <div class="tab-pane fade" id="farmer" role="tabpanel" aria-labelledby="farmer-tab">
        @include("admin.reports.forms.farmers")
    </div>

    <div class="tab-pane fade" id="farmer-order" role="tabpanel" aria-labelledby="farmer-tab">
        @include("admin.reports.forms.farmer_orders")
    </div>

    <div class="tab-pane fade" id="farmer-balance" role="tabpanel" aria-labelledby="farmer-tab">
        @include("admin.reports.forms.farmer_balance")
    </div>

    <div class="tab-pane fade" id="deductions" role="tabpanel" aria-labelledby="deductions-tab">
        @include("admin.reports.forms.deductions")
    </div>
    @endif
</div>
@endsection

@section("js")
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>

 <script type="text/javascript">
    const reportsSection = {
        data () {
            return {
                cards: {
                    active: {
                        start_date: '',
                        end_date: '',
                        custom_amount_operator: '=',
                        custom_amount: '',
                        created_by: 'all',
                        custom_dates: false,
                        amount: 'all',
                        dates: ''
                    },
                    used: {
                        start_date: '',
                        end_date: '',
                        user_id: 'all',
                        custom_amount_operator: '=',
                        custom_amount: '',
                        created_by: 'all',
                        custom_dates: false,
                        amount: 'all',
                        dates: ''
                    }
                },
                debits: {
                        start_date: '',
                        end_date: '',
                        user_id: 'all',
                        custom_amount_operator: '=',
                        custom_amount: '',
                        created_by: 'all',
                        custom_dates: false,
                        amount: 'all',
                        dates: ''
                    },
                user_balance: {
                        user_id: 'all',
                        custom_amount_operator: '=',
                        custom_amount: '',
                        amount: 'all',
                        order_column: 'balance',
                        order_type: 'ASC'
                    },
                    user_profile: {
                        user_id: 'all',
                        custom_amount_operator: '=',
                        custom_amount: '',
                        amount: 'all',
                        order_column: 'balance',
                        order_type: 'ASC'
                    },
                users: [],
                agents: []
            };
        },
        mounted () {
           let that = this;
           $('.active-cards-admin-list, .used-cards-admin-list, .used-cards-users-list, .debits-admin-list, .debits-users-list, .user_profile-users-list').select2();
           $('.active-cards-admin-list').on('select2:select', function (e) {
              that.cards.active.created_by = e.params.data.id;
           });
           $('.used-cards-admin-list').on('select2:select', function (e) {
              that.cards.used.created_by = e.params.data.id;
           });
           $('.used-cards-users-list').on('select2:select', function (e) {
              that.cards.used.user_id = e.params.data.id;
           });
           $('.debits-admin-list').on('select2:select', function (e) {
              that.debits.created_by = e.params.data.id;
           });
           $('.debits-users-list').on('select2:select', function (e) {
              that.debits.user_id = e.params.data.id;
           });
           $('.user_balance-users-list').on('select2:select', function (e) {
              that.user_balance.user_id = e.params.data.id;
           });
           $('.user_profile-users-list').on('select2:select', function (e) {
              that.user_profile.user_id = e.params.data.id;
           });
            axios.get('{{ route("admin.user_debits.get_users") }}')
                .then((response) => this.users = response.data)
                .catch((error) => console.log(error.message));

            axios.get('{{ route("admin.user_debits.get_agents") }}')
                .then((response) => this.agents = response.data)
                .catch((error) => console.log(error.message));
        },
        methods: {
           initiateDatePicker (id) {
                let that = this;
                if(id == "active" && this.cards.active.custom_dates){
                   $(function() {
                      $('#active-dates').daterangepicker({
                        opens: 'left'
                      }, function(start, end, label) {
                        that.cards.active.start_date = start.format('YYYY-MM-DD');
                        that.cards.active.end_date = end.format('YYYY-MM-DD');
                      });
                    });
                } else if(id == "used" && this.cards.used.custom_dates){
                   $(function() {
                      $('#used-dates').daterangepicker({
                        opens: 'left'
                      }, function(start, end, label) {
                        that.cards.used.start_date = start.format('YYYY-MM-DD');
                        that.cards.used.end_date = end.format('YYYY-MM-DD');
                      });
                    });
                } else if(id == "debits" && this.debits.custom_dates){
                   $(function() {
                      $('#debits-dates').daterangepicker({
                        opens: 'left'
                      }, function(start, end, label) {
                        that.debits.start_date = start.format('YYYY-MM-DD');
                        that.debits.end_date = end.format('YYYY-MM-DD');
                      });
                    });
                }
           }
        }
    };
    var app = Vue.createApp(reportsSection).mount("#reports-section");
</script>
@endsection
