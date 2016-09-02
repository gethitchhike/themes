<?php global $blog;?>
<?php global $translation;?>
<?php $Parsedown = new Parsedown();?>
<!DOCTYPE HTML>
<html>
<head>
<meta charset="utf-8"/>
<meta http-equiv="Content-Language" content="<?php echo $blog->Language;?>"> 
<meta name="viewport" content="width=device-width, initial-scale=1">
<?php
	global $bootstrap;
	$units = $bootstrap->GetUnitsByImplementation("IHeadUnit");
	foreach($units as $unit){
		$unit->Run();
	}
?>
<link href="./themes/simple/Skeleton-2.0.4/css/normalize.css" rel='stylesheet' type='text/css'>
<link href="./themes/simple/Skeleton-2.0.4/css/skeleton.css" rel='stylesheet' type='text/css'>
<link href="./themes/simple/simple.css" rel='stylesheet' type='text/css'>
<link rel="stylesheet" href="./themes/simple/font-awesome-4.6.1/css/font-awesome.min.css">
<link rel="alternate" type="application/rss+xml" href="?/feed/" />
<title><?php echo $title;?></title>
</head>
<body>
<div class="container">
    <div class="row">
    <?php
		global $bootstrap;
		$units = $bootstrap->GetUnitsByImplementation("IPrePostUnit");
		if (count($units) != 0){
			foreach($units as $unit){
				$unit->Run();
			}
		}
	?>
	</div>
	<div class="row">
		<div class="four columns sidebar">
			<div class="bloginfo">
				<h1><a href="<?php echo __USEDOTFORINDEX__ === "true"? ".":"index.php";?>">
				<?php if (count($blog->Authors) == 1 && !empty($blog->Authors[0]->Avatar)) :?>
					<img class="blogavatar" src="<?php echo $blog->Authors[0]->Avatar;?>">
				<?php elseif (property_exists($blog,"Image")) :?>
					<img class="blogavatar" src="<?php echo $blog->Image;?>">
				<?php endif;?>
				<?php echo $blog->Name;?></a></h1>
				<h5><?php echo $blog->Subtitle;?></h5>
				<ul class="inline">
					<li>&copy; <?php echo $blog->Copyright;?></li>
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
			</div>
		</div>
		<div class="eight columns">
			<?php
				require_once $innerContent;
			?>
		</div>
	</div>
</div>
<script src="./themes/simple/instantclick.min.js" data-no-instant></script>
<script data-no-instant>InstantClick.init();</script>
</body>
</html>
