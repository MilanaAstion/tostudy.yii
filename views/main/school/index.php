<? 

$this->params["breadcrumbs"][] = [ 
    'label' => $school->city->country->language->col_title_ru, 
    'url' => 'main/countries/'. $school->city->country->language->col_id
];
$this->params["breadcrumbs"][] = [ 
    'label' => $school->city->country->col_title_ru, 
    'url' => 'main/cities/' . $school->city->country->col_id
];
$this->params["breadcrumbs"][] = [ 
    'label' => $school->city->col_title_ru, 
    'url' => 'main/city/' . $school->city->col_id
];
$this->params["breadcrumbs"][] = $school->col_title;
?>



<section id="product">
	<div class="wrap">
		
		<img src="/img/school/<?=$school->col_img?>" alt="<?=$school->col_title?>" class="photo">
		<div class="content row" id="js-row">
			
			<div class="column-left">
				<h1><?= $school->col_title ?></h1>
				
				<div class="switch">
					<a href="#" class="js-switch-tab" data-tab="1">О школе</a>
					<a href="#" class=" js-switch-tab" data-tab="2">Программы</a>
					<a href="#" class="active js-switch-tab" data-tab="3">Проживание</a>
				</div> <!-- /.switch -->

				
				<div class="wrap-tabs">
					<div class="tab tab1 hidden" id="js-tab1"><?=$school->col_about_us_ru?></div>	
					
					<?= $this->render('_courses', ['school' => $school]) ?>

					<div class="tab tab1 hidden" id="js-tab3"><?=$school->col_residence_ru?></div>
				</div> <!-- /.wrap-tabs -->
			</div> <!-- /.column-left -->

			<?= $this->render('_calc', ['school' => $school, 'course' => $course]) ?>

		</div>
	</div>
</section>