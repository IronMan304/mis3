<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Source extends Model
{
    use HasFactory;
    use SoftDeletes;

    public $guarded = [];
    
    protected $table = 'sources';
    protected $primaryKey = 'id';
    protected $fillable = [ 'description' ];
}
