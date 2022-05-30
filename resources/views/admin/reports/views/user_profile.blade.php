<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Users Profile Reports</title>
</head>
<body>
<h1>Users Profile Report</h1>
<p>Created by: {{ $request->created_by == "all" ? "All" : App\Models\Admin::select("name")->find($request->created_by)->name ?? '' }}</p>

<p>User: {{ $request->user_id == "all" ? "All" : App\Models\User::select("name")->find($request->user_id)->name ?? '' }}</p>


<p>Balance: {{ $request->amount_type == "custom" ? $request->amount_operator ." ".$request->amount_value : "All" }}</p>

<p>Order by: {{ $request->order_by }}</p>
<p>Order type: {{ $request->order_type }}</p>


<p>Total Users: {{ sizeof($users) }}</p>

<br>
	<table style="width: 100%;" border="1">
		<thead>
			<tr>
				<th width="2%">ID</th>
				<th width="10%">User</th>
				<th width="10%">Username</th>
				<th width="10%">Phone Number</th>
				<th width="10%">Location</th>
				<th width="3%">Age</th>
				<th width="5%">Sex</th>
				<th width="10%">Crop Cultivated</th>
				<th width="10%">Target Package</th>
				<th width="5%">Seed Quantity</th>
				<th width="10%">Target Saving Amount</th>
				<th width="10%">Name of Next of Kin</th>
				<th width="10%">Phone Number of Next of Kin</th>
				<th width="10%">Balance</th>
				<th width="10%">Debits</th>
				
					<!-- <th width="20%">Email</th> -->
				
				
				
			</tr>
		</thead>
		<tbody>
			@php($index = 1)
			@foreach($users as $user)
				<tr>
					<td width="2%">{{ $index++ }}</td>
					<td width="10%">{{ $user->name }}</td>
					<td width="10%">{{ $user->username }}</td>
					<td width="10%">{{ $user->contact }}</td>
					<td width="10%">{{ $user->location }}</td>
					<th width="3%">{{$user->age}}</th>
					<th width="5%">{{$user->sex}}</th>
					<th width="10%">{{$user->crop_cultivated}}</th>
					<th width="10%">{{$user->target_package}}</th>
					<th width="5%">{{$user->seed_quantity}}</th>
					<th width="10%">{{$user->save_amount}}</th>
					<th width="10%">{{$user->next_of_kin_name}}</th>
					<th width="10%">{{$user->next_of_kin_phone}}</th>
					<td width="10%">{{ number_format($user->balance, 2) }}</td>
					<td width="10%">{{ number_format($user->total_debits, 2) }}</td>
					<!-- <td width="20%">{{ $user->email }}</td> -->
					
					
				</tr>
			@endforeach
		</tbody>
	</table>

	<a href="{{route('export')}}" class="exportUsers">Export Report</a>

</body>
</html>