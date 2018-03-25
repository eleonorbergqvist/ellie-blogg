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

          <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="<?= $url('/adminhome'); ?>">Posts</a></li>
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
                <label for="create_title">Rubrik</label>
                <input name="title" id="create_title" class="form-control" type="text" placeholder="Skriv din rubrik här" value="<?= $title ?? '' ?>">
              </div>
            </div>
            <div class="form-group row">
              <div class="form-group col-sm-10">
                <label for="exampleFormControlTextarea1">Textarea</label>
                <textarea name="content" class="form-control" id="exampleFormControlTextarea1" rows="6"><?= $content ?? '' ?></textarea>
              </div>
            </div>
            <div class="form-group">
              <label for="exampleFormControlFile1">Lägg till en bild</label>
              <input name="image_path" type="file" class="form-control-file" id="exampleFormControlFile1">
            </div>
            <div class="form-group row">
              <div class="form-group col-sm-10">
                <label for="create_title">Kategori</label>
                <select name="category_id">
                  <?php foreach ($categories as $key => $category): ?>
                    <?php
                    $active = $category_id == $category->getField('id');
                    ?>
                    <option value="<?= $category->getField('id'); ?>" <?php echo $active ? ' selected' : ''; ?>>
                      <?= $category->getField('name'); ?>
                    </option>
                  <?php endforeach; ?>
                </select>
              </div>
            </div>
            <div class="form-group row">
              <div class="form-group col-sm-10">
                <h6>Taggar:</h6>
                <?php foreach ($tags as $tag): ?>
                  <?php $active = in_array($tag->getField("id"), $selectedTagIds); ?>
                  <label class="custom-control custom-checkbox">
                    <input name="tag_ids[]" type="checkbox" class="custom-control-input" value="<?= $tag->getField('id') ?>" <?= $active ? ' checked' : ''; ?>>
                    <span class="custom-control-indicator"></span>
                    <span class="custom-control-description"><?= $tag->getField('name')?></span>
                  </label>
                <?php endforeach; ?>

              </div>
            </div>
            <div class="form-group row">
                <div class="col-sm-10">
                  <button type="submit" class="btn btn-primary">Submit</button>
              </div>
            </div>
          </form>
        </div>