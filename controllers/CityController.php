<?php

namespace app\controllers;

use app\models\City;
use app\models\CitySearch;
use app\models\Country;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;
use Yii;

/**
 * CityController implements the CRUD actions for City model.
 */
class CityController extends Controller
{
    public $layout = 'admin';
    
    /**
     * @inheritDoc
     */
    public function behaviors()
    {
        return array_merge(
            parent::behaviors(),
            [
                'verbs' => [
                    'class' => VerbFilter::className(),
                    'actions' => [
                        'delete' => ['POST'],
                    ],
                ],
            ]
        );
    }

    /**
     * Lists all City models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new CitySearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single City model.
     * @param int $col_id Col ID
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($col_id)
    {
        return $this->render('view', [
            'model' => $this->findModel($col_id),
        ]);
    }

    /**
     * Creates a new City model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new City();

        // if ($this->request->isPost) {
        //     if ($model->load($this->request->post()) && $model->save()) {
        //         return $this->redirect(['view', 'col_id' => $model->col_id]);
        //     }
        // } else {
        //     $model->loadDefaultValues();
        // }

        if ($this->request->isPost) {
            $model->load($this->request->post());
            $model->col_img = $this->uploadImage($model);
            $result = $model->save();
            if ($result) {
                return $this->redirect(['view', 'col_id' => $model->col_id]);
            }
        } else {
            $model->loadDefaultValues();
        }
        

        return $this->render('create', [
            'model' => $model,
            'countries' =>  $countries,
        ]);
    }

    

    /**
     * Updates an existing City model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $col_id Col ID
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($col_id)
    {
        $model = $this->findModel($col_id);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'col_id' => $model->col_id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    public function uploadImage($model)
    {
        $file = UploadedFile::getInstance($model, 'country_img');
        if(!$file){
            return;
        }
        $fileName = time() . '.' . $file->extension; 
        $uploadPath = Yii::getAlias('@webroot/img/city/') . $fileName; 
        if ($file->saveAs($uploadPath)) return $fileName; 
    }

    /**
     * Deletes an existing City model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $col_id Col ID
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($col_id)
    {
        $this->findModel($col_id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the City model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $col_id Col ID
     * @return City the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($col_id)
    {
        if (($model = City::findOne(['col_id' => $col_id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
