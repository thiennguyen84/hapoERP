@extends('layouts.master')

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
                    @foreach ($overtimes as $rows)
                        <tr>
                            <td class="table-text">
                                <div>{{ $stt++ }}</div>
                            </td>

                            <td class="table-text">
                                <div>{{ (new \Carbon\Carbon($rows->date))->format('d/m/Y') }}</div>
                            </td>
                            <td class="table-text">
                                <div>{{ str_limit($rows->sum_hours, 5) }} hour</div>
                            </td>

                            <td class="table-text">
                                <div>{{ str_limit($rows->content, 50) }}</div>
                            </td>

                        </tr>

                    @endforeach
                    	<tr>
                        	<th>Tổng số giờ OT</th>
                        	<th></th>
                        	<th>{{ $sumHour }} hour</th>
                        	<th></th>
                        	<th></th>
                        </tr>
                       
                </tbody>
            </table>
            <div class="pagination-container text-center">
                {{ $overtimes->links() }}
            </div>
        </div>
    </div> 
@endsection