<?php
namespace app\models;

use yii\db\ActiveRecord;

class Message extends ActiveRecord
{
	public static function tableName()
	{
		return 'messages';
	}
	
	public function rules()
	{
		return [
			[['name', 'description'], 'string'],
			[['likes_count'], 'integer']
		];	
	}

}