<?php
/**
 * Created by Vitaliy Prokhonenkov <prokhonenkov@gmail.com>
 * Date 29.09.2019
 * Time 9:35
 */

namespace prokhonenkov\repeater\controllers;


use yii\web\Controller;

/**
 * Class RepeaterController
 * @package prokhonenkov\repeater\controllers
 */
class RepeaterController extends Controller
{
	/**
	 * @return string
	 */
	public function actionAddNew()
	{
		$moduleId = $className = $id = $modelView = $additionalData = $additionalClientData = null;
		extract(\Yii::$app->request->post());

		$model = new $className;

		return $this->renderAjax(\Yii::$app->getModule($moduleId)->repeaterItemView, [
			'model' => $model,
			'id' => $id,
			'modelView' => $modelView,
			'additionalData' => $additionalData,
			'additionalClientData' => $additionalClientData
		]);
	}
}