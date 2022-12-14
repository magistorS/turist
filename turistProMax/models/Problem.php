<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "problem".
 *
 * @property int $id
 * @property string $name
 * @property string $description
 * @property string $timestamp
 * @property int $idUser
 * @property int $idCategory
 * @property string $status
 * @property string|null $photoBefore
 * @property string|null $photoAfter
 *
 * @property Category $idCategory0
 * @property User $idUser0
 */
class Problem extends \yii\db\ActiveRecord
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
            [['name', 'description', 'idUser', 'idCategory', 'city', 'text'], 'required'],
            [['description', 'status'], 'string'],
            [['timestamp'], 'safe'],
            [['idUser', 'idCategory'], 'integer'],
            [['name', 'photoBefore', 'photoAfter'], 'string', 'max' => 255],
            [['idCategory'], 'exist', 'skipOnError' => true, 'targetClass' => Category::className(), 'targetAttribute' => ['idCategory' => 'id']],
            [['idUser'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['idUser' => 'id']],
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
            'city'=>'Город',
            'text'=>'text',
            'photoBefore' => '',
            'photoAfter' => '',
            'photo' => '',
        ];
    }

    /**
     * Gets query for [[IdCategory0]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCategory()
    {
        return $this->hasOne(Category::className(), ['id' => 'idCategory']);
    }

    /**
     * Gets query for [[IdUser0]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getIdUser0()
    {
        return $this->hasOne(User::className(), ['id' => 'idUser']);
    }
    public function actionView($id)
    {
        $imgFullPath = '/app/myfiles/img/65/img.jpg';

        return $this->render('view', [
            'model' => $this->findModel($id),
            'imgModel' => Yii::$app->response->sendFile($imgFullPath),
        ]);
    }
}
