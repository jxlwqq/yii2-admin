<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "article_content".
 *
 * @property integer $id
 * @property integer $article_id
 * @property string $content
 * @property string $create_datetime
 * @property string $modify_datetime
 */
class ArticleContent extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'article_content';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['article_id'], 'integer'],
            [['content'], 'required'],
            [['content'], 'string'],
            [['create_datetime', 'modify_datetime'], 'safe'],
            [['article_id'], 'unique'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'article_id' => 'Article ID',
            'content' => 'Content',
            'create_datetime' => 'Create Datetime',
            'modify_datetime' => 'Modify Datetime',
        ];
    }
}
