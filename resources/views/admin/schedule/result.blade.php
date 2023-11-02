@extends('layout.admin_layout')
@section('content')
    <style>
        label:not(.form-check-label):not(.custom-file-label) {
            font-weight: 500;
        }
    </style>
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light"> </span> Lịch Thi Đấu</h4>
        <div class="card" style="padding: 10px">
            <div class=" container-xl table-responsive text-nowrap">
                <table class="table table-bordered table-hover" cellspacing="0" width="100%" id="dataTables">
                    <thead>
                    <tr class="design-text">
                        <th scope="col" style="width: 15px">Giải đấu</th>
                        <th scope="col" style="width: 15px">Vòng đấu</th>
                        <th scope="col">Đội 1</th>
                        <th scope="col">Đội 2</th>
                        <th scope="col" style="width: 15px">Tổng tỉ số</th>
                        <th scope="col" style="width: 15px">Tỉ số trận 1</th>
                        <th scope="col" style="width: 15px">Tỉ số trận 2</th>
                        <th scope="col" style="width: 15px">Tỉ số trận 3</th>
                        <th scope="col">Sân thi đấu</th>
                    </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                    @foreach($dataResult as $data)
                        <tr>
                            <td>{{ $data->tournament->name }}</td>
                            <td>{{ $data->match }}</td>
                            <td>{{ $data->team1->name }}</td>
                            <td>{{ $data->team2->name }}</td>
                            <td>
                                <div class="row">
                                    <div class="col-lg-4">
                                        {{$data->result_team_1}}
                                    </div>
                                    <div class="col-lg-4">
                                        -
                                    </div>
                                    <div  class="col-lg-2">
                                        {{$data->result_team_2}}
                                    </div>
                                </div>
                            </td>
                            <td>
                                <div class="row">
                                    <div class="col-lg-4">
                                        {{$data->set_1_team_1}}
                                    </div>
                                    <div class="col-lg-4">
                                       -
                                    </div>
                                    <div  class="col-lg-2">
                                        {{$data->set_1_team_2}}
                                    </div>
                                </div>
                            </td>
                            <td>
                                <div class="row">
                                    <div class="col-lg-4">
                                        {{$data->set_2_team_1}}
                                    </div>
                                    <div class="col-lg-4">
                                        -
                                    </div>
                                    <div  class="col-lg-2">
                                        {{$data->set_2_team_2}}
                                    </div>
                                </div>
                            </td>
                            <td>
                                <div class="row">
                                    <div class="col-lg-4">
                                        {{$data->set_3_team_1}}
                                    </div>
                                    <div class="col-lg-4">
                                        -
                                    </div>
                                    <div  class="col-lg-2">
                                        {{$data->set_3_team_2}}
                                    </div>
                                </div>
                            </td>
                            <td>{{$data->stadium}}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>
    <script>
        $(document).ready(function() {
            $('#dataTables').DataTable({
                pagingType: 'full_numbers',
            });
            $('.dataTables_length').addClass('bs-select');
        })
    </script>
@endsection
