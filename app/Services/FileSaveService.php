<?php

namespace App\Services;

class FileSaveService
{

    public function upload($file)
    {

        $fileName = time() . '.' . $file->getClientOriginalExtension();
        $path = $file->storeAs('Photo', $fileName);
        return $path;
    }

}
