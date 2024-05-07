<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Dumaloq Button</title>
    <style>


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


    .pushable:hover .front {
    transform: translateY(-6px);
    transition: transform 250ms cubic-bezier(0.3, 0.7, 0.4, 1.5);
    }

    .pushable:active .front {
    transform: translateY(-2px);
    transition: transform 34ms;
    }

    .pushable:hover .shadow {
    transform: translateY(4px);
    transition: transform 250ms cubic-bezier(0.3, 0.7, 0.4, 1.5);
    }

    .pushable:active .shadow {
    transform: translateY(1px);
    transition: transform 34ms;
    }

    .pushable:focus:not(:focus-visible) {
    outline: none;
    }
    </style>
</head>
<body>

<div class="center">
<h2 class="center">Xush kelibsiz</h2>
</div>
<form method="POST" action="{{ route('logout') }}">
    @csrf

    <x-dropdown-link :href="route('logout')"
                     onclick="event.preventDefault();
                                                this.closest('form').submit();">
        {{ __('Log Out') }}
    </x-dropdown-link>
</form>
<form id="mqttForm" class="">
    @csrf
    <button type="button"  class="front" id="mqttButton">Send Message</button>
</form>

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
    document.addEventListener('DOMContentLoaded', function() {
        setTimeout(function() {
            // Oturishni yakunlash
            window.location.href = '{{ route("logout") }}';
        }, 30000); // 30,000 millyon ikki soniya (30 sekund)
    });

</script>

</body>
</html>
