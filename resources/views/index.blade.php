<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet"
        href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">
    <link rel="stylesheet" href="http://cdn.bootcss.com/toastr.js/latest/css/toastr.min.css">
    <title>Ajax Crud</title>
</head>

<body>

    <div class="container">
        <div class="row mt-5">
            <div class="col-lg-8 m-auto">
                <div class="table_header my-3">
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#showModal">
                        Add Product
                    </button>
                </div>
                <div class="table" id="dataTable">
                    <table class="table table-bordered table-striped">
                        <thead class="text-center">
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Name</th>
                                <th scope="col">Price</th>
                                <th scope="col">Discount</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody class="text-center">
                            @foreach ($products as $key => $product)
                                <tr>
                                    <th>{{ $product->id }}</th>
                                    <td>{{ $product->name }}</td>
                                    <td>{{ $product->price }}</td>
                                    <td>{{ $product->discount }}%</td>
                                    <td>
                                        <a href="#" class="btn btn-success update_btn" data-bs-toggle="modal"
                                            data-bs-target="#updateModal" data-id="{{ $product->id }}"
                                            data-name="{{ $product->name }}" data-price="{{ $product->price }}"
                                            data-discount="{{ $product->discount }}">
                                            <i class="las la-edit"></i>
                                        </a>
                                        <a href="#" class="btn btn-danger delete_btn"
                                            data-id="{{ $product->id }}"><i class="las la-trash"></i>
                                        </a>
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

    <!-- Modal start -->
    @include('create')
    @include('update')
    {!! Toastr::message() !!}
    <div class="container">

    </div>
    <!-- Modal end -->

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.4/jquery.min.js"
        integrity="sha512-DUC8yqWf7ez3JD1jszxCWSVB0DMP78eOyBpMa5aJki1bIRARykviOuImIczkxlj1KhVSyS16w2FSQetkD4UU2w=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="http://cdn.bootcss.com/toastr.js/latest/js/toastr.min.js"></script>

    <script>
        // ajax code :
        $(document).ready(function() {

            //Insert data by ajax:
            $('#product_submit').on('click', function() {
                $name = $('#name').val();
                $price = $('#price').val();
                $discount = $('#discount').val();
                $.ajax({
                    type: 'POST',
                    url: '{{ route('store') }}',
                    data: {
                        name: $name,
                        price: $price,
                        discount: $discount,
                        _token: '{{ csrf_token() }}'
                    },
                    dataType: 'json',
                    success: function(data) {
                        if (data.status == 'success') {
                            $('#showModal').modal('hide')
                            $('#addProduct')[0].reset()
                            $('#dataTable').load(location.href + ' .table')
                            Command: toastr["success"]("Product Added Successfully", "Success")

                            toastr.options = {
                                "closeButton": true,
                                "debug": false,
                                "newestOnTop": false,
                                "progressBar": true,
                                "positionClass": "toast-top-right",
                                "preventDuplicates": false,
                                "onclick": null,
                                "showDuration": "300",
                                "hideDuration": "1000",
                                "timeOut": "5000",
                                "extendedTimeOut": "1000",
                                "showEasing": "swing",
                                "hideEasing": "linear",
                                "showMethod": "fadeIn",
                                "hideMethod": "fadeOut"
                            }

                        }

                    }
                })
            })

            // update product by ajax:
            $('.update_btn').on('click', function() {
                $update_id = $(this).data('id')
                $update_name = $(this).attr('data-name')
                $update_price = $(this).data('price')
                $update_discount = $(this).data('discount')

                $('#update_id').val($update_id)
                $('#update_name').val($update_name)
                $('#update_price').val($update_price)
                $('#update_discount').val($update_discount)
            })

            // update process:
            $('#update_product').on('click', function() {
                $update_id = $('#update_id').val();
                $update_name = $('#update_name').val();
                $update_price = $('#update_price').val();
                $update_discount = $('#update_discount').val();
                $.ajax({
                    type: 'POST',
                    url: '{{ route('update') }}',
                    data: {
                        update_id: $update_id,
                        update_name: $update_name,
                        update_price: $update_price,
                        update_discount: $update_discount,
                        _token: '{{ csrf_token() }}'
                    },
                    dataType: 'json',
                    success: function(data) {
                        if (data.status == 'success') {
                            $('#updateModal').modal('hide')
                            $('#dataTable').load(location.href + ' .table')
                            Command: toastr["success"]("Update successfull !!!", "Update")

                            toastr.options = {
                                "closeButton": true,
                                "debug": false,
                                "newestOnTop": false,
                                "progressBar": true,
                                "positionClass": "toast-top-right",
                                "preventDuplicates": false,
                                "onclick": null,
                                "showDuration": "300",
                                "hideDuration": "1000",
                                "timeOut": "5000",
                                "extendedTimeOut": "1000",
                                "showEasing": "swing",
                                "hideEasing": "linear",
                                "showMethod": "fadeIn",
                                "hideMethod": "fadeOut"
                            }
                        }

                    }
                })
            })

            // delete with ajax:
            $('.delete_btn').on('click', function() {
                $delete_id = $(this).data('id')
                if (confirm("Are you sure to delete ?") == true) {
                    $.ajax({
                        type: 'POST',
                        url: "{{ route('delete') }}",
                        dataType: 'json',
                        data: {
                            delete_id: $delete_id,
                            _token: "{{ csrf_token() }}",
                        },
                        success: function(data) {
                            if (data.status == 'success') {
                                $('#dataTable').load(location.href + ' .table')
                                Command: toastr["error"]("Deleted Successful.", "Delete")

                                toastr.options = {
                                    "closeButton": true,
                                    "debug": false,
                                    "newestOnTop": false,
                                    "progressBar": true,
                                    "positionClass": "toast-top-right",
                                    "preventDuplicates": false,
                                    "onclick": null,
                                    "showDuration": "300",
                                    "hideDuration": "1000",
                                    "timeOut": "5000",
                                    "extendedTimeOut": "1000",
                                    "showEasing": "swing",
                                    "hideEasing": "linear",
                                    "showMethod": "fadeIn",
                                    "hideMethod": "fadeOut"
                                }
                            }
                        }

                    })
                }

            })
        })
    </script>



</body>

</html>
