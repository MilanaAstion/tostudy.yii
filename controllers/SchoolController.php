<?php

namespace app\controllers;

use app\models\School;
use app\models\SchoolSearch;
use app\models\City;
use app\models\Country;

use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;
use Yii;

/**
 * SchoolController implements the CRUD actions for School model.
 */
class SchoolController extends Controller
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
     * Lists all School models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new SchoolSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single School model.
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
     * Creates a new School model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new School();

        if ($this->request->isPost) {
            $model->load($this->request->post());
            $model->col_img = $this->uploadImage($model);
            $model->col_img_mini = $model->col_img;
            $result = $model->save();
            if ($result) {
                return $this->redirect(['view', 'col_id' => $model->col_id]);
            }
        } else {
            $model->loadDefaultValues();
        }

        if($_GET['country_id']){
            $cities = City::find()->select(['col_title_ru', 'col_id'])->where(['col_country_id' => $_GET['country_id']])->indexBy('col_id')->column();
            $model->country_id = $_GET['country_id'];
        }
        else{
            $cities = [];
        }

        $countries = Country::find()->select(['col_title_ru', 'col_id'])->indexBy('col_id')->column();

        return $this->render('create', [
            'model' => $model,
            'cities' => $cities,
            'countries' => $countries,
        ]);
    }


    public function uploadImage($model)
    {
        $file = UploadedFile::getInstance($model, 'school_img');
        if(!$file){
            return;
        }
        $fileName = time() . '.' . $file->extension; 
        $uploadPath = Yii::getAlias('@webroot/img/school/') . $fileName; 
        if ($file->saveAs($uploadPath)) return $fileName; 
    }

    /**
     * Updates an existing School model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $col_id Col ID
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($col_id)
    {
        $model = $this->findModel($col_id);
        $model->country_id = $model->city->country->col_id;
        // dd($model->courses);
        if ($this->request->isPost) {
            $model->load($this->request->post());
            $model->save();
            Yii::$app->session->setFlash('success', 'Школа изменена');
            return $this->redirect(['view', 'col_id' => $model->col_id]);
        }

        $cities = City::find()
            ->select(['col_title_ru', 'col_id'])
            ->where(['col_country_id' => $model->city->country->col_id])
            ->indexBy('col_id')->column();
            // dd($cities);
        $countries = Country::find()
            ->select(['col_title_ru', 'col_id'])
            ->indexBy('col_id')
            ->column();

        return $this->render('update', [
            'model' => $model,
            'cities' =>$cities,
            'countries' => $countries,
        ]);
    }

    /**
     * Deletes an existing School model.
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
     * Finds the School model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $col_id Col ID
     * @return School the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($col_id)
    {
        if (($model = School::findOne(['col_id' => $col_id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
