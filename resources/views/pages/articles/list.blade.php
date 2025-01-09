@extends('layouts.dashboard')

@section('title')
Dashboard | Manage User
@endsection


@section('content')
<div class="row">
    <div class="col-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Daftar Atikel</h4>
                <a class="btn btn-success btn-sm" style="margin-bottom: 24px;"
                    href="{{route('articles.create')}}">Tambah Artikel</a>
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>title</th>
                                <th>author</th>
                                <th>Kategori</th>
                                <th>Komentar</th>
                                <th>Suka</th>
                                <th>dibuat</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($articles as $article)
                                <tr>
                                    <td>{{$loop->iteration}}</td>
                                    <td>
                                        <a href="{{route('articles.detail', [$article->id])}}">{{$article->title}}
                                        </a>
                                    </td>
                                    <td>{{$article->user->name}}</td>
                                    <td>{{$article->category->name}}</td>
                                    <td>{{count($article->comments)}}</td>
                                    <td>{{count($article->likes)}}</td>
                                    <td>{{$article->created_at}}</td>
                                    <td>
                                        <form class="d-flex" action="{{route('articles.destroy', $article->id)}}"
                                            method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm m-1">Delete</button>
                                            <a href="{{route('articles.edit', $article->id)}}"
                                                class="btn btn-warning btn-sm m-1">Edit</a>
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