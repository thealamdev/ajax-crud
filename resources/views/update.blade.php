<div class="modal fade" id="updateModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form id="updateProduct">
                @csrf
                <input type="hidden" id="update_id">
                <div class="modal-body">
                    <div class="card">
                        <div class="card-body">

                            <div class="mb-3">
                                <label for="update_name" class="form-label">Product Name*</label>
                                <input type="text" class="form-control" name="update_name" id="update_name">
                                <div id="errorText" class="form-text">error</div>
                            </div>
                            <div class="mb-3">
                                <label for="update_price" class="form-label">Product Price*</label>
                                <input type="number" class="form-control" name="update_price" id="update_price">
                            </div>
                            <div class="mb-3">
                                <label for="update_discount" class="form-label">Product Discoutn*</label>
                                <input type="text" class="form-control" name="update_discount" id="update_discount">
                            </div>


                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" id="update_product" class="btn btn-primary">Update</button>
                </div>
            </form>
        </div>
    </div>
</div>
