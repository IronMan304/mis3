<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Status extends Model
{
    use HasFactory;
    use SoftDeletes;

    public $guarded = [];

    protected $table = 'statuses';
    protected $primaryKey = 'id';
    protected $fillable = ['description'];

    public function tools()
    {
        return $this->hasMany(Tool::class);
    }
}
