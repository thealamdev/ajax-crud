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
            {{-- <i class="las la-download"></i> --}}
            <div class="col-lg-8 m-auto">
                {{-- @include('download') --}}
                <div class="table" id="dataTable">
                    <table class="table table-bordered table-striped">
                        <thead class="text-center">
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Name</th>
                                <th scope="col">Price</th>
                                <th scope="col">Discount</th>
                                
                            </tr>
                        </thead>
                        <tbody class="text-center">
                           <tr>
                            <td>{{ $product->id }}</td>
                            <td>{{ $product->name }}</td>
                            <td>{{ $product->price }}</td>
                            <td>{{ $product->discount }}</td>
                        </tr>
                        </tbody>

                    </table>
                   
                </div>
            </div>
        </div>
    </div>

   