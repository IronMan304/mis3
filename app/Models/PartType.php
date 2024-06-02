<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PartType extends Model
{
    use HasFactory;
    public $guarded = [];

    protected $table = 'part_types';
    protected $primaryKey = 'id';
    protected $fillable = ['name'];

    // public function Tool()
    // {
    //     return $this->belongsTo(Tool::class, 'tool_id', 'id');
    // }
}
