<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var app\models\Language $model */

$this->title = $model->col_title_ru;
$this->params['breadcrumbs'][] = ['label' => 'Languages', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="language-view">

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
            'col_title_en',
            'col_title_es',
            'col_title_ua',
            'col_title_ru',
            'col_title_cn',
            [ 
                'attribute' => 'col_img', 
                'format' => 'html', 
                'filter' => false, 
                'value' => function ($model) { 
                    return Html::img('@web/img/lang/' . $model->col_img, ['height' => '70px']); 
                }, 
            ],
        ],
    ]) ?>

</div>
