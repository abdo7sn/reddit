<div class="sorting-tabs">
    <a href="?sort=hot" class="<?php echo (!isset($_GET['sort']) || $_GET['sort'] === 'hot') ? 'active' : ''; ?>">الأحدث</a>
    <a href="?sort=everywhere" class="<?php echo (isset($_GET['sort']) && $_GET['sort'] === 'everywhere') ? 'active' : ''; ?>">الأفضل</a>
</div>