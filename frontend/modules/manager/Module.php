<?php

namespace frontend\modules\manager;

use yii\filters\AccessControl;
use Yii;
/**
 * manager module definition class
 */
class Module extends \yii\base\Module
{
    /**
     * {@inheritdoc}
     */
    public $controllerNamespace = 'frontend\modules\manager\controllers';
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'allow' => true,
                        'roles' => ['@'],
                        'matchCallback'=>function($rule, $action){
                            if(Yii::$app->user->identity->role_id != 1){
                                $url = Yii::$app->user->identity->role->url;
                                header('Location:'.$url);
                                exit;
                            }else{
                                return true;
                            }
                        }
                    ],

                ],
            ],
        ];
    }
    /**
     * {@inheritdoc}
     */
    public function init()
    {
        parent::init();
        Yii::$app->viewPath = '@frontend/modules/manager/views';
        // custom initialization code goes here
    }
}
