<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <title>Document</title>
</head>
<style>
    @font-face{
        font-family:NanumMyeongjo;  
        src: url("{{ resource_path('fonts/MYUNGJO/NanumMyeongjo.ttf') }}") format('truetype');
    }
    body{
        font-family:NanumMyeongjo;  
        text-align: center;
        width: 100%;
        height: 100%;
        position: relative;
    }
    #numbering{
        text-align: left;
    }
    #numbering span{
        text-decoration: underline;

    }
    #outerBorder{
        width: 90%;
        height: 80%;
        border: 1px solid #000;
        position: absolute;
        left: 50%;
        top:50%;
        transform: translate(-50%,-50%);
    }
    .title{
        font-size: 1.5rem;
        margin-top:7rem;
    }
    .info{
        font-size: 1.25rem;
        text-align: left;
        margin-top: 5rem;
        margin-left: 7rem;
        
    }
    .comment{
        margin-top: 5rem;
        font-size: 1.25rem;
    }
    .date{
        font-size: 1.25rem;
    }
  
    #host1{
        margin-top: 7rem;
        position: relative;
    }
    #host1 img{
        position: absolute;
        right: 50px;
        top: -25px;
        
    }
   
</style>
<body>
    <div id="outerBorder">
        <div id="numbering" class="mt-3 ml-3">
            <span>No.  {{ str_replace(' ','',str_replace(':','',str_replace('-','',substr($today,0,17)))) }}</span>
        </div>
        <div class="title">
            <span style="text-decoration: underline;">{{ config('cm.title') }} 영수증</span>
        </div>
       
        <div class="info">
            <div>
                <span>1. 성 명 :</span>
                <span>{{ $submit->name }}</span>
            </div>
            <div class="mt-3">
                <span>2. 금 액 :</span>
                <span>{{ number_format($submit->price) }} 원</span>
            </div>
        </div>
        <div class="comment">
            위 금액을 정히 영수함.
        </div>
        <div class="date mt-5">
            {{ substr($today,0,4) }}.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            {{ substr($today,5,2) }}.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            {{ substr($today,8,2) }}.
        </div>
        <div id="host1">
            {{ config('cm.host1') }}
            <img src="{{ resource_path('img/stamp.png') }}" alt="">
        </div>
    </div>
</body>

</html>