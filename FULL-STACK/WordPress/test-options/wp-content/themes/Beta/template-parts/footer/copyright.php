<?php
/**
 * Copyright template part.
 *
 * @package  Raothue
 */
global $rt_option;

if ( empty($rt_option['copyright']) ) {
	return;
}
?>

<div class="copyright row clear">

	<?php echo $rt_option['copyright']; ?>
	
</div>
