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
    protected $fillable = ['tool_id', 'request_id', 'status_id', 'user_id', 'returner_id', 'tool_status_id', 'description', 'returned_at', 'dt_requested', 'dt_approved', 'dt_started', 'dt_returned', 'dt_rejected', 'dt_cancelled', 'dt_requested_user_id', 'dt_approved_user_id', 'dt_started_user_id', 'dt_returned_user_id', 'dt_rejected_user_id', 'dt_cancelled_user_id'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

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

    public function toolStatus(){
        return $this->belongsTo(Status::class, 'tool_status_id', 'id');
    }

    public function rtts_keys()
    {
        return $this->hasMany(RequestToolToolSecurityKey::class, 'request_tools_id');
    }

    public function dt_requested_user()
    {
        return $this->belongsTo(User::class, 'dt_requested_user_id', 'id');
    }
    public function dt_approved_user()
    {
        return $this->belongsTo(User::class, 'dt_approved_user_id', 'id');
    }
    public function dt_started_user()
    {
        return $this->belongsTo(User::class, 'dt_started_user_id', 'id');
    }
    public function dt_returned_user()
    {
        return $this->belongsTo(User::class, 'dt_returned_user_id', 'id');
    }
    public function dt_rejected_user()
    {
        return $this->belongsTo(User::class, 'dt_rejected_user_id', 'id');
    }
    public function dt_cancelled_user()
    {
        return $this->belongsTo(User::class, 'dt_cancelled_user_id', 'id');
    }

}
