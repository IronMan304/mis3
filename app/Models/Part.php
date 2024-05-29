<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Part extends Model
{
    use HasFactory;
    public $guarded = [];

    protected $table = 'parts';
    protected $primaryKey = 'id';
    protected $fillable = ['name', 'price', 'tool_id', 'brand', 'property_number', 'status_id'];

    public function Tool()
    {
        return $this->belongsTo(Tool::class, 'tool_id', 'id');
    }
    public function Status()
    {
        return $this->belongsTo(Status::class, 'status_id', 'id');
    }
}
