<?php
	function drunkencap($str)
	{
		$array = null;
		
		
		for($i=0; $i<strlen($str);$i++)
		{
			$rand = rand(0,1);
			if($rand==0)
			{
				
				echo strtoupper($str[$i]);
			}
			if($rand==1)
			{
				
				echo strtolower($str[$i]);
			}
		}
		
		
		
		
	}
	
	
	drunkencap("phpresult");
	
?>