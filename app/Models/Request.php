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
    protected $fillable = [ 'request_number','tool_id', 'user_id', 'borrower_id', 'status_id', 'option_id', 'estimated_return_date', 'purpose', 'date_needed' ];
    
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

}
