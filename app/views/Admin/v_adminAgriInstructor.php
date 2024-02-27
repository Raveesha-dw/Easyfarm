<?php require APPROOT . '/views/inc/headerAdmin.php';?>

<!--Sidebar-->
<?php require APPROOT . '/views/inc/components/sidebars/admin_sidebar.php';?>

<main>
    <h2>Manage Agri Instructors</h2>
    <hr><br>

    <?php
        $agriInstructors = $data;
    ?>

    <!-- Show Agri Instructors -->
    <table>
        <tr>
            <th>Name</th>
            <th>Workplace</th>
            <th>Registered Date</th>
            <th>Action</th>
        </tr>

        <?php
            foreach ($agriInstructors as $agriInstructor):
        ?>
                <tr>
                    <td><?php echo $agriInstructor->Name?></td>
                    <td><?php echo $agriInstructor->Workplace?></td>
                    <td><?php echo date('Y-m-d', strtotime($agriInstructor->RegisteredDate));?></td>
                    <td>
                        <!-- Review Button -->
                        <div class="btn-container">
                            <form action="<?php echo URLROOT?>/Admin/reviewAgriInstructor" method="GET">
                                <input type="hidden" name="id" value="<?php echo $agriInstructor->U_Id?>">
                                <button class="admin-table" type="submit">Review</button>   
                            </form>
                        </div>
                    </td>
                </tr>
        <?php
            endforeach;
        ?>
    </table>
</main>