<?php

namespace App\Models;

//use DB;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class News extends Model
{
    use HasFactory;

    protected $table = "news";

    public function getNews()
    {
        return DB::table($this->table)
            ->select(['id', 'title', 'author', 'image', 'status', 'description', 'created_at'])
            ->get();
    }

    public function getNewsByCategory(int $categoryId)
    {
        return DB::table($this->table)
            ->select(['id', 'title', 'author', 'image', 'description', 'created_at'])
            ->where('category_id', $categoryId)
            ->get();
    }

    public function getNewsById(int $id)
    {
        return DB::table($this->table)
            ->select(['id', 'title', 'author', 'image', 'description', 'created_at'])
            ->find($id);
    }
}
