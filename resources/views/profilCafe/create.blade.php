@extends('dashboard.layouts.main')

@section('container')
<form class="col-lg-8" action="/profil-cafe/" method="POST">
    @method('POST')
    @csrf
  <div class="mb-3">
    <label for="nama_cafe1" class="form-label">Nama Cafe </label>
    <input type="text" class="form-control" id="nama_cafe1" name="nama_cafe">
  </div>
  <div class="mb-3">
    <label for="slug1" class="form-label">Slug </label>
    <input type="text" class="form-control" id="slug1" name="slug">
  </div>
  <div class="mb-3">
    <label for="gambar_logo1" class="form-label">gambar Logo </label>
    <input type="text" class="form-control" id="gambar_logo1" name="gambar_logo">
  </div>
  <div class="mb-3">
    <label for="gambar_profil1" class="form-label">Gambar Profil </label>
    <input type="text" class="form-control" id="gambar_profil1" name="gambar_profil">
  </div>
  <div class="mb-3">
    <label for="alamat" class="form-label">Alamat </label>
    <input type="text" class="form-control" id="alamat" name="alamat">
  </div>
  <div class="mb-3">
    <label for="map" class="form-label">Map</label>
    <input type="text" class="form-control" id="map" name="map">
  </div>
  <div class="mb-3">
    <label for="deskripsi" class="form-label">Deskripsi </label>
    <input type="text" class="form-control" id="deskripsi" name="deskripsi">
  </div>
  <div class="mb-3">
    <label for="no_telepon" class="form-label">No Telepon</label>
    <input type="number" class="form-control" id="no_telepon" name="no_telepon">
  </div>
  <div class="mb-3">
    <label for="user_id" class="form-label">User ID</label>
    <input type="number" class="form-control" id="user_id" name="user_id">
  </div>
  <div class="mb-3">
    <label for="jam" class="form-label">Jam</label>
    <input type="text" class="form-control" id="jam" name="jam">
  </div>
  
  <button type="submit" class="btn btn-primary">Submit</button>
</form>  
@endsection
