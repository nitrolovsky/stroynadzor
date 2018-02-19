@extends('layouts.main')

@section('content')
    <div class="container">
        <div class="row p-5">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                <h1 class="text-center mb-0">
                    Заявки
                </h1>
            </div>
        </div>
        <table class="table table-bordered">
            <tr>
                <td>
                    Описание и примечание
                </td>
                <td>
                    № п/п
                </td>
                <td>
                    Застройщик
                </td>
                <td>
                    Адрес строительства
                </td>
                <td>
                    Ответственный инспектор
                </td>
                <td>
                    Контактное лицо
                </td>
            </tr>
            @foreach ($objects as $key => $object)
                <tr>
                    <td>
                        <b>{{ $object->status_request }}</b><br><br>
                        {{ $object->note or '' }}
                    </td>
                    <td>
                        {{ ++$key }}
                    </td>
                    <td>
                        {{ $object->developer_name or '' }}
                    </td>
                    <td>
                        {{ $object->address }}
                    </td>
                    <td>
                        {{ $inspectors[$object->inspector_id - 1 ]['lastname'] }} {{ $inspectors[$object->inspector_id - 1 ]['firstname'] }} {{ $inspectors[$object->inspector_id - 1 ]['middlename'] }}
                    </td>
                    <td>
                        {{ $object->contact_fio or '' }}<br><br>
                        {{ $object->contact_phone or '' }}<br>
                        {{ $object->contact_email or '' }}
                    </td>
                </tr>
            @endforeach
        </table>
    </div>
@endsection
