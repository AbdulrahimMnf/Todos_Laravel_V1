<?php

namespace App\Traits;

use Illuminate\Support\Facades\File;
use Intervention\Image\Facades\Image;

/**
 * this trait for input-output helpers
 */

trait IO
{

    /**
     * Store a List Of Images , on different dimensions
     *
     * @param  list          $images      => [i]
     * @param  string        $path        => 'path'
     * @param  array         $dimensions  => [ [x,y] , [x,y] ]
     *
     * @return Json
     */
    public function copyImages($images, $toPath, $dimensions = [])
    {
        $itemsArray1 = [];
        if (!$dimensions == []) {
            $folderName = time() . '_' . rand(10, 1000);
            $path = public_path($toPath . $folderName);
            mkdir($path);
            foreach ($images as $image) {
                $itemsArray2 = [];
                foreach ($dimensions as $size) {
                    Image::make($image)->resize($size[0], $size[1])->save($path . '\\' . $size[0] . '_' . $size[1] . '_image.webp');
                    array_push($itemsArray2, $path . '\\' . $size[0] . '_' . $size[1] . '_image.webp');
                }
                array_push($itemsArray1, $itemsArray2);
            }
        }
        return json_encode($itemsArray1, JSON_UNESCAPED_SLASHES);
    }
}
