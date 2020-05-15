@extends('layout.admin')
@section('content')
		<div class="panel-head">
		<div>
							<h3 align="center">Selamat Datang Di Kost Maju Makmur </h3>
							<h4>Berikut Daftar Kost Yang Tersedia :</h4>
							</div>
		</div>
		<div class="panel-body">
			<div class="col-lg-12">
				<table class="table table-bordered">
					<thead>
						<tr>
							<th>No</th><th>ID Kamar</th><th>Fasilitas</th><th>Status</th><th>Harga Sewa</th>
						</tr>
					</thead>
					<tbody>
						@foreach ($sewakost as $in=>$val) 
							<tr>
								<td>{{$in+1}}</td><td>{{$val->id_kamar}}</td><td>{{$val->fasilitas}}</td><td>{{$val->status}}</td><td>{{$val->harga_sewa}}</td>
								
							</tr>
						@endforeach
					</tbody>
				</table>
				{{$sewakost->links()}}		
			</div>
		</div>							
	</div>
</div>
@endsection