@extends('layouts.dashboard')

@section('title')
Dashboard | Manage User
@endsection


@section('content')
<div class="row">
    <div class="col-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Table Users</h4>
                <a class="btn btn-success btn-sm" style="margin-bottom: 24px;"
                    href="{{route('admin.users.create')}}">Tambah User</a>
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama.</th>
                                <th>Email</th>
                                <th>role</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $user)
                                                        <tr>
                                                            <td>{{$loop->iteration}}</td>
                                                            <td>{{$user->name}}</td>
                                                            <td>{{$user->email}}</td>
                                                            <td><span @class([
                                    'badge',
                                    'badge-info' => $user->role != 'admin',
                                    'badge-success' => $user->role == 'admin'
                                ])>{{$user->role}}
                                                                </span></td>
                                                            <td>
                                                                <form class="d-flex" action="{{ route('admin.users.destroy', $user->id)}}"
                                                                    method="POST">
                                                                    @csrf
                                                                    @method('DELETE')
                                                                    <button type="submit" class="btn btn-danger btn-sm m-1">Delete</button>
                                                                    <a class="btn btn-warning btn-sm m-1"
                                                                        href="{{route('admin.users.edit', $user->id)}}">Edit</a>
                                                                </form>
                                                            </td>
                                                        </tr>

                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection


@pushIf($message = Session::get('failed'), 'scripts')
    <script>
        Swal.fire({
            icon: "error",
            title: "Oops...",
            text: "{{$message}}",
        });
    </script>
@endPushIf
@pushIf($message = Session::get('success'), 'scripts')
    <script>
        Swal.fire({
            icon: "success",
            title: "Berhasil",
            text: "{{$message}}",
        });
    </script>
@endPushIf