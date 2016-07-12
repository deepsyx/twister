<?
	function clear($info) 
	{
	return addslashes(htmlspecialchars($info));
	}

	function status2pic($int)
	{
		if ( $int == 0 )
		{
		$pic = 'izvanliniq.png';
		}
		else if ( $int == 1 )
		{
		$pic = 'naliniq.png';
		}
		else if ( $int == 2 )
		{	
		$pic = 'otpochivasht.png';
		}
		else
		{
		$pic = 'otsustvasht.png';
		}
	return $pic;
	}

	function emote($text)
	{
		$array = array( 1 => "(rofl)", 2 => ":p", 3 => ":x");
		$array2 = array( 1 => '<img src="images/emote/rofl.gif" width="15" height="15">', 2 => '<img src="images/emote/p.gif" width="15" height="15">', 3 => "neeeee");

		$result = str_replace($array,$array2,$text);
		return $result;
	}
	
	function validemail($mail) {
	return preg_match('/^[\w.-]+@([\w.-]+\.)+[a-z]{2,6}$/is', $mail);
	}
?>