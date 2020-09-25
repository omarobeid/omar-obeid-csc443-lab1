<?php

	function GCD($a, $b)
	{
		while ($b != 0)
    {
        $m = $a % $b;
        $a = $b;
        $b = $m;
    }
    return $a;
		
	}


	echo GCD(24,84);
?>