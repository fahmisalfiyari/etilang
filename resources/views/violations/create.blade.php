@extends('layouts.app')

@section('content')
	<div class="container">
		<div class="row">
			<div class="col">
				<h3>Tambah Pelanggaran Baru</h3>

				@if($errors->any())
					<div class="alert alert-danger">
						<h5>Gagal Menyimpan</h5>
						<ul>
							@foreach ($errors->all() as $pesan)
								<li>{{ $pesan }}</li>
							@endforeach
						</ul>
					</div>
				@endif

				<br/>
				<form action="{{ route('violations.store') }}" method="post">
					{{ csrf_field() }}
					<div class="form-group">
						<label>Nomor Identitas Pelanggar</label>
						<input type="text" name="violator_identity_number" class="form-control" value="{{ old('violator_identity_number') }}">
					</div>
					<div class="form-group">
						<label>Nama Pelanggar</label>
						<input type="text" name="violator_name" class="form-control" value="{{ old('violator_name') }}">
					</div>
					<div class="form-group">
						<label>Lokasi Pos Laporan</label>
						<select class="form-control" name="station_id">
							@foreach (auth()->user()->stations as $station)
								<option value="{{ $station->id }}" >{{ $station->address }}</option>
							@endforeach
						</select>
					</div>
					<button type="submit" class="btn btn-primary">Submit</button>
				</form>
			</div>
		</div>
	</div>
@endsection