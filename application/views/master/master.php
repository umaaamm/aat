<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Cuba admin is super flexible, powerful, clean &amp; modern responsive bootstrap 4 admin template with unlimited possibilities.">
    <meta name="keywords" content="admin template, Cuba admin template, dashboard template, flat admin template, responsive admin template, web app">
    <meta name="author" content="pixelstrap">
    <link rel="icon" href="<?php echo base_url();?>/assets/images/favicon.png" type="image/x-icon">
    <link rel="shortcut icon" href="<?php echo base_url();?>/assets/images/favicon.png" type="image/x-icon">
    <title>Cuba - Premium Admin Template</title>
    <!-- Google font-->
    <link href="https://fonts.googleapis.com/css?family=Rubik:400,400i,500,500i,700,700i&amp;display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,300i,400,400i,500,500i,700,700i,900&amp;display=swap" rel="stylesheet">
    <!-- Font Awesome-->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>/assets/css/fontawesome.css">
    <!-- ico-font-->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>/assets/css/icofont.css">
    <!-- Themify icon-->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>/assets/css/themify.css">
    <!-- Flag icon-->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>/assets/css/flag-icon.css">
    <!-- Feather icon-->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>/assets/css/feather-icon.css">
    <!-- Plugins css start-->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>/assets/css/animate.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>/assets/css/chartist.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>/assets/css/date-picker.css">
    <!-- Plugins css Ends-->
    <!-- Bootstrap css-->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>/assets/css/bootstrap.css">
    <!-- App css-->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>/assets/css/style.css">
    <link id="color" rel="stylesheet" href="<?php echo base_url();?>/assets/css/color-1.css" media="screen">
    <!-- Responsive css-->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>/assets/css/responsive.css">
  </head>
  <body onload="startTime()">
    <!-- Loader starts-->
    <div class="loader-wrapper">
      <div class="loader-index"><span></span></div>
      <svg>
        <defs></defs>
        <filter id="goo">
          <fegaussianblur in="SourceGraphic" stddeviation="11" result="blur"></fegaussianblur>
          <fecolormatrix in="blur" values="1 0 0 0 0  0 1 0 0 0  0 0 1 0 0  0 0 0 19 -9" result="goo">    </fecolormatrix>
        </filter>
      </svg>
    </div>
    <!-- Loader ends-->
    <!-- page-wrapper Start-->
    <div class="page-wrapper compact-wrapper" id="pageWrapper">
      <!-- Page Header Start-->
      <div class="page-main-header">
        <div class="main-header-right row m-0">
          <div class="main-header-left">
            <div class="logo-wrapper"><a href="index.html"><img class="img-fluid" src="<?php echo base_url();?>/assets/images/logo/logo.png" alt=""></a></div>
          </div>
          <div class="toggle-sidebar"><i class="status_toggle middle" data-feather="grid" id="sidebar-toggle"></i></div>
          <div class="left-menu-header col">
            <ul>
              <li>
                <form class="form-inline search-form">
                  <div class="search-bg"><i class="fa fa-search"></i></div>
                  <input class="form-control-plaintext" placeholder="Search here.....">
                </form><span class="d-sm-none mobile-search search-bg"><i class="fa fa-search"></i></span>
              </li>
            </ul>
          </div>
          <div class="nav-right col pull-right right-menu">
            <ul class="nav-menus">
              <li class="onhover-dropdown">
                <div class="notification-box"><i data-feather="bell"></i><span class="badge badge-pill badge-secondary">2</span></div>
                <ul class="notification-dropdown onhover-show-div">
                  <li>
                    <p class="f-w-600 font-roboto">You have 3 notifications</p>
                  </li>
                  <li>
                    <p class="mb-0"><i class="fa fa-circle-o mr-3 font-primary"> </i>Delivery processing <span class="pull-right">10 min.</span></p>
                  </li>
                  <li>
                    <p class="mb-0"><i class="fa fa-circle-o mr-3 font-success"></i>Order Complete<span class="pull-right">1 hr</span></p>
                  </li>
                  <li>
                    <p class="mb-0"><i class="fa fa-circle-o mr-3 font-info"></i>Tickets Generated<span class="pull-right">3 hr</span></p>
                  </li>
                  <li>
                    <p class="mb-0"><i class="fa fa-circle-o mr-3 font-warning"></i>Delivery Complete<span class="pull-right">6 hr</span></p>
                  </li>
                </ul>
              </li>
              <li class="onhover-dropdown"><i data-feather="message-square"></i>
                <ul class="chat-dropdown onhover-show-div p-t-15 p-b-15">
                  <li>
                    <div class="media"><img class="img-fluid rounded-circle mr-3" src="<?php echo base_url();?>/assets/images/user/1.jpg" alt="">
                      <div class="status-circle away"></div>
                      <div class="media-body"><span>Erica Hughes</span>
                        <p class="f-12 light-font">Lorem Ipsum is simply dummy...</p>
                      </div>
                      <p class="f-12 font-warning">58 mins ago</p>
                    </div>
                  </li>
                  <li>
                    <div class="media"><img class="img-fluid rounded-circle mr-3" src="<?php echo base_url();?>/assets/images/user/2.jpg" alt="">
                      <div class="status-circle online"></div>
                      <div class="media-body"><span>Kori Thomas</span>
                        <p class="f-12 light-font">Lorem Ipsum is simply dummy...</p>
                      </div>
                      <p class="f-12 font-success">1 hr ago</p>
                    </div>
                  </li>
                  <li>
                    <div class="media"><img class="img-fluid rounded-circle mr-3" src="<?php echo base_url();?>/assets/images/user/4.jpg" alt="">
                      <div class="status-circle offline"></div>
                      <div class="media-body"><span>Ain Chavez</span>
                        <p class="f-12 light-font">Lorem Ipsum is simply dummy...</p>
                      </div>
                      <p class="f-12 font-danger">32 mins ago</p>
                    </div>
                  </li>
                  <li class="text-center"> <a href="#">View All     </a></li>
                </ul>
              </li>
              <li><a class="text-dark" href="#!" onclick="javascript:toggleFullScreen()"><i data-feather="maximize"></i></a></li>
              <li class="onhover-dropdown p-0">
                <div class="media profile-media"><img class="b-r-10" src="<?php echo base_url();?>/assets/images/dashboard/profile.jpg" alt="">
                  <div class="media-body"><span>Emay Walter</span>
                    <p class="mb-0 font-roboto">Admin <i class="middle fa fa-angle-down"></i></p>
                  </div>
                </div>
                <ul class="profile-dropdown onhover-show-div">
                  <li><i data-feather="user"></i><span>Account </span></li>
                  <li><i data-feather="mail"></i><span>Inbox</span></li>
                  <li><i data-feather="file-text"></i><span>Taskboard</span></li>
                  <li><i data-feather="settings"></i><span>Settings</span></li>
                  <li><i data-feather="log-in"> </i><span>Log in</span></li>
                </ul>
              </li>
            </ul>
          </div>
          <div class="d-lg-none mobile-toggle pull-right"><i data-feather="more-horizontal"></i></div>
        </div>
      </div>
      <!-- Page Header Ends                              -->
      <!-- Page Body Start-->
      <div class="page-body-wrapper sidebar-icon">
        <!-- Page Sidebar Start-->
        <header class="main-nav">
          <div class="logo-wrapper"><a href="index.html"><img class="img-fluid" src="<?php echo base_url();?>/assets/images/logo/logo.png" alt=""></a></div>
          <div class="logo-icon-wrapper"><a href="index.html"><img class="img-fluid" src="<?php echo base_url();?>/assets/images/logo/logo-icon.png" alt=""></a></div>
          <nav>
            <div class="main-navbar">
              <div class="left-arrow" id="left-arrow"><i data-feather="arrow-left"></i></div>
              <div id="mainnav">
                <ul class="nav-menu custom-scrollbar">
                  <li class="back-btn">
                    <div class="mobile-back text-right"><span>Back</span><i class="fa fa-angle-right pl-2" aria-hidden="true"></i></div>
                  </li>
                  <li class="dropdown"><a class="nav-link menu-title" href="#"><i data-feather="home"></i><span>Dashboard</span></a>
                    <ul class="nav-submenu menu-content">
                      <li><a href="index.html">Default</a></li>
                      <li><a href="dashboard-02.html">Ecommerce</a></li>
                    </ul>
                  </li>
                  <li class="dropdown"><a class="nav-link menu-title" href="#"><i data-feather="airplay"></i><span>Widgets</span></a>
                    <ul class="nav-submenu menu-content">
                      <li><a href="general-widget.html">General</a></li>
                      <li><a href="chart-widget.html">Chart</a></li>
                    </ul>
                  </li>
                  <li class="dropdown"><a class="nav-link menu-title" href="#"><i data-feather="box"></i><span>Ui Kits</span></a>
                    <ul class="nav-submenu menu-content">
                      <li><a href="state-color.html">State color</a></li>
                      <li><a href="typography.html">Typography</a></li>
                      <li><a href="avatars.html">Avatars</a></li>
                      <li><a href="helper-classes.html">helper classes</a></li>
                      <li><a href="grid.html">Grid</a></li>
                      <li><a href="tag-pills.html">Tag & pills</a></li>
                      <li><a href="progress-bar.html">Progress</a></li>
                      <li><a href="modal.html">Modal</a></li>
                      <li><a href="alert.html">Alert</a></li>
                      <li><a href="popover.html">Popover</a></li>
                      <li><a href="tooltip.html">Tooltip</a></li>
                      <li><a href="loader.html">Spinners</a></li>
                      <li><a href="dropdown.html">Dropdown</a></li>
                      <li><a href="according.html">Accordion</a></li>
                      <li><a class="submenu-title" href="#">Tabs<span class="sub-arrow"><i class="fa fa-chevron-right"></i></span></a>
                        <ul class="nav-sub-childmenu submenu-content">
                          <li><a href="tab-bootstrap.html">Bootstrap Tabs</a></li>
                          <li><a href="tab-material.html">Line Tabs</a></li>
                        </ul>
                      </li>
                      <li><a href="box-shadow.html">Shadow</a></li>
                      <li><a href="list.html">Lists</a></li>
                    </ul>
                  </li>
                  <li class="dropdown"><a class="nav-link menu-title" href="#"><i data-feather="folder-plus"></i><span>Bonus Ui</span></a>
                    <ul class="nav-submenu menu-content">
                      <li><a href="scrollable.html">Scrollable</a></li>
                      <li><a href="tree.html">Tree view</a></li>
                      <li><a href="bootstrap-notify.html">Bootstrap Notify</a></li>
                      <li><a href="rating.html">Rating</a></li>
                      <li><a href="dropzone.html">dropzone</a></li>
                      <li><a href="tour.html">Tour</a></li>
                      <li><a href="sweet-alert2.html">SweetAlert2</a></li>
                      <li><a href="modal-animated.html">Animated Modal</a></li>
                      <li><a href="owl-carousel.html">Owl Carousel</a></li>
                      <li><a href="ribbons.html">Ribbons</a></li>
                      <li><a href="pagination.html">Pagination</a></li>
                      <li><a href="steps.html">Steps</a></li>
                      <li><a href="breadcrumb.html">Breadcrumb</a></li>
                      <li><a href="range-slider.html">Range Slider</a></li>
                      <li><a href="image-cropper.html">Image cropper</a></li>
                      <li><a href="sticky.html">Sticky</a></li>
                      <li><a href="basic-card.html">Basic Card</a></li>
                      <li><a href="creative-card.html">Creative Card</a></li>
                      <li><a href="tabbed-card.html">Tabbed Card</a></li>
                      <li><a href="dragable-card.html">Draggable Card</a></li>
                      <li><a class="submenu-title" href="#">Timeline<span class="sub-arrow"><i class="fa fa-chevron-right"></i></span></a>
                        <ul class="nav-sub-childmenu submenu-content">
                          <li><a href="timeline-v-1.html">Timeline 1</a></li>
                          <li><a href="timeline-v-2.html">Timeline 2</a></li>
                          <li><a href="timeline-small.html">Timeline 3</a></li>
                        </ul>
                      </li>
                    </ul>
                  </li>
                  <li class="dropdown"><a class="nav-link menu-title" href="#"><i data-feather="layout"></i><span>Page layout</span></a>
                    <ul class="nav-submenu menu-content">
                      <li><a href="box-layout.html">Boxed</a></li>
                      <li><a href="layout-rtl.html">RTL</a></li>
                      <li><a href="index.html">Light Layout</a></li>
                      <li><a href="layout-dark.html">Dark Layout</a></li>
                      <li><a href="hide-on-scroll.html">Hide Nav Scroll</a></li>
                      <li><a href="footer-light.html">Footer Light</a></li>
                      <li><a href="footer-dark.html">Footer Dark</a></li>
                      <li><a href="footer-fixed.html">Footer Fixed</a></li>
                    </ul>
                  </li>
                  <li class="dropdown"><a class="nav-link menu-title" href="#"><i data-feather="edit-3"></i><span>Builders</span></a>
                    <ul class="nav-submenu menu-content">
                      <li><a href="form-builder-1.html"> Form Builder 1</a></li>
                      <li><a href="form-builder-2.html"> Form Builder 2</a></li>
                      <li><a href="pagebuild.html">Page Builder</a></li>
                      <li><a href="button-builder.html">Button Builder</a></li>
                    </ul>
                  </li>
                  <li class="dropdown"><a class="nav-link menu-title" href="#"><i data-feather="cloud-drizzle"></i><span>Animation</span></a>
                    <ul class="nav-submenu menu-content">
                      <li><a href="animate.html">Animate</a></li>
                      <li><a href="scroll-reval.html">Scroll Reveal</a></li>
                      <li><a href="AOS.html">AOS animation</a></li>
                      <li><a href="tilt.html">Tilt Animation</a></li>
                      <li><a href="wow.html">Wow Animation</a></li>
                    </ul>
                  </li>
                  <li class="dropdown"><a class="nav-link menu-title" href="#"><i data-feather="command"></i><span>Icons</span></a>
                    <ul class="nav-submenu menu-content">
                      <li><a href="flag-icon.html">Flag icon</a></li>
                      <li><a href="font-awesome.html">Fontawesome Icon</a></li>
                      <li><a href="ico-icon.html">Ico Icon</a></li>
                      <li><a href="themify-icon.html">Thimify Icon</a></li>
                      <li><a href="feather-icon.html">Feather icon</a></li>
                      <li><a href="whether-icon.html">Whether Icon</a></li>
                      <li><a href="simple-line-icon.html">Simple line Icon</a></li>
                      <li><a href="material-design-icon.html">Material Design Icon</a></li>
                      <li><a href="pe7-icon.html">pe7 icon</a></li>
                      <li><a href="typicons-icon.html">Typicons icon</a></li>
                      <li><a href="ionic-icon.html">Ionic icon</a></li>
                    </ul>
                  </li>
                  <li class="dropdown"><a class="nav-link menu-title" href="#"><i data-feather="cloud"></i><span>Buttons</span></a>
                    <ul class="nav-submenu menu-content">
                      <li><a href="buttons.html">Default Style</a></li>
                      <li><a href="buttons-flat.html">Flat Style</a></li>
                      <li><a href="buttons-edge.html">Edge Style</a></li>
                      <li><a href="raised-button.html">Raised Style</a></li>
                      <li><a href="button-group.html">Button Group</a></li>
                    </ul>
                  </li>
                  <li class="dropdown"><a class="nav-link menu-title" href="#"><i data-feather="file-text"></i><span>Forms</span></a>
                    <ul class="nav-submenu menu-content">
                      <li><a class="submenu-title" href="#">Form Controls<span class="sub-arrow"><i class="fa fa-chevron-right"></i></span></a>
                        <ul class="nav-sub-childmenu submenu-content">
                          <li><a href="form-validation.html">Form Validation</a></li>
                          <li><a href="base-input.html">Base Inputs</a></li>
                          <li><a href="radio-checkbox-control.html">Checkbox & Radio</a></li>
                          <li><a href="input-group.html">Input Groups</a></li>
                          <li><a href="megaoptions.html">Mega Options</a></li>
                        </ul>
                      </li>
                      <li><a class="submenu-title" href="#">Form Widgets<span class="sub-arrow"><i class="fa fa-chevron-right"></i></span></a>
                        <ul class="nav-sub-childmenu submenu-content">
                          <li><a href="datepicker.html">Datepicker</a></li>
                          <li><a href="time-picker.html">Timepicker</a></li>
                          <li><a href="datetimepicker.html">Datetimepicker</a></li>
                          <li><a href="daterangepicker.html">Daterangepicker</a></li>
                          <li><a href="touchspin.html">Touchspin</a></li>
                          <li><a href="select2.html">Select2</a></li>
                          <li><a href="switch.html">Switch</a></li>
                          <li><a href="typeahead.html">Typeahead</a></li>
                          <li><a href="clipboard.html">Clipboard</a></li>
                        </ul>
                      </li>
                      <li><a class="submenu-title" href="#">Form layout<span class="sub-arrow"><i class="fa fa-chevron-right"></i></span></a>
                        <ul class="nav-sub-childmenu submenu-content">
                          <li><a href="default-form.html">Default Forms</a></li>
                          <li><a href="form-wizard.html">Form Wizard 1</a></li>
                          <li><a href="form-wizard-two.html">Form Wizard 2</a></li>
                          <li><a href="form-wizard-three.html">Form Wizard 3</a></li>
                          <li><a href="form-wizard-four.html">Form Wizard 4</a></li>
                        </ul>
                      </li>
                    </ul>
                  </li>
                  <li class="dropdown"><a class="nav-link menu-title" href="#"><i data-feather="server"></i><span>Tables</span></a>
                    <ul class="nav-submenu menu-content">
                      <li><a class="submenu-title" href="#">Bootstrap Tables<span class="sub-arrow"><i class="fa fa-chevron-right"></i></span></a>
                        <ul class="nav-sub-childmenu submenu-content">
                          <li><a href="bootstrap-basic-table.html">Basic Tables</a></li>
                          <li><a href="bootstrap-sizing-table.html">Sizing Tables</a></li>
                          <li><a href="bootstrap-border-table.html">Border Tables</a></li>
                          <li><a href="bootstrap-styling-table.html">Styling Tables</a></li>
                          <li><a href="table-components.html">Table components</a></li>
                        </ul>
                      </li>
                      <li><a class="submenu-title" href="#">Data Tables<span class="sub-arrow"><i class="fa fa-chevron-right"></i></span></a>
                        <ul class="nav-sub-childmenu submenu-content">
                          <li><a href="datatable-basic-init.html">Basic Init</a></li>
                          <li><a href="datatable-advance.html">Advance Init</a></li>
                          <li><a href="datatable-styling.html">Styling</a></li>
                          <li><a href="datatable-AJAX.html">AJAX</a></li>
                          <li><a href="datatable-server-side.html">Server Side</a></li>
                          <li><a href="datatable-plugin.html">Plug-in</a></li>
                          <li><a href="datatable-API.html">API</a></li>
                          <li><a href="datatable-data-source.html">Data Sources</a></li>
                        </ul>
                      </li>
                      <li><a class="submenu-title" href="#">Ex. Data Tables<span class="sub-arrow"><i class="fa fa-chevron-right"></i></span></a>
                        <ul class="nav-sub-childmenu submenu-content">
                          <li><a href="datatable-ext-autofill.html">Auto Fill</a></li>
                          <li><a href="datatable-ext-basic-button.html">Basic Button</a></li>
                          <li><a href="datatable-ext-col-reorder.html">Column Reorder</a></li>
                          <li><a href="datatable-ext-fixed-header.html">Fixed Header</a></li>
                          <li><a href="datatable-ext-html-5-data-export.html">HTML 5 Export</a></li>
                          <li><a href="datatable-ext-key-table.html">Key Table</a></li>
                          <li><a href="datatable-ext-responsive.html">Responsive</a></li>
                          <li><a href="datatable-ext-row-reorder.html">Row Reorder</a></li>
                          <li><a href="datatable-ext-scroller.html">Scroller</a></li>
                        </ul>
                      </li>
                      <li><a href="jsgrid-table.html">Js Grid Table</a></li>
                    </ul>
                  </li>
                  <li class="dropdown"><a class="nav-link menu-title" href="#"><i data-feather="bar-chart"></i><span>Charts</span></a>
                    <ul class="nav-submenu menu-content">
                      <li><a href="chart-apex.html">Apex Chart</a></li>
                      <li><a href="chart-google.html">Google Chart</a></li>
                      <li><a href="chart-sparkline.html">Sparkline chart</a></li>
                      <li><a href="chart-flot.html">Flot Chart</a></li>
                      <li><a href="chart-knob.html">Knob Chart</a></li>
                      <li><a href="chart-morris.html">Morris Chart</a></li>
                      <li><a href="chartjs.html">Chatjs Chart</a></li>
                      <li><a href="chartist.html">Chartist Chart</a></li>
                      <li><a href="chart-peity.html">Peity Chart        </a></li>
                    </ul>
                  </li>
                  <li class="dropdown"><a class="nav-link menu-title" href="#"><i data-feather="grid"> </i><span>Pages</span></a>
                    <ul class="nav-submenu menu-content">
                      <li><a href="landing-page.html">Landing page</a></li>
                      <li><a href="sample-page.html">Sample page</a></li>
                      <li><a href="internationalization.html">Internationalization</a></li>
                    </ul>
                  </li>
                  <li class="dropdown"><a class="nav-link menu-title" href="#"><i data-feather="users"> </i><span>Apps</span></a>
                    <ul class="nav-submenu menu-content">
                      <li><a href="kanban.html">kanban Board</a></li>
                      <li><a href="file-manager.html">File manager</a></li>
                      <li><a class="submenu-title" href="#">Project<span class="sub-arrow"><i class="fa fa-chevron-right"></i></span></a>
                        <ul class="nav-sub-childmenu submenu-content">
                          <li><a href="projects.html">Project List</a></li>
                          <li><a href="projectcreate.html">Create new</a></li>
                        </ul>
                      </li>
                      <li><a href="bookmark.html">Bookmarks</a></li>
                      <li><a href="contacts.html">Contacts</a></li>
                      <li><a href="task.html">Tasks</a></li>
                      <li><a class="submenu-title" href="#">Maps<span class="sub-arrow"><i class="fa fa-chevron-right"></i></span></a>
                        <ul class="nav-sub-childmenu submenu-content">
                          <li><a href="map-js.html">Maps JS</a></li>
                          <li><a href="vector-map.html">Vector Maps     </a></li>
                        </ul>
                      </li>
                      <li><a class="submenu-title" href="#">Email<span class="sub-arrow"><i class="fa fa-chevron-right"></i></span></a>
                        <ul class="nav-sub-childmenu submenu-content">
                          <li><a href="email-application.html">Email App</a></li>
                          <li><a href="email-compose.html">Email Compose</a></li>
                        </ul>
                      </li>
                      <li><a class="submenu-title" href="#">Ecommerce<span class="sub-arrow"><i class="fa fa-chevron-right"></i></span></a>
                        <ul class="nav-sub-childmenu submenu-content">
                          <li><a href="product.html">Product</a></li>
                          <li><a href="product-page.html">Product page</a></li>
                          <li><a href="list-products.html">Product list</a></li>
                          <li><a href="payment-details.html">Payment Details</a></li>
                          <li><a href="order-history.html">Order History</a></li>
                          <li><a href="invoice-template.html">Invoice</a></li>
                          <li><a href="cart.html">Cart</a></li>
                          <li><a href="list-wish.html">Wishlist</a></li>
                          <li><a href="checkout.html">Checkout</a></li>
                          <li><a href="pricing.html">Pricing</a></li>
                        </ul>
                      </li>
                      <li><a class="submenu-title" href="#">Gallery</a>
                        <ul class="nav-sub-childmenu submenu-content">
                          <li><a href="gallery.html">Gallery Grid</a></li>
                          <li><a href="gallery-with-description.html">Gallery Grid Desc</a></li>
                          <li><a href="gallery-masonry.html">Masonry Gallery</a></li>
                          <li><a href="masonry-gallery-with-disc.html">Masonry with Desc</a></li>
                          <li><a href="gallery-hover.html">Hover Effects</a></li>
                        </ul>
                      </li>
                      <li><a class="submenu-title" href="#">Blog</a>
                        <ul class="nav-sub-childmenu submenu-content">
                          <li><a href="blog.html">Blog Details</a></li>
                          <li><a href="blog-single.html">Blog Single</a></li>
                          <li><a href="add-post.html">Add Post</a></li>
                        </ul>
                      </li>
                      <li><a class="submenu-title" href="#">Job Search</a>
                        <ul class="nav-sub-childmenu submenu-content">
                          <li><a href="job-cards-view.html">Cards view</a></li>
                          <li><a href="job-list-view.html">List View</a></li>
                          <li><a href="job-details.html">Job Details</a></li>
                          <li><a href="job-apply.html">Apply</a></li>
                        </ul>
                      </li>
                      <li><a class="submenu-title" href="#">Learning</a>
                        <ul class="nav-sub-childmenu submenu-content">
                          <li><a href="learning-list-view.html">Learning List</a></li>
                          <li><a href="learning-detailed.html">Detailed Course</a></li>
                        </ul>
                      </li>
                      <li><a class="submenu-title" href="#">Chat<span class="sub-arrow"><i class="fa fa-chevron-right"></i></span></a>
                        <ul class="nav-sub-childmenu submenu-content">
                          <li><a href="chat.html">Chat App</a></li>
                          <li><a href="chat-video.html">Video chat</a></li>
                        </ul>
                      </li>
                      <li><a class="submenu-title" href="#">Calender<span class="sub-arrow"><i class="fa fa-chevron-right"></i></span></a>
                        <ul class="nav-sub-childmenu submenu-content">
                          <li><a href="calendar-basic.html">Calender Basic</a></li>
                        </ul>
                      </li>
                      <li><a class="submenu-title" href="#">Users<span class="sub-arrow"><i class="fa fa-chevron-right"></i></span></a>
                        <ul class="nav-sub-childmenu submenu-content">
                          <li><a href="user-profile.html">Users Profile</a></li>
                          <li><a href="edit-profile.html">Users Edit</a></li>
                          <li><a href="user-cards.html">Users Cards</a></li>
                        </ul>
                      </li>
                      <li><a class="submenu-title" href="#">Editors<span class="sub-arrow"><i class="fa fa-chevron-right"></i></span></a>
                        <ul class="nav-sub-childmenu submenu-content">
                          <li><a href="summernote.html">Summer Note</a></li>
                          <li><a href="ckeditor.html">CK editor</a></li>
                          <li><a href="simple-MDE.html">MDE editor</a></li>
                          <li><a href="ace-code-editor.html">ACE code editor</a></li>
                        </ul>
                      </li>
                      <li><a href="social-app.html">Social App</a></li>
                      <li><a href="to-do.html">To-Do</a></li>
                      <li><a href="faq.html">FAQ</a></li>
                      <li><a href="knowledgebase.html">Knowledgebase</a></li>
                      <li><a href="support-ticket.html">Support Ticket</a></li>
                    </ul>
                  </li>
                  <li class="dropdown"><a class="nav-link menu-title link-nav" href="<?php echo base_url();?>/starter-kit/index.html" target="_blank"><i data-feather="anchor"></i><span>Starter kit</span></a></li>
                  <li class="mega-menu"><a class="nav-link menu-title" href="#"><i data-feather="layers"></i><span>Others</span></a>
                    <div class="mega-menu-container menu-content">
                      <div class="container">
                        <div class="row">
                          <div class="col mega-box">
                            <div class="link-section">
                              <div class="submenu-title">
                                <h5>Search Pages</h5>
                              </div>
                              <ul class="submenu-content opensubmegamenu">
                                <li><a href="search.html">Search Website</a></li>
                                <li><a href="search-images.html">Search Images</a></li>
                                <li><a href="search-video.html">Search Video</a></li>
                              </ul>
                            </div>
                          </div>
                          <div class="col mega-box">
                            <div class="link-section">
                              <div class="submenu-title">
                                <h5>Error Page</h5>
                              </div>
                              <ul class="submenu-content opensubmegamenu">
                                <li><a href="error-400.html">Error 400</a></li>
                                <li><a href="error-401.html">Error 401</a></li>
                                <li><a href="error-403.html">Error 403</a></li>
                                <li><a href="error-404.html">Error 404</a></li>
                                <li><a href="error-500.html">Error 500</a></li>
                                <li><a href="error-503.html">Error 503</a></li>
                              </ul>
                            </div>
                          </div>
                          <div class="col mega-box">
                            <div class="link-section">
                              <div class="submenu-title">
                                <h5> Authentication</h5>
                              </div>
                              <ul class="submenu-content opensubmegamenu">
                                <li><a href="login.html">Login Simple</a></li>
                                <li><a href="login-image.html">Login with Bg Image</a></li>
                                <li><a href="login-video.html">Login with Bg video</a></li>
                                <li><a href="signup.html">Register Simple</a></li>
                                <li><a href="signup-image.html">Register with Bg Image</a></li>
                                <li><a href="signup-video.html">Register with Bg video</a></li>
                                <li><a href="unlock.html">Unlock User</a></li>
                                <li><a href="forget-password.html">Forget Password</a></li>
                                <li><a href="reset-password.html">Reset Password</a></li>
                                <li><a href="maintenance.html">Maintenance</a></li>
                              </ul>
                            </div>
                          </div>
                          <div class="col mega-box">
                            <div class="link-section">
                              <div class="submenu-title">
                                <h5>Coming Soon</h5>
                              </div>
                              <ul class="submenu-content opensubmegamenu">
                                <li><a href="comingsoon.html">Coming Simple</a></li>
                                <li><a href="comingsoon-bg-video.html">Coming with Bg video</a></li>
                                <li><a href="comingsoon-bg-img.html">Coming with Bg Image</a></li>
                              </ul>
                            </div>
                          </div>
                          <div class="col mega-box">
                            <div class="link-section">
                              <div class="submenu-title">
                                <h5>Email templates</h5>
                              </div>
                              <ul class="submenu-content opensubmegamenu">
                                <li><a href="basic-template.html">Basic Email</a></li>
                                <li><a href="email-header.html">Basic With Header</a></li>
                                <li><a href="template-email.html">Ecomerce Template</a></li>
                                <li><a href="template-email-2.html">Email Template 2</a></li>
                                <li><a href="ecommerce-templates.html">Ecommerce Email</a></li>
                                <li><a href="email-order-success.html">Order Success</a></li>
                              </ul>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </li>
                </ul>
              </div>
              <div class="right-arrow" id="right-arrow"><i data-feather="arrow-right"></i></div>
            </div>
          </nav>
        </header>
        <!-- Page Sidebar Ends-->
        <div class="page-body">
          <div class="container-fluid">
            <div class="page-header">
              <div class="row">
                <div class="col-lg-6">
                  <h3>
                     Default</h3>
                  <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.html"><i data-feather="home"></i></a></li>
                    <li class="breadcrumb-item">Dashboard</li>
                    <li class="breadcrumb-item active">Default</li>
                  </ol>
                </div>
                <div class="col-lg-6">
                  <!-- Bookmark Start-->
                  <div class="bookmark pull-right">
                    <ul>
                      <li><a href="#" data-container="body" data-toggle="popover" data-placement="top" title="" data-original-title="Chat"><i data-feather="message-square"></i></a></li>
                      <li><a href="#" data-container="body" data-toggle="popover" data-placement="top" title="" data-original-title="Icons"><i data-feather="command"></i></a></li>
                      <li><a href="#" data-container="body" data-toggle="popover" data-placement="top" title="" data-original-title="Learning"><i data-feather="layers"></i></a></li>
                      <li><a href="#"><i class="bookmark-search" data-feather="star"></i></a>
                        <form class="form-inline search-form">
                          <div class="form-group form-control-search">
                            <input type="text" placeholder="Search..">
                          </div>
                        </form>
                      </li>
                    </ul>
                  </div>
                  <!-- Bookmark Ends-->
                </div>
              </div>
            </div>
          </div>
          <!-- Container-fluid starts-->
          <div class="container-fluid">
            <div class="row second-chart-list third-news-update">
              <div class="col-xl-4 col-lg-12 xl-50 morning-sec box-col-12">
                <div class="card o-hidden profile-greeting">
                  <div class="card-body">
                    <div class="media">
                      <div class="badge-groups w-100">
                        <div class="badge f-12"><i class="mr-1" data-feather="clock"></i><span id="txt"></span></div>
                        <div class="badge f-12"><i class="fa fa-spin fa-cog f-14"></i></div>
                      </div>
                    </div>
                    <div class="greeting-user text-center">
                      <div class="profile-vector"><img class="img-fluid" src="<?php echo base_url();?>/assets/images/dashboard/welcome.png" alt=""></div>
                      <h4 class="f-w-600"><span id="greeting">Good Morning</span> <span class="right-circle"><i class="fa fa-check-circle f-14 middle"></i></span></h4>
                      <p><span> You have done 57.6% more sales today. Check your new badge in your profile.</span></p>
                      <div class="whatsnew-btn"><a class="btn btn-primary">Whats New !</a></div>
                      <div class="left-icon"><i class="fa fa-bell"> </i></div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-xl-8 xl-100 dashboard-sec box-col-12">
                <div class="card earning-card">
                  <div class="card-body p-0">
                    <div class="row m-0">
                      <div class="col-xl-3 earning-content p-0">
                        <div class="row m-0 chart-left">
                          <div class="col-xl-12 p-0 left_side_earning">
                            <h5>Dashboard</h5>
                            <p class="font-roboto">Overview of last month</p>
                          </div>
                          <div class="col-xl-12 p-0 left_side_earning">
                            <h5>$4055.56 </h5>
                            <p class="font-roboto">This Month Earning</p>
                          </div>
                          <div class="col-xl-12 p-0 left_side_earning">
                            <h5>$1004.11</h5>
                            <p class="font-roboto">This Month Profit</p>
                          </div>
                          <div class="col-xl-12 p-0 left_side_earning">
                            <h5>90%</h5>
                            <p class="font-roboto">This Month Sale</p>
                          </div>
                          <div class="col-xl-12 p-0 left-btn"><a class="btn btn-gradient">Summary</a></div>
                        </div>
                      </div>
                      <div class="col-xl-9 p-0">
                        <div class="chart-right">
                          <div class="row m-0 p-tb">
                            <div class="col-xl-8 col-md-8 col-sm-8 col-12 p-0">
                              <div class="inner-top-left">
                                <ul class="d-flex list-unstyled">
                                  <li>Daily</li>
                                  <li class="active">Weekly</li>
                                  <li>Monthly</li>
                                  <li>Yearly</li>
                                </ul>
                              </div>
                            </div>
                            <div class="col-xl-4 col-md-4 col-sm-4 col-12 p-0 justify-content-end">
                              <div class="inner-top-right">
                                <ul class="d-flex list-unstyled justify-content-end">
                                  <li>Online</li>
                                  <li>Store</li>
                                </ul>
                              </div>
                            </div>
                          </div>
                          <div class="row">
                            <div class="col-xl-12">
                              <div class="card-body p-0">
                                <div class="current-sale-container">
                                  <div id="chart-currently"></div>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="row border-top m-0">
                          <div class="col-xl-4 pl-0 col-md-6 col-sm-6">
                            <div class="media p-0">
                              <div class="media-left"><i class="icofont icofont-crown"></i></div>
                              <div class="media-body">
                                <h6>Referral Earning</h6>
                                <p>$5,000.20</p>
                              </div>
                            </div>
                          </div>
                          <div class="col-xl-4 col-md-6 col-sm-6">
                            <div class="media p-0">
                              <div class="media-left bg-secondary"><i class="icofont icofont-heart-alt"></i></div>
                              <div class="media-body">
                                <h6>Cash Balance</h6>
                                <p>$2,657.21</p>
                              </div>
                            </div>
                          </div>
                          <div class="col-xl-4 col-md-12 pr-0">
                            <div class="media p-0">
                              <div class="media-left"><i class="icofont icofont-cur-dollar"></i></div>
                              <div class="media-body">
                                <h6>Sales forcasting</h6>
                                <p>$9,478.50     </p>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-xl-9 xl-100 chart_data_left box-col-12">
                <div class="card">
                  <div class="card-body p-0">
                    <div class="row m-0 chart-main">
                      <div class="col-xl-3 col-md-6 col-sm-6 p-0 box-col-6">
                        <div class="media align-items-center">
                          <div class="hospital-small-chart">
                            <div class="small-bar">
                              <div class="small-chart flot-chart-container"></div>
                            </div>
                          </div>
                          <div class="media-body">
                            <div class="right-chart-content">
                              <h4>1001</h4><span>purchase </span>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="col-xl-3 col-md-6 col-sm-6 p-0 box-col-6">
                        <div class="media align-items-center">
                          <div class="hospital-small-chart">
                            <div class="small-bar">
                              <div class="small-chart1 flot-chart-container"></div>
                            </div>
                          </div>
                          <div class="media-body">
                            <div class="right-chart-content">
                              <h4>1005</h4><span>Sales</span>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="col-xl-3 col-md-6 col-sm-6 p-0 box-col-6">
                        <div class="media align-items-center">
                          <div class="hospital-small-chart">
                            <div class="small-bar">
                              <div class="small-chart2 flot-chart-container"></div>
                            </div>
                          </div>
                          <div class="media-body">
                            <div class="right-chart-content">
                              <h4>100</h4><span>Sales return</span>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="col-xl-3 col-md-6 col-sm-6 p-0 box-col-6">
                        <div class="media border-none align-items-center">
                          <div class="hospital-small-chart">
                            <div class="small-bar">
                              <div class="small-chart3 flot-chart-container"></div>
                            </div>
                          </div>
                          <div class="media-body">
                            <div class="right-chart-content">
                              <h4>101</h4><span>Purchase ret</span>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-xl-3 xl-50 chart_data_right box-col-12">
                <div class="card">
                  <div class="card-body">
                    <div class="media align-items-center">
                      <div class="media-body right-chart-content">
                        <h4>$95,900<span class="new-box">Hot</span></h4><span>Purchase Order Value</span>
                      </div>
                      <div class="knob-block text-center">
                        <input class="knob1" data-width="10" data-height="70" data-thickness=".3" data-angleoffset="0" data-linecap="round" data-fgcolor="#7366ff" data-bgcolor="#eef5fb" value="60">
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-xl-3 xl-50 chart_data_right second d-none"> 
                <div class="card">
                  <div class="card-body">
                    <div class="media align-items-center">
                      <div class="media-body right-chart-content"> 
                        <h4>$95,000<span class="new-box">New</span></h4><span>Product Order Value</span>
                      </div>
                      <div class="knob-block text-center">
                        <input class="knob1" data-width="50" data-height="70" data-thickness=".3" data-fgcolor="#7366ff" data-linecap="round" data-angleoffset="0" value="60">
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-xl-4 xl-50 news box-col-6">
                <div class="card">
                  <div class="card-header">
                    <div class="header-top">
                      <h5 class="m-0">News & Update</h5>
                      <div class="card-header-right-icon">
                        <select class="button btn btn-primary">
                          <option>Today</option>
                          <option>Tomorrow</option>
                          <option>Yesterday</option>
                        </select>
                      </div>
                    </div>
                  </div>
                  <div class="card-body p-0">
                    <div class="news-update">
                      <h6>36% off For pixel lights Couslations Types.</h6><span>Lorem Ipsum is simply dummy...</span>
                    </div>
                    <div class="news-update">
                      <h6>We are produce new product this</h6><span> Lorem Ipsum is simply text of the printing... </span>
                    </div>
                    <div class="news-update">
                      <h6>50% off For COVID Couslations Types.</h6><span>Lorem Ipsum is simply dummy...</span>
                    </div>
                  </div>
                  <div class="card-footer">
                    <div class="bottom-btn"><a href="#">More...</a></div>
                  </div>
                </div>
              </div>
              <div class="col-xl-4 xl-50 appointment-sec box-col-6">
                <div class="row"> 
                  <div class="col-xl-12 appointment">
                    <div class="card">
                      <div class="card-header card-no-border">
                        <div class="header-top">
                          <h5 class="m-0">appointment</h5>
                          <div class="card-header-right-icon">
                            <select class="button btn btn-primary">
                              <option>Today</option>
                              <option>Tomorrow</option>
                              <option>Yesterday</option>
                            </select>
                          </div>
                        </div>
                      </div>
                      <div class="card-body pt-0">
                        <div class="appointment-table table-responsive">
                          <table class="table table-bordernone">
                            <tbody>
                              <tr>
                                <td><img class="img-fluid img-40 rounded-circle mb-3" src="<?php echo base_url();?>/assets/images/appointment/app-ent.jpg" alt="Image description">
                                  <div class="status-circle bg-primary"></div>
                                </td>
                                <td class="img-content-box"><span class="d-block">Venter Loren</span><span class="font-roboto">Now</span></td>
                                <td>
                                  <p class="m-0 font-primary">28 Sept</p>
                                </td>
                                <td class="text-right">
                                  <div class="button btn btn-primary">Done<i class="fa fa-check-circle ml-2"></i></div>
                                </td>
                              </tr>
                              <tr>
                                <td><img class="img-fluid img-40 rounded-circle" src="<?php echo base_url();?>/assets/images/appointment/app-ent.jpg" alt="Image description">
                                  <div class="status-circle bg-primary"></div>
                                </td>
                                <td class="img-content-box"><span class="d-block">John Loren</span><span class="font-roboto">11:00</span></td>
                                <td>
                                  <p class="m-0 font-primary">22 Sept</p>
                                </td>
                                <td class="text-right">
                                  <div class="button btn btn-danger">Pending<i class="fa fa-check-circle ml-2"></i></div>
                                </td>
                              </tr>
                            </tbody>
                          </table>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-xl-12 alert-sec">
                    <div class="card bg-img">
                      <div class="card-header">
                        <div class="header-top">
                          <h5 class="m-0">Alert  </h5>
                          <div class="dot-right-icon"><i class="fa fa-ellipsis-h"></i></div>
                        </div>
                      </div>
                      <div class="card-body">
                        <div class="body-bottom">
                          <h6>  10% off For drama lights Couslations...</h6><span class="font-roboto">Lorem Ipsum is simply dummy...It is a long established fact that a reader will be distracted by  </span>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-xl-4 xl-50 notification box-col-6">
                <div class="card">
                  <div class="card-header card-no-border">
                    <div class="header-top">
                      <h5 class="m-0">notification</h5>
                      <div class="card-header-right-icon">
                        <select class="button btn btn-primary">
                          <option>Today</option>
                          <option>Tomorrow</option>
                          <option>Yesterday</option>
                        </select>
                      </div>
                    </div>
                  </div>
                  <div class="card-body pt-0">
                    <div class="media">
                      <div class="media-body">
                        <p>20-04-2020 <span>10:10</span></p>
                        <h6>Updated Product<span class="dot-notification"></span></h6><span>Quisque a consequat ante sit amet magna...</span>
                      </div>
                    </div>
                    <div class="media">
                      <div class="media-body">
                        <p>20-04-2020<span class="pl-1">Today</span><span class="badge badge-secondary">New</span></p>
                        <h6>Tello just like your product<span class="dot-notification"></span></h6><span>Quisque a consequat ante sit amet magna... </span>
                      </div>
                    </div>
                    <div class="media">
                      <div class="media-body">
                        <div class="d-flex mb-3">
                          <div class="inner-img"><img class="img-fluid" src="<?php echo base_url();?>/assets/images/notification/1.jpg" alt="Product-1"></div>
                          <div class="inner-img"><img class="img-fluid" src="<?php echo base_url();?>/assets/images/notification/2.jpg" alt="Product-2"></div>
                        </div><span class="mt-3">Quisque a consequat ante sit amet magna...</span>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-xl-4 xl-50 appointment box-col-6">
                <div class="card">
                  <div class="card-header">
                    <div class="header-top">
                      <h5 class="m-0">Market Value</h5>
                      <div class="card-header-right-icon">
                        <select class="button btn btn-primary">
                          <option>Year</option>
                          <option>Month</option>
                          <option>Day</option>
                        </select>
                      </div>
                    </div>
                  </div>
                  <div class="card-Body">
                    <div class="radar-chart">
                      <div id="marketchart">       </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-xl-4 xl-100 chat-sec box-col-6">
                <div class="card chat-default">
                  <div class="card-header card-no-border">
                    <div class="media media-dashboard">
                      <div class="media-body"> 
                        <h5 class="mb-0">Chat</h5>
                      </div>
                      <div class="icon-box"><i class="fa fa-ellipsis-h"></i></div>
                    </div>
                  </div>
                  <div class="card-body chat-box">
                    <div class="chat">
                      <div class="media left-side-chat">
                        <div class="media-body d-flex">
                          <div class="img-profile"> <img class="img-fluid" src="<?php echo base_url();?>/assets/images/User.jpg" alt="Profile"></div>
                          <div class="main-chat">
                            <div class="message-main"><span class="mb-0">Hi deo, Please send me link.</span></div>
                            <div class="sub-message message-main"><span class="mb-0">Right Now</span></div>
                          </div>
                        </div>
                        <p class="f-w-400">7:28 PM</p>
                      </div>
                      <div class="media right-side-chat">
                        <p class="f-w-400">7:28 PM</p>
                        <div class="media-body text-right">
                          <div class="message-main pull-right"><span class="mb-0 text-left">How can do for you</span>
                            <div class="clearfix"></div>
                          </div>
                        </div>
                      </div>
                      <div class="media left-side-chat">
                        <div class="media-body d-flex">
                          <div class="img-profile"> <img class="img-fluid" src="<?php echo base_url();?>/assets/images/User.jpg" alt="Profile"></div>
                          <div class="main-chat">
                            <div class="sub-message message-main mt-0"><span>It's argenty</span></div>
                          </div>
                        </div>
                        <p class="f-w-400">7:28 PM</p>
                      </div>
                      <div class="media right-side-chat">
                        <div class="media-body text-right">
                          <div class="message-main pull-right"><span class="loader-span mb-0 text-left" id="wave"><span class="dot"></span><span class="dot"></span><span class="dot"></span></span></div>
                        </div>
                      </div>
                      <div class="input-group">
                        <input class="form-control" id="mail" type="text" placeholder="Type Your Message..." name="text">
                        <div class="send-msg"><i data-feather="send"></i></div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-xl-4 col-lg-12 xl-50 calendar-sec box-col-6">
                <div class="card gradient-primary o-hidden">
                  <div class="card-body">
                    <div class="setting-dot">
                      <div class="setting-bg-primary date-picker-setting position-set pull-right"><i class="fa fa-spin fa-cog"></i></div>
                    </div>
                    <div class="default-datepicker">
                      <div class="datepicker-here" data-language="en"></div>
                    </div><span class="default-dots-stay overview-dots full-width-dots"><span class="dots-group"><span class="dots dots1"></span><span class="dots dots2 dot-small"></span><span class="dots dots3 dot-small"></span><span class="dots dots4 dot-medium"></span><span class="dots dots5 dot-small"></span><span class="dots dots6 dot-small"></span><span class="dots dots7 dot-small-semi"></span><span class="dots dots8 dot-small-semi"></span><span class="dots dots9 dot-small">                </span></span></span>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- Container-fluid Ends-->
        </div>
        <!-- footer start-->
        <footer class="footer">
          <div class="container-fluid">
            <div class="row">
              <div class="col-md-6 footer-copyright">
                <p class="mb-0">Copyright 2018 © Cuba All rights reserved.</p>
              </div>
              <div class="col-md-6">
                <p class="pull-right mb-0">Hand crafted & made with <i class="fa fa-heart font-secondary"></i></p>
              </div>
            </div>
          </div>
        </footer>
      </div>
    </div>
    <!-- latest jquery-->
    <script src="<?php echo base_url();?>/assets/js/jquery-3.5.1.min.js"></script>
    <!-- Bootstrap js-->
    <script src="<?php echo base_url();?>/assets/js/bootstrap/popper.min.js"></script>
    <script src="<?php echo base_url();?>/assets/js/bootstrap/bootstrap.js"></script>
    <!-- feather icon js-->
    <script src="<?php echo base_url();?>/assets/js/icons/feather-icon/feather.min.js"></script>
    <script src="<?php echo base_url();?>/assets/js/icons/feather-icon/feather-icon.js"></script>
    <!-- Sidebar jquery-->
    <script src="<?php echo base_url();?>/assets/js/sidebar-menu.js"></script>
    <script src="<?php echo base_url();?>/assets/js/config.js"></script>
    <!-- Plugins JS start-->
    <script src="<?php echo base_url();?>/assets/js/chart/chartist/chartist.js"></script>
    <script src="<?php echo base_url();?>/assets/js/chart/chartist/chartist-plugin-tooltip.js"></script>
    <script src="<?php echo base_url();?>/assets/js/chart/knob/knob.min.js"></script>
    <script src="<?php echo base_url();?>/assets/js/chart/knob/knob-chart.js"></script>
    <script src="<?php echo base_url();?>/assets/js/chart/apex-chart/apex-chart.js"></script>
    <script src="<?php echo base_url();?>/assets/js/chart/apex-chart/stock-prices.js"></script>
    <script src="<?php echo base_url();?>/assets/js/notify/bootstrap-notify.min.js"></script>
    <script src="<?php echo base_url();?>/assets/js/dashboard/default.js"></script>
    <script src="<?php echo base_url();?>/assets/js/notify/index.js"></script>
    <script src="<?php echo base_url();?>/assets/js/datepicker/date-picker/datepicker.js"></script>
    <script src="<?php echo base_url();?>/assets/js/datepicker/date-picker/datepicker.en.js"></script>
    <script src="<?php echo base_url();?>/assets/js/datepicker/date-picker/datepicker.custom.js"></script>
    <script src="<?php echo base_url();?>/assets/js/tooltip-init.js"></script>
    <!-- Plugins JS Ends-->
    <!-- Theme js-->
    <script src="<?php echo base_url();?>/assets/js/script.js"></script>
    <script src="<?php echo base_url();?>/assets/js/theme-customizer/customizer.js"></script>
    <!-- login js-->
    <!-- Plugin used-->
  </body>
</html>