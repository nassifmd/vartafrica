<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>My Cards Reports</title>
</head>
<body>
<h1>My Cards Report</h1>

@if($request->custom_dates == "on")
<p>Custom dates: {{ $request->selected_dates }}</p>
@endif

<p>Amount: {{ $request->amount_type == "custom" ? $request->amount_operator ." ".$request->amount_value : "All" }}</p>


<p>Total Cards: {{ sizeof($cards) }}</p>

<br>
	<table style="width: 100%;" border="1">
		<thead>
			<tr>
				<th width="10%">ID</th>
				<th width="35%">Serial</th>
				<th width="30%">Amount</th>
				<th width="25%">Used at</th>
			</tr>
		</thead>
		<tbody>
			@php($index = 1)
			@foreach($cards as $card)
				<tr>
					<td width="10%">{{ $index++ }}</td>
					<td width="35%">{{ implode("-", str_split($card->serial, 4)) }}</td>
					<td width="30%">{{ number_format($card->amount, 2) }}</td>
					<td width="25%">{{ $card->used_at }}</td>
				</tr>
			@endforeach
		</tbody>
	</table>

</body>
</html>