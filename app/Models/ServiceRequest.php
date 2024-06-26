<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ServiceRequest extends Model
{
    use HasFactory;
    
    public $guarded = [];
    
    protected $table = 'service_requests';
    protected $primaryKey = 'id';
    protected $fillable = [ 'service_id', 'borrower_id', 'staff_user_id', 'tool_id', 'status_id', 'source_id', 'operator_id', 'set_date', 'description', 'user_id', 'tool_status_id', 'request_number', 'technician_id', 'cancel_reason' ];

    public function service()
    {
        return $this->belongsTo(Service::class, 'service_id', 'id');
    }
    public function borrower()
    {
        return $this->belongsTo(Borrower::class, 'borrower_id', 'id');
    }
    public function user()
    {
        return $this->belongsTo(User::class, 'staff_user_id', 'id');
    }
    public function tool()
    {
        return $this->belongsTo(Tool::class, 'tool_id', 'id');
    }
    public function status()
    {
        return $this->belongsTo(Status::class, 'status_id', 'id');
    }
    public function source()
    {
        return $this->belongsTo(Source::class, 'source_id', 'id');
    }
    public function operator()
    {
        return $this->belongsTo(Operator::class, 'operator_id', 'id');
    }

    public function Technician()
    {
        return $this->belongsTo(User::class, 'technician_id', 'id');
    }
    // public function user()
    // {
    //     return $this->belongsTo(User::class, 'user_id', 'id');
    // }
    public function ToolStatus()
    {
        return $this->belongsTo(Status::class, 'tool_status_id', 'id');
    }
}
