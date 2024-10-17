<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var app\models\Country $model */

$this->title = $model->col_title_ru;
$this->params['breadcrumbs'][] = ['label' => 'Countries', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="country-view">

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
            'col_alias',
            'col_language_id',
            'col_title_en',
            'col_title_es',
            'col_title_ua',
            'col_title_ru',
            'col_title_cn',
            // 'col_img',
            [ 
                'attribute' => 'col_img', 
                'format' => 'html', 
                'filter' => false, 
                'value' => function ($model) { 
                    return Html::img('@web/img/country/' . $model->col_img, ['height' => '70px']); 
                }, 
            ],
            // 'col_flag',
            [ 
                'attribute' => 'col_flag', 
                'format' => 'html', 
                'filter' => false, 
                'value' => function ($model) { 
                    return Html::img('@web/img/lang/' . $model->col_flag, ['height' => '70px']); 
                }, 
            ],
            'col_meta_title',
            'col_meta_description',
            'col_meta_keywords',
        ],
    ]) ?>

</div>
