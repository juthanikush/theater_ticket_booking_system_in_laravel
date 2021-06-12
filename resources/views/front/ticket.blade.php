<html>
    <head>
        <title>Ticket</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" integrity="sha384-HSMxcRTRxnN+Bdg0JdbxYKrThecOKuH5zCYotlSAcp1+c8xmyTe9GYg1l9a69psu" crossorigin="anonymous">
        <link rel="stylesheet" href="{{asset('front_asset/css/style.css')}}" >
            </head>
    <body>
        <div class="col-md-12">
            <div class="ticket">
                <p class="left">Theater Name</p>
                <p class="font">Name : {{$user[0]->username}}</p>
                <p class="font">Movie Name : {{$shows[0]->show_name}}</p>
                <p class="font">Time : {{$shows[0]->start_time}} {{$shows[0]->start_time_sloat}} TO {{$shows[0]->end_time}} {{$shows[0]->end_time_sloat}}</p>
                <p class="font">Balcony Sets : {{$book[0]->balcony_set}}</p>
               	<p class="font">Mezzanine Sets : {{$book[0]->mezzanine_set}}</p>
                <p class="font">Orchestra Sets : {{$book[0]->orchestra_set}}</p>
                <p class="font">Price : {{$book[0]->total_amt}}</p>

            </div>
        </div>   
        <div class="button">
            <button onclick="window.print()" class="btn-success">Download</button>
        </div>
    </body>
</html>