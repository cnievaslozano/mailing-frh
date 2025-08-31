<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>{{ __('confirmacion.titulo') }} - Hotel Termes Montbrió</title>
    <link href='https://fonts.googleapis.com/css?family=Jost' rel='stylesheet'>
    <style>
        body {
            font-family: 'Jost', Arial, sans-serif;
        }
    </style>
</head>

<body style="background:#f2f2f2;">
    <table width="600" border="0" cellspacing="0" cellpadding="0" align="center" style="background:#ffffff;">
        <tr>
            <td align="center" style="padding: 20px 0px 20px 0px;">
                <a href="https://www.termesmontbrio.com/" target="_blank">
                    <img alt="Hotel Termes Montbrió" border="0"
                        src="https://www.termesmontbrio.com/imagenes/logo.png" title="Hotel Termes Montbrió"
                        width="35%">
                </a>
            </td>
        </tr>
        <tr>
            <td bgcolor="#356d91" style="color:#ffffff; line-height:22px; text-align:left; padding: 0px 20px 0px 20px;"
                height="170">
                <p style="font-size:1.4em; text-transform: uppercase; font-weight:600;">{{ __('confirmacion.saludo') }}</p>
                <p style="font-size:1.1em;">{{ __('confirmacion.gracias') }}</p>
                <p style="font-size:1.1em;">{{ __('confirmacion.numero_reserva') }}:
                    {{ $reserva->SERIE ?? '' }}{{ $reserva->IDRESERVA ?? '' }}</p>
            </td>
        </tr>
        <tr>
            <td style="font-size:0px; line-height:0px;">
                <img alt="" border="0" src="https://www.termesmontbrio.com/imagenes/exterior.png"
                    style="width: 100%" title="">
            </td>
        </tr>
        <tr>
            <td style="padding: 0px 20px 0px 20px;">
                <p style="color:#356d91; text-transform: uppercase; font-weight:600; font-size:1.5em;">{{ __('confirmacion.resumen_reserva') }}</p>
            </td>
        </tr>
        <tr>
            <td style="padding: 0px 20px 20px 20px;">
                <table width="100%">
                    <tr>
                        <td style="color:#191919; text-transform: uppercase; font-size:0.9em; line-height:16px; text-align:left; padding-bottom: 15px;"
                            width="200">
                            {{ __('confirmacion.dia_llegada') }}
                        </td>
                        <td
                            style="color:#191919; font-size:14px; line-height:0.9em; text-align:left; padding-bottom: 15px;">
                            {{ \Carbon\Carbon::parse($reserva->FECHAENTRADA ?? '')->format('d/m/Y') }}
                        </td>
                    </tr>
                    <tr>
                        <td style="color:#191919; text-transform: uppercase; font-size:0.9em; line-height:16px; text-align:left; padding-bottom: 15px;"
                            width="200">
                            {{ __('confirmacion.dia_salida') }}
                        </td>
                        <td
                            style="color:#191919; font-size:14px; line-height:0.9em; text-align:left; padding-bottom: 15px;">
                            {{ \Carbon\Carbon::parse($reserva->FECHASALIDA ?? '')->format('d/m/Y') }}
                        </td>
                    </tr>
                    <tr>
                        <td style="color:#191919; text-transform: uppercase; font-size:0.9em; line-height:16px; text-align:left; padding-bottom: 15px;"
                            width="200">
                            {{ __('confirmacion.numero_adultos') }}
                        </td>
                        <td
                            style="color:#191919; font-size:14px; line-height:0.9em; text-align:left; padding-bottom: 15px;">
                            {{ $reserva->detalles->first()->PAX ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <td style="color:#191919; text-transform: uppercase; font-size:0.9em; line-height:16px; text-align:left; padding-bottom: 15px;"
                            width="200">
                            {{ __('confirmacion.numero_ninos') }}
                        </td>
                        <td
                            style="color:#191919; font-size:14px; line-height:0.9em; text-align:left; padding-bottom: 15px;">
                            {{ $reserva->detalles->first()->PAXNEN ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <td style="color:#191919; text-transform: uppercase; font-size:0.9em; line-height:16px; text-align:left; padding-bottom: 15px;"
                            width="200">
                            {{ __('confirmacion.numero_bebes') }}
                        </td>
                        <td
                            style="color:#191919; font-size:14px; line-height:0.9em; text-align:left; padding-bottom: 15px;">
                            {{ $reserva->detalles->first()->PAXBEBE ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <td style="color:#191919; text-transform: uppercase; font-size:0.9em; line-height:16px; text-align:left; padding-bottom: 15px;"
                            width="200">
                            {{ __('confirmacion.regimen') }}:
                        </td>
                        <td
                            style="color:#191919; font-size:14px; line-height:0.9em; text-align:left; padding-bottom: 15px;">
                            @php
                                $codigo = $reserva->detalles->first()->REGIMEN ?? '';
                                $regimenes = __('confirmacion.regimenes');
                            @endphp
                            {{ $regimenes[$codigo] ?? $codigo }}
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
        <tr>
            <td style="color:#356d91; line-height:20px; text-align:left; padding: 0px 200px 0px 200px;">
                <hr style="color: #356d91;">
            </td>
        </tr>
        <tr>
            <td style="padding: 0px 20px 0px 20px;">
                <p style="color:#356d91; text-transform: uppercase; font-weight:600; font-size:1.5em;">
                    {{ __('confirmacion.horarios') }}</p>
            </td>
        </tr>
        <tr>
            <td style="padding: 0px 20px 0px 20px;">
                <table width="100%">
                    <tr>
                        <td style="color:#191919; text-transform: uppercase; font-size:0.9em; line-height:16px; text-align:left; padding-bottom: 15px;"
                            width="200">
                            {{ __('confirmacion.hora_entrada') }}
                        </td>
                        <td
                            style="color:#191919; font-size:14px; line-height:0.9em; text-align:left; padding-bottom: 15px;">
                            15:00 h
                        </td>
                    </tr>
                    <tr>
                        <td style="color:#191919; text-transform: uppercase; font-size:0.9em; line-height:16px; text-align:left; padding-bottom: 15px;"
                            width="200">
                            {{ __('confirmacion.hora_salida') }}
                        </td>
                        <td
                            style="color:#191919; font-size:14px; line-height:0.9em; text-align:left; padding-bottom: 15px;">
                            12:00 h
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
        <tr>
            <td style="padding: 0px 150px 20px 20px;">
                {{ __('confirmacion.documentacion_requerida') }}
            </td>
        </tr>
        <tr>
            <td bgcolor="#356d91" style="color:#ffffff; line-height:22px; text-align:left; padding: 0px 20px 0px 20px;"
                height="170">
                <p style="font-size:1.4em; text-transform: uppercase; font-weight:600;">CHECKIN ONLINE</p>
                <p style="font-size:1.1em;">{{ __('confirmacion.desc_checkinonline') }}</p>
                <p style="font-size:1.1em;">
                    <a href="{{ $reserva->LINK_CHECKIN ?? '#' }}" style="color:#ffffff;">Check in Online</a>
                </p>
            </td>
        </tr>
        <tr>
            <td style="color:#B39B6B; font-size:16px; line-height:20px; text-align:left; padding: 0px 200px 0px 200px;">
                <hr style="color: #356d91;">
            </td>
        </tr>
    </table>
</body>

</html>
