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
                <div class="table">
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
                            <tr>
                                <th>1</th>
                                <td>Mark</td>
                                <td>Otto</td>
                                <td>@mdo</td>
                                <td>
                                    <a href="#" class="btn btn-success"><i class="las la-edit"></i></a>
                                    <a href="#" class="btn btn-danger"><i class="las la-trash"></i></a>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal start -->
    @include('create')
    <!-- Modal end -->

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.4/jquery.min.js" integrity="sha512-DUC8yqWf7ez3JD1jszxCWSVB0DMP78eOyBpMa5aJki1bIRARykviOuImIczkxlj1KhVSyS16w2FSQetkD4UU2w==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    
    <script>
        // ajax code :

        $(document).ready(function(){
            $('#product_submit').on('click',function(){
                $name = $('#name').val();
                $price = $('#price').val();
                $discount = $('#discount').val();
                 $.ajax({
                    type:'POST',
                    url:'{{ route('store') }}',
                    data:{
                        name:$name,
                        price:$price,
                        discount:$discount,
                        _token:'{{ csrf_token() }}'
                    },
                    dataType:'json',
                    success:function(data){
                        console.log(data)
                    }
                 })
            })
        })
    </script>



</body>

</html>
