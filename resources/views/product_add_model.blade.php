<!-- Button trigger modal -->


  <!-- Modal -->
  <div class="modal fade" id="addModal" tabindex="-1" aria-labelledby="addModalLabel" aria-hidden="true">
     <form action="{{ route('add.product') }}" method="post" id="addProduct">
        @csrf
        <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="addModalLabel">Add Product</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
                <div class="errMessage"></div>
                 <div class="form-group">
                    <label for="name" class="form-label">Name</label>
                    <input type="text" class="form-control" id="name" name="name" placeholder="Product Name">
                 </div>
                 <div class="form-group">
                    <label for="price" class="form-label">Price</label>
                    <input type="number" class="form-control" id="price" name="price" placeholder="Product Price">
                </div>
              </div>
              <div class="modal-footer">
                <button type="submit" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary add_product">Save product</button>
              </div>
            </div>
          </div>
     </form>
  </div>
