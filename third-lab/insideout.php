<?php

	function insideout($array)
	{
		if(count($array)%2!=0)
			return "Bye, enter an array of even elements";
		
		$temp = $array[count($array)/2];
		$array[count($array)/2] = $array[0];
		$array[0]=$temp;
		
		$temp1 = $array[count($array)/2+1];
		$array[count($array)/2] = $array[count($array)];
		$array[count($array)]=$temp;
		
		print_r($array);
	}
	
	insideout(["hello","how","are","you"]);
?>