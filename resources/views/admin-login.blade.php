<!DOCTYPE html>
<html lang="en">
<head>
    <title>Admin Login</title>
    @vite('resources/css/app.css')
</head>
<body class="bg-gray-100 flex items-center justify-center min-h-screen">
    <div class="bg-white p-8 rounded-2xl shadow-lg w-full max-w-sm">
        <h2 class="text-2xl text-center text-gray-800 mb-6">Admin Login</h2>
        @error('user')
            <div class="text-red-500">{{$message}}</div>
        @enderror
        <form action="/admin-login" method="post" class="space-y-4">
            @csrf
            <div>
                <label for="" class="text-gray-600 mb-1">Admin Name<span class="text-red-500">*</span></label>
                <input type="text" name="name" id="" placeholder="Enter Admin Name" class="w-full px-4 py-2 border border-gray-300 rounded-xl focus:outline-none" value="{{old('name')}}">
                @error('name')
                <div class="text-red-500">{{$message}}</div>
                @enderror
            </div>
            <div>
                <label for="" class="text-gray-600 mb-1">Password<span class="text-red-500">*</span></label>
                <input type="password" name="password" id="" placeholder="Enter Admin Password" class="w-full px-4 py-2 border border-gray-300 rounded-xl focus:outline-none">
                @error('password')
                <div class="text-red-500">{{$message}}</div>
                @enderror
            </div>
            <button type="submit" class="w-full px-4 py-2 bg-blue-500 rounded-xl text-white">Login</button>
        </form>
    </div>
</body>
</html>