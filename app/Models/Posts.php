<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Posts extends Model
{
    //Membuat Soft Delete
    use SoftDeletes;
    
    //mengizinkan file yang akan diisi
    protected $fillable = ['judul','category_id','content','gambar','slug','users_id'];

    //Relasi one to many
    public function category(){ 
        return $this->belongsTo('App\Models\Category');
    }

    //Relasi Many to Many
    public function tags(){
        return $this->belongsToMany('App\Models\Tags');
    }

    //Relasi one to many tabel user
    public function users(){
        return $this->belongsTo('App\Models\User');
    }
}
