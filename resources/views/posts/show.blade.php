@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header text-center">
                    <h2>Post Details</h2>

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
                   <img src="{{ asset($post->image) }}" alt="">
                   <h2>{{ $post->title }}</h2>
                   <p>{{ $post->content }}</p>
                </div> <!-- card-body -->
            </div> <!-- card -->
        </div> <!-- col-md-8 -->
    </div> <!-- row -->
</div>
@endsection
