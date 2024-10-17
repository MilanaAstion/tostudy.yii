<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\Country $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="country-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'col_alias')->textInput(['maxlength' => true]) ?>

    <!-- <?//= $form->field($model, 'col_language_id')->textInput() ?> -->

    <?= $form->field($model, 'col_language_id')->dropDownList($languages, ['prompt'=>'Select Language']) ?>

    

    <?= $form->field($model, 'col_title_en')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'col_title_es')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'col_title_ua')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'col_title_ru')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'col_title_cn')->textInput(['maxlength' => true]) ?>

    <!-- <?//= $form->field($model, 'col_img')->textInput(['maxlength' => true]) ?> -->

    <?= $form->field($model, 'country_img')->fileInput(); ?>

    <!-- <?//= $form->field($model, 'col_flag')->textInput(['maxlength' => true]) ?> -->

    <?= $form->field($model, 'flag_img')->fileInput(); ?>

    <?= $form->field($model, 'col_meta_title')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'col_meta_description')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'col_meta_keywords')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
