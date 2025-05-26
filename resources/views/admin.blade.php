<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin Dashboard</title>
    @vite('resources/css/app.css')
</head>
<body>
    <x-navbar name={{$name}} ></x-navbar>
    <div class="bg-gray-100 flex flex-col items-center min-h-screen pt-5">
    <div class="w-200">
        <h1 class="text-2xl text-blue-500">Danh sách Users</h1>
        <ul class="border border-gray-200">
        <li class="p-2 font-bold">
                <ul class="flex justify-between">
                    <li class="w-30">Id</li>
                    <li class="w-70">Name</li>
                    <li class="w-70">Email</li>
                    <li class="w-70">Created At</li>
                    <li class="w-50">Action</li>

                </ul>
            </li>

            @foreach($users as $key=>$user)
            <li class="even:bg-gray-200 p-2">
                <ul class="flex justify-between">
                    <li class="w-30">{{$key+1}}</li>
                    <li class="w-70">{{$user->name}}</li>
                    <li class="w-70">{{$user->email}}</li>
                    <li class="w-70">{{$user->created_at ? $user->created_at->format('Y-m-d') : '' }}</li> <!-- Display created_at -->
                    <li class="w-50">
                        <a href="/delete-user/{{$user->id}}">
                            <svg xmlns="http://www.w3.org/2000/svg" height="20px" viewBox="0 -960 960 960" width="20px" fill="#000000"><path d="M312-144q-29.7 0-50.85-21.15Q240-186.3 240-216v-480h-48v-72h192v-48h192v48h192v72h-48v479.57Q720-186 698.85-165T648-144H312Zm336-552H312v480h336v-480ZM384-288h72v-336h-72v336Zm120 0h72v-336h-72v336ZM312-696v480-480Z"/></svg>
                        </a>
                </ul>
            </li>
            @endforeach
        </ul>
    </div>
    <div>
        {{$users->links()}}
    </div>
</div>
</body>
</html>
