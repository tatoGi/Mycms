<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class files extends Model
{
    use HasFactory;
    protected $casts = [
        'file_additional' => 'collection'
    ];
    protected $fillable = [
        'section_id',
        'post_id',
        'name',
        'file',
        'file_additional'
    ];

}
