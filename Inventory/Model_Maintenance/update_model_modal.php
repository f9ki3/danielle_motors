<form id="update-form">
    <!-- Modal -->
    <div class="modal fade" id="updateModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title" id="updateLabel"></h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="mb-3">
                <label for="inputField" class="form-label">Enter new model name</label>
                <input type="text" class="form-control" id="update_model" name="update_model">
                </div>
            </div>
            <div class="modal-footer">
                <input type="hidden" name="update_id" id="update_id">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary" id="submitButton">Submit</button>
            </div>
        </div>
        </div>
    </div>
</form>