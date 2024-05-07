<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Security extends Model
{
    use HasFactory;
    public $guarded = [];
    
    protected $table = 'securities';
    protected $primaryKey = 'id';
    protected $fillable = [ 'first_name', 'middle_name', 'last_name', 'esignature', 'user_id', 'honorific_id' ];
    public function user(){
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
    public function Honorific(){
        return $this->belongsTo(Honorific::class, 'honorific_id', 'id');
    }
}
