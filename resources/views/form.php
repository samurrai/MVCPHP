<?php view('blocks.head', ['title' => $title ?? '']); ?>


<form action="/<?= $action ?? 'create' ?>" method="POST"
style="display: flex; 
       flex-direction: column; 
       width: 500px;
       margin: 0 auto;">
    
    <div class="form-group">
        <input type="text" class="form-control" name="title" id="" placeholder="title" value="<?= $post['Title'] ?? '' ?>">
    
        <textarea type="text" class="form-control" name="content" id="" placeholder="content" value="<?= $post['Content'] ?? '' ?>"></textarea>
    </div>    
    

    <input type="submit" value="Next" class="btn btn-primary">
</form>

<?php view('blocks.footer'); ?>


