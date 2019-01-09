@extends('main')

@section('title', '| Edit Post')

@section('stylesheets')
    {!! Html::style('css/parsley.css') !!}
@endsection

@section('content')

    {!! Form::model($post, array('route' => ['posts.update', $post->id], 'method'=>'put', 'data-parsley-validate' => '', 'files' => true)) !!}
    {{ csrf_field() }}
    <div class='row'>
        <div class="col-md-8">
            {!! Form::label('title', 'Title:') !!}
            {!! Form::text('title', null, array('class' => 'form-control', 'required' => '')) !!}
            <hr>
            {{Html::image("/images/articles/$post->image")}}
            {{ Form::label('upload_img', 'Upload Image:') }}
            {{ Form::file('upload_img') }}
            {!! Form::label('body', 'Body:') !!}
            {!! Form::textarea('body', null, ["class" => 'form-control', 'required' => ''])!!}
            <select name="category" class='form-control'>
                @foreach ($category as $event)
                    <option value="{{$event->id}}">{{$event->name}}</option>
                @endforeach
            </select>
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
                        <input type="submit" value="save" class="btn btn-block btn-success">
                    </div>
                    <div class="col-sm-6">
                        {!! Html::linkRoute('posts.show', 'Cancel', array($post->id), array('class' =>
                        'btn btn-danger btn-block')) !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
    {!!Form::close()!!}
@endsection 