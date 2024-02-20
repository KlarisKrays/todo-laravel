<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')
</head>

<body class=" bg-slate-800 p-4">
    <div class=" mx-auto py-8 px-6 rounded-xl bg-slate-700 h-screen">
        <h1 class=" font-bold text-5xl text-center mb-8 text-slate-300">Todo List</h1>
        <div class="mb-6">
            <form action="/" class="flex flex-col space-y-4" method="POST">
                @csrf
                <input type="text" name="title" placeholder="Input Your Todo Here"
                    class=" text-slate-300 py-3 px-4 bg-slate-600 rounded-xl">
                <textarea name="description" placeholder="Todo Description" id=""
                    class=" text-slate-300 py-3 px-4 bg-slate-600 rounded-xl"></textarea>
                <button class=" w-28 py-3 px-6 bg-slate-800 text-center text-slate-300 rounded-lg hover:opacity-80">Add
                </button>
            </form>
        </div>

        <hr class=" border-slate-500">
        <div class="">
            @foreach ($todos as $todo)
                <div @class([
                    'py-4 flex items-center border-b border-slate-600 px-3',
                    $todo->isDone ? 'bg-slate-500' : '',
                ])>
                    <div class=" flex-1 pr-8">
                        <h3 class=" text-lg font-semibold text-slate-200">{{ $todo->title }}</h3>
                        <p class=" text-slate-300">{{ $todo->description }}</p>
                    </div>
                    <div class=" flex space-x-3">
                        <form action="/{{ $todo->id }}" method="post">
                            @csrf
                            @method('PATCH')
                            @if ($todo->isDone == false)
                                <button class=" py-2 px-2 bg-slate-800 rounded-xl text-slate-200">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="m4.5 12.75 6 6 9-13.5" />
                                    </svg>
                                </button>
                            @else
                                <button class=" py-2 px-2 bg-slate-800 rounded-xl text-slate-200">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12" />
                                    </svg>
                                </button>
                            @endif
                        </form>
                        <form action="/{{ $todo->id }}" method="post">
                            @csrf
                            @method('DELETE')
                            <button class=" py-2 px-2 bg-slate-800 rounded-xl text-slate-200">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
                                </svg>
                            </button>
                        </form>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</body>

</html>
