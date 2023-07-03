<!DOCTYPE html>
<html lang="kr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <style>
        @font-face{
        font-family:NanumMyeongjo;  
        src: url("{{ resource_path('fonts/MYUNGJO/NanumMyeongjo.ttf') }}") format('truetype');

    }
    body{
        font-family:NanumMyeongjo;  
        text-align: center;
    }
    .logo{
        margin-top: 5rem;
    }
    .title{
        font-size: 1.75rem;
    }
    #numbering{
        text-align: left;
    }
    #numbering span{
        text-decoration: underline;

    }
    .info{
        font-size: 1.25rem;
        text-align: right;
        margin-top: 5rem;
        margin-right: 7rem;
        
    }
    .comment{
        font-size: 1.5rem;
        margin-top: 7rem;
    }
    .date{
        font-size: 1.25rem;
        margin-top: 7rem;
    }
    #host1{
        margin-top: 7rem;
        font-size: 1.5rem;
        position: relative;
    }
    #host1 img{
        position: absolute;
        right: 100px;
        top: -15px;
        
    }
    </style>
</head>
<body>
    <div>
        <div id="numbering" class="mt-3 ml-3">
            <span>제  {{ substr($submit->created_at,0,4) }} - {{ $submit->id }}호</span>
        </div>
        <div class="logo">
            <img src="{{ resource_path('img/logo.png') }}" alt="">
        </div>
        <div class="title mt-5">
            이&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            수&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            증
        </div>
        <div class="info">
            <div>
                <span>성&nbsp;&nbsp;명 :</span>
                <span>{{ $submit->name }}</span>
            </div>
        </div>
        <div class="comment">
            위 사람은 한국푸드아트테라피학회가 주최하는<br>
            2022년 정기 학술대회에 참여하여 소정의 과정을<br>
            이수하였으므로 이에 증서를 수여합니다.
        </div>
        <div class="date">
            {{ substr($today,0,4) }}년&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            {{ substr($today,5,2) }}월&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            {{ substr($today,8,2) }}일
        </div>
        <div id="host1">
            {{ config('cm.host1') }}
            <img src="{{ resource_path('img/stamp.png') }}" alt="">
        </div>
    </div>
</body>
</html>