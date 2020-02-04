@extends('layouts.app')

@section('content')
    <header class="flex  mb-3 justify-between py-4" style="direction: rtl">
        <h1 class="text-2xl text-default" >الأرشيف</h1>
        <a href="/projects/create" class="button-primary" @click.prevent="$modal.show('new-project')">إنشاء زبون جديد </a>
    </header>

    <main class="lg:flex flex-wrap -mx-3">
        @forelse ($projects as $project)
            <div class="lg:w-1/3 px-2 pb-6">
                @include('projects.card')
            </div>
        @empty
            <div class="font-bold ml-4">
                لا يوجد زبائن بعد 
            </div>
        @endforelse
    </main>

    <new-project-modal></new-project-modal>

@endsection
