@extends ('layouts.app')

@section('content')
<div class="lg:w-1/2 lg:mx-auto bg-white py-12 px-16 rounded shadow">
    <h1 class="text-2xl font-normal mb-10 text-center">تعديل بيانات زبون</h1>
    <form method="POST" action="{{$project->path()}}"  style="direction: rtl">
        @method('PATCH')
        @include('projects.form' , [
            'buttonText' => 'حفظ التغييرات'
        ])
    </form>
</div>
@endsection