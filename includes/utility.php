<?php

if ( !function_exists('pre_var') ) {
	function pre_var($var) {
		echo '<pre>';
			print_r($var);
		echo '</pre>';
	}
}