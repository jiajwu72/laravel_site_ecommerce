


@extends('main')

@section('stylesheets')
    <link rel="stylesheet" type="text/css" href="style.scc">
@endsection

@section('title','| Homepage')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="jumbotron">
                <h1>High Thechnologie</h1>
                <p class="lead">Découcrir les meilleurs high tech produits</p>
                <p><a class="btn btn-primary btn-lg" href="#" role="button">Learn more</a></p>
            </div>
        </div>
        <!--end of header .tow-->
    </div>
    <div class="row">
        <div class="col-md-8">
            @foreach ($posts as $post)
            <div class="post">
                <h3>{{$post->title}}</h3>
                <p>{{ substr($post->body, 0, 50) }} {{strlen($post->body) > 50 ? "..." : ""}}</p>
                
            </div>
            @endforeach
            <hr>
        </div>

        <div class="col-md-3 col-md-offset-1" ">
            <h2>Promotion</h2>
        </div>
        
    </div>
@endsection