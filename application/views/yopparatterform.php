<?php
/** @var $token string */
?>

<div class="row">
	<div class="col-lg-offset-2 col-lg-8">
		<h1>ヨッパラッタ～</h1>
		<form action="<?= YOPPARATTER_URL_POST ?>" class="form-horizontal" method="POST">

			<div class="form-group">
				<div class="col-lg-10 col-lg-offset-2">
					<label for="textArea" class="control-label">ひょんぶん</label>
					<textarea class="form-control" name="text" rows="3" id="textArea"></textarea>
					<span class="help-block">#yopparatterタグが付きます</span>
				</div>
			</div>
			<div class="form-group">
				<div class="col-lg-10 col-lg-offset-2">
					<input type="hidden" name="token" value="<?= $token ?>" />
					<button type="submit" class="btn btn-lg btn-primary btn-block">ツイートする</button>
				</div>
			</div>
		</form>

	</div>
</div>
