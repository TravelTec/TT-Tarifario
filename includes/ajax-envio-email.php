<?php  
ini_set("display_errors", 1);
use PHPMailer\PHPMailer\PHPMailer; 
use PHPMailer\PHPMailer\Exception;

    require 'packages/PHPMailer-master/src/Exception.php';
    require 'packages/PHPMailer-master/src/PHPMailer.php';
    require 'packages/PHPMailer-master/src/SMTP.php';

        setlocale(LC_TIME, 'pt_BR', 'pt_BR.utf-8', 'pt_BR.utf-8', 'portuguese');
        date_default_timezone_set('America/Sao_Paulo'); 

        $idade = '';
        if ($_POST['idade'] == "00") {
            $idade = "até 1 ano";
        }else if ($_POST['idade'] == "01") {
            $idade = "1 ano";
        }else if ($_POST['idade'] == "02") {
            $idade = "2 anos";
        }else if ($_POST['idade'] == "03") {
            $idade = "3 anos";
        }else if ($_POST['idade'] == "04") {
            $idade = "4 anos";
        }else if ($_POST['idade'] == "05") {
            $idade = "5 anos";
        }else if ($_POST['idade'] == "06") {
            $idade = "6 anos";
        }else if ($_POST['idade'] == "07") {
            $idade = "7 anos";
        }else if ($_POST['idade'] == "08") {
            $idade = "8 anos";
        }else if ($_POST['idade'] == "09") {
            $idade = "9 anos";
        }else if ($_POST['idade'] == "10") {
            $idade = "10 anos";
        }else if ($_POST['idade'] == "11") {
            $idade = "11 anos";
        }else if ($_POST['idade'] == "12") {
            $idade = "12 anos";
        }

        $criancas = '';
        if ($_POST['criancas'] > 0) {
            if ($_POST['criancas'] == 1) {
                $criancas = $_POST['criancas'].' criança com idade de '.$idade;
            }else{
                $criancas = $_POST['criancas'].' crianças com idade de '.$idade;
            } 
        }else{
            $criancas = '';
        }

    $mail = new PHPMailer(true);
    $mail->IsSMTP();
    $mail->Mailer = "smtp";

    $mail->SMTPDebug  = 0;  
    $mail->SMTPAuth   = TRUE;
    $mail->SMTPSecure = "tls";
    $mail->Port       = 587;
    $mail->Host       = "smtplw.com.br";
    $mail->Username   = "montenegroev2";
    $mail->Password   = "126602mumu@";

    $mail->IsHTML(true);
    $mail->setFrom('sac@traveltec.com.br', "Pomptur Turismo"); // sender's email and name
    $mail->AddAddress($_POST['email']); 
    $mail->addReplyTo('atendimento@pomptur.tur.br', 'Pomptur Turismo'); 
    $mail->addBCC('atendimento@pomptur.tur.br');
    $mail->Subject = 'Nova solicitação de orçamento!';
    $content = '<div marginwidth="0" marginheight="0" style="padding:0">
        <div id="m_8573170178080779969wrapper" dir="ltr" style="background-color:#f7f7f7;margin:0;padding:70px 0;width:100%">
            <table border="0" cellpadding="0" cellspacing="0" height="100%" width="100%">
                <tbody>
                    <tr>
                        <td align="center" valign="top">
                            <div id="m_8573170178080779969template_header_image">
                            </div>
                            <table border="0" cellpadding="0" cellspacing="0" width="600" id="m_8573170178080779969template_container" style="background-color:#ffffff;border:1px solid #dedede;border-radius:3px">
                                <tbody>
                                    <tr>
                                        <td align="center" valign="top">
                                            <table border="0" cellpadding="0" cellspacing="0" width="100%" id="m_8573170178080779969template_header" style="background-color:#17A250;color:#ffffff;border-bottom:0;font-weight:bold;line-height:100%;vertical-align:middle;font-family:&quot;Helvetica Neue&quot;,Helvetica,Roboto,Arial,sans-serif;border-radius:3px 3px 0 0">
                                                <tbody>
                                                    <tr>
                                                        <td id="m_8573170178080779969header_wrapper" style="padding:36px 48px;display:block">
                                                            <h1 style="font-family:&quot;Helvetica Neue&quot;,Helvetica,Roboto,Arial,sans-serif;font-size:30px;font-weight:300;line-height:150%;margin:0;text-align:left;color:#ffffff;background-color:inherit">Detalhes da sua solicitação</h1>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td align="center" valign="top">
                                            <table border="0" cellpadding="0" cellspacing="0" width="600" id="m_8573170178080779969template_body">
                                                <tbody>
                                                    <tr>
                                                        <td valign="top" id="m_8573170178080779969body_content" style="background-color:#ffffff">
                                                            <table border="0" cellpadding="20" cellspacing="0" width="100%">
                                                                <tbody>
                                                                    <tr>
                                                                        <td valign="top" style="padding:48px 48px 32px">
                                                                            <div id="m_8573170178080779969body_content_inner" style="color:#636363;font-family:&quot;Helvetica Neue&quot;,Helvetica,Roboto,Arial,sans-serif;font-size:14px;line-height:150%;text-align:left">
                                                                                <span class="im">
                                                                                    <p style="margin:0 0 16px">Olá, '.$_POST['nome'].'.</p>
                                                                                    <p style="margin:0 0 16px">Sua solicitação foi recebida com sucesso. Abaixo detalhes do pedido: </p>
                                                                                </span>
                                                                                <h2 style="color:#17A250;display:block;font-family:&quot;Helvetica Neue&quot;,Helvetica,Roboto,Arial,sans-serif;font-size:18px;font-weight:bold;line-height:130%;margin:0 0 18px;text-align:left">
                                                                                    Solicitação feita em '.strftime('%d de %B de %Y', strtotime('today')).'
                                                                                </h2>
                                                                                <div style="margin-bottom:40px">
                                                                                    <table cellspacing="0" cellpadding="6" border="1" style="color:#636363;border:1px solid #e5e5e5;vertical-align:middle;width:100%;font-family:\'Helvetica Neue\',Helvetica,Roboto,Arial,sans-serif">
                                                                                        <tfoot>
                                                                                            <tr>
                                                                                                <th scope="row" colspan="2" style="color:#636363;border:1px solid #e5e5e5;vertical-align:middle;padding:12px;text-align:left;border-top-width:4px">Solicitação:</th>
                                                                                                <td style="color:#636363;border:1px solid #e5e5e5;vertical-align:middle;padding:12px;text-align:left;border-top-width:4px">
                                                                                                    <strong>Destino:</strong> '.$_POST['destino'].'<br>
                                                                                                    <strong>Roteiro:</strong> '.$_POST['roteiro'].'<br>
                                                                                                    <strong>Período:</strong> '.$_POST['periodo'].'<br>
                                                                                                    '.$_POST['datas'].'<br>
                                                                                                    <strong>Pax:</strong> '.$_POST['adultos'].' '.($_POST['adultos'] > 1 ? 'adultos' : 'adulto').' '.$criancas.'<br>
                                                                                                </td>
                                                                                            </tr>
                                                                                            <tr>
                                                                                                <th scope="row" colspan="2" style="color:#636363;border:1px solid #e5e5e5;vertical-align:middle;padding:12px;text-align:left">Nome:</th>
                                                                                                <td style="color:#636363;border:1px solid #e5e5e5;vertical-align:middle;padding:12px;text-align:left">
                                                                                                    '.$_POST['nome'].'
                                                                                                </td>
                                                                                            </tr>
                                                                                            <tr>
                                                                                                <th scope="row" colspan="2" style="color:#636363;border:1px solid #e5e5e5;vertical-align:middle;padding:12px;text-align:left">E-mail:</th>
                                                                                                <td style="color:#636363;border:1px solid #e5e5e5;vertical-align:middle;padding:12px;text-align:left">
                                                                                                    '.$_POST['email'].'
                                                                                                </td>
                                                                                            </tr>
                                                                                            <tr>
                                                                                                <th scope="row" colspan="2" style="color:#636363;border:1px solid #e5e5e5;vertical-align:middle;padding:12px;text-align:left">Telefone:</th>
                                                                                                <td style="color:#636363;border:1px solid #e5e5e5;vertical-align:middle;padding:12px;text-align:left">
                                                                                                    '.$_POST['telefone'].'
                                                                                                </td>
                                                                                            </tr>
                                                                                            <tr>
                                                                                                <th scope="row" colspan="2" style="color:#636363;border:1px solid #e5e5e5;vertical-align:middle;padding:12px;text-align:left">Observações:</th>
                                                                                                <td style="color:#636363;border:1px solid #e5e5e5;vertical-align:middle;padding:12px;text-align:left">
                                                                                                    '.$_POST['mensagem'].'
                                                                                                </td>
                                                                                            </tr>
                                                                                        </tfoot>
                                                                                    </table>
                                                                                </div> 
                                                                            </div>
                                                                        </td>
                                                                    </tr>
                                                                </tbody>
                                                            </table>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </td>
                    </tr>
                    <tr>
                        <td align="center" valign="top">
                            <table border="0" cellpadding="10" cellspacing="0" width="600" id="m_8573170178080779969template_footer">
                                <tbody>
                                    <tr>
                                        <td valign="top" style="padding:0;border-radius:6px">
                                            <table border="0" cellpadding="10" cellspacing="0" width="100%">
                                                <tbody>
                                                    <tr>
                                                        <td colspan="2" valign="middle" id="m_8573170178080779969credit" style="border-radius:6px;border:0;color:#8a8a8a;font-family:&quot;Helvetica Neue&quot;,Helvetica,Roboto,Arial,sans-serif;font-size:12px;line-height:150%;text-align:center;padding:24px 0">
                                                            <p style="margin:0 0 16px">Pomptur Turismo</p>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
        <img src="https://ci6.googleusercontent.com/proxy/MStYyDb_FIY4-oFQ0wASVHfVo10UFWCGK1lQkcPsXtigXV20gEtnhjx2yq0Ztj_R5lf8aHIPcsILTXpvxEhYlaE9cKq-MNz-UxSFTOZauwIuZE_10AKggModibBzXbI3shzGKj4cSUBcc8X7ZrEQLiT-K_ZCJFbR6uGSweX98U303zc1SQH9lxALZsmRLyux6Cr0_BdMFyWF7x5fiRa348Bt9cvHWfg6dgKF4zlblJj0qPCRzVS21v32J80piaYhOZJStRa6W5iWdHBVU-1Vi-TwgXx7OTIjvOKRO3E6CEBmbZ9TtC5eQBBF5pO-DsmKM_XSYEDhI3QcvYp9ysizBxFCFQ=s0-d-e1-ft#https://open-click.smtplw.com.br/openings/m/c1b7da356324e2199409e90156e39f68-1633121084.66/a/c1b7da356324e2199409e90156e39f68/r/NzI2MTYxNjI2NTQwNmQ2ZjZlNzQ2NTZlNjU2NzcyNmY2NTc2MmU2MzZmNmQyZTYyNzI=/v/2405e7d2d71429dad4b7847d6d1e2163d7dd47ac" alt="" width="0" height="0" style="border:0;width:0;height:0;overflow:hidden" class="CToWUd">
    </div>';

    $mail->MsgHTML($content); 
    if(!$mail->Send()) {
      echo "Error while sending Email.";
      var_dump($mail);
    } else {
      echo "Email sent successfully";
    }
?>