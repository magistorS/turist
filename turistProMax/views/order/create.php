<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Orderrr */

$this->title = 'Create Orderrr';
$this->params['breadcrumbs'][] = ['label' => 'Orderrrs', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="orderrr-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
