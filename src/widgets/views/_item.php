<?php
/**
 * Created by Vitaliy Prokhonenkov <prokhonenkov@gmail.com>
 * Date 29.09.2019
 * Time 10:15
 */

/** @var \yii\base\View $modelView */
/** @var object $model */
/** @var string $id */
/** @var array $additionalData */
/** @var mixed $additionalClientData */
?>
<div class="repeater-item form-row form-flex grey-block" data-id="<?= $id; ?>">
	<a class="remove" href="javascript:;">X</a>
	<div class="repeater-content">
		<?= $this->render($modelView, [
            'model' => $model,
            'id' => $id,
            'additionalData' => $additionalData,
            'additionalClientData' => $additionalClientData,
			'form' => $form??null
		]);?>
	</div>
</div>
