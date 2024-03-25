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
    protected $fillable = [ 'service_id', 'borrower_id', 'staff_user_id' ];

    public function service()
    {
        return $this->belongsTo(Service::class, 'service_id', 'id');
    }
    public function borrower()
    {
        return $this->belongsTo(Service::class, 'borrower_id', 'id');
    }
    public function user()
    {
        return $this->belongsTo(Service::class, 'staff_user_id', 'id');
    }
}
