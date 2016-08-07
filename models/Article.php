<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "article".
 *
 * @property integer $id
 * @property string $title
 * @property string $author
 * @property string $abstract
 * @property string $source
 * @property integer $comment_count
 * @property integer $like_count
 * @property integer $favorite_count
 * @property string $create_datetime
 * @property string $modify_datetime
 */
class Article extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'article';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['create_datetime'], 'safe'],
            [['title', 'source'], 'string', 'max' => 100],
            [['author'], 'string', 'max' => 20],
            [['abstract'], 'string', 'max' => 256],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Title',
            'author' => 'Author',
            'abstract' => 'Abstract',
            'source' => 'Source',
            'comment_count' => 'Comment Count',
            'like_count' => 'Like Count',
            'favorite_count' => 'Favorite Count',
            'create_datetime' => 'Create Datetime',
            'modify_datetime' => 'Modify Datetime',
        ];
    }
}
