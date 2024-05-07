<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RequestOperatorKey extends Model
{
    use HasFactory;
    public $guarded = [];

    protected $table = 'request_operators';
    protected $primaryKey = 'id';
    protected $fillable = ['request_id', 'operator_id', 'operator1_id'];

    public function requests()
    {
        return $this->belongsTo(Request::class, 'request_id', 'id');
    }
    public function operators()
    {
        return $this->belongsTo(Operator::class, 'operator_id', 'id');
    }
    public function operator()
    {
        return $this->belongsTo(User::class, 'operator1_id', 'id');
    }

}
