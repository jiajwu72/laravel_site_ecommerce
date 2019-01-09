
@extends('main')

@section('title', '| All Posts')

@section('content')
    <?php
        $posts = explode(' ', $posts);
        $i=0;
    ?>
    
    <div class="row">
        
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
                        <?php
                            $post = $all->where('id', (int)$post);
                            //dd(' ');
                            $post=$post->toArray();
                            $post=array_pop($post);
                            //dd($post);
                            
                            $img=$post['image'];
                            $price=$post['price'];
                            $id=$post['id'];
                            $title=$post['title'];
                            $i++;
                        ?>
                        <a href="{{route('posts.show', $id)}}" class="btn btn-default">
                            {{Html::image("images/articles/$img", "alt", array('style'=>'margin-top:50px', 'height'=>300, 'width'=>300))}}
                        </a>
                        
                        
                            <h3>{{ $title }}</h3>  <br>
                            <h4>Prix:{{ $price." euros" }}</h4> 
                        
                    </div> 
                    
                @endforeach
                

            </div>
        </div>


    </div>

@endsection