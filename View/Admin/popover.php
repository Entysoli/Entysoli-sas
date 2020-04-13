<!DOCTYPE html>
<html lang="en">


<!-- popover.html  21 Nov 2019 03:51:03 GMT -->
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
                    <h4>Directions</h4>
                  </div>
                  <div class="card-body">
                    <button type="button" class="btn btn-secondary" data-container="body" data-toggle="popover"
                      data-placement="top" data-content="Vivamus sagittis lacus vel augue laoreet rutrum faucibus.">
                      On top
                    </button>
                    <button type="button" class="btn btn-secondary" data-container="body" data-toggle="popover"
                      data-placement="right" data-content="Vivamus sagittis lacus vel augue laoreet rutrum faucibus.">
                      On right
                    </button>
                    <button type="button" class="btn btn-secondary" data-container="body" data-toggle="popover"
                      data-placement="bottom" data-content="Vivamus
                    sagittis lacus vel augue laoreet rutrum faucibus.">
                      On bottom
                    </button>
                    <button type="button" class="btn btn-secondary" data-container="body" data-toggle="popover"
                      data-placement="left" data-content="Vivamus sagittis lacus vel augue laoreet rutrum faucibus.">
                      On left
                    </button>
                  </div>
                </div>
                <div class="card">
                  <div class="card-header">
                    <h4>Disabled Popover</h4>
                  </div>
                  <div class="card-body">
                    <span class="d-inline-block" data-toggle="popover" data-content="Disabled popover">
                      <button class="btn btn-primary pe-none" type="button" disabled>Disabled button</button>
                    </span>
                  </div>
                </div>
              </div>
              <div class="col-12 col-md-6 col-lg-6">
                <div class="card">
                  <div class="card-header">
                    <h4>Dismiss</h4>
                  </div>
                  <div class="card-body">
                    <a tabindex="0" class="btn btn-danger" role="button" data-toggle="popover" data-trigger="focus"
                      title="Dismissible popover"
                      data-content="And here's some amazing content. It's very engaging. Right?">Dismissible popover</a>
                  </div>
                </div>
                <div class="card">
                  <div class="card-header">
                    <h4>Link</h4>
                  </div>
                  <div class="card-body">
                    <div class="buttons">
                      <p>Lorem ipsum dolor sit amet, consectetur <a href="javascript:;" data-toggle="popover"
                          title="Popover Title" data-content="Hello, this is link." data-trigger="focus">adipisicing
                          elit</a>, sed do eiusmod
                        tempor incididunt ut labore et dolore magna aliqua.</p>
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


<!-- popover.html  21 Nov 2019 03:51:03 GMT -->
</html>