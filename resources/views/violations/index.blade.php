@extends('layouts.app')

@section('content')
<div class="container">
	<div class="row">
		<div class="col">
			<h3>Daftar Pelanggaran</h3>
			<br/>

			@if(session()->has('success'))
				<div class="alert alert-success">
					<p>{{session()->get('success') }}</p>
				</div><br/>
			@endif

			<a href="{{ route('violations.create') }}" class="btn btn-primary"><span class="fa fa-plus"> Tambah Pelanggaran</a><br/><br/>

			<!-- List Pelanggaran -->
			<table class="table table-bordered table-striped">
				<thead>
					<tr>
						<th>Nomor Pelanggaran</th>
						<th>Nama Petugas</th>
						<th>Lokasi Pos</th>
						<th>Nama Pelanggar</th>
						<th>Identitas Pelanggar</th>
						<th>Aksi</th>
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
							<td>
								<div class="btn-group" role="group">
									<a href="{{ route('violations.edit' , $item) }}">
										<button type="button" class="btn btn-info">
											<span class="fa fa-pencil"></span> Edit
										</button>
									</a>
									&nbsp; &nbsp;
									<form action="{{ route('violations.destroy' , $item) }}" method="POST">
										{{ csrf_field() }}
										@method('DELETE')
										<input type="submit" class="btn btn-danger" value="Delete"/>
									</form>
								</div>
							</td>
						</tr>
					@endforeach
				</tbody>
			</table>

			{!! $items->links() !!}
		</div>
	</div>
</div>
@endsection