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
        'sex',
        'reported_at',
    ];

}
