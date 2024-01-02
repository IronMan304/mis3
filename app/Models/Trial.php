<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Trial extends Model
{
    use HasFactory;

    public $guarded = [];
    
    protected $table = 'trials';
    protected $primaryKey = 'id';
    protected $fillable = [ 'description' ];
}
