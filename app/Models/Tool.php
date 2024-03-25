<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Tool extends Model
{
    use HasFactory;
    use SoftDeletes;

    public $guarded = [];

    protected $table = 'tools';
    protected $primaryKey = 'id';
    protected $fillable = ['user_id', 'category_id', 'source_id', 'type_id', 'property_number', 'status_id', 'barcode', 'brand', 'position_id'];

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }

    public function source()
    {
        return $this->belongsTo(Source::class, 'source_id', 'id');
    }

    public function type()
    {
        return $this->belongsTo(Type::class, 'type_id', 'id');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function status()
    {
        return $this->belongsTo(Status::class, 'status_id', 'id');
    }

    // public function position()
    // {
    //     return $this->belongsTo(Position::class, 'position_id', 'id');
    // }
    public function position_keys() // applicability
    {
        return $this->hasMany(ToolPosition::class);
    }
    public function security_keys()
    {
        return $this->hasMany(ToolSecurity::class);
    }
}
