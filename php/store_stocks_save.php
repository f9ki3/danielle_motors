<?php
// Include the session file
include '../admin/session.php';

// Continue with the rest of your code
include '../config/config.php';

// Check if all required parameters are set
if (isset($_POST['materialDate'], $_POST['materialInvoiceNo'], $_POST['cashierName'], $_POST['receivedBy'], $_POST['user_brn_code'])) {

    // Retrieve data from the AJAX request
    $materialDate = mysqli_real_escape_string($conn, $_POST['materialDate']);
    $materialInvoiceNo = mysqli_real_escape_string($conn, $_POST['materialInvoiceNo']);
    $cashierName = mysqli_real_escape_string($conn, $_POST['cashierName']);
    $receivedBy = mysqli_real_escape_string($conn, $_POST['receivedBy']);
    $user_brn_code = mysqli_real_escape_string($conn, $_POST['user_brn_code']);

    // Validate and sanitize data if needed...

    // Insert data into the database
    $sql = "INSERT INTO material_transfer (material_date, material_invoice, material_cashier, material_recieved_by, branch_code) 
            VALUES ('$materialDate', '$materialInvoiceNo', '$cashierName', '$receivedBy', '$user_brn_code')";

    if (mysqli_query($conn, $sql)) {
        // Insert log
        $stmt_log = $conn->prepare("INSERT INTO audit (audit_user_id, audit_date, audit_action, audit_description, user_brn_code) VALUES (?, NOW(), 'Material Transaction', 'New Material Transaction has requested', ?)");
        $stmt_log->bind_param("is", $user_id, $branch_code);
        $stmt_log->execute();
        mysqli_stmt_close($stmt_log);

        echo "Data saved successfully!";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
} else {
    // Handle case where not all required parameters are set
    echo "Error: Missing required parameters.";
}

// Close connection
mysqli_close($conn);
?>
