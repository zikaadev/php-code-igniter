<h1><?= $title; ?></h1>
<br>

<?php foreach($posts as $post) : ?>
  <h3><?php echo $post['title']; ?></h3>
  <small class="post-date">posted: <?php echo $post['created_at']; ?> in <b><?php echo $post['name']; ?></b></small>

  <div class="row">
    <div class="col-md-9">
  <?php echo word_limiter($post['body'], 60); ?><br>
  <a class="btn btn-primary" href="<?= site_url('/posts/'.$post['slug']); ?>">Read more</a>
</div>
<div class="col-md-3">
  <img class="post-thumb" src="<?php echo site_url();?>assets/images/posts/<?php echo $post['post_image']; ?>">
</div>

</div>
  <hr>

<?php endforeach; ?>
