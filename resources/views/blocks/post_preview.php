<?php 
    use Core\Auth;
    $content = $post['Content'] ?? '';
if (strlen($content) > 50) {
    $content = substr($content, 0, 50) . "...";
}
?>


<div class="card" style="width: 18rem;">
  <div class="card-body">
    <h5 class="card-title"><?= $post['Title'] ?? ' '?></h5>
    <h6 class="card-subtitle mb-2 text-muted">Card subtitle</h6>
    <p class="card-text"><?= $content ?? ' '?></p>
    
    <?php if (Auth::check()): ?> 
        <a class="card-link" href="/post?id=<?= $post['Id'] ?? ' '?>">More...</a>
    <?php endif; ?>
   
  </div>
</div>

</div>