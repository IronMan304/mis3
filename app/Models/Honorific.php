<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Honorific extends Model
{
    use HasFactory;
    
    public $guarded = [];
    
    protected $table = 'honorifics';
    protected $primaryKey = 'id';
    protected $fillable = [ 'description' ];

    public function users()
    {
        return $this->hasMany(User::class);
    }
}
