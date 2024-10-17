
<? if(isset($this->params["breadcrumbs"])): ?>
	<div id="breadcrumbs">
		<div class="wrap">
			<a href="/">Главная</a>
			<? foreach($this->params["breadcrumbs"] as $item): ?>
				<? if(is_array($item)): ?>
					<a href="/<? echo $item["url"]; ?>"><? echo $item["label"]; ?></a>
				<? else: ?>
					<span><? echo $item; ?></span>
				<? endif; ?>
			<? endforeach; ?>
		</div> 
	</div> 
<? endif; ?>

		