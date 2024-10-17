<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var app\models\Course $model */

$this->title = $model->col_title_ru;
$this->params['breadcrumbs'][] = ['label' => 'Courses', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => 'School', 'url' => ['/course/school/'.$model->col_school_id]];
$this->params['breadcrumbs'][] = $this->title;

\yii\web\YiiAsset::register($this);
?>
<div class="course-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'col_id' => $model->col_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'col_id' => $model->col_id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'col_id',
            // 'col_school_id',
            [ 
                'attribute' => 'col_school_id', 
                'format' => 'html', 
                'filter' => false, 
                'value' => function ($model) { 
                    return $model->school->col_title;
                }, 
            ],
            // 'col_prog_id',
            [ 
                'attribute' => 'col_prog_id', 
                'format' => 'html', 
                'filter' => false, 
                'value' => function ($model) { 
                    return $model->program->col_name;
                }, 
            ],
            'col_title_en',
            'col_title_es',
            'col_title_ua',
            'col_title_ru',
            'col_title_cn',
            'col_description_en:ntext',
            'col_description_es:ntext',
            'col_description_ua:ntext',
            'col_description_ru:ntext',
            'col_description_cn:ntext',
            'col_price:ntext',
        ],
    ]) ?>

</div>
