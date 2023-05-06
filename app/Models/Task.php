<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Todo;

class Task extends Model
{
    use HasFactory;
     protected $fillable = [
        'name',
        'todo_id',
    ];
    public static function gettodo($id){
      return Todo::where('id', $id)->pluck('name')->first();
    }

}
