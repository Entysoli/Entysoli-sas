<!DOCTYPE html>
<html lang="en">


<!-- media-object.html  21 Nov 2019 03:51:01 GMT -->
<?php include '../Public/style.php'; ?>

<body>
  <div class="loader"></div>
  <div id="app">
    <div class="main-wrapper main-wrapper-1">
      <div class="navbar-bg"></div>
      <?php include '../Public/nav-bar.php'; ?>
      <!--NAV-BAR-->
      <?php include '../Public/slide-bar.php'; ?>
      <!-- Main Content -->
      <div class="main-content">
        <section class="section">
          <div class="section-body">
            <div class="row">
              <div class="col-12 col-md-6 col-lg-6">
                <div class="card">
                  <div class="card-header">
                    <h4>Simple</h4>
                  </div>
                  <div class="card-body">
                    <div class="media">
                      <img class="mr-3" src="assets/img/image-64.png" alt="Generic placeholder image">
                      <div class="media-body">
                        <h5 class="mt-0">Media heading</h5>
                        <p class="mb-0">Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante
                          sollicitudin. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce
                          condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.</p>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="card">
                  <div class="card-header">
                    <h4>List</h4>
                  </div>
                  <div class="card-body">
                    <ul class="list-unstyled">
                      <li class="media">
                        <img class="mr-3" src="assets/img/image-64.png" alt="Generic placeholder image">
                        <div class="media-body">
                          <h5 class="mt-0 mb-1">List-based media object</h5>
                          <p>Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin.
                            Cras purus oringilla. Donec lacinia congue felis in faucibus.</p>
                        </div>
                      </li>
                      <li class="media my-4">
                        <img class="mr-3" src="assets/img/image-64.png" alt="Generic placeholder image">
                        <div class="media-body">
                          <h5 class="mt-0 mb-1">List-based media object</h5>
                          <p>Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin.
                            Cras purus oringilla. Donec lacinia congue felis in faucibus.</p>
                        </div>
                      </li>
                      <li class="media">
                        <img class="mr-3" src="assets/img/image-64.png" alt="Generic placeholder image">
                        <div class="media-body">
                          <h5 class="mt-0 mb-1">List-based media object</h5>
                          <p class="mb-0">Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante
                            sollicitudin. Cras purus oringilla. Donec lacinia congue felis in faucibus.</p>
                        </div>
                      </li>
                    </ul>
                  </div>
                </div>
              </div>
              <div class="col-12 col-md-6 col-lg-6">
                <div class="card">
                  <div class="card-header">
                    <h4>Nesting</h4>
                  </div>
                  <div class="card-body">
                    <div class="media">
                      <img class="mr-3" src="assets/img/image-64.png" alt="Generic placeholder image">
                      <div class="media-body">
                        <h5 class="mt-0">Media heading</h5>
                        <p>Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin.
                          Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac
                          nisi vulputate fringilla. Donec lacinia congue felis in faucibus.</p>
                        <div class="media mt-3">
                          <a class="pr-3" href="#">
                            <img src="assets/img/image-64.png" alt="Generic placeholder image">
                          </a>
                          <div class="media-body">
                            <h5 class="mt-0">Media heading</h5>
                            <p class="mb-0">Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque
                              ante sollicitudin. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis.
                              Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in
                              faucibus.</p>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="card">
                  <div class="card-header">
                    <h4>Order</h4>
                  </div>
                  <div class="card-body">
                    <div class="media">
                      <div class="media-body">
                        <h5 class="mt-0 mb-1">Media object</h5>
                        <p>Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin.
                          Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac
                          nisi vulputate fringilla. Donec lacinia congue felis in faucibus.</p>
                      </div>
                      <img class="ml-3" src="assets/img/image-64.png" alt="Generic placeholder image">
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </section>
        <div class="settingSidebar">
          <a href="javascript:void(0)" class="settingPanelToggle"> <i class="fa fa-spin fa-cog"></i>
          </a>
          <div class="settingSidebar-body ps-container ps-theme-default">
            <div class=" fade show active">
              <div class="setting-panel-header">Setting Panel
              </div>
              <div class="p-15 border-bottom">
                <h6 class="font-medium m-b-10">Select Layout</h6>
                <div class="selectgroup layout-color w-50">
                  <label class="selectgroup-item">
                    <input type="radio" name="value" value="1" class="selectgroup-input-radio select-layout" checked>
                    <span class="selectgroup-button">Light</span>
                  </label>
                  <label class="selectgroup-item">
                    <input type="radio" name="value" value="2" class="selectgroup-input-radio select-layout">
                    <span class="selectgroup-button">Dark</span>
                  </label>
                </div>
              </div>
              <div class="p-15 border-bottom">
                <h6 class="font-medium m-b-10">Sidebar Color</h6>
                <div class="selectgroup selectgroup-pills sidebar-color">
                  <label class="selectgroup-item">
                    <input type="radio" name="icon-input" value="1" class="selectgroup-input select-sidebar">
                    <span class="selectgroup-button selectgroup-button-icon" data-toggle="tooltip"
                      data-original-title="Light Sidebar"><i class="fas fa-sun"></i></span>
                  </label>
                  <label class="selectgroup-item">
                    <input type="radio" name="icon-input" value="2" class="selectgroup-input select-sidebar" checked>
                    <span class="selectgroup-button selectgroup-button-icon" data-toggle="tooltip"
                      data-original-title="Dark Sidebar"><i class="fas fa-moon"></i></span>
                  </label>
                </div>
              </div>
              <div class="p-15 border-bottom">
                <h6 class="font-medium m-b-10">Color Theme</h6>
                <div class="theme-setting-options">
                  <ul class="choose-theme list-unstyled mb-0">
                    <li title="white" class="active">
                      <div class="white"></div>
                    </li>
                    <li title="cyan">
                      <div class="cyan"></div>
                    </li>
                    <li title="black">
                      <div class="black"></div>
                    </li>
                    <li title="purple">
                      <div class="purple"></div>
                    </li>
                    <li title="orange">
                      <div class="orange"></div>
                    </li>
                    <li title="green">
                      <div class="green"></div>
                    </li>
                    <li title="red">
                      <div class="red"></div>
                    </li>
                  </ul>
                </div>
              </div>
              <div class="p-15 border-bottom">
                <div class="theme-setting-options">
                  <label class="m-b-0">
                    <input type="checkbox" name="custom-switch-checkbox" class="custom-switch-input"
                      id="mini_sidebar_setting">
                    <span class="custom-switch-indicator"></span>
                    <span class="control-label p-l-10">Mini Sidebar</span>
                  </label>
                </div>
              </div>
              <div class="p-15 border-bottom">
                <div class="theme-setting-options">
                  <label class="m-b-0">
                    <input type="checkbox" name="custom-switch-checkbox" class="custom-switch-input"
                      id="sticky_header_setting">
                    <span class="custom-switch-indicator"></span>
                    <span class="control-label p-l-10">Sticky Header</span>
                  </label>
                </div>
              </div>
              <div class="mt-4 mb-4 p-3 align-center rt-sidebar-last-ele">
                <a href="#" class="btn btn-icon icon-left btn-primary btn-restore-theme">
                  <i class="fas fa-undo"></i> Restore Default
                </a>
              </div>
            </div>
          </div>
        </div>
      </div>
      <footer class="main-footer">
        <div class="footer-left">
          <a href="templateshub.net">Templateshub</a></a>
        </div>
        <div class="footer-right">
        </div>
      </footer>
    </div>
  </div>
  <!-- General JS Scripts -->
  <?php include '../Public/general-Scripts.php';  ?>
</body>


<!-- media-object.html  21 Nov 2019 03:51:03 GMT -->
</html>