<?php

namespace App\Models;

use App\Traits\Uuid;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;
    use Uuid;

    protected $table = 'students';
    protected $fillable = ['name', 'education', 'balance', 'purchases'];
}
