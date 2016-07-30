@extends('backend/layouts/default')

{{-- Page title --}}
@section('title')
Quản lý trang ::
@parent
@stop

{{-- Page content --}}
@section('content')
	<h3>
    	<span class="glyphicon glyphicon-book"></span> Quản lý trang
    	@if ( Sentry::getUser()->hasAnyAccess(['pages','pages.create']) )
    		<a href="{{ route('create/page') }}" class="btn btn-default btn-xs">Tạo trang</a>
    	@endif
    </h3>
	<div class="box">
	    <div class="box-header">
	    </div><!-- /.box-header -->
	    <div class="box-body">
			<table class="table table-bordered table-hover">
				<thead>
					<tr>
						<th class="span6">#</th>
						<th class="span6">@lang('admin/news/table.title')</th>
						<th class="span2">@lang('admin/news/table.created_at')</th>
						<th class="span2">Trạng thái</th>
						<th class="span2">@lang('table.actions')</th>
					</tr>
				</thead>
				<tbody>
					@foreach ($posts as $page)
					<tr>
						<td>{{ $page->id }}</td>
						<td>{{ $page->title }}</td>
						<td>{{ $page->created_at->diffForHumans() }}</td>
						<td>{{ $page->status }}</td>
						<td>
							@if ( Sentry::getUser()->hasAnyAccess(['pages','pages.edit']) )
								<a href="{{ route('update/page', $page->id) }}" class="btn btn-default btn-xs">@lang('button.edit')</a>
								<!-- <a href="{{ route('delete/news', $page->id) }}" class="btn btn-danger btn-xs">@lang('button.delete')</a> -->
							@endif
						</td>
					</tr>
					@endforeach
				</tbody>
			</table>
			{{ $posts->links() }}
		</div>
	</div>
@stop
