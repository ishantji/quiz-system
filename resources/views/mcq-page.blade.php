<!DOCTYPE html>
<html lang="en">
<head>
    <title>MCQ Page</title>
    @vite('resources/css/app.css')
</head>
<body>
    <x-user-navbar></x-user-navbar>
    @if (session('category'))
    <div class="bg-green-800 text-white pl-5">
        {{ session('category') }}
    </div>
    @endif
    <div class="bg-gray-100 flex flex-col items-center min-h-screen pt-5">
        <h1 class="text-2xl text-center text-green-800 mb-6 font-bold">
            {{ $name }}
        </h1>
        <h2 class="text-2xl text-center text-green-800 mb-6 font-bold">
            Question No. 3
        </h2>
        <div class="mt-2 p-4 bg-white shadow-2xl rounded-xl w-140">
            <h3 class="text-green-900 font-bold text-xl mb-1">Q.1 What is Java?</h3>
            <form action="" method="get" class="space-y-4">
                <label for="option_1" class="flex border p-3 mt-2 rounded-2xl shadow-2xl cursor-pointer hover:bg-blue-50">
                    <input class="form-radio text-blue-500" type="radio" name="" id="option_1">
                    <span class="text-green-900 pl-2">Programming language</span>
                </label>
                <label for="option_2" class="flex border p-3 mt-2 rounded-2xl shadow-2xl cursor-pointer hover:bg-blue-50">
                    <input class="form-radio text-blue-500" type="radio" name="" id="option_2">
                    <span class="text-green-900 pl-2">Programming language</span>
                </label>
                <label for="option_3" class="flex border p-3 mt-2 rounded-2xl shadow-2xl cursor-pointer hover:bg-blue-50">
                    <input class="form-radio text-blue-500" type="radio" name="" id="option_3">
                    <span class="text-green-900 pl-2">Programming language</span>
                </label>
                <label for="option_4" class="flex border p-3 mt-2 rounded-2xl shadow-2xl cursor-pointer hover:bg-blue-50">
                    <input class="form-radio text-blue-500" type="radio" name="" id="option_4">
                    <span class="text-green-900 pl-2">Programming language</span>
                </label>
                <button type="submit" class="w-full px-4 py-2 bg-blue-500 rounded-xl text-white">Submit Answer and Next</button>
            </form>
        </div>
    </div>
        <x-footer-user></x-footer-user>
</body>
</html>