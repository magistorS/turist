<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "orderrr".
 *
 * @property int $id
 * @property string|null $name
 * @property string|null $email
 * @property string|null $phone
 * @property string|null $hostel
 *
 * @property OrederrrItem[] $orederrrItems
 */
class Goest extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'problem';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'hostel'], 'string', 'max' => 255],
            [['email', 'phone'], 'string', 'max' => 50],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => '',
            'description' => '',
            'timestamp' => '',
            'idUser' => '',
            'idCategory' => '',
            'status' => 'Решена',
           
      
            'photoBefore' => '',
            'photoAfter' => '',
            'photo' => '',
        ];
    }

    /**
     * Gets query for [[OrederrrItems]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getOrederrrItems()
    {
        return $this->hasMany(problemItem::className(), ['order_id' => 'id']);
    }
    public static function getAll()
 {
 $data = self::find()->all();
 return $data;
 }
}
