<?php

namespace App\Models;

use App\Models\Tag;
use App\Models\User;
use App\Models\Category;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends Model
{
    protected $fillable=['name', 'body', 'price', 'img', 'user_id', 'category_id']; 
    use HasFactory;

    public function user(){
        return $this->belongsTo(User::class); 
    }

    public function getdescriptionSubstring(){
        if(strlen($this->body)>5){
            return substr($this->body, 0, 5); 
        }
    }

    public function formatData(){
        return $this->created_at->format('d/m/y -h:m'); 
    }

    public function category(){
        return $this->belongsTo(Category::class); 
    }

    public function tags(){
        return $this->belongsToMany(Tag::class); 
    }
}
