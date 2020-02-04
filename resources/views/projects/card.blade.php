<div class="card flex flex-col " style="height: 200px ; overflow: hidden; direction: rtl">
    <h3 class="font-normal py-3 mb-2 text-xl  -mr-5 border-r-4 border-red-400 pr-5">
        <a href="{{ $project->path()}}" class="font-medium text-default"> {{ $project->title }} </a>
    </h3>

    <div class="text-default mb-5 flex-1"> {{ str_limit($project->description,100) }} </div>

    @can('manage', $project)
        <footer>
            <form action="{{ $project->path() }}" method="POST" class="text-right">
                @csrf
                @method('DELETE')

                <button type="submit" class="button-primary float-left">حذف</button>
            </form>
        </footer>    
    @endcan
    
</div>