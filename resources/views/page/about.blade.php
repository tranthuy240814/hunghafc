@extends('layouts.page')

@section('title')
    {{ env('APP_NAME', 'Badminton.io') }} - {{ __('About') }}
@endsection
<style>
    .c-introduction {
        background: #fff;
        margin-bottom: 20px;
        padding: 20px;
        border-radius: 10px;
        box-shadow: 0 0 12px 0 #aaa;
    }

    .c-award {
        background: #f7f6f6;
        border-radius: 10px;
        padding: 20px;
        margin-bottom: 20px;
    }

    .c-introduction .wcs-page_body {
        font-size: 20px;
    }
</style>
@section('content')
    <section class="container">
        <div class="d-home-box">
            <div class="is-title">
                <h4 style="color:black;">Giới thiệu <i class='fas fa-angle-double-right'></i></h4>
                <a href="">
                    <i class="bi bi-chevron-double-right"></i>
                </a>
            </div>
        </div>
        <div>
            <img class=" b-error b-error" width="100%"
                 src="{{ asset('images/hunghafc.jpg') }}">
        </div>
    </section>
    <section id="heading">
        <div class="container c-introduction">
            <h1 class="text-center"> Giới thiệu</h1>
            <p class="wcs-page_body">
                Đội bóng "FC Hưng Hà" là một nhóm cầu thủ không chuyên, chủ yếu là anh em bạn bè ở khu vực Hưng Hà, tỉnh Thái Bình, tập hợp lại để rèn luyện sức khỏe và tạo sân chơi thể thao bổ ích. Đội bóng này không tham gia vào các giải đấu chính thức như các đội bóng chuyên nghiệp, nhưng nó có vai trò quan trọng trong việc kết nối cộng đồng và thúc đẩy lối sống lành mạnh.

                1. Mục đích thành lập
                Đội bóng "Anh Em Hưng Hà" được thành lập với mục tiêu đơn giản nhưng đầy ý nghĩa: tạo ra một sân chơi thể thao để mọi người trong khu vực có cơ hội rèn luyện sức khỏe, giao lưu, và gắn kết tình bạn. Đây là nơi các thành viên có thể cùng nhau tập luyện, vui chơi và chia sẻ niềm đam mê bóng đá.

                2. Thành viên và tinh thần đội bóng
                Các thành viên của đội bóng chủ yếu là người dân địa phương, bao gồm anh em, bạn bè, đồng nghiệp và những người cùng sở thích. Đội không có sự phân biệt về độ tuổi hay trình độ bóng đá, miễn là mọi người có niềm đam mê và yêu thích môn thể thao này. Tinh thần của đội là sự đoàn kết, chơi fair-play và hỗ trợ lẫn nhau để cùng tiến bộ.

                3. Hoạt động và tập luyện
                Đội bóng "Anh Em Hưng Hà" thường xuyên tổ chức các buổi tập và trận đấu giao hữu tại các sân bóng ở địa phương. Các buổi tập luyện không chỉ nhằm nâng cao kỹ năng cá nhân mà còn giúp các thành viên tăng cường thể lực và cải thiện sức khỏe. Ngoài ra, đội cũng tổ chức các buổi giao lưu, thi đấu với các đội bóng khác trong khu vực để tạo thêm động lực cho các thành viên.

                4. Ý nghĩa xã hội
                Đội bóng này không chỉ giúp các thành viên rèn luyện sức khỏe mà còn là nơi tạo dựng mối quan hệ, xây dựng cộng đồng. Những trận đấu hay buổi tập luyện cùng nhau là cơ hội để các thành viên gặp gỡ, trò chuyện và gắn bó với nhau hơn. Đội bóng cũng góp phần xây dựng tinh thần thể thao và lối sống tích cực trong cộng đồng.

                5. Tương lai và phát triển
                Mặc dù hiện tại đội bóng "Anh Em Hưng Hà" chưa tham gia các giải đấu lớn, nhưng trong tương lai, đội có thể mở rộng quy mô và tham gia vào các giải đấu phong trào hoặc các giải bóng đá địa phương để thử thách bản thân và nâng cao kỹ năng. Đội cũng có thể mời gọi thêm các thành viên mới để phát triển đội bóng và tăng cường sự đa dạng, phong phú trong các buổi tập và thi đấu.

                Tóm lại, đội bóng "Anh Em Hưng Hà" là một minh chứng cho tinh thần thể thao, đoàn kết và đam mê của cộng đồng địa phương. Đội bóng không chỉ là nơi rèn luyện sức khỏe mà còn là một phần của cuộc sống, nơi gắn kết mọi người lại với nhau.
            </p>
        </div>
    </section>

    <section id="heading">
        <div class="container c-award">
            <h1 class="text-center"> Danh hiệu</h1>
            <div>
                <img class=" b-error b-error" width="100%"
                     src="{{ asset('images/cup.jpg') }}">
            </div>
        </div>
    </section>

    <section id="next-tournament" class="next-tournament-section bg-black" style="background: #ebebeb !important">
        <div class="next-tournament-wrap">
            <div class="results">
                <div class="wrapper-results">
                    <div class="box-results-tournament">
                        <div class="box-results-tournament-left">

                            <div class="info">
                                <a href="">
                                    <h4 style="color: black" class="leage-name">BAN LÃNH ĐẠO</h4>
                                    <h1 class="" style="color:blue;">Nguyễn Anh Tuấn</h1>

                                </a>
                            </div>
                        </div>


                        <div class="box-results-tournament-right" style="width: 30%;">
                            <div class="logo-right">
                                <img style="width: 100%" alt="" src="https://vsports-assets-hfevhbaxghane9f2.z01.azurefd.net/files/1731257205983-XOpp.jpeg" >
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="heading">
        <div class="container">
            <h1 class="text-center">Sân thi đấu</h1>
            <div class="d-flex">

                <div>
                    <a href="https://www.google.com/maps/place/S%C3%A2n+B%C3%B3ng+%C4%90%E1%BA%A1i+Nam+(+Ph%E1%BA%A1m+Tu+)/@21.0010112,105.7980416,9070m/data=!3m1!1e3!4m6!3m5!1s0x3135ad003d48423d:0xf97e42489c5c485a!8m2!3d20.9686614!4d105.8029465!16s%2Fg%2F11w3nj8qqj?entry=ttu&g_ep=EgoyMDI0MTIwMS4xIKXMDSoASAFQAw%3D%3D" target="_blank">
                        <img class=" b-error b-error" width="100%" title="click để xem địa chỉ"
                             src="{{ asset('images/gg_map.png') }}">
                    </a>

                </div>

            </div>
        </div>
    </section>





@endsection
