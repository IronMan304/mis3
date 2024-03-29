<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Option extends Model
{
    use HasFactory;
    public $guarded = [];
    
    protected $table = 'options';
    protected $primaryKey = 'id';
    protected $fillable = [ 'description' ];
}
