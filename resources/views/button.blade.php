<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Dumaloq Button</title>
    <style>
{{--        body{--}}
{{--            text-align:center;--}}
{{--            background-color:#ffcc8e;--}}
{{--        }--}}

{{--        .button{--}}
{{--            position:relative;--}}
{{--            display:inline-block;--}}
{{--            margin:20px;--}}
{{--        }--}}

{{--        .button a{--}}
{{--            color:white;--}}
{{--            font-family:Helvetica, sans-serif;--}}
{{--            font-weight:bold;--}}
{{--            font-size:36px;--}}
{{--            text-align: center;--}}
{{--            text-decoration:none;--}}
{{--            background-color:#FFA12B;--}}
{{--            display:block;--}}
{{--            position:relative;--}}
{{--            padding:20px 40px;--}}

{{--            -webkit-tap-highlight-color: rgba(0, 0, 0, 0);--}}
{{--            text-shadow: 0px 1px 0px #000;--}}
{{--            filter: dropshadow(color=#000, offx=0px, offy=1px);--}}

{{--            -webkit-box-shadow:inset 0 1px 0 #FFE5C4, 0 10px 0 #915100;--}}
{{--            -moz-box-shadow:inset 0 1px 0 #FFE5C4, 0 10px 0 #915100;--}}
{{--            box-shadow:inset 0 1px 0 #FFE5C4, 0 10px 0 #915100;--}}

{{--            -webkit-border-radius: 5px;--}}
{{--            -moz-border-radius: 5px;--}}
{{--            border-radius: 5px;--}}
{{--        }--}}

{{--        .button a:active{--}}
{{--            top:10px;--}}
{{--            background-color:#F78900;--}}

{{--            -webkit-box-shadow:inset 0 1px 0 #FFE5C4, inset 0 -3px 0 #915100;--}}
{{--            -moz-box-shadow:inset 0 1px 0 #FFE5C4, inset 0 -3pxpx 0 #915100;--}}
{{--            box-shadow:inset 0 1px 0 #FFE5C4, inset 0 -3px 0 #915100;--}}
{{--        }--}}

{{--        .button:after{--}}
{{--            content:"";--}}
{{--            height:100%;--}}
{{--            width:100%;--}}
{{--            padding:4px;--}}
{{--            position: absolute;--}}
{{--            bottom:-15px;--}}
{{--            left:-4px;--}}
{{--            z-index:-1;--}}
{{--            background-color:#2B1800;--}}
{{--            -webkit-border-radius: 5px;--}}
{{--            -moz-border-radius: 5px;--}}
{{--            border-radius: 5px;--}}
{{--        }--}}

{{--    </style>--}}

    .pushable {
    position: relative;
    background: transparent;
    padding: 0px;
    border: none;
    cursor: pointer;
    outline-offset: 4px;
    outline-color: deeppink;
    transition: filter 250ms;
    -webkit-tap-highlight-color: rgba(0, 0, 0, 0);
    }

    .shadow {
    position: absolute;
    top: 0;
    left: 0;
    height: 100%;
    width: 100%;
    background: hsl(226, 25%, 69%);
    border-radius: 8px;
    filter: blur(2px);
    will-change: transform;
    transform: translateY(2px);
    transition: transform 600ms cubic-bezier(0.3, 0.7, 0.4, 1);
    }

    .edge {
    position: absolute;
    top: 0;
    left: 0;
    height: 100%;
    width: 100%;
    border-radius: 8px;
    background: linear-gradient(
    to right,
    hsl(248, 39%, 39%) 0%,
    hsl(248, 39%, 49%) 8%,
    hsl(248, 39%, 39%) 92%,
    hsl(248, 39%, 29%) 100%
    );
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

    .pushable:hover {
    filter: brightness(110%);
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


{{--    <input type="hidden" value="1" name="action">--}}
{{--    <button type="submit" class="button" id="myButton">Bos!</button>--}}

{{--    <div ontouchstart="">--}}
{{--        <div class="button">--}}
{{--            <a href="#">Mobile First</a>--}}
{{--        </div>--}}
{{--    </div>--}}

<div class="center">
<h2 class="center">Xush kelibsiz</h2>
</div>

<form id="mqttForm" action="{{ route('connect_send') }}" method="post">
    @csrf
<button class="pushable" >
    <span class="shadow"></span>
    <span class="edge"></span>

    <button class="front">
        Push Me
      </button>

</button>
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
