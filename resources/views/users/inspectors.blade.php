@extends('layouts.main')

@section('content')
    <div class="container pb-5">
        <div class="row py-5">
            <div class="col-12">
                <h1 class="text-center">
                    Веб-сервис видеомониторинга Госстройнадзора
                </h1>
            </div>
        </div>
        <table class="table table-hover">
            <thead>
                <tr class="">
                    <th class="">
                        ФИО инспектора
                    </th>
                    <th class="">
                        Количество жилых объектов под надзором
                    </th>
                    <th class="">
                        Видеотрансляция добавлена в Стройформ
                    </th>
                    <th class="">
                        Строительство не начато
                    </th>
                    <th class="">
                        Необходимо добавить видеотрансляцию
                    </th>
                </tr>
            <tbody>
                <tr class="">
                    <td class="">
                        Всего
                    </td>
                    <td class=" ">
                        {{ $stat[0]['objects'] }}
                    </td>
                    <td class=" ">
                        {{ $stat[0]['video'] }}
                    </td>
                    <td class=" ">
                        {{ $stat[0]['no_start'] }}
                    </td>
                    <td class="  bold">
                        {{ $stat[0]['need_video'] }}
                    </td>
                </tr>
                <tr class="">
                    <td class="">
                        <a href="/objects/right">Правобережная зона</a>
                    </td>
                    <td class=" ">
                        {{ $stat['right']['objects'] }}
                    </td>
                    <td class=" ">
                        {{ $stat['right']['video'] }}
                    </td>
                    <td class=" ">
                        {{ $stat['right']['no_start'] }}
                    </td>
                    <td class="  bold">
                        {{ $stat['right']['need_video'] }}
                    </td>
                </tr>
                <tr class="">
                    <td class="">
                        <a href="/objects/left">Левобережная зона</a>
                    </td>
                    <td class=" ">
                        {{ $stat['left']['objects'] }}
                    </td>
                    <td class=" ">
                        {{ $stat['left']['video'] }}
                    </td>
                    <td class=" ">
                        {{ $stat['left']['no_start'] }}
                    </td>
                    <td class="  bold">
                        {{ $stat['left']['need_video'] }}
                    </td>
                </tr>
                @foreach ($inspectors as $inspector)
                    <tr class="">
                        <td class="">
                            <a href="/inspectors/{{ $inspector->id }}">{{ $inspector->lastname}} {{ $inspector->firstname }} {{ $inspector->middlename }}</a>
                        </td>
                        <td class=" ">
                            {{ $stat[$inspector->id]['objects'] }}
                        </td>
                        <td class=" ">
                            {{ $stat[$inspector->id]['video'] }}
                        </td>
                        <td class=" ">
                            {{ $stat[$inspector->id]['no_start'] }}
                        </td>
                        <td class="  bold">
                            {{ $stat[$inspector->id]['need_video'] }}
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
