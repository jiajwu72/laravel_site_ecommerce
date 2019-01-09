@extends('main')

@section('title', '| Create New Post')

@section('stylesheets')
    {!! Html::style('css/parsley.css') !!}
@endsection

@section('content')
    
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            
            
            {!! Form::open(array('method'=>'post', 'route' => 'posts.store', 'data-parsley-validate' => '', 'files' => true)) !!}
                {{ csrf_field() }}
                {{ Form::label('title', 'Title:') }}
                {{ Form::text('title', null, array('class' => 'form-control', 'required' => '', 'maxLength' => '255')) }}

                {{ Form::label('upload_img', 'Upload Image:') }}
                {{ Form::file('upload_img') }}
                {{ Form::label('price', "price:(Euro)") }}
                {{Form::text('price', null, array('class' => 'form-control', 'required' => '', 'maxLength' => '10'))}}
                {{ Form::label('body', "Description:") }}
                {{ Form::textarea('body', null, array('class' => 'form-control', 'required' => '', 'minLength' => '10')) }}

                {{ Form::label('category', "Category:") }}
                <select name="category" class='form-control'>
                    @foreach ($category as $event)
                        
                        <option value="{{$event->id}}">{{$event->name}}</option>
                    @endforeach
                </select>

                {{ Form::submit('Publish', array('class' => 'btn btn-success btn-lg btn-block')) }}
            {!! Form::close() !!}
        </div>
    </div>
@endsection

@section('scripts')
    {!! Html::script('js/parsley.min.js') !!}
@endsection