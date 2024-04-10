<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Request extends Model
{
    use HasFactory;
    use SoftDeletes;

    public $guarded = [];
    
    protected $table = 'requests';
    protected $primaryKey = 'id';
    protected $fillable = [ 'request_number','tool_id', 'user_id', 'borrower_id', 'status_id', 'option_id', 'estimated_return_date', 'purpose', 'date_needed', 'current_security_id', 'max_security_id', 'dt_requested', 'dt_reviewed', 'dt_approved', 'dt_started', 'dt_returned', 'dt_rejected', 'dt_cancelled', 'dt_requested_user_id', 'dt_reviewed_user_id', 'dt_approved_user_id', 'dt_started_user_id', 'dt_returned_user_id', 'dt_rejected_user_id', 'dt_cancelled_user_id' ];
    
    public function borrower(){
        return $this->belongsTo(Borrower::class, 'borrower_id', 'id');
    }

    public function tools(){
        return $this->belongsTo(Tool::class, 'tool_id', 'id');
    }

    public function status(){
        return $this->belongsTo(Status::class, 'status_id', 'id');
    }

    public function tool_keys()
    {
        return $this->hasMany(ToolRequest::class, 'request_id');
    }

    public function tool_keyss()
    {
        return $this->hasMany(ToolRequest::class);
    }

    // public function tool_keys()
    // {
    //     return $this->hasMany(ToolRequest::class);
    // }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function request_operator_keys()
    {
        return $this->hasMany(RequestOperatorKey::class, 'request_id');
    }

    public function current_security()
    {
        return $this->belongsTo(Position::class, 'current_security_id', 'id');
    }

    public function max_security()
    {
        return $this->belongsTo(Position::class, 'max_security_id', 'id');
    }
    public function dt_requested_user()
    {
        return $this->belongsTo(User::class, 'dt_requested_user_id', 'id');
    }
    public function dt_reviewed_user()
    {
        return $this->belongsTo(User::class, 'dt_reviewed_user_id', 'id');
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
