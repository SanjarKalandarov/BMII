<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Dumaloq Button</title>
    <style>
        .center {
            text-align: center;
        }

        h2.center {
            margin-top: 0;
        }

        #mqttForm {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh; /* Ekranning to'liq balandligini egallaydi */
            margin: 0;
            padding: 0;
            background-color: #f7f7f7; /* Orqa fon rangi */
        }

        #mqttButton {
            padding: 10px 20px;
            font-size: 16px;
            color: #fff;
            background-color: #007bff;
            border: none;
            border-radius: 5px;
            box-shadow: 0 4px 8px rgba(0, 123, 255, 0.3);
            cursor: pointer;
            transition: all 0.3s ease;
            /* 3D effekt uchun */
            transform: perspective(1px) translateZ(0);
            box-shadow: 0 0 1px transparent;
        }

        #mqttButton:before {
            content: '';
            position: absolute;
            border: 10px solid #0056b3;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            z-index: -1;
            border-radius: 5px;
            transform: scaleX(0);
            transform-origin: 0 50%;
            transition: transform 0.3s ease-out;
        }

        #mqttButton:hover, #mqttButton:focus, #mqttButton:active {
            background-color: #0056b3;
            box-shadow: 0 6px 12px rgba(0, 123, 255, 0.5);
            /* 3D effekt uchun */
            transform: scale(1.05);
        }

        #mqttButton:hover:before, #mqttButton:focus:before, #mqttButton:active:before {
            transform: scaleX(1);
        }

        /* Media so'rovlar yordamida tugmani turli ekran o'lchamlariga moslashtirish */
        @media (max-width: 768px) {
            #mqttButton {
                padding: 8px 16px;
                font-size: 14px;
            }
        }


    .front {
    display: block;
    position: relative;
    border-radius: 8px;
    background: hsl(248, 53%, 58%);
    padding: 16px 32px;
    color: white;
    font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, Oxygen,
    Ubuntu, Cantarell, "Open Sans", "Helvetica Neue", sans-serif;
    font-weight: 600;
    text-transform: uppercase;
    letter-spacing: 1.5px;
    font-size: 1rem;
    transform: translateY(-4px);
    transition: transform 600ms cubic-bezier(0.3, 0.7, 0.4, 1);
    }

    #mqttForm {
        display: flex;
        justify-content: center;
        align-items: center;
        height:90vh; /* Ekranning to'liq balandligini egallaydi */
        margin: 0;
        padding: 0;
        background-color: #f7f7f7; /* Orqa fon rangi */
    }

    #mqttButton {
        padding: 20px 30px;
        font-size: 20px;
        color: #fff;
        background-color: #007bff;
        border: none;
        border-radius: 5px;
        box-shadow: 0 4px 8px rgba(0, 123, 255, 0.3);
        cursor: pointer;
        transition: all 0.3s ease;
    }

    #mqttButton:hover {
        background-color: #0056b3;
        box-shadow: 0 6px 12px rgba(0, 123, 255, 0.5);
    }
    .row{
        position: absolute;
        bottom: 0;
        display: flex;
        justify-content: space-between;
        width: 100%;
        padding-bottom: 20px;
    }
    /* Media so'rovlar yordamida tugmani turli ekran o'lchamlariga moslashtirish */
    @media (max-width: 768px) {
        #mqttButton {
            padding: 15px 20px;
            font-size: 14px;
        }
    }
*{
    margin: 0;
    padding: 0;


}

      body ,.row {
          /*border-top: 50px solid blue;*/
          /*border: 50px solid blue;*/
          overflow: hidden;

        }

        @media (max-width: 768px) {
            .justify-content-center {
                flex-direction: column;
            }
        }

    </style>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
</head>
<body>


{{--<form method="POST" action="{{ route('logout') }}">--}}
{{--    @csrf--}}

{{--    <x-dropdown-link :href="route('logout')"--}}
{{--                     onclick="event.preventDefault();--}}
{{--                                                this.closest('form').submit();">--}}
{{--        {{ __('Log Out') }}--}}
{{--    </x-dropdown-link>--}}
{{--</form>--}}
<main>

<section>

    <form id="mqttForm" class="">

        @csrf
        <button type="button"  class="front" id="mqttButton">Ochish</button>
    </form>

    <div class="row">
        <div class="col-md-6" >
            <div class="justify-content-center " style="text-align: center;">
                <form method="POST" action="{{ route('logout') }}">
                    @csrf

                    <x-responsive-nav-link :href="route('logout')"
                                           onclick="event.preventDefault();
                                        this.closest('form').submit();">
                        <i class="fa fa-sign-out" style="color: black;font-size: 100px;margin-top:30px;"></i>
                    </x-responsive-nav-link>
                </form>
            </div>
        </div>
        <div class="col-md-6" >
            <div class="justify-content-center" style="text-align: center" >

                <a href="{{route('profile.edit')}}">   <i class="fa fa-user" style="color: black;font-size: 100px;margin-top:30px" ></i></a>
            </div>
        </div>
    </div>

</section>





</main>
<script>

    $(document).ready(function() {
        var intervalId; // Aralık kimliği için değişken

        // Düğmeye tıklandığında
        $('#mqttButton').click(function() {
            // Xabar '1'ni MQTT ga yuborish
            $.ajax({
                url: "{{ route('connect_send') }}", // Laravel route for sending message '1'
                type: "GET",
                data: $('#mqttForm').serialize(),
                success: function(response) {
                    console.log(response); // Controllerdan gelen yanıtı konsola yazdırma

                    // Daha önce başlatılmış bir aralık varsa, önceki aralığı temizle
                    if (intervalId) clearInterval(intervalId);

                    // 30 saniye sonra bir '0' mesajı gönder
                    intervalId = setInterval(function() {
                        sendZeroMessage();
                    }, 30000); // 30 saniye = 30000 milisaniye
                },
                error: function(xhr, status, error) {
                    console.error(xhr.responseText);
                }
            });
        });

        // '0' mesajı gönderme fonksiyonu
        function sendZeroMessage() {
            $.ajax({
                url: "{{ route('send.zero.message') }}", // Laravel route for sending message '0'
                type: "GET",
                data: $('#mqttForm').serialize(),
                success: function(response) {
                    console.log(response); // Controllerdan gelen yanıtı konsola yazdırma
                },
                error: function(xhr, status, error) {
                    console.error(xhr.responseText);
                }
            });
        }
    });
    // Foydalanuvchi sahifani yuklagandan so'ng 30 sekund o'tgandan so'ng oturishni yakunlash
    {{--document.addEventListener('DOMContentLoaded', function() {--}}
    {{--    setTimeout(function() {--}}
    {{--        // Oturishni yakunlash--}}
    {{--        window.location.href = '{{ route("logout") }}';--}}
    {{--    }, 30000); // 30,000 millyon ikki soniya (30 sekund)--}}
    {{--});--}}
    // Foydalanuvchi sahifani yuklagandan so'ng 30 sekund o'tgandan so'ng oturishni yakunlash
    {{--document.addEventListener('DOMContentLoaded', function() {--}}
    {{--    setTimeout(function() {--}}
    {{--        // Oturishni yakunlash--}}
    {{--        window.location.href = '{{ route("logout") }}';--}}
    {{--    }, 30000); // 30,000 millyon ikki soniya (30 sekund)--}}
    {{--});--}}

</script>

</body>
</html>
