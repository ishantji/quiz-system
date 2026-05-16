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
            @if(!session('quizDetails'))
            <h2 class="text-2xl text-center text-gray-800 mb-6">Add Quiz</h2>
            <form action="/add-quiz" method="get" class="space-y-4">
                <div>
                    <input type="text" name="quiz" required placeholder="Enter Quiz name" class="w-full px-4 py-2 border border-gray-300 rounded-xl focus:outline-none" value="{{old('quiz')}}">
                    @error('quiz')
                    <div class="text-red-500">{{$message}}</div>
                    @enderror
                </div>
                <div>
                    <select name="category_id" required class="w-full px-4 py-2 border border-gray-300 rounded-xl focus:outline-none" value="{{old('category')}}">
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
            <p class="text-green-500 font-bold">Total MCQ : {{ $totalMCQs }}
                @if($totalMCQs > 0)
                <a class="text-yellow-500 text-sm" href="/show-quiz/{{session('quizDetails')->id}}">Show MCQs</a>
                @endif
            </p>
             <h2 class="text-2xl text-center text-gray-800 mb-6">Add MCOs</h2>
             <form action="/add-mcq" method="post" class="space-y-4">
                @csrf
                <div>
                    <textarea name="question" placeholder="Enter your question name" class="w-full px-4 py-2 border border-gray-300 rounded-xl focus:outline-none">{{old('question')}}</textarea>
                    @error('question')
                    <div class="text-red-500">{{$message}}</div>
                    @enderror
                </div>
                <div>
                    <input type="text" name="a" placeholder="Enter first option" class="w-full px-4 py-2 border border-gray-300 rounded-xl focus:outline-none" value="{{old('a')}}">
                    @error('a')
                    <div class="text-red-500">{{$message}}</div>
                    @enderror
                </div>
                <div>
                    <input type="text" name="b" placeholder="Enter second option" class="w-full px-4 py-2 border border-gray-300 rounded-xl focus:outline-none" value="{{old('b')}}">
                    @error('b')
                    <div class="text-red-500">{{$message}}</div>
                    @enderror
                </div>
                <div>
                    <input type="text" name="c" placeholder="Enter third option" class="w-full px-4 py-2 border border-gray-300 rounded-xl focus:outline-none" value="{{old('c')}}">
                    @error('c')
                    <div class="text-red-500">{{$message}}</div>
                    @enderror
                </div>
                <div>
                    <input type="text" name="d" placeholder="Enter forth option" class="w-full px-4 py-2 border border-gray-300 rounded-xl focus:outline-none" value="{{old('d')}}">
                    @error('d')
                    <div class="text-red-500">{{$message}}</div>
                    @enderror
                </div>
                <div>
                    <select name="correct_ans" class="w-full px-4 py-2 border border-gray-300 rounded-xl focus:outline-none" value="{{old('correct_ans')}}">
                        <option value="">-Select Right Answer-</option>
                        <option value="a">A</option>
                        <option value="b">B</option>
                        <option value="c">C</option>
                        <option value="d">D</option>
                    </select>
                    @error('correct_ans')
                    <div class="text-red-500">{{$message}}</div>
                    @enderror
                </div>
                <button type="submit" name="submit" value="add_more" class="w-full px-4 py-2 bg-blue-500 rounded-xl text-white">Add More</button>
                <button type="submit" value="done" class="w-full px-4 py-2 bg-green-500 rounded-xl text-white">Add and Submit</button>
                <a class="w-full px-4 py-2 block text-center bg-red-500 rounded-xl text-white" href="/end-quiz">Finish Quiz</a>
             </form>
            @endif
        </div>
</body>
</html>