<!DOCTYPE html>
<html lang="en">
<head>
    <title>User Signup</title>
    @vite('resources/css/app.css')
</head>
<body>
    <x-user-navbar></x-user-navbar>
    <div class="bg-gray-100 flex items-center justify-center min-h-screen">
        <div class="bg-white p-8 rounded-2xl shadow-lg w-full max-w-sm">
            <h2 class="text-2xl text-center text-gray-800 mb-6">User Signup</h2>
            @error('user')
                <div class="text-red-500">{{$message}}</div>
            @enderror
            <form action="/user-signup" method="post" class="space-y-4">
                @csrf
                <div>
                    <label for="" class="text-gray-600 mb-1">User Name<span class="text-red-500">*</span></label>
                    <input type="text" name="name" id="" placeholder="Enter User Name" class="w-full px-4 py-2 border border-gray-300 rounded-xl focus:outline-none" value="{{old('name')}}">
                    @error('name')
                    <div class="text-red-500">{{$message}}</div>
                    @enderror
                </div>
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
                <div>
                    <label for="" class="text-gray-600 mb-1">Confirm Password<span class="text-red-500">*</span></label>
                    <input type="password" name="password_confirmation" id="" placeholder="Enter Confirm Password" class="w-full px-4 py-2 border border-gray-300 rounded-xl focus:outline-none">
                    @error('confirm_password')
                    <div class="text-red-500">{{$message}}</div>
                    @enderror
                </div>
                <button type="submit" class="w-full px-4 py-2 bg-blue-500 rounded-xl text-white">Signup</button>
            </form>
        </div>
    </div>
</body>
</html>