<?php foreach($newsList as $news): ?>
<div>
    <img src="<?=$news['image']?>" alt="" style="width: 100px; height: 100px;">
    <a href="<?=route('news.show', ['id' => $news['id']])?>">
        <?=$news['title']?>
    </a>
    <p>
        <strong>Author:</strong>
        <?=$news['author']?>
    </p>
    <p><?=$news['description']?></p>
</div>
<?php endforeach; ?>
