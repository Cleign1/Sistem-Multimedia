<?php
echo $this->session->flashdata('error');
?>

<div class="col s6" style="margin-top: 10px; margin-bottom: 10px;">
    <a href="<?= site_url('welcome/deleteAll/'); ?>" class="btn red" id="deleteLink">Delete All</a>
</div>

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

<script>
    document.getElementById("deleteLink").addEventListener("click", function(event) {
        var confirmation = confirm("Apakah ingin dihapus semua?");
        if (!confirmation) {
            event.preventDefault();
        }
    });
</script>