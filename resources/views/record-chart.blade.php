<!DOCTYPE html>
<html lang="en">
 <head>
 <meta charset="utf-8">
 <meta http-equiv="X-UA-Compatible" content="IE=edge">
 <meta name="viewport" content="width=device-width, initial-scale=1">
 <title>Usage Record Charts</title>
 {!! Charts::styles() !!}
 </head>
 <body>
 
 <div class="app">
 <center>
 {!! $chart->html() !!}
 </center>
 </div>
 
 {!! Charts::scripts() !!}
 {!! $chart->script() !!}
 </body>
</html>