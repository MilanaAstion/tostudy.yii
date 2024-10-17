<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var app\models\Article $model */

$this->title = $model->col_id;
$this->params['breadcrumbs'][] = ['label' => 'Articles', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="article-view">

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
            'col_text_en:ntext',
            'col_text_es:ntext',
            'col_text_ua:ntext',
            'col_text_ru:ntext',
            'col_text_cn:ntext',
            // 'col_img',
            [ 
                'attribute' => 'col_img', 
                'format' => 'html', 
                'filter' => false, 
                'value' => function ($model) { 
                    return Html::img('@web/img/article/img/' . $model->col_img, ['height' => '70px']); 
                }, 
            ],
            // 'col_img_big',
            [ 
                'attribute' => 'col_img_big', 
                'format' => 'html', 
                'filter' => false, 
                'value' => function ($model) { 
                    return Html::img('@web/img/article/big_img/' . $model->col_img_big, ['height' => '70px']); 
                }, 
            ],
            'col_status',
            'col_meta_title',
            'col_meta_description',
            'col_meta_keywords',
        ],
    ]) ?>

</div>
