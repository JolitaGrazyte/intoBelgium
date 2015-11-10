<?php
namespace App\Libraries;

use App\Image;
use Auth;
use File;
use Config;
use Storage;
use Intervention\Image\Facades\Image as InterventionImg;

/**
 * Class Image
 * @package App\Libraries
 */
class ImageLib {

    /**
     * @param $image
     * @return Media
     */
    public static function addImage($image, $toName, $user_id){

//        dd($image.' - '.$toName.' - '.$user_id);

        $img = new Image();

        $name = $toName;

        $filename = str_replace(' ', '-', $name);

        $hasEntry = $img->hasProfileImg($user_id);

        $extension = $image->getClientOriginalExtension();

        $file = $filename. '.' . $extension;

        if($hasEntry ){

            Storage::disk('local')->exists($file) ? Storage::delete($file): false;
            $img->where('imageable_id', $user_id)->delete();

        }

        Storage::disk('local')->put('/uploads/'.$file, File::get($image));
        $img->name = $name;
        $img->imageable_id = $user_id;
        $img->mime = $image->getClientMimeType();
//      $entry->original_filename = $image->getClientOriginalName();
        $img->filename = $filename . '.' . $extension;
        $img->save();

        return $img;

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
    public static function resize_image($filename, $sizeString) {


        // Get the output path from our configuration file.
        $outputDir = Config::get('assets.images.paths.output');

        // Create an output file path from the size and the filename.
        $outputFile = $outputDir.'/'. $sizeString . '_' . $filename;

        // If the resized file already return it.
//        if (File::isFile($outputFile)) {
//            return File::get($outputFile);
//        }

        //ALWAYS REPLACE IF WITH THE SAME NAME

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

    private function replace($filename){

        $exists = Storage::disk('local')->exists($filename) ? Storage::delete($filename): false;



    }

}