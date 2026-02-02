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
    }
  </style>
    <title>Document</title>
</head>
<body>
     <div class="container">

      <div class="flex justify-between my-5">
          <h1 class="text-red-500 text-xl">Create</h1>
        <a href="/" class="bg-green-600 text-white rounded py-2 px-4">Back to Home</a>
      </div>
      <div>
        <form action="">
            <input type="text">
        </form>
      </div>
    </div>
         
</body>
</html>