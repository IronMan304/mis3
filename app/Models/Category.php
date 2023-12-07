<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Category extends Model
{
    use HasFactory;
    use SoftDeletes;
    

    public $guarded = [];
    
    protected $table = 'categories';
    protected $primaryKey = 'id';
    protected $fillable = [ 'description' ];

    public function types(){
        return $this->hasMany(Type::class);
    }

    public function tools(){
        return $this->hasMany(Tool::class);
    }
}
