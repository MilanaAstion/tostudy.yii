<?php

use app\models\City;
use app\models\Country;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var app\models\CitySearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Cities';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="city-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create City', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'col_id',
            'col_alias',
            // 'col_country_id',
            [ 
                'attribute' => 'col_country_id', 
                'format' => 'html', 
                'filter' => false, 
                'value' => function ($model) { 
                    // return Country::findOne($model->col_country_id)->col_title_ru;
                    return $model->country->col_title_ru;
                }, 
            ],
            'col_title_en',
            // 'col_title_es',
            //'col_title_ua',
            'col_title_ru',
            //'col_title_cn',
            // 'col_img',
            [ 
                'attribute' => 'col_img', 
                'format' => 'html', 
                'filter' => false, 
                'value' => function ($model) { 
                    return Html::img('@web/img/city/' . $model->col_img, ['height' => '70px']); 
                }, 
            ],
            //'col_meta_title',
            //'col_meta_description',
            //'col_meta_keywords',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, City $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'col_id' => $model->col_id]);
                 }
            ],
        ],
    ]); ?>


</div>
