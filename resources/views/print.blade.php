<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" charset=utf-8"/>

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->

    {{-- <script defer src="https://use.fontawesome.com/releases/v5.3.1/js/all.js"></script> --}}

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    

    <!-- Styles -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <style>
        @page {
            size: A4 landscape;
            margin: 0;
        }
        @media print {
            html, body {
            }
            /* ... the rest of the rules ... */
        }
    </style>
</head>
<body class="theme-light bg-white">
    <div id="app">
        <nav class="bg-header">
            <div class="container mx-auto">
                <div class="flex justify-between items-center py-2">
                        <a class="float-left" href="{{ url('/') }}">
                            <img 
                            id="logo"
                            src="/images/logo.svg"
                            alt="Logo" >
                        </a>
                    @guest
                    @else
                    <div class="font-bold text-2xl">بيان شحن </div>

                        <dropdown width="100%">
                            <template v-slot:trigger>
                                <button class="flex items-center capitalize mr-5 font-bold focus:outline-none" href="#">
                                    شركة خلوف التجارية<br>
                                    لصناعة السيارات والدراجات
                                </button>        
                            </template>
                        </dropdown>
                    @endguest
                </div>
            </div>
        </nav>
    </div>

        <main class="py-4 mx-auto container" style="direction: rtl">
            <div class="mb-2">
                <span class="ml-6 text-lg font-bold ">السيد :{{$project->title}} المحترم</span>
                <span class="ml-6 text-lg font-bold ">الزبون الفرعي :{{$task->to}}</span>
                <span class="ml-6 text-lg font-bold ">المحافظة :{{$task->city}}</span>
                <span class="ml-6 text-lg font-bold ">التاريخ :{{$task->date}}</span><br>
                <span class="ml-20 text-lg font-bold ">السائق :{{$task->driver}}</span>
                <span class="float-left ml-40 text-lg font-bold ">رقم الإشعار  /{{$task->bill_num}}/</span>
            </div>
            <table class="table-auto w-full">
                <thead>
                    <tr>
                        <td class="border px-4 text-center w-1/6">م .</td>
                        <td class="border px-4 text-center w-1/6">رقم الهيكل</td>
                        <td class="border px-4 text-center w-1/6">رقم المحرك</td>
                        <td class="border px-4 text-center w-1/6">الطراز</td>
                        <td class="border px-4 text-center w-2/6">الملاحظات</td>
                      </tr>
                </thead>
                <tbody>
                    @foreach ($task->bills as $bill)
                        <tr>
                            <th class="border px-4">{{$loop->iteration}}</th>
                            <th class="border px-4">{{$bill->vin}}</th>
                            <th class="border px-4">{{$bill->engine}}</th>
                            <th class="border px-4">{{$bill->model}}</th>
                            <th class="border px-4">{{$bill->notes}}</th>
                        </tr>
                    @endforeach
                </tbody>
              </table>
        </main>
    </div>
</body>
</html>
