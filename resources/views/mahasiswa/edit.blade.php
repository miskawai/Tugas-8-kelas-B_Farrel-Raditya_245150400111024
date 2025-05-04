@extends('layout.template') 

<!-- START FORM -->
@section('konten')

    
<form action='{{url('mahasiswa/'.$data->nim)}}' method='post'>
    @csrf
    @method('PUT')
    <div class="my-3 p-3 bg-body rounded shadow-sm">
        <a href='{{url('mahasiswa')}}'class="btn btn-secondary"><< kembali</a>
        <div class="mb-3 row">
            <label for="nim" class="col-sm-2 col-form-label">NIM</label>
            <div class="col-sm-10">
                {{$data->nim}}
            </div>
        </div>
        <div class="mb-3 row">
            <label for="nama" class="col-sm-2 col-form-label">Nama</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name='nama' value="{{$data->nama}}" id="nama">
            </div>
        </div>
        <div class="mb-3 row">
            <label for="kendaraan" class="col-sm-2 col-form-label">Kendaraan</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name='kendaraan'value="{{$data->kendaraan}}" id="kendaraan">
            </div>
        </div>
        <div class="mb-3 row">
            <label for="kendaraan" class="col-sm-2 col-form-label"></label>
            <div class="col-sm-10"><button type="submit" class="btn btn-primary" name="submit">SIMPAN</button></div>
        </div>
</div>
</form>
@endsection
