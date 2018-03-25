
        <div style="padding: 15px 150px 15px 150px;">
          <ul class="nav nav-tabs">
            <li class="nav-item">
              <a class="nav-link" href="<?= $url('/adminhome'); ?>">Posts</a>
            </li>
            <li class="nav-item">
              <a class="nav-link  active" href="<?= $url('/admincategorylist'); ?>">Categories</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="<?= $url('/admintaglist'); ?>">Tags</a>
            </li>
          </ul>

          <div style="padding: 15px;">
            <a class="btn btn-outline-primary" href="<?= $url('/admincategorycreate'); ?>" role="button">Create category</a>
          </div>

          <div class="container">
            <?php foreach ($categories as $category): ?>
              <div class="row">
                <div class="col">
                  <div class="list-group">
                    <a href="<?= $url("/admincategoryupdate/" . $category->getField('id')); ?>" class="list-group-item">
                      <h4 class="list-group-item-heading"><?= $category->getField('name')?></h4>
                      <p><?= $category->getField('slug')?></p>
                    </a>
                  </div>
                </div>
                <div>
                  <a href="<?= $url("/admincategoryupdate/".$category->getField('id')); ?>" class="badge badge-success">Edit</a>
                  <a href="<?= $url("/admincategorydelete/".$category->getField('id')); ?>" class="badge badge-danger">X</a>
                </div>
              </div>
          
            <?php endforeach; ?>
          
          </div>
        </div>