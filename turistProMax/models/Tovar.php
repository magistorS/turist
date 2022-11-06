<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tovar".
 *
 * @property int $id
 * @property string $shifer
 * @property int $stoimost
 * @property string $photo
 *
 * @property Comment[] $comments
 */
class Tovar extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    // public static function tableName()
    // {
    //     return 'tovar';
    // }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'stoimost'], 'required'],
            [['stoimost'], 'integer'],
            [['name', 'photo'], 'string', 'max' => 255],
            [['photo'], 'file', 'skipOnEmpty' => true]
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Шифер',
            'stoimost' => 'Цена',
            'photo' => 'Фотография',
        ];
    }

    /**
     * Gets query for [[Comments]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getComments()
    {
        return $this->hasMany(Comment::className(), ['id_Tovar' => 'id']);
    }
}
