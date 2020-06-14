
<div class = "news-topic">
  <h3><?php echo $news['title']; ?></h3>
    <small class="news-create"><?php echo $news['created_at']; ?></small></br>
  <div class="main">
    <?php echo $news['text']; ?>
  </div>

  <hr>
  <a class="btn btn-default pull-left" href="edit/<?php echo $news['id']; ?>">編集</a>
  <?php echo form_open('/news/delete/' . $news['id']); ?>
    <input type="submit" value="削除" class="btn btn-danger">
  </form>
</div>
