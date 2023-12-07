<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Type extends Model
{
    use HasFactory;
    use SoftDeletes;

    public $guarded = [];
    
    protected $table = 'types';
    protected $primaryKey = 'id';
    protected $fillable = [ 'category_id', 'description' ];

    public function category(){
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }

    public function tools(){
        return $this->hasMany(Tool::class);
    }

}
