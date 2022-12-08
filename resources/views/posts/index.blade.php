@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header text-center">
                    <h2>All posts</h2>
                    @if (session('message'))
                        <div class="alert alert-success text-center p-2">
                            <h1 class="text-success">{{ session('message') }}</h1>
                        </div>
                    @endif

                </div> <!-- card-header -->

                <div class="card-body text-center">
                    @if ($posts->count() > 0)
                    <table class="table table-striped table-hover table-bordered">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Post Title</th>
                                <th>Post image</th>
                                {{-- <th>Post Content</th> --}}
                                <th>Details</th>
                                <th>Edit</th>
                                <th>Delete</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach ($posts as $key=>$post)
                            <tr>
                                <td>{{ $key+1 }}</td>
                                <td>{{ $post->title }}</td>
                                <td><img src="{{ $post->image }}" height="50" width="50" alt=""></td>
                                {{-- <td>{{ $post->content }}</td> --}}
                                <td class="text-center"><a href="{{ route('posts.show', ['post'=>$post]) }}" class="btn btn-success"><i class="fa fa-eye"></i></a></td>
                                <td class="text-center"><a href="{{ route('posts.edit', ['post'=>$post]) }}" class="btn btn-warning"><i class="fa fa-edit"></i></a></td>
                                <td class="text-center">
                                    <form action="{{ route('posts.destroy', ['post'=>$post]) }}" method="post">
                                    @csrf
                                    @method('delete')

                                    <button type="submit" class="btn btn-danger"><i class='fa fa-trash'></i></button>
                                    </form>
                                </td>
                            </tr>
                             @endforeach
                        </tbody>
                    </table>
                    <div class="w-50 mx-auto">{{ $posts->links() }}</div>
                    @else
                    <div class="alert alert-danger text-center p-2">
                        <h1 class="text-danger">No posts</h1>
                    </div>
                    @endif





                </div> <!-- card-body -->
            </div> <!-- card -->
        </div> <!-- col-md-8 -->
    </div> <!-- row -->
</div>
@endsection
