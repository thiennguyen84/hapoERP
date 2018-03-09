@extends('layouts.user')

@section('content')

<div class="container">
    <div class="row">
        <h2 class="text-center">THÔNG TIN CHI TIẾT OVERTIME</h2>
        <td>
            <a title="Chỉnh sửa" href="{{ route('overtime.edit',$overtime->id) }}" class="glyphicon glyphicon-edit btn btn-primary"></a>
            <a title="Quay lại" href="{{ route('overtime.index') }}" class="btn btn-danger">Back</a>
        </td>
        <div class="row">
            <h2 class="text-center">OverTime Ngày {{ (new \Carbon\Carbon($overtime->date))->format('d/m/Y') }}</h2>
        </div>

        <div class="row">
            <p class="col-md-2">From Time</p>
            <p class="col-md-10">
                <input type="time" name="from" class="form-control" value="{{ $overtime->start_time }}" disabled=""></input>
            </p>
        </div>

        <div class="row">
            <p class="col-md-2">To Time</p>
            <p class="col-md-10">
                <input type="time" name="to" class="form-control" value="{{ $overtime->end_time }}" disabled=""></input>
            </p>
        </div>

        <div class="row">
            <p class="col-md-2">Content</p>
            <p class="col-md-10">
                <textarea name="content" class="form-control" disabled="">{{ $overtime->content }}</textarea>
            </p>
        </div>
    </div>
</div>
@endsection