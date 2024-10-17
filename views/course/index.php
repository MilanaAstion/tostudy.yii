<?php

use app\models\Course;
use app\models\Program;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\helpers\ArrayHelper;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var app\models\CourseSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Courses';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="course-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Course', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            // 'col_id',
            // 'col_school_id',
            [ 
                'attribute' => 'col_school_id', 
                'format' => 'html', 
                // 'filter' => false, 
                'value' => function ($model) { 
                    return $model->school->col_title;
                }, 
            ],
            // 'col_prog_id',
            [ 
                'attribute' => 'col_prog_id', 
                'format' => 'html', 
                'filter' => ArrayHelper::map(Program::find()->all(), 'col_id', 'col_name'), 
                'filterInputOptions' => ['prompt' => 'не выбран'],
                'value' => function ($model) { 
                    return $model->program->col_name;
                }, 
            ],
            // 'col_title_en',
            // 'col_title_es',
            //'col_title_ua',
            'col_title_ru',
            //'col_title_cn',
            //'col_description_en:ntext',
            //'col_description_es:ntext',
            //'col_description_ua:ntext',
            //'col_description_ru:ntext',
            //'col_description_cn:ntext',
            //'col_price:ntext',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, Course $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'col_id' => $model->col_id]);
                 }
            ],
        ],
    ]); ?>


</div>
