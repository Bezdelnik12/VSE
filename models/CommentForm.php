<?php

namespace app\models;

use yii\base\Model;

class CommentForm extends Model
{
    public $body;
    public $parents_id;

    public function rules()
    {
        return [
            [['body', 'parents_id'], 'required'],
            ['parents_id', 'integer'],
            ['body', 'string'],
            ['body', 'trim'],
        ];
    }

    public function attributeLabels()
    {
        return [
            'body' => 'Содержание',
            'parents_id' => 'Родитель',
        ];
    }

    public function com($post_id, $author_id)
    {
        $comment = new Comments();
        $comment->user_id = $author_id;
        $comment->post_id = $post_id;
        $comment->body = $this->body;
        $comment->parents_id = $this->parents_id;
        $comment->create_date = time();
        return $comment->save();
    }
}