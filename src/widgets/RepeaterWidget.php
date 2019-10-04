<?php
/**
 * Created by Vitaliy Prokhonenkov <prokhonenkov@gmail.com>
 * Date 28.09.2019
 * Time 19:10
 */

namespace prokhonenkov\repeater\widgets;

use prokhonenkov\repeater\assets\AssetBundle;
use prokhonenkov\repeater\Repeater;
use yii\base\Widget;
use yii\helpers\Json;
use yii\helpers\Url;
use yii\helpers\VarDumper;

class RepeaterWidget extends Widget
{
	private $id;

	private $prefix = 'vp';

	public $form;

	public $className;

	public $models = [];

	public $modelView;

	public $addCallback;

	public $removeCallback;

	public $btnNewTitle = 'add new';

	public $additionalData = [];

	public function init()
	{
		parent::init();
		$this->id = md5(microtime());
	}

	public function run()
	{
		AssetBundle::register($this->getView());

		$json = Json::encode([
			'id' => sprintf('#%s-%s',
				$this->prefix,
				$this->id
			),
			'addNewUrl' => Url::to([
				sprintf('/%s/repeater/add-new', Repeater::getModuleId())
			]),
			'postData' => [
				'moduleId' => Repeater::getModuleId(),
				'className' => $this->className,
				'modelView' => $this->modelView,
				'additionalData' => $this->additionalData
			],
			'addCallback' => $this->addCallback,
			'removeCallback' => $this->removeCallback
		]);
		$this->getView()->registerJs("
			new Repeater($json);
		");

		return $this->render('repeater', [
			'id' => $this->id,
			'btnNewTitle' => $this->btnNewTitle,
			'models' => $this->models,
			'modelView' => $this->modelView,
			'prefix' => $this->prefix,
			'additionalData' => $this->additionalData,
			'form' => $this->form
		]);
	}
}