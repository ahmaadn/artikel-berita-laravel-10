@extends('layouts.dashboard')

@section('title')
Dashboard | Crete Artikel
@endsection


@section('content')
<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Buat Artikel</h4>
                        <form class="forms-sample" action="{{ route('articles.store') }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="title">Title</label>
                                <input type="text" name="title" class="form-control" id="title" placeholder="Title"
                                    value="{{old('title')}}">
                                @error('title')
                                    <span class="text-danger">
                                        {{ $message}}
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="category_id">kategori</label>
                                <select name="category_id" class="form-control" id="category_id">
                                    @foreach ($categories as $category)
                                        <option value="{{$category->id}}" @if (old('category_id') == $category->id) selected
                                        @endif>
                                            {{$category->name}}
                                        </option>
                                        >User</option>
                                    @endforeach
                                </select>
                                @error('category_id')
                                    <span class=" text-danger">
                                        {{ $message}}
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="content">Konten</label>
                                <textarea name="content" class="form-control" id="content" placeholder="content"
                                    style="min-height: 20rem"> </textarea>
                            </div>
                            <div class="form-group ">
                                <label for="image">Gambar</label>
                                <img class="img-fluid rounded" width="400" id="output-image" />
                                <input type="file" name="image" class="form-control" id="image" placeholder="image"
                                    onchange="loadFile(event)" accept="image/png, image/jpeg">
                                @error('image')
                                    <span class="text-danger">
                                        {{ $message}}
                                    </span>
                                @enderror
                            </div>
                            <button type="submit" class="btn btn-primary mr-2">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
    <script>
        var loadFile = function (event) {
            var output = document.getElementById('output-image');
            output.src = URL.createObjectURL(event.target.files[0]);
            output.classList.add('mb-6')
            output.onload = function () {
                URL.revokeObjectURL(output.src) // free memory
            }
        };
    </script>
@endpush
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