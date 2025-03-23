<!-- resources/views/product/detail.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Detail</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">
    <!-- Header -->
    <header class="bg-white shadow">
        <div class="container mx-auto px-4 py-6">
            <h1 class="text-3xl font-bold text-gray-800">Our Product</h1>
        </div>
    </header>

    <!-- Product Detail Section -->
    <section class="container mx-auto px-4 py-8">
        <div class="bg-white shadow-lg rounded-lg overflow-hidden">
            <!-- Product Image -->
            <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->product_name }}" class="w-full h-64 object-cover">

            <!-- Product Content -->
            <div class="p-6">
                <!-- Product Name -->
                <h2 class="text-2xl font-bold text-gray-800 mb-4">{{ $product->product_name }}</h2>

                <!-- Product Orientation -->
                <p class="text-gray-600 mb-4">{{ $product->orientation }}</p>

                <!-- Product Description -->
                <div class="mb-4">
                    <h3 class="text-xl font-semibold text-gray-800 mb-2">Description</h3>
                    <p class="text-gray-700">{{ $product->description }}</p>
                </div>

                <!-- Divider -->
                <div class="border-t border-gray-200 my-4"></div>

                <!-- Product Details -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <!-- Product Price -->
                    <div>
                        <h3 class="text-xl font-semibold text-gray-800 mb-2">Price</h3>
                        <p class="text-gray-700">Rp {{ number_format($product->price, 0, ',', '.') }}</p>
                    </div>

                    <!-- Product Stock -->
                    <div>
                        <h3 class="text-xl font-semibold text-gray-800 mb-2">Stock</h3>
                        <p class="text-gray-700">{{ $product->stock }} items available</p>
                    </div>

                    <!-- Product Discount -->
                    <div>
                        <h3 class="text-xl font-semibold text-gray-800 mb-2">Discount</h3>
                        <p class="text-gray-700">{{ $product->discount }}%</p>
                    </div>

                    <!-- Product Expiry Date -->
                    <div>
                        <h3 class="text-xl font-semibold text-gray-800 mb-2">Expiry Date</h3>
                        <p class="text-gray-700">{{ $product->expiry_date }}</p>
                    </div>
                </div>

                <!-- Action Buttons -->
                <div class="mt-6 flex space-x-4">
                    <!-- Review Button -->
                    <a href="/review/product/{{ $product->id }}" class="bg-blue-500 text-white px-6 py-2 rounded-lg hover:bg-blue-600 transition duration-300">
                        Review
                    </a>

                    <!-- Buy Button -->
                    <a href="/order/make_order/{{ $product->id }}" class="bg-green-500 text-white px-6 py-2 rounded-lg hover:bg-green-600 transition duration-300">
                        Buy
                    </a>

                    <!-- Back Button -->
                    <a href="/product" class="bg-gray-500 text-white px-6 py-2 rounded-lg hover:bg-gray-600 transition duration-300">
                        Back to Product List
                    </a>
                </div>
            </div>
        </div>
    </section>
</body>
</html>