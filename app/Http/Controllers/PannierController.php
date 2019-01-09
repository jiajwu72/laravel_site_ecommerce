<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pannier;
use App\Post;
use Auth;
use Session;

class PannierController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $panniers = Pannier::where('user_id', Auth::user()->id);
        //dd($panniers->get());
        $posts = Post::all();

        return view('pannier.index')->with(compact('panniers'))->with(compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $this->validate($request, array(
            'number'=>'integer'
        ));
        $st=Pannier::where('post_id', $request->post_id)->first();
        //dd($st);
        if (!$st)
        {
            $pannier = new Pannier;
            $pannier->user_id = Auth::user()->id;
            $pannier->post_id = $request->post_id;
            $pannier->post_number = $request->number;
            $pannier->post_prix_total = $request->number * Post::where('id', $request->post_id)->first()->price;
        }
        else
        {
            $pannier=Pannier::where('post_id', $request->post_id)->first();
            //dd($pannier);
            $pannier->post_number += $request->number;
            $pannier->post_prix_total += $request->number * Post::where('id', $request->post_id)->first()->price;
        }
        $pannier->save();
        Session::flash('success', "l'article a été ajouté dans votre pannier");
        return redirect()->route('pannier.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
