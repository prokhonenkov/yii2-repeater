<?php
/**
 * Created by Vitaliy Prokhonenkov <prokhonenkov@gmail.com>
 * Date 28.09.2019
 * Time 19:16
 */

/** @var \yii\base\Model $this */
/** @var \yii\base\View $modelView */
/** @var array $models */
/** @var string $id */
/** @var string $btnNewTitle */
/** @var string $prefix */
/** @var \yii\base\View $this */
/** @var array $additionalData */
?>

<div class="<?= $prefix; ?>-repeater" id="<?= $prefix; ?>-<?= $id?>">
    <div class="list-items">
		<?php foreach ($models as $index => $model): ?>
            <?= $this->render('_item', [
                'model' => $model,
                'modelView' => $modelView,
                'id' => $index,
                'additionalData' => $additionalData
            ]); ?>
		<?php endforeach; ?>
    </div>
    <a class="btn btn-primary new-item" href="javascript:;"><?= $btnNewTitle; ?></a>
</div>
