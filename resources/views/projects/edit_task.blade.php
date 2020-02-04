@extends('layouts.app')

@section('content')
    <form method="POST" action="{{$task->path()}}"
        class="lg:w-3/4 lg:mx-auto card py-12 px-16 rounded shadow"
        style="direction: rtl">
        @method('PATCH')
        @csrf
        <div class="flex justify-between">
            <h1 class="text-3xl text-center mb-2 ml-10">تعديل بيان الشحن</h1>

            <div>
                <div class="lg:flex items-center">
                    <label class="label text-sm mb-1 mr-2" for="bill_num">رقم البيان</label>

                    <input type="text" 
                    class="form-input w-full mb-2 mr-2 flex-1" 
                    name="bill_num" 
                    placeholder="1234"
                    value="{{$task->bill_num}}"
                    required>
                </div>        
            </div>
        </div>

        <div class="lg:flex items-center justify-between">
            <div class="lg:flex items-center">
                <label class="label text-sm mb-1 mr-2" for="from">المورد </label>

                <input type="text" 
                class="form-input w-full mb-2 mr-2 flex-1" 
                name="from" 
                placeholder="خلوف اوتو"
                value="{{$task->from}}"
                required>
            </div>

            <div class="lg:flex items-center">
                <label class="label text-sm mb-1 mr-1" for="to">الزبون الفرعي</label>

                <input type="text" 
                class="form-input w-full mb-2 mr-2 flex-1" 
                name="to" 
                placeholder="محل حماة"
                value="{{$task->to}}"
                required>
            </div>

            <div class="lg:flex items-center">
                <label class="label text-sm mb-1 mr-2" for="city">المحافظة</label>

                <input type="text" 
                class="form-input w-full mb-2 mr-2 flex-1" 
                name="city" 
                placeholder="حماة"
                value="{{$task->city}}"
                required>
            </div>

        </div>


        <div class="lg:flex items-center mb-4 justify-between">
            <div class="lg:flex items-center">
                <label class="label text-sm mb-1 mr-2" for="driver">السائق</label>

                <input type="text" 
                class="form-input w-full mb-2 mr-2 flex-1" 
                name="driver" 
                placeholder="أحمد"
                value="{{$task->driver}}"
                required>
            </div>

            <div class="lg:flex items-center">
                <label class="label text-sm mb-1 mr-2" for="telephone">رقم الهاتف</label>

                <input type="text" 
                class="form-input w-full mb-2 mr-2 flex-1" 
                name="telephone" 
                placeholder="0912345678"
                value="{{$task->telephone}}"
                >
            </div>

            <div class="lg:flex items-center">
                <label class="label text-sm mb-1 mr-2" for="title">التاريخ</label>

                <input type="date" 
                class="form-input w-full mb-2 mr-2 flex-1" 
                name="date" 
                placeholder="Date"
                value="{{$task->date}}"
                required>
            </div>
        </div>

        <div class="text-default w-full flex mb-1">
            <span class="w-1/4 font-bold text-lg">رقم المحرك</span>
            <span class="w-1/4 font-bold text-lg">رقم الهيكل </span>
            <span class="w-1/4 font-bold text-lg">الطراز</span>
            <span class="w-1/4 font-bold text-lg">الملاحظات</span>
        </div>

        @foreach ($task->bills as $bill)
            <div class="mb-2">
                <input type="text" value="{{$bill->engine}}" name="engine[]" placeholder="190104552" class="form-input w-1/5 mr-10">
                <input type="text" value="{{$bill->vin}}" name="vin[]" placeholder="200010100" class="form-input w-1/5 mr-10">
                <input type="text" value="{{$bill->model}}" name="model[]" placeholder="CG150" class="form-input w-1/5 mr-10">
                <input type="text" value="{{$bill->notes}}" name="notes[]" placeholder="Color" class="form-input w-1/5">
            </div>
        @endforeach

        <a href="{{$project->path()}}" class="button-white float-left ml-4">إلغاء</a>
        <button type="submit" class="button-primary float-left capitalize ml-2">حفظ التغييرات</button>

    </form>
@endsection