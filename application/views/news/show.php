
<div class = "news-topic">
  <h3><?php echo $news['title']; ?></h3>
  <strong><?php echo $category['name']; ?></strong>
    <small class="news-create"><?php echo $news['created_at']; ?></small></br>
  <div class="main">
    <?php if($news['image'] != 'noimage.png'): ?>
    <img src ="<?php echo site_url(); ?>assets/images/news/<?php echo $news['image']; ?>" width="600" height="300">
    <?php endif; ?>
    <div class="news-text">
      <?php echo $news['text']; ?>
    </div>
  </div>

  <hr>
  <a class="btn btn-default pull-left" href="edit/<?php echo $news['id']; ?>">編集</a>
  <?php echo form_open('/news/delete/' . $news['id']); ?>
    <input type="submit" value="削除" class="btn btn-danger">
  </form>
</div>
<hr>
<p>コメントする</p>
  <?php echo form_open('comments/create/' . $news['id']); ?>
  <label>コメント</label>
  <div class = "form-group">
    <textarea name="text" class="form-control"></textarea>
  </div>
  <input type="hidden" name="id" value="<?php echo $news['id']; ?>">
  <button class="btn btn-primary" type="submit">コメントする</button>
  </form>
  <br>
<div class="comment">
  コメント一覧
</div>
<br>
  <?php foreach($comments as $comment): ?>
    <small><?php echo $comment['created_at']; ?></small>
    <div class="news-text">
      <?php echo $comment['text']; ?>
    </div>
    <br>
    <?php endforeach; ?>
