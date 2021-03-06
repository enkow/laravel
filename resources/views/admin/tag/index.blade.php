@extends('admin.template.page')

@section('title')
  <i class="fa fa-tags"></i> Tagi
@stop

@section('subtitle')
  <a href="{{ route('admin.tag.create') }}" class="btn btn-success"><i class="fa fa-plus"></i> Dodaj</a>
@stop

@section('body')
<table class="data table">
    <thead>
        <tr>
            <th class="id">#</th>
            <th>Tytuł</th>
            <th data-orderable="false"></th>
            <th data-orderable="false"></th>
        </tr>
    </thead>
    <tbody>
        @foreach( $tags as $tag )
            <tr>
                <td>{{ $tag->id }}</td>
                <td>{{ $tag->name }}</td>
                <td><a href="{{ route('admin.tag.edit', $tag->id) }}" class="btn btn-warning"><i class="fa fa-pencil-square-o"></i> Edytuj</a></td>
                <td><a href="" class="btn btn-danger deletable" data-href="{{ route('admin.tag.delete', $tag->id) }}"><i class="fa fa-trash"></i> Usuń</a></td>
        @endforeach
    </tbody>
</table>
@stop

@section('scripts')

@stop
