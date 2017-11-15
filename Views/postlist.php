

        


        <div class="container">
          <div class="row">
            <div class="col" style="background: lightblue">
              <div class="card mb-3">
                  <img class="card-img-top" src=<?= "\"" . "../media/" . $posts[0]->getField('image_path') . "\""; ?> alt="Card image cap">
                  <div class="card-body">
                    <h4 class="card-title">
                      <?= $posts[0]->getField('title')?>

                    </h4>
                    <p class="card-text"><?= $posts[0]->getField('content')?></p>
                    <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                  </div>
                </div>
                <div class="card mb-3">
                  <img class="card-img-top" src=<?= "\"" . "../media/" . $posts[1]->getField('image_path') . "\""; ?> alt="Card image cap">
                  <div class="card-body">
                    <h4 class="card-title"><?= $posts[1]->getField('title')?></h4>
                    <p class="card-text"><?= $posts[1]->getField('content')?></p>
                    <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                  </div>
                </div>
                <div class="card mb-3">
                  <img class="card-img-top" src=<?= "\"" . "../media/" . $posts[2]->getField('image_path') . "\""; ?> alt="Card image cap">
                  <div class="card-body">
                    <h4 class="card-title"><?= $posts[2]->getField('title')?></h4>
                    <p class="card-text"><?= $posts[2]->getField('content')?></p>
                    <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
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
        

        <nav aria-label="Page navigation example" style="margin-top: 30px">
          <ul class="pagination justify-content-center">
            <li class="page-item disabled">
              <a class="page-link" href="#" tabindex="-1">Previous</a>
            </li>
            <li class="page-item"><a class="page-link" href="#">1</a></li>
            <li class="page-item"><a class="page-link" href="#">2</a></li>
            <li class="page-item"><a class="page-link" href="#">3</a></li>
            <li class="page-item">
              <a class="page-link" href="#">Next</a>
            </li>
          </ul>
        </nav>