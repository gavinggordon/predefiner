<?php

function predefiner_helper( $array_of_settings )
{
	if( is_array( $array_of_settings ) ) {
		foreach( $array_of_settings as $constant => $definition ) {
			if(! defined( $constant ) ) {
				define( $constant, $definition );
			}
		}
	}
}