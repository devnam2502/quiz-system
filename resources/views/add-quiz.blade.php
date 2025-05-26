<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Add Quiz Page</title>
    @vite('resources/css/app.css')
</head>
<body>
    <x-navbar  name={{$name}} ></x-navbar>

    <div class="bg-gray-100 flex flex-col items-center min-h-screen pt-5">
    @if(!session('quizDetails'))
<div class=" bg-white p-8 rounded-2xl  shadow-lg w-full max-w-md">
<h2 class="text-2xl text-center text-gray-800 mb-6 ">Add Quiz </h2>
<form action="/add-quiz" method="get" class="space-y-4">

    <div>
        <input type="text"placeholder="Enter Quiz name" required name="quiz"
        class="w-full px-4 py-2 border border-gray-300 rounded-xl focus:outline-none">
    </div>

    <div>
        <select type="text" name="category_id"
        class="w-full px-4 py-2 border border-gray-300 rounded-xl focus:outline-none">
        @foreach($categories as $category)
        <option value={{$category->id}} >{{$category->name}}</option>
        @endforeach
    </select>
    </div>
    <button type="submit" class="w-full bg-blue-500 rounded-xl px-4 py-2 text-white" >Thêm</button>
</form>
</div>
<div class="w-200">
    <h1 class="text-2xl text-green-900 text-center my-10">Quizzes</h1>

        <ul class="border border-gray-200 mb-20">
        <li class="p-2 font-bold">
                <ul class="flex justify-between">
                    <li class="w-150">Tên</li>
                    <li class="w-50">Action</li>
                    <li class="w-50">created_at</li>
                </ul>
            </li>

            @foreach($quizData as $item)
            <li class="even:bg-gray-200 p-2">
                <ul class="flex justify-between">
                    <li class="w-150">{{$item->name}}</li>
                    <li class="w-50">
                    <a href="/quiz-details/{{$item->id}}/{{str_replace(' ','-',$item->name)}}" class="text-green-500 font-bold">
                        Xem Quiz
                        </a>
                    <a href="/delete-quiz/{{$item->id}}">
                        <svg xmlns="http://www.w3.org/2000/svg" height="20px" viewBox="0 -960 960 960" width="20px" fill="#000000"><path d="M312-144q-29.7 0-50.85-21.15Q240-186.3 240-216v-480h-48v-72h192v-48h192v48h192v72h-48v479.57Q720-186 698.85-165T648-144H312Zm336-552H312v480h336v-480ZM384-288h72v-336h-72v336Zm120 0h72v-336h-72v336ZM312-696v480-480Z"/></svg>
                        </a>
                    </li>
                    <li class="w-50">{{ $item->created_at ? $item->created_at->format('Y-m-d') : '' }}</li>
                </ul>
            </li>
            @endforeach
        </ul>
    </div>
@else
<div class=" bg-white p-8 rounded-2xl  shadow-lg w-full max-w-md">
<span class="text-green-500 font-bold">Quiz : {{session('quizDetails')->name}}</span>
<p class="text-green-500 font-bold">Total MCQs : {{$totalMCQs}}
</p>
<h2 class="text-2xl text-center text-gray-800 mb-6 ">Thêm Câu Hỏi </h2>
<form action="add-mcq" method="post" class="space-y-4">
<div>
    @csrf
        <textarea type="text"placeholder="Enter your question name" name="question"
        class="w-full px-4 py-2 border border-gray-300 rounded-xl focus:outline-none"></textarea>
   @error('question')
   <div class="text-red-500">{{$message}}</div>
   @enderror
    </div>
    <div>
        <input type="text"placeholder="Enter first option" name="a"
        class="w-full px-4 py-2 border border-gray-300 rounded-xl focus:outline-none">
        @error('a')
   <div class="text-red-500">{{$message}}</div>
   @enderror
    </div>
    <div>
        <input type="text"placeholder="Enter second option" name="b"
        class="w-full px-4 py-2 border border-gray-300 rounded-xl focus:outline-none">
        @error('b')
   <div class="text-red-500">{{$message}}</div>
   @enderror
    </div>
    <div>
        <input type="text"placeholder="Enter third option" name="c"
        class="w-full px-4 py-2 border border-gray-300 rounded-xl focus:outline-none">
        @error('c')
   <div class="text-red-500">{{$message}}</div>
   @enderror
    </div>
    <div>
        <input type="text"placeholder="Enter forth option" name="d"
        class="w-full px-4 py-2 border border-gray-300 rounded-xl focus:outline-none">
        @error('d')
   <div class="text-red-500">{{$message}}</div>
   @enderror
    </div>

    <div>
        <select  name="correct_ans"
        class="w-full px-4 py-2 border border-gray-300 rounded-xl focus:outline-none">
<option value="">Chọn đáp án đúng</option>
<option value="a">A</option>
<option value="b">B</option>
<option value="c">C</option>
<option value="d">D</option>
    </select>
    @error('correct_ans')
   <div class="text-red-500">{{$message}}</div>
   @enderror
    </div>
    <button type="submit" name="submit" value="add-more" class="w-full bg-blue-500 rounded-xl px-4 py-2 text-white" >Thêm câu hỏi</button>
    <button type="submit" name="submit" value="done" class="w-full bg-green-500 rounded-xl px-4 py-2 text-white" >Thêm và Submit</button>
<a  class="w-full bg-red-500 block text-center rounded-xl px-4 py-2 text-white" href="/end-quiz">Hủy</a>


</form>
@endif
</div>
</div>
</body>
