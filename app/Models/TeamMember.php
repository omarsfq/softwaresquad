<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use HasFactory;
class TeamMember extends Model
{

    protected $fillable = ['name', 'role', 'image_path'];
}
