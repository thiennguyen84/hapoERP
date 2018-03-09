@extends('layouts.user')

@section('content')

<!-- Bootstrap Boilerplate... -->
    <div class="panel panel-default">
        <div class="panel-heading">
            <a href="{{ route('attendsion.create') }}" class="btn btn-primary attendtion">Điểm danh ngay</a>
            {{ csrf_field() }}
            {{ method_field('GET') }}
            <h3 class="text-center">TimeSheet</h3>
        </div>
        <div class="panel-body">
            <table class="table table-striped table-responsive task-table table-hover">
       
                <thead>
                    <th>STT</th>
                    <th>Ngày giờ điểm danh</th>
                </thead>
                
                
                <tbody>
                    @php 
                        $stt=1;
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
                       
                </tbody>
            </table>
            <div class="pagination-container text-center">
                {{ $attendsion->links() }}
            </div>
        </div>
    </div> 
@endsection