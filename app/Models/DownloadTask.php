<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DownloadTask extends Model
{
    protected $fillable = ['url'];

    public function getFilepathAttribute($value)
    {
        return !is_null($value) ? config('app.url') . '/storage/' . $value : $value;
    }
}
