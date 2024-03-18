<?php
    $query = 'SELECT name, active FROM unit';
    $stmt = $conn->prepare($query);
    $stmt->execute();
    $stmt->bind_result($name, $status);
    while ($stmt->fetch()) {
        if ($status = 1) {
            $active = 'active';
        } else {
            $active = 'inactive';
        }
        echo '<tr>
                <td class="align-middle">
                    <div class="form-check"><input class="form-check-input" type="checkbox" /></div>
                </td>
                <td class="product align-middle ps-4">'.$name.'</td>
                <td class="tags align-middle text-center review pb-2 ps-3"><span class="badge badge-phoenix fs--2 badge-phoenix-success"><span class="badge-label">'.$active.'</span></span></td>
                <td class="align-middle white-space-nowrap text-end pe-0 ps-4 btn-reveal-trigger">
                    <div class="font-sans-serif btn-reveal-trigger position-static">
                        <button class="btn btn-sm dropdown-toggle dropdown-caret-none transition-none btn-reveal fs--2" type="button" data-bs-toggle="dropdown" data-boundary="window" aria-haspopup="true" aria-expanded="false" data-bs-reference="parent"><span class="fas fa-ellipsis-h fs--2"></span></button>
                        <div class="dropdown-menu dropdown-menu-end py-2">
                            <a class="dropdown-item" href="#!">Update</a>
                        <div class="dropdown-divider"></div>
                            <a class="dropdown-item text-danger" href="#!">Remove</a>
                        </div>
                    </div>
                </td>
            </tr>';
    }
    $stmt->close();
?>