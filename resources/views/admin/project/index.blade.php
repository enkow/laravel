@extends('admin.template.page')

@section('title')
  <i class="fa fa-briefcase"></i> Portfolio
@stop

@section('subtitle')
  <a href="{{ route('admin.project.create') }}" class="btn btn-success"><i class="fa fa-plus"></i> Dodaj</a>
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
        @foreach( $projects as $project )
            <tr>
                <td>{{ $project->id }}</td>
                <td>{{ $project->name }}</td>
                <td><a href="{{ route('admin.project.edit', $project->id) }}" class="btn btn-warning"><i class="fa fa-pencil-square-o"></i> Edytuj</a></td>
                <td><a href="" class="btn btn-danger deletable" data-href="{{ route('admin.project.delete', $project->id) }}"><i class="fa fa-trash"></i> Usuń</a></td>
        @endforeach
    </tbody>
</table>
@stop

@section('scripts')

@stop
