<div class="card flex flex-col mt-4" >
    <h3 class="font-normal py-3 mb-2 text-xl font-bold  -mr-5 border-r-4 border-red-400 pr-4">
        دعوة مستخدم
    </h3>

    <form action="{{ $project->path().'/invitations' }}" method="POST">
        @csrf
        <input 
        type="email" 
        name="email" 
        class=" form-input w-full mb-4"
        placeholder="قم بإدخال ايميل المستخدم لدعوته"
         required>
         
        <button type="submit" class="button-primary float-left">دعوة</button>
    </form>

     @include('errors',['bag'=>'invitations'])
</div>