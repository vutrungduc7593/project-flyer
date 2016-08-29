<?php

namespace App\Http\Controllers;

use App\Flyer;
use App\AddPhotoToFlyer;
use App\Http\Requests\AddPhotoRequest;

class PhotosController extends Controller
{
    /**
     * Applying a photo to the refenreced flyer.
     * 
     * @param string  $zip     
     * @param string  $street  
     * @param AddPhotoRequest $request 
     */
    public function store($zip, $street, AddPhotoRequest $request) {
        $flyer = Flyer::locatedAt($zip, $street);

        $photo = $request->file('photo');

        (new AddPhotoToFlyer($flyer, $photo))->save();
    } 
}
