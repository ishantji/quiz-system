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
        {{session('category')}}
    </div>
    @endif
    <div class="bg-gray-100 flex flex-col items-center min-h-screen pt-5">
        <h1 class="text-2xl text-center text-green-800 mb-6 font-bold">
            {{$quizName}}
        </h1>
        <h2 class="text-2xl text-center text-green-800 mb-6 font-bold">
            Total Ques:{{Session('currentQuiz')['totalMcq']}}
        </h2>
        <h2 class="text-xl text-center text-green-800 mb-6 font-bold">
            Ques:{{Session('currentQuiz')['currentMcq'].'of'.Session('currentQuiz')['totalMcq']}}
        </h2>
        <div class="mt-2 p-4 bg-white shadow-2xl rounded-xl w-140">
            <h3 class="text-green-900 font-bold text-xl mb-1">{{$mcqData->question}}</h3>
            <form action="/submit-next/{{$mcqData->id}}" method="post" class="space-y-4">
                @csrf
                <input type="hidden" name="id" value="{{$mcqData->id}}">
                <label for="option_1" class="flex border p-3 mt-2 rounded-2xl shadow-2xl cursor-pointer hover:bg-blue-50">
                    <input class="form-radio text-blue-500" type="radio" name="option" id="option_1" value="a">
                    <span class="text-green-900 pl-2">{{$mcqData->a}}</span>
                </label>
                <label for="option_2" class="flex border p-3 mt-2 rounded-2xl shadow-2xl cursor-pointer hover:bg-blue-50">
                    <input class="form-radio text-blue-500" type="radio" name="option" id="option_2" value="b">
                    <span class="text-green-900 pl-2">{{$mcqData->b}}</span>
                </label>
                <label for="option_3" class="flex border p-3 mt-2 rounded-2xl shadow-2xl cursor-pointer hover:bg-blue-50">
                    <input class="form-radio text-blue-500" type="radio" name="option" id="option_3" value="c">
                    <span class="text-green-900 pl-2">{{$mcqData->c}}</span>
                </label>
                <label for="option_4" class="flex border p-3 mt-2 rounded-2xl shadow-2xl cursor-pointer hover:bg-blue-50">
                    <input class="form-radio text-blue-500" type="radio" name="option" id="option_4" value="d">
                    <span class="text-green-900 pl-2">{{$mcqData->d}}</span>
                </label>
                <button type="submit" class="w-full px-4 py-2 bg-blue-500 rounded-xl text-white">Submit Answer and Next</button>
            </form>
        </div>
    </div>
        <x-footer-user></x-footer-user>
</body>
</html>