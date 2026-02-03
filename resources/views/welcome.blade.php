<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com?plugins=forms,typography,aspect-ratio,line-clamp,container-queries"></script>
    <style type="text/tailwindcss">
    @layer utilities {
      .container{
        @apply px-10 mx-auto
      }
      .btn{
        @apply bg-red-600 text-white rounded py-2 px-4
      }
    }
  </style>
    <title>Document</title>
</head>
<body class="bg-gray-100 min-h-screen">

     <div class="container max-w-6xl mx-auto py-8">

      <div class="flex justify-between my-5">
          <h1 class="bg-green-600 text-white rounded py-2 px-4">Home</h1>
        <a href="/create" class="bg-green-600 text-white rounded py-2 px-4">Add New Post</a>
      </div>
      @if(session('success'))
      <h2 class="text-green-600">{{ session('success') }}</h2>
      @endif
      <div>
<!-- Table -->
<div class="bg-white shadow rounded-lg overflow-hidden">
<table class="w-full">
  <thead class="bg-gray-100 text-gray-600 text-sm uppercase">
    <tr>
      <th class="px-6 py-3 text-left">ID</th>
      <th class="px-6 py-3 text-left">Name</th>
      <th class="px-6 py-3 text-left">Description</th>
      <th class="px-6 py-3 text-left">Image</th>
      <th class="px-6 py-3 text-right">Action</th>
    </tr>
  </thead>
<tbody class="divide-y">
@foreach ($posts as $post)
<tr class="hover:bg-gray-50 transition">
  <td class="px-6 py-4">{{ $post->id }}</td>

  <td class="px-6 py-4 font-medium text-gray-800">
    {{ $post->name }}
  </td>

  <td class="px-6 py-4 text-gray-600">
    {{ $post->description }}
  </td>

  <td class="px-6 py-4">
    @if($post->image)
      <img src="{{ asset('images/'.$post->image) }}"
           class="h-16 w-16 object-cover rounded border">
    @else
      <span class="text-gray-400 text-sm">No image</span>
    @endif
  </td>

  <td class="px-6 py-4 text-right space-x-2">
    <a href="{{ route('edit', $post->id) }}"
       class="px-3 py-1 bg-blue-500 text-white rounded hover:bg-blue-600">
       Edit
    </a>

    <form action="{{ route('delete', $post->id) }}"
          method="POST" class="inline">
      @csrf
      @method('DELETE')
      <button class="px-3 py-1 bg-red-500 text-white rounded hover:bg-red-600">
        Delete
      </button>
    </form>
  </td>
</tr>
@endforeach
</tbody>


    </table>
  </div>
</div>
<!-- End Table -->

      </div>
    </div>
         
</body>
</html>