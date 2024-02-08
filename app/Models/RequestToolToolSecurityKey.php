<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RequestToolToolSecurityKey extends Model
{
    use HasFactory;
    
    public $guarded = [];

    protected $table = 'request_tools_tool_securities_key';
    protected $primaryKey = 'id';
    protected $fillable = ['request_tools_id', 'security_id'];

    public function requestTool()
    {
        return $this->belongsTo(ToolRequest::class, 'request_tools_id', 'id');
    }
    public function security()
    {
        return $this->belongsTo(Position::class, 'security_id', 'id');
    }

}
