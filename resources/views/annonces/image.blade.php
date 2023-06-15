<html>
<head>
  <title>Laravel 8 Uploading Image</title>
 
  <meta name="csrf-token" content="{{ csrf_token() }}">
 
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
 <style>
  .loader-container{
    width:100%;
    height:100vh;
    background-color: #000000;
    position:fixed;
    
  }
  .loader{
    margin-left:47%;
    margin-top:18%;
    width:100px;
    height:100px;
    border:5px solid;
    color:#ffffff;
    border-radius:50%;
    border-top-color:transparent;
    animation:loader 1.2s linear infinite;
  
  
  }
  @keyframes loader{
      to{
        transform:rotate(360deg);
      }
  
    }
      </style>
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
  
      <body>
        <div class="loader-container">
          <div class="loader"></div>
        </div>
        <script>
          $(window).on("load",function(){
            $(".loader-container").fadeOut(2000);
  
          });
          </script>
 
<div class="container mt-5">
 
  @if(session('status'))
    <div class="alert alert-success">
        {{ session('status') }}
    </div>
  @endif
 
  <div class="card">
 
    <div class="card-header text-center font-weight-bold">
      <h2>Choisir une photo pour le profile</h2>
    </div>
 
    <div class="card-body">
        <form method="POST" enctype="multipart/form-data" id="upload-image" action="{{ route('uploadPhoto') }}" >
        @csrf           
            <div class="row">
 
                <div class="col-md-12">
                    <div class="form-group">
                        <input type="file" name="image" placeholder="Choose image" id="image">
                    @error('image')
                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                    @enderror
                    </div>
                </div>
                   
                <div class="col-md-12">
                    <button type="submit" class="btn btn-primary" id="submit">Submit</button>
                </div>
            </div>     
        </form>
 
    </div>
 
  </div>
 
</div>  
</body>
</html>