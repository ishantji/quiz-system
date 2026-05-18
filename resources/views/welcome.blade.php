<!DOCTYPE html>
<html lang="en">
<head>
    <title>Admin Dashboard</title>
    @vite('resources/css/app.css')
</head>
<body>
    <x-user-navbar></x-user-navbar>
    <div class="flex flex-col min-h-screen items-center bg-gray-100">
        <h1 class="text-4xl font-bold text-green-900 p-5">Check Your Skills</h1>
        <div class="w-full max-w-md">
            <div class="relative">
                <input class="w-full px-4 py-3 text-gray-700 border border-gray-300 rounded-2xl shadow" type="text" name="" id="" placeholder="Search quiz...">
                <button class="absolute right-2 top-3">
                    <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#1f1f1f"><path d="M784-120 532-372q-30 24-69 38t-83 14q-109 0-184.5-75.5T120-580q0-109 75.5-184.5T380-840q109 0 184.5 75.5T640-580q0 44-14 83t-38 69l252 252-56 56ZM380-400q75 0 127.5-52.5T560-580q0-75-52.5-127.5T380-760q-75 0-127.5 52.5T200-580q0 75 52.5 127.5T380-400Z"/></svg>
                </button>
            </div>
        </div>
        <div class="w-200">
                <h1 class="text-2xl text-green-900 text-center my-5">Category List</h1>
                <ul class="border border-gray-200">
                    <li class="p-2 font-bold">
                        <ul class="flex justify-between">
                            <li class="w-30">S.NO</li>
                            <li class="w-70">Category</li>
                            <li class="w-30">Action</li>
                        </ul>
                    </li>
                    @foreach ($categories as $key => $category)
                    <li class="even:bg-gray-200 p-2">
                        <ul class="flex justify-between">
                            <li class="w-30">{{ $key+1 }}</li>
                            <li class="w-70">{{ $category->name }}</li>
                            <li class="w-30 flex">
                            <a href="/quiz-list/{{$category->id}}/{{$category->name}}"><svg xmlns="http://www.w3.org/2000/svg" height="20px" viewBox="0 -960 960 960" width="20px" fill="#1f1f1f"><path d="M607.5-372.5Q660-425 660-500t-52.5-127.5Q555-680 480-680t-127.5 52.5Q300-575 300-500t52.5 127.5Q405-320 480-320t127.5-52.5Zm-204-51Q372-455 372-500t31.5-76.5Q435-608 480-608t76.5 31.5Q588-545 588-500t-31.5 76.5Q525-392 480-392t-76.5-31.5ZM214-281.5Q94-363 40-500q54-137 174-218.5T480-800q146 0 266 81.5T920-500q-54 137-174 218.5T480-200q-146 0-266-81.5ZM480-500Zm207.5 160.5Q782-399 832-500q-50-101-144.5-160.5T480-720q-113 0-207.5 59.5T128-500q50 101 144.5 160.5T480-280q113 0 207.5-59.5Z"/></svg></a></li>
                        </ul>
                    </li>
                    @endforeach
                </ul>
            </div>
    </div>
    <x-footer-user></x-footer-user>
</body>
</html>