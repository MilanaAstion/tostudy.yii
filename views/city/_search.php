<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\CitySearch $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="city-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'col_id') ?>

    <?= $form->field($model, 'col_alias') ?>

    <?= $form->field($model, 'col_country_id') ?>

    <?= $form->field($model, 'col_title_en') ?>

    <?= $form->field($model, 'col_title_es') ?>

    <?php // echo $form->field($model, 'col_title_ua') ?>

    <?php // echo $form->field($model, 'col_title_ru') ?>

    <?php // echo $form->field($model, 'col_title_cn') ?>

    <?php // echo $form->field($model, 'col_img') ?>

    <?php // echo $form->field($model, 'col_meta_title') ?>

    <?php // echo $form->field($model, 'col_meta_description') ?>

    <?php // echo $form->field($model, 'col_meta_keywords') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
