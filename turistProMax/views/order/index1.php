<?php
/*
 * Страница оформления заказа, файл views/order/checkout.php
 */

use app\components\TreeWidget;
use app\components\BrandsWidget;
use yii\widgets\ActiveForm;
use yii\helpers\Html;
use yii\helpers\Url;
?>

<section>
    <div class="container">
        <div class="row">
            <div class="col-sm-3">
                <div class="left-sidebar">
                    <h2>Каталог</h2>
                    <div class="category-products">

                    </div>

                    <h2>Бренды</h2>
                    <div class="brand-products">

                    </div>
                </div>
            </div>

            <div class="col-sm-9">
                <h1>Оформление заказа</h1>
                <div id="checkout">
                    <?php
                    $form = ActiveForm::begin(
                        ['id' => 'checkout-form', 'class' => 'form-horizontal']
                    );
                    ?>
                    <?= $form->field($orderrr, 'name')->textInput(); ?>
                    <?= $form->field($orderrr, 'email')->input('email'); ?>
                    <?= $form->field($orderrr, 'phone')->textInput(); ?>
                    <?= $form->field($orderrr, 'address')->textarea(['rows' => 2]); ?>
                    <?= $form->field($orderrr, 'comment')->textarea(['rows' => 2]); ?>
                    <?= Html::submitButton('Отправить', ['class' => 'btn btn-primary']); ?>
                    <?php ActiveForm::end(); ?>
                </div>
            </div>
        </div>
    </div>
</section>