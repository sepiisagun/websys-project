<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta
		content="IE=edge"
		http-equiv="X-UA-Compatible"
	>
	<meta
		content="width=device-width, initial-scale=1.0"
		name="viewport"
	>

	<title>Transaction</title>
</head>
<style>
	html,
	body {
		margin: 10px;
		padding: 10px;
		font-family: sans-serif;
	}

	h1,
	h2,
	h3,
	h4,
	h5,
	h6,
	p,
	span,
	label {
		font-family: sans-serif;
	}

	table {
		width: 100%;
		border-collapse: collapse;
		margin-bottom: 0px !important;
	}

	table thead th {
		height: 28px;
		text-align: left;
		font-size: 16px;
		font-family: sans-serif;
	}

	table,
	th,
	td {
		border: 1px solid #ddd;
		padding: 8px;
		font-size: 14px;
	}

	.text-center {
		text-align: center;
	}
</style>

<body>
	<div class="container mt-5">
		<h2 class="mb-3 text-center">Transaction Report</h2>
		<div class="d-flex justify-content-end mb-4">
		</div>
		<table class="table-bordered mb-5 table">
			<thead>
				<tr class="table-danger">
					<th scope="col">Rentee Name</th>
					<th scope="col">House Name</th>
					<th scope="col">Transaction Date</th>
					<th scope="col">Total Amount</th>
					<th scope="col">Status</th>
				</tr>
			</thead>
			<tbody>
				@foreach ($houses as $house)
					<tr>
						<th
							class="whitespace-nowrap px-7 py-3 font-medium text-gray-900 dark:text-white"
							scope="row"
						>{{ $house->first_name }} {{ $house->last_name }}</th>
						<td class="px-4 py-3">{{ $house->name }}</td>
						<td class="px-4 py-3">{{ $house->check_in }}</td>
						<td class="px-4 py-3">{{ $house->amount }}</td>
						<td class="px-4 py-3">{{ $house->status }}</td>
				@endforeach
			</tbody>
		</table>
	</div>
</body>

</html>
