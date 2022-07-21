@extends('admins/layout/main')
@section('container')
    <div class="container">
        <div class="d-sm-flex align-items-center justify-content-start mb-4">
            <h1 class="h3 mb-0 text-gray-800">Data User :</h1>
        </div>
        <table class="table table-bordered table-hover table-sm">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Alamat</th>
                    <th>Email</th>
                    <th>Foto</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <?php $i = 1; ?>
            @foreach ($users as $user)
                <tr>
                    <td>
                        {{ $i }}
                    </td>
                    <td>
                        {{ $user->name }}
                    </td>
                    <td>
                        {{ $user->alamat }}
                    </td>
                    <td>
                        {{ $user->email }}
                    </td>
                    <td>
                        <img src="{{ url('storage') }}/{{ $user->foto_profile }}" alt="" style="width: 100px;">
                    </td>
                    <td>
                        <form action="/delete-user" method="POST">
                            @csrf
                            <input type="hidden" value="{{ $user->id }}" name="id_user" id="id_user">
                            <button type="submit" class="btn btn-danger"><i class="bi bi-trash"></i></button>
                        </form>
                    </td>
                </tr>
                <?php $i++; ?>
            @endforeach
        </table>
    </div>
@endsection
