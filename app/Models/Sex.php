<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Sex extends Model
{
    use HasFactory;
    use SoftDeletes;

    public $guarded = [];
    
    protected $table = 'sexes';
    protected $primaryKey = 'id';
    protected $fillable = [ 'description' ];
}
