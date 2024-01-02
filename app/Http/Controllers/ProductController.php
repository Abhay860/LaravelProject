<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\Product;
class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all();
        return view('product');
    }

    public function create()
    {
        $products = Product::all();
        return view('create',compact('products'));
    }

    public function store(Request $request)
    {
        //validation form
        $validatedData = $request->validate([
            'name' => 'required',
            'image' => 'required|image', // Assuming 'image' is a file input for image upload
            'password' => 'required|string|min:8|regex:/^(?=.*[A-Z])(?=.*[a-z])(?=.*\d).+$/',
            'email' => 'required|email||unique:products',
            'description' => 'required|',
        ]);


        // Access individual validated fields
$name = $validatedData['name'];
$image = $validatedData['image'];
$password = $validatedData['password'];
$email = $validatedData['email'];
$description = $validatedData['description'];


        // dd($request->all());
        $imagename = time().'.'.$request->image->extension();
        $request->image->move(public_path('product'),$imagename);
        // dd($imagename);
        $product = new Product;
        $product->image = $imagename;
        $product->name = $request->name;
        $product->email = $request->email;
        $product->password = Hash::make($request->input('password'));
        $product->description = $request->description;
        $product->save();
        return redirect()->back()->with('success',"Your Registration form Successfully Submited!");
    }

    public function edit($id)
    {
        $product = Product::where('id',$id)->first();
        return view('edit',['product' => $product]);
    }

    public function update(Request $request ,$id){
        $validatedData = $request->validate([
            'name' => 'required',
            'image' => 'nullable|image', // Assuming 'image' is a file input for image upload
            'password' => 'required|string|min:8|regex:/^(?=.*[A-Z])(?=.*[a-z])(?=.*\d).+$/',
            'email' => 'required|email',
            'description' => 'required|',
        ]);


        // Access individual validated fields
        $name = $validatedData['name'];
        // $image = $validatedData['image'];
        $password = $validatedData['password'];
        $email = $validatedData['email'];
        $description = $validatedData['description'];

        $product = Product::where('id',$id)->first();
        if(isset($request->image))
        {
               $imagename = time().'.'.$request->image->extension();
               $request->image->move(public_path('product'),$imagename);
               $product->image = $imagename;
        }
         
        $product->name = $request->name;
        $product->email = $request->email;
        $product->password = Hash::make($request->input('password'));
        $product->description = $request->description;
        $product->save();
        return redirect()->back()->with('success',"Your Registration form Update Successfully!");
 
    }

    public function delete($id)
    {
        $product = Product::find($id);
    
        if (!$product) {
            return redirect()->back()->with('error', 'Product not found.');
        }
    
        $product->delete();
    
        return redirect()->back()->with('success', 'Product deleted successfully.');
    }
    
}
