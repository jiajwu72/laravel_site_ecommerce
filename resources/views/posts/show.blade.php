@extends('main')

@section('title', '| View Post')

@section('content')
    <div class='row'>
        <div class="col-md-8">
            <h1>{{ $post->title }}</h1>
            {{Html::image("/images/articles/$post->image")}}
            {{ Form::label('price', 'Prix(en euro):') }}
            {{ $post->price.' euros' }}
            <br>
            {{ Form::label('description', 'Description:') }}
            <p class="lead"> {{$post->body}} </p>
            {{ Form::label('number', 'Quantité:') }}
            {!! Form::open(array('route'=>'pannier.store', 'method'=>'post')) !!}
                <input type="hidden" name="post_id" value={{$post->id}}>
                {{ Form::text('number', 1, array('class' => 'form-control', 'style'=>'width:60px')) }}
                {!! Form::submit('Valider', array('class' => 'btn btn-primary btn-block')) !!}
            {!! Form::close() !!}
            <h5> Commentaire: </h5>
            <?php 
                $i = 0; 
                //dd($st);
            ?>
            @foreach ($comments as $comment)
                <div class="col-md-7">
                    <?php 
                    $user=$users->where('id', $comment->user_id);
                    //dd($user);
                    $user=$user->first();
                    $photo = "/images/profil/".$user->photo;
                    ?>
                    
                    {{Html::image("$photo", "alt", array('style'=>'border-radius:50%', 'height'=>45, 'width'=>45))}}
                    <span style="margin-left:2px">{{ $user->name.' :' }}</span> 
                    
                    <p class='well'>{{$comment->content}}</p>
                    
                </div>
                
            @endforeach
            <br><br>
            <div class="col-md-6">
                <p>Laisser une commentaire:</p>
            </div>
            {!! Form::open(array('route'=>'comment.store', 'method'=>'post')) !!}
                <input type="hidden" name="post_id" value={{$post->id}}>
                {!! Form::textarea('write_comment', null, array('class' => 'form-control', 'required' => '', 'minLength' => '10')) !!}
                {!! Form::submit('Valider', ['class' => 'btn btn-primary btn-block']) !!}
            {!! Form::close() !!}
        </div>
        
        
        <div class="col-md-4">
            <div class="well well-sm">
                <dl class="dl-horizontal">
                    <dt>Created At:</dt>
                    <dd>{{ $post->created_at }}</dd>
                </dl>
                <dl class="dl-horizontal">
                    <dt>Last Updated:</dt>
                    <dd>{{ $post->updated_at }}</dd>
                </dl>
                <hr>
                <div class="row">
                    <div class="col-sm-6">
                        {!! Html::linkRoute('posts.edit', 'Edit', array($post->id), array('class' =>
                        'btn btn-primary btn-block')) !!}
                    </div>
                    <div class="col-sm-6">
                        {!! Form::open(array('route'=>['posts.destroy', $post->id], 'method'=>'DELETE')) !!}
                                {!! Form::submit('Delete', ['class' => 'btn btn-danger btn-block']) !!}
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection 