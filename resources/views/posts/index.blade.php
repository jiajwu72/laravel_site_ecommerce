
@extends('main')

@section('title', '| All Posts')

@section('content')

    <div class="row">
        <div class="col-md-10">
            <ol class="breadcrumb">
                @if ($category_id==0)
                    <li class='active'>Toute</li>
                @else
                    <li><a href="{{url('posts?category_id=0')}}">Toute</a></li>
                @endif
                
                @foreach ($categories as $category)
                    @if($category_id == $category->id)
                        <li class='active'>{{$category->name}}</li>
                    @else
                        <li><a href="{{ route('posts.index', ['category_id'=>$category->id]) }}">{{$category->name}}</a></li>
                    @endif
                @endforeach
            </ol>
        </div>
        
        <div class="col-md-2">
            @if (Auth::user()->admin == 1)
                <a href="{{ route('posts.create') }}" class="btn btn-lg btn-block btn-primary btn-h1-spacing">Deposer Annonce</a>
            @endif
        </div>
        <hr>

        <div class="row">
            <div class="col-md-12">
                @foreach ($posts as $post)
                    <div class="col-md-5">
                        <a href="{{route('posts.show', $post->id)}}" class="btn btn-default">
                            {{Html::image("images/articles/$post->image", "alt", array('style'=>'margin-top:50px', 'height'=>300, 'width'=>300))}}
                        </a>
                        
                        
                            <h3>{{ $post->title }}</h3>  <br>
                            <h4>Prix:{{ $post->price." euros" }}</h4> 
                        
                    </div> 
                @endforeach
                

            </div>
        </div>


    </div>

@endsection
