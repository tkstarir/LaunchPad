<?php

/*
| LaunchPad framework (Web Version) - a framework development under PHP languge and MIT license (MIT)
| Copyright (c) - 2019 - 2020, TkStar Company (Tehran - Iran)
| Github: "https://github.com/tkstarir/launchpad"
*/

namespace LaunchPad\Components\Database\QueryBuilder {

	// -----------------------------------------------------------------------------------------------------------------------
	// | @component \LaunchPad as Framework
	// -----------------------------------------------------------------------------------------------------------------------
	use \LaunchPad as Framework;

	// Check for existence of trait
	if(!trait_exists(__NAMESPACE__ . '\\Fragments')){

		// Fragments Methods Based on PDO
		trait Fragments {

			// Fragmenting your results in your number. speed up your project and prevent system crashes such as "out of memory"
			// @variable Int $fragment_count | default 100
			// @variable ?Callable $closure | default null
			// @return Boolean
			public static function Fragment(Int $fragment_count = 100, ?Callable $closure = null) : Bool {
				return(self::Current_Process(function(Array $curent_process) use ($fragment_count, $closure){
					$offset = 0;
					$do_while_count = 0;
					do{
						self::$limit = $fragment_count;
						self::$offset = $offset;
						self::$order_by = $curent_process['order_by'];
						self::$asc_or_desc = $curent_process['asc_or_desc'];
						self::$group_by = $curent_process['group_by'];
						self::$ai_column = $curent_process['ai_column'];
						self::$unions = $curent_process['unions'];
						self::$targets = $curent_process['targets'];
						self::$wheres = $curent_process['wheres'];
						self::$havings = $curent_process['havings'];
						self::$joins = $curent_process['joins'];
						self::Table($curent_process['table']);
						is_null(self::$offset) ? self::Limit($fragment_count) : self::Limit($fragment_count, self::$offset);
						self::Prepare('*');
						$result = self::Result(true);
						if(count($result) <= 0){
							break;
						}else{
							if(is_callable($closure)){
								if(Framework\Caller::Make($closure, $result) === false){
									break;
								}else{
									$do_while_count++;
									$offset = $fragment_count * $do_while_count;
								}
							}else{
								break;
							}
						}
					}while(count($result) <= $fragment_count);
					return true;
				}));
			}

		}

	}

	return(\LaunchPad\Components\Database\QueryBuilder\Fragments::class);

}

?>