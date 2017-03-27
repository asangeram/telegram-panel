<?php

namespace Telegramapp\Telegram\Objects\InputContent;

use Telegramapp\Telegram\Objects\InlineQuery\InlineBaseObject;

/**
 * Class InputTextMessageContent
 *
 * <code>
 * $params = [
 *   'message_text'             => '',
 *   'parse_mode'               => '',
 *   'disable_web_page_preview' => '',
 * ];
 * </code>
 *
 * @method $this setMessageText($string)           Text of the message to be sent, 1-4096 characters.
 * @method $this setParseMode($string)             Optional. Send Markdown or HTML, if you want Telegram apps to show bold, italic, fixed-width text or inline URLs in your bot's message.
 * @method $this setDisableWebPagePreview($bool)   Optional. Disables link previews for links in the sent message
 */
class InputTextMessageContent extends InlineBaseObject
{

}
