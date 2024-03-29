<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Operator extends Model
{
    use HasFactory;
    public $guarded = [];
    
    protected $table = 'operators';
    protected $primaryKey = 'id';
    protected $fillable = [ 'first_name', 'middle_name', 'last_name', 'contact_number', 'sex_id', 'status_id', 'user_id' ];

    public function sex(){
        return $this->belongsTo(Sex::class, 'sex_id', 'id');
    }

    public function status(){
        return $this->belongsTo(Status::class, 'status_id', 'id');
    }
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
