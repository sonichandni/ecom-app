
<div class="row mx-0">
    <div class="col-2 m-3" >
        <div class="add-product align-items-center border d-flex flex-column justify-content-center">
            <div class="icon_box">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><!--! Font Awesome Pro 6.2.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc. --><path d="M256 80c0-17.7-14.3-32-32-32s-32 14.3-32 32V224H48c-17.7 0-32 14.3-32 32s14.3 32 32 32H192V432c0 17.7 14.3 32 32 32s32-14.3 32-32V288H400c17.7 0 32-14.3 32-32s-14.3-32-32-32H256V80z"/></svg>
            </div>
            <p class="help_box-title">Add New Product</p>
        </div>
    </div>
    <div class="col-9 d-flex flex-wrap m-3">
        @if(!empty($products))
            @foreach ($products as $product)
                <div class="d-flex flex-column m-2 product-img">
                    @php
                        $image = (!empty($product->image)) ? asset('product_images/'.$product->image) : asset('images/No_image.svg');
                    @endphp
                    <img src="{{$image}}" width="100px" height="100px">
                    <p class="mb-0">{{$product->name}}</p>
                    <p class="prod-desc">{{$product->description}}</p>
                    @if(!empty($product->variant))
                    <div class="d-flex justify-content-between prod-var">
                        <div>
                            <p id="new_var_name">{{$product->variant->name}}</p>
                        </div>
                        <div class="d-flex">
                            <p class="mr-2" id="new_var_oprice">Rs. {{$product->variant->price}}</p>
                            <p class="text-decoration-line-through" id="new_var_price">Rs. {{$product->variant->offer_price}}</p>
                        </div>
                    </div>
                    @endif
                </div>
                
            @endforeach
        @endif
    </div>
</div>
<div class="modal fade" id="addProduct" tabindex="-1" role="dialog" aria-labelledby="addProductLabel" aria-hidden="true">
    <form action="{{url('/add-product')}}" method="POST" enctype="multipart/form-data">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addProductLabel">ADD PRODUCT</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    @csrf
                    <div class="form-group">
                        {{-- <label for="recipient-name" class="col-form-label">Product Name:</label> --}}
                        <input type="text" class="border-0 border-bottom border-opacity-50 border-secondary form-control rounded-0 shadow-none my-3" name="name" id="recipient-name" placeholder="Product Name">
                    </div>
                    <div class="form-group">
                        {{-- <label for="message-text" class="col-form-label">Product Description:</label> --}}
                        <textarea class="border-0 border-bottom border-opacity-50 border-secondary form-control rounded-0 shadow-none my-3" name="desc" id="message-text" placeholder="Product Description"></textarea>
                    </div>
                    <div class="form-group">
                        {{-- <label for="recipient-name" class="col-form-label">Upload Image:</label> --}}
                        <input type="file" class="border-0 border-bottom border-opacity-50 border-secondary form-control rounded-0 shadow-none my-3" name="img" id="recipient-name" placeholder="Upload Image">
                    </div>
                    <div class="mb-4 variant-section w-100 d-none">
                        <div class="border border-secondary d-flex justify-content-between rounded-5 w-100">
                            <div class="mt-3 mx-3 vart">
                                <p id="new_var_name">250 gm</p>
                            </div>
                            <div class="d-flex mt-3 mx-3 vprice-data">
                                <p class="mr-2" id="new_var_oprice">Rs. 50</p>
                                <p class="text-decoration-line-through" id="new_var_price">Rs. 75</p>
                            </div>
                        </div>
                    </div>
                    <span class="add-variant"><b>+</b> ADD VARIANT</span>
                    <input type="hidden" name="var_name" id="var_name">
                    <input type="hidden" name="var_price" id="var_price">
                    <input type="hidden" name="var_oprice" id="var_oprice">
                </div>
                <div class="justify-content-center modal-footer">
                    <button type="submit" class="btn btn-block btn-outline-secondary mb-3 rounded-5 w-75">SUBMIT</button>
                </div>
            </div>
        </div>
    </form>
</div>

<div class="modal fade" id="addVariant" tabindex="-1" role="dialog" aria-labelledby="addVariantLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addVariantLabel">ADD PRODUCT VARIANT</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                @csrf
                <div class="form-group">
                    {{-- <label for="recipient-name" class="col-form-label">Product Name:</label> --}}
                    <input type="text" class="border-0 border-bottom border-opacity-50 border-secondary form-control rounded-0 shadow-none my-3" id="vname" id="recipient-name" placeholder="Variant Name">
                </div>
                <div class="row">
                    <div class="form-group col-6">
                        {{-- <label for="recipient-name" class="col-form-label">Product Name:</label> --}}
                        <input type="text" class="border-0 border-bottom border-opacity-50 border-secondary form-control rounded-0 shadow-none my-3" id="vprice" id="recipient-name" placeholder="Price">
                    </div>
                    <div class="form-group col-6">
                        {{-- <label for="recipient-name" class="col-form-label">Product Name:</label> --}}
                        <input type="text" class="border-0 border-bottom border-opacity-50 border-secondary form-control rounded-0 shadow-none my-3" id="voprice" id="recipient-name" placeholder="Offer Price">
                    </div>
                </div>
            </div>
            <div class="justify-content-center modal-footer">
                <button type="button" class="btn btn-block btn-outline-secondary mb-3 rounded-5 w-75" id="submit_variant">SUBMIT</button>
            </div>
        </div>
    </div>
</div>