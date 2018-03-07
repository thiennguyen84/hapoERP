@extends('layouts.app')
@section('title')
<title>Thay đổi thông tin</title>
@endsession
@section('content')

<div class="col-md-8 col-xs-offset-2" style="top:80px;">	
	<div class="panel panel-primary">
		<div class="panel-heading">Edit Report</div>
		<div class="panel-body add-edit">
		<form method="POST" action="{{ route('report.update',$report->id) }}" enctype="multipart/form-data">
			 {{ csrf_field() }}
			 {{ method_field('PUT') }}
			<!-- rows -->
			<div class="row">	
				<p class="col-md-2">Today</p>
				<p class="col-md-10">
					<textarea rows="4" cols="50" name="today_content" class="form-control">{{ $report->today_content }}</textarea>
				</p>
			</div>
			<!-- end rows -->
			<!-- rows -->
			<div class="row">	
				<p class="col-md-2">Tomorrow</p>
				<p class="col-md-10">
					<textarea rows="4" cols="50" name="tomorrow_content" class="form-control">{{ $report->tomorrow_content }}</textarea>
				</p>
			</div>
			<!-- end rows -->
			<!-- rows -->
			<div class="row">	
				<p class="col-md-2">Problem</p>
				<p class="col-md-10">
					<textarea rows="4" cols="50" name="problem" class="form-control">{{ $report->problem }}</textarea>
				</p>
			</div>
			<!-- end rows -->
			<!-- rows -->
			<div class="row">
				<p class="col-md-2"></p>
				<p class="col-md-10">
					<input type="submit" value="Process" class="btn btn-primary">
					<a title="Quay lại" href="{{ route('report.index') }}" class="btn btn-danger">Back</a>
				</p>
			</div>
			<!-- end rows -->
		</form>
		</div>
	</div>
</div>
@endsection