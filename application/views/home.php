<?php
echo $this->session->flashdata('error');
?>

<ul class="collection">
    <?php foreach ($home_post as $post) : ?>
            <li class="collection-item avatar">
                <img src="<?= site_url(uri: '/upload/post/' . $post['filename']); ?>" class="circle">
                <p class="title"><?= $post['name']; ?></p>
                <small><?= $post['description'] ?></small>
                <a href="<?= site_url(uri: 'welcome/index/'. $post['id']);?>" class="secondary_content">
                    <i class="material-icons" style="margin_left: 50px">visibility</i>
                </a>
            </li>
    <?php endforeach; ?>
</ul>