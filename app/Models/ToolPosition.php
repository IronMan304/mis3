<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ToolPosition extends Model
{
    use HasFactory;
    public $guarded = [];

    protected $table = 'tool_positions';
    protected $primaryKey = 'id';
    protected $fillable = ['tool_id', 'position_id'];

    public function tools()
    {
        return $this->belongsTo(Tool::class, 'tool_id', 'id');
    }
    public function positions()
    {
        return $this->belongsTo(Position::class, 'position_id', 'id');
    }
}
