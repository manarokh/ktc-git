@extends('layouts.app')

@section('content')
    @foreach ($task->bills as $bill)
        <h3>بيان شحن {{$bill->id}}</h3>
        رقم الهيكل : {{$bill->vin}} <br>
        رقم المحرك : {{$bill->engine}} <br>
        الطراز : {{$bill->model}} <br>
        الملاحظات : {{$bill->notes}} <br>
        <hr>
    @endforeach
@endsection
