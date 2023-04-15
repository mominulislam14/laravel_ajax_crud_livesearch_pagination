<!-- Modal -->
<div class="modal fade" id="updateModal" tabindex="-1" aria-labelledby="updateModalLabel" aria-hidden="true">
    <form action="" method="POST" id="updateProductForm">
        @csrf
        <input type="hidden" id="up_id"> 

        <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h1 class="modal-title fs-5" id="updateModalLabel">Update Product</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">

                <div class="errMsgContainer mb-3">

                </div>
                <div class="form-group">
                    <label for="name">Product Name</label>
                    <input type="text" class="form-control" name="up_name" id="up_name" placeholder="Product Name">
                </div>
                <div class="form-group mt-2">
                    <label for="name">Product Price</label>
                    <input type="text" class="form-control" name="up_price" id="up_price" placeholder="Product Price">
                </div>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary update_product">Update product</button>
              </div>
              
            </div>
          </div>
    </form>
  </div>