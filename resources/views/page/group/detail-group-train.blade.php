@extends('layouts.page')

@section('title')
{{ env('APP_NAME', 'Badminton.io') }} - {{ __('Detail Group') }}
@endsection

@section('css')
<meta name="csrf-token" content="{{ csrf_token() }}" />
<link rel="stylesheet" href="{{ asset('/css/page/group.css') }}" />
@endsection

@section('content')
<div class="container">
    <div class="card">
        <div class="card-header">
            {{ $groupTrainingDetail->name }}
        </div>
        <div class="card-body">
            <p>* {{ __('Description') }}: {{ $groupTrainingDetail->description }}</p>
            <p>* {{ __('Location') }}: {{ $groupTrainingDetail->location }}</p>
            <p>* {{ __('Activity time') }}: {{ $groupTrainingDetail->activity_time }}</p>
            <p class="fst-italic fw-light fw-bold">----- {{ __('Note') }}: {{ $groupTrainingDetail->note }}</p>
        </div>
        <div class="mt-3">
            <div class="progress">
                <div class="progress-bar" role="progressbar" <?php echo 'style="width:' . ($listMembers->count() / $groupTrainingDetail->number_of_members * 100) . '%"' ?> aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
            </div>
            <div class="d-flex justify-content-between mt-3">
                <div> <span class="text1">{{ $listMembers->count() }} {{ __('Applied') }} <span class="text2">of {{ $groupTrainingDetail->number_of_members }}</span></span> </div>
            </div>
        </div>
    </div>

    <div class="card" style="width: 50rem; margin-top: 20px; margin-bottom: 120px">
        <div class="card-header">
            {{__('Join')}}
        </div>
        <ul class="list-group list-group-flush">
            @foreach($listMembers as $members)
            <li class="list-group-item">{{ $members->name }}</li>
            @endforeach
        </ul>
    </div>
</div>
@endsection
