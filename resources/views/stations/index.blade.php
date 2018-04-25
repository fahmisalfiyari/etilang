@extends('layouts.app')

@section('content')
<div class="container">
	<div class="row">
		<h3>Daftar Pelanggaran pada Pos Jaga</h3>
	</div>
	<br/>
	<form action="{{ route('stations.index')}}" method="POST">
		{{ csrf_field() }}
		@method('GET')
		<div class="row">
			<div class="col-sm">
				<select class="form-control" name="station_id">
			    	@foreach(auth()->user()->stations as $station)
			    		<option value="{{ $station->id }}">{{ $station->address }}</option>
			    	@endforeach
				</select>
		    </div>
		    <div class="col-sm">
		    	<button type="submit" class="btn btn-primary">Cari</button>
		    </div>
		</div>	
	</form>
	<br/>
	<div class="row">
		@if($items != null)
			<table class="table table-bordered table-striped">
				<thead>
					<tr>
						<th>Nomor Pelanggaran</th>
						<th>Nama Petugas</th>
						<th>Lokasi Pos</th>
						<th>Nama Pelanggar</th>
						<th>Identitas Pelanggar</th>
					</tr>
				</thead>
				<tbody>
					@foreach ($items as $item)
						<tr>
							<td>{{ $item->id }}</td>
							<td>{{ $item->user->name }}</td>
							<td>{{ $item->station->address }}</td>
							<td>{{ $item->violator_name }}</td>
							<td>{{ $item->violator_identity_number }}</td>
						</tr>
					@endforeach
				</tbody>
			</table>
		@endif
	</div>
</div>
@endsection