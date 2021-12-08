@extends('layouts.app')
@section('title', 'Rapat Show')
@push('bread')
<li class="breadcrumb-item"><a href="{{ route('admin.rapat.index') }}">Rapat</a></li>
<li class="breadcrumb-item active">Show</li>
@endpush
@section('content')
<div class="row">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header d-flex flex-row justify-content-between">
                <a href="{{ route('admin.rapat.index') }} " class="btn btn-sm btn-info">Back</a>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label id="instructions">Press the Start button</label>
                            <textarea id="textbox" rows="6" class="form-control"></textarea>
                        </div>
                        <div class="btn-group">
                            <button id="start-btn" class="btn btn-danger btn-block">
                                Start
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card">
            <div class="card-header d-flex flex-row justify-content-between">
                <p class="lead">File</p>
            </div>
            <div class="card-body">
                <div class="col-md-6">
                    <ul class="list-group list-group-flush">
                        @foreach($rapat->file_rapat as $file)
                        <li class="list-group-item">
                            <audio controls >
                                <source id="audiofile" src="{{ asset('storage/'.$file->path) }}" type="audio/mp3">
                            </audio>
                        </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
@stop
@push('admin.script')
<script>
    var speechRecognition = window.webkitSpeechRecognition

    var recognition = new speechRecognition()

    var textbox = $("#textbox")

    var instructions = $("#instructions")

    var content = ''

    recognition.lang = 'id-ID'
    recognition.continuous = true

    // recognition is started

    recognition.onstart = function() {

        instructions.text("Voice Recognition is On")

    }

    recognition.onspeechend = function() {
        instructions.text("No Activity")
    }

    recognition.onerror = function() {
        instructions.text("Try Again")
    }

    recognition.onresult = function(event) {

        var current = event.resultIndex;

        var transcript = event.results[current][0].transcript

        content += transcript
        textbox.val(content)
    }

    $("#start-btn").click(function(event) {
        recognition.start()
    })
    $("#stop-btn").click(function(event) {
        console.log(recognition)
    })
    textbox.on('input', function() {
        content = $(this).val()
    })
    $('#update').on('click', function() {
        $('#form').submit()
    });
</script>
@endpush