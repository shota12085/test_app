<h2><?php echo $title; ?></h2>
<?php foreach ($news as $news_item): ?>
  <div class ="row">
    <div class="col-md-3">
      <?php if($news_item['image']): ?>
        <img src ="<?php echo site_url(); ?>assets/images/news/<?php echo $news_item['image']; ?>" width="100%" >
      <?php endif; ?> 
    </div>
    <div class="col-md-9">
      <div class="news-title"><?php echo $news_item['title']; ?></div>
      <div class="news-flex">
        <small class="news-create"><?php echo $news_item['created_at']; ?></small>
        <strong class="category-name"><?php echo $news_item['name']; ?></strong>
      </div>
      <br>
      <div class="main">
        <div class="news-text text-limiter">
          <?php echo $news_item['text']; ?>
        </div>
      </div>
      <p><a class = "btn btn-default" href="<?php echo site_url('news/'.$news_item['id']); ?>">詳細</a></p>
    </div>
  </div>

<?php endforeach; ?>