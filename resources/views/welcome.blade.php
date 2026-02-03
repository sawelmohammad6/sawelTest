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
<body>
     <div class="container">

      <div class="flex justify-between my-5">
          <h1 class="bg-green-600 text-white rounded py-2 px-4">Home</h1>
        <a href="/create" class="bg-green-600 text-white rounded py-2 px-4">Add New Post</a>
      </div>
      @if(session('success'))
      <h2 class="text-green-600">{{ session('success') }}</h2>
      @endif
      <div>
<!-- Table -->
<div class="min-w-full">
  <div class="overflow-x-auto [&::-webkit-scrollbar]:h-2 [&::-webkit-scrollbar-thumb]:rounded-none [&::-webkit-scrollbar-track]:bg-scrollbar-track [&::-webkit-scrollbar-thumb]:bg-scrollbar-thumb">
    <table class="min-w-full divide-y divide-table-line">
      <thead>
        <tr>
          <th scope="col" class="px-6 py-3 text-start text-xs font-medium text-muted-foreground-1 uppercase">Id</th>
          <th scope="col" class="px-6 py-3 text-start text-xs font-medium text-muted-foreground-1 uppercase">Name</th>
          <th scope="col" class="px-6 py-3 text-start text-xs font-medium text-muted-foreground-1 uppercase">Description</th>
          <th scope="col" class="px-6 py-3 text-end text-xs font-medium text-muted-foreground-1 uppercase">Image</th>
          <th scope="col" class="px-6 py-3 text-end text-xs font-medium text-muted-foreground-1 uppercase">Action</th>
        </tr>
      </thead>
      <tbody>
  @foreach ($posts as $post)
    <tr class="odd:bg-layer even:bg-surface">
      <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-foreground">
        {{ $post->id }}
      </td>

      <td class="px-6 py-4 whitespace-nowrap text-sm text-foreground">
        {{ $post->name }}
      </td>

      <td class="px-6 py-4 whitespace-nowrap text-sm text-foreground">
        {{ $post->description }}
      </td>

      <td class="px-6 py-4 whitespace-nowrap text-sm text-foreground">
        @if($post->image)
          <img src="{{ asset('images/'.$post->image) }}" class="h-20 w-20">
        @else
          No Image
        @endif
      </td>

      <td class="px-6 py-4 whitespace-nowrap text-end text-sm font-medium">
       <a href="{{ route('edit', $post->id) }}" class="btn">Edit</a>
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