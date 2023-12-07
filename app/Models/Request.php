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
}
