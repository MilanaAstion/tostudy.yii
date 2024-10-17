<?php

use app\models\School;
use app\models\Program;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;

/** @var yii\web\View $this */
/** @var app\models\Course $model */
/** @var yii\widgets\ActiveForm $form */

$schools =  ArrayHelper::map(School::find()->all(), 'col_id', 'col_title');
$programs =  ArrayHelper::map(Program::find()->all(), 'col_id', 'col_name');
// dd($schools);
?>

<div class="course-form">

    <?php $form = ActiveForm::begin(); ?>
    <!-- <?//= $form->field($model, 'col_school_id')->textInput() ?> -->
    <?//= $form->field($model, 'col_school_id')->dropDownList($schools, ['prompt'=>'Select School']) ?>

    <!-- <?//= $form->field($model, 'col_prog_id')->textInput() ?> -->

    <?= $form->field($model, 'col_prog_id')->dropDownList($programs, ['prompt'=>'Select Program']) ?>

    <?= $form->field($model, 'col_title_en')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'col_title_es')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'col_title_ua')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'col_title_ru')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'col_title_cn')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'col_description_en')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'col_description_es')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'col_description_ua')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'col_description_ru')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'col_description_cn')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'col_price')->textarea(['rows' => 6]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
