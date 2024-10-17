<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\School $model */

$this->title = 'Update School: ' . $model->col_id;
$this->params['breadcrumbs'][] = ['label' => 'Schools', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->col_id, 'url' => ['view', 'col_id' => $model->col_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="school-update">

    <h1><?= Html::encode($this->title) ?></h1>

    
    <?= $this->render('_form', [
        'model' => $model,
        'cities' =>$cities,
        'countries' => $countries,
    ]) ?>

</div>
