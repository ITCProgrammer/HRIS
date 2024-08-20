<?php

namespace App\Models\Department;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    use HasFactory;

    protected $connection = 'hrd';

    protected $table = 'hrd.dept';

    protected $fillable = ['code', 'dept_name'];

    public $timestamps = false;
}
