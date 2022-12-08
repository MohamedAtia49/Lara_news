@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header text-center">
                    <h2>Create New post</h2>

                    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

                </div> <!-- card-header -->

                <div class="card-body text-center">
                    <form action="{{ route('posts.update', ['post'=>$post]) }}" method="post">
                        @csrf
                        @method('put')
                        <input type="text" name="name" value="{{ $post->title }}" class="form-control form-control-lg mb-3" placeholder="post Name">
                        <button type="submit" class="btn btn-lg btn-danger">Update Post</button>
                    </form>
                </div> <!-- card-body -->
            </div> <!-- card -->
        </div> <!-- col-md-8 -->
    </div> <!-- row -->
</div>
@endsection
