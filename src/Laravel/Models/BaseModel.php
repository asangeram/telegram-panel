<?php
/**
 * Created by PhpStorm.
 * User: piotrczyz
 * Date: 06/11/16
 * Time: 19:08
 */

namespace App\Data\Models;

use Illuminate\Database\Eloquent\Model;
use Sofa\Eloquence\Eloquence;
use Sofa\Eloquence\Mappable;
use Sofa\Eloquence\Mutable;

abstract class BaseModel extends Model 
{
	use Eloquence;
	use Mappable, Mutable;
}