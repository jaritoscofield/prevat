<!doctype html>
<html class="no-js" lang="">

<head>
    <meta charset="utf-8">
    <title>Certificados Gerados</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="{{ url('pdf/web/modern-normalize.css')}}" rel="stylesheet" />
    <link href="{{ url('pdf/web/web-base.css')}}" rel="stylesheet" />
    <link href="{{ url('pdf/invoice.css')}}" rel="stylesheet" />

</head>
<body>

<div>
    {{-- Gera o ATESTADO apenas uma vez --}}
    <div class="web-container">
        <table class="line-items-container">
            <thead>
            <tr>
                <th class="heading-logo">
                    <img  style="height: 60px" src="{{ url('pdf/images/prevat_logo_pdf.png')}}" alt="logo"><br>
                    <div class="logo-info ">ajuste
                        <span>CNPJ: 20.827.565/0001-54 </span><br>
                        <span>End.: Rua Raimundo José Coutinho, Qd. 246. Lt.21, </span><br>
                        <span>Bairro Núcleo Urbano, CEP: 68447-000 </span><br>
                        <span> Vila dos Cabanos – Barcarena / PA. </span><br>
                        <span>Fone: (91) 99231-4994 / 99367-6162 / 99663-1126 </span><br>
                        <span>E-mail: atendimento2@prevat.com.br </span>
                    </div>
                </th>
                <th class="heading-description">
                    <div class="text-certificate center">
                        ATESTADO
                    </div>
                </th>
                <th class="heading-qrcode">
                    <div class="qrcode-container">
                        @if(!empty($qrcode_atestado_path))
                            <img src="{{ asset($qrcode_atestado_path) }}" alt="qrcode_atestado" style="max-width:120px; max-height:120px;">
                        @endif
                    </div>
                </th>
            </tr>
            </thead>
        </table>
        <div class="line"></div>
        <div class="title">
            <div class="center"></div>
            <div class="center"></div>
        </div>
        <div class="content">
            <br><br>
            <p class="">Atestamos que a <span class="bold"> {{$certifications[0]['company']['name']}}  - CNPJ –
                {{$certifications[0]['company']['employer_number']}} </span> Promoveu o CURSO DE {{$certifications[0]['training']['name']}}, aos seus
                colaboradores, para o quantitativo de {{$certifications[0]['training_participation']['participants']->count()}} brigadistas formados, com carga horária de {{$certifications[0]['training_participation']['schedule_prevat']['workload']['name']}}/aula, com aproveitamento de 100% nos dias
                {{ formatDate($certifications[0]['training_participation']['schedule_prevat']['start_event']) }} a {{formatDate($certifications[0]['training_participation']['schedule_prevat']['end_event'])}},
                realizado nas dependências da própria empresa.
            </p>
        </div>
        <div class="date" style="padding-top: 80px;">
            <p class="right">Barcarena-PA, {{ formatCertificate($certifications[0]['training_participation']['schedule_prevat']['end_event'])}}</p>
        </div>
        <div class="footer-certificate">
            <table class="line-signatures-container center">
                <tr class="">
                    <td width="33%">
                        @foreach($professionals['professionals'] as $itemProfessional)
                            @if($itemProfessional['professional']['signature_image'] && $itemProfessional['front'])
                                <img style="height: 180px" src="{{ url('images/signatures/' . $itemProfessional['professional']['signature_image']) }}" alt="assinatura">
                            @endif
                        @endforeach
                    </td>
                    <td width="33%">
                        <img style="height:180px;" src="{{ url('images/signatures/assinatura_diretor.png') }}" alt="assinatura_tecnico">
                    </td>
                    <td width="33%">
                        <img  style="height: 180px; " src="{{ url('images/signatures/assinatura_participante.png')}}" alt="assinatura_participante">
                    </td>
                </tr>
            </table>
        </div>
    </div>

    {{-- CONTEÚDO PROGRAMÁTICO logo após o atestado --}}
    <div class="web-container" style="margin-top: 40px;">
        <div style="text-align: center; font-size: 20px; font-weight: bold; margin-bottom: 10px; text-transform: uppercase; letter-spacing: 1px;">
            CONTEÚDO PROGRAMÁTICO<br>
            <span style="font-size: 16px; font-weight: normal;">Aulas teóricas (16h):</span>
        </div>
        <ol type="1" style="font-size: 15px; line-height:2; margin: 0 auto; max-width: 700px; padding-left: 30px;">
            <li>Introdução (Objetivos do curso e dos Brigadistas);</li>
            <li>O que é fogo;</li>
            <li>Triângulo do fogo;</li>
            <li>Teoria do fogo (Combustão, seus elementos e a reação em cadeia);</li>
            <li>Propagação do fogo; Classes de incêndio;</li>
            <li>Métodos de extinção;</li>
            <li>Agentes extintores;</li>
            <li>Extintores de incêndio;</li>
            <li>Técnicas de combate a incêndio com extintores;</li>
            <li>Procedimentos básicos em locais de Incêndio;</li>
            <li>Sistemas fixos de combate a incêndio;</li>
            <li>Sistemas de detecção, alarme e comunicações;</li>
            <li>Ferramentas de salvamento;</li>
            <li>Técnicas de combate a incêndio com uso de mangueiras e hidrantes;</li>
            <li>Exigências legais quanto à instalação, localização e sinalização dos extintores de incêndio e hidrantes;</li>
            <li>Pessoas com mobilidade reduzida;</li>
            <li>Procedimentos básicos em locais de Incêndio;</li>
            <li>Riscos específicos da planta e Prevenção de incêndio;</li>
            <li>Plano de Emergência;</li>
            <li>Procedimentos para abandono de área e controle de pânico.</li>
            <li>Aulas teóricas (08h)</li>
            <li>Práticas (08h)</li>
        </ol>
    </div>

    {{-- Gera um CERTIFICADO para cada participante --}}
    @foreach($certifications as $itemCertification)
        <div class="web-container">
            <table class="line-items-container">
                <thead>
                <tr>
                    <th class="heading-logo">
                        <img  style="height: 60px" src="{{ url('pdf/images/prevat_logo_pdf.png')}}" alt="logo"><br>
                        <div class="logo-info ">
                            <span>CNPJ: 20.827.565/0001-54 </span><br>
                            <span>End.: Rua Raimundo José Coutinho, Qd. 246. Lt.21, </span><br>
                            <span>Bairro Núcleo Urbano, CEP: 68447-000 </span><br>
                            <span> Vila dos Cabanos – Barcarena / PA. </span><br>
                            <span>Fone: (91) 99231-4994 / 99367-6162 / 99663-1126 </span><br>
                            <span>E-mail: atendimento2@prevat.com.br </span>
                        </div>
                    </th>
                    <th class="heading-description">
                        <div class="text-certificate center">
                            CERTIFICADO
                        </div>
                    </th>
                    <th class="heading-qrcode">
                        <div class="qrcode-container">
                            @php
                                $reference = $itemCertification['reference'] ?? (new \App\Services\ReferenceService())->getReference();
                                $path = 'images/qrcodes/'.$reference.'.png';
                                if(!file_exists(public_path($path))) {
                                    if(!is_dir(public_path('images/qrcodes'))) {
                                        mkdir(public_path('images/qrcodes'), 0755, true);
                                    }
                                    $qrCodePath = public_path($path);
                                    \LaravelQRCode\Facades\QRCode::url(url('consulta-certificado/'.$reference))
                                        ->setOutfile($qrCodePath)
                                        ->setSize(4)
                                        ->setMargin(2)
                                        ->png();
                                    $itemCertification->path_qrcode = $path;
                                    $itemCertification->save();
                                }
                            @endphp
                            <img src="{{ url($path) }}" alt="qrcode">
                        </div>
                    </th>
                </tr>
                </thead>
            </table>
            <div class="line"></div>
            <div class="title">
                <div class="center"></div>
                <div class="center"></div>
            </div>
            <div class="content">
                <br><br>
                <p>Conferimos o presente certificado à <span class="bold">{{$itemCertification['participant']['name']}}</span>, inscrito no C.P.F. sob o n° {{$itemCertification['participant']['taxpayer_registration']}} por sua
                    participação no CURSO DE <span class="bold">{{$itemCertification['training']['name']}}</span>, com carga horária total de {{$itemCertification['training_participation']['schedule_prevat']['workload']['name']}}/aula realizado no
                    período de {{ formatDate($itemCertification['training_participation']['schedule_prevat']['start_event']) }} à  {{formatDate($itemCertification['training_participation']['schedule_prevat']['end_event'])}}, realizado nas dependências da própria empresa, tudo em conformidade com a
                    InstruçãoTécnica 08/2019 da DST do CBMPA.
                </p>
                <br>
            </div>
            <div class="date" style="padding-top: 80px;">
                <p class="right">Barcarena-PA, {{ formatCertificate($itemCertification['training_participation']['schedule_prevat']['end_event'])}}</p>
            </div>
            <div class="footer-certificate">
                <table class="line-signatures-container center">
                    <tr class="">
                        <td width="33%">
                            @foreach($professionals['professionals'] as $itemProfessional)
                                @if($itemProfessional['professional']['signature_image'] && $itemProfessional['front'])
                                    <img style="height: 180px" src="{{ url('images/signatures/' . $itemProfessional['professional']['signature_image']) }}" alt="assinatura">
                                @endif
                            @endforeach
                        </td>
                        <td width="33%">
                            <img style="height:180px;" src="{{ url('images/signatures/assinatura_diretor.png') }}" alt="assinatura_tecnico">
                        </td>
                        <td width="33%">
                            <img  style="height: 180px; " src="{{ url('images/signatures/assinatura_participante.png')}}" alt="assinatura_participante">
                        </td>
                    </tr>
                </table>
            </div>
        </div>
        @if(!$loop->last)
            <div class="page-break"></div>
        @endif
    @endforeach
</div>
<div class="page-break"></div>
<div class="web-container">
    <table style="width:100%; border-spacing: 15px; font-family: Arial;">
        <tr>
            <td width="60%" style="vertical-align:top; padding-right: 30px;">
                <div class="content-programatic-title-02 center">
                    <p class="">PARTICIPANTES</p>
                </div>
                <table style="border: 1px solid; border-collapse: collapse; width:100%;">
                    <tr>
                        <th style="text-align: left; border: 1px solid;">NOME</th>
                        <th style="text-align: center; border: 1px solid;">CPF</th>
                    </tr>
                    @foreach($participants as $itemParticipant)
                        <tr>
                            <td style="text-align: left; border: 1px solid;">{{$itemParticipant['participant']['name']}}</td>
                            <td style="text-align: center; border: 1px solid;">{{$itemParticipant['participant']['taxpayer_registration']}}</td>
                        </tr>
                    @endforeach
                </table>
            </td>
            <td width="40%" style="vertical-align:top;">
                <div class="content-programatic-title-02 center">
                    <p class="bold">CONTEÚDO PROGRAMÁTICO<br>Aulas teóricas (16h):</p>
                </div>
                <ol type="1" style="font-size: 12px; line-height:1.5em;">
                    <li>Introdução (Objetivos do curso e dos Brigadistas);</li>
                    <li>O que é fogo;</li>
                    <li>Triângulo do fogo;</li>
                    <li>Teoria do fogo (Combustão, seus elementos e a reação em cadeia);</li>
                    <li>Propagação do fogo; Classes de incêndio;</li>
                    <li>Métodos de extinção;</li>
                    <li>Agentes extintores;</li>
                    <li>Extintores de incêndio;</li>
                    <li>Técnicas de combate a incêndio com extintores;</li>
                    <li>Procedimentos básicos em locais de Incêndio;</li>
                    <li>Sistemas fixos de combate a incêndio;</li>
                    <li>Sistemas de detecção, alarme e comunicações;</li>
                    <li>Ferramentas de salvamento;</li>
                    <li>Técnicas de combate a incêndio com uso de mangueiras e hidrantes;</li>
                    <li>Exigências legais quanto à instalação, localização e sinalização dos extintores de incêndio e hidrantes;</li>
                    <li>Pessoas com mobilidade reduzida;</li>
                    <li>Procedimentos básicos em locais de Incêndio;</li>
                    <li>Riscos específicos da planta e Prevenção de incêndio;</li>
                    <li>Plano de Emergência;</li>
                    <li>Procedimentos para abandono de área e controle de pânico.</li>
                    <li>Aulas teóricas (08h)</li>
                    <li>Práticas (08h)</li>
                </ol>
                <div style="margin-top: 40px; text-align: right;">
                    <span style="color: red; font-weight: bold; font-size: 18px; display: block;">Certificado de Licenciamento</span>
                    <span style="color: red; font-weight: bold; font-size: 16px; display: block;">Nº {{ $licenca_numero ?? '' }}</span>
                    <span style="color: red; font-weight: bold; font-size: 16px; display: block;">Validade: {{ !empty($licenca_validade) ? \Carbon\Carbon::parse($licenca_validade)->format('d/m/Y') : '' }}</span>
                    <span style="color: red; font-weight: bold; font-size: 16px; display: block;">Nº do Protocolo: {{ $licenca_protocolo ?? '' }}</span>
                </div>
            </td>
        </tr>
    </table>
</div>

</body>
</html>

