
        <div style="padding: 15px 150px 15px 150px;">
          <ul class="nav nav-tabs">
            <li class="nav-item">
              <a class="nav-link active" href="<?= $url('/adminhome'); ?>">Posts</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="<?= $url('/admincategorylist'); ?>">Categories</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="<?= $url('/admintaglist'); ?>">Tags</a>
            </li>
          </ul>

          <div style="padding: 15px;">
            <a class="btn btn-outline-primary" href="<?= $url('/adminpostcreate'); ?>" role="button">Create post</a>
          </div>

          <div class="container">
            <?php foreach ($posts as $post): ?>
              
              <div class="row">
                
                <div class="col">
                  <div class="list-group">
                    <a href="<?= $url("/adminpostupdate/" . $post->getField('id')); ?>" class="list-group-item">
                      <h4 class="list-group-item-heading"><?= $post->getField('title')?></h4>
                      <p class="list-group-item-text"><?= $post->getField('content')?></p>
                    </a>
                  </div>
                </div>
                <div>
                    <a href="<?= $url("/adminpostupdate/".$post->getField('id')); ?>" class="badge badge-success">Edit</a>
                    <a href="<?= $url("/adminpostdelete/".$post->getField('id')); ?>" class="badge badge-danger">X</a>
                </div>
              </div>
          
            <?php endforeach; ?>
          
          </div>
        </div>