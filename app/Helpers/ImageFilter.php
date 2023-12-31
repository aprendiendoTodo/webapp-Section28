<?php

namespace App\Helpers;

use Intervention\Image\Filters\FilterInterface;

class ImageFilter implements FilterInterface
{
    // /**
    //  * Default size of filter effects
    //  */
    // const DEFAULT_SIZE = 10;

    // /**
    //  * Size of filter effects
    //  *
    //  * @var integer
    //  */
    // private $size;

    // /**
    //  * Creates new instance of filter
    //  *
    //  * @param integer $size
    //  */
    // public function __construct($size = null)
    // {
    //     $this->size = is_numeric($size) ? intval($size) : self::DEFAULT_SIZE;
    // }

    public const Blur_VAL = 15;
    private $blur;

    public function __construct($blur = null) {
        $this->blur = $blur ?? self::Blur_VAL;
    }

    /**
     * Applies filter effects to given image
     *
     * @param  Intervention\Image\Image $image
     * @return Intervention\Image\Image
     */
    public function applyFilter(\Intervention\Image\Image $image)
    {
        return     // $img->crop(400, 400);
        $image
        ->fit(400, 400)
        ->blur($this->blur)
        ->greyscale();
        //$img->save('que_cazamos2.jpg', 5); //   second parameter is quality
        
    }
}