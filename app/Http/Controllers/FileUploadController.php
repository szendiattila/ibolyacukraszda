<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Image;

class FileUploadController extends Controller
{
    public static function storeImage(Request $request, $fileName, $folderName, $thumbFile = false, $thumbWidth = 90, $thumbHeight = 90)
    {
        $file = Image::make($request->file($fileName)->getRealPath());

        if ($file) {

            $name = time() . '.' . explode('/', $file->mime())[1];

            $file->save('images/' . $folderName . '/' . $name);

            if ($thumbFile) {

                $nameThumb = 'tn-' . $name;

                $thumb = Image::make($request->file($fileName)->getRealPath());
                $thumb->resize($thumbWidth, $thumbHeight)->save('images/' . $folderName . '/' . $nameThumb);
            }

            return $name;
        }

        return null;
    }


    public static function removeFile($fileName, $folderName, $shouldRemoveThumb = false)
    {
        try {
            unlink('images/' . $folderName . '/' . $fileName);

            if ($shouldRemoveThumb) {
                unlink('images/' . $folderName . '/tn-' . $fileName);
            }
        } catch (\Exception $e) {
            //
        }
    }
}
