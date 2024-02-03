@extends('admin.layouts.main')

@section('container')
    <div class="container">

        {{-- Page Title --}}
        <div class="row mb-4">
            <h3>
                Dashboard
            </h3>
        </div>

        {{-- Alert --}}
        <div class="alert alert-warning alert-dismissible fade show" role="alert">
            <strong>Halo!</strong> Anda telah masuk sebagai Administrator
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>

        {{-- Card Row --}}
        <div class="row">
            <div class="col-4">
                <div class="card bg-primary text-light p-3 shadow-sm">
                    <h2>50</h2>
                    <br>
                    <h6>Pengguna</h6>
                </div>
            </div>
            <div class="col-4">
                <div class="card bg-secondary text-light p-3 shadow-sm">
                    <h2>21</h2>
                    <br>
                    <h6>Kafe</h6>
                </div>
            </div>
            <div class="col-4">
                <div class="card bg-success text-light p-3 shadow-sm">
                    <h2>15</h2>
                    <br>
                    <h6>Langganan</h6>
                </div>
            </div>
        </div>
    </div>
@endsection
