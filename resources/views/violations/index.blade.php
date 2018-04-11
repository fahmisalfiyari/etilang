@extends('layouts.app')

@section('content')
<div class="container">
	<div class="row">
		<div class="col">
			<h3>Daftar Pelanggaran</h3>
			<br/>
			<a href="{{ route('violations.create') }}" class="btn btn-primary"><span class="fa fa-plus"> Tambah Pelanggaran</a>

			<!-- List Pelanggaran -->
			<table class="table table-bordered table-striped">
				<thead>
					<tr>
						<th>Nomor Pelanggaran</th>
						<th>Nama Pelanggar</th>
						<th>Identitas Pelanggar</th>
						<th>Aksi</th>
					</tr>
				</thead>
				<tbody>
					@foreach ($items as $item)
						<tr>
							<td>{{ $item->id }}</td>
							<td>{{ $item->violator_name }}</td>
							<td>{{ $item->violator_identity_number }}</td>
							<td>
								<a href="{{ route('violations.edit' , $item->id) }}" class="btn btn-info"><span class="fa fa-pencil"></span> Edit</a>
								<a href="" class="btn btn-danger"><span class="fa fa-trash"></span>Delete</a>
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