<?php

namespace App\Actions\Media;

use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;

class UploadUserImageAction
{
    public function execute(UploadedFile $image): string
    {
        try {
            $imageName = time() . '_' . Str::random(10) . '.' . $image->extension();
            $imagePath = $image->storeAs('user_images', $imageName, 'public');
            Log::info('Image Uploaded successfully', ['ImagePath' => $imagePath]);
            return $imagePath;
        } catch (\Exception $e) {
            Log::info('Error uploading user image:', ['error' => $e->getMessage()]);
            throw new \Exception('Error uploading user image:', $e->getMessage());
        }
    }
}
