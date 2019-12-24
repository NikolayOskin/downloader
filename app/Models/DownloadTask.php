<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DownloadTask extends Model
{
    protected $fillable = ['url'];

    public function getFilepathAttribute($value)
    {
        return config('app.url') . '/storage/' . $value;
    }
}
