<?php

namespace app\controllers;

use app\models\Article;
use app\models\School;
use app\models\Course;
use app\models\ArticleSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\web\UploadedFile;
use yii\filters\VerbFilter;
use yii\web\Response;
use Yii;

class MainController extends Controller
{
    public function actionIndex()
    {
        $schools = School::find()->where(['col_home_page' => School::HOME_PAGE])->all();

        return $this->render('index', [
            'schools' => $schools,
        ]);
    }

    public function actionNews()
    {
        $articles = Article::find()->where(['col_status' => Article::STATUS_ACTIVE])->orderBy(['col_id' => SORT_DESC])->all();

        // dd($articles);

        return $this->render('news', [
            'articles' => $articles,
        ]);
    }

    public function actionArticle($id)
    {
        $article = Article::findOne(['col_id' => $id]);
        dd($article );
        return $this->render('article', [
            'article' => $article,
        ]);
    }

    public function actionSchool($school_id, $course_id = null)
    {
        // dd($course_id);
        $school = School::findOne(['col_id' => $school_id]);
        $course = $course_id ? Course::findOne(['col_id' => $course_id]) : false;
        // dd($course);
        // $courses = Course::getCourseCost($school->courses);
        // $course = Course::findOne(['col_id'=>10]);
        // dd($school->accommodation);
        // var_dump($_GET);
        // dd($_GET);
        // dd($school->courses);
        return $this->render('school/index', [
            'school' => $school,
            'course' => $course,
        ]);
    }

    public function actionWeeksCourse(){
        Yii::$app->response->format = Response::FORMAT_JSON;
        $course = Course::findOne($_GET['course_id']);
        // $weeks = json_encode($course->weeks);
        return $course->weeks;
    }
}