<?php

namespace App\Helpers;

use Illuminate\Support\Facades\Storage;

class ImageHelper
{
    // uploadImage, also to help with creating sidebar

    private $disks = ['products'];
    private $disk = 'products';

    public function __constructor($disk = 'default')
    {
        $this->setDisk($disk);
    }

    public function setDisk($disk)
    {
        if (!in_array($disk, Storage::disk()->allDisks())) {
            throw new \InvalidArgumentException('The disk does not exist. Setting default');
        }
        $this->disk = $disk;
    }

    public function imageUpload($file)
    {
        // Hash name
        $filename = $file->hashName();

        // Store in directory
        Storage::disk($this->disk)->putFileAs('', $file, $filename);

        // Return path
        return $filename;
    }

    public function fileExist($filename)
    {
        return Storage::disk($this->disk)->exists($filename);
    }

    public function removeExistingImage($filename)
    {
        if ($this->fileExist($filename)) {
            // NOTE::FOR TESTING, DO NOT REMOVE PREVIOUS IMAGE
            // Storage::disk('products')->delete($oldfilename);
            return true;
        }

        return false;
    }
}
