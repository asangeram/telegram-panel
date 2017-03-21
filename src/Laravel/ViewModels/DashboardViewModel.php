<?php

namespace Nordal\ViewModels;

use \Nordal\Data\Models\User;
use Nordal\Data\Models\Map;
use Nordal\Data\Models\Pin;


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
