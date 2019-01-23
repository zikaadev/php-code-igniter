<h1><?php $post['title'];  ?></h1>

<div class="post-body">
<h3><?php echo $post['title']; ?></h3>
<small class="post-date">posted: <?php echo $post['created_at']; ?> in <b><?php echo $category[0]['name']; ?></b></small>

<div class="row">
  <div class="col-md-3">
    <img class="post-thumb" src="<?php echo site_url();?>assets/images/posts/<?php echo $post['post_image']; ?>">
  </div>
  <div class="col-md-9">
    <?php echo $post['body']; ?><br>
  </div>

</div>
<hr>
<div class="row">
  <div class="pull-left spacing-right">
<a class="btn btn-primary pull-left" href="<?php echo base_url(); ?>posts/edit/<?php echo $post['slug']; ?>">Edit</a>
</div>
<div class="pull-left spacing-right">
  <?php echo form_open('/posts/delete/'.$post['id']); ?>
    <button type="submit" class="btn btn-danger">Delete</button>
  </form>
</div>
