<?php

namespace Nordal\Definitions;

/**
 * Class ResponseCode
 * @package Nordal\Definitions
 * @link https://en.wikipedia.org/wiki/List_of_HTTP_status_codes
 */
class ResponseCode
{
	const SUCCESS = 200;
	const NOTFOUND = 404;
	const FORBIDDEN = 403;
	const UNAUTHORIZED = 401;
	const BADREQUEST = 400;
	const ERROR = 500;
	const NOTIMPLEMENTED = 501;
}