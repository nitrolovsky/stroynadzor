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
                <tr class="row">
                    <th class="col-4">
                        ФИО инспектора
                    </th>
                    <th class="col-2">
                        Количество жилых объектов под надзором
                    </th>
                    <th class="col-2">
                        Видеотрансляция добавлена в Стройформ
                    </th>
                    <th class="col-2">
                        Строительство не начато
                    </th>
                    <th class="col-2">
                        Необходимо добавить видеотрансляцию
                    </th>
                </tr>
            <tbody>
                <tr class="row">
                    <td class="col-4">
                        Всего
                    </td>
                    <td class="text-center col-2">
                        {{ $stat[0]['objects'] }}
                    </td>
                    <td class="text-center col-2">
                        {{ $stat[0]['video'] }}
                    </td>
                    <td class="text-center col-2">
                        {{ $stat[0]['no_start'] }}
                    </td>
                    <td class="text-center col-2 bold">
                        {{ $stat[0]['need_video'] }}
                    </td>
                </tr>
                @foreach ($inspectors as $inspector)
                    <tr class="row">
                        <td class="col-4">
                            <a href="/inspectors/{{ $inspector->id }}">{{ $inspector->lastname}} {{ $inspector->firstname }} {{ $inspector->middlename }}</a>
                        </td>
                        <td class="text-center col-2">
                            {{ $stat[$inspector->id]['objects'] }}
                        </td>
                        <td class="text-center col-2">
                            {{ $stat[$inspector->id]['video'] }}
                        </td>
                        <td class="text-center col-2">
                            {{ $stat[$inspector->id]['no_start'] }}
                        </td>
                        <td class="text-center col-2 bold">
                            {{ $stat[$inspector->id]['need_video'] }}
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
