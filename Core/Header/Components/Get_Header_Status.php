<?php

/*
| LaunchPad framework (Web Version) - a framework development under PHP languge and MIT license (MIT)
| Copyright (c) - 2019 - 2020, TkStar Company (Tehran - Iran)
| Github: "https://github.com/tkstarir/launchpad"
*/

namespace LaunchPad\Components\Header {

	// -----------------------------------------------------------------------------------------------------------------------
	// | @component \LaunchPad as Framework
	// -----------------------------------------------------------------------------------------------------------------------
	use \LaunchPad as Framework;

	// Check for existence of trait
	if(!trait_exists(__NAMESPACE__ . '\\Get_Header_Status')){

		// HTTP Status codes for server
		trait Get_Header_Status {

			// Getting header status by it code such as 404, 403 and ...
			// @variable Int $header_status | default 0
			// @variable ?String $protocol | default null
			// @return ?String
			public static function Get_Header_Status(Int $header_status = 0, ?String $protocol = null) : ?String {
				$header_status = Framework\Cleaner::Trim($header_status);
				switch($header_status){
					case('100'): case(100): $header_status = '100 Continue'; break;
					case('101'): case(101): $header_status = '101 Switching Protocols'; break;
					case('200'): case(200): $header_status = '200 OK'; break;
					case('201'): case(201): $header_status = '201 Created'; break;
					case('202'): case(202): $header_status = '202 Accepted'; break;
					case('203'): case(203): $header_status = '203 Non-Authoritative Information'; break;
					case('204'): case(204): $header_status = '204 No Content'; break;
					case('205'): case(205): $header_status = '205 Reset Content'; break;
					case('206'): case(206): $header_status = '206 Partial Content'; break;
					case('300'): case(300): $header_status = '300 Multiple Choices'; break;
					case('301'): case(301): $header_status = '301 Moved Permanently'; break;
					case('302'): case(302): $header_status = '302 Moved Temporarily'; break;
					case('303'): case(303): $header_status = '303 See Other'; break;
					case('304'): case(304): $header_status = '304 Not Modified'; break;
					case('305'): case(305): $header_status = '305 Use Proxy'; break;
					case('400'): case(400): $header_status = '400 Bad Request'; break;
					case('401'): case(401): $header_status = '401 Unauthorized'; break;
					case('402'): case(402): $header_status = '402 Payment Required'; break;
					case('403'): case(403): $header_status = '403 Forbidden'; break;
					case('404'): case(404): $header_status = '404 Not Found'; break;
					case('405'): case(405): $header_status = '405 Method Not Allowed'; break;
					case('406'): case(406): $header_status = '406 Not Acceptable'; break;
					case('407'): case(407): $header_status = '407 Proxy Authentication Required'; break;
					case('408'): case(408): $header_status = '408 Request Time-out'; break;
					case('409'): case(409): $header_status = '409 Conflict'; break;
					case('410'): case(410): $header_status = '410 Gone'; break;
					case('411'): case(411): $header_status = '411 Length Required'; break;
					case('412'): case(412): $header_status = '412 Precondition Failed'; break;
					case('413'): case(413): $header_status = '413 Request Entity Too Large'; break;
					case('414'): case(414): $header_status = '414 Request-URI Too Large'; break;
					case('415'): case(415): $header_status = '415 Unsupported Media Type'; break;
					case('500'): case(500): $header_status = '500 Internal Server Error'; break;
					case('501'): case(501): $header_status = '501 Not Implemented'; break;
					case('502'): case(502): $header_status = '502 Bad Gateway'; break;
					case('503'): case(503): $header_status = '503 Service Unavailable'; break;
					case('504'): case(504): $header_status = '504 Gateway Time-out'; break;
					case('505'): case(505): $header_status = '505 HTTP Version not supported'; break;
					default: $header_status = ''; break;
				}
				$protocol = Framework\Validator::IsNullOrEmpty($protocol) ? $_SERVER['SERVER_PROTOCOL'] : $protocol;
				$header_status = $protocol . ' ' . $header_status;
				settype($header_status, 'String');
				return($header_status);
			}

		}

	}

	return(\LaunchPad\Components\Header\Get_Header_Status::class);

}

?>