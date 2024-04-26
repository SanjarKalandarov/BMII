<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>

    <style>
        /* for the lazy */
        @import url(https://fonts.googleapis.com/css?family=Sanchez);

        *,
        *::before,
        *::after {
            transition: 400ms all ease-in-out 50ms;
            box-sizing: border-box;
            backface-visibility: hidden;
        }



        html,body{ text-align: center; font-family: 'Sanchez', serif;}

        input[type="checkbox"] {
            display: none;
        }

        a{ color: rgba(43,43,43,1); text-decoration: none; padding: 10px; border-bottom: 2px solid rgba(43,43,43,1); }

        a:hover{ background: rgba(43,43,43,1); color: rgba(255,255,255,1); }


        /*Button is :CHECKED*/

        input[type="checkbox"]:checked ~ div {
            background: rgba(73,168,68,1);
            box-shadow: 0 0 2px rgba(73,168,68,1);
        }

        input[type="checkbox"]:checked ~ div label {
            left: 110px;
            transform: rotate(360deg);
        }


        /*shared*/

        div,
        label {
            border-radius: 50px;
        }


        /*'un':checked state*/

        div {
            height: 100px;
            width: 200px;
            background: rgba(43, 43, 43, 1);
            position: relative;
            top: calc(50vh - 50px);
            left: calc(50vw - 100px);

            box-shadow: 0 0 2px rgba(43,43,43,1);

        }

        label {
            height: 80px;
            width: 80px;
            background: rgba(255, 255, 255, 1);
            position: absolute;
            top: 10px;
            left: 10px;
            cursor: pointer;
        }

        label::before {
            content: '';
            height: 60px;
            width: 5px;
            position: absolute;
            top: calc(50% - 30px);
            left: calc(50% - 2.5px);
            transform: rotate(45deg);
        }

        label::after {
            content: '';
            height: 5px;
            width: 60px;
            position: absolute;
            top: calc(50% - 2.5px);
            left: calc(50% - 30px);
            transform: rotate(45deg);
        }

        label::before,
        label::after{
            background: rgba(43,43,43,1);
            border-radius: 5px;
        }

        /* pesduo class on toggle */

        input[type="checkbox"]:checked ~ div label::before{
            height: 50px;
            top: calc(55% - 25px);
            left: calc(60% - 2.5px);
            background: rgba(73,168,68,1);
        }
        input[type="checkbox"]:checked ~ div label::after{
            width: 20px;
            top: calc(95% - 25px);
            left: calc(22.5% - 2.5px);
            background: rgba(73,168,68,1);
        }


    </style>
</head>
<body>
<h2>Xush kelibsiz</h2>
<input type="checkbox" id="toggle"/>
<div>
    <label for="toggle"></label>
</div>


    <script>
        // JavaScript kodlari
        document.getElementById('toggle').addEventListener('change', function() {
        // Foydalanuvchi toggle bosganda
        if (this.checked) {
        // Bazda foydalanuvchi login qilganligini aniqlash
        alert('Foydalanuvchi login qilgan');
    } else {
        // Foydalanuvchi toggleni o'chirganda
        alert('Foydalanuvchi login qilmagan');
    }
    });



</script>
</body>
</html>
