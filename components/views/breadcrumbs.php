<? if(isset($breadcrumbs)): ?>
	<div id="breadcrumbs">
		<div class="wrap">
			
			<? foreach($breadcrumbs as $item): ?>
				<? if(is_array($item)): ?>
					<a href="/<? echo $item["url"]; ?>"><? echo $item["label"]; ?></a>
				<? else: ?>
					<span><? echo $item; ?></span>
				<? endif; ?>
			<? endforeach; ?>
		</div> 
	</div> 
<? endif; ?>
