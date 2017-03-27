<?php

namespace Telegramapp\Telegram\Objects\InputContent;

use Telegramapp\Telegram\Objects\InlineQuery\InlineBaseObject;

/**
 * Class InputContactMessageContent
 *
 * <code>
 * $params = [
 *   'phone_number'     => '',
 *   'first_name'       => '',
 *   'last_name'        => '',
 * ];
 * </code>
 *
 * @method $this setPhoneNumber($string) Contact's phone number
 * @method $this setFirstName($string)   Contact's first name
 * @method $this setLastName($string)    Optional. Contact's last name
 */
class InputContactMessageContent extends InlineBaseObject
{

}
