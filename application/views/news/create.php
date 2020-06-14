<h2><?php echo $title; ?> </h2>

<?php echo validation_errors(); ?>

<?php echo form_open('news/create'); ?>
  <div class="form-top">
    <div class="form-group">
      <label>Title</label>
      <input type="text" class="form-control" name ="title" placeholder="タイトルを入力してください">
    </div>
    <div class="form-group">
      <label>content</label>
      <textarea name="text" class="form-control"  placeholder="テキストを入力してください"></textarea>
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
  </div>
</form>