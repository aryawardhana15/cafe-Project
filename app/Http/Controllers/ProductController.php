<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    public function index()
    {
        $title = "Product";
        $products = Product::all(); // Ubah variabel $product menjadi $products untuk konsistensi

        return view('/product/index', compact("title", "products"));
    }

    public function getProductData($id)
    {
        $product = Product::find($id);

        if ($product == null) {
            abort(404);
        }

        // Kirim data product ke view
        return view('/partials/product/product_detail_modal', compact("product"));
    }

    public function show($id)
    {
        // Ambil satu produk berdasarkan ID
        $product = Product::find($id);
    
        // Debugging: Cek apakah produk ditemukan
        if (!$product) {
            dd("Produk tidak ditemukan");
        }
    
        // Kirim data produk ke view
        return view('product.detail', compact('product'));
    }

    

    public function addProductGet()
    {
        $title = "Add Product";

        return view('/product/add_product', compact("title"));
    }

    public function addProductPost(Request $request)
    {
        $validatedData = $request->validate([
            "product_name" => "required|max:25",
            "stock" => "required|numeric|gt:0",
            "price" => "required|numeric|gt:0",
            "discount" => "required|numeric|gt:0|lt:100",
            "orientation" => "required",
            "description" => "required",
            "image" => "nullable|image|max:2048" // Ubah menjadi nullable agar tidak wajib diisi
        ]);

        // Jika gambar tidak diunggah, gunakan gambar default
        if (!$request->hasFile('image')) {
            $validatedData["image"] = env("IMAGE_PRODUCT", "default_product_image.jpg");
        } else {
            // Simpan gambar yang diunggah
            $validatedData["image"] = $request->file("image")->store("product");
        }

        try {
            Product::create($validatedData);
            $message = "Product has been added!";

            myFlasherBuilder(message: $message, success: true);

            return redirect('/product');
        } catch (\Illuminate\Database\QueryException $exception) {
            return abort(500);
        }
    }

    public function editProductGet(Product $product)
    {
        $data["title"] = "Edit Product";
        $data["product"] = $product;

        return view("/product/edit_product", $data);
    }

    public function editProductPost(Request $request, Product $product)
    {
        $rules = [
            'orientation' => 'required',
            'description' => 'required',
            'price' => 'required|numeric|gt:0',
            'stock' => 'required|numeric|gt:0',
            'discount' => 'required|numeric|gt:0|lt:100',
            'image' => 'nullable|image|file|max:2048' // Ubah menjadi nullable agar tidak wajib diisi
        ];

        // Validasi nama produk
        if ($product->product_name != $request->product_name) {
            $rules['product_name'] = 'required|max:25|unique:products,product_name';
        } else {
            $rules['product_name'] = 'required|max:25';
        }

        $validatedData = $request->validate($rules);

        try {
            // Jika ada gambar yang diunggah
            if ($request->hasFile('image')) {
                // Hapus gambar lama jika bukan gambar default
                if ($product->image != env("IMAGE_PRODUCT", "default_product_image.jpg")) {
                    Storage::delete($product->image);
                }

                // Simpan gambar baru
                $validatedData["image"] = $request->file("image")->store("product");
            }

            // Update data produk
            $product->fill($validatedData);

            // Simpan perubahan jika ada
            if ($product->isDirty()) {
                $product->save();

                $message = "Product has been updated!";
                myFlasherBuilder(message: $message, success: true);
                return redirect("/product");
            } else {
                $message = "Action <strong>failed</strong>, no changes detected!";
                myFlasherBuilder(message: $message, failed: true);
                return back();
            }
        } catch (\Illuminate\Database\QueryException $exception) {
            return abort(500);
        }
    }
}