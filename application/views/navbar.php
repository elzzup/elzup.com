<?php
/* @var $current_path string */

?>

<nav id="navbar" class="">
	<a href="<?= PATH_TOP ?>">TOP</a>
	&gt;
	<a class="<?= $current_path == PATH_ME ? 'active ' : '' ?>menu me" href="<?= PATH_ME ?>">Me</a>
	<a class="<?= $current_path == PATH_PORT ? 'active ' : '' ?>menu port" href="<?= PATH_PORT ?>">Portfolio</a>
	<a class="<?= $current_path == PATH_GROUP ? 'active ' : '' ?>menu group" href="<?= PATH_GROUP ?>">Group</a>
	<a class="<?= $current_path == PATH_LOG ? 'active ' : '' ?>menu log" href="<?= PATH_LOG ?>">Log</a>
</nav>
