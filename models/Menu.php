<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "menu".
 *
 * @property int $id
 * @property string $title
 * @property string $link
 * @property int $parents_id
 *
 * @property Categories $categories
 */
class Menu extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'menu';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['parents_id'], 'integer'],
            [['parents_id'], 'required'],
            [['title', 'link'], 'string', 'max' => 255],
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
            'link' => 'Ссылка',
            'parents_id' => 'Родитель',
        ];
    }
}
