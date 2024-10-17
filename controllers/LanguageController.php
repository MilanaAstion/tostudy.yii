<?php

namespace app\controllers;

use app\models\Language;
use app\models\SearchLanguage;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\web\UploadedFile;
use yii\filters\VerbFilter;
use Yii;

/**
 * LanguageController implements the CRUD actions for Language model.
 */
class LanguageController extends Controller
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
     * Lists all Language models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new SearchLanguage();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Language model.
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
     * Creates a new Language model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new Language();

        // if ($this->request->isPost) {
        //     if ($model->load($this->request->post()) && $model->save()) {
        //         return $this->redirect(['view', 'col_id' => $model->col_id]);
        //     }
        // } else {
        //     $model->loadDefaultValues();
        // }

        // return $this->render('create', [
        //     'model' => $model,
        // ]);

        if($this->request->isPost){
            $model->load($this->request->post());
            $model->col_img = $this->uploadImage($model);
            $result = $model->save();
            if($result){
                Yii::$app->session->setFlash('success', 'Язык добавлен');
                return $this->redirect('/language/index');
            }
        }
        else{
            return $this->render('create',['model' => $model]);
        }
    }

    public function uploadImage($model)
    {
        $file = UploadedFile::getInstance($model, 'file_img');
        $fileName = time() . '.' . $file->extension; 
        $uploadPath = Yii::getAlias('@webroot/img/lang/') . $fileName; 
        if ($file->saveAs($uploadPath)) return $fileName; 
        Yii::$app->session->setFlash('error', 'Ошибка при добавлении файла!'); 
        return $this->goBack();
    }

    /**
     * Updates an existing Language model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $col_id Col ID
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */

    public function actionUpdate($col_id)
    {
        $model = $this->findModel($col_id);

        if ($this->request->isPost) {
            // dd($_FILES['Language']['error']['file_img']);
            $file_img = $model->col_img;
            $model->load($this->request->post());
            if($_FILES['Language']['error']['file_img'] == 0){
                $model->col_img = $this->uploadImage($model);
            }
            else{
                $model->col_img = $file_img;
            }
            $result = $model->save();
            if($result){
                Yii::$app->session->setFlash('success', 'Язык изменен');
                return $this->redirect(['view', 'col_id' => $model->col_id]);
            }
            
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Language model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $col_id Col ID
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($col_id)
    {
        
        $model = $this->findModel($col_id);
        
        $result = $model->delete();
        
        if($result){
            Yii::$app->session->setFlash('success', 'Язык удален');
        }
        return $this->redirect(['index']);
    }

    /**
     * Finds the Language model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $col_id Col ID
     * @return Language the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($col_id)
    {
        if (($model = Language::findOne(['col_id' => $col_id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
