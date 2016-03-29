<?php
namespace app\controllers;

use yii\rest\Controller;
use yii\data\ActiveDataProvider;
use app\models\Message;

class DbController extends Controller
{
	public function actionMessage()
	{
		$params = \Yii::$app->request->get();
		$query = Message::find();
		return new ActiveDataProvider([
				'query' => $query,
				'pagination' => [
					'pageSize' => isset($params['size'])?$params['size']:10, 
				],
				'sort' => [
					'attributes' => [
            			'id' => [
                			'asc' => ['id' => SORT_ASC, 'id' => SORT_ASC],
                			'desc' => ['id' => SORT_DESC, 'id' => SORT_DESC],
                			'default' => SORT_DESC,
            		],
        		],
			]
		]);
	}
	
	public function actionAddMessage()
	{
		$post = \Yii::$app->request->post();
		$model = new Message();
		$model->load($post, '');
		$model->save();
		return $model;
	}
}