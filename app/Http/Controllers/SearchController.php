<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use Session;

class SearchController extends Controller
{
    public function store(Request $request)
    {
        $this->validate($request, array(
            'search' => 'required|max:255'

        ));

        $posts=Post::all()->toArray();
        $search=$request->search;
        $res="";
        //dd($search);
        foreach ($posts as $post)
        {
            //dd($post);
            //dd($post['title']);
            if (strstr($post['title'], $search) || strstr($post['body'], $search))
            {
                if ($res)
                    $res=$res." ".$post['id'];
                else
                    $res=$res.$post['id'];
            }
            //dd('hi');
        }
        if ($res=="")
        {
            Session::flash('failure','Pas de resultat');
            return redirect()->route('posts.index');  
        }
        //dd($res);
        return redirect()->route('search.show', $res);        

    }

    public function show($posts)
    {
        //$posts = htmlspecialchars($posts);
        //dd($posts);
        //$post="aa";
        //dd(explode(' ', $posts));
        $all=Post::all();
        return view('search.show')->with(compact('posts'))->with(compact('all'));
    }

}
