<html lang="en">
<head>
    <title>Upload File</title>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">

</head>
<body>
<div class="container">

    <h1 class="jumbotron" style="text-align: center">Gallery </h1>

        <!– Forms for upload a image file–>

    <form method="post" action="{{url('imageUpload')}}" enctype="multipart/form-data">
        {{csrf_field()}}
        <h4 >Add New Image File </h4>
        <!– Show errors–>
        @if (count($errors) > 0)
            <div class="alert alert-danger">
                <strong>Whoops!</strong> There were some problems with your file.<br><br>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <div class="input-group control-group increment" style="width: 50%; margin-left: 30%;">
            <input  id="fileInput" type="file" name="image" class="form-control">

            <div class="input-group-btn">
                <input type="button" class="btn btn-success" value="Select" onfocus="document.getElementById('fileInput').type='file'" onclick="document.getElementById('fileInput').click();" />
                <button type="submit" class="btn btn-primary"  >Upload</button>
            </div>

        </div>
    </form>
</div>
<div class="container">
    <h4  >Existing Images </h4>
    <div class="row">
        <!– Show all image–>
        @foreach($photos as $photo)
            <div class="col-md-3">
                <div class="thumbnail">
                <img  class="img-rounded" src="{{ $photo }}"    style="height: 250px;width: 250px">
                </div>
            </div>
        @endforeach
    </div>
</div>

</body>
</html>
