<?php
view('blocks.head', ['title' => $post['title'] ?? '']);
?>

<h1 style="color: red; font-size: 30px"><?= $post['Title'] ?></h1>
<p style="border: green solid 1px"><?= $post['Content'] ?></p>
<p style="border: blue solid 1px"><?= $post['Created_at'] ?></p>

<?php view('blocks.footer'); ?>
