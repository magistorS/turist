<?php

use yii\helpers\url;
/* @var $this yii\web\View */
use yii\bootstrap4\ActiveForm;
use yii\bootstrap4\Html;
use yii\grid\GridView;
$this->title = 'Help you';



?>
<?php

foreach ($problems as $tov) {
    echo '
    <h2>'.$tov->name.'<h2>
    <img src="uploads/'.$tov->photoAfter. '">

    ';

}
?>

</html>


