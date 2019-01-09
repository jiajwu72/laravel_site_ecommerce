<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Session;
use Image;
use Storage;

class ProfilController extends Controller
{

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth')->except('login');
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();
        return view('profil.index')->with(compact('user'));
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
        /*
        $user = Auth::user();
        $this->validate($request, array(
            'name' => 'required|max:255',
            'email' => 'required|email',
        ));
        
        //dd($request->all());

        $user = new User;

        $user->name = $request->name;
        $user->email = $request->email;
        if ($request->hasFile('upload_img'))
        {
            $img=$request->file('upload_img');
            dd($img);
            $filename = time().'.'.$img->getClientOriginalExtension();
            $location = public_path('images/profil'.$filename);
            $img_file=Image::make($img);
            Image::make($img)->resize(100, 100)->save($location);
            $oldFile=$user->photo;
            $user->photo=$filename;
            Storage::delete('profil/'.$oldFile);
        }
        $user->save();

        Session::flash('success', 'The blog user was successfully saved');

        return redirect()->route('profil.index', $user);
        */
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
        //return view('profil.index')->with(compact('user'));
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
        $user = Auth::user();
        $this->validate($request, array(
            'name' => 'required|max:255',
            'email' => 'required|email',
        ));
        
        //dd($request->all());

        //$user = new User;

        $user->name = $request->name;
        $user->email = $request->email;
       // dd($user);

        if ($request->hasFile('upload_img'))
        {
            $img=$request->file('upload_img');
            $filename = time().'.'.$img->getClientOriginalExtension();
            $location = public_path('images/profil/'.$filename);
            $img_file=Image::make($img);
            Image::make($img)->resize(800, 400)->save($location);
            $oldFile=$user->photo;
            $user->photo=$filename;
            Storage::delete('profil/'.$oldFile);
        }
       // dd($user);
        $user->save();

        Session::flash('success', 'The blog user was successfully saved');

        return redirect()->route('profil.index', $user);
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
