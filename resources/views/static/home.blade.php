@extends('wrap')

@section('container')
<body id="app-layout">
    @include('layouts.header')
    <main class="container">
        <div class="innerWrap home">
            <h4 class="chapter">Greeting</h3>
            <div>Dear Members<br><br>
                The Korea International Education Exchange Association and the International Exchange and Conference Committee of the Curriculum and Textbook Association inform you:<br>
                Our Association will hold the 2022 International Winter Academic Conference as follows. We hope for your interest and participation.</div>
            <p>&nbsp;</p>
            <p>&nbsp;</p>

            <h4 class="chapter">Important Dates</h4>
            <ul>
                <li class="my-3">Abstract Submission (1page) : ~11.20 (Sun)</li>
                <li class="my-3">Proceedings Submission(3page) : ~11.30(Wed)</li>
            </ul>
            <p>&nbsp;</p>
            <p>&nbsp;</p>

            <h4 class="chapter">Registration</h4>
            <ul>
                <li class="my-3">Registration fee: Free of charge</li>
                <li class="my-3">Registration and Registration for participation: 
                    <ul style="list-style-type: circle">
                        <li class="my-3">Method 1. Apply through the website of the Curriculum and Textbook Association (society-st.org) - academic conference application.</li>
                        <li class="my-3">Method 2. Apply through the mail of Korean International Education Exchange Association (korea-sire@naver.com) (foreigners).</li>
                    </ul>
                </li>
            </ul>
            <p>&nbsp;</p>
            <p>&nbsp;</p>

            <h4 class="chapter">Program</h4>
            <table width="100%" border="0" cellpadding="0" cellspacing="0" class="table-type1">
                <col width="30%">
                <col width="70%">
                <tr>
                    <th>Time</th>
                    <th>Content</th>
                </tr>
                <tr>
                    <td>14:00~14:10</td>
                    <td class="text-left">
                        <p>[Opening]  Changun Park</p>
                        <p class="text-sm text-right">President of Korea Society of International Relations and Education<br>
                        Society of Subject &amp; Textbook</p>
                    </td>
                </tr>
                <tr>
                    <td rowspan="2">14:10~14:40</td>
                    <td class="text-left">[Keynote] Hyuksoo Kwon (Gongju National University)</td>
                </tr>
                <tr>
                    <td class="text-left">Korean In-service Teachers' Needs for    Textbook: Key Issues and Challenges</td>
                </tr>
                <tr>
                    <td>14:40~16:00</td>
                    <td>[Online presentation]</td>
                </tr>
                <tr>
                    <td>16:00~16:10</td>
                    <td class="text-left">Closing Remarks</td>
                </tr>
            </table>
            <p>&nbsp;</p>

        </div>
    </main>
    @include('layouts.footer')
</body>
@endsection

@push('styles')
<!-- Custom styles for this template -->
<link href="{{ asset('css/custom.css') }}" rel="stylesheet">
@endpush
