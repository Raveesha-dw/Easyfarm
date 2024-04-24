<?php require APPROOT . '/views/inc/header.php'; ?>
<?php //require APPROOT . '/views/inc/headerBlog.php'; ?>

<link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>

<?php
function isActive($page){
   $currentUrl = $_SERVER['REQUEST_URI'];
   return strpos($currentUrl, $page) !== false ? 'active' : '';
}
?>

<?php //echo isActive('/AgriInstructor/createpost');?>

<nav>
    <!-- <div class="sidebar-top">
      <span class="shrink-btn">
        <i class='bx bx-chevron-left'></i>
      </span>
      <img src="" class="logo" alt="">
      <h3 class="hide" style="padding-left: 20px; font-size:xx-large;">EasyFarm</h3>
    </div>
    <br> -->

    <!-- <div class="search">
      <i class='bx bx-search'></i>
      <input type="text" class="hide" placeholder="Quick Search...">
    </div> -->

    <div class="sidebar-links">
      <ul>
        <div class="active-tab"></div>
        <li class="tooltip-element" data-tooltip="0">
          <a href="<?php echo URLROOT . '/AgriInstructor/manageposts';?>" data-active="0">
            <div class="icon">
              <i class='bx bx-file'></i>
              <i class='bx bxs-file'></i>
            </div>
            <span class="link hide">Manage Posts</span>
          </a>
        </li>
        <li class="tooltip-element" data-tooltip="1">
          <a href="<?php echo URLROOT . '/AgriInstructor/createpost';?>" class="active" data-active="1">
            <div class="icon">
              <i class='bx bx-pencil'></i>
              <i class='bx bxs-pencil'></i>
            </div>
            <span class="link hide">Write New Post</span>
          </a>
        </li>
        <!-- <li class="tooltip-element" data-tooltip="2">
          <a href="#" data-active="2">
            <div class="icon">
              <i class='bx bx-message-square-detail'></i>
              <i class='bx bxs-message-square-detail'></i>
            </div>
            <span class="link hide">Messages</span>
          </a>
        </li> -->
        <!-- <li class="tooltip-element" data-tooltip="3">
          <a href="#" data-active="3">
            <div class="icon">
              <i class='bx bx-bar-chart-square'></i>
              <i class='bx bxs-bar-chart-square'></i>
            </div>
            <span class="link hide">Analytics</span>
          </a>
        </li> -->
        <div class="tooltip">
          <span class="show">Manage Posts</span>
          <span>Write New Poste</span>
          <!-- <span>Messages</span> -->
          <!-- <span>Analytics</span> -->
        </div>
      </ul>

      <!-- <h4 class="hide">Shortcuts</h4> -->

      <!-- <ul>
        <li class="tooltip-element" data-tooltip="0">
          <a href="<?php echo URLROOT . '/Blog';?>" data-active="4">
            <div class="icon">
              <i class='bx bx-home'></i>
              <i class='bx bxs-home'></i>
            </div>
            <span class="link hide">Go To Blog</span>
          </a>
        </li> -->
        <!-- <li class="tooltip-element" data-tooltip="1">
          <a href="#" data-active="5">
            <div class="icon">
              <i class='bx bx-help-circle'></i>
              <i class='bx bxs-help-circle'></i>
            </div>
            <span class="link hide">Help</span>
          </a>
        </li> -->
        <!-- <li class="tooltip-element" data-tooltip="2">
          <a href="#" data-active="6">
            <div class="icon">
              <i class='bx bx-cog'></i>
              <i class='bx bxs-cog'></i>
            </div>
            <span class="link hide">Settings</span>
          </a>
        </li> -->
        <!-- <div class="tooltip">
          <span class="show">Go To Blog</span>
          <span>Help</span>
          <span>Settings</span>
        </div>
      </ul> -->
    </div>

    <div class="sidebar-footer">
      <a href="#" class="account tooltip-element" data-tooltip="0">
        <i class='bx bx-user'></i>
      </a>
      <div class="sidebar-links">
        <!-- <ul>
          <li class="tooltip-element" data-tooltip="0">
            <a href="<?php echo URLROOT . '/Users/logout';?>" data-active="4">
              <div class="icon">
                <i class='bx bx-log-out'></i>
                <i class='bx bxs-home'></i>
              </div>
              <span class="link hide">Logout</span>
            </a>
          </li>
        </ul> -->
      </div>
      <hr><br>
      <div class="admin-user tooltip-element" data-tooltip="1">
        <div class="admin-profile hide">
          <!-- <img src="./img/face-1.png" alt=""> -->
          <div class="admin-info">
            <h3><?php echo $_SESSION['user_name'] ;?></h3>
            <h5>Agri Instructor</h5>
          </div>
        </div>
        <a href="<?php echo URLROOT . '/Users/logout';?>" class="log-out">
          <i class='bx bx-log-out'></i>
        </a>
      </div>
      <!-- <div class="tooltip">
        <span class="show">John Doe</span>
        <span>Logout</span>
      </div> -->
    </div>
</nav>

<script src="<?php echo URLROOT . '/public/js/agriInstructorSidebar.js';?>"></script>
<!-- <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script> -->
<!-- <script>
    $(document).ready(function () {
        // Get the current URL
        var currentUrl = window.location.href;

        // Loop through each link in the sidebar
        $('.sidebar-links a').each(function () {
            var linkUrl = $(this).attr('href');

            // Check if the link URL is part of the current URL
            if (currentUrl.indexOf(linkUrl) !== -1) {
                // Add the 'active' class to the parent li element
                $(this).closest('li').addClass('active');
            }
        });
    });
</script> -->