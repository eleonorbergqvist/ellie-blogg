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

          <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="<?= $url('/admincategorylist'); ?>">Categories</a></li>
              <li class="breadcrumb-item"><a><?= $pageTitle ?></a></li>
            </ol>
          </nav>

          <?php if(isset($message)): ?>
            <div class="alert alert-danger" role="alert">
              <strong>Oh snap!</strong> <?= $message ?>
            </div>
          <?php endif; ?>

          <form action="" method="post">
            <div class="form-group row">
              <div class="form-group col-sm-10">
                <label for="create_title">Kategori</label>
                <input name="name" id="create_title" class="form-control" type="text" placeholder="Skriv din kategori här" value="<?= $name ?? '' ?>">
              </div>
            </div>
            <div class="form-group row">
                <div class="col-sm-10">
                  <button type="submit" class="btn btn-primary">Submit</button>
              </div>
            </div>
          </form>
        </div>