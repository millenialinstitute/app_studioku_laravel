<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Invoice </title>

	<style>
		@page {
            margin: 0px;
            padding: 0px;
        }

		body {
			color: rgba(0,0,0,.7);
			font-family: 'Montserrat' , 'Arial' , sans-serif;
		}

		.page {
			width: 21cm;
			height: 29cm;
			border: 1px solid silver;
			box-sizing: border-box;
			position: relative;
			overflow: hidden;
		}

		.header , .footer {
			background-color: #60b6fb;
			color: white;
		}

		.header {
			padding: 0px 30px;
		    height: 3.2cm;
		    margin-top: -10px;
		}

		.header h1 {
			float: left;
		    margin-right: 40%;
		    margin: 0px;
		    font-size: 40px;
		    text-transform: uppercase;
		    width: 50%;
		    line-height: 100px;
		}

		.header h2 {
			width: 50%;
			float: left;
		    text-align: right;
		    line-height: 100px;
		    margin: 0px;
		    margin-top: -5px;
		    text-transform: uppercase;
		}

		.informasi {
		    float: left;
		    width: 50%;
		    line-height: 10px;
		    font-size: 14px;
		}

		.inv {
			line-height: 10px;
		    font-size: 14px;
		}

		.informasi p , .inv p {
			font-size: 12px;
		}

		table {
			width: 90%;
		    margin: auto;
		    border-collapse: collapse;
		    font-size: 12px;
		}

		.table2 {
			width: 50%;
		    position: absolute;
		    right: 0px;
		    margin-right: 10px;
		    margin-top: 20px;
		}

		table tr td , table tr th {
			padding: 12px;
		} 

		table .thead {
			background: #60b6fb;
		    color: white;
		}

		table .tbody tr td , table .tbody tr th{
			background: rgba(238 ,245, 247 , 0.6);
		}

		table tr td:nth-child(1) {
			text-align: center;
		}

		.footer {
			padding: 10px 40px;
		    height: 4cm;
		    font-size: 12px;
		    position: absolute;
		    bottom: 0px;
		    width: 100%;
		    box-sizing: border-box;
		}

		.footer h2 {
		    text-transform: uppercase;
		    margin-bottom: 0px;
		}

		.footer .contact {
			float: left;
		    width: 50%;
		    line-height: 10px;
		}

		.footer .bank {
			width: 50%;
			float: left;
		    line-height: 12px;
		}

	</style>

</head>
<body>
	<div class="page">
		<div class="header">
	        <h1>Invoice</h1>
	        <h2>Studioku</h2>
	    </div>
	    <div style="width: 100%;padding: 1cm;margin-top: 30px;">
	    	<h3 style="margin: 0px;margin-bottom: -6px">Informasi Tagihan</h3>
	    	<div style="padding: 5px 0px;">
			    <div class="informasi">
			    	<p>Nama Akun : {{ $payment->member->user->name }}</p>
			    	<p>Nasabah : {{ $payment->customer }}</p>
			    	<p>No.Rekening : {{ $payment->card_number }}</p>
			    </div>
		    	<div class="inv">
		    		<p>Invoice : #12929192</p>
		    		<p>Tanggal : 20/12/2020</p>
		    	</div>
	    	</div>
	    </div>
	    <table>
	    	<thead class="thead">
	    		<tr>
	    			<th>#</th>
	    			<th style="text-align: left;">Judul Item</th>
	    			<th style="text-align: left;">Harga</th>
	    		</tr>
	    	</thead>
	    	<tbody class="tbody">
	    		@php $totalCost = 0 @endphp
	    		@foreach($payment->cart->item as $item)
	    			@php 
	    				$item = $item->item;
	    				$totalCost+= $item->cost;
    				@endphp

		    		<tr>
		    			<td>{{ $loop->iteration }}</td>
		    			<td>{{ $item->title }}</td>
		    			<td>Rp{{ number_format($item->cost , 2 , ',' , '.') }}</td>
		    		</tr>
	    		@endforeach
	    	</tbody>
	    </table>

	    <div style="text-align: right">
		    <table style="margin-top: 15px;width: 50%;position: relative;left: 4.2cm">
		    	<thead class="tbody">
		    		<tr>
		    			<th>Total Item</th>
		    			<th>:</th>
		    			<th>{{ $payment->cart->item->count() }}</th>
		    		</tr>
		    	</thead>
		    	<tbody class="thead">
		    		<tr>
		    			<th>Total Dibayar</th>
		    			<th style="text-align: center;">:</th>
		    			<th>Rp{{ number_format($totalCost, 2 ,',','.') }}</th>
		    		</tr>
		    	</tbody>
		    </table>	
	    </div>


		<div class="footer">
			<h2>Studioku</h2>
			<div class="contact">
				<p>Jalan MT.Haryono No.146 Lomanis,</p>
				<p>Cilacap, Jawa Tengah, 53222</p>
				<p>Indonesia </p>
			</div>
			<div class="bank">
				<p>{{ $payment->bankTarget->name }}</p>
				<p>Nama: {{ $payment->bankTarget->customer }}</p>
				<p>Nomor Rekening : {{ $payment->bankTarget->card_number }}</p>
			</div>
		</div>

	</div>



	

</body>
</html>