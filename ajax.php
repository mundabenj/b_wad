<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Ajax & JS</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Varela">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    </head>
    <body>
        <div class="grid-container centered">
            <div class="grid-100">
                <div class="container">
                    <div class="grid-100">
                        <div class="heading">
                            <h1>Bring the Ajax Tool</h1>
                        </div>
                        <button id="load" onclick="sendAJAX()" class="button"> Bring the side bar</button>
                        <ul id="ajax">

                        </ul>
                    </div>
<form action="">
    <input type="text" class="form-control form-control-lg" name="search_text" id="search_text" placeholder="Search" aria-label=".form-control-lg example" autofocus autocmplete="off">
</form>
<br>
<div id="result_list"></div>

                </div>
            </div>
        </div>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" async defer></script>
        <script src="js/UserDisplay.js"></script>
            <script>
        var xhr = new XMLHttpRequest();
        xhr.open('GET', 'side_bar.html');
        xhr.onreadystatechange = function(){
            if(xhr.readyState === 4){
                document.getElementById('ajax').innerHTML = xhr.responseText;
            }
        };
        
        function sendAJAX(){
            xhr.send();
            document.getElementById('load').style.display = 'none';
        }
    </script>
    </body>
</html>