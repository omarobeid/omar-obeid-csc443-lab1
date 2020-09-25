
<?php


	function palyndrome($string)
	{
		if(strlen($string)==0 || strlen($string)==0 )
		{
			echo "The string is a palyndrome";
			return true;
		}
		if($string[0]==$string[strlen($string)-1])
		{
			return palyndrome(substr($string,1,-2));
		}
		echo "This string is not a palyndrome";
		return false;
		
	}
	
	palyndrome("bob");
?>