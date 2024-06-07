<?php
include "../../admin/session.php";
include "../../database/database.php";
function generateUniqueFilename($extension) {
    do {
        // Generate a unique 16-digit filename
        $filename = md5(uniqid()) . '.' . $extension;
        // Check if the filename already exists in the uploads directory
    } while (file_exists('../../uploads/' . $filename));
    return $filename;
}

// Check if imageData is set and not empty
if (isset($_POST['imageData']) && !empty($_POST['imageData'])) {
    // Get the image data
    $imageData = $_POST['imageData'];

    // Remove the "data:image/jpeg;base64," or "data:image/png;base64," from the image data
    $imageData = preg_replace('/^data:image\/(png|jpeg);base64,/', '', $imageData);

    // Decode the image data
    $imageData = base64_decode($imageData);

    // Get the image type and determine the file extension
    $imageSize = getimagesize('data://image/jpeg;base64,' . base64_encode($imageData));
    if ($imageSize === false) {
        $imageSize = getimagesize('data://image/png;base64,' . base64_encode($imageData));
    }
    if ($imageSize !== false) {
        $extension = image_type_to_extension($imageSize[2], false); // Get the file extension based on the image type
        
        // Generate a unique filename
        $filename = generateUniqueFilename($extension);

        // Save the image to the uploads directory with the new filename
        file_put_contents('../../uploads/' . $filename, $imageData);
        
        $update_pfp = "UPDATE user SET user_img = '$filename' WHERE id = '$user_id'";
        $conn->query($update_pfp);

        $log_description = "Updated his/her profile photo.";
        $insert_into_logs = "INSERT INTO `audit` SET audit_user_id = '$id', audit_description = '$log_description', user_brn_code = '$branch_code', audit_date = '$currentTimestamp'";
        
        // Execute the insert query
        $conn->query($insert_into_logs);

        

        // Send a success response
        http_response_code(200);
        echo 'Image saved successfully';
    } else {
        // Send a failure response if the image type cannot be determined
        http_response_code(400);
        echo 'Failed to determine image type';
    }
} else {
    // Send a failure response if imageData is not provided
    http_response_code(400);
    echo 'Image data not provided';
}
?>
