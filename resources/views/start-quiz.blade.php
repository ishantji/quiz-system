<!DOCTYPE html>
<html lang="en">
<head>
    <title>User Categories</title>
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
        <h1 class="text-4xl text-center text-green-800 mb-6 font-bold">
            {{$quizName}}
        </h1>
        <h2 class="text-lg text-center text-green-800 mb-6 font-bold">
            This Quiz contains {{$quizCount}} Questions and no limit to attempt this Quiz
        </h2>
        <h3 class="text-2xl text-center text-green-800 mb-6 font-bold">
            Good Luck
        </h3>
        <button type="submit" class="px-4 py-2 my-3 bg-blue-500 rounded-md text-white">Login/Signup for Start Quiz</button>

    </div>
        <x-footer-user></x-footer-user>
</body>
</html>