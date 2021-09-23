<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HTMLResource extends Model
{
    use HasFactory;

    protected $table = 'html_resources';

    protected $fillable = [
        'title',
        'description',
        'snippet',
    ];
}
