<?php require APPROOT . '/views/inc/components/navbars/home_nav.php'; ?>

<!--Agri Instructor Dashboard-->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
<div class="dashboard d-flex justify-content-between">

    <!--Sidebar-->
    <?php require APPROOT . '/views/inc/components/sidebars/agriInstructor_sidebarnew.php';?>

    <!--Post Table-->
    <div class="post-table w-100 p-5">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th style="width:50%;">Title</th>
                    <th style="width:20%;">Publication Date</th>
                    <th style="width:30%;">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    //print_r($data);
                    $posts = $data;
                    foreach ($posts as $post):
                ?>
                <tr>
                    <td><?php echo $post->title?></td>
                    <td><?php echo $post->date_published?></td>
                    <td>
                        <button class="btn-dashboard btn btn-info">View</button>
                        <form action="<?php echo URLROOT?>/AgriInstructor/editpost" method='POST'>
                            <input type="hidden" name="id" value="<?php echo $post->post_id?>">
                            <button type="submit" name="edit" class="btn-dashboard btn btn-warning">Edit</button>
                        </form>

                        <form action="<?php echo URLROOT?>/AgriInstructor/editpost" method='GET'>
                            <input type="hidden" name="id" value="<?php echo $post->post_id;?>">
                            <input type="submit" class="btn-read-more" value="Edit">
                        </form>

                        <button class="btn-dashboard btn btn-danger">Delete</button>
                    </td>
                </tr>
                <?php endforeach;?>

            </tbody>
        </table>
    </div>
</div>

<?php require APPROOT . '/views/inc/footer.php'; ?>  
