@extends('layouts.dashboard')

@section('title')
Dahsboard | Edit Kategori
@endsection


@section('content')
<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Profile Update</h4>
                        <form class="forms-sample" action="{{ route('admin.categories.update', $category->id) }}"
                            method="POST">
                            @csrf
                            @method("PUT")
                            <div class="form-group">
                                <label for="name">Name</label>
                                <input type="text" name="name" class="form-control" id="name" placeholder="name"
                                    value="{{$category->name}}">
                                @error('name')
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