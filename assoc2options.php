<?php

/**
 * Generates <option> tags to be inserted in an html select element
 *
 * @param $assoc array associative array
 * @param $select mixed key to be selected
*/
function assoc2options($assoc, $select=null){

	$options = '';
	foreach($assoc as $k => $v){
		$select = !is_null($select) && $select==$k ? ' selected' : '';
		$options .= '<option value="'.$k.'"'.$select.'>'.$v.'</option>';
		$options .= "\n";
	}

	return $options;

}