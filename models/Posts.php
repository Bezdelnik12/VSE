<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "posts".
 *
 * @property int $id
 * @property string $title
 * @property int $create_date
 * @property string|null $body
 * @property int $autor_id
 * @property string|null $desc
 * @property string $images
 * @property string $imageFile
 * @property int $categories_id
 *
 * @property Users $autor
 * @property Categories $categories
 * @property Comments[] $comments
 */
class Posts extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'posts';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['title', 'autor_id'], 'required'],
            [['create_date', 'autor_id', 'categories_id'], 'integer'],
            [['body', 'desc'], 'string'],
            [['title', 'images'], 'string', 'max' => 255],
            [['categories_id'], 'exist', 'skipOnError' => true, 'targetClass' => Categories::className(), 'targetAttribute' => ['categories_id' => 'id']],
            [['autor_id'], 'exist', 'skipOnError' => true, 'targetClass' => Users::className(), 'targetAttribute' => ['autor_id' => 'id']]
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Заголовок',
            'body' => 'Содержание',
            'desc' => 'Краткое описание',
            'create_date' => 'Дата',
            'autor_id' => 'Автор',
            'images' => 'Картинка',
            'imageFile' => 'Картинка',
            'categories_id' => 'Категория'
        ];
    }

    /**
     * Gets query for [[Autor]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getAutor()
    {
        return $this->hasOne(Users::className(), ['id' => 'autor_id']);
    }

    /**
     * Gets query for [[Categories]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCategories()
    {
        return $this->hasOne(Categories::className(), ['id' => 'categories_id']);
    }

    /**
     * Gets query for [[Comments]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getComments()
    {
        return $this->hasMany(Comments::className(), ['post_id' => 'id']);
    }
}
