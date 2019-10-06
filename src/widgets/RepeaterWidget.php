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
use yii\widgets\ActiveForm;

/**
 * Class RepeaterWidget
 * @package prokhonenkov\repeater\widgets
 */
class RepeaterWidget extends Widget
{
	/**
	 * @var string
	 */
	private $prefix = 'vp';
	/**
	 * @var string|int
	 */
	public $id;
	/**
	 * @var ActiveForm
	 */
	public $form;
	/**
	 * @var string
	 */
	public $className;
	/**
	 * @var array
	 */
	public $models = [];
	/**
	 * @var
	 */
	public $modelView;
	/**
	 * @var string
	 */
	public $addCallback;
	/**
	 * @var string
	 */
	public $removeCallback;
	/**
	 * @var string
	 */
	public $btnNewTitle = 'Add new';
	/**
	 * @var array
	 */
	public $additionalData = [];

	public function init()
	{
		parent::init();
		if(!$this->id) {
			$this->id = md5(microtime());
		}
	}

	/**
	 * @return string
	 */
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