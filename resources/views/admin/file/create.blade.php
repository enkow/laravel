@extends('admin.template.page')

@section('title')
    Dodaj pliki
    @include('admin.file.styles')
@stop

@section('subtitle')
    <a href="{{ route('admin.file.index') }}" class="btn btn-sm btn-primary"><i class="fa fa-arrow-left"></i> Wróć</a>
@stop

@section('body')

    {{ Form::open(['route' => ['admin.file.store'], 'class' => 'dropzone', 'id' => 'my-awesome-dropzone']) }}

    {{ Form::close() }}

@stop

@section('scripts')
    <script src="{{url('/js/dropzone.min.js')}}" type="text/javascript"></script>
    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $(function(){
            Dropzone.options.myAwesomeDropzone = {
                url: '{{ route('admin.file.store') }}',
                withCredentials: true,
                maxFilesize: 2,
                addRemoveLinks: false,
                dictResponseError: 'Server not Configured',
                // acceptedFiles: ".png,.jpg,.gif,.bmp,.jpeg",
                init:function(){
                    var self = this;
                    // config
                    self.options.addRemoveLinks = true;
                    self.options.dictRemoveFile = "usuń";
                    //New file added
                    self.on("addedfile", function (file) {
                        // console.log(file.name);
                    });
                    // Send file starts
                    self.on("sending", function (file) {
                        $('.meter').show();
                    });

                    // File upload Progress
                    self.on("totaluploadprogress", function (progress) {
                        $('.roller').width(progress + '%');
                    });

                    self.on("queuecomplete", function (progress) {
                        $('.meter').delay(999).slideUp(999);
                    });

                    // On removing file
                    self.on("removedfile", function (file) {
                        $.ajax({
                            method: "GET",
                            url: "{{ route('admin.file.delete') }}/" + file.newName,
                            processData: false,
                            contentType: false,
                        }).done( function ( data ) {
                            //code
                        }).always( function () {
                            // code
                        });
                    });

                    self.on('error', function(file, response) {
                        $(".dz-error-mark svg").css("background", "red");
                        $(".dz-error-mark svg").css("border-radius", "50%");
                        $(file.previewElement).find('.dz-error-message').text(response.message);
                    });

                    self.on('success', function(file, response) {
                        $(".dz-success-mark svg").css("background", "green");
                        $(".dz-success-mark svg").css("border-radius", "50%");
                        $(file.previewElement).find('.dz-filename').text(response.name);
                        file.newName = response.name;
                    });
                }
            };
        })
    </script>
@stop
