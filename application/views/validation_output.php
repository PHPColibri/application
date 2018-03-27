<? if (isset($errors)) { ?>
<div class="alert alert-error">
	<? foreach ($errors as $error) { ?>
	<div><?=$error?></div>
	<? } ?>
</div>
<? } ?>
