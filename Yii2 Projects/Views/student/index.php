<?php
use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var app\models\Student $model */

$this->params['breadcrumbs'][] = ['label' => 'Students', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<!-- <h3><//?php echo \yii\helpers\Html::encode($model->title)?></h3> -->

<h1>student information</h1>


<!-- <div>
    <a href="<//?php echo \yii\helpers\url::to(['/student/index', 'id'=>$model->id ])?>">
</div> -->
<h1>My name is <?php echo $firstname . ' ' . $lastname; ?></h1>


