<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "article_comment".
 *
 * @property integer $id
 * @property integer $article_id
 * @property integer $user_id
 * @property string $comment
 * @property integer $like_count
 * @property string $create_datetime
 * @property string $modify_datetime
 */
class ArticleComment extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'article_comment';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['article_id', 'user_id', 'like_count'], 'integer'],
            [['create_datetime', 'modify_datetime'], 'safe'],
            [['comment'], 'string', 'max' => 500],
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
            'user_id' => 'User ID',
            'comment' => 'Comment',
            'like_count' => 'Like Count',
            'create_datetime' => 'Create Datetime',
            'modify_datetime' => 'Modify Datetime',
        ];
    }
}
