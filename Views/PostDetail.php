
        <div class="container">
          <div class="row">
            <div class="col" style="background: lightblue">
              <div class="card mb-3">
                  <?php if ($post->getField('image_path')): ?>
                    <img class="card-img-top" src="<?= IMAGE_URL . $post->getField('image_path'); ?>" alt="Card image cap">
                  <?php endif; ?>
                  <div class="card-body">
                    <h4 class="card-title"><?= $post->getField('title'); ?></h4>
                    <p class="card-text"><?= $post->getField('content'); ?></p>
                    <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                    
                    <?php if ($post->getField('category_id')): ?>
                      <a href="<?= $post->getCategory()->getUrl(); ?>" class="btn btn-secondary btn-sm"><?= $post->getCategory()->getField('name'); ?></a>
                    <?php endif; ?>

                    <?php foreach ($post->getTags() as $tag) : ?>
                      <a href="<?= $tag->getUrl(); ?>" style="background: pink" class="btn btn-secondary btn-sm">
                        <?= $tag->getField('name'); ?>
                      </a>
                    <?php endforeach; ?>
                  </div>
                </div>
            </div>
            <?php require 'Partials/sidebar.php'; ?>
          </div>
        </div>