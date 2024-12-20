<?php
// Include PHPMailer classes
require 'src/Exception.php';
require 'src/PHPMailer.php';
require 'src/SMTP.php';

$mailConfig = require 'mail_config.php'; // Load config file

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

function send_mail($email, $v_code, $fname, $lname)
{
    global $mailConfig;
    $mail = new PHPMailer(true);
    try {
        $mail->isSMTP();                                            // Send using SMTP
        $mail->Host       = 'smtp.gmail.com';                       // Set the SMTP server to Gmail's server
        $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
        $mail->Username   = $mailConfig['username'];                 // Your Gmail address
        $mail->Password   = $mailConfig['password'];                    // Your Gmail app password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         // Enable TLS encryption; PHPMailer::ENCRYPTION_SMTPS also supported
        $mail->Port       = 587;                                    // TCP port to connect to

        // Recipients
        $mail->setFrom($mailConfig['username'], 'Service Hub PvLtd.');         // Sender's email address and name
        $mail->addAddress("$email", "$fname" . "$lname");                       // Add a recipient

        $server_ip = $mailConfig['server_ip'];
        // http://127.0.0.1/service_hub/PHPMailer/verify.php?email=$email&v_code=$v_code
        
        // Content
        $mail->isHTML(true);                                        // Set email format to HTML
        $mail->Subject = 'Service HUB - Verify your email';                     // Email subject
        $mail->Body    = "
            <table
      width='100%'
      bgcolor='#FBFBFB'
      border='0'
      cellpadding='0'
      cellspacing='0'
      style='border-collapse: collapse; background-color: #fbfbfb'
    >
    <tbody>
        <tr>
          <td style='vertical-align: top'>
            <table
              align='center'
              border='0'
              cellpadding='0'
              cellspacing='0'
              style='
                border-collapse: collapse;
                margin: 0 auto;
                min-width: 670px;
                width: 670px;
              '
            >
              <tbody>
                <tr>
                  <td
                    style='padding-top: 20px; vertical-align: top'
                    align='left'
                    valign='top'
                  >
                      <table
                        width='100%'
                        cellpadding='0'
                        cellspacing='0'
                        border='0'
                        bgcolor='#000000'
                        style='
                          border-collapse: collapse;
                          background-color: #000000;
                        '
                      >
                        <tbody>
                          <tr>
                            <td
                              style='
                                background-color: #000000;
                                /* padding: 17px 0 17px 32px; */
                              '
                            >
                              <a
                                href=''
                                target='_blank'
                                ><img
                                  src='https://i.ibb.co/1T6Xfw3/logo.png'
                                  alt='Service HUB'
                                  style='
                                    border: none;
                                    display: block;
                                    outline: none;
                                    height: auto;
                                    margin: auto;
                                  '
                              /></a>
                            </td>
                          </tr>
                        </tbody>
                      </table>
                      <table
                        width='100%'
                        border='0'
                        cellpadding='0'
                        cellspacing='0'
                        bgcolor='#000000'
                        style='
                          border-collapse: collapse;
                          background-color: #000000;
                        '
                      >
                        <tbody>
                          <tr>
                            <td
                              style='
                                padding: 20px 20px 20px 35px;
                                color: #ffffff;
                                font-size: 27px;
                                line-height: normal;
                                font-family: Arial Black, Helvetica, sans-serif;
                                font-weight: normal;
                                text-align: left;
                              '
                              align='left'
                              valign='top'
                            >
                              Verify your email
                            </td>
                          </tr>
                        </tbody>
                      </table>
                      <table
                        width='100%'
                        border='0'
                        cellpadding='0'
                        cellspacing='0'
                        align='center'
                        style='border-collapse: collapse'
                      >
                        <tbody>
                          <tr>
                            <td
                              align='center'
                              valign='top'
                              style='min-width: 670px; width: 670px'
                            >
                              <table
                                border='0'
                                cellpadding='0'
                                cellspacing='0'
                                style='
                                  min-width: 670px;
                                  width: 670px;
                                  border-collapse: collapse;
                                '
                                align='center'
                              >
                                <tbody>
                                  <tr>
                                    <td
                                      bgcolor='#FFFFFF'
                                      style='background-color: #ffffff'
                                      align='left'
                                      valign='top'
                                    >
                                      <a
                                        name='m_8270912005771009168_panel-2'
                                      ></a>
                                      <table
                                        width='100%'
                                        cellpadding='0'
                                        cellspacing='0'
                                        border='0'
                                        style='border-collapse: collapse'
                                      >
                                        <tbody>
                                          <tr>
                                            <td
                                              align='left'
                                              valign='top'
                                            >
                                              <table
                                                border='0'
                                                cellpadding='0'
                                                cellspacing='0'
                                                style='
                                                  min-width: 670px;
                                                  width: 670px;
                                                  border-collapse: collapse;
                                                '
                                              >
                                                <tbody>
                                                  <tr>
                                                    <td
                                                      style='
                                                        padding: 0 35px 0 35px;
                                                      '
                                                      align='left'
                                                      valign='top'
                                                    >
                                                      <table
                                                        width='100%'
                                                        border='0'
                                                        cellpadding='0'
                                                        cellspacing='0'
                                                        align='left'
                                                        style='
                                                          border-collapse: collapse;
                                                        '
                                                      >
                                                        <tbody>
                                                          <tr>
                                                            <td
                                                              height='32'
                                                            ></td>
                                                          </tr>
                                                          <tr>
                                                            <td>
                                                              <table
                                                                width='100%'
                                                                cellpadding='0'
                                                                cellspacing='0'
                                                                border='0'
                                                                style='
                                                                  border-collapse: collapse;
                                                                '
                                                              >
                                                                <tbody>
                                                                  <tr>
                                                                    <td
                                                                      dir='ltr'
                                                                      style='
                                                                        font-size: 15px;
                                                                        color: #212121;
                                                                        font-family: Arial,
                                                                          Helvetica,
                                                                          sans-serif;
                                                                        font-weight: normal;
                                                                        text-align: left;
                                                                        line-height: 22px;
                                                                        padding: 0px
                                                                          0px
                                                                          25px
                                                                          0px;
                                                                        word-break: break-word;
                                                                      '
                                                                      align='left'
                                                                    >
                                                                      We need to
                                                                      verify
                                                                      your email
                                                                      before you
                                                                      can begin
                                                                      using your
                                                                      Service HUB
                                                                      Account.
                                                                      This link
                                                                      expires in
                                                                      60
                                                                      minutes.
                                                                    </td>
                                                                  </tr>
                                                                </tbody>
                                                              </table>
                                                            </td>
                                                          </tr>
                                                          <tr>
                                                            <td>
                                                              <table
                                                                height='40'
                                                                align='left'
                                                                cellpadding='0'
                                                                cellspacing='0'
                                                                border='0'
                                                                style='
                                                                  height: 40px;
                                                                  background-color: #000000;
                                                                  border-radius: 4px;
                                                                  border-collapse: separate !important;
                                                                '
                                                              >
                                                                <tbody>
                                                                  <tr>
                                                                    <td
                                                                      style='
                                                                        width: 100%;
                                                                      '
                                                                    >
                                                                      <u></u>
                                                                      <a
                                                                        href='$server_ip/service_hub/PHPMailer/verify.php?email=$email&v_code=$v_code'
                                                                        style='
                                                                          padding: 8px
                                                                            20px;
                                                                          color: #fff !important;
                                                                          text-decoration: none;
                                                                          font-family: Arial,
                                                                            Helvetica,
                                                                            sans-serif;
                                                                          font-size: 16px;
                                                                        '
                                                                        target='_blank'
                                                                        >Verify
                                                                        email</a
                                                                      >
                                                                      <u></u>
                                                                    </td>
                                                                  </tr>
                                                                </tbody>
                                                              </table>
                                                            </td>
                                                          </tr>

                                                          <tr>
                                                            <td
                                                              height='32'
                                                            ></td>
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
                                </tbody>
                              </table>
                            </td>
                          </tr>
                        </tbody>
                      </table>
                    </span>
                    <table
                      width='100%'
                      border='0'
                      cellpadding='0'
                      cellspacing='0'
                      align='center'
                      style='border-collapse: collapse'
                    >
                      <tbody>
                        <tr>
                          <td
                            align='center'
                            valign='top'
                            style='min-width: 670px; width: 670px'
                          >
                            <table
                              border='0'
                              cellpadding='0'
                              cellspacing='0'
                              style='
                                min-width: 670px;
                                width: 670px;
                                border-collapse: collapse;
                              '
                              align='center'
                            >
                              <tbody>
                                <tr>
                                  <td
                                    bgcolor='#FFFFFF'
                                    style='background-color: #ffffff'
                                    align='left'
                                    valign='top'
                                  >
                                    <table
                                      border='0'
                                      cellpadding='0'
                                      cellspacing='0'
                                      style='
                                        min-width: 670px;
                                        width: 670px;
                                        border-collapse: collapse;
                                      '
                                    >
                                      <tbody>
                                        <tr>
                                          <td
                                            style='padding: 0 35px 0 35px'
                                            align='left'
                                            valign='top'
                                          >
                                            <table
                                              width='100%'
                                              border='0'
                                              cellpadding='0'
                                              cellspacing='0'
                                              align='left'
                                              style='border-collapse: collapse'
                                            >
                                              <tbody>
                                                <tr>
                                                  <td>
                                                    <a
                                                      name='m_8270912005771009168_panel-3'
                                                    ></a>
                                                    <table
                                                      width='100%'
                                                      cellpadding='0'
                                                      cellspacing='0'
                                                      border='0'
                                                      style='
                                                        border-collapse: collapse;
                                                      '
                                                    >
                                                      <tbody>
                                                        <tr>
                                                          <td height='32'></td>
                                                        </tr>
                                                        <tr>
                                                          <td
                                                            dir='ltr'
                                                            style='
                                                              font-size: 15px;
                                                              color: #212121;
                                                              font-family: Arial,
                                                                Helvetica,
                                                                sans-serif;
                                                              font-weight: normal;
                                                              text-align: left;
                                                              line-height: 22px;
                                                              padding: 0px 0px
                                                                0px 0px;
                                                              word-break: break-word;
                                                            '
                                                            align='left'
                                                          >
                                                              >If clicking
                                                              Verify Email
                                                              doesn't work, copy
                                                              and paste this
                                                              link into your
                                                              browser:
                                                              <br /></span
                                                            ><span
                                                              style='
                                                                color: #212121 !important;
                                                                text-decoration: underline;
                                                                word-break: break-all;
                                                              '
                                                              ><a
                                                                href='$server_ip/service_hub/PHPMailer/verify.php?email=$email&v_code=$v_code'
                                                                target='_blank'
                                                                >href='$server_ip/service_hub/PHPMailer/verify.php?email=$email&v_code=$v_code</a></span
                                                            >
                                                          </td>
                                                        </tr>

                                                        <tr>
                                                          <td height='32'></td>
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
                              </tbody>
                            </table>
                          </td>
                        </tr>
                      </tbody>
                    </table>
                      <table
                        border='0'
                        cellpadding='0'
                        cellspacing='0'
                        width='100%'
                        style='
                          background-color: #fbfbfb;
                          border-collapse: collapse;
                        '
                      >
                        <tbody>
                          <tr>
                            <td
                              id='m_8270912005771009168footer-container'
                              style='
                                padding: 22px 32px 32px 32px;
                                vertical-align: top;
                              '
                            >
                              <table
                                border='0'
                                cellpadding='0'
                                cellspacing='0'
                                width='100%'
                                style='border-collapse: collapse'
                              >
                                <tbody>
                                  <tr>
                                    <td
                                      style='
                                        font-size: 10px;
                                        color: #212121;
                                        font-family: Arial, Helvetica,
                                          sans-serif;
                                        font-weight: normal;
                                        text-align: left;
                                        line-height: 14px;
                                        padding-bottom: 10px;
                                      '
                                      align='left'
                                    >
                                      Service HUB, Inc. • 111 McInnis Parkway • San
                                      Rafael, CA 94903
                                    </td>
                                  </tr>
                                  <tr>
                                    <td>
                                      <div id='m_8270912005771009168legal-copy'>
                                        <table
                                          width='100%'
                                          cellpadding='0'
                                          cellspacing='0'
                                          border='0'
                                          style='border-collapse: collapse'
                                        >
                                          <tbody>
                                            <tr>
                                              <td
                                                dir='ltr'
                                                style='
                                                  font-size: 10px;
                                                  color: #212121;
                                                  font-family: Arial, Helvetica,
                                                    sans-serif;
                                                  font-weight: normal;
                                                  text-align: left;
                                                  line-height: 14px;
                                                  padding-bottom: 10px;
                                                '
                                                align='left'
                                              >
                                                © Service HUB, Inc. All rights
                                                reserved.
                                                <a
                                                  href=''
                                                  style='
                                                    color: rgb(0, 0, 0);
                                                    text-decoration: underline;
                                                  '
                                                  target='_blank'
                                                  >Legal Notices &amp;
                                                  Trademarks</a
                                                >.
                                                <a
                                                  href=''
                                                  style='
                                                    color: rgb(0, 0, 0);
                                                    text-decoration: underline;
                                                  '
                                                  target='_blank'
                                                  >Privacy Policy</a
                                                >
                                              </td>
                                            </tr>
                                            <tr>
                                              <td
                                                dir='ltr'
                                                style='
                                                  font-size: 10px;
                                                  color: #212121;
                                                  font-family: Arial, Helvetica,
                                                    sans-serif;
                                                  font-weight: normal;
                                                  text-align: left;
                                                  line-height: 14px;
                                                  padding-bottom: 10px;
                                                '
                                                align='left'
                                              >
                                                This is an operational email.
                                              </td>
                                            </tr>
                                            <tr>
                                              <td
                                                dir='ltr'
                                                style='
                                                  font-size: 10px;
                                                  color: #212121;
                                                  font-family: Arial, Helvetica,
                                                    sans-serif;
                                                  font-weight: normal;
                                                  text-align: left;
                                                  line-height: 14px;
                                                  padding-bottom: 10px;
                                                '
                                                align='left'
                                              >
                                                Please do not reply to this
                                                email. Replies to this email
                                                will not be responded to or
                                                read.
                                              </td>
                                            </tr>
                                          </tbody>
                                        </table>
                                      </div>
                                    </td>
                                  </tr>
                                  <tr>
                                    <td
                                      style='
                                        font-size: 10px;
                                        color: #212121;
                                        font-family: Arial, Helvetica,
                                          sans-serif;
                                        font-weight: normal;
                                        text-align: left;
                                        line-height: 14px;
                                      '
                                      align='left'
                                    >
                                      Service HUB, the Service HUB logo, AutoCAD and
                                      Revit are registered trademarks or
                                      trademarks of Service HUB, Inc., and/or its
                                      subsidiaries and/or affiliates in the USA
                                      and/or other countries. All other brand
                                      names, product names, or trademarks belong
                                      to their respective holders. Service HUB
                                      reserves the right to alter product and
                                      services offerings, and specifications and
                                      pricing at any time without notice, and is
                                      not responsible for typographical or
                                      graphical errors that may appear in this
                                      document.
                                    </td>
                                  </tr>
                                </tbody>
                              </table>
                            </td>
                          </tr>
                        </tbody>
                      </table>
                    </span>
                  </td>
                </tr>
              </tbody>
            </table>
          </td>
        </tr>
      </tbody>
    </table>";          // Email body in HTML format
        $mail->AltBody = 'This is the plain text message body.';    // Plain text body for non-HTML email clients


        $mail->send();
        return true;
    } catch (Exception $e) {
        return '';
    }
}
