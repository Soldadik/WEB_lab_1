<?php
use yii\helpers\Html;
use yii\widgets\LinkPager;
use yii\widgets\ActiveForm;
?>
<div class="site-news">
	<h1 class="text-center">Список новостей</h1>
	<ul>
	<?php foreach ($testn as $test): ?>
		<li>
			<?= $test->headline ?> : <?= $test->author ?>
			<br/>
			<?= ("{$test->text}") ?>
			<br/><br/>
		</li>
	<?php endforeach; ?>
	</ul>
</div>

<?= LinkPager::widget(['pagination' => $pagination]) ?>