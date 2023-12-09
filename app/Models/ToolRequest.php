<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ToolRequest extends Model
{
    use HasFactory;


    public $guarded = [];

    protected $table = 'tool_requests';
    protected $primaryKey = 'id';
    protected $fillable = ['tool_id', 'request_id', 'status_id'];

    public function tools()
    {
        return $this->belongsTo(Tool::class, 'tool_id', 'id');
    }
    public function requests()
    {
        return $this->belongsTo(Request::class, 'request_id', 'id');
    }

    public function status()
    {
        return $this->belongsTo(Status::class, 'status_id', 'id');
    }
}
