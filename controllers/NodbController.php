<?php
namespace app\controllers;

use yii\rest\Controller;

class NodbController extends Controller
{
	public function actionMessage()
	{
		$params = \Yii::$app->request->get();
		return [
			'page' => isset($params['page'])?$params['page']:1,
			'size' => isset($params['size'])?$params['size']:10,
			'order' => isset($params['order'])?$params['order']:"id"
		];
	}
	
	public function actionAddMessage()
	{
		$post = \Yii::$app->request->post();
		return $post;
	}
	
	
}