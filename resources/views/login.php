<?php
view('blocks.head', ['title' => $title ?? '']);
?>

<h1><?= $title ?? ''?></h1>


<form action="/login" method="post">
    <div class="form-control">
        <input type="text" name="username" placeholder="Username" value="<?= $username ?? ''?>">
        <input type="password" name="password" placeholder="Password">
        <input type="submit" class="btn btn-primary" value="Next">
    </div>
</form>

<?php
view('blocks.footer');
?>