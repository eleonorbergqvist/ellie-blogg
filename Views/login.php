        <div style="padding: 15px 150px 15px 150px;">
          <?php if(isset($message)): ?>
            <div class="alert alert-danger" role="alert">
              <strong>Oh snap!</strong> <?= $message ?>
            </div>
          <?php endif; ?>

          <form action="/adminlogin" method="post">
            <div class="form-group row">
              <label for="inputEmail3" class="col-sm-2 col-form-label">Email</label>
              <div class="col-sm-10">
                <input name="email" type="email" class="form-control" id="inputEmail3" placeholder="Email">
              </div>
            </div>
            <!--
            <div class="form-group row">
              <label for="inputPassword3" class="col-sm-2 col-form-label">Password</label>
              <div class="col-sm-10">
                <input type="password" class="form-control" id="inputPassword3" placeholder="Password">
              </div>
            </div>
          -->
            <div class="form-group row">
              <div class="col-sm-10">
                <button type="submit" class="btn btn-primary">Sign in</button>
              </div>
            </div>
          </form>
        </div>