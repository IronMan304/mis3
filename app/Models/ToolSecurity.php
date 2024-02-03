<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ToolSecurity extends Model
{
    use HasFactory;
    public $guarded = [];

    protected $table = 'tool_securities';
    protected $primaryKey = 'id';
    protected $fillable = ['tool_id', 'security_id'];

    public function tools()
    {
        return $this->belongsTo(Tool::class, 'tool_id', 'id');
    }
    public function securities()
    {
        return $this->belongsTo(Position::class, 'security_id', 'id');
    }
}
