<?php

namespace App\ViewModels;

use App\Data\Models\User;
use App\Data\Models\Map;
use App\Data\Models\Pin;


class DashboardViewModel extends BaseViewModel 
{
	public $Users;

	/**
	 * Logged in
	 * @var User
	 */
	public $User;
	/**
     *
     * @var Map
     */
    public $Map;
	/**
     *
     * @var Pin
     */
    public $Pin;



}
