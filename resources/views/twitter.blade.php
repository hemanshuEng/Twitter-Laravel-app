<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Twiter</title>
    <link rel="stylesheet" href="https://bootswatch.com/4/cerulean/bootstrap.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
</head>
<body>
        <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
                <a class="navbar-brand" href="/">MyTwitter</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor01" aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
                  <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarColor01">
                  <ul class="navbar-nav mr-auto">
                    <li class="nav-item active">
                      <a class="nav-link" href="/">Home <span class="sr-only">(current)</span></a>
                    </li>
                </div>
              </nav>
            <div class="container mt-3">

             @if(count($errors)>0)
                @foreach ($errors->all() as $error)
                    <div class="alert alert-danger">
                        {{$error}}
                    </div>
                @endforeach


             @endif
            <form  class ="card"action="{{route('post.tweet')}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                  <label for="tweet">Tweet</label>
                  <input type="text" class="form-control" name="tweet" id="" aria-describedby="helpId" placeholder="">
                </div>
               <div class="form-group">
                 <label for="img">img</label>
                 <input type="file" multiple class="form-control-file" name="images[]" id="" placeholder="" aria-describedby="fileHelpId">
               </div>
               <div class="form-group">
               <button type="submit" class="btn btn-primary">Create Tweet</button>
                </div>
            </form>
            <div class="row">
                @if (!empty($data))
                    @foreach ($data as $key=>$tweet)
                        <div class="card mt-2  col-md-3">
                            <div class="card-body">
                            <h4 class="card-title">{{$tweet['text']}}</h4>
                            <i class = "far fa-heart">{{$tweet['favorite_count']}}</i>
                            <i class="fas fa-retweet">{{$tweet['retweet_count']}}</i>
                            <p class="card-text">{{$tweet['text']}}</p>
                            </div>
                            @if (!empty($tweet['extended_entities']['media']))
                                @foreach ($tweet['extended_entities']['media'] as $item)
                                <img class="card-img-bottom" src="{{$item['media_url_https']}}" alt="Card image cap">
                                @endforeach
                            @endif

                        </div>
                    @endforeach
                @else
                    <p>No tweet Found</p>
                @endif
            </div>
            </div>
</body>
</html>

