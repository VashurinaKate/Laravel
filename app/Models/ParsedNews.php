<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ParsedNews extends Model
{
    use HasFactory;

    protected $table = "parsed_news";

    protected $fillable = [
        'title',
        'guid',
        'link',
        'description',
        'created_at'
    ];
}
