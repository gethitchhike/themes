<?php if (count($posts) > 0) :?>
<?php foreach($posts as $post) :?>
<article class="article">
	<header class="article-header">
		<h2 class="article-header__text"><a href="?/post/<?php echo $post->WebFilename;?>/"><?php echo $post->Title;?></a></h2>
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
		<img src="<?php echo $post->Image;?>">
		<?php endif;?>
	</header>
	<p class="article__preview-text">
		<?php echo \BTRString::SubStrClause(strip_tags($Parsedown->text($post->Content)),2,true)."...";?>
	</p>
	<a class="article__read-button button button--dark" href="?/post/<?php echo $post->WebFilename;?>/" class="button">
		<?php echo $translation["continuereading"];?>
	</a>
</article>
<?php endforeach;?>

<!-- Pagination -->
<?php
		$suffix = isset($php->post->query) ? "&query=".$php->post->query : "";
		if (empty($suffix) && isset($php->get->query)){
			$suffix = "&query=".$php->get->query;
		}
		$canGoBack = $currentSite -1 != 0;
		$canGoForward = $currentSite < $max;

	?>
	<?php if ($canGoBack) :?>
	<a href="index.php?/&site=<?php echo $currentSite-1;?><?php echo $suffix;?>" class="button  previous">
		<?php echo $translation["prevpage"];?>
	</a>
	<?php endif;?>
	<?php if ($canGoForward) :?>
	<a href="index.php?/&site=<?php echo $currentSite+1;?><?php echo $suffix;?>" class="button  next">
		<?php echo $translation["nextpage"];?>
	</a>
	<?php endif;?>
	<?php endif;?>
