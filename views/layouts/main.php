<?php

/** @var yii\web\View $this */
/** @var string $content */

use app\assets\PublicAsset;
use app\widgets\Alert;
use yii\bootstrap4\Breadcrumbs;
use yii\bootstrap4\Html;
use yii\bootstrap4\Nav;
use yii\bootstrap4\NavBar;
use app\components\BreadcrumbsWidget;

PublicAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>" class="h-100">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <?php $this->registerCsrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body id="page">
<?php $this->beginBody() ?>

    <div class="wrapper">

        <?= $this->render('@app/views/templates/header.php');  ?>

        <!-- <?//= $this->render('@app/views/templates/breadcrumbs.php');  ?> -->

        <!-- <?//= BreadcrumbsWidget::widget(['breadcrumbs' => $this->params["breadcrumbs"]]);  ?> -->
        <?= Breadcrumbs::widget([
            'homeLink' => ['label' => 'Главная', 'url' => ['/main/index']],
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>

        <?= Alert::widget() ?>

        <?= $content ?>

        <?= $this->render('@app/views/templates/footer2.php');  ?>

    </div>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
