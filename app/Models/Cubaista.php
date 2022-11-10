<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cubaista extends Model
{
    use HasFactory;
    protected $table = "cubaistas";

    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'website',
        'company_name',
        'additional_notes'
    ];

}
