<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'guard_name', 'created_at', 'updated_at'];

    /**
     * Define the relationship between permissions and driver roles.
     * Menentukan hubungan antara izin dan peran supir.
     */
    public function roles()
    {
        return $this->belongsToMany(Role::class, 'role_has_permissions');
    }
}
