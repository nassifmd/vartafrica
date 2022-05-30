<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Users Balance Reports</title>
</head>
<body>
<h1>Users Balance Report</h1>
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
				<th width="3%">ID</th>
				<th width="15%">User</th>
				<th width="20%">Username</th>
				<!-- <th width="20%">Email</th> -->
				<th width="10%">Balance</th>
				<th width="10%">Debits</th>

			</tr>
		</thead>
		<tbody>
			@php($index = 1)
			@foreach($users as $user)
				<tr>
					<td width="3%">{{ $index++ }}</td>
					<td width="15%">{{ $user->name }}</td>
					<td width="20%">{{ $user->username }}</td>
					<!-- <td width="20%">{{ $user->email }}</td> -->
					<td width="10%">{{ number_format($user->balance, 2) }}</td>
					<td width="10%">{{ number_format($user->total_debits, 2) }}</td>

				</tr>
			@endforeach
		</tbody>
	</table>

</body>
</html>
