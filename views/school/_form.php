<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\School $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="school-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'col_alias')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'country_id')->dropDownList($countries, ['prompt'=>'Select Country']) ?>

    <!-- <?//= $form->field($model, 'col_city_id')->textInput() ?> -->
    <?= $form->field($model, 'col_city_id')->dropDownList($cities, ['prompt'=>'Select City']) ?>

    <?//= $form->field($model, 'col_meta_title')->textInput(['maxlength' => true]) ?>

    <?//= $form->field($model, 'col_meta_description')->textInput(['maxlength' => true]) ?>

    <?//= $form->field($model, 'col_meta_keywords')->textInput(['maxlength' => true]) ?>

    <?//= $form->field($model, 'col_title')->textInput(['maxlength' => true]) ?>

    <?//= $form->field($model, 'col_url')->textInput(['maxlength' => true]) ?>

    <!-- <?//= $form->field($model, 'col_img_mini')->textInput(['maxlength' => true]) ?> -->

    <!-- <?//= $form->field($model, 'col_img_mini')->fileInput(); ?> -->

    <!-- <?//= $form->field($model, 'col_img')->textInput(['maxlength' => true]) ?> -->

    <?= $form->field($model, 'school_img')->fileInput(); ?>

    <?//= $form->field($model, 'col_description_en')->textarea(['rows' => 6]) ?>

    <?//= $form->field($model, 'col_description_es')->textarea(['rows' => 6]) ?>

    <?//= $form->field($model, 'col_description_ua')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'col_description_ru')->textarea(['rows' => 6]) ?>

    <?//= $form->field($model, 'col_description_cn')->textarea(['rows' => 6]) ?>

    <?//= $form->field($model, 'col_about_us_en')->textarea(['rows' => 6]) ?>

    <?//= $form->field($model, 'col_about_us_es')->textarea(['rows' => 6]) ?>

    <?//= $form->field($model, 'col_about_us_ua')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'col_about_us_ru')->textarea(['rows' => 6]) ?>

    <?//= $form->field($model, 'col_about_us_cn')->textarea(['rows' => 6]) ?>

    <?//= $form->field($model, 'col_residence_en')->textarea(['rows' => 6]) ?>

    <?//= $form->field($model, 'col_residence_es')->textarea(['rows' => 6]) ?>

    <?//= $form->field($model, 'col_residence_ua')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'col_residence_ru')->textarea(['rows' => 6]) ?>

    <?//= $form->field($model, 'col_residence_cn')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'col_registration_fee')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'col_home_page')->textInput() ?>
    <?= $form->field($model, 'col_home_page')->dropDownList([0 => 'Не на главной', 1 => 'На главной'], ['prompt'=>'Не выбрано']) ?>

    <?= $form->field($model, 'col_currency')->textInput() ?>

    <?//= $form->field($model, 'col_pdf')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
        
    </div>

    <?php ActiveForm::end(); ?>

</div>
