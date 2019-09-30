<?php

namespace prokhonenkov\repeater;

use prokhonenkov\bannerssystem\exceptions\InvalidConfigException;
use yii\helpers\VarDumper;
use yii\web\Controller;
use yii\web\ForbiddenHttpException;


class Repeater extends \yii\base\Module
{
	public $repeaterItemView = '@vendor/prokhonenkov/yii2-repeater/src/widgets/views/_item';

	private static $moduleId;

    public function init()
    {
    	self::$moduleId = $this->uniqueId;

		parent::init();
    }

	/**
	 * @return mixed
	 */
	public static function getModuleId()
	{
		return self::$moduleId;
	}
}
