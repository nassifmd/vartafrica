<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Farmers Reports</title>
</head>
<body>
<h1>Farmers Report</h1>

<br>
	<table style="width: 100%;" border="1">
		<thead>
			<tr>
				<th width="2%">ID</th>
				<th width="10%">Name</th>
				<th width="10%">Username</th>
                <th width="10%">Contact</th>
                <th width="10%">Sex</th>
                <th width="10%">Crop Cultivated</th>
                <th width="10%">Variety</th>
                <th width="10%">Date Of Registeration</th>
                <th width="10%">Location Of Farmer</th>
                <th width="10%">Order Quantity</th>
                <th width="10%">Total Discount Offered</th>
                <th width="10%">Net Ordered Value</th>
                <th width="10%">Balance</th>
                <th width="10%">Number Of Used Cards</th>
			</tr>
		</thead>
		<tbody>
			@php($index = 1)
			@foreach($users as $user)
				<tr>
					<td width="2%">{{ $index++ }}</td>
					<td width="10%">{{ $user->name }}</td>
					<td width="10%">{{ $user->username }}</td>
                    <td width="10%">{{ $user->contact}}</td>
                    <td width="10%">{{ $user->sex}}</td>
                    <td width="10%">{{ $user->crop_cultivated}}</td>
                    <td width="10%">{{ $user->variety}}</td>
                    <td width="10%">{{ $user->created_at}}</td>
                    <td width="10%">{{ $user->location}}</td>
                    <td width="10%">{{ $user->quantity_ordered}}</td>
                    <td width="10%">{{ $user->disc_value_per_unit}}</td>
                    <td width="10%">{{ $user->net_order_value}}</td>
                    <td width="10%">{{ $user->balance}}</td>
                    <td width="10%">{{ $user->used_cards}}</td>
				</tr>
			@endforeach
		</tbody>
	</table>
</body>
</html>
