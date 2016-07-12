<?
require("config.php");
if ( $_SESSION['login'] != 1 ) { header("Location: login.php"); } else {

$getoldpass = $db->query("SELECT `password` FROM `users` WHERE `id`='$logged[id]'");
$dbpass = $getoldpass -> fetch_object();

$old_pass = $_POST['oldpass'];
$new_mail = clear($_POST['new_mail']);
$new_passw = $_POST['new_passw'];
$confirm = $_POST['conf_pass'];

$old_pass_check = md5($old_pass);
	if ( $old_pass_check == $dbpass->password )
		{
			if ( !empty($new_passw) AND !empty($confirm) )
			{
				if ( $newpassw != $confirm )
					{
					echo 'Паролите не съвпадат!';
					}
				else
					{
					$newpwd = md5($new_passw);
					$db->query("UPDATE `users` SET `password`='$newpwd' WHERE `id`='$logged[id]'");
					echo 'Паролата е променена успешно.';
					}
			}
			
			if ( !empty($new_mail) )
				{
					if ( validemail($new_mail) )
						{
							$db->query("UPDATE `users` SET `email`='$$new_mail' WHERE `id`='$logged[id]'");
							echo 'Е-майл е променен успешно.';
						}
					else
						{
						echo 'Невалиден е-майл.';
						}
			
				}
				
		}
	else
		{
		echo 'Невярна стара парола.';
		}


}
?>