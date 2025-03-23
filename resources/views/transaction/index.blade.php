<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Transaction Page</title>
  <!-- Tailwind CSS CDN -->
  <script src="https://cdn.tailwindcss.com"></script>
  <!-- DataTables CSS -->
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css" />
  <!-- Font Awesome -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100">

@extends('/layouts/main')

@push('css-dependencies')
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css" />
@endpush

@push('scripts-dependencies')
<script src="/js/transaction.js"></script>
<script src="/js/transaction_table.js"></script>
<script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
@endpush

@section('content')
<main>
  <div class="container-fluid px-4 mt-4">

    <!-- Flash Message -->
    @if(session()->has('message'))
    <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded-lg mb-6">
      {{ session('message') }}
    </div>
    @endif

    <!-- Breadcrumb -->
    @include('/partials/breadcumb')

    <!-- Transaction Card -->
    <div class="bg-white rounded-lg shadow-lg overflow-hidden mb-6">
      <div class="p-6 border-b border-gray-200">
        <div class="flex items-center justify-between">
          <h2 class="text-xl font-semibold text-gray-800">
            <i class="fas fa-money-check-dollar text-blue-500 mr-2"></i>
            Transaction
          </h2>
          <a href="/transaction/add_outcome" title="add outcome" class="inline-block">
            <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
              <i class="fas fa-plus mr-2"></i>Add Outcome
            </button>
          </a>
        </div>
      </div>
      <div class="p-6">
        <table id="transaction_table" class="min-w-full table-auto">
          <thead class="bg-gray-50">
            <tr>
              <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Index</th>
              <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Title</th>
              <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Description</th>
              <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Income</th>
              <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Outcome</th>
              <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Created At</th>
              <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Updated At</th>
              <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Interface</th>
            </tr>
          </thead>
          <tbody class="bg-white divide-y divide-gray-200">
            @php
            $inc = 0
            @endphp
            @foreach ($transactions as $transaction)
            <tr>
              <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ ++$inc }}</td>
              <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $transaction->category->category_name }}</td>
              <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $transaction->description }}</td>
              <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $transaction->income ? $transaction->income : "----" }}</td>
              <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $transaction->outcome ? $transaction->outcome : "----" }}</td>
              <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $transaction->created_at->format('d-m-Y') }}</td>
              <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $transaction->updated_at->format('d-m-Y') }}</td>
              <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded button_edit_transaction" data-transactionId="{{ $transaction->id }}" data-isOutcome="{{ $transaction->outcome? '1' : '0' }}">
                  <i class="fas fa-edit"></i>
                </button>
              </td>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
  </div>
</main>
@endsection

</body>
</html>