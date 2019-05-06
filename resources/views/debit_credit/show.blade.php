@extends('layouts.app')
@section('content')
<div class='row my-5'>
	<div class='col-md-5'>
		<div class='card'>
			<div class='card-header'>
				<h2>Detail Transaction</h2>
			</div>
			<!-- /.card-header -->
			<div class='card-body'>
				<table class='table table-striped table-bordered'>
					<tr>
						<th>Date</th>
						<td>
							{{ $debit_credit->date->toFormattedDateString() }} -
							({{ $debit_credit->date->shortEnglishDayOfWeek }})
						</td>
					</tr>
					<tr>
						<th>Amount</th>
						<td>{{ $debit_credit->amount }}</td>
					</tr>
					<tr>
						<th>Deposit given by</th>
						<td>{{ $debit_credit->creditor->name }}</td>
					</tr>
					<tr>
						<th>Deposit taken by</th>
						<td>{{ $debit_credit->debitor->name }}</td>
					</tr>
					<tr>
						<th>More Info</th>
						<td>{{ nl2br( $debit_credit->more_info ) }}</td>
					</tr>
				</table>
				<!-- /.table-bordered -->
			</div>
			<!-- /.card-body -->
		</div>
	</div>
	<!-- /.col-md-5 -->
</div>
@endsection


