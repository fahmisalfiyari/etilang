@extends('layouts.app')

@section('content')
	<div class="container">
		<div class="row">
			<div class="col">
				<h3>Edit Pelanggaran</h3>
				<br/>
				<form action="{{ route('violations.update', $violation->id) }}" method="post">
					{{ csrf_field() }}
					@method('PUT')
					<div class="form-group">
						<label>Nomor Identitas Pelanggar</label>
						<input type="text" name="violator_identity_number" class="form-control" value="{{ $violation->violator_identity_number }}">
					</div>
					<div class="form-group">
						<label>Nama Pelanggar</label>
						<input type="text" name="violator_name" class="form-control" value="{{ $violation->violator_name }}">
					</div>
					<div class="form-group">
						<label>Lokasi Pos Laporan</label>
						<select class="form-control" name="station_id">
							@foreach (auth()->user()->stations as $station)
								@if(($station->id)==($violation->station_id))
									<option selected="selected" value="{{ $station->id }}">{{ $station->address }}</option>
								@else
									<option value="{{ $station->id }}">{{ $station->address }}</option>
								@endif	
							@endforeach
						</select>
					</div>
					<button type="submit" class="btn btn-primary">Update</button>
				</form>
			</div>
		</div>
	</div>
@endsection