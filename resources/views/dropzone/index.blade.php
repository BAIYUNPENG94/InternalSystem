@extends('layout')

<!DOCTYPE html>
<html>
<head>
    <title>Upload PDF File</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://unpkg.com/dropzone@6.0.0-beta.1/dist/dropzone-min.js"></script>
    <link href="https://unpkg.com/dropzone@6.0.0-beta.1/dist/dropzone.css" rel="stylesheet" type="text/css" />
</head>

@section('content')
<body>
    
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Drag and Drop with Dropzone JS</h3>
                </div>
                <div class="card-body">
                    <h4>Upload Multiple PDFs</h4>
                    <form action="{{ route('dropzone.store') }}" method="post" enctype="multipart/form-data" id="image-upload" class="dropzone">
                        @csrf
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
    
<script type="text/javascript">
  
    var dropzone = new Dropzone('#image-upload', {
        thumbnailWidth: 200,
        maxFilesize: 1,
        acceptedFiles: ".jpeg,.jpg,.png,.gif,.pdf",
    });
  
</script>  
</body>
@endsection

</html>