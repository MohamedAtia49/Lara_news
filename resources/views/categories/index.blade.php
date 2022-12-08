@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header text-center">
                    <h2>All Categories</h2>
                    @if (session('message'))
                        <div class="alert alert-success text-center p-2">
                            <h1 class="text-success">{{ session('message') }}</h1>
                        </div>
                    @endif

                </div> <!-- card-header -->

                <div class="card-body text-center">
                    @if ($categories->count() > 0)
                    <table class="table table-striped table-hover table-bordered">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Category Name</th>
                                <th>Edit</th>
                                <th>Delete</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach ($categories as $key=>$category)
                            <tr>
                                <td>{{ $key+1 }}</td>
                                <td>{{ $category->name }}</td>
                                <td class="text-center"><a href="{{ route('categories.edit', ['category'=>$category]) }}" class="btn btn-warning"><i class="fa fa-edit"></i></a></td>
                                <td class="text-center">
                                    <form action="{{ route('categories.destroy', ['category'=>$category]) }}" method="post">
                                    @csrf
                                    @method('delete')

                                    <button type="submit" class="btn btn-danger"><i class='fa fa-trash'></i></button>
                                    </form>
                                </td>
                            </tr>
                             @endforeach
                        </tbody>

                    </table>
                    @else
                    <div class="alert alert-danger text-center p-2">
                        <h1 class="text-danger">No Categories</h1>
                    </div>
                    @endif





                </div> <!-- card-body -->
            </div> <!-- card -->
        </div> <!-- col-md-8 -->
    </div> <!-- row -->
</div>
@endsection
