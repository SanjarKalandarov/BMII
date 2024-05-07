<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Dumaloq Button</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

</head>
<body>
<form id="mqttForm">
    @csrf
    <button type="button" id="mqttButton">Send Message</button>
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

</script>

</body>
</html>
