<? 
use yii\helpers\Html; 
// $this->params['breadcrumbs'][] = 'Новости';
$this->params['breadcrumbs'][] = [ 'label' => 'Новости', 'url' => ['main/news'] ];
?>

<div class="articles">
	<div class="wrap">
		<h1 class="page-title">Новости</h1>
		<div class="content">
            <? foreach($articles as $article): ?>
                    <a href="/article/<?= $article->col_id ?>" class="articles-item js-open-news" data-id="<?= $article->col_id ?>">
                        <!-- <img src="/img/article/img/<?//= $article->col_img ?>" alt="<?//= $article->col_title_ru ?>" title="<?//= $article->col_title_ru ?>"> -->
                         <!-- <img src="<?//=  Url::to('@web/img/article/img/'.$article->col_img);  ?>" alt=""> -->
                        <?= Html::img('@web/img/article/img/'.$article->col_img, ['alt' => $article->col_title_ru, 'title' => $article->col_title_ru]); ?>

                        <h2 title="test"><?= $article->col_title_ru ?></h2>
                    </a>
            <? endforeach; ?>
        </div>
	</div> <!-- /.wrap -->
</div> <!-- /.articles -->
