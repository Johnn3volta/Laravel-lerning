<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    /**
     * @var bool
     */
    public $timestamps = false;

    /**
     * @var string
     */
    protected $table = 'roles';

    /**
     * @var array
     */
    protected $fillable = [
      'name',
      'slug',
      'permissions'
    ];

    /**
     * @var array
     */
    protected $casts = [
      'permissions' => 'array'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function users()
    {
        return $this->belongsToMany(User::class, 'roles_user', 'roleId', 'userId');
    }


    public function hasAccess(array $permissions): bool
    {
        foreach ($permissions as $permission){
            if ($this->hasPermission($permission)){
                return true;
            }
        }
        return false;
    }

    public function hasPermission($permission): bool
    {
        return $this->permissions[$permission] ?? false;
    }
}
