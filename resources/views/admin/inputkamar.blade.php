@extends('layout.admin')
@section('content')
<div class="panel panel-headline">
    <div class="panel">
        <div class="panel-heading">
           <h3 class="panel-title">Input Kamar</h3>
        </div>
        <form action="{{(isset($sewakost))?route('sewa.update',$sewakost->id_kamar):route('sewa.store')}}" method="POST">
            @csrf
            @if(isset($sewakost))@method('PUT')
            @endif
            <div class="panel-body">
            <input type="text" value="{{(isset($sewakost))?$sewakost->id_kamar:old('id_kamar')}}" name="id_kamar" class="form-control" placeholder="ID Kamar">
                @error('id_kamar')<small style="color:red">{{$message}}</small>@enderror
                <br>
                <input type="text" value="{{(isset($sewakost))?$sewakost->fasilitas:old('fasilitas')}}" name="fasilitas" class="form-control" placeholder="Fasilitas">
                @error('fasilitas')<small style="color:red">{{$message}}</small>@enderror
                <br>
                <input type="text" value="{{(isset($sewakost))?$sewakost->status:old('status')}}" name="status" class="form-control" placeholder="Status">
                <select name="status" class="form-control">
                    <option value="kosong">Kosong</option>
                    <option value="disewa">Disewa</option>
                </select>
                @error('status')<small style="color:red">{{$message}}</small>@enderror
                <br>
                <input type="text" value="{{(isset($sewakost))?$sewakost->harga_sewa:old('harga_sewa')}}" name="harga_sewa" class="form-control" placeholder="Harga Sewa">
                @error('harga_sewa')<small style="color:red">{{$message}}</small>@enderror
                <br>
                <div class="form-group">
                    <button type="submit">Simpan</button>    
                </div> 
            </div> 
        </form>          
    </div>
</div>
@endsection