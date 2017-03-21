<?php

namespace App\Data\Models;

use Carbon\Carbon;
use Cartalyst\Sentinel\Users\EloquentUser;
use DB;
use App\Definitions\Roles;
use Sofa\Eloquence\Eloquence;
use Sofa\Eloquence\Mappable;
use Sofa\Eloquence\Mutable;

class Groups extends BaseModel
{



    protected $table = 'groups';

    protected $appends = ['Id', 'Name', 'GroupNr', 'InviteLink', 'GroupSlug', 'CreatedAt', 'UpdatedAt',];

  	protected $hidden = ['id', 'name', 'group_nr', 'invite_link', 'group_slug', 'created_at','updated_at',];

  	protected $fillable = ['Id', 'Name', 'GroupNr', 'InviteLink', 'GroupSlug', 'CreatedAt', 'UpdatedAt',];

  	protected $maps = [
	    'Id' => 'id',
	    'Name' => 'name',
      'GroupNr' => 'group_nr',
      'InviteLink' => 'invite_link',
      'GroupSlug' => 'group_slug',
	    'CreatedAt' => 'created_at',
	    'UpdatedAt' => 'updated_at',
	    ];


    public function user()
    {
    	return $this->belongsToMany(User::class, 'group_users');
    }
}
