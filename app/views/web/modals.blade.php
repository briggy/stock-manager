<div id="modal_details" class="modal hide fade">
  <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
    <h3>{Product Name}</h3>
  </div>
  <div class="modal-body">
    <p>{Product Detials}</p>
  </div>
  <div class="modal-footer">
    <a href="#modal_cart" data-toggle="modal" class="btn btn-primary">Add to Cart</a>
    <a href="#" class="btn" data-dismiss="modal" aria-hidden="true">Close</a>
  </div>
</div>



<div id="modal_cart" class="modal hide fade">
  <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
    <h3>My Cart</h3>
  </div>
  <div class="modal-body">
    <p class="content">No Items in your cart</p>
  </div>
  <div class="modal-footer">
    <a href="{{ url('web/checkout') }}" class="btn btn-primary disabled">Proceed to Checkout</a>
  </div>
</div>