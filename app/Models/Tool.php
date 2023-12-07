<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Tool extends Model
{
    use HasFactory;
    use SoftDeletes;

    public $guarded = [];
    
    protected $table = 'tools';
    protected $primaryKey = 'id';
    protected $fillable = [ 'source_id', 'type_id', 'property_number', 'status_id' ];
}
