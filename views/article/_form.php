<?php

use app\models\Article;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\Article $model */
/** @var yii\widgets\ActiveForm $form */

$status_arr = [Article::STATUS_DELETE => 'удалено', Article::STATUS_IN_ACTIVE => 'не активно', Article::STATUS_ACTIVE => 'активно'];
?>


<div class="article-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'col_alias')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'col_title_en')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'col_title_es')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'col_title_ua')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'col_title_ru')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'col_title_cn')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'col_text_en')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'col_text_es')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'col_text_ua')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'col_text_ru')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'col_text_cn')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'img')->fileInput(); ?>

    <?= $form->field($model, 'img_big')->fileInput(); ?>

    <!-- <//?= $form->field($model, 'col_status')->textInput() ?> -->

    <?= $form->field($model, 'col_status')->dropDownList($status_arr) ?>

    <?= $form->field($model, 'col_meta_title')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'col_meta_description')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'col_meta_keywords')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
