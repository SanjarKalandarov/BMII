<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Dumaloq Button</title>
    <style>
        .button {
            width: 100px;
            height: 100px;
            border-radius: 50%;
            background-color: #4CAF50;
            color: white;
            border: none;
            text-align: center;
            font-size: 16px;
            line-height: 100px; /* Button ichidagi matn markazida bo'lishi uchun */
            cursor: pointer;
            outline: none;
        }
        .button:active {
            background-color: #3e8e41;
        }
    </style>
</head>
<body>

<form id="mqttForm" action="{{ route('connect_send') }}" method="post">
    @csrf
    <input type="hidden" value="1" name="action">
    <button type="submit" class="button" id="myButton">Bos!</button>
</form>

<script>

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
