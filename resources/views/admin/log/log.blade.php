@extends('admin.template.index')

@section('content')

<style>
	h1 {
		font-size: 1.5em;
		margin-top: 0px;
	}
	.stack {
		font-size: 0.85em;
	}
	.date {
		min-width: 75px;
	}
	.text {
		word-break: break-all;
	}
	a.llv-active {
		z-index: 2;
		background-color: #f5f5f5;
		border-color: #777;
	}
</style>

<section class="content">
	<div class="row">

		<div class="col-md-3">
			<div class="box box-solid">
                <div class="box-header with-border">
                    <h3 class="box-title">Logi dzienne</h3>
                </div>
                <div class="box-body no-padding">
                    <ul class="nav nav-pills nav-stacked">
                    @foreach($files as $file)
                    	<li><a href="?l={{ base64_encode($file) }}" class="@if ($current_file == $file) llv-active @endif">  {{$file}} </a></li>
					@endforeach
                    </ul>
                </div><!-- /.box-body -->
            </div>
		</div>

		<div class="col-md-9">
			@if ($logs === null)
				<div>
					Log file >50M, please download it.
				</div>
			@else
			<table id="table-log" class="data table table-striped">
				<thead>
					<tr>
						<th>Level</th>
						<th>Date</th>
						<th>Content</th>
					</tr>
				</thead>
				<tbody>
					@foreach($logs as $key => $log)
						<tr>
							<td class="text-{{ $log['level_class'] }}"><span class="glyphicon glyphicon-{{ $log['level_img'] }}-sign" aria-hidden="true"></span> &nbsp;{{$log['level']}}</td>
							<td class="date">{{ $log['date'] }}</td>
							<td class="text">
								@if ($log['stack'])
									<a class="pull-right expand-stack btn btn-default btn-xs" data-display="stack{{ $key }}"><span class="glyphicon glyphicon-search"></span></a>
								@endif
								{{ $log['text'] }}
								@if (isset($log['in_file']))
									<br />{{ $log['in_file'] }}
								@endif
								@if ($log['stack'])
									<div class="stack" id="stack{{ $key }}" style="display: none; white-space: pre-wrap;">{{  trim($log['stack'])  }}</div>
								@endif
							</td>
						</tr>
					@endforeach
				</tbody>
			</table>
			@endif
			<div>
				<a href="?dl={{ base64_encode($current_file) }}"><span class="glyphicon glyphicon-download-alt"></span> Pobierz plik </a>
				-
				<a id="delete-log" href="?del={{ base64_encode($current_file) }}"><span class="glyphicon glyphicon-trash"></span> Usuń plik</a>
			</div>
		</div>
	</div>
</section>

@stop
@section('scripts')
<script>
	$(document).ready(function(){

		$('.expand-stack').on('click', function(){
			$('#' + $(this).data('display')).toggle();
		});

		$('#delete-log').click(function(){
			return confirm('Are you sure?');
		});
	});
</script>

@stop
