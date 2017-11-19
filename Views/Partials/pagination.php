?php 
  $pages = ceil($totalPosts/$postsPerPage);
?>

<nav aria-label="Page navigation example" style="margin-top: 30px">
  <ul class="pagination justify-content-center">

    <li class="page-item">
      <a class="page-link" href="?offset=<?= max($offset-$postsPerPage, 0); ?>" tabindex="-1">Previous</a>
    </li>
    <?php for($i = 0; $i < $pages; $i++): ?>
      <li class="page-item"><a class="page-link" href="?offset=<?= $i*$postsPerPage ?>"><?= $i + 1 ?></a></li>
    <?php endfor ?>
    
    <li class="page-item">
      <a class="page-link" href="?offset=<?= min($offset+$postsPerPage, $totalPosts); ?>">Next</a>
    </li>
  </ul>
</nav>