<!DOCTYPE html>
<html>
<head>
    <title>Import Data</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
     
<div class="container">
    <div class="card bg-light mt-3">
        <div class="card-header">
            Import Data Fasten
        </div>
        <div class="card-body">
            <form action="{{ route('fasten.import') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <input type="file" name="file" class="form-control">
                <br>
                <button class="btn btn-success">Apply</button>
            </form>
  
        
  
        </div>
    </div>

    <div class="card bg-light mt-3">
        <div class="card-header">
            Import Data Obt
        </div>
        <div class="card-body">
            <form action="{{ route('obat.import') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <input type="file" name="file" class="form-control">
                <br>
                <button class="btn btn-success">Apply</button>
            </form>
  
        
  
        </div>
    </div>

</div>
     
</body>
</html>
