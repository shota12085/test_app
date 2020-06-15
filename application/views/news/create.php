<h2><?php echo $title; ?> </h2>

<?php echo validation_errors(); ?>

<?php echo form_open_multipart('news/create'); ?>
  <div class="form-top">
    <div class="form-group">
      <label>Title</label>
      <input type="text" class="form-control" name ="title" placeholder="タイトルを入力してください">
    </div>
    <div class="form-group">
      <label>Content</label>
      <textarea name="text" class="form-control form-text"  placeholder="テキストを入力してください"></textarea>
    </div>
    <div class="form-group">
      <label>Category</label>
      <select name="category_id" class="form-control">
        <?php foreach($categories as $category): ?>
          <option value="<?php echo $category['id']; ?>"><?php echo $category['name']; ?></option>
        <?php endforeach ?>
      </select>
    </div>
    <div class="form-group">
      <label>Image</label>
      <br>
      <input type="file" name="userfile">
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
  </div>
</form>