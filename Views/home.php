<div class="jumbotron jumbotron-fluid" style="margin-bottom: 0">
          <div class="container">
            <h1 class="display-3">Poststart</h1>
            <p class="lead">This is a modified jumbotron that occupies the entire horizontal space of its parent.</p>
          </div>
        </div>

        <nav class="navbar navbar-expand-lg navbar-light bg-light" style="margin-bottom: 15px">
          <a class="navbar-brand" href="#">Navbar</a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <div class="navbar-nav">
              <a class="nav-item nav-link active" href="#">Home <span class="sr-only">(current)</span></a>
              <a class="nav-item nav-link" href="#">Features</a>
              <a class="nav-item nav-link" href="#">Pricing</a>
              <a class="nav-item nav-link disabled" href="#">Disabled</a>
            </div>
          </div>
        </nav>


        <div class="container">
          <div class="row">
            <div class="col" style="background: lightblue">
              <div class="card mb-3">
                  <img class="card-img-top" src=<?= "\"" . "../media/" . $post->getField('image_path') . "\""; ?> alt="Card image cap">
                  <div class="card-body">
                    <h4 class="card-title"><?= $post->getField('title'); ?></h4>
                    <p class="card-text"><?= $post->getField('content'); ?></p>
                    <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                    <a class="btn btn-primary" href="<?= $post->getUrl(); ?>">Läs mer</a>
                  </div>
                </div>
            </div>
            <div class="col-4" style="background: pink; margin-left: 30px;">
                <div>
                    <h4>Follow</h4>
                    <button type="button" class="btn btn-primary">Primary</button>
                    <button type="button" class="btn btn-primary">Primary</button>
                    <button type="button" class="btn btn-primary">Primary</button>
                    <button type="button" class="btn btn-primary">Primary</button>
                </div>
                <h4>Popular posts</h4>
                <div class="media">
                  <img class="align-self-start mr-3" src="https://dummyimage.com/100x100/ccc/fff.png" alt="Generic placeholder image">
                  <div class="media-body">
                    <h5 class="mt-0">Top-aligned media</h5>
                    <p>Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis.</p>
                  </div>
                </div>
                <div class="media">
                  <img class="align-self-start mr-3" src="https://dummyimage.com/100x100/ccc/fff.png" alt="Generic placeholder image">
                  <div class="media-body">
                    <h5 class="mt-0">Top-aligned media</h5>
                    <p>Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis.</p>
                  </div>
                </div>
                <div class="media">
                  <img class="align-self-start mr-3" src="https://dummyimage.com/100x100/ccc/fff.png" alt="Generic placeholder image">
                  <div class="media-body">
                    <h5 class="mt-0">Top-aligned media</h5>
                    <p>Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis.</p>
                  </div>
                </div>
                <h4>Categories</h4>
                <ul class="list-group">
                  <li class="list-group-item d-flex justify-content-between align-items-center">
                    Cras justo odio
                    <span class="badge badge-primary badge-pill">14</span>
                  </li>
                  <li class="list-group-item d-flex justify-content-between align-items-center">
                    Dapibus ac facilisis in
                    <span class="badge badge-primary badge-pill">2</span>
                  </li>
                  <li class="list-group-item d-flex justify-content-between align-items-center">
                    Morbi leo risus
                    <span class="badge badge-primary badge-pill">1</span>
                  </li>
                </ul>
            </div>
          </div>
        </div>