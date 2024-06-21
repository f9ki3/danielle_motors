<?php
    // $page = $_GET['page'];
    // $limit = 10; // Number of items to fetch per page
    // $offset = ($page - 1) * $limit;
    
    $query = 'SELECT 
                    expenses.id,
                    expenses.description,
                    expenses.type,
                    expenses.amount,
                    expenses.publish_by,
                    expenses.date,
                    user.user_fname,
                    user.user_lname
                FROM expenses
                LEFT JOIN user ON user.id = expenses.publish_by
                ORDER BY expenses.id DESC';
    $stmt = $conn->prepare($query);
    $stmt->execute();
    $stmt->bind_result($expenses_id, $expenses_desc, $expenses_type, $expenses_amount, $expenses_publishby, $expense_date, $publisher_fname, $publisher_lname);
    while ($stmt->fetch()) {
        echo '<tr>
                <!--<td class="fs--1 align-middle">
                    <div class="form-check mb-0 fs-0">
                        <input class="form-check-input" type="checkbox"/>
                    </div>
                </td>-->
                <td class="expenses align-middle ps-4">'.$expenses_desc.'</td>
                <td class="expenses align-middle ps-4">'.$expenses_type.'</td>
                <td class="expenses align-middle ps-4">₱ '.$expenses_amount.'</td>
                <td class="price align-middle white-space-nowrap text-start ps-4"><span class="badge badge-phoenix badge-phoenix-primary">'.$expense_date.'</span></td>
                <td class="category align-middle white-space-nowrap ps-4 text-start"><span class="badge badge-phoenix badge-phoenix-secondary">'.$publisher_fname. ' ' . $publisher_lname . '</span></td>
                
            </tr>';
    }

    $stmt->close();
?>