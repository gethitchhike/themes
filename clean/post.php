<article class="article" data-image="<?php echo $post->Image;?>">
	<header class="article-header">
		<h2 class="article-header__text">
		<?php if (!empty($post->WebFilename)):?>
			<a href="?/post/<?php echo $post->WebFilename;?>/">
		<?php else :?>
			<a href="">
		<?php endif;?>
		<?php echo $post->Title;?></a></h2>
		<section class="article-meta">
			<?php if (!is_Null($post->Author)) :?>
			<span class="icon icon-clock"></span>
			<time class="article-meta__time" datetime="<?php echo date(" Y-m-d ",$post->Date);?>">
				<?php echo date("d.m.Y, H:i",$post->Date);?></time>
				<a href="#"> <span class="icon icon-head"></span>
				<?php echo $post->Author->Name;?>
			</a>
			<?php endif;?>
		</section>
		<?php if (!empty($post->Image)) :?>
		<img class="article-header__image" src="<?php echo $post->Image;?>">
		<?php endif;?>
	</header>
	<div class="article__preview-text"><?php echo $Parsedown->text($post->Content);?></div>
	<?php if (!property_exists($post,"HTTPCode") || $post->HTTPCode !== 404) :?>
	<?php
		global $bootstrap;
		$units = $bootstrap->GetUnitsByImplementation("IPostUnit");
		if (count($units) != 0){
			foreach($units as $unit){
				$unit->Run();
			}
		}
	?>
		<?php endif;?>
</article>
