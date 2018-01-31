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
        @foreach ($objects as $key => $object)
            <div class="row">
                <div class="col-xl-8 col-lg-8 col-md-12 col-sm-12 col-12 mx-auto">
                    <div class="card">
                        <div class="card-body">
                            <h5>
                                {{ $object->status_request }}
                                <br>
                                {{ $inspectors[$object->inspector_id ]['lastname'] }} {{ $inspectors[$object->inspector_id ]['firstname'] }} {{ $inspectors[$object->inspector_id ]['middlename'] }}<br>
                                <span class="regular">{{ $object->status_request_start }}</span>
                            </h5>
                            <p class="mb-0">
                                {{ $object->address }}
                            </p>
                            <br>
                            <p class="mb-0">
                                <b>Контактное лицо:</b><br>
                                {{ $object->contact_fio }}<br>
                                {{ $object->contact_phone }}<br>
                                {{ $object->contact_email }}
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection
