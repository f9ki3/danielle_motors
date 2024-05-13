<?php 
    // SQL query to retrieve cart items for the given transaction ID
    $sql = "SELECT * FROM purchase_cart WHERE TransactionID = '$transactionID'";
    $result = $conn->query($sql);

    // Check if any rows were returned
    if ($result->num_rows > 0) {
            
        // Output data of each row
        while($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $row["ProductName"] . "</td>";
            echo "<td>" . $row["Brand"] . "</td>";
            echo "<td>" . $row["Model"] . "</td>";
            echo "<td>" . $row["Quantity"] . "</td>";
            echo "<td>" . $row["Unit"] . "</td>";
            echo "<td>" . $row["SRP"] . "</td>";
            echo "<td>" . $row["DiscountType"] . "</td>";
            echo "<td>" . $row["Discount"] . "</td>";
            echo "<td>₱ " . number_format($row["TotalAmount"], 2) . "</td>"; // Format TotalAmount as currency
            echo "</tr>";
        }
    } else {
        echo "0 results";
    }
        // Close the database connection
        $conn->close();
        ?>
    </div>
</body>
</html>
