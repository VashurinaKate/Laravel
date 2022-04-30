<?php foreach($categoriesList as $categories): ?>
<div>
    <a href="<?=route('news')?>">
        <?=$categories['title']?>
    </a>
</div>
<?php endforeach; ?>
