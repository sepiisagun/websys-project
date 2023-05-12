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
    h1,h2,h3,h4,h5,h6,p,span,label {
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
    table, th, td {
        border: 1px solid #ddd;
        padding: 8px;
        font-size: 14px;
    }

    .heading {
        font-size: 24px;
        margin-top: 12px;
        margin-bottom: 12px;
        font-family: sans-serif;
    }
    .small-heading {
        font-size: 18px;
        font-family: sans-serif;
    }
    .total-heading {
        font-size: 18px;
        font-weight: 700;
        font-family: sans-serif;
    }
    .order-details tbody tr td:nth-child(1) {
        width: 20%;
    }
    .order-details tbody tr td:nth-child(3) {
        width: 20%;
    }

    .text-start {
        text-align: left;
    }
    .text-end {
        text-align: right;
    }
    .text-center {
        text-align: center;
    }
    .company-data span {
        margin-bottom: 4px;
        display: inline-block;
        font-family: sans-serif;
        font-size: 14px;
        font-weight: 400;
    }
    .no-border {
        border: 1px solid #fff !important;
    }
    .bg-blue {
        background-color: #414ab1;
        color: #fff;
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
	{{-- <script src="{{ asset('js/app.js') }}" type="text/js"></script> --}}

</body>

</html>
