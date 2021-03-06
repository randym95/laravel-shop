@extends('layouts.global')
@section('title')
    Trashed categories
@endsection
@section('pageTitle')
    Trashed categories
@endsection
@section('content')

    @if (session('status'))
        <div class="row">
            <div class="col-md-12">
                <div class="alert alert-warning">
                    {{ session('status') }}
                </div>
            </div>
        </div>
    @endif

    <div class="row">
        <div class="col-md-6">
            <form action=" {{ route('categories.index') }} ">
                <div class="input-group">
                    <input type="text" class="form-control" placeholder="Filter by category name" name="name" value=" {{ Request::get('name') }} ">
                    <div class="input-group-append">
                        <input type="submit" value="Filter" class="btn btn-primary">
                    </div>
                </div>
            </form>
        </div>

        <div class="col-md-6">
            <ul class="nav nav-pills card-header-pills">
               <li class="nav-item">
                    <a href=" {{ route('categories.index') }} " class="nav-link">
                        Published
                    </a>
               </li>

               <li class="nav-item">
                    <a href=" {{ route('categories.trash') }} " class="nav-link active">
                        Trash
                    </a>
               </li>
            </ul>
        </div>
    </div>
    <hr class="my-3">

    <div class="row">
        <div class="col-md-12">
            <table class="table table-bordered table-stripped">
                <thead>
                    <tr>
                        <th><b>Name</b></th>
                        <th><b>Slug</b></th>
                        <th><b>Image</b></th>
                        <th><b>Actions</b></th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($categories as $category)
                        <tr>
                            <td>{{ $category->name }}</td>
                            <td>{{ $category->slug }}</td>
                            <td>
                                @if ($category->image)
                                <img src=" {{ asset('storage/'.$category->image) }} " width="48px">
                                @else
                                    No Image    
                                @endif
                            </td>

                            <td>
                                <a href=" {{ route('categories.restore', ['id' => $category->id]) }} " class="btn btn-success btn-sm">
                                    Restore
                                </a>

                                <form action=" {{ route('categories.delete-permanent', ['id' => $category->id]) }} " method="POST" onsubmit="return confirm('Delete this category permanently?')" class="d-inline">
                                    @csrf
                                    @method('DELETE')

                                    <input type="submit" class="btn btn-danger btn-sm" value="Delete">
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>

                <tfoot>
                    <tr>
                        <td colspan="10">
                            {{ $categories->appends(Request::all())->links() }}
                        </td>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>
@endsection