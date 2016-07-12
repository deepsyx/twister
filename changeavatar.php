<?
require("config.php");
if ( $_SESSION['login'] != 1 ) { header("Location: login.php"); }
else
{
$template->assign_vars(array("avatar" => $logged['avatar'])); 
	if ( $_POST['btn'] && !empty($_POST['link']) )
	{
		if ( @fopen($_POST['link'],"r") )
			{
			$pic = getimagesize($_POST[link]);
			if ( $pic && is_array($pic) )
			{
				if ( $pic[0] < 151 && $pic[1] < 151 )
					{
					$postlink = clear($_POST['link']);
					
					$up = $db->query("UPDATE `users` SET `avatar`='$postlink' WHERE `id`='$logged[id]'");	
					$_SESSION['uinfo']['avatar'] = $postlink;
					
						if ( $up ) 
						{
							$template->assign_vars(array("error" => 'Успешно качен аватар ;)')); 
						 } else 
							{
							$template->assign_vars(array("error" => 'Грешка при качване! <br /> Администраторът е уведомен.')); 
			
							}
					}
				else
						{
							$template->assign_vars(array("error" => 'Картинката трябва да не е по-голяма от 150х150!')); 
						}
			}
			else
					{
					$template->assign_vars(array("error" => 'Невалиден линк!')); 
					}
			}
		else
				{
				$template->assign_vars(array("error" => 'Невалиден линк!')); 
				}
	}
	$db->close();
	$template -> pparse("avatar");
}
?>
