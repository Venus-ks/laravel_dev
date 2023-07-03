<?php
return [
    'version' => '2022-fall',
    'adminInitiate' => [
        'id'=>env('ADMIN_DEFAULT_ID'),
        'email'=>env('ADMIN_DEFAULT_EMAIL'),
        'pw'=>env('ADMIN_DEFAULT_PW')
    ],
    'host1' => 'Korea Society of International Relations and Education',
    'host2' => 'Society of Subject & Textbook',
    'title' => 'The 2022 International Winter Conference',
    'subtitle' => 'Development and utilization of competency-oriented textbooks',
    'englishTitle' => '',
    'address'=>'Address: Online (ZOOM ID: TBD)',
    'term'=>'Date: Dec 9, 2022 (Fri)',
    'subabbr' => 'KASOHN',
    'email' => 'korea-sire@naver.com',
    'adminListRows' => 9,
    'account-msg' => "계좌정보: <strong>농협 351-10178375-13 (한국푸드아트테라피학회)</strong>",
    'preRegistrationLevel' => [
        'guest' => '비회원',
        'member' => '회원',
        'reviewer' => '자격심사자'
    ],
    'prePriceForLevel' => [
        'guest' => 40000,
        'member' => 40000,
        'reviewer' => 70000
    ],
    'preRegistrationOption' => [
        '1class' => '1급',
        '2class' => '2급',
        '3class' => '3급',
    ],
    'presentationType' => [
        'FT'=>'Free Topic Presentation'
    ],
    // 'presentationTypeId' => [
    //     ,
    //     ,
    //     ,
    //     ,

    // ],
    'category' => [
        'A. Abiotic Disease',
        'B. Bacteriology and Bacterial Diseases',
        'C. Biological Control',
        'D. Chemical Control',
        'E. Diagnosis',
        'F. Disease Management',
        'G. Disease Resistance',
        'H. Epidemiology',
        'I. Field Research',
        'J. Molecular Plant-Microbe Interactions',
        'K. Mycology and Fungal diseases',
        'L. Mycotoxicology',
        'M. Nematology',
        'N. Parasitic Seed Plants',
        'O. Virology and Viral Disease',
        'P. Others'
    ],
    'cardType' => [
        '01'=>'외환',
        '03'=>'롯데',
        '04'=>'현대',
        '06'=>'국민',
        '11'=>'BC',
        '12'=>'삼성',
        '14'=>'신한',
        '15'=>'한미',
        '16'=>'NH',
        '17'=>'하나 SK',
        '21'=>'해외비자',
        '22'=>'해외마스터',
        '23'=>'JCB',
        '24'=>'해외아멕스',
        '25'=>'해외다이너스',
    ],

    // ks 20221109
    'submit' => [
        'title' => '사전등록',
        'table' => [
            1   => 'NO',
            2   => '등록구분',
            3   => '급수',
            4   => '등록비',
            5   => '이름',
            6   => '소속',
            7   => '직위',
            8   => 'E-mail',
            9   => '휴대폰 번호',
            10  => '입금상태',
            11  => '기타'
        ],
        'rows'  => 10,
    ],
    'eng_submit' => [
        'title' => 'pre-registration',
        'table' => [
            1   => 'NO',
            2   => 'Registration Category',
            3   => 'Grade',
            4   => 'Price',
            5   => 'Name',
            6   => 'Sosok',
            7   => 'Job',
            8   => 'E-mail',
            9   => 'CellPhone',
            10  => '입금상태',
            11  => 'etc'
        ],
    ],
    'lecture' => [
        'title' => '초록 접수 관리',
        'table' => [
            1   => 'NO',
            2   => '등록자명',
            3   => '이메일',
            4   => '비밀번호',
            5   => '제목',
            6   => '국가',
            7   => '등록일',
            8   => '기타',
        ],
        'rows'  => 10,
    ],
]
 ?>
