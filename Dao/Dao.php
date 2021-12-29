<?php

namespace Dao;

abstract class Dao {

    protected function getConnection() : Connection {
		global $connection;
		return $connection;
	}

	function parseIntForQuery($int) : string {
		if(is_null($int)) {
			return 'null';
		}
		return $int;
	}

	function parseStringForQuery($string) : string {
		if(is_null($string)) {
			return 'null';
		}
		return "'".$string."'";
	}

}