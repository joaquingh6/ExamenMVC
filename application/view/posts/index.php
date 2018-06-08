<?php $this->layout('layout'); ?>

<section class="posts container">
	
    <?php foreach($posts as $post):
      ?>
	 <article class="post w-image">
			<figure><img src="<?= $post->file?>" alt="" class="img-responsive"></figure>
			<div class="content-post">
				<header class="container-flex space-between">
					<div class="date">
						<span class="c-gray-1">sep 18</span>
					</div>
					<div class="post-category">
						<span class="category text-capitalize"><?=$post->category?></span>
					</div>
				</header>
				<h1><?= $post->name?></h1>
				<div class="divider"></div>
			    <p><?= $post->excerpt?></p>
				<footer class="container-flex space-between">
					<div class="read-more">
						<a href="/post/show/<?=$post->slug?>" class="text-uppercase c-green">read more</a>
					</div>
					<div class="tags container-flex">
						<?php $tags = explode(',' , $post->tags) ?>
						<?php foreach ($tags as $tag): ?>
							<span class="tag c-gray-1 text-capitalize">#<?= $tag ?> </span>
						<?php endforeach ?>
					</div>
				</footer>
			</div>
		</article>
		<?php endforeach; ?>

</section>


