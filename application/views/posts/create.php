<h1><?= $title; ?></h2>

<?php echo validation_errors(); ?>

<?php echo form_open_multipart('posts/create'); ?>
    <div class="form-group">
      <label>Title</label>
      <input type="title" class="form-control" name="title" placeholder="Enter Post Title">
    </div>
    <div class="form-group">
      <label>Category</label>
      <select name="category_id" class="form-control">
        <?php foreach($categories as $category): ?>
          <option value="<?php echo $category['id']; ?>"><?php echo $category['name']; ?></option>
      <?php endforeach; ?>
      </select>
    </div>
    <div class="form-group">
      <label>Body</label>
      <textarea class="form-control" name="body" id="editor1" placeholder="Body"></textarea>
    </div>
    <div class="form-group">
      <label>Image</label>
      <input type="file" class="form-control" name="userfile" size="20">
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
