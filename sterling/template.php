<?php global $blog;?>
<?php global $translation;?>
<?php $Parsedown = new Parsedown();?>
<!DOCTYPE HTML>
<html>

<head>
	<meta charset="utf-8" />
	<meta http-equiv="Content-Language" content="<?php echo $blog->Language;?>">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<?php
	global $bootstrap;
	$units = $bootstrap->GetUnitsByImplementation("IHeadUnit");
	foreach($units as $unit){
		$unit->Run();
	}
?>
		<link href="./themes/sterling/app.css" rel='stylesheet' type='text/css'>
		<link rel="alternate" type="application/rss+xml" href="?/feed/" />
		<title>
			<?php echo $title;?>
		</title>
</head>

<body>
	<div class="flex wrapper">
		<?php
		global $bootstrap;
		$units = $bootstrap->GetUnitsByImplementation("IPrePostUnit");
		if (count($units) != 0){
			foreach($units as $unit){
				$unit->Run();
			}
		}
	?>
			<aside class="flex__item--40 sidebar">
				<section class="blog-title">
					<?php if (count($blog->Authors) == 1 && !empty($blog->Authors[0]->Avatar)) :?>
					<img class="blog-title__avatar" src="<?php echo $blog->Authors[0]->Avatar;?>">
					<?php elseif (property_exists($blog,"Image")) :?>
					<img class="blog-title__avatar" src="<?php echo $blog->Image;?>">
					<?php endif;?>
					<h1 class="blog-title__text">
							 <a href="<?php echo __USEDOTFORINDEX__ === "true"? ".":"index.php";?>">
			<?php echo $blog->Name;?></a>
					</h1>
					<h3 class="blog-title__subtitle"><?php echo $blog->Subtitle;?></h5>
		</section>
			<ul class="info-list">
				<li class="info-list__item">&copy; <?php echo $blog->Copyright;?></li>
			<?php if (count($sites) != 0) :?>
				<?php foreach($sites as $site):?>
					<li><a href="?/post/<?php echo $site->WebFilename;?>/"><?php echo $site->Title;?></a></li>
				<?php endforeach;?>
				<li><a href="?/feed/" data-no-instant>Feed</a></li>
			<?php endif;?>
			</ul>
			<?php
				global $bootstrap;
				$units = $bootstrap->GetUnitsByImplementation("ISideUnit");
				if (count($units) != 0){
					foreach($units as $unit){
						$unit->Run();
					}
				}
			?>
	</aside>
	<main class="flex__item--60 articles">
		<?php require_once $innerContent; ?>
	</main>
</div>
<script src="./themes/simple/instantclick.min.js" data-no-instant></script>
<script data-no-instant>InstantClick.init();</script>
</body>
</html>
