<?php

namespace app\models;

use Yii;
use yii\db\ActiveRecord;
use yii\behaviors\TimestampBehavior;
use yii\db\Expression;

/**
 * This is the model class for table "news".
 *
 * @property string $headline
 * @property string $text
 * @property string $author
 * @property string $create_time
 * @property string $update_time
 */
class News extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
	public function getPrimaryKey($asArray=false)
	{
		return "id";
	}
	 
    public static function tableName()
    {
        return 'news';
    }

	public function behaviors()
    {
        return [
            [
                'class' => TimestampBehavior::className(),
                'attributes' => [
                    ActiveRecord::EVENT_BEFORE_INSERT => ['create_time', 'update_time'],
                    ActiveRecord::EVENT_BEFORE_UPDATE => ['update_time'],
                ],
                // если вместо метки времени UNIX используется datetime:
                'value' => new Expression('NOW()'),
            ],
        ];
    }
	
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['headline', 'text'], 'required'],
            [['text'], 'string'],
            [['create_time', 'update_time'], 'safe'],
            [['headline', 'author'], 'string', 'max' => 255],
        ];
		
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'headline' => 'Headline',
            'text' => 'Text',
            'author' => 'Author',
            'create_time' => 'Create Time',
            'update_time' => 'Update Time',
        ];
    }
}
