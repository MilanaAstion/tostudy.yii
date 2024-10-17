<?php

use app\models\Article;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var app\models\ArticleSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Articles';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="article-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Article', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            // 'col_id',
            // 'col_alias',
            // 'col_title_en',
            // 'col_title_es',
            // 'col_title_ua',
            'col_title_ru',
            //'col_title_cn',
            //'col_text_en:ntext',
            //'col_text_es:ntext',
            //'col_text_ua:ntext',
            //'col_text_ru:ntext',
            //'col_text_cn:ntext',
            // 'col_img',
            [ 
                'attribute' => 'col_img', 
                'format' => 'html', 
                'filter' => false, 
                'value' => function ($model) { 
                    return Html::img('@web/img/article/img/' . $model->col_img, ['height' => '70px']); 
                }, 
            ],
            // //'col_img_big',
            // 'col_status',
            [
                'attribute' => 'col_status', 
                'format' => 'html', 
                'filter' => [Article::STATUS_DELETE => 'удалено', Article::STATUS_IN_ACTIVE => 'не активно', Article::STATUS_ACTIVE => 'активно'], 
                'filterInputOptions' => ['prompt' => 'не выбрано'],
                'value' => function ($model) { 
                   return $model->status;
                }, 
            ],
            //'col_meta_title',
            //'col_meta_description',
            //'col_meta_keywords',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, Article $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'col_id' => $model->col_id]);
                 }
            ],
        ],
    ]); ?>


</div>
