<?php

/**
 * Generates <option> tags to be inserted in an html select element
 * The first value of each row is used as key and the second as label
 *
 * @param $dataset array array of rows
 * @param $select mixed key to be selected
*/
function dataset2options($dataset, $select=null){
	
	$assoc = array();
	foreach($dataset as $row){
		$k = current($row);
		$v = next($row);
		$assoc[$k] = $v;
	}

	return assoc2options($assoc, $select);
}