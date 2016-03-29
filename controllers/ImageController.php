<?php
namespace app\controllers;

use yii\rest\Controller;

class ImageController extends Controller
{
	public function actionLike()
	{
		return \Yii::$app->response->sendFile(\Yii::getAlias('@webroot').'/static/like.png');
	}	
	
}