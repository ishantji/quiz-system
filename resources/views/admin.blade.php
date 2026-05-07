<!DOCTYPE html>
<html lang="en">
<head>
    <title>Admin Dashboard</title>
    @vite('resources/css/app.css')
</head>
<body>
    <nav class="bg-white shadow-md px-4 py-3">
        <div class="flex justify-between items-center">
            <div class="text-2xl text-gray-700 hover:text-blue-400 cursor-pointer">
                Quiz System
            </div>
            <div class="space-x-4">
                <a class="text-gray-700 hover:text-blue-400" href="">Categories</a>
                <a class="text-gray-700 hover:text-blue-400" href="">Quiz</a>
                <a class="text-gray-700 hover:text-blue-400" href="">Welcome {{$name}}</a>
                <a class="text-gray-700 hover:text-blue-400" href="">Logout</a>
            </div>
        </div>
    </nav>
</body>
</html>