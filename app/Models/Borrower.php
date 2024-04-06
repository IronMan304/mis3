<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Borrower extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'borrowers';
    protected $primaryKey = 'id';
    protected $fillable = [
        'image',
        'id_number',
        'first_name',
        'middle_name',
        'last_name',
        'contact_number',
        'sex_id',
        'position_id',
        'college_id',
        'course_id',
        'status_id',
        'user_id', //for borrower user account
    ];

    public function sex()
    {
        return $this->belongsTo(Sex::class, 'sex_id', 'id');
    }

    public function position()
    {
        return $this->belongsTo(Position::class, 'position_id', 'id');
    }

    public function college()
    {
        return $this->belongsTo(College::class, 'college_id', 'id');
    }

    public function course()
    {
        return $this->belongsTo(Course::class, 'course_id', 'id');
    }

    // public function requests()
    // {
    //     return $this->hasMany(Request::class, 'borrower_id', 'id');
    // }

    // public function status()
    // {
    //     return $this->belongsTo(Status::class, 'status_id', 'id');
    // }

    public function user(){
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
    public function requests()
    {
        return $this->hasMany(Request::class);
    }

    public function service_requests()
    {
        return $this->hasMany(ServiceRequest::class);
    }

}
