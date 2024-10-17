<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\SchoolSearch $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="school-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'col_id') ?>

    <?= $form->field($model, 'col_alias') ?>

    <?= $form->field($model, 'col_city_id') ?>

    <?= $form->field($model, 'col_meta_title') ?>

    <?= $form->field($model, 'col_meta_description') ?>

    <?php // echo $form->field($model, 'col_meta_keywords') ?>

    <?php // echo $form->field($model, 'col_title') ?>

    <?php // echo $form->field($model, 'col_url') ?>

    <?php // echo $form->field($model, 'col_img_mini') ?>

    <?php // echo $form->field($model, 'col_img') ?>

    <?php // echo $form->field($model, 'col_description_en') ?>

    <?php // echo $form->field($model, 'col_description_es') ?>

    <?php // echo $form->field($model, 'col_description_ua') ?>

    <?php // echo $form->field($model, 'col_description_ru') ?>

    <?php // echo $form->field($model, 'col_description_cn') ?>

    <?php // echo $form->field($model, 'col_about_us_en') ?>

    <?php // echo $form->field($model, 'col_about_us_es') ?>

    <?php // echo $form->field($model, 'col_about_us_ua') ?>

    <?php // echo $form->field($model, 'col_about_us_ru') ?>

    <?php // echo $form->field($model, 'col_about_us_cn') ?>

    <?php // echo $form->field($model, 'col_residence_en') ?>

    <?php // echo $form->field($model, 'col_residence_es') ?>

    <?php // echo $form->field($model, 'col_residence_ua') ?>

    <?php // echo $form->field($model, 'col_residence_ru') ?>

    <?php // echo $form->field($model, 'col_residence_cn') ?>

    <?php // echo $form->field($model, 'col_registration_fee') ?>

    <?php // echo $form->field($model, 'col_home_page') ?>

    <?php // echo $form->field($model, 'col_currency') ?>

    <?php // echo $form->field($model, 'col_pdf') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
