<?php

namespace App\Services;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class ImageUploadService
{

    public function uploadImage($file, $name = null): string
    {
        $folder = public_path();
        $year = Carbon::now()->year;
        $month = Carbon::now()->month;
        $day = Carbon::now()->day;
        $filePath = '/' . 'upload' . '/' . $year . '/' . $month . '/' . $day . '/';

        if ($name === null) {
            $fileName = time() . '.' . $file->extension();
        } else {
            $fileName = $name . '.' . $file->extension();
        }

        $file->move($folder . $filePath, $fileName);
        return $filePath . $fileName;
    }

    public function removeImage($file): void
    {
        $file = ltrim($file);

        if (file_exists(public_path($file))) {
            unlink(public_path($file));
        }
    }

    public function upload($request, string $attribute = 'image', ?Model $record = null): string|\Illuminate\Http\RedirectResponse
    {
        if ($record?->$attribute) {
            $this->removeImage($record?->$attribute);
        }

        $image = $this->uploadImage($request->file($attribute));

        if (!$image) {
            return back()->with('swal-error', 'خطا در آپلود فایل');
        }

        return $image;
    }

}
