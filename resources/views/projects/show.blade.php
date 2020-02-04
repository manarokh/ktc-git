@extends('layouts.app')

@section('content')

    <header class="flex items-center mb-3 pb-4" style="direction: rtl">
        <div class="flex justify-between items-end w-full">
            <p class="text-default text-sm font-normal">
                <a href="/projects" class="text-default text-sm font-normal no-underline hover:underline">الزبائن</a>
                / {{ $project->title }} 
            </p>

            <div class="flex items-center">
                @foreach ($project->members as $member)
                    <img 
                    src="{{gravatar_url($member->email)}}" 
                    alt="{{$member->name}}'s avatar'" 
                    class="rounded-full w-10 ml-2 shadow">
                @endforeach
                <img 
                    src="{{gravatar_url($project->owner->email)}}" 
                    alt="{{$project->owner->name}}'s avatar'" 
                    class="rounded-full w-10 ml-4 shadow">

                <a href="{{ $project->path() }}/create_task" class="button-primary ml-4"> إضافة بيان شحن </a>

                <a href="{{$project->path()}}/edit" 
                    class="button-primary ml-4">تعديل بيانات الزبون</a>
            </div>
        </div>
    </header>


    <main style="direction: rtl">
        <div class="lg:flex -mx-3">
            <div class="w-3/4  px-3 mb-4">
                <div class="mb-8">
                    <h2 class="font-normal text-lg text-default mb-3" >بيانات الشحن</h2>
                    {{-- Tasks --}}

                    {{-- add new Task --}}
                    {{-- <div class="card mb-3">
                        <form action="{{ $project->path().'/tasks' }}" method="POST">
                            @csrf
                            <input type="text" name="body" class="bg-card text-default w-full" placeholder="Add New Task ">
                        </form>
                    </div> --}}

                    {{-- show tasks --}}
                    {{-- <div>
                        @foreach ($test as $item)
                            {{$item->id}}
                        @endforeach
                    </div>
                    <ul class="flex none">
                        <li class=" mr-4"><a class="page-link" href="{{$project->path()}}?page=2">2</a></li>
                        <li class=" mr-4"><a class="page-link" href="{{$project->path()}}?page=3">3</a></li>
                        <li class=" mr-4"><a class="page-link" href="{{$project->path()}}?page=4">4</a></li>
                        <li class=" mr-4"><a class="page-link" href="{{$project->path()}}?page=5">5</a></li>
                    </ul> --}}
                    @foreach ($project->tasks as $task)
                        <div class="card mb-3">
                            <form action="{{ $task->path() }}" method="post">
                                @csrf
                                @method('PATCH')

                                <shipping-bill 
                                :task="{{ $task }}" 
                                :bills="{{$task->bills}}"
                                printpath = "{{$task->path()}}/print" 
                                path="{{ $task->path() }}"></shipping-bill>
                            </form>
                        </div>
                    @endforeach
                </div>

                <div>
                    <h2 class="font-normal text-lg text-default mb-3">ملاحظات عامة</h2>
                    {{-- General Notes --}}
                    <form action="{{ $project->path() }}" method="POST">
                        @csrf
                        @method('PATCH')
                        {{-- <input type="hidden" name="title" value="{{$project->title}}">
                        <input type="hidden" name="description" value="{{$project->description}}"> --}}
                        <textarea 
                            class="card w-full" 
                            style="min-height: 175px" 
                            name="notes"
                            placeholder="ملاحظات عامة حول الزبون">{{ $project->notes }}</textarea>

                        <button type="submit" class="button-primary mt-1 float-left">حفظ</button>
                     </form>
                     @include('errors')
                </div>
            </div>


            <div class="w-1/3">
                @include('projects.card')
                @include('projects.activity.card')

                @can('manage',$project)
                    @include('projects.invites')
                @endcan
            </div>
        </div>
    </main>
    
@endsection