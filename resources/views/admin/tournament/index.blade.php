@extends('layout.admin_layout')
@section('content')
    <style>
        label:not(.form-check-label):not(.custom-file-label) {
            font-weight: 500;
        }
    </style>
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light"> </span> Danh Sách Giải Đấu</h4>
        <div class="card" style="padding: 10px">
            <div class=" container-xl table-responsive text-nowrap">
                <table class="table table-bordered table-hover" cellspacing="0" width="100%" id="dataTables">
                    <thead>
                    <tr class="design-text">
                        <th scope="col">ID</th>
                        <th scope="col">Tên giải đấu</th>
                        <th scope="col">Ngày Bắt Đầu</th>
                        <th scope="col">Ngày Kết Thúc</th>
                        <th scope="col">Hình ảnh</th>
                        <th scope="col">Hình thức thi đấu</th>
                        <th scope="col">Thể thức thi đấu</th>
                        <th scope="col">Số Đội Tham Gia</th>
                        <th scope="col">Số người tham gia mỗi đội</th>
                        <th scope="col">Action</th>
                    </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                    @foreach($listTournament as $data)
                        <tr>
                            <td>{{ $data->id }}</td>
                            <td>{{$data->name}}</td>
                            <td>{{ $data->start_date }}</td>
                            <td>{{ $data->end_date }}</td>
                            <td><img class ="image" src="{{$data->image}}" alt="avatar" style="width: 150px"></td>
                            <td>{{ $data->format }}</td>
                            <td>{{ $data->type }}</td>
                            <td>{{ $data->number_of_team }}</td>
                            <td>{{ $data->people_of_team }}</td>
                            <td>
                                <a href="{{route('tournament.edit',$data['id'])}}">
                                    <button type="button" class="btn btn-info">Sửa</button>
                                </a>
                                <a href="">
                                    <button type="button" class="btn btn-danger">Xóa</button>
                                </a>
                            </td>
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
