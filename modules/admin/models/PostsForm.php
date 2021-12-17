<?php

namespace app\modules\admin\models;

use yii\base\Model;

class PostsForm extends Model
{
    public $id;
    public $title;
    public $desc;
    public $body;
    public $autor_id;
    public $categories_id;
    public $imageFile;

    public function rules()
    {
        return [
            [['title', 'autor_id'], 'required'],
            ['categories_id', 'integer'],
            [['body', 'desc'], 'string'],
            ['title', 'string', 'max' => 255],
            ['imageFile', 'file', 'skipOnEmpty' => true, 'extensions' => 'png, jpg']
        ];
    }

    public function attributeLabels()
    {
        return [
            'title' => 'Заголовок',
            'body' => 'Содержание',
            'desc' => 'Краткое описание',
            'create_date' => 'Дата',
            'autor_id' => 'Автор',
            'imageFile' => 'Картинка',
            'categories_id' => 'Категория'
        ];
    }

    public function upload($model)
    {
        if ($this->validate()) {
            $model->title = $this->title;
            $model->body = $this->body;
            $model->desc = $this->desc;
            $model->categories_id = $this->categories_id;
            $model->autor_id = $this->autor_id;
            $name = false;
            if ($this->imageFile) {
                $name = md5(microtime() . uniqid()) . '.' . $this->imageFile->extension;
                $this->imageFile->saveAs($_SERVER['DOCUMENT_ROOT'] . '/web/uploads/' . $name);
            }
            return $name;
        } else {
            return false;
        }
    }
}