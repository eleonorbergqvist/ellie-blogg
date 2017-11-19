<div class="col-4" style="background: pink; margin-left: 30px;">
  <div>
      <h4>Tags</h4>
      <?php foreach ($tags as $tag): ?>
        <a href="<?= $tag->getUrl(); ?>" class="btn btn-secondary btn-sm"><?= $tag->getField('name'); ?></a>
      <?php endforeach; ?>
  </div>
  
  <h4>Categories</h4>
  <ul class="list-group">
    <?php foreach ($categories as $category) :?>
      <li class="list-group-item d-flex justify-content-between align-items-center">
        <a href="<?= $category->getUrl(); ?>"><?= $category->getField('name'); ?></a>
        <!-- <span class="badge badge-primary badge-pill">14</span> -->
      </li>
    <?php endforeach; ?>
  </ul>
</div>