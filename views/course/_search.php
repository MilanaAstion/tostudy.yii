<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\CourseSearch $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="course-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'col_id') ?>

    <?= $form->field($model, 'col_school_id') ?>

    <?= $form->field($model, 'col_prog_id') ?>

    <?= $form->field($model, 'col_title_en') ?>

    <?= $form->field($model, 'col_title_es') ?>

    <?php // echo $form->field($model, 'col_title_ua') ?>

    <?php // echo $form->field($model, 'col_title_ru') ?>

    <?php // echo $form->field($model, 'col_title_cn') ?>

    <?php // echo $form->field($model, 'col_description_en') ?>

    <?php // echo $form->field($model, 'col_description_es') ?>

    <?php // echo $form->field($model, 'col_description_ua') ?>

    <?php // echo $form->field($model, 'col_description_ru') ?>

    <?php // echo $form->field($model, 'col_description_cn') ?>

    <?php // echo $form->field($model, 'col_price') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
