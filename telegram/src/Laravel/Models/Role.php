<?php

namespace Nordal\Data\Models;

use Illuminate\Database\Eloquent\Model;
use Nordal\Data\Models\BaseModel;
use Nordal\Data\Models\User;
use Sofa\Eloquence\Eloquence;
use Sofa\Eloquence\Mappable;
use Sofa\Eloquence\Mutable;
use Cartalyst\Sentinel\Roles\EloquentRole;
/**
 * Class Role
 * @package Nordal\Data\Models
 *
 * @property int $Id
 * @property string $Name
 * @property string $Slug
 * @property string $Permissions
 * 
 */
class Role extends EloquentRole
{
  use Eloquence;
  use Mappable, Mutable;

  protected $appends = ['Id', 'Slug', 'Name', 'Permissions','CreatedAt', 'UpdatedAt',];

  protected $hidden = ['id','slug','name','permissions', 'created_at','updated_at',];

  protected $maps = [
    'Id' => 'id',
    'Slug' => 'slug',
    'Name' => 'name',
    'Permissions' => 'permissions',
    'CreatedAt' => 'created_at',
    'UpdatedAt' => 'updated_at',
    'LastLogin' => 'last_login',
    ];


    public function user()
    {
        return $this->belongsToMany(User::class, 'role_users');
    }
}
