<div class="modal fade" id="showModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form id="addProduct">
                <div class="modal-body">
                    <div class="card">
                        <div class="card-body">

                            <div class="mb-3">
                                <label for="name" class="form-label">Product Name*</label>
                                <input type="text" class="form-control" name="name" id="name">
                                <div id="errorText" class="form-text">error</div>
                            </div>
                            <div class="mb-3">
                                <label for="price" class="form-label">Product Price*</label>
                                <input type="number" class="form-control" name="price" id="price">
                            </div>
                            <div class="mb-3">
                                <label for="discount" class="form-label">Product Discoutn*</label>
                                <input type="text" class="form-control" name="discount" id="discount">
                            </div>


                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" id="product_submit" class="btn btn-primary">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>
