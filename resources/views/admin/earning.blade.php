@extends('layouts.admin')
@section('title' , 'Keuangan')
@section('earning' , 'active')
@section('body')


<div id="dataGraphic" data-json="{{ $graphic }}" ></div>

<div class="row">
	<div class="col">
		<div class="card-earning mb-3">
			<img src="{{ asset('/assets/dashboard/illustration/earning_illustration.svg') }}" alt="earning">
			<h2>{{ $total }}</h2>
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
			<h2>{{ $studiokuSaldo }}</h2>
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
			<h2>{{ $contributorSaldo }}</h2>
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

	let dataGraphic = document.getElementById('dataGraphic').getAttribute('data-json');
	dataGraphic = JSON.parse(dataGraphic);
	let months = [];
	let total = [];
	let studioku = [];
	let contributor = [];

	dataGraphic.forEach(data => {
		months.push(data['month']);
		total.push(data['total']);
		studioku.push(data['studioku']);
		contributor.push(data['contributor']);
	})

	var ctx = document.getElementById('totalIncome').getContext('2d');
	var chart = new Chart(ctx , {
		type: 'line',
		data: {
			labels: months,
			datasets: [{
				label: 'Pendapatan',
				backgroundColor: 'rgb(51, 55, 107)',
                data: total,
                fill :false,
                borderWitdh : 10,
                borderColor: 'skyblue',
                lineTension: 0,
			}],
		},

		options: {
			responsive:true,
			scales: {
              /*yAxes: [{
                  ticks: {
                      min: total[0],
                      max: total[total.length],
                  }
              }]*/
	        }
		}
	})


	// komisi

	var ctx2 = document.getElementById('totalKomisi').getContext('2d');
	var chart2 = new Chart(ctx2 , {
		type: 'line',
		data: {
			labels: months,
			datasets: [{
				label: 'Studioku',
				backgroundColor: 'rgb(51, 55, 107)',
                data: studioku,
                fill :false,
                borderWitdh : 10,
                borderColor: 'skyblue',
                lineTension: 0,
			}],
		},

		options: {
			responsive:true,
			scales: {
              /*yAxes: [{
                  ticks: {
                      min: studioku[0],
                      max: studioku[studioku.length],
                  }
              }]*/
	        }
		}
	})

	// Kontirbutor

	var ctx3 = document.getElementById('totalContributor').getContext('2d');
	var chart3 = new Chart(ctx3, {
		type: 'line',
		data: {
			labels: months,
			datasets: [{
				label: 'Kontributor',
				backgroundColor: 'rgb(51, 55, 107)',
                data: contributor,
                fill :false,
                borderWitdh : 10,
                borderColor: 'skyblue',
                lineTension: 0,
			}],
		},

		options: {
			responsive:true,
			scales: {
             /* yAxes: [{
                  ticks: {
                      min: contributor[0],
                  }
              }]*/
	        }
		}
	})
</script>

@endsection