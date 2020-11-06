@extends('layouts.admin')
@section('title' , 'Keuangan')
@section('earning' , 'active')
@section('body')


<div class="row">
	<div class="col">
		<div class="card-earning mb-3">
			<img src="{{ asset('/assets/dashboard/illustration/earning_illustration.svg') }}" alt="earning">
			<h2>{{ $total }} {{ $totalScope }}</h2>
			<p>Total Pendapatan (Total yang didapat dari penjualan item)</p>
		</div>
	</div>
	<div class="col-2">
		<div class="chart card" style="background-color: white;">
		    <canvas id="totalIncome" height="150px"></canvas>
		</div>
	</div>
</div>

<div class="row">
	<div class="col">
		<div class="card-earning mb-3">
			<img src="{{ asset('/assets/dashboard/illustration/earning_illustration.svg') }}" alt="earning">
			<h2>10 Jt</h2>
			<p>Pendapatan Studioku (30% dari pendapatan total)</p>
		</div>
	</div>
	<div class="col-2">
		<div class="chart card" style="background-color: white;">
		    <canvas id="totalKomisi" height="150px"></canvas>
		</div>
	</div>
</div>

<div class="row">
	<div class="col">
		<div class="card-earning mb-3">
			<img src="{{ asset('/assets/dashboard/illustration/earning_illustration.svg') }}" alt="earning">
			<h2>20 Jt</h2>
			<p>Pendapatan Kontributor (Pendapatan setelah dikurangi 30% komisi studioku)</p>
		</div>
	</div>
	<div class="col-2">
		<div class="chart card" style="background-color: white;">
		    <canvas id="totalContributor" height="150px"></canvas>
		</div>
	</div>
</div>


<script src="{{ asset('vendor/chartjs/Chart.js') }}"></script>

<script type="text/javascript">
	let totalIncomeValue = [1000000,1500000,1400000,1800000 , 1640000 , 1850500 , 2010000, 2100000 , 2230000 , 2140000 , 2210000 , 2420000];
	let month = ['Januari' , 'Februari' , 'Maret' , 'April' , 'Juni' , 'Juli' , 'Agustus' , 'September' ,'Oktober' , 'November' , 'Desember'];
	var ctx = document.getElementById('totalIncome').getContext('2d');
	var chart = new Chart(ctx , {
		type: 'line',
		data: {
			labels: month,
			datasets: [{
				label: 'Total Pendapatan',
				backgroundColor: 'rgb(51, 55, 107)',
                data: totalIncomeValue,
                fill :false,
                borderWitdh : 10,
                borderColor: 'skyblue',
			}],
		},

		options: {
			responsive:true,
			scales: {
              yAxes: [{
                  ticks: {
                      min: totalIncomeValue[0],
                      max: totalIncomeValue[12],
                  }
              }]
	        }
		}
	})


	// komisi

	var ctx2 = document.getElementById('totalKomisi').getContext('2d');
	var chart2 = new Chart(ctx2 , {
		type: 'line',
		data: {
			labels: month,
			datasets: [{
				label: 'Pendapatan Studioku',
				backgroundColor: 'rgb(51, 55, 107)',
                data: totalIncomeValue,
                fill :false,
                borderWitdh : 10,
                borderColor: 'skyblue',
			}],
		},

		options: {
			responsive:true,
			scales: {
              yAxes: [{
                  ticks: {
                      min: totalIncomeValue[0],
                      max: totalIncomeValue[12],
                  }
              }]
	        }
		}
	})

	// Kontirbutor

	var ctx3 = document.getElementById('totalContributor').getContext('2d');
	var chart3 = new Chart(ctx3, {
		type: 'line',
		data: {
			labels: month,
			datasets: [{
				label: 'Pendapatan Kontributor',
				backgroundColor: 'rgb(51, 55, 107)',
                data: totalIncomeValue,
                fill :false,
                borderWitdh : 10,
                borderColor: 'skyblue',
			}],
		},

		options: {
			responsive:true,
			scales: {
              yAxes: [{
                  ticks: {
                      min: totalIncomeValue[0],
                      max: totalIncomeValue[12],
                  }
              }]
	        }
		}
	})
</script>

@endsection