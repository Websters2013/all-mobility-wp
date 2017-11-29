<?php

function technical_documentation_name($value) {
	return $value['haracteristic'];
}

function technical_documentation_value($value) {
	return $value['value'];
}

function main_category($value) {
	$category = explode('|', $value);
	$string = '';
	foreach($category as $row) {
		$string .= explode('>', $row)[0].'|';
	}
	return  substr($string, 0, -1);
}

function child_categories($value) {
	$sub_category = explode('|', $value);
	$sub_string = '';
	foreach($sub_category as $row) {

		$index = strpos($row, '>');
		if( $index > -1) {
			$sub_string .= substr($row, $index + 1).'|';
		} else {
			$sub_string .= '|';
		}

	}
	return  substr($sub_string, 0, -1);
}
?>