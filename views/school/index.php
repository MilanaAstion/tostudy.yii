<?php

use app\models\School;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var app\models\SchoolSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Schools';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="school-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create School', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'col_id',
            // 'col_alias',
            // 'col_city_id',
            [ 
                'attribute' => 'col_city_id', 
                'format' => 'html', 
                'filter' => false, 
                'value' => function ($model) { 
                    // return Country::findOne($model->col_country_id)->col_title_ru;
                    return $model->city->col_title_ru;
                }, 
            ],

            // 'col_meta_title',
            // 'col_meta_description',
            //'col_meta_keywords',
            'col_title',
            //'col_url:url',
            //'col_img_mini',
            // 'col_img',
            [ 
                'attribute' => 'col_img', 
                'format' => 'html', 
                'filter' => false, 
                'value' => function ($model) { 
                    return Html::img('@web/img/school/' . $model->col_img, ['height' => '70px']); 
                }, 
            ],
            //'col_description_en:ntext',
            //'col_description_es:ntext',
            //'col_description_ua:ntext',
            //'col_description_ru:ntext',
            //'col_description_cn:ntext',
            //'col_about_us_en:ntext',
            //'col_about_us_es:ntext',
            //'col_about_us_ua:ntext',
            //'col_about_us_ru:ntext',
            //'col_about_us_cn:ntext',
            //'col_residence_en:ntext',
            //'col_residence_es:ntext',
            //'col_residence_ua:ntext',
            //'col_residence_ru:ntext',
            //'col_residence_cn:ntext',
            //'col_registration_fee',
            //'col_home_page',
            //'col_currency',
            //'col_pdf',
            [
                'class' => ActionColumn::className(),
                // 'template' => '{delete}',
                'urlCreator' => function ($action, School $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'col_id' => $model->col_id]);
                 }
            ],
        ],
    ]); ?>


</div>
