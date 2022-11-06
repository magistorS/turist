<?php

namespace app\models;
use app\models\Tovar;
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
class Orderrr extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'orderrr';

    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'hostel','photo', 'task'], 'string', 'max' => 255],
            [['email', 'phone', 'task'], 'string', 'max' => 50],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Имя',
            'email' => 'Email',
            'phone' => 'Телефон',
            'hostel' => 'Выбирете путишествие',
            'task'=>'city',
        ];
    }

    /**
     * Gets query for [[OrederrrItems]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getOrederrrItems()
    {
        return $this->hasMany(OrederrrItem::className(), ['order_id' => 'id']);
    }
}
