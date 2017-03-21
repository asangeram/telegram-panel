<?php

namespace App\ViewModels;

use App\Data\Models\User;

/**
 * Description of UserEditViewModel
 *
 */
class UserEditViewModel extends BaseViewModel 
{    
    /**
     *
     * @var User
     */
    public $User;
    /**
     *
     * @var User[]
     */
    public $Teachers;
}
