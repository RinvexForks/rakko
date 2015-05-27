@extends('app')

{{-- Web site Title --}}
@section('title')
{{ Lang::choice('kotoba::general.menu', 2) }} :: @parent
@stop

@section('styles')
@stop

@section('scripts')
@stop

@section('inline-scripts')
@stop


{{-- Content --}}
@section('content')

<div class="row">
<h1>
	<p class="pull-right">
	<a href="/admin/menus" class="btn btn-default" title="{{ trans('kotoba::button.back') }}">
		<i class="fa fa-chevron-left fa-fw"></i>
		{{ trans('kotoba::button.back') }}
	</a>
	</p>
	<i class="fa fa-edit fa-lg"></i>
	{{ trans('kotoba::general.command.create') }}
	<hr>
</h1>
</div>


<div class="row">
{!! Form::open([
	'url' => 'admin/menus',
	'method' => 'POST',
	'class' => 'form-horizontal'
]) !!}


<div class="form-group">
<div class="input-group">
	<span class="input-group-addon"><i class="fa fa-tag fa-fw"></i></span>
		<input type="text" id="name" name="name" placeholder="{{ trans('kotoba::account.name') }}" class="form-control" autofocus="autofocus">
</div>
</div>


<div class="form-group">
<div class="input-group">
	<span class="input-group-addon"><i class="fa fa-info fa-fw"></i></span>
		<input type="text" id="class" name="class" placeholder="{{ trans('kotoba::cms.class') }}" class="form-control">
</div>
</div>

@if (count($locales))

<ul class="nav nav-tabs">
	@foreach( $locales as $locale => $properties)
		<li role="presentation" class="@if ($locale === $lang)active @endif" aria-controls="{{{ $locale }}}" role="tab" data-toggle="tab"><a href="#{{{ $locale }}}">{{{ $properties['native'] }}}</a></li>
	@endforeach
</ul>

<div class="tab-content margin-bottom-xl">

@foreach( $locales as $locale => $properties)
	<div class="tab-pane padding-md @if ($locale == $lang)in active @endif" id="{{{ $locale }}}">

		<div class="form-group">
			<label class="col-sm-1 control-label">{{ trans('kotoba::general.title') }}</label>
			<div class="col-sm-11">
				<input type="text" class="form-control" name="{{ $lang.'[title]' }}" id="{{ $lang.'[title]' }}">
			</div>
		</div>

		<div class="form-group">
			<label class="col-sm-1 control-label">{{ trans('kotoba::general.enabled') }}</label>
			<div class="col-sm-11">
				<div class="checkbox">
					<label>
						<input type="checkbox"  name="{{ $lang.'[status]' }}"  name="{{ $lang.'[status]' }}" value="1">
					</label>
				</div>
			</div>
		</div>

	</div>
@endforeach

</div>

@endif



<hr>


<div class="form-group">
	<input class="btn btn-success btn-block" type="submit" value="{{ trans('kotoba::button.save') }}">
</div>

{!! Form::close() !!}


<div class="row">
<div class="col-sm-6">
	<a href="/admin/menus" class="btn btn-default btn-block" title="{{ trans('kotoba::button.cancel') }}">
		<i class="fa fa-times fa-fw"></i>
		{{ trans('kotoba::button.cancel') }}
	</a>
</div>

<div class="col-sm-6">
	<input class="btn btn-default btn-block" type="reset" value="{{ trans('kotoba::button.reset') }}">
</div>
</div>


</div> <!-- ./ row -->
@stop
