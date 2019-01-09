@extends('main')

@section('title', '| Profil')

@section('content')
    <div class="row">
        <div class="col-md-10">
            <h1>Profil</h1> <br> <br>
        </div>
        <div class="col-md-8">
            {!! Form::open(array('method'=>'patch', 'route' => ['profil.update', $user->id], 'data-parsley-validate' => '', 'files' => true)) !!}
            <input name="_method" type="hidden" value="PATCH">  
                {{ csrf_field() }}

                {{ Form::label('photo_profil', 'Photo Profil:') }} <br>
                {{ Html::image("images/profil/$user->photo",'alt',array('width'=>120, 'height'=>120)) }}  <br>
                {{ Form::file('upload_img') }} <br> <br>

                {{ Form::label('name','Name:') }}
                {{ Form::text('name', $user->name, array('class'=>'form-control', 'required' => '', 'maxLength' => '255')) }}

                {{ Form::label('email','Email:') }}
                {{ Form::text('email', $user->email, array('class'=>'form-control', 'required' => '', 'maxLength' => '255')) }}
                {{ Form::submit('Update', array('class' => 'btn btn-success btn-lg btn-block', 'style'=> 'margin-top:20px')) }}
            {!! Form::close() !!}

            {!! Form::open(array('method'=>'post', 'route'=>'sendPass')) !!}
                {{ csrf_field() }}
                <button type="submit" class="btn btn-primary">
                    <input type="hidden" name="email" value="{{$user->email}}">
                    Send Password Reset Link
                </button>
            {!! Form::close() !!}
        </div>
    </div>
    
@endsection