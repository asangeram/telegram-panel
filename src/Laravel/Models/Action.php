<?php

namespace App\Data\Models;
use App\Data\Models\BaseModel;
use App\Data\Models\User;

/**
 * Class Pin
 * 
 * @property int $Id
 * @property int $UserId
 * @property int $TaskId
 * @property int $Exp
 * @property $CreatedAt
 * @property $UpdatedAt
 * 
 * @package App\Data\Models
 */
class Action extends BaseModel
{
	protected $appends = ['Id','UserId','TaskId','Exp','CreatedAt','UpdatedAt'];

	protected $hidden = ['id','user_id', 'task_id','exp','created_at','updated_at'];
	
	protected $maps = [
		'Id' => 'id',
		'UserId' => 'user_id',
		'TaskId' => 'task_id',
		'Exp' => 'exp',
		'CreatedAt' => 'created_at',
		'UpdatedAt' => 'updated_at'
	];	
	
    public function User()
    {
    	return $this->belongsTo(User::class);
    }

	public function Task()
	{
		return $this->belongsTo(Task::class);
	}
}
