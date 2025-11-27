
<?php

$country = '';
$IP = $_SERVER['REMOTE_ADDR'];

echo $IP;

if (!empty($IP)) {
$country = file_get_contents('http://api.hostip.info/country.php?ip='.$IP);
}

echo $country;

?>


<style>

form.cmxform fieldset {
  margin-bottom: 10px;
}
form.cmxform legend {
  padding: 0 2px;
  font-weight: bold;
}
form.cmxform label {
  display: inline-block;
  line-height: 1.8;
  vertical-align: top;
}
form.cmxform fieldset ol {
  margin: 0;
  padding: 0;
}
form.cmxform fieldset li {
  list-style: none;
  padding: 5px;
  margin: 0;
}
form.cmxform fieldset fieldset {
  border: none;
  margin: 3px 0 0;
}
form.cmxform fieldset fieldset legend {
  padding: 0 0 5px;
  font-weight: normal;
}
form.cmxform fieldset fieldset label {
  display: block;
  width: auto;
}
form.cmxform em {
  font-weight: bold;
  font-style: normal;
  color: #f00;
}
form.cmxform label {
  width: 120px; /* Width of labels */
}
form.cmxform fieldset fieldset label {
  margin-left: 123px; /* Width plus 3 (html space) */
}

</style>


<form action="/api/mix/add" method="post" name="form_edit" class="cmxform">
 
<fieldset>
	
<legend>add mix test form</legend>
  <ol>

	<li>
	<label for="user_hash">api_key</label><input name="api_key" value="9873243287888" />	
	</li>
	<li>
	<label for="user_hash">sig</label><input name="sig" value="5e4f878c9c632c4b2363056fd9b05a32" />	
	</li>

	<li>
	<label for="user_hash">user_hash</label><input name="user_hash" value="asdfas9323kdfsdfsd" />	
	</li>

<? 

$testdata[0] = "thriller";
$testdata[1] = "i'm bad";




for ( $i = 0; $i < 2; $i++) { ?>	
	
	<li>
	<label for="deck_id[<?=$i?>]">deck_id[<?=$i?>]</label><input name="deck_id[<?=$i?>]" value="<?= $i+1 ?>"/>	
	</li>
    <li>
	<label for="track_title[<?=$i?>]">track_title[<?=$i?>]</label><input name="track_title[<?=$i?>]" value="<?=$testdata[$i]?>" />	
	</li>
	<li>
	<label for="artist_name[<?=$i?>]">artist_name[<?=$i?>]</label><input name="artist_name[<?=$i?>]" />	
	</li>
	<li>
	<label for="album_name[<?=$i?>]">album_name[<?=$i?>]</label><input name="album_name[<?=$i?>]" />	
	</li>
	<li>
	<label for="ext_itunes_id[<?=$i?>]">ext_itunes_id[<?=$i?>]</label><input name="ext_itunes_id[<?=$i?>]" />	
	</li>
	<li>
	<label for="track_data[<?=$i?>]">track_data[<?=$i?>]</label><input name="track_data[<?=$i?>]" />	
	</li>
	
	
<? }?>	
	
 </ol>	
	
</fieldset>

	
<input type="submit"/>	
	
</form>