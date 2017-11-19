
        <div style="padding: 15px 150px 15px 150px;">
          <div class="container">
            <div class="row">
              <div class="col">
                <a href="<?= $url('/adminpostcreate'); ?>" class="badge badge-primary badge-secondary">Create</a>
              </div>
            </div>

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