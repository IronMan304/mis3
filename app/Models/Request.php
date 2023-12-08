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
    protected $fillable = [ 'tool_id', 'user_id', 'borrower_id', 'status_id' ];

    public function borrower(){
        return $this->belongsTo(Borrower::class, 'borrower_id', 'id');
    }

    public function tool(){
        return $this->belongsTo(Tool::class, 'tool_id', 'id');
    }

    public function tool_keys()
    {
        return $this->hasMany(ToolRequest::class, 'request_id');
    }

}
