<? 
$this->params['breadcrumbs'][] = [ 'label' => 'Новости', 'url' => ['main/news'] ];
$this->params['breadcrumbs'][] = $article->col_title_ru; 
?>
<h1> <?= $article->col_title_ru ?></h1>

$this->params['breadcrumbs'][] = [ 'label' => 'Schools', 'url' => ['main/schools'] ];
$this->params['breadcrumbs'][] = [ 'label' => 'countries', 'url' => ['main/countries'] ];
<a href="/schools.php"><?=$ini_file['pages']['schools']?></a>
		<a href="/countries.php?id=<?=$row['col_language_id']?>"><?=$row['col_language_title']?></a>
		<a href="/cities.php?id=<?=$row['col_country_id']?>"><?=$row['col_country_title']?></a>
		<a href="/city.php?id=<?=$row['col_city_id']?>"><?=$row['col_city_title']?></a>
		<span><?=$row['col_title']?></span>