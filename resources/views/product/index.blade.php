<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Page</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="/css/product.css">
</head>
<body>
    @extends('/layouts/main')

    @push('css-dependencies')
    <link rel="stylesheet" type="text/css" href="/css/product.css" />
    @endpush

    @push('scripts-dependencies')
    <script src="/js/product.js" type="module"></script>
    @endpush

    @push('modals-dependencies')
    @include('/partials/product/product_detail_modal')
    @endpush

    @section('content')
    <!-- product -->
    <section id="product" class="pb-12">
        <div class="container mx-auto px-4">

            @if(session()->has('message'))
            {!! session("message") !!}
            @endif

            <h5 class="text-3xl font-bold text-center mb-8">Our Product</h5>
            @can('add_product',App\Models\Product::class)
            <div class="flex justify-end mb-6">
                <a href="/product/add_product" class="no-underline">
                    <div class="bg-blue-500 text-white px-4 py-2 rounded">Add Product</div>
                </a>
            </div>
            @else
            <div class="mb-8"></div>
            @endcan

            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6">
                @foreach($product as $row)
                <!-- Product card -->
                <div class="col-span-1">
                    <div class="relative group" onmouseenter="this.classList.add('hover')" onmouseleave="this.classList.remove('hover')">
                        <div class="transform transition-transform duration-500 group-hover:rotate-y-180">
                            <div class="frontside">
                                <div class="bg-white shadow-lg rounded-lg overflow-hidden">
                                    <div class="p-4 text-center">
                                        <img class="w-full h-48 object-cover" src="{{ asset('storage/' . $row->image) }}" alt="Product Name">
                                        <h4 class="text-xl font-bold mt-4">{{ $row->product_name }}</h4>
                                        <p class="text-gray-600">{{ $row->orientation }}</p>
                                        <button class="mt-4 bg-blue-500 text-white px-4 py-2 rounded">+</button>
                                    </div>
                                </div>
                            </div>
                            <div class="backside absolute top-0 left-0 w-full h-full transform rotate-y-180 opacity-0 group-hover:opacity-100 transition-opacity duration-500">
                                <div class="bg-white shadow-lg rounded-lg overflow-hidden h-full">
                                    <div class="p-4 text-center mt-8">
                                        <h4 class="text-xl font-bold">{{ $row->product_name }}</h4>
                                        <p class="text-gray-600">Lorem ipsum dolor sit amet consectetur adipisicing elit. Doloremque nam voluptas distinctio facere assumenda delectus.</p>

                                        <!-- detail -->
                                         <a href="/product/detail/{{ $row->id }}">
                                        <button \ class="mt-4 bg-blue-500 text-white px-4 py-2 rounded">Detail</button>
                                        </a>

                                        <!-- ulasan -->
                                        <a href="/review/product/{{ $row->id }}">
                                            <button class="mt-4 bg-blue-500 text-white px-4 py-2 rounded">Review</button>
                                        </a>

                                        <!-- [admin] ubah -->
                                        @can('edit_product',App\Models\Product::class)
                                        <a href="/product/edit_product/{{ $row->id }}">
                                            <button class="mt-4 bg-blue-500 text-white px-4 py-2 rounded">Edit</button>
                                        </a>
                                        @endcan
                                        @can('create_order',App\Models\Order::class)
                                        <a href="/order/make_order/{{ $row->id }}">
                                            <button class="mt-4 bg-blue-500 text-white px-4 py-2 rounded">Buy</button>
                                        </a>
                                        @endcan
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- ./product card -->
                @endforeach
            </div>
        </div>
    </section>
    <!-- product -->

    @endsection
</body>
</html>