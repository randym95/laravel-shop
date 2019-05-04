@extends('layouts.global')
@section('title')
    Edit Category
@endsection
@section('pageTitle')
    Edit Category {{ $category->name }}
@endsection
@section('content')
    
    @if (session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>        
    @endif

    <div class="col-md-8">
        <form action=" {{ route('categories.update', ['id' => $category->id]) }} " class="bg-white shadow-sm p-3" method="POST" enctype="multipart/form-data">
            @csrf
            <input type="hidden" value="PUT" name="_method">


            <label>Category Name</label>
            <br>
            <input type="text" class="form-control {{ $errors->first('name') ? "is-invalid" : "" }}" value=" {{ old('name') ? old('name') : $category->name }} " name="name">
            <div> 
                {{ $errors->first('name') }}
            </div>
            <br>
            <br>

            <label>Category slug</label>
            <br>
            <input type="text" class="form-control {{ $errors->first('slug') ? "is-invalid" : "" }}" value=" {{ old('slug') ? old('slug') : $category->slug }} " name="slug">
            <br>
            <br>

            <label>Category Image</label>
            <br>
            @if ($category->image)
                <span>Current image</span>
                <br>
                <img src=" {{ asset('storage/'.$category->image) }} " width="120px">
                <br>
                <br>
            @endif

            <input type="file" class="form-control {{ $errors->first('image') ? "is-invalid" : "" }}" name="image">
            <small class="text-muted">Kosongkan jika tidak ingin mengubah gambar</small>
            <div class="invalid-feedback">
                {{ $errors->first('image') }}
            </div>
            <br>
            <br>

            <input type="submit" class="btn btn-primary" value="Update">


        </form>
    </div>
@endsection