<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Farmers Balances</title>
</head>
<body>
<h1>Farmers Balances</h1>

<br>
	<table style="width: 100%;" border="1">
		<thead>
			<tr>
				<th width="2%">Agent</th>
				<th width="10%">Username</th>
				<th width="10%">Total Net Qty</th>
				<th width="10%">Net Ordered Value</th>
				<th width="10%">Total Net Savings</th>
				<th width="10%">Balance</th>
			</tr>
		</thead>
		<tbody>
			@foreach($balances as $balance)
				<tr>
					<td width="2%">{{ $balance->agent_name }}</td>
					<td width="10%">{{ $balance->user_name }}</td>
					<td width="10%">{{ $balance->total_quantity_ordered }}</td>
					<td width="10%">{{ $balance->net_order_value }}</td>
					<td width="10%">{{ $balance->total_net_saving_goal }}</td>
					<td width="10%">{{ $balance->total_balance }}</td>
				</tr>
			@endforeach
		</tbody>
	</table>
</body>
</html>
