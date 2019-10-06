<?php
/**
 * Created by PhpStorm.
 * User: prokhonenkov
 * Date: 19.03.19
 * Time: 17:19
 */

namespace prokhonenkov\repeater\assets;

/**
 * Class AssetBundle
 * @package prokhonenkov\repeater\assets
 */
class AssetBundle extends \yii\web\AssetBundle
{
	public $sourcePath = '@vendor/prokhonenkov/yii2-repeater/assets';

	public $css = [
		'css/repeater.css'
	];

	public $js = [
		'js/repeater.js'
	];

	public $depends = [
		'yii\web\YiiAsset',
		'yii\bootstrap\BootstrapAsset',
	];
}