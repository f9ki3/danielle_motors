<?php
include "../../database/database.php";

// Fetch cart items for the given transaction ID
$sql = "SELECT * FROM purchase_cart WHERE TransactionID = '$transactionID' AND status NOT IN ('1', '2', '3')";
$result = $conn->query($sql);

// Display the form with table
echo '<form id="refundForm" action="process_replacement.php" method="post">';
// Add the transactionID input field inside the form
echo '<input type="hidden" name="transactionID" value="' . $transactionID . '">'; // Add this line
echo '<input type="hidden" name="total_srp" value="' . $transactionDetails["Total"] . '">'; // Insert the hidden input field here
// echo '<table class="table">';
// echo '<thead>
//         <tr>
//             <th>Select</th>
//             <th>Product Name</th>
//             <th>Brand</th>
//             <th>Model</th>
//             <th>Quantity</th>
//             <th>Return Quantity</th>
//             <th>SRP</th>
//             <th>Refund Amount</th>
//             <th>Total Refund</th>
//             <th>Status</th>
//         </tr>
//       </thead>';
// echo '<tbody>';

// Check if any rows were returned
if ($result->num_rows > 0) {
    // Output data of each row
    while($row = $result->fetch_assoc()) {
        echo "<tr>";
        // Checkbox with onchange event to toggle quantity input field
        if ($row['status'] == 5) {
            echo "<td><input type='checkbox' name='product_checkbox[]' value='{$row['ProductID']}' style='max-width: 50px; height: 50px'></td>";
        } else {
            echo "<td></td>";
        }
        echo "<input type='hidden' name='product_id[]' value='{$row['ProductID']}'>";
        echo "<td>{$row['ProductName']}</td>";
        echo "<td>{$row['Brand']}</td>";
        echo "<td>{$row['Model']}</td>";
        echo "<td>{$row['Quantity']}</td>";
        // Styled input field for quantity return with max and min attributes to limit input
        echo "<td><input type='number' name='quantity_return[]' class='form-control quantity-return' min='0' max='{$row['Quantity']}' value='0' onchange='computeTotalRefund(this)'></td>";

        // Displaying the status column with interpretation
        $status_text = '';
        switch ($row['status']) {
            case 1: $status_text = 'Complete'; break;
            case 2: $status_text = 'Pending'; break;
            case 3: $status_text = 'Refund'; break;
            case 4: $status_text = 'Replaced'; break;
            case 5: $status_text = 'For Replacement'; break;
            default: $status_text = 'Unknown'; break;
        }
        echo "<td>{$status_text}</td>";
        echo "</tr>";
    }
} else {
    echo "<tr><td colspan='10'>No results</td></tr>";
}
echo '</tbody>';
echo '</table>';

// Include the reason input and additional hidden fields
echo '<input type="text" id="reason_input" name="reason" class="form-control mb-2 w-100" placeholder="Enter reason to return" required>';
echo '<input type="hidden" name="user_id" value="' . $user_id . '">';
echo '<input type="hidden" name="branch_code" value="' . $branch_code . '">';
echo '<input type="hidden" name="return_date" value="' . date('Y-m-d H:i:s') . '">';
echo '<input type="hidden" name="status" value="3">';
echo '</form>';
?>

<script>
 // JavaScript function to handle form submission
    function submitRefundForm(event) {
        event.preventDefault();
        
        // Retrieve values of input fields using JavaScript
        var reason = document.getElementById('reason_input').value;
        // var subtotal = document.getElementById('subtotal').innerText;
        // var refundAmount = document.getElementById('refund-amount').innerText;
        // var totalReflected = document.getElementById('total-reflected').innerText;
        
        // Now you can proceed to use these values as needed, such as displaying, validating, or submitting them
        
        // For demonstration purposes, you can alert the values
        // alert("reason: " + reason + "\nSubtotal: " + subtotal + "\nRefund Amount: " + refundAmount + "\nTotal Reflected: " + totalReflected);
        
        if (reason === '') {
            // Display SweetAlert warning for empty reason
            swal("Warning!", "Please enter a reason for the return.", "warning");
            return;
        }
        
        // Display SweetAlert confirmation before form submission
        swal({
            title: "Are you sure?",
            text: "Do you want to proceed with the return?",
            icon: "warning",
            buttons: true,
            dangerMode: true,
        }).then((willSubmit) => {
            if (willSubmit) {
                // If user confirms, submit refund form
                document.getElementById('refundForm').submit();
            }
        });
    }
    </script>