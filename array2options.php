<?php

/**
 * Generates <option> tags to be inserted in an html select element
 * Each value of the given array will be used as both key and value
 *
 * @param $array array array of scalars
 * @param $select mixed key to be selected
*/
function array2options($array, $select=null){

	$assoc = array();
	foreach($array as $value){
		$assoc[$value] = $value;
	}

	return assoc2options($array, $select);

}
