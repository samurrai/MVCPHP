<?php
view('blocks.head', ['title' => $title ?? '']);

foreach ($posts ?? [] as $post) {
    view('blocks.post_preview', [
        'post' => $post
    ]);
}


view('blocks.footer');