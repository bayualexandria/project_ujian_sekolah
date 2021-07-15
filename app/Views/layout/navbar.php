 <div class="login" data-flashlogin="<?= session()->getFlashdata('loginSuccess'); ?>"></div>
 <div class="flash-data" data-flashdata="<?= session()->getFlashdata('pesan'); ?>"></div>
 <nav class="navbar default-layout col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
     <div class="text-center navbar-brand-wrapper d-flex align-items-top justify-content-center">
         <a class="navbar-brand brand-logo" href="/">
             <img src="<?= base_url('assets/img/logo/logo.png'); ?>" alt="logo" style="width: 50px;" />
         </a>
         <a class="navbar-brand brand-logo-mini" href="/">
             <img src="<?= base_url('assets/img/logo/logo.png'); ?>" alt="logo" />
         </a>
     </div>
     <div class="navbar-menu-wrapper d-flex align-items-center">
         <ul class="navbar-nav">
             <li class="nav-item font-weight-semibold d-none d-lg-block">Help-Desk : 0981-21246</li>
         </ul>
         <ul class="navbar-nav ml-auto">
             <li class="nav-item dropdown ">
                 <a class="nav-link count-indicator dropdown-toggle" id="messageDropdown" href="#" data-toggle="dropdown" aria-expanded="false">
                     <i class="mdi mdi-bell-outline"></i>
                     <span class="count">7</span>
                 </a>
                 <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="messageDropdown">
                     <a class="dropdown-item py-3">
                         <p class="mb-0 font-weight-medium float-left">You have 7 unread mails </p>
                         <span class="badge badge-pill badge-primary float-right">View all</span>
                     </a>
                     <div class="dropdown-divider"></div>
                     <a class="dropdown-item preview-item">
                         <div class="preview-thumbnail">
                             <img src="" alt="image" class="img-sm profile-pic">
                         </div>
                         <div class="preview-item-content flex-grow py-2">
                             <p class="preview-subject ellipsis font-weight-medium text-dark">Marian Garner </p>
                             <p class="font-weight-light small-text"> The meeting is cancelled </p>
                         </div>
                     </a>
                     <a class="dropdown-item preview-item">
                         <div class="preview-thumbnail">
                             <img src="" alt="image" class="img-sm profile-pic">
                         </div>
                         <div class="preview-item-content flex-grow py-2">
                             <p class="preview-subject ellipsis font-weight-medium text-dark">David Grey </p>
                             <p class="font-weight-light small-text"> The meeting is cancelled </p>
                         </div>
                     </a>
                     <a class="dropdown-item preview-item">
                         <div class="preview-thumbnail">
                             <img src="" alt="image" class="img-sm profile-pic">
                         </div>
                         <div class="preview-item-content flex-grow py-2">
                             <p class="preview-subject ellipsis font-weight-medium text-dark">Travis Jenkins </p>
                             <p class="font-weight-light small-text"> The meeting is cancelled </p>
                         </div>
                     </a>
                 </div>
             </li>
             <li class="nav-item dropdown">
                 <a class="nav-link count-indicator dropdown-toggle" id="notificationDropdown" href="#" data-toggle="dropdown">
                     <i class="mdi mdi-email-outline"></i>
                     <span class="count bg-success">3</span>
                 </a>
                 <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list pb-0" aria-labelledby="notificationDropdown">
                     <a class="dropdown-item py-3 border-bottom">
                         <p class="mb-0 font-weight-medium float-left">You have 4 new notifications </p>
                         <span class="badge badge-pill badge-primary float-right">View all</span>
                     </a>
                     <a class="dropdown-item preview-item py-3">
                         <div class="preview-thumbnail">
                             <i class="mdi mdi-alert m-auto text-primary"></i>
                         </div>
                         <div class="preview-item-content">
                             <h6 class="preview-subject font-weight-normal text-dark mb-1">Application Error</h6>
                             <p class="font-weight-light small-text mb-0"> Just now </p>
                         </div>
                     </a>
                     <a class="dropdown-item preview-item py-3">
                         <div class="preview-thumbnail">
                             <i class="mdi mdi-settings m-auto text-primary"></i>
                         </div>
                         <div class="preview-item-content">
                             <h6 class="preview-subject font-weight-normal text-dark mb-1">Settings</h6>
                             <p class="font-weight-light small-text mb-0"> Private message </p>
                         </div>
                     </a>
                     <a class="dropdown-item preview-item py-3">
                         <div class="preview-thumbnail">
                             <i class="mdi mdi-airballoon m-auto text-primary"></i>
                         </div>
                         <div class="preview-item-content">
                             <h6 class="preview-subject font-weight-normal text-dark mb-1">New user registration</h6>
                             <p class="font-weight-light small-text mb-0"> 2 days ago </p>
                         </div>
                     </a>
                 </div>
             </li>
             <li class="nav-item dropdown d-xl-inline-block user-dropdown">
                 <a class="nav-link dropdown-toggle" id="UserDropdown" href="#" data-toggle="dropdown" aria-expanded="false">
                     <img class="img-xs rounded-circle" src="<?= base_url('assets/img/' . (session()->get('id_akses') == 2 ? "guru/" : (session()->get('id_akses') == 1 ? "admin/" : "siswa/")) . auth()->image); ?>" alt="Profile image"> </a>
                 <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="UserDropdown">
                     <div class="dropdown-header text-center">
                         <img class="img-md rounded-circle" src="<?= base_url('assets/img/' . (session()->get('id_akses') == 2 ? "guru/" : (session()->get('id_akses') == 1 ? "admin/" : "siswa/")) . auth()->image); ?>" alt="Profile image">
                         <p class="mb-1 mt-3 font-weight-semibold"><?= auth()->name; ?></p>
                         <p class="font-weight-light text-muted mb-0"><?= session()->get('email') ? auth()->email : (session()->get('nip') ? auth()->nip : auth()->nus); ?></p>
                     </div>
                     <a href="<?= base_url('profile'); ?>" class="dropdown-item">My Profile<i class="dropdown-item-icon ti-comment-alt"></i></a>
                     <a class="dropdown-item">Messages <span class="badge badge-pill badge-danger">1</span><i class="dropdown-item-icon ti-dashboard"></i></a>
                     <a class="dropdown-item">Activity<i class="dropdown-item-icon ti-location-arrow"></i></a>
                     <a href="<?= base_url('logout'); ?>" id="logout" class="dropdown-item">Sign Out<i class="dropdown-item-icon ti-power-off"></i></a>
                 </div>
             </li>
         </ul>
         <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
             <span class="mdi mdi-menu"></span>
         </button>
     </div>
     <div class="position-absolute top-0 right-0 p-3" style="z-index: 5; right: 0; top: 0;">
         <div id="liveToast" class="toast hide" role="alert" aria-live="assertive" aria-atomic="true" data-delay="5000">
             <div class="toast-header">
                 <img src="" class="rounded mr-2" alt="...">
                 <strong class="mr-auto">Bootstrap</strong>
                 <small>11 mins ago</small>
                 <button type="button" class="ml-2 mb-1 close" data-dismiss="toast" aria-label="Close">
                     <span aria-hidden="true">&times;</span>
                 </button>
             </div>
             <div class="toast-body">
                 Hello, world! This is a toast message.
             </div>
         </div>
     </div>
 </nav>