@extends('admin.template.page')

@section('title')
  <i class="fa fa-book"></i> Blog
@stop

@section('subtitle')
  <a href="{{ route('admin.blog.create') }}" class="btn btn-success"><i class="fa fa-plus"></i> Dodaj</a>
@stop

@section('body')
<table class="data table">
    <thead>
        <tr>
            <th class="id">#</th>
            <th>Tytuł</th>
            <th>Tagi</th>
            <th data-orderable="false"></th>
            <th data-orderable="false"></th>
        </tr>
    </thead>
    <tbody>
        @foreach( $posts as $post )
            <tr>
                <td>{{ $post->id }}</td>
                <td>{{ $post->name }}</td>
                <td>{{ implode(', ', $post->tags()->pluck('name')->toArray()) }}</td>
                <td><a href="{{ route('admin.blog.edit', $post->id) }}" class="btn btn-warning"><i class="fa fa-pencil-square-o"></i> Edytuj</a></td>
                <td><a href="" class="btn btn-danger deletable" data-href="{{ route('admin.blog.delete', $post->id) }}"><i class="fa fa-trash"></i> Usuń</a></td>
        @endforeach
    </tbody>
</table>
@stop

@section('scripts')

@stop
