<?php

namespace App\Models;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;
    use Softdeletes;
    
    public $guarded = [];
    
    protected $table = 'courses';
    protected $primaryKey = 'id';
    protected $fillable = [ 'college_id', 'description', 'code' ];

    public function college(){
        return $this->belongsTo(College::class, 'college_id', 'id');
    }
}
