@extends('layouts.user')

@section('content')

<!-- Bootstrap Boilerplate... -->
    <div class="panel panel-default">
        <div class="panel-heading">
            <h3 class="text-center">THỐNG KÊ OVERTIME THÁNG @php echo date('m/Y') @endphp</h3>
        </div>
        <div class="panel-body">
            <table class="table table-responsive table-striped task-table table-hover">
       
                <thead>
                    <th>STT</th>
                    <th>Date</th>
                    <th>Total hours</th>
                    <th>Content</th>
                </thead>
                 
                <tbody>
                    @php 
                        $stt=1;
                    @endphp
                    @foreach ($overtime as $rows)
                        <tr>
                            <td class="table-text">
                                <div>{{ $stt++ }}</div>
                            </td>

                            <td class="table-text">
                                <div>{{ (new \Carbon\Carbon($rows->date))->format('d/m/Y') }}</div>
                            </td>
                            <td class="table-text">
                                <div>{{ $rows->hours }} hour</div>
                            </td>

                            <td class="table-text">
                                <div>{{ str_limit($rows->content, 80) }} hour</div>
                            </td>

                            <td>
                                <a title="Chi tiết" href="{{ route('overtime.show',$rows->id) }}" class="glyphicon glyphicon-book btn btn-primary"></a>
                            </td>
                        </tr>

                    @endforeach
                    	<tr>
                        	<th>Tổng số giờ OT</th>
                        	<th></th>
                        	<th>{{ $sumOvertime }} hour</th>
                        	<th></th>
                        	<th></th>
                        </tr>
                       
                </tbody>
            </table>
            <div class="pagination-container text-center">
                {{ $overtime->links() }}
            </div>
        </div>
    </div> 
@endsection