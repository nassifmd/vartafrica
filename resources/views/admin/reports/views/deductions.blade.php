<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Deduction Reports</title>
</head>
<body>
<h1>Deduction Report</h1>

<br>
	<table style="width: 100%;" border="1">
		<thead>
			<tr>
				<th width="2%">User ID</th>
				<th width="10%">Name</th>
				<th width="10%">Date</th>
                <th width="10%">Amount</th>
                <th width="10%">Created By</th>
			</tr>
		</thead>
		<tbody>
			@php($index = 1)
			@foreach($userDebits as $userDebit)
				<tr>
					<td width="2%">{{ $index++ }}</td>
					<td width="10%">{{ $userDebit->username }}</td>
					<td width="10%">{{ $userDebit->created_at }}</td>
                    <td width="10%">UGX{{ number_format($userDebit->amount) }}</td>
                    <td width="10%">{{ $userDebit->created_by }}</td>
				</tr>
			@endforeach
		</tbody>
	</table>
</body>
</html>
