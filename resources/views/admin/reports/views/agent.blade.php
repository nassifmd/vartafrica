<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Agents Reports</title>
</head>
<body>
<h1>Agents Report</h1>

<br>
	<table style="width: 100%;" border="1">
		<thead>
			<tr>
				<th width="2%">ID</th>
				<th width="10%">User</th>
				<th width="10%">Country</th>
                <th width="10%">Total Farmers</th>
                <th width="10%">Total Used Cards</th>
                <th width="10%">Total Amount Recieved</th>
			</tr>
		</thead>
		<tbody>
			@php($index = 1)
			@foreach($agents as $agent)
				<tr>
					<td width="2%">{{ $index++ }}</td>
					<td width="10%">{{ $agent->name }}</td>
					<td width="10%">{{ $agent->country }}</td>
                    <td width="10%">{{ $agent->total_farmers}}</td>
                    <td width="10%">{{ $agent->used_cards}}</td>
                    <td width="10%">{{ $agent->total_amount}}</td>
				</tr>
			@endforeach
		</tbody>
	</table>
</body>
</html>
