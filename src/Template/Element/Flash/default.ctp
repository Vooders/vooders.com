<?php
$class = 'message';
if (!empty($params['class'])) {
    $class .= ' ' . $params['class'];
}
?>
<div class="bs-component">
	<div class="<?= h($class) ?> alert alert-dismissible alert-warning">
		<button type="button" class="close" data-dismiss="alert">×</button>
		<?= h($message) ?>
	</div>
</div>

