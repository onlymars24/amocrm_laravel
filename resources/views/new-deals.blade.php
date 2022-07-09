<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/style.css">
    <title>Document</title>
</head>
<body>
    <header class="header">        
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container">
            <div class="container-fluid">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarText">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link" href="#">Новые сделки</a>
                </li>
                </ul>
            </div>
            </div>
        </div>
        </nav>        
    </header>
    <div class="notes">
        <div class="container">
            <div class="row">
                @foreach($leads as $lead)
                <div class="col-8">
                    <div class="note">
                        <div class="note__link"><a href="/add/{{$lead->id}}">Добавить в базу</a></div>
                        <h2 class="note__title">{{$lead->name}}</h2>
                        <p class="date">
                            Создана: {{ date('d.m.Y H:i:s', $lead->created_at)  }}
                        </p>
                        @if(empty($lead->closed_at))
                        <p class="date">
                            Изменена: {{ date('d.m.Y H:i:s', $lead->updated_at) }}
                        </p>
                        @endif
                        @if(!empty($lead->closed_at))
                        <p class="date">
                            Завершена: {{ date('d.m.Y H:i:s', $lead->closed_at) }}
                        </p>
                        @endif
                        <p class="note__right">
                           <p>Стоимость: {{$lead->price}} рублей</p> 
                        </p>
                    </div>	
                </div>
                @endforeach
            </div>
        </div>
    </div>

    
    <script src="js/bootstrap.js"></script>
</body>
</html>