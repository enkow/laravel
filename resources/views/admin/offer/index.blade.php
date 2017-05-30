@extends('admin.template.page')

@section('title')
  <i class="fa fa-handshake-o"></i> Oferty
@stop

@section('subtitle')
  <a href="{{ route('admin.offer.create') }}" class="btn btn-success"><i class="fa fa-plus"></i> Dodaj</a>
@stop

@section('body')
<table class="data table">
    <thead>
        <tr>
            <th class="id">#</th>
            <th>Nazwa</th>
            <th data-orderable="false"></th>
            <th data-orderable="false"></th>
        </tr>
    </thead>
    <tbody>
        @foreach( $offers as $offer )
            <tr>
                <td>{{ $offer->id }}</td>
                <td>{{ $offer->name }}</td>
                <td><a href="{{ route('admin.offer.edit', $offer->id) }}" class="btn btn-warning"><i class="fa fa-pencil-square-o"></i> Edytuj</a></td>
                <td><a href="" class="btn btn-danger deletable" data-href="{{ route('admin.offer.delete', $offer->id) }}"><i class="fa fa-trash"></i> Usuń</a></td>
        @endforeach
    </tbody>
</table>
@stop

@section('scripts')

@stop
