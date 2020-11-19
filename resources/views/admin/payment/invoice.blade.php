<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Invoice </title>
</head>
<body>


<div>
	<h3>Informasi Tagihan</h3>
	<table>
		<tr>
			<td>Nama</td>
			<td>{{ $payment->member->user->name }}</td>
		</tr>
		<tr>
			<td>Email</td>
			<td>{{ $payment->member->user->email }}</td>
		</tr>
		<tr>
			<td>No.Hp</td>
			<td>09290192929</td>
		</tr>
		<tr>
			<td>Provinsi</td>
			<td>Jawa Tengah</td>
		</tr>
	</table>
</div>

<div>
	<table>
		<tr>
			<td>Bank Member</td>
			<td>{{ $payment->bank }}</td>
		</tr>
		<tr>
			<td>No.Rekening</td>
			<td>{{ $payment->card_number }}</td>
		</tr>
		<tr>
			<td>Nasabah</td>
			<td>{{ $payment->customer }}</td>
		</tr>
		<tr>
			<td>Total</td>
			<td>{{ number_format($payment->total , 2 , ',' ,'.') }}</td>
		</tr>
		<tr>
			<td>Bank Penerima</td>
			<td>{{ $payment->bankTarget->name }}</td>
		</tr>
		<tr>
			<td>Tanggal Pembayaran</td>
			<td>{{ substr($payment->created_at, 0 , 10) }}</td>
		</tr>
	</table>
</div>


	

</body>
</html>