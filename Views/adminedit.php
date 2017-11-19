        <div style="padding: 15px 150px 15px 150px;">
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

                <label class="custom-control custom-checkbox">
                  <input name="tag_id" type="checkbox" class="custom-control-input">
                  <span class="custom-control-indicator"></span>
                  <span class="custom-control-description">Tag</span>
                </label>

              </div>
            </div>
            <div class="form-group row">
                <div class="col-sm-10">
                  <button type="submit" class="btn btn-primary">Submit</button>
              </div>
            </div>
          </form>
        </div>