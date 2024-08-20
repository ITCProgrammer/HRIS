<?php

namespace App\Models\Roles;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;

    protected $connection = 'hrd';

    protected $table = 'hrd.user_role';

    protected $fillable = [
        'role'
    ];
}
