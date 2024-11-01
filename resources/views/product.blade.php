<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
     <!-- ajax csrf token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel= "stylesheet" href= "https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css" >
    <title>Ajax Crud Operation</title>
  </head>
  <body>
       <div class="container">
        <div class="row">
            <div class="col-lg-2"></div>
            <div class="col-lg-8 my-4">
                <h2 class="text-center pb-2"> Laravel Ajax Crud Operation</h2>
                <a href="" class="btn btn-success my-3" data-bs-toggle="modal" data-bs-target="#addModal">Add Product</a>
                <div class="table-data">
                    <table class="table table-bordered">
                        <thead>
                          <tr>
                            <th scope="col">Sl</th>
                            <th scope="col">Name</th>
                            <th scope="col">Price</th>
                            <th scope="col">Action</th>
                          </tr>
                        </thead>
                        <tbody>
                            @foreach ( $products as $key=>$product)
                          <tr>
                            <th >{{ $key+1 }}</th>
                            <td>{{ $product->name }}</td>
                            <td>{{ $product->price }}</td>
                            <td>
                                <a
                                href=""
                                class="btn btn-success update_product_from"
                                data-bs-toggle="modal"
                                data-bs-target="#updateModal"
                                data-id="{{ $product->id }}"
                                data-name="{{ $product->name }}"
                                data-price="{{ $product->price }}"
                                >

                                <i class="las la-edit"></i></a>
                                <a href="" class="btn btn-danger"><i class="las la-times"></i></a>
                            </td>
                          </tr>
                          @endforeach
                        </tbody>
                      </table>
                      {!! $products->links() !!}
                </div>
            </div>
        </div>
       </div>
      @include('product_js')
      @include('product_add_model')
      @include('update_product')

</html>
