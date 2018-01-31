@extends('layouts.main')

@section('content')
    <div class="container-fluid">
        <div class="row p-5">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                <h1 class="text-center mb-0">
                    Правобережная зона
                </h1>
            </div>
        </div>
        <div class="row">
            @foreach ($objects as $key => $object)
                <div class="col-xl-2 col-lg-2 col-md-2 col-sm-12 col-12">
                    <div class="embed-responsive embed-responsive-16by9">

                        @if ($object->status == 'Необходимо добавить видеотрансляцию')
                            <iframe class="embed-responsive-item bg-danger" src="" allowfullscreen></iframe>
                        @elseif ($object->status == 'Строительство не начато')
                            <iframe class="embed-responsive-item bg-light" src="" allowfullscreen></iframe>
                        @else
                            <iframe class="embed-responsive-item bg-dark" src="{{ $object->video_url or '' }}" allowfullscreen></iframe>
                        @endif

                    </div>
                        <p class="small">
                            <a href='/inspectors/{{ $object->inspector_id }}' target="_blank">{{ $inspectors[ $object->inspector_id -1 ]['lastname'] }} {{ $inspectors[ $object->inspector_id -1 ]['firstname'] }} {{ $inspectors[ $object->inspector_id -1 ]['middlename'] }}</a><br>
                            <b>{{ $object->status or '' }}</b>
                            <br>
                            {{ $object->address }}
                            <br>
                            <a href={{ $object->video_url or '' }} target="_blank">{{ $object->video_url or '' }}</a>
                        </p>
                        <br>
                    </div>
            @endforeach
        </div>
    </div>
@endsection
