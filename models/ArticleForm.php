<?php
/**
 * Created by PhpStorm.
 * User: jxlwqq
 * Date: 2016/8/7
 * Time: 13:10
 */

namespace app\models;


use yii\base\Model;

class ArticleForm extends Model
{
    public $id;
    public $title;
    public $author;
    public $abstract;
    public $source;
    public $content;
    public $tag;
    public $create_datetime;

    public function rules()
    {
        return [
            [['title', 'source'], 'string', 'max' => 100],
            [['author'], 'string', 'max' => 20],
            [['abstract'], 'string', 'max' => 256],
            [['content'], 'required'],
            [['content'], 'string'],
            [['tag'], 'string', 'max' => 50],
            [['tag'], 'unique'],
        ];
    }


    public function save()
    {
        $article = new Article();
        $articleContent = new ArticleContent();
        $tag = new Tag();
        $articleTag = new ArticleTag();
        $this->create_datetime = date('Y-m-d H:i:s');

        $article->title = $this->title;
        $article->author = $this->author;
        $article->abstract = $this->abstract;
        $article->create_datetime = $this->create_datetime;
        $article->save();
        $this->id = $article->id;

        $articleContent->article_id = $this->id;
        $articleContent->content = $this->content;
        $articleContent->create_datetime = $this->create_datetime;
        $articleContent->save();


        $tag->tag = $this->tag;
        $tag->create_datetime = $this->create_datetime;
        $tag->save();

        $articleTag->article_id = $this->id;
        $articleTag->tag_id = 1;
        $articleTag->create_datetime = $this->create_datetime;
        $articleTag->save();
        return true;


    }

    /**
     * 格式化标签
     */
    public function tagFormat() {

    }
}