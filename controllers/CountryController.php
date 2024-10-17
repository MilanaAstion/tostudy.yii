<?php

namespace app\controllers;

use app\models\Country;
use app\models\CountrySearch;
use app\models\Language;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\web\UploadedFile;
use yii\filters\VerbFilter;
use Yii;

/**
 * CountryController implements the CRUD actions for Country model.
 */
class CountryController extends Controller
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
     * Lists all Country models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new CountrySearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Country model.
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
     * Creates a new Country model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new Country();

        if ($this->request->isPost) {
            dd($_POST);
            $model->load($this->request->post());
            $model->col_img = $this->uploadImage($model,'country');
            $model->col_flag = $this->uploadImage($model, 'flag');
            $result = $model->save();
            if ($result) {
                return $this->redirect(['view', 'col_id' => $model->col_id]);
            }
        } else {
            $model->loadDefaultValues();
        }

        $languages = Language::find()->select(['col_title_ru', 'col_id'])->indexBy('col_id')->column();
        // dd($languages);

        return $this->render('create', [
            'model' => $model,
            'languages' => $languages,
        ]);
    }

    public function uploadImage($model, $img)
    {

        if($img == 'country'){
            $key = 'country_img';
            $path = '@webroot/img/country/';
        }
        else{
            $key = 'flag_img';
            $path = '@webroot/img/lang/';
        }
        $file = UploadedFile::getInstance($model, $key);
        if(!$file){
            return;
        }
        $fileName = time() . '.' . $file->extension; 
        $uploadPath = Yii::getAlias($path) . $fileName; 
        if ($file->saveAs($uploadPath)) return $fileName; 
        Yii::$app->session->setFlash('error', 'Ошибка при добавлении файла!'); 
        return $this->goBack();
    }

    /**
     * Updates an existing Country model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $col_id Col ID
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($col_id)
    {
        $model = $this->findModel($col_id);

        if ($this->request->isPost) {
            $country_img = $model->col_img;
            $country_flag = $model->col_flag;
            
            // dd($_POST);
            $model->load($this->request->post());
            
            $model->col_img = $this->uploadImage($model,'country');
            $model->col_flag = $this->uploadImage($model, 'flag');
            if(!$model->col_img){
                $model->col_img = $country_img;
            }
            if(!$model->col_flag){
                $model->col_flag = $country_flag;
            }
            $result = $model->save();
            if ($result) {
                return $this->redirect(['view', 'col_id' => $model->col_id]);
            }
        } else {
            $model->loadDefaultValues();
        }

        $languages = Language::find()->select(['col_title_ru', 'col_id'])->indexBy('col_id')->column();

        return $this->render('create', [
            'model' => $model,
            'languages' => $languages,
        ]);
    }

    /**
     * Deletes an existing Country model.
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
     * Finds the Country model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $col_id Col ID
     * @return Country the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($col_id)
    {
        if (($model = Country::findOne(['col_id' => $col_id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
