<!DOCTYPE html>
<html lang="en">
<head>
    <title>Admin Categories</title>
    @vite('resources/css/app.css')
</head>
<body>
    <x-navbar name={{$name}}></x-navbar>
        <div class="bg-gray-100 flex flex-col items-center min-h-screen pt-5">
        <div @class(['bg-white', 'p-8', 'rounded-2xl', 'shadow-lg', 'w-full', 'max-w-sm'])>
            @if (!session('quizDetails'))
            <h2 class="text-2xl text-center text-gray-800 mb-6">Add Quiz</h2>
            <form action="/add-quiz" method="get" class="space-y-4">
                <div>
                    <input type="text" name="quiz" id="" placeholder="Enter Quiz name" class="w-full px-4 py-2 border border-gray-300 rounded-xl focus:outline-none" value="{{old('quiz')}}">
                    @error('quiz')
                    <div class="text-red-500">{{$message}}</div>
                    @enderror
                </div>
                <div>
                    <select name="category_id" id="" class="w-full px-4 py-2 border border-gray-300 rounded-xl focus:outline-none" value="{{old('category')}}">
                    <option value="">-Select Category-</option>
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                    @error('category')
                    <div class="text-red-500">{{$message}}</div>
                    @enderror
                    </select>
                </div>
                <button type="submit" class="w-full px-4 py-2 bg-blue-500 rounded-xl text-white">Add</button>
            </form>
            @else
            <span class="text-green-500 font-bold">Quiz : {{session('quizDetails')->name}}</span>
             <h2 class="text-2xl text-center text-gray-800 mb-6">Add MCOs</h2>
             <form action="" method="get" class="space-y-4">
                <div>
                    <textarea name="question" id="" placeholder="Enter your question name" class="w-full px-4 py-2 border border-gray-300 rounded-xl focus:outline-none" value="{{old('question')}}"></textarea>
                    @error('question')
                    <div class="text-red-500">{{$message}}</div>
                    @enderror
                </div>
                <div>
                    <input type="text" name="quiz" id="" placeholder="Enter first option" class="w-full px-4 py-2 border border-gray-300 rounded-xl focus:outline-none" value="{{old('first')}}">
                    @error('first')
                    <div class="text-red-500">{{$message}}</div>
                    @enderror
                </div>
                <div>
                    <input type="text" name="quiz" id="" placeholder="Enter second option" class="w-full px-4 py-2 border border-gray-300 rounded-xl focus:outline-none" value="{{old('second')}}">
                    @error('second')
                    <div class="text-red-500">{{$message}}</div>
                    @enderror
                </div>
                <div>
                    <input type="text" name="quiz" id="" placeholder="Enter third option" class="w-full px-4 py-2 border border-gray-300 rounded-xl focus:outline-none" value="{{old('third')}}">
                    @error('third')
                    <div class="text-red-500">{{$message}}</div>
                    @enderror
                </div>
                <div>
                    <input type="text" name="quiz" id="" placeholder="Enter forth option" class="w-full px-4 py-2 border border-gray-300 rounded-xl focus:outline-none" value="{{old('forth')}}">
                    @error('forth')
                    <div class="text-red-500">{{$message}}</div>
                    @enderror
                </div>
                <div>
                    <select name="right_answer" class="w-full px-4 py-2 border border-gray-300 rounded-xl focus:outline-none" value="{{old('right_answer')}}">
                        <option value="">-Select Right Answer-</option>
                        <option value="a">A</option>
                        <option value="b">B</option>
                        <option value="c">C</option>
                        <option value="d">D</option>
                    </select>
                    @error('right_answer')
                    <div class="text-red-500">{{$message}}</div>
                    @enderror
                </div>
                <button type="submit" class="w-full px-4 py-2 bg-blue-500 rounded-xl text-white">Add More</button>
                <button type="submit" class="w-full px-4 py-2 bg-green-500 rounded-xl text-white">Add and Next</button>
             </form>
            @endif
        </div>
</body>
</html>