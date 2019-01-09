@extends('main')

@section('title', '| Administration')

@section('content')


    <div class="row">
        <div class="col-md-12">
            <table class="table">
                <thead>
                    <th>#</th>
                    <th>Photo Profil</th>
                    <th>Pseudo</th>
                    <th>Email</th>
                    <th>Statut</th>
                    <th>Creer Le</th>
                    <th></th>
                </thead>
                <tbody>
                    
                @foreach ($users as $user)
                    <tr>
                        <th>{{ $user->id }}</th>
                        <td>{{ Html::image("/images/profil/$user->photo", 'alt', array('width'=>40, 'height'=>40)) }}</td>
                        <td>{{ $user->name}}</td>
                        <td>{{ $user->email}}</td>
                        <td>{{ $user->admin == 1 ? "admin" : "membre"}}</td>
                        <td>{{ $user->created_at }}</td>
                        @if ($user->admin == 0)
                            <td>
                                {!! Form::open(array('route'=>['administration.destroy', $user->id], 'method'=>'DELETE')) !!}
                                    {!! Form::submit('Supprimer', ['class' => 'btn btn-danger']) !!}
                                {!! Form::close() !!}
                                
                            </td>
                        @endif    
                    </tr>
                @endforeach

                </tbody>
            </table>
            
        </div>
    </div>


@endsection
