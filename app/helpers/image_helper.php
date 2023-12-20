<?php
function uploadImage($img, $img_name, $location) {
    $target = PUBROOT.$location.$img_name;
    $target = str_replace('\\', '/', $target); // Replace backslash with forward slash

    return move_uploaded_file($img, $target);
}

function updateImage($old, $img, $img_name, $location) {
    unlink($old);

    $target = PUBROOT.$location.$img_name;
    $target = str_replace('\\', '/', $target); // Replace backslash with forward slash

    return move_uploaded_file($img, $target);
}
// function updateImage($old_tmp_name, $img_name, $location) {
//     // Get the path to the old image
//     $oldPath = PUBROOT . $location . basename($old_tmp_name);

//     // Unlink (delete) the old image if it exists
//     if (file_exists($oldPath)) {
//         unlink($oldPath);
//     }

//     // Get the destination path for the new image
//     $target = PUBROOT . $location . $img_name;
//     $target = str_replace('\\', '/', $target); // Replace backslash with forward slash

//     // Attempt to move the new image to the destination
//     return move_uploaded_file($old_tmp_name, $target);
// }






function deleteImage($img)
{
    if(unlink($img)) {
        return true;
    } else {
        return false;
    }
}

