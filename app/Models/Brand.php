<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    use HasFactory;
    public $guarded = [];

    protected $table = 'brands';
    protected $primaryKey = 'id';
    protected $fillable = ['name'];

    // public function Tool()
    // {
    //     return $this->belongsTo(Tool::class, 'tool_id', 'id');
    // }
}
