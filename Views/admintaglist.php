
        <div style="padding: 15px 150px 15px 150px;">
          <ul class="nav nav-tabs">
            <li class="nav-item">
              <a class="nav-link" href="<?= $url('/adminhome'); ?>">Posts</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="<?= $url('/admintaglist'); ?>">Categories</a>
            </li>
            <li class="nav-item">
              <a class="nav-link active" href="<?= $url('/admintaglist'); ?>">Tags</a>
            </li>
          </ul>

          <div style="padding: 15px;">
            <a class="btn btn-outline-primary" href="<?= $url('/admintagcreate'); ?>" role="button">Create tag</a>
          </div>

          <div class="container">
            <?php foreach ($tags as $tag): ?>
              <div class="row">
                <div class="col">
                  <div class="list-group">
                    <a href="<?= $url("/admintagupdate/" . $tag->getField('id')); ?>" class="list-group-item">
                      <h4 class="list-group-item-heading"><?= $tag->getField('name')?></h4>
                      <p><?= $tag->getField('slug')?></p>
                    </a>
                  </div>
                </div>
                <div>
                  <a href="<?= $url("/admintagupdate/".$tag->getField('id')); ?>" class="badge badge-success">Edit</a>
                  <a href="<?= $url("/admintagdelete/".$tag->getField('id')); ?>" class="badge badge-danger">X</a>
                </div>
              </div>
          
            <?php endforeach; ?>
          
          </div>
        </div>