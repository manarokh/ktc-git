@extends('layouts.app')

@section('content')
    <form method="POST" action="{{ route('login') }}"
          class="lg:w-1/2 w-3/4 mx-auto card py-12 px-16 rounded shadow"
          style="direction: rtl"
    >
        @csrf

        <h1 class="text-2xl font-normal mb-10 text-center">تسجيل الدخول</h1>

        <div class="field mb-6">
            <label class="label text-normal mb-2 block" for="email">
                البريد الالكتروني
            </label>

            <div class="control">
                <input id="email"
                       type="email"
                       class="form-input bg-transparent border border-muted-light rounded p-2 text-xs w-full{{ $errors->has('email') ? ' is-invalid' : '' }}"
                       name="email"
                       placeholder="ادخل بريدك الالكتروني"
                       value="{{ old('email') }}"
                       required>
            </div>
        </div>

        <div class="field mb-6">
            <label class="label text-normal mb-2 block" for="password">كلمة المرور</label>

            <div class="control">
                <input id="password"
                       type="password"
                       class="form-input bg-transparent border border-muted-light rounded p-2 text-xs w-full{{ $errors->has('password') ? ' is-invalid' : '' }}"
                       name="password"
                       placeholder="كلمة المرور"
                       required>
            </div>
        </div>

        <div class="field mb-6">
            <div class="control">
                <input class="form-checkbox"
                       type="checkbox"
                       name="remember"
                       id="remember"
                        {{ old('remember') ? 'checked' : '' }}>

                <label class="text-normal" for="remember">
                    تذكرني
                </label>
            </div>
        </div>

        <div class="field mb-6">
            <div class="col-md-8 offset-md-4">
                <button type="submit" class="button-primary mr-2">
                    تسجيل الدخول
                </button>

                @if (Route::has('password.request'))
                    <a class="text-default text-sm mr-2" href="{{ route('password.request') }}">
                        نسيت كلمة المرور 
                    </a>
                @endif
            </div>
        </div>
    </form>
@endsection