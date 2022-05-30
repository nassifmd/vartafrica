@extends("admin.layouts.app")
@section("title", "Dashboard")
@section("content")
    <div class="container-fluid py-4">
      <div class="row">
        <div class="card my-4">
            <div class="card-body p-3">
              <form method="get" action="{{ route('admin.dashboard') }}">
                <div class="row my-2">
                  <div class="col-xl-6 col-sm-6 mb-xl-0 mb-4">
                    <input type="date" class="form-control" name="from" id="from" Placeholder="From Date" required>
                  </div>
                  <div class="col-xl-6 col-sm-6 mb-xl-0 mb-4">
                    <input type="date" class="form-control" name="to" id="to" Placeholder="To Date" required>
                  </div>
                </div>
                <input type="submit" class="btn btn-primary">
              </form>
            </div>
        </div>
        <?php if(Auth::user()->type=='Admin-1'): ?>
        <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
          <div class="card">
            <div class="card-body p-3">
              <div class="row">
                <div class="col-8">
                  <div class="numbers">
                    <p class="text-sm mb-0 text-capitalize font-weight-bold">Farmers Balance</p>
                    <h5 class="font-weight-bolder mb-0">
                      @if (request()->has("from") && request()->has("to"))
                        UGX{{ number_format(App\Models\User::whereBetween('created_at', [request()->from, request()->to])->sum('balance')) }}
                      @else
                        UGX{{ number_format(App\Models\User::sum('balance')) }}
                      @endif
                    </h5>
                  </div>
                </div>
                <div class="col-4 text-end">
                  <div class="icon icon-shape bg-gradient-primary shadow text-center border-radius-md">
                    <i class="ni ni-money-coins text-lg opacity-10" aria-hidden="true"></i>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
          <div class="card">
            <div class="card-body p-3">
              <div class="row">
                <div class="col-8">
                  <div class="numbers">
                    <p class="text-sm mb-0 text-capitalize font-weight-bold">Active Cards</p>
                    <h5 class="font-weight-bolder mb-0">
                    @if (request()->has("from") && request()->has("to"))
                      UGX{{ number_format(App\Models\Card::whereBetween('created_at', [request()->from, request()->to])->where("is_used", false)->sum('amount')) }}
                      ({{ number_format(App\Models\Card::whereBetween('created_at', [request()->from, request()->to])->where("is_used", false)->count()) }})
                    @else
                      UGX{{ number_format(App\Models\Card::where("is_used", false)->sum('amount')) }}
                      ({{ number_format(App\Models\Card::where("is_used", false)->count()) }})
                    @endif
                    </h5>
                  </div>
                </div>
                <div class="col-4 text-end">
                  <div class="icon icon-shape bg-gradient-primary shadow text-center border-radius-md">
                    <i class="ni ni-money-coins text-lg opacity-10" aria-hidden="true"></i>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
          <div class="card">
            <div class="card-body p-3">
              <div class="row">
                <div class="col-8">
                  <div class="numbers">
                    <p class="text-sm mb-0 text-capitalize font-weight-bold">Used Cards</p>
                    <h5 class="font-weight-bolder mb-0">
                    @if (request()->has("from") && request()->has("to"))
                      UGX{{ number_format(App\Models\Card::whereBetween('created_at', [request()->from, request()->to])->where("is_used", true)->sum('amount')) }} ({{ number_format(App\Models\Card::whereBetween('created_at', [request()->from, request()->to])->where("is_used", true)->count()) }})
                    @else
                      UGX{{ number_format(App\Models\Card::where("is_used", true)->sum('amount')) }} ({{ number_format(App\Models\Card::where("is_used", true)->count()) }})
                    @endif
                    </h5>
                  </div>
                </div>
                <div class="col-4 text-end">
                  <div class="icon icon-shape bg-gradient-primary shadow text-center border-radius-md">
                    <i class="ni ni-world text-lg opacity-10" aria-hidden="true"></i>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
          <div class="card">
            <div class="card-body p-3">
              <div class="row">
                <div class="col-8">
                  <div class="numbers">
                    <p class="text-sm mb-0 text-capitalize font-weight-bold">Farmers</p>
                    <h5 class="font-weight-bolder mb-0">
                    @if (request()->has("from") && request()->has("to"))
                      +{{ App\Models\User::whereBetween('created_at', [request()->from, request()->to])->count() }}
                    @else
                      +{{ App\Models\User::count() }}
                    @endif
                    </h5>
                  </div>
                </div>
                <div class="col-4 text-end">
                  <div class="icon icon-shape bg-gradient-primary shadow text-center border-radius-md">
                    <i class="ni ni-paper-diploma text-lg opacity-10" aria-hidden="true"></i>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div> -->
        <div class="col-xl-3 col-sm-6 mt-3">
            <div class="card">
            <div class="card-body p-3">
                <div class="row">
                <div class="col-8">
                    <div class="numbers">
                    <p class="text-sm mb-0 text-capitalize font-weight-bold">Admins</p>
                    <h5 class="font-weight-bolder mb-0">
                    @if (request()->has("from") && request()->has("to"))
                      {{ App\Models\Admin::whereBetween('created_at', [request()->from, request()->to])->where('type', 'Admin-2')->count() }}
                    @else
                      {{ App\Models\Admin::where('type', 'Admin-2')->count() }}
                    @endif
                    </h5>
                    </div>
                </div>
                <div class="col-4 text-end">
                    <div class="icon icon-shape bg-gradient-primary shadow text-center border-radius-md">
                    <i class="ni ni-cart text-lg opacity-10" aria-hidden="true"></i>
                    </div>
                </div>
                </div>
            </div>
            </div>
        </div>
        <div class="col-xl-3 col-sm-6 mt-3">
            <div class="card">
            <div class="card-body p-3">
                <div class="row">
                <div class="col-8">
                    <div class="numbers">
                    <p class="text-sm mb-0 text-capitalize font-weight-bold">Agents</p>
                    <h5 class="font-weight-bolder mb-0">
                    @if (request()->has("from") && request()->has("to"))
                      {{ App\Models\Admin::whereBetween('created_at', [request()->from, request()->to])->where('type', 'Agent')->count() }}
                    @else
                      +{{ App\Models\Admin::where('type', 'Agent')->count() }}
                    @endif
                    </h5>
                    </div>
                </div>
                <div class="col-4 text-end">
                    <div class="icon icon-shape bg-gradient-primary shadow text-center border-radius-md">
                    <i class="ni ni-cart text-lg opacity-10" aria-hidden="true"></i>
                    </div>
                </div>
                </div>
            </div>
            </div>
        </div>
        <div class="col-xl-3 col-sm-6 mt-3">
            <div class="card">
            <div class="card-body p-3">
                <div class="row">
                <div class="col-8">
                    <div class="numbers">
                    <p class="text-sm mb-0 text-capitalize font-weight-bold">Farmers</p>
                    <h5 class="font-weight-bolder mb-0">
                    @if (request()->has("from") && request()->has("to"))
                      {{ App\Models\User::whereBetween('created_at', [request()->from, request()->to])->count() }}
                    @else
                      +{{ App\Models\User::count() }}
                    @endif
                    </h5>
                    </div>
                </div>
                <div class="col-4 text-end">
                    <div class="icon icon-shape bg-gradient-primary shadow text-center border-radius-md">
                    <i class="ni ni-cart text-lg opacity-10" aria-hidden="true"></i>
                    </div>
                </div>
                </div>
            </div>
            </div>
        </div>
        <div class="col-xl-3 col-sm-6 mt-3">
          <div class="card">
            <div class="card-body p-3">
              <div class="row">
                <div class="col-8">
                  <div class="numbers">
                    <p class="text-sm mb-0 text-capitalize font-weight-bold">Deductions</p>
                    <h5 class="font-weight-bolder mb-0">
                    @if (request()->has("from") && request()->has("to"))
                      UGX{{ number_format(App\Models\UserDebit::whereBetween('created_at', [request()->from, request()->to])->sum('amount')) }}
                    @else
                      UGX{{ number_format(App\Models\UserDebit::sum('amount')) }}
                    @endif
                    </h5>
                  </div>
                </div>
                <div class="col-4 text-end">
                  <div class="icon icon-shape bg-gradient-primary shadow text-center border-radius-md">
                    <i class="ni ni-cart text-lg opacity-10" aria-hidden="true"></i>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="row my-4">
            <div class="col-lg-12 col-md-12 mb-md-0 mb-4">
              <div class="card">
                <div class="card-header pb-0">
                  <div class="row">
                    <div class="col-lg-6 col-7">
                      <h6>Last 10 Scratched Cards</h6>
                    </div>

                  </div>
                </div>
                <div class="card-body px-0 pb-2">
                  <div class="table-responsive">
                    <table class="table align-items-center mb-0">
                      <thead>
                        <tr>
                          <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">User ID</th>
                          <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Name</th>
                          <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Serial</th>
                          <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Date</th>
                          <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Amount</th>
                        </tr>
                      </thead>
                      <tbody>
                        @php
                          if (request()->has("from") && request()->has("to"))
                            $cards = App\Models\Card::select("users.name as used_by", "users.id", "cards.amount", "cards.used_at", "cards.serial")->whereBetween('cards.created_at', [request()->from, request()->to])->where("cards.is_used", true)->leftJoin("users", "users.id", "cards.used_by")->orderBy("cards.used_at", "DESC")->take(10)->get();
                          else
                            $cards = App\Models\Card::select("users.name as used_by", "users.id", "cards.amount", "cards.used_at", "cards.serial")->where("cards.is_used", true)->leftJoin("users", "users.id", "cards.used_by")->orderBy("cards.used_at", "DESC")->take(10)->get();
                        @endphp
                        @foreach($cards as $card)
                        <tr>
                          <td>
                            <div class="d-flex px-2 py-1">

                              <div class="d-flex flex-column justify-content-center">
                                <h6 class="mb-0 text-sm">{{ $card->id }}</h6>
                              </div>
                            </div>
                          </td>
                          <td>
                            <div class="avatar-group mt-2">
                              <a>{{ $card->used_by }}</a>
                            </div>
                          </td>
                          <td>
                            <div class="avatar-group mt-2">
                              <a>{{ implode("-", str_split($card->serial, 4)) }}</a>
                            </div>
                          </td>
                          <td class="align-middle text-center text-sm">
                            <span class="text-xs font-weight-bold"> {{ $card->used_at }} </span>
                          </td>
                          <td class="align-middle text-center text-sm">
                            <span class="text-xs font-weight-bold"> UGX{{ number_format($card->amount) }} </span>
                          </td>
                        </tr>
                        @endforeach
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
        </div>
        <div class="row my-4">
            <div class="col-lg-12 col-md-12 mb-md-0 mb-4">
                <div class="card">
                <div class="card-header pb-0">
                    <div class="row">
                    <div class="col-lg-6 col-7">
                        <h6>Last 10 Debits</h6>
                    </div>

                    </div>
                </div>
                <div class="card-body px-0 pb-2">
                    <div class="table-responsive">
                    <table class="table align-items-center mb-0">
                        <thead>
                        <tr>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">User ID</th>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Name</th>
                            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Date</th>
                            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Amount</th>
                            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Created By</th>
                        </tr>
                        </thead>
                        <tbody>
                        @php
                          if (request()->has("from") && request()->has("to"))
                            $debits = App\Models\UserDebit::select("users.name as username", "admins.name as created_by", "users.id", "user_debits.amount", "user_debits.created_at")->leftJoin("users", "users.id", "user_debits.user_id")->leftJoin("admins", "admins.id", "user_debits.admin_id")->whereBetween('users.created_at', [request()->from, request()->to])->orderBy("user_debits.created_at", "DESC")->take(10)->get();
                          else
                            $debits = App\Models\UserDebit::select("users.name as username", "admins.name as created_by", "users.id", "user_debits.amount", "user_debits.created_at")->leftJoin("users", "users.id", "user_debits.user_id")->leftJoin("admins", "admins.id", "user_debits.admin_id")->orderBy("user_debits.created_at", "DESC")->take(10)->get();
                        @endphp
                        @foreach($debits as $debit)
                        <tr>
                            <td>
                            <div class="d-flex px-2 py-1">

                                <div class="d-flex flex-column justify-content-center">
                                <h6 class="mb-0 text-sm">{{ $debit->id }}</h6>
                                </div>
                            </div>
                            </td>
                            <td>
                            <div class="avatar-group mt-2">
                                <a>{{ $debit->username }}</a>
                            </div>
                            </td>
                            <td>
                            <div class="avatar-group mt-2">
                                <a>{{ $debit->created_at }}</a>
                            </div>
                            </td>
                            <td class="align-middle text-center text-sm">
                            <span class="text-xs font-weight-bold"> UGX{{ number_format($debit->amount) }} </span>
                            </td>
                            <td class="align-middle text-center text-sm">
                            <span class="text-xs font-weight-bold"> {{ $debit->created_by }} </span>
                            </td>
                        </tr>
                        @endforeach
                        </tbody>
                    </table>
                    </div>
                </div>
                </div>
            </div>
        </div>
        <?php endif ?>

        <?php if(Auth::user()->type=='Admin-2'): ?>
        <div class="col-xl-3 col-sm-6 mt-3">
            <div class="card">
            <div class="card-body p-3">
                <div class="row">
                <div class="col-8">
                    <div class="numbers">
                    <p class="text-sm mb-0 text-capitalize font-weight-bold">Agents</p>
                    <h5 class="font-weight-bolder mb-0">
                        {{ count($agents) }}
                    </h5>
                    </div>
                </div>
                <div class="col-4 text-end">
                    <div class="icon icon-shape bg-gradient-primary shadow text-center border-radius-md">
                    <i class="ni ni-cart text-lg opacity-10" aria-hidden="true"></i>
                    </div>
                </div>
                </div>
            </div>
            </div>
        </div>
        <div class="col-xl-3 col-sm-6 mt-3">
            <div class="card">
            <div class="card-body p-3">
                <div class="row">
                <div class="col-8">
                    <div class="numbers">
                    <p class="text-sm mb-0 text-capitalize font-weight-bold">Farmers</p>
                    <h5 class="font-weight-bolder mb-0">
                        {{ $farmers[0]->farmers }}
                    </h5>
                    </div>
                </div>
                <div class="col-4 text-end">
                    <div class="icon icon-shape bg-gradient-primary shadow text-center border-radius-md">
                    <i class="ni ni-cart text-lg opacity-10" aria-hidden="true"></i>
                    </div>
                </div>
                </div>
            </div>
            </div>
        </div>
        <div class="col-xl-3 col-sm-6 mt-3">
            <div class="card">
            <div class="card-body p-3">
                <div class="row">
                <div class="col-8">
                    <div class="numbers">
                    <p class="text-sm mb-0 text-capitalize font-weight-bold">Balance</p>
                    <h5 class="font-weight-bolder mb-0">
                            UGX{{ $farmers[0]->balance ?? 0 }}
                    </h5>
                    </div>
                </div>
                <div class="col-4 text-end">
                    <div class="icon icon-shape bg-gradient-primary shadow text-center border-radius-md">
                    <i class="ni ni-cart text-lg opacity-10" aria-hidden="true"></i>
                    </div>
                </div>
                </div>
            </div>
            </div>
        </div>
        <div class="col-xl-3 col-sm-6 mt-3">
            <div class="card">
            <div class="card-body p-3">
                <div class="row">
                <div class="col-8">
                    <div class="numbers">
                    <p class="text-sm mb-0 text-capitalize font-weight-bold">Deductions</p>
                    <h5 class="font-weight-bolder mb-0">
                        @if($debits->isNotEmpty())
                           UGX{{ $debits[0]->deduction }}
                        @else
                        UGX0
                        @endif
                    </h5>
                    </div>
                </div>
                <div class="col-4 text-end">
                    <div class="icon icon-shape bg-gradient-primary shadow text-center border-radius-md">
                    <i class="ni ni-cart text-lg opacity-10" aria-hidden="true"></i>
                    </div>
                </div>
                </div>
            </div>
            </div>
        </div>
        <?php endif ?>
        <?php if(Auth::user()->type=='Agent'): ?>
        <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
            <div class="card">
              <div class="card-body p-3">
                <div class="row">
                  <div class="col-8">
                    <div class="numbers">
                      <p class="text-sm mb-0 text-capitalize font-weight-bold">Registered Farmers</p>
                      <h5 class="font-weight-bolder mb-0">
                        @if (request()->has("from") && request()->has("to"))
                        {{ number_format(App\Models\User::whereBetween('created_at', [request()->from, request()->to])->where('admin_id', \Auth::user()->id)->count('id')) }}
                      @else
                        {{ number_format(App\Models\User::where('admin_id', \Auth::user()->id)->count('id')) }}
                      @endif
                      </h5>
                    </div>
                  </div>
                  <div class="col-4 text-end">
                    <div class="icon icon-shape bg-gradient-primary shadow text-center border-radius-md">
                      <i class="ni ni-money-coins text-lg opacity-10" aria-hidden="true"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>
        </div>
        <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
            <div class="card">
              <div class="card-body p-3">
                <div class="row">
                  <div class="col-8">
                    <div class="numbers">
                      <p class="text-sm mb-0 text-capitalize font-weight-bold">Quantity Of Orders</p>
                      <h5 class="font-weight-bolder mb-0">
                        @if (request()->has("from") && request()->has("to"))
                            {{ number_format(App\Models\Order::whereBetween('created_at', [request()->from, request()->to])->where('admin_id', \Auth::user()->id)->count('id')) }}
                        @else
                            {{ number_format(App\Models\Order::where('admin_id', \Auth::user()->id)->count('id')) }}
                        @endif
                      </h5>
                    </div>
                  </div>
                  <div class="col-4 text-end">
                    <div class="icon icon-shape bg-gradient-primary shadow text-center border-radius-md">
                      <i class="ni ni-money-coins text-lg opacity-10" aria-hidden="true"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>
        </div>
        <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
            <div class="card">
              <div class="card-body p-3">
                <div class="row">
                  <div class="col-8">
                    <div class="numbers">
                      <p class="text-sm mb-0 text-capitalize font-weight-bold">Total Net Order Savings</p>
                      <h5 class="font-weight-bolder mb-0">
                        @if (request()->has("from") && request()->has("to"))
                            UGX{{ number_format(App\Models\Order::whereBetween('created_at', [request()->from, request()->to])->where('admin_id', \Auth::user()->id)->sum('net_order_value')) }}
                        @else
                        UGX{{ number_format(App\Models\Order::where('admin_id', \Auth::user()->id)->sum('net_order_value')) }}
                        @endif
                      </h5>
                    </div>
                  </div>
                  <div class="col-4 text-end">
                    <div class="icon icon-shape bg-gradient-primary shadow text-center border-radius-md">
                      <i class="ni ni-money-coins text-lg opacity-10" aria-hidden="true"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>
        </div>
        <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
            <div class="card">
              <div class="card-body p-3">
                <div class="row">
                  <div class="col-8">
                    <div class="numbers">
                      <p class="text-sm mb-0 text-capitalize font-weight-bold">Total Net Savings Goal</p>
                      <h5 class="font-weight-bolder mb-0">
                        @if (request()->has("from") && request()->has("to"))
                            UGX{{ number_format(App\Models\Order::whereBetween('created_at', [request()->from, request()->to])->where('admin_id', \Auth::user()->id)->sum('total_net_saving_goal')) }}
                        @else
                        UGX{{ number_format(App\Models\Order::where('admin_id', \Auth::user()->id)->sum('total_net_saving_goal')) }}
                        @endif
                      </h5>
                    </div>
                  </div>
                  <div class="col-4 text-end">
                    <div class="icon icon-shape bg-gradient-primary shadow text-center border-radius-md">
                      <i class="ni ni-money-coins text-lg opacity-10" aria-hidden="true"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>
        </div>
        <div class="row my-4">
            <div class="col-lg-12 col-md-12 mb-md-0 mb-4">
              <div class="card">
                <div class="card-header pb-0">
                  <div class="row">
                    <div class="col-lg-6 col-7">
                      <h6>Farmer's Orders</h6>
                    </div>

                  </div>
                </div>
                <div class="card-body px-0 pb-2">
                  <div class="table-responsive">
                    <table class="table align-items-center mb-0">
                      <thead>
                        <tr>
                          <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">User ID</th>
                          <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Name</th>
                          <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Mobile Number</th>
                          <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Crop Cultivated</th>
                          <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Variety</th>
                          <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Quantity Ordered</th>
                          <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Unit Price</th>
                          <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Total Price</th>
                          <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Discount Value Per Unit</th>
                          <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Net Ordered Vaue</th>
                        </tr>
                      </thead>
                      <tbody>
                        @php
                            if (request()->has("from") && request()->has("to"))
                                $orders = App\Models\User::select("users.id", "users.name as username", "users.contact", "orders.crop_cultivated", "orders.variety", "orders.quantity_ordered", "orders.unit_price", "orders.total_price", "orders.disc_value_per_unit", "orders.net_order_value")->leftJoin("orders", "users.id", "orders.user_id")->orderBy("users.id", "DESC")->take(10)->where('users.admin_id', \Auth::user()->id)->whereBetween('users.created_at', [request()->from, request()->to])->get();
                            else
                                $orders = App\Models\User::select("users.id", "users.name as username", "users.contact", "orders.crop_cultivated", "orders.variety", "orders.quantity_ordered", "orders.unit_price", "orders.total_price", "orders.disc_value_per_unit", "orders.net_order_value")->leftJoin("orders", "users.id", "orders.user_id")->orderBy("users.id", "DESC")->take(10)->where('users.admin_id', \Auth::user()->id)->get();
                        @endphp
                        @foreach($orders as $order)
                        <tr>
                          <td>
                            <div class="d-flex px-2 py-1">

                              <div class="d-flex flex-column justify-content-center">
                                <h6 class="mb-0 text-sm">{{ $order->id }}</h6>
                              </div>
                            </div>
                          </td>
                          <td>
                            <div class="avatar-group mt-2">
                              <a>{{ $order->username }}</a>
                            </div>
                          </td>
                          <td>
                            <div class="avatar-group mt-2">
                              <a>{{ $order->contact }}</a>
                            </div>
                          </td>
                          <td>
                            <div class="avatar-group mt-2">
                              <a>{{ $order->crop_cultivated }}</a>
                            </div>
                          </td>
                          <td>
                            <div class="avatar-group mt-2">
                              <a>{{ $order->variety }}</a>
                            </div>
                          </td>
                          <td>
                            <div class="avatar-group mt-2">
                              <a>{{ $order->quantity_ordered }}</a>
                            </div>
                          </td>
                          <td>
                            <div class="avatar-group mt-2">
                              <a>{{ $order->unit_price }}</a>
                            </div>
                          </td>
                          <td>
                            <div class="avatar-group mt-2">
                              <a>{{ $order->total_price }}</a>
                            </div>
                          </td>
                          <td>
                            <div class="avatar-group mt-2">
                              <a>{{ $order->disc_value_per_unit }}</a>
                            </div>
                          </td>
                          <td class="align-middle text-center text-sm">
                            <span class="text-xs font-weight-bold"> UGX{{ number_format($order->net_order_value) }} </span>
                          </td>
                        </tr>
                        @endforeach
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="row my-4">
            <div class="col-lg-12 col-md-12 mb-md-0 mb-4">
              <div class="card">
                <div class="card-header pb-0">
                  <div class="row">
                    <div class="col-lg-6 col-7">
                      <h6>Farmer's Balances</h6>
                    </div>

                  </div>
                </div>
                <div class="card-body px-0 pb-2">
                  <div class="table-responsive">
                    <table class="table align-items-center mb-0">
                      <thead>
                        <tr>
                          <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">User ID</th>
                          <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Name</th>
                          <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Date</th>
                          <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Amount</th>
                          <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Created By</th>
                        </tr>
                      </thead>
                      <tbody>
                        @php
                            if (request()->has("from") && request()->has("to"))
                                $debits = App\Models\UserDebit::select("users.name as username", "admins.name as created_by", "users.id", "user_debits.amount", "user_debits.created_at")->leftJoin("users", "users.id", "user_debits.user_id")->leftJoin("admins", "admins.id", "user_debits.admin_id")->orderBy("user_debits.created_at", "DESC")->take(10)->where('users.admin_id', \Auth::user()->id)->whereBetween('admins.created_at', [request()->from, request()->to])->get();
                            else
                                $debits = App\Models\UserDebit::select("users.name as username", "admins.name as created_by", "users.id", "user_debits.amount", "user_debits.created_at")->leftJoin("users", "users.id", "user_debits.user_id")->leftJoin("admins", "admins.id", "user_debits.admin_id")->orderBy("user_debits.created_at", "DESC")->take(10)->where('users.admin_id', \Auth::user()->id)->get();
                        @endphp
                        @foreach($debits as $debit)
                        <tr>
                          <td>
                            <div class="d-flex px-2 py-1">

                              <div class="d-flex flex-column justify-content-center">
                                <h6 class="mb-0 text-sm">{{ $debit->id }}</h6>
                              </div>
                            </div>
                          </td>
                          <td>
                            <div class="avatar-group mt-2">
                              <a>{{ $debit->username }}</a>
                            </div>
                          </td>
                          <td>
                            <div class="avatar-group mt-2">
                              <a>{{ $debit->created_at }}</a>
                            </div>
                          </td>
                          <td class="align-middle text-center text-sm">
                            <span class="text-xs font-weight-bold"> UGX{{ number_format($debit->amount) }} </span>
                          </td>
                           <td class="align-middle text-center text-sm">
                            <span class="text-xs font-weight-bold"> {{ $debit->created_by }} </span>
                          </td>
                        </tr>
                        @endforeach
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
          </div>
        <?php endif ?>
      </div>
    </div>
  @endsection
  @section("js")
  <script src="../DBoard/js/plugins/chartjs.min.js"></script>
  <script>
    var ctx = document.getElementById("chart-bars").getContext("2d");

    new Chart(ctx, {
      type: "bar",
      data: {
        labels: ["Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
        datasets: [{
          label: "Sales",
          tension: 0.4,
          borderWidth: 0,
          borderRadius: 4,
          borderSkipped: false,
          backgroundColor: "#fff",
          data: [450, 200, 100, 220, 500, 100, 400, 230, 500],
          maxBarThickness: 6
        }, ],
      },
      options: {
        responsive: true,
        maintainAspectRatio: false,
        plugins: {
          legend: {
            display: false,
          }
        },
        interaction: {
          intersect: false,
          mode: 'index',
        },
        scales: {
          y: {
            grid: {
              drawBorder: false,
              display: false,
              drawOnChartArea: false,
              drawTicks: false,
            },
            ticks: {
              suggestedMin: 0,
              suggestedMax: 500,
              beginAtZero: true,
              padding: 15,
              font: {
                size: 14,
                family: "Open Sans",
                style: 'normal',
                lineHeight: 2
              },
              color: "#fff"
            },
          },
          x: {
            grid: {
              drawBorder: false,
              display: false,
              drawOnChartArea: false,
              drawTicks: false
            },
            ticks: {
              display: false
            },
          },
        },
      },
    });


    var ctx2 = document.getElementById("chart-line").getContext("2d");

    var gradientStroke1 = ctx2.createLinearGradient(0, 230, 0, 50);

    gradientStroke1.addColorStop(1, 'rgba(203,12,159,0.2)');
    gradientStroke1.addColorStop(0.2, 'rgba(72,72,176,0.0)');
    gradientStroke1.addColorStop(0, 'rgba(203,12,159,0)'); //purple colors

    var gradientStroke2 = ctx2.createLinearGradient(0, 230, 0, 50);

    gradientStroke2.addColorStop(1, 'rgba(20,23,39,0.2)');
    gradientStroke2.addColorStop(0.2, 'rgba(72,72,176,0.0)');
    gradientStroke2.addColorStop(0, 'rgba(20,23,39,0)'); //purple colors

    new Chart(ctx2, {
      type: "line",
      data: {
        labels: ["Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
        datasets: [{
            label: "Mobile apps",
            tension: 0.4,
            borderWidth: 0,
            pointRadius: 0,
            borderColor: "#cb0c9f",
            borderWidth: 3,
            backgroundColor: gradientStroke1,
            fill: true,
            data: [50, 40, 300, 220, 500, 250, 400, 230, 500],
            maxBarThickness: 6

          },
          {
            label: "Websites",
            tension: 0.4,
            borderWidth: 0,
            pointRadius: 0,
            borderColor: "#3A416F",
            borderWidth: 3,
            backgroundColor: gradientStroke2,
            fill: true,
            data: [30, 90, 40, 140, 290, 290, 340, 230, 400],
            maxBarThickness: 6
          },
        ],
      },
      options: {
        responsive: true,
        maintainAspectRatio: false,
        plugins: {
          legend: {
            display: false,
          }
        },
        interaction: {
          intersect: false,
          mode: 'index',
        },
        scales: {
          y: {
            grid: {
              drawBorder: false,
              display: true,
              drawOnChartArea: true,
              drawTicks: false,
              borderDash: [5, 5]
            },
            ticks: {
              display: true,
              padding: 10,
              color: '#b2b9bf',
              font: {
                size: 11,
                family: "Open Sans",
                style: 'normal',
                lineHeight: 2
              },
            }
          },
          x: {
            grid: {
              drawBorder: false,
              display: false,
              drawOnChartArea: false,
              drawTicks: false,
              borderDash: [5, 5]
            },
            ticks: {
              display: true,
              color: '#b2b9bf',
              padding: 20,
              font: {
                size: 11,
                family: "Open Sans",
                style: 'normal',
                lineHeight: 2
              },
            }
          },
        },
      },
    });
  </script>

  <!-- Github buttons -->
  <script async defer src="https://buttons.github.io/buttons.js"></script>
@endsection
