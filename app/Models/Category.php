<?php

namespace App\Models;

//use DB;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Category extends Model
{
    use HasFactory;

    protected $table = "categories";

    public function getCategories()
    {
        return DB::table($this->table)
            ->select(['id', 'title', 'description', 'created_at'])
            ->get();
    }

    public function getCategory(int $id)
    {
        return DB::table($this->table)
            ->select(['id', 'title', 'description', 'created_at'])
            ->find($id);
    }

    public function getCategoryWithParams(int $id)
    {
        return DB::table($this->table)
            ->count();
    }
}
