<?php

use yii\helpers\url;
/* @var $this yii\web\View */
use yii\bootstrap4\ActiveForm;
use yii\bootstrap4\Html;
use yii\grid\GridView;
$this->title = 'Help you';



?>

<?= GridView::widget([
    'dataProvider' => $dataProvider,
    'summary'=>'',
    'columns' => [
        ['attribute' =>'photo','content'=>function($model){
            return Html::img($model->photo, ['class'=>'img2']);
        }],
        ['attribute'=> 'name', 'content'=>function($model){
            return Html::a($model->name, ['info', 'id'=>$model->id], ['class'=>'collom']);
        }],

        ['attribute'=> 'stoimost', 'content'=>function($model){
            return Html::a('Купить за ' . $model->stoimost, ['info', 'id'=>$model->id], ['class'=>'btn btn-primary']);
        }],
    ],
]); ?>
<style>
    .summery{
        display:none;
    }
    .collom{
        color: black;
    }
</style>
<div class="container">
    <style>

        nav{
            height: 100px;
        }
        .collom{
            position: relative;
            top: 20px;
        }
        .img2{
            width: 300px;
            position: relative;
            bottom: 70px;
            height: 300px;
        }
    </style>
</div>
