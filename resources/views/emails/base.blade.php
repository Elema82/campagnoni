<head>
    <style>
        @media screen and (max-width: 800px) {
            .desktop {
                display: none;
            }
        }

        @media screen and (min-width: 801px) {
            .mobile {
                display: none;
            }
        }
    </style>
</head>

<body style="margin:0;padding:0;">
<table border="0" cellpadding="0" cellspacing="0" style="color: #333; background: #fff; padding: 0; margin: 0; width: 100%; font: 15px/1.25em 'Helvetica Neue', Arial, Helvetica;">
    <tbody>
    <tr>
        <td align="left" style="background: #EEF0F1; font: 15px/1.25em 'Helvetica Neue', Arial, Helvetica;" valign="top">
            <table style="border: none; padding: 0 18px; margin: 25px auto; width: 75%;">
                <tbody>
                <tr>
                    <td align="left" style="border-top-left-radius: 4px; border-top-right-radius: 4px; background: #0079bf bottom left repeat-x; padding: 10px 18px; text-align: center;" valign="top"><img height="40" src="http://campagnoni.com.ar/public/images/logo.png" style="font-weight: bold; font-size: 18px; color: #fff; vertical-align: top;" title="Campagnoni"></td>
                </tr>
                <tr>
                    <td align="left" style="background:#fff; padding: 28px;" valign="top">
                        <h1 style="font-size: 20px; margin: 0; color: #333;">@yield('title')</h1>
                        @yield('body1')
                    </td>
                </tr>
                <tr>
                    <td align="left" style="border-bottom-left-radius: 4px; border-bottom-right-radius: 4px; background:#666; padding: 28px;" valign="top">
                        <p style="font: 15px/1.25em 'Helvetica Neue', Arial, Helvetica; color: #fff; text-align: center;">Copyright &copy; 2017<br>Campagnoni</p>
                    </td>
                </tr>
                </tbody>
            </table>
        </td>
    </tr>
    </tbody>
</table>
</body>
