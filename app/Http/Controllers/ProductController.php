<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Product;
use App\Models\ProductCategories;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('product.index', [
            'product_category' => ProductCategories::all(),
            'product' => DB::table('vwproduct')->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('product.create', [
            'product_category' => ProductCategories::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
    //     $pname = DB::table('vwproduct')->where('product_name', '=', $request->product_name)->value('product_name');
    //         if($pname) {
    //             return view('product.create', [
    //                 'status' => 'Duplikasi', 
    //                 'product_category' => ProductCategories::all(),
    //                 'product_name' => $request->product_name, 
    //                 'product_category_id' => $request->product_category_id,
    //                 'description' => $request->description
    //             ]);
    //         }else {
    //             $data = $request->only([
    //                 'product_name', 'product_category_id', 'stok_quantity','price', 'description'
    //             ]); 
    //             // $data['stok_quantity'] = $request->stok_quantity;
    //             $data['image1_url'] = $request->file('image1_url')->store('Product/Photos');

    //             if($request ->hasFile('image2_url')) {
    //                 $data['image2_url'] = $request->file('image2_url')->store('Product/Photos');
    //             }
    //             if($request ->hasFile('image3_url')) {
    //                 $data['image3_url'] = $request->file('image3_url')->store('Product/Photos'); 
    //             }
    //             if($request ->hasFile('image4_url')) {
    //                 $data['image4_url'] = $request->file('image4_url')->store('Product/Photos'); 
    //             }
    //             if($request ->hasFile('image5_url')) {
    //                 $data['image5_url'] = $request->file('image5_url')->store('Product/Photos'); 
    //             }
    //             Product::create($data);
    //             return view('product.index',[
    //                     'status' => 'simpan',
    //                     'pesan' => 'The new Product data with the name" ' .$request->product_name.' "has been sucesfully saved',
    //                     'product' => DB::table('vwproduct')->get()
    //                 ]);
    //     }
    // }


        $data = $request->validate([
            'product_category_id' => ['required'],
            'product_name' => ['required'],
            'description' => ['required'],
            'price' => ['required'],
            'stok_quantity' => ['required'],
            'image1_url' => 'required|image',
            'image2_url' => 'nullable|image',
            'image3_url' => 'nullable|image',
            'image4_url' => 'nullable|image',
            'image5_url' => 'nullable|image'
        ]);
        if($request->file('image1_url')) {
            $data['image1_url'] = $request->file('image1_url')->store('Photos');
        }
        if($request->file('image2_url')) {
            $data['image2_url'] = $request->file('image2_url')->store('Photos');
        }
        if($request->file('image3_url')) {
            $data['image3_url'] = $request->file('image3_url')->store('Photos');
        }
        if($request->file('image4_url')) {
            $data['image4_url'] = $request->file('image4_url')->store('Photos');
        }
        if($request->file('image5_url')) {
            $data['image5_url'] = $request->file('image5_url')->store('Photos');
        }
   

        Product::create($data);
        return redirect('/product')->with('success', 'New Product Data Created Successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
    //     $product = Product::findOrFail($id);

    //     return view('product.edit', [
    //         'product' => $product,
    //         'productCategories' => ProductCategories::all()
    //     ]);
    // }
        $product = Product::find($id);
        if (!$product) return redirect()->route('products.edit');
        return view('product.edit', [
            'product' => $product,
            'productCategories' => ProductCategories::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
    //       $request->validate([
    //     'product_name' => 'required|string|max:255',
    //     'product_category_id' => 'required|exists:product_categories,id',
    //     'price' => 'required|numeric|min:0',
    //     'stok_quantity' => 'nullable|numeric|min:0',
    //     'description' => 'required|string|max:500',
    //     'image1_url' => 'nullable|image|', // Adjust validation rules as needed
    //     'image2_url' => 'nullable|image|',
    //     'image3_url' => 'nullable|image|',
    //     'image4_url' => 'nullable|image|',
    //     'image5_url' => 'nullable|image|',
    // ]);

        // $product = Product::findOrFail($id);
        // $product->product_name = $request->input('product_name');
        // $product->product_category_id = $request->input('product_category_id');
        // $product->price = $request->input('price');
        // $product->stok_quantity = $request->input('stok_quantity');
        // $product->description = $request->input('description');

        // for ($i = 1; $i <= 5; $i++) {
        //     if ($request->hasFile('image' . $i . '_url')) {
        //         // Store the uploaded image
        //         $imagePath = $request->file('image' . $i . '_url')->store('Products/Photos');
        //         // Update the corresponding image_url property of the product
        //         $product->{'image' . $i . '_url'} = str_replace('public/', 'storage/', $imagePath);
        //     }
        // }

        // // Save the updated product
        // $product->save();

        // return redirect('/product')->with('success', 'Product Data Updated Successfully');

        $product = Product::find($id);
        $product->product_category_id = $request->product_category_id;
        $product->product_name = $request->product_name;
        $product->description = $request->description;
        $product->price = $request->price;
        $product->stok_quantity = $request->stok_quantity;
        $product->image1_url = $request->image1_url;
        $product->image2_url = $request->image2_url;
        $product->image3_url = $request->image3_url;
        $product->image4_url = $request->image4_url;
        $product->image5_url = $request->image5_url;
        $product->save();
        return redirect('/product')->with('success', 'Profile update successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function hapusPrdct(string $id)
    {
        $product = Product::find($id);
        $product->delete();
        return redirect('/product')->with('success', 'Profile successfully deleted!');
    }
}


