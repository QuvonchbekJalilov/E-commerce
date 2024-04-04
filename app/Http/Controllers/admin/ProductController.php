<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Models\Category;
use App\Models\Specification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;





class ProductController extends Controller
{

    public function index()
    {
        $number = 1;
        $products = Product::sortable()->paginate(5);


        return view('admin.products.index', compact('products', 'number'));
    }


    public function create()
    {
        $categories = Category::all();

        return view('admin.products.create', compact('categories'));
    }


    public function store(StoreProductRequest $request)
    {

        $product = new Product();
        $product->user_id = auth()->user()->id;
        $product->name = $request['name'];
        $product->description = $request['description'];
        $product->category_id = $request['category'];
        $product->price = $request['price'];
        $product->stock = $request['stock'];
        $product->save();



        $combinedSpecifications = [];
        $specifications = $request->input('specifications');

        // Iterate over the specifications array
        for ($i = 0; $i < count($specifications); $i += 2) {
            // If both attribute_name and attribute_value are present
            if (isset($specifications[$i]['attribute_name']) && isset($specifications[$i + 1]['attribute_value'])) {
                // Add the combined specification to the combinedSpecifications array
                $combinedSpecifications[] = [
                    'attribute_name' => $specifications[$i]['attribute_name'],
                    'attribute_value' => $specifications[$i + 1]['attribute_value'],
                ];
            }
        }

        // Create Specification models for each combined specification
        foreach ($combinedSpecifications as $spec) {
            Specification::create([
                'product_id' => $product->id,
                'attribute_name' => $spec['attribute_name'],
                'attribute_value' => $spec['attribute_value']
            ]);
        }


        if ($request->hasFile('photos')) {
            foreach ($request->file('photos') as $photo) {
                $photoPath = $photo->store('product_photos');


                $originalFilename = $photo->getClientOriginalName();

                $product->photos()->create([
                    'photo' => $originalFilename,
                    'path' => $photoPath,
                ]);
            }
        }


        return redirect()->route('products.index')->with('success', 'Product created successfully');
    }


    public function show(Product $product)
    {
        $product = Product::find($product->id);

        return view('admin.products.show', compact('product'));
    }


    public function edit(Product $product)
    {
        $product = Product::find($product->id);
        $categories = Category::all();

        return view('admin.products.edit', compact('product', 'categories'));
    }


    public function update(Request $request, Product $product)
    {
        // Validate the incoming request data
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'category' => 'required|exists:categories,id',
            'price' => 'required|numeric|min:0',
            'stock' => 'required|integer|min:0',
        ]);

        // Update the product details
        $product->update([
            'name' => $validatedData['name'],
            'description' => $validatedData['description'],
            'category_id' => $validatedData['category'],
            'price' => $validatedData['price'],
            'stock' => $validatedData['stock'],
        ]);

        // Delete existing specifications related to the product
        $product->specifications()->delete();

        // Retrieve specifications from the request
        $specifications = $request->input('specifications', []);

        // Initialize an array to store combined specifications
        $combinedSpecifications = [];

        // Iterate over the specifications array
        for ($i = 0; $i < count($specifications); $i += 2) {
            // Check if both attribute_name and attribute_value are present
            if (isset($specifications[$i]['attribute_name']) && isset($specifications[$i + 1]['attribute_value'])) {
                // Add the combined specification to the combinedSpecifications array
                $combinedSpecifications[] = [
                    'attribute_name' => $specifications[$i]['attribute_name'],
                    'attribute_value' => $specifications[$i + 1]['attribute_value'],
                ];
            }
        }

        // Create Specification models for each combined specification
        foreach ($combinedSpecifications as $spec) {
            Specification::create([
                'product_id' => $product->id,
                'attribute_name' => $spec['attribute_name'],
                'attribute_value' => $spec['attribute_value']
            ]);
        }

        // Handle product photos
        if ($request->hasFile('photos')) {
            foreach ($product->photos as $photo) {
                Storage::delete($photo->path);
                $photo->delete();
            }
            foreach ($request->file('photos') as $photo) {
                $photoPath = $photo->store('product_photos');
                $originalFilename = $photo->getClientOriginalName();
                $product->photos()->create([
                    'photo' => $originalFilename,
                    'path' => $photoPath,
                ]);
            }
        }

        // Redirect back to the product index page with a success message
        return redirect()->route('products.index')->with('success', 'Product updated successfully');
    }





    public function destroy(Product $product)
    {
        // Delete product photos
        foreach ($product->photos as $photo) {
            Storage::delete($photo->path);
            $photo->delete();
        }

        // Delete product specifications
        $product->specifications()->delete();
        $product->delete();

        return redirect()->route('products.index')->with('success', 'Product deleted successfully');
    }
}
