<?php

namespace App\Traits;

use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

trait UploadPhoto
{

    public function storePhoto($photo , $folder = null ){
        Image::make($photo) ->resize(350, 350, function ($constraint) {
            $constraint->aspectRatio();
        })->save(public_path('uploads/' . $folder .'/' . $photo->hashName()));
    }


    public function deletePhoto($photo , $folder = null)
    {
        if ($photo && $photo !== 'default.png'){
            Storage::disk('uploads')->delete($folder.'/' .$photo);
        }
    }

    public function updatePhoto($old_photo ,$new_photo , $folder = null)
    {
        $this->deletePhoto($old_photo , $folder);
        $this->storePhoto($new_photo , $folder);
    }
}
