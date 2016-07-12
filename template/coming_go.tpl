<center>
<form action="" method="post" enctype="multipart/form-data"><br />
<table border="0">
<tr><td><a class="sf">Избери файл:</a></td><td><input type="file" name="file" /></td></tr>
<tr><td><a class="sf">Изпрати до:</a></td><td>
<select name="do">
<!-- BEGIN coming_file -->
<option value="{coming_file.name}">{coming_file.rname} ({coming_file.name})</option>
<!-- END coming_file -->
</select>

</td></tr>
<tr><td></td><td><input type="submit" name="Submit" value="Качи" /></td></td>
</table>
</form>
</center>



