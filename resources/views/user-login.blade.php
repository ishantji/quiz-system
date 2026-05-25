<!DOCTYPE html>
<html lang="en">
<head>
    <title>User Login</title>
    @vite('resources/css/app.css')
</head>
<body>
    <x-user-navbar></x-user-navbar>
    <div class="bg-gray-100 flex items-center justify-center min-h-screen">
        <div class="bg-white p-8 rounded-2xl shadow-lg w-full max-w-sm">
            <h2 class="text-2xl text-center text-gray-800 mb-6">User Login</h2>
            @error('user')
                <div class="text-red-500">{{$message}}</div>
            @enderror
            <form action="/user-login" method="post" class="space-y-4">
                @csrf
                <div>
                    <label for="" class="text-gray-600 mb-1">User Email<span class="text-red-500">*</span></label>
                    <input type="email" name="email" id="" placeholder="Enter User Email" class="w-full px-4 py-2 border border-gray-300 rounded-xl focus:outline-none" value="{{old('email')}}">
                    @error('email')
                    <div class="text-red-500">{{$message}}</div>
                    @enderror
                </div>
                <div>
                    <label for="" class="text-gray-600 mb-1">Password<span class="text-red-500">*</span></label>
                    <input type="password" name="password" id="" placeholder="Enter User Password" class="w-full px-4 py-2 border border-gray-300 rounded-xl focus:outline-none">
                    @error('password')
                    <div class="text-red-500">{{$message}}</div>
                    @enderror
                </div>
                <button type="submit" class="w-full px-4 py-2 bg-blue-500 rounded-xl text-white">Login</button>
            </form>
        </div>
    </div>
    <x-footer-user></x-footer-user>
</body>
</html>