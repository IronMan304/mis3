<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Part1 extends Model
{
    use HasFactory;
    public $guarded = [];

    protected $table = 'parts';
    protected $primaryKey = 'id';
    protected $fillable = ['tool_id', 'part_type_id', 'brand_id', 'property_number', 'price', 'status_id'];

    public function Tool()
    {
        return $this->belongsTo(Tool::class, 'tool_id', 'id');
    }
    public function PartType()
    {
        return $this->belongsTo(PartType::class, 'part_type_id', 'id');
    }
    public function Brand()
    {
        return $this->belongsTo(Brand::class, 'brand_id', 'id');
    }
    public function Status()
    {
        return $this->belongsTo(Status::class, 'status_id', 'id');
    }
}
