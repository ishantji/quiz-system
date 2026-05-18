<!DOCTYPE html>
<html lang="en">
<head>
    <title>Admin Categories</title>
    @vite('resources/css/app.css')
</head>
<body>
    <x-navbar name={{$name}}></x-navbar>
    @if (session('category'))
    <div class="bg-green-800 text-white pl-5">
        {{ session('category') }}
    </div>
    @endif
    <div class="bg-gray-100 flex flex-col items-center min-h-screen pt-5">
        <h2 class="text-2xl text-center text-gray-800 mb-6">Category Name : {{$category}} <a class="text-yellow-500 text-sm" href="/admin-categories">Back</a></h2>
            
            <div class="w-200">
                <ul class="border border-gray-200">
                    <li class="p-2 font-bold">
                        <ul class="flex justify-between">
                            <li class="w-30">Quiz Id</li>
                            <li class="w-100">Name</li>
                            <li class="w-70">Action</li>
                        </ul>
                    </li>
                    @foreach ($quizData as $item)
                    <li class="even:bg-gray-200 p-2">
                        <ul class="flex justify-between">
                            <li class="w-30">{{ $item->id }}</li>
                            <li class="w-100">{{ $item->name }}</li>
                            <li class="w-70 ">
                            <a href="/show-quiz/{{$item->id}}/{{$item->name}}"><svg xmlns="http://www.w3.org/2000/svg" height="20px" viewBox="0 -960 960 960" width="20px" fill="#1f1f1f"><path d="M607.5-372.5Q660-425 660-500t-52.5-127.5Q555-680 480-680t-127.5 52.5Q300-575 300-500t52.5 127.5Q405-320 480-320t127.5-52.5Zm-204-51Q372-455 372-500t31.5-76.5Q435-608 480-608t76.5 31.5Q588-545 588-500t-31.5 76.5Q525-392 480-392t-76.5-31.5ZM214-281.5Q94-363 40-500q54-137 174-218.5T480-800q146 0 266 81.5T920-500q-54 137-174 218.5T480-200q-146 0-266-81.5ZM480-500Zm207.5 160.5Q782-399 832-500q-50-101-144.5-160.5T480-720q-113 0-207.5 59.5T128-500q50 101 144.5 160.5T480-280q113 0 207.5-59.5Z"/></svg></a></li>
                        </ul>
                    </li>
                    @endforeach
                </ul>
            </div>
        </div>
</body>
</html>