<?php 

$material_transfer_sql = "SELECT id, material_invoice, material_date, material_cashier FROM material_transfer";
$material_transfer_res = $conn->query($material_transfer_sql);
if ($material_transfer_res->num_rows > 0) {
    while ($row = $material_transfer_res->fetch_assoc()) {
        $mt_id = $row['id'];
        $mt_invoice = $row['material_invoice'];
        $mt_date = $row['material_date'];
        // Assuming material_cashier is a column in material_transfer table
        $publish_by = $row['material_cashier'];

        $material_transaction_status_sql = "SELECT status FROM material_transaction WHERE material_invoice_id = '$mt_invoice' AND (status = 1 OR status = 2) LIMIT 1" ;
        $material_transaction_status_res = $conn->query($material_transaction_status_sql);

        if ($material_transaction_status_res->num_rows > 0) {
            $status_row = $material_transaction_status_res->fetch_assoc();
            $status = $status_row['status'];

            $badge_status = '<span class="badge badge-phoenix fs--2 badge-phoenix-primary"><span class="badge-label">Pending</span><span class="ms-1" data-feather="package" style="height:12.8px;width:12.8px;"></span></span>';
            

            
        } else {
            $material_transaction_status_3_sql = "SELECT status FROM material_transaction WHERE material_invoice_id = '$mt_invoice' AND status = 3 LIMIT 1" ;
            $material_transaction_status_3_res = $conn->query($material_transaction_status_3_sql);
            if($material_transaction_status_3_res->num_rows>0){
                $badge_status = '<span class="badge badge-phoenix fs--2 badge-phoenix-success"><span class="badge-label">Verified</span><span class="ms-1" data-feather="package" style="height:12.8px;width:12.8px;"></span></span>';
            } else {
                $material_transaction_status_4_sql = "SELECT status FROM material_transaction WHERE material_invoice_id = '$mt_invoice' AND status = 4 LIMIT 1" ;
                $material_transaction_status_4_res = $conn->query($material_transaction_status_4_sql);
                if($material_transaction_status_4_res->num_rows>0){
                    $badge_status = '<span class="badge badge-phoenix fs--2 badge-phoenix-success"><span class="badge-label">Received</span><span class="ms-1" data-feather="package" style="height:12.8px;width:12.8px;"></span></span>';

                } else {
                    $material_transaction_status_5_sql = "SELECT status FROM material_transaction WHERE material_invoice_id = '$mt_invoice' AND status = 5 LIMIT 1" ;
                    $material_transaction_status_5_res = $conn->query($material_transaction_status_5_sql);
                    if($material_transaction_status_5_res->num_rows>0){
                        $badge_status = '<span class="badge badge-phoenix fs--2 badge-phoenix-danger"><span class="badge-label">Declined</span><span class="ms-1" data-feather="package" style="height:12.8px;width:12.8px;"></span></span>';

                    } else {
                        $badge_status = "dikoalam";
                    }
                }
            }
        }

        $final_status = $badge_status ; 
        echo '
            <tr class="position-static">
                <td class="align-middle">
                    <div class="form-check"><input class="form-check-input" type="checkbox" /></div>
                </td>
                <td class="align-middle white-space-nowrap py-0"></td>
                <td class="invoice text-start"><a class="fw-semi-bold line-clamp-3 mb-0" href="../Material_transaction/?transaction=' . $mt_invoice . '">' . $mt_invoice . '</a></td>
                <td class="status text-start">' . $final_status . '</td>
                <td class="date text-start">' . $mt_date . '</td>
                <td class="publishby review text-start">' . $publish_by . '</td>
                <td class="align-middle white-space-nowrap text-end pe-0 ps-4 btn-reveal-trigger">
                <div class="font-sans-serif btn-reveal-trigger position-static">
                    <button class="btn btn-sm dropdown-toggle dropdown-caret-none transition-none btn-reveal fs--2" type="button" data-bs-toggle="dropdown" data-boundary="window" aria-haspopup="true" aria-expanded="false" data-bs-reference="parent"><span class="fas fa-ellipsis-h fs--2"></span></button>
                    <div class="dropdown-menu dropdown-menu-end py-2">
                        <a class="dropdown-item" href="#!">View</a>
                        <a class="dropdown-item" href="#!">Export</a>
                    <div class="dropdown-divider"></div>
                        <a class="dropdown-item text-danger" href="#!">Remove</a>
                    </div>
                </div>
                </td>
            </tr>';
    }
}

