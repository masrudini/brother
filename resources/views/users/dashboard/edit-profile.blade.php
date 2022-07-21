@extends('users/layout/main')
@section('container')
    <div class="inner" style="height:500px;">
        <div class="d-sm-flex align-items-center justify-content-start mb-2">
            <a class="btn" style="background-color: #2a2f4a;" href="/dashboard/profile"><i class="bi bi-arrow-left"
                    style="color: #ffffff;"></i></a>
            <h1 class="h3 mx-3">Edit Profile Anda :</h1>
        </div>
        <form action="/save-profile" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="d-sm-flex align-items-center justify-content-center">
                <div class="fields" style="width: 50%;">
                    <div class="field half mb-2">
                        <label for="nama">Nama</label>
                        <input type="text" value="{{ auth()->user()->name }}" style="border-radius: 10px;"
                            name="nama" id="nama" />
                    </div>
                    <div class="field half mb-2">
                        <label for="alamat">Alamat</label>
                        <input type="text" style="border-radius: 10px;" value="{{ auth()->user()->alamat }}"
                            name="alamat" id="alamat" value="" />
                    </div>
                    <div class="field half mb-2">
                        <label for="email">Email</label>
                        <input type="text" style="border-radius: 10px;" value="{{ auth()->user()->email }}"
                            name="email" id="email" value="" />
                    </div>
                    <div class="field half mb-4">
                        <label for="foto">Upload Foto Profile</label>
                        <input type="file" class="form-control @error('foto') is-invalid @enderror"
                            style="background:rgba(212, 212, 255, 0.035); color:#ffffff;" name="foto" id="foto" />
                        @error('foto')
                            {{ $message }}
                        @enderror
                    </div>
                    <div class="field half text-right">
                        <button type="submit" class="btn btn-outline-light btn-sm">SAVE</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection
