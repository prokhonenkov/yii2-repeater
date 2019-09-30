Repeater
==============
You can use this extension to duplicate the contents of a form and also other contents 

Installation
------------

The preferred way to install this extension is through [composer](http://getcomposer.org/download/).

Either run

```
php composer.phar require prokhonenkov/yii2-repeater
```

or add

```
"prokhonenkov/yii2-repeater": "*"
```

to the require section of your `composer.json` file.

Configuration
-------------

Add modules declaration to your config file for web config:

```php
<?php

return [
    // ... your config
    'modules' => [
        'repeater'=> [
            'class' => \prokhonenkov\repeater\Repeater::class
        ],
    ]

```

##Usage
![Single column example](./resources/presentation.gif?raw=true)

-----
Example view:

```php
<?= \prokhonenkov\repeater\widgets\RepeaterWidget::widget([
    'className' => \app\models\TestRepeater::class,
    'modelView' => '@app/views/site/repeater',
    'models' => [ //list of your models
        new \app\models\TestRepeater(),

    ],
    'btnNewTitle' => 'Add main container',
    'addCallback' => new \yii\web\JsExpression("
        function(data){
           console.log(data);
        }
    "),
    'removeCallback' => new \yii\web\JsExpression("
        function(data){
           console.log(data);
        }
    ")
]);?>

```  
Example your model:

```php
<?php 
    class TestRepeater extends Model
    {
        public $title;
        public $text;
    
        public function rules()
        {
            return [
                [['date', 'text'], 'safe']
            ];
        }
    }
?>
```  

Example view of model:

```php
<?php

/** @var \app\models\TestRepeater $model */
/** @var int $id */

?>
<table border="1" width="100%">
    <tbody>
        <tr>
            <td>
                <div class="form-group field-posts-title required has-success">
                    <?= \yii\helpers\Html::activeTextInput($model, "title[$id]")?>
                </div>
        
                <?= CKEditor::widget([
                    'name' => "TestRepeater[text][$id]",
                    'id' => 'cke' . $id,
                    'options' => ['rows' => 3],
                    'preset' => 'basic'
                ])?>
            </td>
        </tr>
        <tr>
            <td>
                <?= \prokhonenkov\repeater\widgets\RepeaterWidget::widget([
                    'className' => \app\models\TestRepeaterTwo::class,
                    'modelView' => '@app/views/site/repeaterTwo',
                    'models' => [
                        new \app\models\TestRepeaterTwo(),
                    ],
                    'additionalData' => [
                        'container' => "[two][$id]",
                        'parentId' => $id
                    ],
                    'btnNewTitle' => 'Add second container',
                    'addCallback' => new \yii\web\JsExpression("
                    function(data){
                       console.log(data);
                    }
                "),
                    'removeCallback' => new \yii\web\JsExpression("
                    function(data){
                       console.log(data);
                    }
                ")
                ]);?>
            </td>
        </tr>
    </tbody>
</table>
```  