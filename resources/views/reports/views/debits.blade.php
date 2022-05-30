<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>My Debits Reports</title>
</head>
<body>
<h1>My Debits Report</h1>

@if($request->custom_dates == "on")
<p>Custom dates: {{ $request->selected_dates }}</p>
@endif

<p>Amount: {{ $request->amount_type == "custom" ? $request->amount_operator ." ".$request->amount_value : "All" }}</p>


<p>Total Debits: {{ sizeof($debits) }}</p>

<br>
	<table style="width: 100%;" border="1">
		<thead>
			<tr>
				<th width="10%">ID</th>
				<th width="45%">Amount</th>
				<th width="45%">Created at</th>
			</tr>
		</thead>
		<tbody>
			@php($index = 1)
			@foreach($debits as $debit)
				<tr>
					<td width="10%">{{ $index++ }}</td>
					<td width="45%">{{ number_format($debit->amount, 2) }}</td>
					<td width="45%">{{ $debit->created_at }}</td>
				</tr>
			@endforeach
		</tbody>
	</table>

</body>
</html>