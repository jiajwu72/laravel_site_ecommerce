@extends('main')

@section('title', '| Administration')

@section('content')


    <div class="row">
        <div class="col-md-12">
            <table class="table">
                <thead>
                    <th>#</th>
                    <th>Photo Profil</th>
                    <th>Prix</th>
                    <th>Quantité </th>
                </thead>
                <tbody>
                <?php   
                    $somme=0; 
                    $st=$panniers->get();
                    $id=0;
                ?>
                <tr>
                @foreach ($st as $pannier)
                    <tr>
                        <th>{{ $id++ }}</th>
                        <?php
                            //$post=$posts->where('id', $pannier->post_id)->first();
                            //dd('here');
                            //dd($posts);

                            //$post=$posts->where('id', $pannier->post_id)->first();
                            //echo (int)($pannier->post_id);
                            //dd($posts->where('id', 11));
                            $post=$posts->where('id', (int)($pannier->post_id))->first();
                            //echo $pannier->post_id;
                            //dd($post);
                            //dd($post);
                            //dd('1');
                            //dd($post);
                            $img=$post->image;
                            //dd('2');
                            $prix=$post->price;
                            //dd('3');
                        ?>
                        <td><a href="{{route('posts.show', $post->id)}}">{{ Html::image("/images/articles/$img", 'alt', array('width'=>80, 'height'=>80))  }}</a></td>
                        <td>{{ $prix }}</td>
                        <td>{{ Form::text('number', $nb=$pannier->post_number, array('class' => 'form-control', 'style'=>'width:60px')) }}</td>
                        <?php $somme+= $pannier->post_prix_total; ?>
                    </tr>
                @endforeach
                <td></td>
                <td></td>
                <td></td>
                
                <td>{!! Form::submit('Payer', array('class' => 'btn btn-primary btn-block')) !!}</td>
                </tr>
                
                </tbody>
            </table>
            
        </div>
    </div>


@endsection
