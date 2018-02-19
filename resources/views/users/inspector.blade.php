@extends('layouts.main')

@section('content')
    <div class="container-fluid">
        <div class="row p-5">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                <h1 class="text-center mb-0">
                    {{ $inspector->lastname }} {{ $inspector->firstname }} {{ $inspector->middlename }}
                </h1>
            </div>
        </div>

        <div class="row">
            @foreach ($objects as $key => $object)



                    <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
                        <div class="embed-responsive embed-responsive-16by9">

                            @if ($object->status == 'Необходимо добавить видеотрансляцию')
                                <iframe class="embed-responsive-item bg-danger" src="" allowfullscreen></iframe>
                            @elseif ($object->status == 'Строительство не начато')
                                <iframe class="embed-responsive-item bg-light" src="" allowfullscreen></iframe>
                            @elseif ($object->status == 'Смонтировать камеру Службы')
                                <iframe class="embed-responsive-item bg-info" src="" allowfullscreen></iframe>
                            @else
                                <iframe class="embed-responsive-item bg-dark" src="{{ $object->video_url or '' }}" allowfullscreen></iframe>
                            @endif

                        </div>
                        <div class="my-2">
                            <button type="button" class="btn btn-primary btn-sm my-2" data-toggle="modal" data-target="#add_{{ $object->id }}" role="button">Добавить ссылку</button>&nbsp;&nbsp;
                            <button type="button" class="btn btn-warning btn-sm my-2" data-toggle="modal" data-target="#mounting_{{ $object->id }}" role="button">Смонтировать камеру</button>&nbsp;&nbsp;
                            <button type="button" class="btn btn-danger btn-sm my-2" data-toggle="modal" data-target="#dismounting_{{ $object->id }}" role="button">Демонтировать камеру</button>
                        </div>
                            <table class="table table-sm table-hover">
                                <tr><td>Статус</td><td><b>{{ $object->status or '' }}</b></td></tr>
                                <tr><td>Номер разрешения</td><td>{{ $object->resolution_number }}</td></tr>
                                <tr><td>Адрес</td><td>{{ $object->address }}</td></tr>
                                <tr><td>Застройщик</td><td>{{ $object->developer_name }}</td></tr>
                                <tr><td>Ссылка на видеотрансляцию</td><td>  <a href={{ $object->video_url or '' }} target="_blank">{{ $object->video_url or '' }}</a></td></tr>
                            </table>
                        </div>

                        <div class="modal fade" id="add_{{ $object->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-lg" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Добавление ссылки видеотрансляции в Стройформ</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="/objects/addvideo" method="POST">
                                            {{ csrf_field() }}
                                            <input type="hidden" name="id" value="{{ $object->id }}">
                                            <div class="form-group">
                                                <input type="text" class="form-control" id="video_url" placeholder="Введите ссылку на видеотрансляцию" name="video_url">
                                            </div>
                                            <div class="form-group mb-0">
                                                <button type="submit" class="btn btn-primary" role="button">
                                                    Добавить ссылку
                                                </button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="modal fade" id="mounting_{{ $object->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-lg" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Заявка на монтаж камеры Службы</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="/objects/request_mounting" method="POST">
                                            {{ csrf_field() }}
                                            <input type="hidden" name="id" value="{{ $object->id }}">
                                            <div class="form-group">
                                                <input type="text" class="form-control" id="" placeholder="Введите ФИО контактного лица" name="contact_fio">
                                            </div>
                                            <div class="form-group">
                                                <input type="text" class="form-control" id="" placeholder="Телефон контактного лица (обязательно)" name="contact_phone">
                                            </div>
                                            <div class="form-group">
                                                <input type="text" class="form-control" id="" placeholder="Email контактного лица" name="contact_email">
                                            </div>
                                            <div class="form-group">
                                                <textarea class="form-control" row="3" placeholder="Примечание" name="note"></textarea>
                                            </div>
                                            <div class="form-group mb-0">
                                                <button type="submit" class="btn btn-primary" role="button">
                                                    Отправить заявку
                                                </button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>

            @endforeach



        </div>
    </div>


@endsection
