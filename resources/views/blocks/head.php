<?php

use Core\Auth;

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <title><?= $title ?? '' ?> | <?= config('app.site.name') ?> </title>
</head>
<body>
    <div>
        <?php if (Auth::check()) : ?>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item active" aria-current="page">Hi, <?= Auth::getUser()['username'] ?></li>
            </ol>
        </nav>
        <?php else: ?>
            <a href="/login" >Login</a>
        <?php endif;?>
    </div>