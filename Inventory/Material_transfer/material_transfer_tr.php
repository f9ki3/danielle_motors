<?php

$material_transfer_sql = "SELECT id, material_invoice, material_date, material_cashier FROM material_transfer ORDER BY id DESC";
$material_transfer_res = $conn->query($material_transfer_sql);

if ($material_transfer_res->num_rows > 0) {
    while ($row = $material_transfer_res->fetch_assoc()) {
        $mt_id = $row['id'];
        $mt_invoice = $row['material_invoice'];
        $mt_date = $row['material_date'];
        $publish_by = $row['material_cashier'];

        // Prepared statement for checking status
        $stmt = $conn->prepare("SELECT status FROM material_transaction WHERE material_invoice_id = ? AND status IN (1, 2, 3, 4, 5) LIMIT 1");
        $stmt->bind_param('s', $mt_invoice);
        $stmt->execute();
        $material_transaction_status_res = $stmt->get_result();

        $badge_status = "dikoalam"; // Default status
        $status = null; // Initialize status

        if ($material_transaction_status_res->num_rows > 0) {
            $status_row = $material_transaction_status_res->fetch_assoc();
            $status = $status_row['status'];

            switch ($status) {
                case 1:
                case 2:
                    $badge_status = '<span class="badge badge-phoenix fs--2 badge-phoenix-primary"><span class="badge-label">Pending</span><span class="ms-1" data-feather="package" style="height:12.8px;width:12.8px;"></span></span>';
                    break;
                case 3:
                    $badge_status = '<span class="badge badge-phoenix fs--2 badge-phoenix-success"><span class="badge-label">Verified</span><span class="ms-1" data-feather="package" style="height:12.8px;width:12.8px;"></span></span>';
                    break;
                case 4:
                    $badge_status = '<span class="badge badge-phoenix fs--2 badge-phoenix-success"><span class="badge-label">Received</span><span class="ms-1" data-feather="package" style="height:12.8px;width:12.8px;"></span></span>';
                    break;
                case 5:
                    $badge_status = '<span class="badge badge-phoenix fs--2 badge-phoenix-danger"><span class="badge-label">Declined</span><span class="ms-1" data-feather="package" style="height:12.8px;width:12.8px;"></span></span>';
                    break;
            }
        }

        if ($badge_status !== "dikoalam") {
            if ($status == 1) {
                echo '
                <tr class="position-static bg-light bg-gradient">
                    <td class="align-middle white-space-nowrap py-0"></td>
                    <td class="invoice text-start"><a class="fw-semi-bold line-clamp-3 mb-0" href="../Material_transaction/?transaction=' . $mt_invoice . '">' . $mt_invoice . ' <span class="badge bg-danger">unseen</span></a></td>
                    <td class="status text-start">' . $badge_status . '</td>
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
            } else {
                echo '
                <tr class="position-static">
                    <td class="align-middle white-space-nowrap py-0"></td>
                    <td class="invoice text-start"><a class="fw-semi-bold line-clamp-3 mb-0 text-dark" href="../Material_transaction/?transaction=' . $mt_invoice . '">' . $mt_invoice . '</a></td>
                    <td class="status text-start">' . $badge_status . '</td>
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
    }
}
?>
