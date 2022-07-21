@extends('users/layout/main')
@section('container')
    <div class="inner" style="height:500px;">
        <div class="d-sm-flex align-items-center justify-content-start mb-4">
            <a class="btn mt-2" style="background-color: #2a2f4a;" href="/dashboard"><i class="bi bi-arrow-left"
                    style="color: #ffffff;"></i></a>
            <h1 class="h3 mt-2 mx-3">Profile Anda :</h1>
        </div>
        @foreach ($users as $user)
            <div class="card mb-3 position-absolute top-50 start-50 translate-middle"
                style="max-width: 500px; height: auto;">
                <div class="row g-0" style="height:100%;">
                    <div class="col-md-4">
                        <img src="{{ url('storage') }}/{{ $user->foto_profile }}" class="img-fluid rounded"
                            style="width: 100%; height:100%;" alt="...">
                    </div>
                    <div class="col-md-8">
                        <div class="card-body">
                            <h5 class="card-title" style="color:black;">Nama : {{ $user->name }}</h5>
                            <h5 class="card-title" style="color: black;">Alamat : {{ $user->alamat }}</h5>
                            <h5 class="card-title" style="color: black;">Email : {{ $user->email }}</h5>
                            <a href="/profile/edit" class="btn btn-outline-dark rounded" style="color: black">Edit</a>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection
