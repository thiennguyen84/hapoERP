@extends('layouts.app')

@section('content')

<!-- Bootstrap Boilerplate... -->
    <div class="panel panel-default">
        <div class="panel-heading">
            <h3 class="text-center">THỐNG KÊ THÁNG @php echo date('m/Y') @endphp</h3>
        </div>
        <div class="panel-body">
            <table class="table table-striped task-table table-hover">
       
                <thead>
                    <th>STT</th>
                    <th>Ngày giờ điểm danh</th>
                </thead>
                
                
                <tbody>
                    @php 
                        $stt=1;
                        $dem=1;
                    @endphp
                    @foreach ($attendsion as $rows)
                        <tr>
                            <td class="table-text">
                                <div>{{ $stt++ }}</div>
                            </td>

                            <td class="table-text">
                                <div>{{ (new \Carbon\Carbon($rows->date))->format('d/m/Y - H:i:s') }}</div>
                            </td>
                        </tr>

                    @endforeach
                     	<tr>
                        	<th>Tổng số ngày điểm danh</th>
                        	<th>{{ $counts_attendsion }}</th>
                        </tr>
                       
                </tbody>
            </table>
            <div class="pagination-container text-center">
                {{ $attendsion->links() }}
            </div>
        </div>
    </div> 
@endsection