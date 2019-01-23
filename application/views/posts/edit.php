<h1><?= $title; ?></h2>

<?php echo validation_errors(); ?>

<?php echo form_open('posts/update'); ?>
<input type="hidden" name="id" value="<?php echo $post['id']; ?>">
    <div class="form-group">
      <label>Title</label>
      <input type="title" class="form-control" name="title" placeholder="Enter Post Title" value="<?php echo $post['title']; ?>">
    </div>
    <div class="form-group">
      <label>Category</label>
      <select name="category_id" class="form-control">
        <?php foreach($categories as $category): ?>
          <option value="<?php echo $category['id']; ?>"><?php echo $category['name']; ?></option>
      <?php endforeach; ?>
      </select>
    <div class="form-group">
      <label>Body</label>
      <textarea class="form-control" rows="5" name="body" id="editor1" placeholder="Body"><?php echo $post['body']; ?></textarea>
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
  </form>
<script>
  ClassicEditor
    .create( document.querySelector( '#editor1' ) )
    // .then( editor => {
            // console.log( editor );
    // } )
    // .catch( error => {
            // console.error( error );
    // }
  );
</script>
