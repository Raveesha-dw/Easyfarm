<?php require APPROOT . '/views/inc/headerAdmin.php';?>

<!--Sidebar-->
<?php require APPROOT . '/views/inc/components/sidebars/admin_sidebar.php';?>

<main>
    <h2>Review & Verify Agri Instructor</h2>
    <span>Carefully review the information and documents for legitimacy before verifying the account.</span>
    <hr><br>

    <?php
        $agriInstructorDetails = $data[0];
    ?>

    <table>
        <tr>
            <th>Full Name</th>
            <td><?php echo $agriInstructorDetails->Name?></td>
        </tr>
        <tr>
            <th>Email</th>
            <td><?php echo $agriInstructorDetails->Email?></td>
        </tr>
        <tr>
            <th>Address</th>
            <td><?php echo $agriInstructorDetails->Address?></td>
        </tr>
        <tr>
            <th>City</th>
            <td><?php echo $agriInstructorDetails->City?></td>
        </tr>
        <tr>
            <th>Workplace</th>
            <td><?php echo $agriInstructorDetails->Workplace?></td>
        </tr>
        <tr>
            <th>Registered Date</th>
            <td><?php echo $agriInstructorDetails->RegisteredDate?></td>
        </tr>
        <tr>
            <th>National Identify Card</th>
            <td>
                <div class="blog-img">
                    <img src="data:image/jpeg;base64,<?php echo $agriInstructorDetails->NIC ?>" alt="NIC">
                </div>
            </td>
        </tr>
        <tr>
            <th>Workplace Identify Card</th>
            <td>
                <div class="blog-img">
                    <img src="data:image/jpeg;base64,<?php echo $agriInstructorDetails->PID ?>" alt="PID">
                </div>
            </td>
        </tr>
    </table>

    <br>
    <div class="btn-container">

        <!-- Reject Button -->
        <div class="btn-container">
            <form action="<?php echo URLROOT?>/Admin/reviewAgriInstructor" method="POST">
                <input type="hidden" name="id" value="<?php echo $agriInstructorDetails->U_Id?>">
                <input type="hidden" name="accStatus" value="Rejected">
                <button class="admin-table" type="submit">Reject</button>   
            </form>
        </div>

        <!-- Verify Button -->
        <div class="btn-container">
            <form action="<?php echo URLROOT?>/Admin/reviewAgriInstructor" method="POST">
                <input type="hidden" name="id" value="<?php echo $agriInstructorDetails->U_Id?>">
                <input type="hidden" name="accStatus" value="Verified">
                <button class="admin-table" type="submit">Verify</button>   
            </form>
        </div>
    </div>

</main>