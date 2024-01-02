<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Laravel CURD</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  </head>
  <body>
   <div class="container ">
    <div class="text-right">
        <a href="{{route('products.index')}}"><button  type="button" class=" my-3  btn btn-primary">Return Registration</button></a>
    </div>
    
    <table class="table table-striped-columns">
  <thead>
    <tr>
      <th scope="col">Sno.</th>
      <th scope="col">Name</th>
      <th scope="col">Email</th>
      <th scope="col">Image</th>
      <th scope="col">Description</th>
    </tr>
  </thead>
  <tbody>
    @foreach($products as $product)
    <tr>
        <td>{{ $product->id }}</td>
        <td>{{ $product->name }}</td>
        <td>{{ $product->email }}</td>
        <td><img src="{{ asset('product/' . $product->image) }}" alt="image" class="rounded-circle" width="50" height="50"/></td>
        <td>{{ $product->description }}</td>
        <td><a href="{{$product->id}}/edit" class="btn btn-dark btn-sm">Edit</a></td>
        <td>
          <form action="{{$product->id}}/delete" method="POST" class="d-inline">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger btn-sm">Delete</button>
          </form>
        </td>
    </tr>
    @endforeach 
  </tbody>
</table>

   </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
  </body>
</html>