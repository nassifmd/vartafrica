<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Used Cards Reports</title>
</head>
<body>
<h1>Used Cards Report</h1>
<p>Created by: {{ $request->created_by == "all" ? "All" : App\Models\Admin::select("name")->find($request->created_by)->name ?? '' }}</p>
@if($request->custom_dates == "on")
<p>Custom dates: {{ $request->selected_dates }}</p>
@endif

<p>Used by: {{ $request->user_id == "all" ? "All" : App\Models\User::select("name")->find($request->user_id)->name ?? '' }}</p>


<p>Amount: {{ $request->amount_type == "custom" ? $request->amount_operator ." ".$request->amount_value : "All" }}</p>


<p>Total Cards: {{ sizeof($cards) }}</p>

<br>
	<table style="width: 100%;" border="1">
		<thead>
			<tr>
				<th width="5%">ID</th>
				<th width="25%">Used by</th>
				<th width="15%">Serial</th>
				<th width="15%">Amount</th>
				<th width="15%">Used at</th>
				<th width="25%">Created by</th>
			</tr>
		</thead>
		<tbody>
			@php($index = 1)
			@foreach($cards as $card)
				<tr>
					<td width="5%">{{ $index++ }}</td>
					<td width="25%">{{ $card->used_by }}</td>
					<td width="15%">{{ implode("-", str_split($card->serial, 4)) }}</td>
					<td width="15%">{{ number_format($card->amount, 2) }}</td>
					<td width="15%">{{ $card->used_at }}</td>
					<td width="25%">{{ $card->created_by }}</td>
				</tr>
			@endforeach
		</tbody>
	</table>

</body>
</html>
