@extends('layouts.dashboard')

@section('title')
Dashboard
@endsection

@section('content')
<div class="row">
    <div class="col-sm-6">
        <h3 class="mb-0 font-weight-bold">Selamat datang di dashboard</h3>
        <p>{{auth()->user()->name}}</p>
    </div>
</div>
<div class="row">
    <div class="col-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Table Artikel</h4>
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>title</th>
                                <th>author</th>
                                <th>Kategori</th>
                                <th>Komentar</th>
                                <th>Likes</th>
                                <th>dibuat</th>
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
