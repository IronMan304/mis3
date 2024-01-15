<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BorrowerType extends Model
{
    use HasFactory;
    //use SoftDeletes;

    public $guarded = [];
    
    protected $table = 'borrower_types';
    protected $primaryKey = 'id';
    protected $fillable = [ 'description' ];
}
