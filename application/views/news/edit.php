<h2><?php echo $title; ?> </h2>

<?php echo validation_errors(); ?>

<?php echo form_open('news/update' ); ?>
  <div class="form-top">
    <input type="hidden" name="id" value="<?php echo $news['id']; ?>">
    <div class="form-group">
      <label>Title</label>
      <input type="text" class="form-control" name ="title" value = "<?php echo $news['title']; ?>" placeholder="タイトルを入力してください">
    </div>
    <div class="form-group">
      <label>content</label>
      <textarea name="text" class="form-control"  placeholder="テキストを入力してください"><?php echo $news['text']; ?></textarea>
    </div>
    <button type="submit" class="btn btn-primary">更新する</button>
  </div>
</form>