<?require("config.php");if ( $_SESSION['login'] == 1 ){$id = $_GET['id'];		if ( is_numeric($id) )	{		$im = $db->query("SELECT `id`,`file`,`timea` FROM `send_files` WHERE `id`='$id' AND `do`='$logged[username]'");		$ima = $im -> fetch_assoc();		if ( $ima['id'] )			{						$nao = time() + 20;			$add = $db->query("UPDATE `send_files` SET `clicked`='$nao' WHERE `id`='$id'");			//echo $ima[file];						$file_name = "$ima[file]"; 				$size = getimagesize($file_name);				$raz = filesize($file_name);				header('Pragma: public'); 				header('Expires: 0');				header('Cache-Control: must-revalidate, post-check=0, pre-check=0');				header('Last-Modified: '.gmdate ('D, d M Y H:i:S', filemtime ($file_name)).' GMT');				header('Cache-Control: private',false);				header('Content-Type: '.$mime);				header('Content-Transfer-Encoding: binary');				header('Content-Length: '.filesize($file_name)); 				header('Content-Disposition: attachment; filename="'.basename($file_name).'"');				header('Connection: close');				readfile($file_name);				exit; 							}		else			{			header("Location: index.php");			}	}}?>