@extends('admin.template.page')

@section('title')
  <i class="fa fa-television"></i> Realizacje
@stop

@section('subtitle')
  <a href="{{ route('admin.realization.create') }}" class="btn btn-success"><i class="fa fa-plus"></i> Dodaj</a>
@stop

@section('body')
<table class="data table">
    <thead>
        <tr>
            <th class="id">#</th>
            <th>Tytuł</th>
            <th>Kolejność</th>
            <th>SG</th>
            <th data-orderable="false"></th>
            <th data-orderable="false"></th>
        </tr>
    </thead>
    <tbody>
        @foreach( $realizations as $realization )
            <tr>
                <td>{{ $realization->id }}</td>
                <td>{{ $realization->name }}</td>
                <td>{{ $realization->order }}</td>
                <td>
                  @if($realization->main)
                    <span class="label label-success">TAK</span>
                  @else
                    <span class="label label-danger">NIE</span>
                  @endif
                </td>
                <td><a href="{{ route('admin.realization.edit', $realization->id) }}" class="btn btn-warning"><i class="fa fa-pencil-square-o"></i> Edytuj</a></td>
                <td><a href="" class="btn btn-danger deletable" data-href="{{ route('admin.realization.delete', $realization->id) }}"><i class="fa fa-trash"></i> Usuń</a></td>
        @endforeach
    </tbody>
</table>
@stop

@section('scripts')

@stop
