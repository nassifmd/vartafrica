@extends("admin.layouts.app", ['loadDataTable' => true])
@section("title", "Users - ".$user->name)

@section("content")
    <div class="container-fluid py-4">
        <div class="card-header row">
            <div class="col-md-2">ID</div>
            <div class="col-md-4">{{ $user->id }}</div>

            <div class="col-md-2">Name</div>
            <div class="col-md-4">{{ $user->name }}</div>  

            <div class="col-md-2">Username</div>
            <div class="col-md-4">{{ $user->username }}</div>  

            <!-- <div class="col-md-2">Email</div>
            <div class="col-md-4">{{ $user->email }}</div>  -->

            <div class="col-md-2">Contact</div>
            <div class="col-md-4">{{ $user->contact }}</div> 

            <div class="col-md-2">Location</div>
            <div class="col-md-4">{{ $user->location }}</div> 

            <div class="col-md-2">Age</div>
            <div class="col-md-4">{{ $user->age }}</div> 

            <div class="col-md-2">Sex</div>
            <div class="col-md-4">{{ $user->sex }}</div> 

            <div class="col-md-2">Balance</div>
            <div class="col-md-4">{{ $user->balance }}</div>

            <div class="col-md-2">Crop Cultivated</div>
            <div class="col-md-4">{{ $user->crop_cultivated }}</div>

            <div class="col-md-2">Target Package</div>
            <div class="col-md-4">{{ $user->target_package }}</div>

            <div class="col-md-2">Target Saving Amounts</div>
            <div class="col-md-4">{{ $user->save_amount }}</div>

            <div class="col-md-2">Seed quantity</div>
            <div class="col-md-4">{{ $user->seed_quantity }}</div>

            <div class="col-md-2">Next of Kin Name</div> 
            <div class="col-md-4">{{ $user->next_of_kin_name }}</div>

            <div class="col-md-2">Next of Kin Phone</div> 
            <div class="col-md-4">{{ $user->next_of_kin_phone }}</div>

            <div class="col-md-2">Created at</div>
            <div class="col-md-4">{{ $user->created_at }}</div>

            <div class="col-md-2">Updated at</div>
            <div class="col-md-4">{{ $user->updated_at }}</div>
        </div>
    </div>
@endsection