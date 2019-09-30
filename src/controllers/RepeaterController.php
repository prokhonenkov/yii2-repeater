<?php
/**
 * Created by Vitaliy Prokhonenkov <prokhonenkov@gmail.com>
 * Date 29.09.2019
 * Time 9:35
 */

namespace prokhonenkov\repeater\controllers;


use yii\web\Controller;

class RepeaterController extends Controller
{
	public function actionAddNew()
	{
		$moduleId = $className = $id = $modelView = $additionalData = null;
		extract(\Yii::$app->request->post());

		$model = new $className;

		return $this->renderAjax(\Yii::$app->getModule($moduleId)->repeaterItemView, [
			'model' => $model,
			'id' => $id,
			'modelView' => $modelView,
			'additionalData' => $additionalData
		]);
	}
}