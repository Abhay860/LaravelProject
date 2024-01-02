<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Laravel CURD</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  </head>
  <body>
    @if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
   @endif

    <div class="container">
      <h2 class="text-center">Registration Form</h2>
      <div class="card mt-2 p-2">
   <div class="row justify-content-center">
    <div class="col-sm-8">   
    <form method="post" action="{{route('products.store')}}" enctype="multipart/form-data">
        @csrf
  <div class="mb-3">
    <label for="name" class="form-label">Full Name</label>
    <input type="name" class="form-control" id="name" name="name" aria-describedby="emailHelp" value="{{old('name')}}">
    @error('name')
    <span class="text-danger">{{ $message }}</span>
   @enderror
  </div>
  <div class="mb-3">
    <label for="email" class="form-label">Email Address</label>
    <input type="email" class="form-control" id="email" name="email" value="{{old('email')}}">
    @error('email')
    <span class="text-danger">{{ $message }}</span>
@enderror
  </div>
  <div class="mb-3">
    <label for="password" class="form-label">Password</label>
    <input type="password" class="form-control" id="password" name="password" value="{{old('password')}}">
    @error('password')
    <span class="text-danger">{{ $message }}</span>
@enderror
  </div>
  <div class="mb-3">
    <label for="file" class="form-label">Upload</label>
    <input type="file" class="form-control" id="file" name="image" value="{{old('image')}}" >
    @error('image')
    <span class="text-danger">{{ $message }}</span>
@enderror
  </div>
  <div class="mb-3">
    <label for="text" class="form-label">Description</label>
    <textarea class="form-control"  placeholder="Leave a comment here" id="floatingTextarea" name="description" > {{old('description')}}</textarea>
    @error('description')
    <span class="text-danger">{{ $message }}</span>
@enderror
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
</div>
</div>
</div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
  </body>
</html>