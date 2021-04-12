@extends('admin.template.page')

@section('title')
    <i class="fa a-file-image-o"></i> Biblioteka plików
    @include('admin.file.styles')
@stop

@section('subtitle')
    <a href="{{ route('admin.file.create') }}" class="btn btn-success"><i class="fa fa-plus"></i> Dodaj</a>
@stop

@section('body')
    <div class="files_container col-xs-12">
        @if($files->count() > 2)
            @foreach($files as $file)
                @if($file !== '.' && $file !== '..')
                    <div class="files_container-element col-lg-2 col-md-3 col-sm-4 col-xs-6">
                        <div class="file-icons">
                            <a href="#" class="file-btn copy-btn" data-copy="{{ route('img', ['x', $file]) }}"><i class="fa fa-2x fa-copy"></i></a>
                            <a href="#" class='file-btn delete-btn' data-name="{{ $file }}"><i class="fa fa-2x fa-trash"></i></a>
                        </div>
                        <img src="{{ route('img', ['200x200', $file]) }}">
                    </div>
                @endif
            @endforeach
        @else
            <div class="jumbotron jumbotron-fluid mt-5">
                <div class="container">
                    <h1 class="display-4">Brak wyników</h1>
                    <p class="lead">Żaden plik nie został jeszcze dodany do biblioteki</p>
                </div>
            </div>
        @endif
    </div>
@stop

@section('scripts')
    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $('.files_container-element').mouseover(function() {
            $(this).find('.file-icons').css('display', 'block')
        });
        $('.files_container-element').mouseleave(function() {
            $(this).find('.file-icons').css('display', 'none')
        });

        $('.copy-btn').on("click", function(e){
            e.stopPropagation();
            e.preventDefault();
            value = $(this).data('copy'); //Upto this I am getting value

            var tempInput = $("<input>");
            $("body").append(tempInput);
            tempInput.val(value).select();
            document.execCommand("copy");
            tempInput.remove();
        });

        $('.delete-btn').on("click", function(e){
            e.stopPropagation();
            e.preventDefault();

            var name = $(this).data('name'); //Upto this I am getting value
            var that = $(this);
            $.ajax({
                method: "GET",
                url: "{{ route('admin.file.delete') }}/" + name,
                processData: false,
                contentType: false,
            }).done( function ( data ) {
                that.parent().parent().remove();
            }).always( function () {
                // code
            });
        });
    </script>
@stop
