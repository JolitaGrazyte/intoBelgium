<?php
namespace App\Libraries;

use Auth;
use File;
use Config;
use Storage;
use App\Image;
use Intervention\Image\Facades\Image as InterventionImg;

/**
 * Class Image
 * @package App\Libraries
 */
class ImageLib {

    /**
     * @var InterImage
     */
    protected $interImg;

    /**
     *
     */
    public function __construct()
    {
        $this->interImg = new InterventionImg();
    }

    /**
     * @param $image
     * @return Media
     */
    public function addImage($image, $imgObj, $toName, $user_id){

        $name = $toName;

        $filename = str_replace(' ', '-', $name);

        $extension = $image->getClientOriginalExtension();
        Storage::disk('local')->put($filename . '.' . $extension, File::get($image));
        $entry = $imgObj;
        $entry->name = $name;
        $entry->imageable_id = $user_id;

        $entry->imageable_type = 'App\User';
//            $entry->mime = $image->getClientMimeType();
//            $entry->original_filename = $image->getClientOriginalName();
        $entry->filename = $filename . '.' . $extension;
        $entry->save();


//        //get extension of the image
//        $extension  = $image->getClientOriginalExtension();
//
//        //put the file in the local storage
//        Storage::disk('local')->put($image->getFilename().'.'.$extension,  File::get($image));
//
//        //make new media model with the given data
//        $image = new Image([
//            'name'  => $image->getFilename().'.'.$extension
//        ]);
//
//
//


        //save mime and original filename to the database
//        $media->mime              = $image->getClientMimeType();
//        $media->original_filename = $image->getClientOriginalName();

        //finally save it to the database and add the authors id
//        Auth::user()->media()->save($media);

        return $entry;

    }

    /**
     * Resize function.
     * @param $filename
     * @param $sizeString
     * @return blob image contents.
     * @internal param filename $string
     * @internal param sizeString $string
     *
     */
    public function resize_image($filename, $sizeString) {


        // Get the output path from our configuration file.
        $outputDir = Config::get('assets.images.paths.output');

        // Create an output file path from the size and the filename.
        $outputFile = $outputDir.'/'. $sizeString . '_' . $filename;

        // If the resized file already return it.
        if (File::isFile($outputFile)) {
            return File::get($outputFile);
        }

        // File doesn't exist yet - resize the original.
        $inputDir = Config::get('assets.images.paths.input');
        $inputFile = $inputDir . '/' . $filename;


        // Get the width of the chosen size from the Config file.
        $sizeArr = Config::get('assets.images.sizes.'.$sizeString);
        $width = $sizeArr['width'];


        // Create the output directory if it doesn't exist yet.
        if (!File::isDirectory($outputDir)) {
            File::makeDirectory($outputDir, 493, true);
        }

        // Open the file, resize with the ratio it and save it.
        $img = InterventionImg::make($inputFile);
        $img->resize($width, null, function ($constraint) {
            $constraint->aspectRatio();
        })->save($outputFile, 100);

        // Return the resized  file.
        return File::get($outputFile);

    }

}