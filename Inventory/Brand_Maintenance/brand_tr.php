<?php
    $query = 'SELECT id, date_added, brand_name, publish_by, status FROM brand ORDER BY id DESC';
    $stmt = $conn->prepare($query);
    $stmt->execute();
    $stmt->bind_result($brand_id, $date, $name, $author, $status);
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
                <td class="price white-space-nowrap text-start fw-bold text-700 ps-4 text-start">'.$author.'</td>
                <td class="category align-middle white-space-nowrap text-600 ps-4 fw-semi-bold">'.$date.'</td>
                <td class="tags align-middle text-center review pb-2 ps-3"><span class="badge badge-phoenix fs--2 badge-phoenix-success"><span class="badge-label">'.$active.'</span></span></td>
                <td class="align-middle white-space-nowrap text-end pe-0 ps-4 btn-reveal-trigger">
                    <div class="font-sans-serif btn-reveal-trigger position-static">
                        <button class="btn btn-sm dropdown-toggle dropdown-caret-none transition-none btn-reveal fs--2" type="button" data-bs-toggle="dropdown" data-boundary="window" aria-haspopup="true" aria-expanded="false" data-bs-reference="parent"><span class="fas fa-ellipsis-h fs--2"></span></button>
                        <div class="dropdown-menu dropdown-menu-end py-2">
                            <a class="dropdown-item" type="button" data-bs-toggle="modal" data-bs-target="#update_' . $brand_id  . '">Update</a>
                        <div class="dropdown-divider"></div>
                            <a class="dropdown-item text-danger" href="#!">Remove</a>
                        </div>
                    </div>
                </td>
            </tr>';

        echo '
        <div class="modal fade" id="update_' . $brand_id  . '" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-fullscreen-sm-down">
                <form action="../../PHP - process_files/update.php?brand=1" method="post">
                    <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Update Brand</h5><button class="btn p-1" type="button" data-bs-dismiss="modal" aria-label="Close"><span class="fas fa-times fs--1"></span></button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-lg-12">
                                <input class="form-control" type="text" name="brand_id" value="' . $brand_id . '" required hidden>
                                <div class="form-floating mb-3">
                                <input class="form-control" type="text" name="brand_name" value="' . $name . '" required>
                                <label for="brand_name">Brand Name</label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer"><button class="btn btn-primary" type="submit">Update</button><button class="btn btn-outline-primary" type="button" data-bs-dismiss="modal">Cancel</button></div>
                    </div>
                </form>
            </div>
        </div>
        ';
    }
    $stmt->close();
?>