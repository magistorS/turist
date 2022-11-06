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
<body style="background: linear-gradient(90deg, #cfecd0, #a0cea7, #9ec0db);
}
">
<section>

    <div class="container" style="">
        <div class="row">
            <div class="col-sm-3">
                <div class="left-sidebar">
                   
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
                    <?= $form->field($model, 'name')->textInput(); ?>
                    <?= $form->field($model, 'phone')->textInput(); ?>

                    <?= $form->field($model, 'hostel')->listBox(['London' => 'london', 'Moscow' => 'Moscow', 5 => 'Krime' ],['']); ?>
                    
                
         


                    <?= Html::submitButton('Отправить', ['class' => 'btn btn-primary']); ?>
                 
                    <?php ActiveForm::end(); ?>
                </div>
                <a href="goest"></a>
            </div>

        </div>
    </div>
</section>
</body>