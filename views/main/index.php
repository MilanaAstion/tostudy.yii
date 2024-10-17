<h1>Index page</h1>
<?php foreach($schools as $school): ?>
    <div class="item">
		<a href="/school/<?= $school->col_id ?>" class="wrap-img">
			<img src="/img/school/1720515954.jpg" alt="<?= $school->col_title ?>">
		</a>
		<div class="container">
			<div>
				<h4><a href="/school/<?= $school->col_id ?>"><?= $school->col_title ?></a></h4>
				<p class="description"><?= $school->col_description_ru ?></p>
			</div>
			<a href="<?= $school->col_url ?>" class="btn3">Смотреть курсы</a>
		</div>
	</div>
<?php endforeach; ?>

