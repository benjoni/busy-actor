<?php
include("../pomocne/connection.php");
include("../pomocne/start&style.php");
include("../pomocne/functions2.php");

$newuser_id = random_num(10);
echo $boss_id=$_SESSION['user_id'];
echo  $budy_name = $_POST['budy_name'];
echo  $budy_email = $_POST['budy_email'];


$a1 = isset($_POST['A1']);
$a2 = isset($_POST['A2']);
$a3 = isset($_POST['A3']);
$b1 = isset($_POST['B1']);
$b2 = isset($_POST['B2']);
$b3 = isset($_POST['B3']);
$c1 = isset($_POST['C1']);
$c2 = isset($_POST['C2']);
$c3 = isset($_POST['C3']);
$d1 = isset($_POST['D1']);
$d2 = isset($_POST['D2']);
$d3 = isset($_POST['D3']);





echo $sql77 = "INSERT INTO users  SET
              user_id='$newuser_id',
                user_name='$budy_name',
                boss_id='$boss_id',
                status='buddy',
                user_email='$budy_email',
                a1='$a1',
                a2='$a2',
                a3='$a3',
                b1='$b1',
                b2='$b2',
                b3='$b3',
                c1='$c1',
                c2='$c2',
                c3='$c3',
                d1='$d1',
                d2='$d2',
                d3='$d3'
 ";


mysqli_query($con, $sql77);

//posle mail

$to = $budy_email;
$subject = 'Spolupraca na projekte ';






$message = <<<EOF

<html lang="en" xmlns:v="urn:schemas-microsoft-com:vml" xmlns:o="urn:schemas-microsoft-com:office:office">

<head>
    <meta charset="utf-8">
    <meta name="x-apple-disable-message-reformatting">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="format-detection" content="telephone=no, date=no, address=no, email=no">
    <!--[if mso]>
    <xml><o:OfficeDocumentSettings><o:PixelsPerInch>96</o:PixelsPerInch></o:OfficeDocumentSettings></xml>
    <style>
        td,th,div,p,a,h1,h2,h3,h4,h5,h6 {font-family: "Segoe UI", sans-serif; mso-line-height-rule: exactly;}
    </style>
    <![endif]-->
    <title>Welcome to Busy Actor</title>
    <link href="https://fonts.googleapis.com/css?family=Montserrat:ital,wght@0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,200;1,300;1,400;1,500;1,600;1,700" rel="stylesheet" media="screen">
    <style>
        .hover-underline:hover {
            text-decoration: underline !important;
        }

        @keyframes spin {
            to {
                transform: rotate(360deg);
            }
        }

        @keyframes ping {

            75%,
            100% {
                transform: scale(2);
                opacity: 0;
            }
        }

        @keyframes pulse {
            50% {
                opacity: .5;
            }
        }

        @keyframes bounce {

            0%,
            100% {
                transform: translateY(-25%);
                animation-timing-function: cubic-bezier(0.8, 0, 1, 1);
            }

            50% {
                transform: none;
                animation-timing-function: cubic-bezier(0, 0, 0.2, 1);
            }
        }

        @media (max-width: 600px) {
            .sm-leading-32 {
                line-height: 32px !important;
            }

            .sm-px-24 {
                padding-left: 24px !important;
                padding-right: 24px !important;
            }

            .sm-py-32 {
                padding-top: 32px !important;
                padding-bottom: 32px !important;
            }

            .sm-w-full {
                width: 100% !important;
            }
        }
    </style>
</head>

<body style="margin: 0; padding: 0; width: 100%; word-break: break-word; -webkit-font-smoothing: antialiased; --bg-opacity: 1; background-color: #eceff1; background-color: rgba(236, 239, 241, var(--bg-opacity));">
<div style="display: none;">We are please to welcome you to PixInvent</div>
<div role="article" aria-roledescription="email" aria-label="Welcome to PixInvent 👋" lang="en">
    <table style="font-family: Montserrat, -apple-system, 'Segoe UI', sans-serif; width: 100%;" width="100%" cellpadding="0" cellspacing="0" role="presentation">
        <tr>
            <td align="center" style="--bg-opacity: 1; background-color: #eceff1; background-color: rgba(236, 239, 241, var(--bg-opacity)); font-family: Montserrat, -apple-system, 'Segoe UI', sans-serif;" bgcolor="rgba(236, 239, 241, var(--bg-opacity))">
                <table class="sm-w-full" style="font-family: 'Montserrat',Arial,sans-serif; width: 600px;" width="600" cellpadding="0" cellspacing="0" role="presentation">

                    <tr>
                        <td align="center" class="sm-px-24" style="font-family: 'Montserrat',Arial,sans-serif;">
                            <table style="font-family: 'Montserrat',Arial,sans-serif; width: 100%;" width="100%" cellpadding="0" cellspacing="0" role="presentation">
                                <tr>
                                    <td class="sm-px-24" style="--bg-opacity: 1; background-color: #ffffff; background-color: rgba(255, 255, 255, var(--bg-opacity)); border-radius: 0px; font-family: Montserrat, -apple-system, 'Segoe UI', sans-serif; font-size: 14px; line-height: 24px;  padding: 48px; text-align: left; --text-opacity: 1; color: #626262; color: rgba(98, 98, 98, var(--text-opacity));" bgcolor="rgba(255, 255, 255, var(--bg-opacity))" align="left">
                                        <p style="font-weight: 600; font-size: 18px; margin-bottom: 0;">Ahoj</p>
                                        <p style="font-weight: 600; font-size: 20px; margin-top: 0; --text-opacity: 1; color: #ff5850; color: rgba(255, 88, 80, var(--text-opacity));"> $budy_name</p>
                                        <p class="sm-leading-32" style="font-weight: 500; font-size: 18px; margin: 0 0 24px; --text-opacity: 1; color: grey; color: rgba(38, 50, 56, var(--text-opacity));">
                                            Chceme ťa pozvať na spoluprácu  .
                                        </p>

                                       
                                        <p style="margin: 24px 0;">
                                            <span style="font-weight: 600;">Busy Actor</span>
                                            je plánovací software,ktorý umožňuje plánovať natáčací plán podľa záväzkov hercov.  🤩
                                        </p>
                                        <p style="font-weight: 500; font-size: 16px; margin-bottom: 0;">Ako nato?</p>
                                        <ul style="margin-bottom: 24px;">
                                            <li>
                                                Po kliknutí na tlačidlo sa ti otvorí registračný formulár kde zadaj svoje nové prihlasovacie heslo. Tvoj mail už zadal administrátor.
                                            </li>
                                            <li>
                                                Pri zadávaní zaväzkov treba vybrať herca zo zoznamu a na každý deň sú k  dispozícii  štyri možnosti. Stačí ich do kalendáru len pretiahnuť na príslušný dátum. 🤟🏻
                                            </li>
                                            <li>
                                                <span style="color: white; background-color: #1D9251 ;font-weight: 600;"> má voľno </span>  znamená, že v ten deň <span style="font-weight: 600;">má</span>  herec voľno a produkcia môže s ním rátať pri plánovaní celý deň.
                                            </li>
                                            <li>
                                                <span style="color: white; background-color: firebrick ;font-weight: 600;"> som zaneprázdnemý </span> znamená, že v ten deň <span style="font-weight: 600;">nemôže</span> s hercom produkcia rátať pri plánovaní celý deň.
                                            </li>
                                            <li>
                                                <span style="color: white; background-color: cornflowerblue ;font-weight: 600;"> môžem obmedzene </span> znamená, že v ten deň má herec nejaké záväzky ale je k dispozícii v nejakom časovom úseku .
                                            </li>
                                            <li>
                                                <span style="color: dimgray; background-color:yellow ;font-weight: 600;"> ešte neviem </span> znamená, že v ten deň ešte nemá herec potvrdené iné záväzky alebo plány, takže dá vedieť neskôr.
                                            </li>
                                        </ul>
                                        <table style="font-family: 'Montserrat',Arial,sans-serif;" cellpadding="0" cellspacing="0" role="presentation">
                                            <tr>
                                                <td style="mso-padding-alt: 16px 24px; --bg-opacity: 1; background-color: #7367f0; background-color: rgba(115, 103, 240, var(--bg-opacity)); border-radius: 4px; font-family: Montserrat, -apple-system, 'Segoe UI', sans-serif;" bgcolor="rgba(115, 103, 240, var(--bg-opacity))">
                                                    <a href="https://busy-actor.com/budies/preskok_na_budy.php?budy_id=$newuser_id&budy_email=$budy_email&budy_name=$budy_name" style="display: block; font-weight: 600; font-size: 14px; line-height: 100%; padding: 16px 24px; --text-opacity: 1; color: #ffffff; color: rgba(255, 255, 255, var(--text-opacity)); text-decoration: none;">Registrovať sa &rarr;</a>
                                                </td>
                                            </tr>
                                        </table>
                                        <table style="font-family: 'Montserrat',Arial,sans-serif; width: 100%;" width="100%" cellpadding="0" cellspacing="0" role="presentation">
                                            <tr>
                                                <td style="font-family: 'Montserrat',Arial,sans-serif; padding-top: 32px; padding-bottom: 32px;">
                                                    <div style="--bg-opacity: 1; background-color: #eceff1; background-color: rgba(236, 239, 241, var(--bg-opacity)); height: 1px; line-height: 1px;">&zwnj;</div>
                                                </td>
                                            </tr>
                                        </table>
                                        <p style="margin: 0 0 16px;">
                                            Nevieš prečo si dostal tento mail? Prosím
                                            <a href="mailto:peter@bencsik.sk" class="hover-underline" style="--text-opacity: 1; color: #7367f0; color: rgba(115, 103, 240, var(--text-opacity)); text-decoration: none;">daj nám vedieť</a>.
                                        </p>
                                        <p style="margin: 0 0 16px;">Ďakujeme, <br>Busy Actor Team</p>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="font-family: 'Montserrat',Arial,sans-serif; height: 20px;" height="20"></td>
                                </tr>
                                <tr>
                                    <td style="font-family: Montserrat, -apple-system, 'Segoe UI', sans-serif; font-size: 12px; padding-left: 48px; padding-right: 48px; --text-opacity: 1; color: #eceff1; color: rgba(236, 239, 241, var(--text-opacity));">

                                        <p style="--text-opacity: 1; color: #263238; color: rgba(38, 50, 56, var(--text-opacity));">
                                            Používanie aplikácie sa vzťahuje na práva Out of Frame s.r.o.

                                        </p>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="font-family: 'Montserrat',Arial,sans-serif; height: 16px;" height="16"></td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>
</div>
</body>

</html>
EOF;




// Always set content-type when sending HTML email
$headers = "MIME-Version: 1.0" . "\r\n";
$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
$headers .= 'From: Busy Actor <admin@busy-actor.com>' . "\r\n" .

    'X-Mailer: PHP/' . phpversion();





mail($to,$subject,$message,$headers);


// Sending email

header("location:../budies.php");


//mail end

header("location:../budies.php");
 die;
mysqli_close($con);

?>
