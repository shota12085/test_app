<h2><?php echo $title; ?></h2>

<?php foreach ($news as $news_item): ?>
<div class = "news-topic">
  <h3><?php echo $news_item['title']; ?></h3>
    <small class="news-create"><?php echo $news_item['created_at']; ?></small></br>
  <div class="main">
    <?php echo $news_item['text']; ?>
  </div>
    <p><a class = "btn btn-default" href="<?php echo site_url('news/'.$news_item['id']); ?>">詳細</a></p>
</div>

<?php endforeach; ?>