<?php

Route::get('/export', 'App\Http\Controllers\ExportController@export')->name('export');

Route::group(['prefix'  =>  'admin'], function () {

Route::get('login', 'App\Http\Controllers\Admin\LoginController@showLoginForm')->name('admin.login');
Route::post('login', 'App\Http\Controllers\Admin\LoginController@login')->name('admin.login.post');
Route::get('logout', 'App\Http\Controllers\Admin\LoginController@logout')->name('admin.logout');

Route::get("new-admin", "App\Http\Controllers\Admin\AdminRegisterationController@generate")->name("admin.new_admin.generate");

Route::group(['middleware' => ['auth:admin']], function () {

    Route::resource('roles','App\Http\Controllers\Admin\RoleController');
    Route::get('roles/{role}/delete', 'App\Http\Controllers\Admin\RoleController@destroy')->name('roles.destroy');

    Route::get('/', function () {
        $agents = \App\Models\Admin::select('id')->where("admins.admin_id", \Auth::user()->id)->where('admins.type', 'Agent');

        $debits = \App\Models\Admin::where("admins.admin_id", \Auth::user()->id)->where('admins.type', 'Agent')
                ->join("users", "users.admin_id", "admins.id")
                ->join("user_debits", "user_debits.user_id", "users.id")
                ->selectRaw('sum(amount) as deduction');

        if (request()->has("from") && request()->has("to")){
            $agents_farmers = $agents->whereBetween('admins.created_at', [request()->from, request()->to]);
            $debits = $debits->whereBetween('admins.created_at', [request()->from, request()->to]);
        }

        $agents = $agents->get()->toArray();
        $farmers = \App\Models\User::selectRaw('sum(users.balance) as balance')
        ->selectRaw('count(users.id) as farmers')
        ->whereIn("users.admin_id", $agents)->get();
        $debits = $debits->groupBy('admins.admin_id')->get();

        return view('admin.dashboard.index', compact('agents', 'farmers', 'debits'));
    })->name('admin.dashboard');

    Route::group(['prefix'  =>  'cards'], function () {
        Route::get("/", "App\Http\Controllers\Admin\Cards@active")->name("admin.cards.active");
        Route::post("/get/active", "App\Http\Controllers\Admin\Cards@getActive")->name("admin.cards.get_active");
        Route::post("/get/activepdf", "App\Http\Controllers\Admin\Cards@getActivepdf")->name("admin.cards.get_activepdf");
        Route::post("/get/used", "App\Http\Controllers\Admin\Cards@getUsed")->name("admin.cards.get_used");
        Route::get("/used", "App\Http\Controllers\Admin\Cards@used")->name("admin.cards.used");
        Route::get("/generate", "App\Http\Controllers\Admin\Cards@generate")->name("admin.cards.generate");
        Route::post("/save", "App\Http\Controllers\Admin\Cards@save")->name("admin.cards.save");
        Route::delete("/delete/{id?}/{serial?}", "App\Http\Controllers\Admin\Cards@delete")->name("admin.cards.delete");
    });

    Route::group(['prefix'  =>  'user-debits'], function () {
        Route::get("/", "App\Http\Controllers\Admin\UserDebits@index")->name("admin.user_debits.index");
        Route::get("/form", "App\Http\Controllers\Admin\UserDebits@form")->name("admin.user_debits.form");
        Route::post("/get", "App\Http\Controllers\Admin\UserDebits@get")->name("admin.user_debits.get");
        Route::get("/get-users", "App\Http\Controllers\Admin\UserDebits@getUsers")->name("admin.user_debits.get_users");
        Route::get("/get-packages", "App\Http\Controllers\Admin\UserDebits@getPackages")->name("admin.user_debits.get_packages");
        Route::get("/get-agents", "App\Http\Controllers\Admin\UserDebits@getAgents")->name("admin.user_debits.get_agents");
        Route::post("/save", "App\Http\Controllers\Admin\UserDebits@save")->name("admin.user_debits.save");
    });

    Route::group(['prefix'  =>  'reports'], function () {
        Route::get("/", "App\Http\Controllers\Admin\Reports@index")->name("admin.reports.index");

        Route::post("/generate/active", "App\Http\Controllers\Admin\Reports@generateActive")->name("admin.reports.cards.generate_active");
        Route::post("/generate/activepdf", "App\Http\Controllers\Admin\Reports@generateActivepdf")->name("admin.reports.cards.generate_activepdf");
        Route::post("/generate/used", "App\Http\Controllers\Admin\Reports@generateUsed")->name("admin.reports.cards.generate_used");
        Route::post("/generate/debits", "App\Http\Controllers\Admin\Reports@generateDebits")->name("admin.reports.cards.generate_debits");
        Route::post("/generate/user-balance", "App\Http\Controllers\Admin\Reports@generateUserBalance")->name("admin.reports.cards.generate_user_balance");
        Route::post("/generate/user-profile", "App\Http\Controllers\Admin\Reports@generateUserProfile")->name("admin.reports.cards.generate_user_profile");

        Route::post("/generate/agent", "App\Http\Controllers\Admin\Reports@generateAgent")->name("admin.reports.cards.generate_agent");
        Route::post("/generate/farmer", "App\Http\Controllers\Admin\Reports@generateFarmer")->name("admin.reports.cards.generate_farmer");
        Route::post("/generate/farmerpdf", "App\Http\Controllers\Admin\Reports@generateFarmerpdf")->name("admin.reports.cards.generate_farmerpdf");
        Route::post("/generate/farmer/balances", "App\Http\Controllers\Admin\Reports@generateFarmerBalance")->name("admin.reports.cards.generate_farmer_balance");
        Route::post("/generate/farmer/deductions", "App\Http\Controllers\Admin\Reports@generateFarmerDeductions")->name("admin.reports.cards.generate_deductions");
    });

    Route::group(['prefix'  =>  'users'], function () {
        Route::get("/", "App\Http\Controllers\Admin\Users@index")->name("admin.users.index");
        Route::get("/view/{id?}", "App\Http\Controllers\Admin\Users@view")->name("admin.users.view");
        Route::post("/get", "App\Http\Controllers\Admin\Users@get")->name("admin.users.get");
    });

    Route::group(['prefix'  =>  'change-password'], function () {
        Route::get("/", "App\Http\Controllers\Admin\ChangePassword@index")->name("admin.change_password");
        Route::post("/save", "App\Http\Controllers\Admin\ChangePassword@save")->name("admin.change_password.save");
    });

    Route::group(['prefix'  =>  'new-admin'], function () {
        Route::get("/", "App\Http\Controllers\Admin\AdminRegisterationController@generate")->name("admin.new_admin.generate");
        Route::post("/save", "App\Http\Controllers\Admin\AdminRegisterationController@save")->name("admin.new_admin.save");
        Route::get("/admin-profile", "App\Http\Controllers\Admin\AdminRegisterationController@index")->name("admin.new_admin.profile");
        Route::post("/get", "App\Http\Controllers\Admin\AdminRegisterationController@get")->name("admin.new_admin.get");
    });

    Route::group(['prefix'  =>  'new-agent'], function () {
        Route::get("/", "App\Http\Controllers\Admin\AgentController@generate")->name("admin.new_agent.generate");
        Route::post("/save", "App\Http\Controllers\Admin\AgentController@save")->name("admin.new_agent.save");
        Route::get("/agent-profile", "App\Http\Controllers\Admin\AgentController@index")->name("admin.new_agent.profile");
        Route::post("/get", "App\Http\Controllers\Admin\AgentController@get")->name("admin.new_agent.get");
    });

    Route::group(['prefix'  =>  'new-farmer'], function () {
        Route::get("/", "App\Http\Controllers\Admin\FarmerController@generate")->name("admin.new_farmer.generate");
        Route::post("/save", "App\Http\Controllers\Admin\FarmerController@save")->name("admin.new_farmer.save");
        Route::get("/farmer-profile", "App\Http\Controllers\Admin\FarmerController@index")->name("admin.new_farmer.profile");
        Route::post("/get", "App\Http\Controllers\Admin\FarmerController@get")->name("admin.new_farmer.get");
        Route::get("/order", "App\Http\Controllers\Admin\FarmerController@order")->name("admin.new_farmer.order");
        Route::post('/order', 'App\Http\Controllers\Admin\FarmerController@register')->name('admin.new_farmer.register');
        Route::get("/recharge", "App\Http\Controllers\Admin\FarmerController@recharge")->name("admin.new_farmer.recharge");
        Route::post('/recharge', 'App\Http\Controllers\Admin\FarmerController@rechargePost')->name('admin.new_farmer.recharge');
    });

});

});
