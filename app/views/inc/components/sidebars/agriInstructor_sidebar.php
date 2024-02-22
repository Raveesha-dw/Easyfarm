<!--Agri Instructor Dashboard Sidebar-->
<!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous"> -->
<div class="sidebar1 bg-dark vh-100">
    <!-- <div class="sidebar-title"> -->
        <h2 class="bg-primary p-4"><a class="text-light text-decoration-none" href="<?php echo URLROOT . '/AgriInstructor';?>">Dashboard</a></h2>
    <!-- </div> -->

    <div class="sidebar-menu1 menues p-4 mt-5">
        <div class="sidebar-menu-item1 menu">
            <a href="<?php echo URLROOT . '/AgriInstructor/createpost';?>" class="text-light text-decoration-none">Create New Post</a>
        </div>
        <div class="sidebar-menu-item1 menu mt-5">
            <a href="<?php echo URLROOT . '/AgriInstructor/manageposts';?>" class="text-light text-decoration-none">Manage Posts</a>  
        </div>
        <div class="sidebar-menu-item1 menu mt-5">
            <a href="<?php echo URLROOT . '/Blog';?>" class="text-light text-decoration-none">Go To Blog</a>  
        </div>
    </div>
</div>