<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\School $model */

$this->title = 'Create School';
$this->params['breadcrumbs'][] = ['label' => 'Schools', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="school-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'cities' => $cities,
        'countries' => $countries,
    ]) ?>

</div>
