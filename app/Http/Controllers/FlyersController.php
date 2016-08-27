<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use App\Http\Requests\FlyerRequest;
use App\Flyer;
use App\Photo;

class FlyersController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['show']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $flyers = Flyer::all();
        return view('flyers.index', compact('flyers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // flash()->overlay('Hello World!', 'This is a message.');

        return view('flyers.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  App\Http\Requests\FlyerRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(FlyerRequest $request)
    {        
        Flyer::create($request->all());
        
        flash()->success('Success!', 'Your flyer has been created.');

        return redirect('/flyers');
    }    
    
    /**
     * Display the specified resource
     * 
     * @param  string $zip    
     * @param  string $street 
     * @return \Illuminate\Http\Response
     */
    public function show($zip, $street)
    {
        $flyer = Flyer::locatedAt($zip, $street);

        return view('flyers.show', compact('flyer'));
    }

    /**
     * Applying a photo to the refenreced flyer.
     * 
     * @param string  $zip     
     * @param string  $street  
     * @param Request $request 
     */
    public function addPhoto($zip, $street, Request $request) {

        $this->validate($request, [
            'photo' => 'required|mimes:jpg,jpeg,png,bmp'
        ]);        

        $photo = $this->makePhoto($request->file('photo'));

        Flyer::locatedAt($zip, $street)->addPhoto($photo);        
    }

    public function makePhoto(UploadedFile $file) {
        return Photo::named($file->getClientOriginalName())
                ->move($file);
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
