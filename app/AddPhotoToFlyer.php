<?php

namespace App;

use Symfony\Component\HttpFoundation\File\UploadedFile;

class AddPhotoToFlyer {
	
	/**
	 * The Flyer instance
	 * @var Flyer
	 */
	protected $flyer;

	/**
	 * The UploadedFile instance
	 * @var UploadedFile
	 */
	protected $file;


	protected $thumbnail;

	/**
	 * Create a new AddPhotoToFlyer object.
	 * @param Flyer          $flyer     
	 * @param UploadedFile   $file      
	 * @param Thumbnail|null $thumbnail 
	 */
	function __construct(Flyer $flyer, UploadedFile $file, Thumbnail $thumbnail = null) {
		$this->flyer = $flyer;
		$this->file = $file;
		$this->thumbnail = $thumbnail ?: new Thumbnail;
	}

	/**
	 * Process the form
	 * @return void 
	 */
	public function save() {
		$photo = $this->flyer->addPhoto($this->makePhoto());

		$this->file->move($photo->baseDir(), $photo->name);

		$this->thumbnail->make($photo->path, $photo->thumbnail_path);
	}

	/**
	 * Make a new photo instance
	 * @return Photo 
	 */
	protected function makePhoto() {
		return new Photo(['name' => $this->makeFileName()]);
	}

	/**
	 * Make a file name, based on the uploaded file.
	 * 
	 * @return string 
	 */
	protected function makeFileName() {
		$name = sha1(
            time() . $this->file->getClientOriginalName()
        );

        $extension = $this->file->getClientOriginalExtension();

        return "{$name}.{$extension}";
	}
}
