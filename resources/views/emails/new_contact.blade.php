@extends('emails.base')

@section('title', 'Nuevo consulta generada')

@section('body1')
    <p style="font: 15px/1.25em 'Helvetica Neue', Arial, Helvetica; color: #333;">Sr administrador,</p>
    <p style="font: 15px/1.25em 'Helvetica Neue', Arial, Helvetica; color: #333;">Un cliente ha enviado una consulta a travez de la p&aacute;gina.</p>
    <table border="0" cellpadding="0" cellspacing="0" style="color: #333; background: #EEF0F1; padding: 0; margin-top: 15px; width: 100%; font: 15px/1.25em 'Helvetica Neue', Arial, Helvetica;">
        <tbody>
        <tr>
            <td align="left" style="padding: 10px 18px; border-right: 1px solid #DDD;" valign="top">
                Nombre.<br>
                <b>{{ $data['name'] }}</b>
            </td>
        </tr>
        <tr>
            <td align="left" style="padding: 10px 18px; border-right: 1px solid #DDD;" valign="top">
                Email<br>
                <b>{{ $data['email'] }}</b>
            </td>
        </tr>
        <tr>
            <td align="left" style="padding: 10px 18px;" valign="top">
                Telefono<br>
                <b>{{ $data['phone'] }}</b>
            </td>
        </tr>
        <tr>
            <td align="left" style="padding: 10px 18px;" valign="top">
                Empresa<br>
                <b>{{ $data['company'] }}</b>
            </td>
        </tr>
        <tr>
            <td align="left" style="padding: 10px 18px;" valign="top">
                Message<br>
                <b>{{ $data['message'] }}</b>
            </td>
        </tr>

        </tbody>
    </table>
@endsection