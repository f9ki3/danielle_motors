        <?php 
        // SQL query to retrieve cart items for the given transaction ID
        $sql = "SELECT * FROM purchase_cart WHERE TransactionID = '$transactionID' AND status != '1' ";
        $result = $conn->query($sql);

        // Check if any rows were returned
        if ($result->num_rows > 0) {
            // Output data of each row
            while($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td><input type='checkbox' name='product_checkbox[]' style='max-width: 50px; height: 50px'></td>";
                echo "<td>" . $row["ProductName"] . "</td>";
                echo "<td>" . $row["Brand"] . "</td>";
                echo "<td>" . $row["Model"] . "</td>";
                echo "<td>" . $row["Quantity"] . "</td>";
                echo "<td>" . $row["Unit"] . "</td>";
                echo "<td>" . $row["SRP"] . "</td>";
                // Input field for refund amount
                echo "<td><input type='text' name='refund_amount[]'></td>";
                // Input field for quantity return
                echo "<td><input type='number' name='quantity_return[]'></td>";
                // Calculating total refund amount
                $total_refund = $row["SRP"] * $row["Quantity"];
                echo "<td>₱" . number_format($total_refund, 2) . "</td>";
                echo "</tr>";
            }
        } else {
            echo "0 results";
        }
        ?>
    </table>
</div>
