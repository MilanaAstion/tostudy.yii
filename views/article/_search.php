<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\ArticleSearch $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="article-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'col_id') ?>

    <?= $form->field($model, 'col_alias') ?>

    <?= $form->field($model, 'col_title_en') ?>

    <?= $form->field($model, 'col_title_es') ?>

    <?= $form->field($model, 'col_title_ua') ?>

    <?php // echo $form->field($model, 'col_title_ru') ?>

    <?php // echo $form->field($model, 'col_title_cn') ?>

    <?php // echo $form->field($model, 'col_text_en') ?>

    <?php // echo $form->field($model, 'col_text_es') ?>

    <?php // echo $form->field($model, 'col_text_ua') ?>

    <?php // echo $form->field($model, 'col_text_ru') ?>

    <?php // echo $form->field($model, 'col_text_cn') ?>

    <?php // echo $form->field($model, 'col_img') ?>

    <?php // echo $form->field($model, 'col_img_big') ?>

    <?php // echo $form->field($model, 'col_status') ?>

    <?php // echo $form->field($model, 'col_meta_title') ?>

    <?php // echo $form->field($model, 'col_meta_description') ?>

    <?php // echo $form->field($model, 'col_meta_keywords') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
