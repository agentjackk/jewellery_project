<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Email_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Admin_model');
        $this->load->helper('url');
    }

 

    public function contact_inquiry_email_user($name, $email)
    {

      date_default_timezone_set('Asia/Kolkata');
      $date = date('d-m-Y H:i:s');
      $weekday = date('l', strtotime($date));
      $month = date('F', strtotime($date));
      $year = date('d, Y');
      $time = date('h:i:s a', strtotime($date));

      $to1 = $email;
      $subject1 = "Your Responce Has been Recorded ";

        $htmlContent1 = '
                                <!DOCTYPE html
                                    PUBLIC "-//W3C//DTD XHTML 1.0 Transitional //EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

                                <html xmlns="http://www.w3.org/1999/xhtml"
                                    xmlns:o="urn:schemas-microsoft-com:office:office"
                                    xmlns:v="urn:schemas-microsoft-com:vml">

                                <head>
                                    <!--[if gte mso 9]><xml><o:OfficeDocumentSettings><o:AllowPNG/><o:PixelsPerInch>96</o:PixelsPerInch></o:OfficeDocumentSettings></xml><![endif]-->
                                    <meta content="text/html; charset=utf-8" http-equiv="Content-Type" />
                                    <meta content="width=device-width" name="viewport" />
                                    <!--[if !mso]><!-->
                                    <meta content="IE=edge" http-equiv="X-UA-Compatible" />
                                    <!--<![endif]-->
                                    <title>Notification | Detect Diagnostics</title>
                                    <!--[if !mso]><!-->
                                    <!--<![endif]-->
                                    <style type="text/css">
                                    body {
                                        margin: 0;
                                        padding: 0;
                                    }

                                    table,
                                    td,
                                    tr {
                                        vertical-align: top;
                                        border-collapse: collapse;
                                    }

                                    * {
                                        line-height: inherit;
                                    }

                                    a[x-apple-data-detectors=true] {
                                        color: inherit !important;
                                        text-decoration: none !important;
                                    }
                                    </style>
                                    <style id="media-query" type="text/css">
                                    @media (max-width: 660px) {

                                        .block-grid,
                                        .col {
                                            min-width: 320px !important;
                                            max-width: 100% !important;
                                            display: block !important;
                                        }

                                        .block-grid {
                                            width: 100% !important;
                                        }

                                        .col {
                                            width: 100% !important;
                                        }

                                        .col>div {
                                            margin: 0 auto;
                                        }

                                        img.fullwidth,
                                        img.fullwidthOnMobile {
                                            max-width: 100% !important;
                                        }

                                        .no-stack .col {
                                            min-width: 0 !important;
                                            display: table-cell !important;
                                        }

                                        .no-stack.two-up .col {
                                            width: 50% !important;
                                        }

                                        .no-stack .col.num4 {
                                            width: 33% !important;
                                        }

                                        .no-stack .col.num8 {
                                            width: 66% !important;
                                        }

                                        .no-stack .col.num4 {
                                            width: 33% !important;
                                        }

                                        .no-stack .col.num3 {
                                            width: 25% !important;
                                        }

                                        .no-stack .col.num6 {
                                            width: 50% !important;
                                        }

                                        .no-stack .col.num9 {
                                            width: 75% !important;
                                        }

                                        .video-block {
                                            max-width: none !important;
                                        }

                                        .mobile_hide {
                                            min-height: 0px;
                                            max-height: 0px;
                                            max-width: 0px;
                                            display: none;
                                            overflow: hidden;
                                            font-size: 0px;
                                        }

                                        .desktop_hide {
                                            display: block !important;
                                            max-height: none !important;
                                        }
                                    }
                                    </style>
                                </head>

                                <body class="clean-body"
                                    style="margin: 0; padding: 0; -webkit-text-size-adjust: 100%; background-color: #f1f4f8;">
                                    <!--[if IE]><div class="ie-browser"><![endif]-->
                                    <table bgcolor="#f1f4f8" cellpadding="0" cellspacing="0" class="nl-container"
                                        role="presentation"
                                        style="table-layout: fixed; vertical-align: top; min-width: 320px; Margin: 0 auto; border-spacing: 0; border-collapse: collapse; mso-table-lspace: 0pt; mso-table-rspace: 0pt; background-color: #f1f4f8; width: 100%;"
                                        valign="top" width="100%">
                                        <tbody>
                                            <tr style="vertical-align: top;" valign="top">
                                                <td style="word-break: break-word; vertical-align: top;" valign="top">

                                                    <div style="background-color:transparent;">
                                                        <div class="block-grid"
                                                            style="Margin: 0 auto; min-width: 320px; max-width: 640px; overflow-wrap: break-word; word-wrap: break-word; word-break: break-word; background-color: transparent;">
                                                            <div
                                                                style="border-collapse: collapse;display: table;width: 100%;background-color:transparent;">

                                                                <div class="col num12"
                                                                    style="min-width: 320px; max-width: 640px; display: table-cell; vertical-align: top; width: 640px;">
                                                                    <div style="width:100% !important;">
                                                                        <div
                                                                            style="border-top:0px solid transparent; border-left:0px solid transparent; border-bottom:0px solid transparent; border-right:0px solid transparent; padding-top:0px; padding-bottom:0px; padding-right: 0px; padding-left: 0px;">
                                                                            <div class="mobile_hide">
                                                                                <table border="0" cellpadding="0"
                                                                                    cellspacing="0" class="divider"
                                                                                    role="presentation"
                                                                                    style="table-layout: fixed; vertical-align: top; border-spacing: 0; border-collapse: collapse; mso-table-lspace: 0pt; mso-table-rspace: 0pt; min-width: 100%; -ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%;"
                                                                                    valign="top" width="100%">
                                                                                    <tbody>
                                                                                        <tr style="vertical-align: top;"
                                                                                            valign="top">
                                                                                            <td class="divider_inner"
                                                                                                style="word-break: break-word; vertical-align: top; min-width: 100%; -ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%; padding-top: 30px; padding-right: 10px; padding-bottom: 0px; padding-left: 10px;"
                                                                                                valign="top">
                                                                                                <table align="center"
                                                                                                    border="0"
                                                                                                    cellpadding="0"
                                                                                                    cellspacing="0"
                                                                                                    class="divider_content"
                                                                                                    role="presentation"
                                                                                                    style="table-layout: fixed; vertical-align: top; border-spacing: 0; border-collapse: collapse; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-top: 0px solid #BBBBBB; width: 100%;"
                                                                                                    valign="top"
                                                                                                    width="100%">
                                                                                                    <tbody>
                                                                                                        <tr style="vertical-align: top;"
                                                                                                            valign="top">
                                                                                                            <td style="word-break: break-word; vertical-align: top; -ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%;"
                                                                                                                valign="top">
                                                                                                                <span></span>
                                                                                                            </td>
                                                                                                        </tr>
                                                                                                    </tbody>
                                                                                                </table>
                                                                                            </td>
                                                                                        </tr>
                                                                                    </tbody>
                                                                                </table>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div style="background-color:transparent;">
                                                        <div class="block-grid"
                                                            style="Margin: 0 auto; min-width: 320px; max-width: 640px; overflow-wrap: break-word; word-wrap: break-word; word-break: break-word; background-color: #ffffff;">
                                                            <div
                                                                style="border-collapse: collapse;display: table;width: 100%;background-color:#ffffff;">

                                                                <div class="col num12"
                                                                    style="min-width: 320px; max-width: 640px; display: table-cell; vertical-align: top; width: 640px;">
                                                                    <div style="width:100% !important;">
                                                                        <!--[if (!mso)&(!IE)]><!-->
                                                                        <div
                                                                            style="border-top:0px solid transparent; border-left:0px solid transparent; border-bottom:0px solid transparent; border-right:0px solid transparent; padding-top:0px; padding-bottom:0px; padding-right: 0px; padding-left: 0px;">
                                                                            <!--<![endif]-->
                                                                            <table border="0" cellpadding="0"
                                                                                cellspacing="0" class="divider"
                                                                                role="presentation"
                                                                                style="table-layout: fixed; vertical-align: top; border-spacing: 0; border-collapse: collapse; mso-table-lspace: 0pt; mso-table-rspace: 0pt; min-width: 100%; -ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%;"
                                                                                valign="top" width="100%">
                                                                                <tbody>
                                                                                    <tr style="vertical-align: top;"
                                                                                        valign="top">
                                                                                        <td class="divider_inner"
                                                                                            style="word-break: break-word; vertical-align: top; min-width: 100%; -ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%; padding-top: 15px; padding-right: 10px; padding-bottom: 0px; padding-left: 10px;"
                                                                                            valign="top">
                                                                                            <table align="center"
                                                                                                border="0"
                                                                                                cellpadding="0"
                                                                                                cellspacing="0"
                                                                                                class="divider_content"
                                                                                                role="presentation"
                                                                                                style="table-layout: fixed; vertical-align: top; border-spacing: 0; border-collapse: collapse; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-top: 0px solid #BBBBBB; width: 100%;"
                                                                                                valign="top"
                                                                                                width="100%">
                                                                                                <tbody>
                                                                                                    <tr style="vertical-align: top;"
                                                                                                        valign="top">
                                                                                                        <td style="word-break: break-word; vertical-align: top; -ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%;"
                                                                                                            valign="top">
                                                                                                            <span></span>
                                                                                                        </td>
                                                                                                    </tr>
                                                                                                </tbody>
                                                                                            </table>
                                                                                        </td>
                                                                                    </tr>
                                                                                </tbody>
                                                                            </table>
                                                                            <div align="center"
                                                                                class="img-container center autowidth"
                                                                                style="padding-right: 20px;padding-left: 20px;">
                                                                                <!--[if mso]><table width="100%" cellpadding="0" cellspacing="0" border="0"><tr style="line-height:0px"><td style="padding-right: 20px;padding-left: 20px;" align="center"><![endif]-->
                                                                                <div
                                                                                    style="font-size:1px;line-height:20px">
                                                                                </div>
                                                                                <a href="<?php echo base_url()?>"
target="_blank"><img align="center" border="0" class="center autowidth"
    src="<?php echo base_url()?>public/images/detectlogo.png"
    style="text-decoration: none; -ms-interpolation-mode: bicubic; border: 0; height: auto; width: 30%; max-width: 560px; display: block;"
    width="260" /></a>
<div style="font-size:1px;line-height:20px">
</div>
<!--[if mso]></td></tr></table><![endif]-->
</div>
<table border="0" cellpadding="0" cellspacing="0" class="divider" role="presentation"
    style="table-layout: fixed; vertical-align: top; border-spacing: 0; border-collapse: collapse; mso-table-lspace: 0pt; mso-table-rspace: 0pt; min-width: 100%; -ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%;"
    valign="top" width="100%">
    <tbody>
        <tr style="vertical-align: top;" valign="top">
            <td class="divider_inner"
                style="word-break: break-word; vertical-align: top; min-width: 100%; -ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%; padding-top: 18px; padding-right: 10px; padding-bottom: 0px; padding-left: 10px;"
                valign="top">
                <table align="center" border="0" cellpadding="0" cellspacing="0" class="divider_content"
                    role="presentation"
                    style="table-layout: fixed; vertical-align: top; border-spacing: 0; border-collapse: collapse; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-top: 0px solid #BBBBBB; width: 100%;"
                    valign="top" width="100%">
                    <tbody>
                        <tr style="vertical-align: top;" valign="top">
                            <td style="word-break: break-word; vertical-align: top; -ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%;"
                                valign="top">
                                <span></span>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </td>
        </tr>
    </tbody>
</table>
<!--[if (!mso)&(!IE)]><!-->
</div>
<!--<![endif]-->
</div>
</div>
<!--[if (mso)|(IE)]></td></tr></table><![endif]-->
<!--[if (mso)|(IE)]></td></tr></table></td></tr></table><![endif]-->
</div>
</div>
</div>
<div style="background-color:transparent;">
    <div class="block-grid"
        style="Margin: 0 auto; min-width: 320px; max-width: 640px; overflow-wrap: break-word; word-wrap: break-word; word-break: break-word; background-color: #ffffff;">
        <div style="border-collapse: collapse;display: table;width: 100%;background-color:#ffffff;">
            <!--[if (mso)|(IE)]><table width="100%" cellpadding="0" cellspacing="0" border="0" style="background-color:transparent;"><tr><td align="center"><table cellpadding="0" cellspacing="0" border="0" style="width:640px"><tr class="layout-full-width" style="background-color:#ffffff"><![endif]-->
            <!--[if (mso)|(IE)]><td align="center" width="640" style="background-color:#ffffff;width:640px; border-top: 0px solid transparent; border-left: 0px solid transparent; border-bottom: 0px solid transparent; border-right: 0px solid transparent;" valign="top"><table width="100%" cellpadding="0" cellspacing="0" border="0"><tr><td style="padding-right: 0px; padding-left: 0px; padding-top:0px; padding-bottom:0px;"><![endif]-->
            <div class="col num12"
                style="min-width: 320px; max-width: 640px; display: table-cell; vertical-align: top; width: 640px;">
                <div style="width:100% !important;">
                    <!--[if (!mso)&(!IE)]><!-->
                    <div
                        style="border-top:0px solid transparent; border-left:0px solid transparent; border-bottom:0px solid transparent; border-right:0px solid transparent; padding-top:0px; padding-bottom:0px; padding-right: 0px; padding-left: 0px;">
                        <!--<![endif]-->
                        <div align="center" class="img-container center autowidth"
                            style="padding-right: 0px;padding-left: 0px;">
                            <!--[if mso]><table width="100%" cellpadding="0" cellspacing="0" border="0"><tr style="line-height:0px"><td style="padding-right: 0px;padding-left: 0px;" align="center"><![endif]--><img
                                align="center" border="0" class="center autowidth"
                                src="https://www.poojadarda.com/images/Invite_Illustration.png"
                                style="text-decoration: none; -ms-interpolation-mode: bicubic; border: 0; height: auto; width: 100%; max-width: 640px; display: block;"
                                width="640" />
                            <!--[if mso]></td></tr></table><![endif]-->
                        </div>
                        <!--[if mso]><table width="100%" cellpadding="0" cellspacing="0" border="0"><tr><td style="padding-right: 40px; padding-left: 40px; padding-top: 20px; padding-bottom: 10px; font-family: Tahoma, sans-serif"><![endif]-->
                        <div
                            style="color:#555555;font-family:Trebuchet MS, Lucida Grande, Lucida Sans Unicode, Lucida Sans, Tahoma, sans-serif;line-height:1.2;padding-top:20px;padding-right:40px;padding-bottom:10px;padding-left:40px;">
                            <div
                                style="line-height: 1.2; font-size: 12px; color: #555555; font-family: Trebuchet MS, Lucida Grande, Lucida Sans Unicode, Lucida Sans, Tahoma, sans-serif; mso-line-height-alt: 14px;">
                                <p
                                    style="font-size: 46px; line-height: 1.2; text-align: center; word-break: break-word; mso-line-height-alt: 55px; margin: 0;">
                                    <span style="font-size: 38px; color: #003188;"><strong>Team
                                            <a href="<?php echo base_url()?>" target="_blank"
                                                style="text-decoration:none;color:#003188;">Detect
                                                Diagnostics,</strong></span>
                                </p>
                            </div>
                        </div>
                        <table border="0" cellpadding="0" cellspacing="0" class="divider" role="presentation"
                            style="table-layout: fixed; vertical-align: top; border-spacing: 0; border-collapse: collapse; mso-table-lspace: 0pt; mso-table-rspace: 0pt; min-width: 100%; -ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%;"
                            valign="top" width="100%">
                            <tbody>
                                <tr style="vertical-align: top;" valign="top">
                                    <td class="divider_inner"
                                        style="word-break: break-word; vertical-align: top; min-width: 100%; -ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%; padding-top: 20px; padding-right: 10px; padding-bottom: 0px; padding-left: 10px;"
                                        valign="top">
                                        <table align="center" border="0" cellpadding="0" cellspacing="0"
                                            class="divider_content" role="presentation"
                                            style="table-layout: fixed; vertical-align: top; border-spacing: 0; border-collapse: collapse; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-top: 0px solid #BBBBBB; width: 100%;"
                                            valign="top" width="100%">
                                            <tbody>
                                                <tr style="vertical-align: top;" valign="top">
                                                    <td style="word-break: break-word; vertical-align: top; -ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%;"
                                                        valign="top">
                                                        <span></span>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <div align="center" class="img-container center autowidth"
                            style="padding-right: 0px;padding-left: 0px;">
                            <!--[if mso]><table width="100%" cellpadding="0" cellspacing="0" border="0"><tr style="line-height:0px"><td style="padding-right: 0px;padding-left: 0px;" align="center"><![endif]--><img
                                align="center" border="0" class="center autowidth"
                                src="https://www.poojadarda.com/images/Divisor_Lines.png"
                                style="text-decoration: none; -ms-interpolation-mode: bicubic; border: 0; height: auto; width: 100%; max-width: 158px; display: block;"
                                width="158" />
                            <!--[if mso]></td></tr></table><![endif]-->
                        </div>
                        <table border="0" cellpadding="0" cellspacing="0" class="divider" role="presentation"
                            style="table-layout: fixed; vertical-align: top; border-spacing: 0; border-collapse: collapse; mso-table-lspace: 0pt; mso-table-rspace: 0pt; min-width: 100%; -ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%;"
                            valign="top" width="100%">
                            <tbody>
                                <tr style="vertical-align: top;" valign="top">
                                    <td class="divider_inner"
                                        style="word-break: break-word; vertical-align: top; min-width: 100%; -ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%; padding-top: 20px; padding-right: 10px; padding-bottom: 0px; padding-left: 10px;"
                                        valign="top">
                                        <table align="center" border="0" cellpadding="0" cellspacing="0"
                                            class="divider_content" role="presentation"
                                            style="table-layout: fixed; vertical-align: top; border-spacing: 0; border-collapse: collapse; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-top: 0px solid #BBBBBB; width: 100%;"
                                            valign="top" width="100%">
                                            <tbody>
                                                <tr style="vertical-align: top;" valign="top">
                                                    <td style="word-break: break-word; vertical-align: top; -ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%;"
                                                        valign="top">
                                                        <span></span>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <!--[if mso]><table width="100%" cellpadding="0" cellspacing="0" border="0"><tr><td style="padding-right: 40px; padding-left: 40px; padding-top: 10px; padding-bottom: 10px; font-family: Tahoma, sans-serif"><![endif]-->
                        <div
                            style="color:#555555;font-family:Trebuchet MS, Lucida Grande, Lucida Sans Unicode, Lucida Sans, Tahoma, sans-serif;line-height:1.2;padding-top:10px;padding-right:40px;padding-bottom:10px;padding-left:40px;">
                            <div
                                style="line-height: 1.2; font-size: 12px; color: #555555; font-family: Trebuchet MS, Lucida Grande, Lucida Sans Unicode, Lucida Sans, Tahoma, sans-serif; mso-line-height-alt: 14px;">
                                <p
                                    style="font-size: 24px; line-height: 1.2; text-align: center; word-break: break-word; mso-line-height-alt: 29px; margin: 0;">
                                    <span style="font-size: 24px; color: #003188;"><strong>Hi&nbsp;'
                                            . $name .
                                            ',<br /></strong></span>
                                </p>
                            </div>
                        </div>
                        <!--[if mso]></td></tr></table><![endif]-->
                        <!--[if mso]><table width="100%" cellpadding="0" cellspacing="0" border="0"><tr><td style="padding-right: 40px; padding-left: 40px; padding-top: 10px; padding-bottom: 10px; font-family: Tahoma, sans-serif"><![endif]-->
                        <div
                            style="color:#555555;font-family:Trebuchet MS, Lucida Grande, Lucida Sans Unicode, Lucida Sans, Tahoma, sans-serif;line-height:1.5;padding-top:10px;padding-right:40px;padding-bottom:10px;padding-left:40px;">
                            <div
                                style="line-height: 1.5; font-size: 12px; font-family: Trebuchet MS, Lucida Grande, Lucida Sans Unicode, Lucida Sans, Tahoma, sans-serif; color: #555555; mso-line-height-alt: 18px;">
                                <p
                                    style="text-align: center; line-height: 1.5; word-break: break-word; font-family: inherit; font-size: 16px; mso-line-height-alt: 24px; margin: 0;">
                                    <span style="font-size: 16px; color: #6d89bc;">We
                                        have received
                                        your message and would like
                                        to thank you for writing to
                                        us.
                                        We will contact to you as
                                        soon as possible. Talk to
                                        you
                                        soon...</span><span style="font-size: 16px; color: #6d89bc;"><br /></span>
                                </p>
                            </div>
                        </div>
                        <!--[if mso]></td></tr></table><![endif]-->
                        <div align="center" class="button-container"
                            style="padding-top:15px;padding-right:10px;padding-bottom:25px;padding-left:10px;">
                            <!--[if mso]><table width="100%" cellpadding="0" cellspacing="0" border="0" style="border-spacing: 0; border-collapse: collapse; mso-table-lspace:0pt; mso-table-rspace:0pt;"><tr><td style="padding-top: 15px; padding-right: 10px; padding-bottom: 25px; padding-left: 10px" align="center"><v:roundrect xmlns:v="urn:schemas-microsoft-com:vml" xmlns:w="urn:schemas-microsoft-com:office:word" href="" style="height:34.5pt; width:138pt; v-text-anchor:middle;" arcsize="131%" stroke="false" fillcolor="#fb5f3d"><w:anchorlock/><v:textbox inset="0,0,0,0"><center style="color:#ffffff; font-family:Tahoma, sans-serif; font-size:18px"><![endif]-->
                            <a href="#">
                                <div
                                    style="text-decoration:none;display:inline-block;color:#ffffff;background-color:#018abe;border-radius:60px;-webkit-border-radius:60px;-moz-border-radius:60px;width:auto; width:auto;;border-top:1px solid #018abe;border-right:1px solid #018abe;border-bottom:1px solid #018abe;border-left:1px solid #018abe;padding-top:5px;padding-bottom:5px;font-family:Trebuchet MS, Lucida Grande, Lucida Sans Unicode, Lucida Sans, Tahoma, sans-serif;text-align:center;mso-border-alt:none;word-break:keep-all;">
                                    <span
                                        style="padding-left:20px;padding-right:20px;font-size:18px;display:inline-block;"><span
                                            style="font-size: 16px; line-height: 2; word-break: break-word; mso-line-height-alt: 32px;"><span
                                                data-mce-style="font-size: 18px; line-height: 36px;"
                                                style="font-size: 18px; line-height: 36px;"><strong>Have
                                                    a great
                                                    day!</strong></span></span>
                                    </span>
                                </div>
                            </a>
                            <!--[if mso]></center></v:textbox></v:roundrect></td></tr></table><![endif]-->
                        </div>
                        <!--[if (!mso)&(!IE)]><!-->
                    </div>
                    <!--<![endif]-->
                </div>
            </div>
            <!--[if (mso)|(IE)]></td></tr></table><![endif]-->
            <!--[if (mso)|(IE)]></td></tr></table></td></tr></table><![endif]-->
        </div>
    </div>
</div>
<div style="background-color:transparent;">
    <div class="block-grid"
        style="Margin: 0 auto; min-width: 320px; max-width: 640px; overflow-wrap: break-word; word-wrap: break-word; word-break: break-word; background-color: #ffffff;">
        <div style="border-collapse: collapse;display: table;width: 100%;background-color:#ffffff;">
            <!--[if (mso)|(IE)]><table width="100%" cellpadding="0" cellspacing="0" border="0" style="background-color:transparent;"><tr><td align="center"><table cellpadding="0" cellspacing="0" border="0" style="width:640px"><tr class="layout-full-width" style="background-color:#ffffff"><![endif]-->
            <!--[if (mso)|(IE)]><td align="center" width="640" style="background-color:#ffffff;width:640px; border-top: 1px solid #E5EAF3; border-left: 0px solid transparent; border-bottom: 0px solid transparent; border-right: 0px solid transparent;" valign="top"><table width="100%" cellpadding="0" cellspacing="0" border="0"><tr><td style="padding-right: 0px; padding-left: 0px; padding-top:0px; padding-bottom:0px;"><![endif]-->
            <div class="col num12"
                style="min-width: 320px; max-width: 640px; display: table-cell; vertical-align: top; width: 640px;">
                <div style="width:100% !important;">
                    <!--[if (!mso)&(!IE)]><!-->
                    <div
                        style="border-top:1px solid #E5EAF3; border-left:0px solid transparent; border-bottom:0px solid transparent; border-right:0px solid transparent; padding-top:0px; padding-bottom:0px; padding-right: 0px; padding-left: 0px;">
                        <!--<![endif]-->
                        <!--[if mso]><table width="100%" cellpadding="0" cellspacing="0" border="0"><tr><td style="padding-right: 40px; padding-left: 40px; padding-top: 10px; padding-bottom: 10px; font-family: Tahoma, sans-serif"><![endif]-->
                        <div
                            style="color:#555555;font-family:Trebuchet MS, Lucida Grande, Lucida Sans Unicode, Lucida Sans, Tahoma, sans-serif;line-height:1.5;padding-top:10px;padding-right:40px;padding-bottom:10px;padding-left:40px;">
                            <div
                                style="line-height: 1.5; font-size: 12px; font-family: Trebuchet MS, Lucida Grande, Lucida Sans Unicode, Lucida Sans, Tahoma, sans-serif; color: #555555; mso-line-height-alt: 18px;">
                                <p
                                    style="text-align: center; line-height: 1.5; word-break: break-word; font-family: inherit; font-size: 16px; mso-line-height-alt: 24px; margin: 0;">
                                    <span style="font-size: 16px; color: #6d89bc;">Received
                                        On :
                                        ' . $weekday . ',&nbsp;' .
                                        $month . '&nbsp;' . $year .
                                        '&nbsp;' . $time .
                                        '&nbsp;GMT+5:30</span><span
                                        style="font-size: 16px; color: #6d89bc;"><br /></span>
                                </p>
                            </div>
                        </div>
                        <!--[if mso]></td></tr></table><![endif]-->
                        <table border="0" cellpadding="0" cellspacing="0" class="divider" role="presentation"
                            style="table-layout: fixed; vertical-align: top; border-spacing: 0; border-collapse: collapse; mso-table-lspace: 0pt; mso-table-rspace: 0pt; min-width: 100%; -ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%;"
                            valign="top" width="100%">
                            <tbody>
                                <tr style="vertical-align: top;" valign="top">
                                    <td class="divider_inner"
                                        style="word-break: break-word; vertical-align: top; min-width: 100%; -ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%; padding-top: 25px; padding-right: 10px; padding-bottom: 0px; padding-left: 10px;"
                                        valign="top">
                                        <table align="center" border="0" cellpadding="0" cellspacing="0"
                                            class="divider_content" role="presentation"
                                            style="table-layout: fixed; vertical-align: top; border-spacing: 0; border-collapse: collapse; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-top: 0px solid #BBBBBB; width: 100%;"
                                            valign="top" width="100%">
                                            <tbody>
                                                <tr style="vertical-align: top;" valign="top">
                                                    <td style="word-break: break-word; vertical-align: top; -ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%;"
                                                        valign="top">
                                                        <span></span>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <div align="center" class="img-container center autowidth"
                            style="padding-right: 20px;padding-left: 20px;">
                            <!--[if mso]><table width="100%" cellpadding="0" cellspacing="0" border="0"><tr style="line-height:0px"><td style="padding-right: 20px;padding-left: 20px;" align="center"><![endif]-->
                            <div style="font-size:1px;line-height:20px">
                            </div>
                            <a href="<?php echo base_url()?>" target="_blank"><img align="center" border="0"
                                    class="center autowidth" src="<?php echo base_url()?>public/images/detectlogo.png"
                                    style="text-decoration: none; -ms-interpolation-mode: bicubic; border: 0; height: auto; width: 20%; max-width: 247px; display: block;"
                                    width="147" /></a>
                            <div style="font-size:1px;line-height:15px">
                            </div>
                            <!--[if mso]></td></tr></table><![endif]-->
                        </div>
                        <table cellpadding="0" cellspacing="0" class="social_icons" role="presentation"
                            style="table-layout: fixed; vertical-align: top; border-spacing: 0; border-collapse: collapse; mso-table-lspace: 0pt; mso-table-rspace: 0pt;"
                            valign="top" width="100%">
                            <tbody>
                                <tr style="vertical-align: top;" valign="top">
                                    <td style="word-break: break-word; vertical-align: top; padding-top: 10px; padding-right: 10px; padding-bottom: 10px; padding-left: 10px;"
                                        valign="top">
                                        <table align="center" cellpadding="0" cellspacing="0" class="social_table"
                                            role="presentation"
                                            style="table-layout: fixed; vertical-align: top; border-spacing: 0; border-collapse: collapse; mso-table-tspace: 0; mso-table-rspace: 0; mso-table-bspace: 0; mso-table-lspace: 0;"
                                            valign="top">
                                            <tbody>
                                                <tr align="center"
                                                    style="vertical-align: top; display: inline-block; text-align: center;"
                                                    valign="top">
                                                    <td style="word-break: break-word; vertical-align: top; padding-bottom: 0; padding-right: 4px; padding-left: 4px;"
                                                        valign="top">
                                                        <a href="https://www.facebook.com/detectdiagnostics"
                                                            target="_blank"><img height="32"
                                                                src="https://www.poojadarda.com/images/facebook2x.png"
                                                                style="text-decoration: none; -ms-interpolation-mode: bicubic; height: auto; border: none; display: block;"
                                                                width="32" /></a>
                                                    </td>
                                                    <td style="word-break: break-word; vertical-align: top; padding-bottom: 0; padding-right: 4px; padding-left: 4px;"
                                                        valign="top">
                                                        <a href="https://www.instagram.com/detect_diagnostics/"
                                                            target="_blank"><img height="32"
                                                                src="https://www.poojadarda.com/images/instagram2x.png"
                                                                style="text-decoration: none; -ms-interpolation-mode: bicubic; height: auto; border: none; display: block;"
                                                                width="32" /></a>
                                                    </td>
                                                    <td style="word-break: break-word; vertical-align: top; padding-bottom: 0; padding-right: 4px; padding-left: 4px;"
                                                        valign="top">
                                                        <a href="#" target="_blank"><img height="32"
                                                                src="https://www.poojadarda.com/images/linkedin2x.png"
                                                                style="text-decoration: none; -ms-interpolation-mode: bicubic; height: auto; border: none; display: block;"
                                                                width="32" /></a>
                                                    </td>
                                                    <td style="word-break: break-word; vertical-align: top; padding-bottom: 0; padding-right: 4px; padding-left: 4px;"
                                                        valign="top">
                                                        <a href="#" target="_blank"><img height="32"
                                                                src="https://www.poojadarda.com/images/youtube2x.png"
                                                                style="text-decoration: none; -ms-interpolation-mode: bicubic; height: auto; border: none; display: block;"
                                                                width="32" /></a>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <table border="0" cellpadding="0" cellspacing="0" class="divider" role="presentation"
                            style="table-layout: fixed; vertical-align: top; border-spacing: 0; border-collapse: collapse; mso-table-lspace: 0pt; mso-table-rspace: 0pt; min-width: 100%; -ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%;"
                            valign="top" width="100%">
                            <tbody>
                                <tr style="vertical-align: top;" valign="top">
                                    <td class="divider_inner"
                                        style="word-break: break-word; vertical-align: top; min-width: 100%; -ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%; padding-top: 30px; padding-right: 10px; padding-bottom: 0px; padding-left: 10px;"
                                        valign="top">
                                        <table align="center" border="0" cellpadding="0" cellspacing="0"
                                            class="divider_content" role="presentation"
                                            style="table-layout: fixed; vertical-align: top; border-spacing: 0; border-collapse: collapse; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-top: 0px solid #BBBBBB; width: 100%;"
                                            valign="top" width="100%">
                                            <tbody>
                                                <tr style="vertical-align: top;" valign="top">
                                                    <td style="word-break: break-word; vertical-align: top; -ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%;"
                                                        valign="top">
                                                        <span></span>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <!--[if (!mso)&(!IE)]><!-->
                    </div>
                    <!--<![endif]-->
                </div>
            </div>
            <!--[if (mso)|(IE)]></td></tr></table><![endif]-->
            <!--[if (mso)|(IE)]></td></tr></table></td></tr></table><![endif]-->
        </div>
    </div>
</div>
<div style="background-color:transparent;">
    <div class="block-grid"
        style="Margin: 0 auto; min-width: 320px; max-width: 640px; overflow-wrap: break-word; word-wrap: break-word; word-break: break-word; background-color: transparent;">
        <div style="border-collapse: collapse;display: table;width: 100%;background-color:transparent;">
            <!--[if (mso)|(IE)]><table width="100%" cellpadding="0" cellspacing="0" border="0" style="background-color:transparent;"><tr><td align="center"><table cellpadding="0" cellspacing="0" border="0" style="width:640px"><tr class="layout-full-width" style="background-color:transparent"><![endif]-->
            <!--[if (mso)|(IE)]><td align="center" width="640" style="background-color:transparent;width:640px; border-top: 0px solid transparent; border-left: 0px solid transparent; border-bottom: 0px solid transparent; border-right: 0px solid transparent;" valign="top"><table width="100%" cellpadding="0" cellspacing="0" border="0"><tr><td style="padding-right: 0px; padding-left: 0px; padding-top:0px; padding-bottom:0px;"><![endif]-->
            <div class="col num12"
                style="min-width: 320px; max-width: 640px; display: table-cell; vertical-align: top; width: 640px;">
                <div style="width:100% !important;">
                    <!--[if (!mso)&(!IE)]><!-->
                    <div
                        style="border-top:0px solid transparent; border-left:0px solid transparent; border-bottom:0px solid transparent; border-right:0px solid transparent; padding-top:0px; padding-bottom:0px; padding-right: 0px; padding-left: 0px;">
                        <!--<![endif]-->
                        <div class="mobile_hide">
                            <table border="0" cellpadding="0" cellspacing="0" class="divider" role="presentation"
                                style="table-layout: fixed; vertical-align: top; border-spacing: 0; border-collapse: collapse; mso-table-lspace: 0pt; mso-table-rspace: 0pt; min-width: 100%; -ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%;"
                                valign="top" width="100%">
                                <tbody>
                                    <tr style="vertical-align: top;" valign="top">
                                        <td class="divider_inner"
                                            style="word-break: break-word; vertical-align: top; min-width: 100%; -ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%; padding-top: 30px; padding-right: 10px; padding-bottom: 0px; padding-left: 10px;"
                                            valign="top">
                                            <table align="center" border="0" cellpadding="0" cellspacing="0"
                                                class="divider_content" role="presentation"
                                                style="table-layout: fixed; vertical-align: top; border-spacing: 0; border-collapse: collapse; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-top: 0px solid #BBBBBB; width: 100%;"
                                                valign="top" width="100%">
                                                <tbody>
                                                    <tr style="vertical-align: top;" valign="top">
                                                        <td style="word-break: break-word; vertical-align: top; -ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%;"
                                                            valign="top">
                                                            <span></span>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <!--[if (!mso)&(!IE)]><!-->
                    </div>
                    <!--<![endif]-->
                </div>
            </div>
            <!--[if (mso)|(IE)]></td></tr></table><![endif]-->
            <!--[if (mso)|(IE)]></td></tr></table></td></tr></table><![endif]-->
        </div>
    </div>
</div>
<!--[if (mso)|(IE)]></td></tr></table><![endif]-->
</td>
</tr>
</tbody>
</table>
<!--[if (IE)]></div><![endif]-->
</body>

</html>';

$headers = "MIME-Version: 1.0" . "\r\n";
$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
$headers .= "From:Detect Diagnostics<contact@detectdiagnostics.com>" . "\r\n";

    $headers .= "Reply-To:donotreply@detectdiagnostics.com" . "\r\n";

    $headers .= "X-Mailer:PHP/" . phpversion();

    mail($to1, $subject1, $htmlContent1, $headers, '-fcontact@detectdiagnostics.com');

    }

    public function contact_inquiry_email_admin($name, $email, $subject, $message)
    {

    date_default_timezone_set('Asia/Kolkata');
    $date = date('d-m-Y H:i:s');
    $weekday = date('l', strtotime($date));
    $month = date('F', strtotime($date));
    $year = date('d, Y');
    $time = date('h:i:s a', strtotime($date));

    $to1 = "crelite.info@gmail.com";
    $subject1 = "New Contact Us Inquiry";

    $htmlContent1 = '
    <!DOCTYPE html
        PUBLIC "-//W3C//DTD XHTML 1.0 Transitional //EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

    <html xmlns="http://www.w3.org/1999/xhtml" xmlns:o="urn:schemas-microsoft-com:office:office"
        xmlns:v="urn:schemas-microsoft-com:vml">

    <head>
        <!--[if gte mso 9]><xml><o:OfficeDocumentSettings><o:AllowPNG/><o:PixelsPerInch>96</o:PixelsPerInch></o:OfficeDocumentSettings></xml><![endif]-->
        <meta content="text/html; charset=utf-8" http-equiv="Content-Type" />
        <meta content="width=device-width" name="viewport" />
        <!--[if !mso]><!-->
        <meta content="IE=edge" http-equiv="X-UA-Compatible" />
        <!--<![endif]-->
        <title>Notification | Detect Diagnostics</title>
        <!--[if !mso]><!-->
        <!--<![endif]-->
        <style type="text/css">
        body {
            margin: 0;
            padding: 0;
        }

        table,
        td,
        tr {
            vertical-align: top;
            border-collapse: collapse;
        }

        * {
            line-height: inherit;
        }

        a[x-apple-data-detectors=true] {
            color: inherit !important;
            text-decoration: none !important;
        }
        </style>
        <style id="media-query" type="text/css">
        @media (max-width: 660px) {

            .block-grid,
            .col {
                min-width: 320px !important;
                max-width: 100% !important;
                display: block !important;
            }

            .block-grid {
                width: 100% !important;
            }

            .col {
                width: 100% !important;
            }

            .col>div {
                margin: 0 auto;
            }

            img.fullwidth,
            img.fullwidthOnMobile {
                max-width: 100% !important;
            }

            .no-stack .col {
                min-width: 0 !important;
                display: table-cell !important;
            }

            .no-stack.two-up .col {
                width: 50% !important;
            }

            .no-stack .col.num4 {
                width: 33% !important;
            }

            .no-stack .col.num8 {
                width: 66% !important;
            }

            .no-stack .col.num4 {
                width: 33% !important;
            }

            .no-stack .col.num3 {
                width: 25% !important;
            }

            .no-stack .col.num6 {
                width: 50% !important;
            }

            .no-stack .col.num9 {
                width: 75% !important;
            }

            .video-block {
                max-width: none !important;
            }

            .mobile_hide {
                min-height: 0px;
                max-height: 0px;
                max-width: 0px;
                display: none;
                overflow: hidden;
                font-size: 0px;
            }

            .desktop_hide {
                display: block !important;
                max-height: none !important;
            }
        }
        </style>
    </head>

    <body class="clean-body" style="margin: 0; padding: 0; -webkit-text-size-adjust: 100%; background-color: #f1f4f8;">
        <!--[if IE]><div class="ie-browser"><![endif]-->
        <table bgcolor="#f1f4f8" cellpadding="0" cellspacing="0" class="nl-container" role="presentation"
            style="table-layout: fixed; vertical-align: top; min-width: 320px; Margin: 0 auto; border-spacing: 0; border-collapse: collapse; mso-table-lspace: 0pt; mso-table-rspace: 0pt; background-color: #f1f4f8; width: 100%;"
            valign="top" width="100%">
            <tbody>
                <tr style="vertical-align: top;" valign="top">
                    <td style="word-break: break-word; vertical-align: top;" valign="top">
                        <!--[if (mso)|(IE)]><table width="100%" cellpadding="0" cellspacing="0" border="0"><tr><td align="center" style="background-color:#f1f4f8"><![endif]-->
                        <div style="background-color:transparent;">
                            <div class="block-grid"
                                style="Margin: 0 auto; min-width: 320px; max-width: 640px; overflow-wrap: break-word; word-wrap: break-word; word-break: break-word; background-color: transparent;">
                                <div
                                    style="border-collapse: collapse;display: table;width: 100%;background-color:transparent;">
                                    <!--[if (mso)|(IE)]><table width="100%" cellpadding="0" cellspacing="0" border="0" style="background-color:transparent;"><tr><td align="center"><table cellpadding="0" cellspacing="0" border="0" style="width:640px"><tr class="layout-full-width" style="background-color:transparent"><![endif]-->
                                    <!--[if (mso)|(IE)]><td align="center" width="640" style="background-color:transparent;width:640px; border-top: 0px solid transparent; border-left: 0px solid transparent; border-bottom: 0px solid transparent; border-right: 0px solid transparent;" valign="top"><table width="100%" cellpadding="0" cellspacing="0" border="0"><tr><td style="padding-right: 0px; padding-left: 0px; padding-top:0px; padding-bottom:0px;"><![endif]-->
                                    <div class="col num12"
                                        style="min-width: 320px; max-width: 640px; display: table-cell; vertical-align: top; width: 640px;">
                                        <div style="width:100% !important;">
                                            <!--[if (!mso)&(!IE)]><!-->
                                            <div
                                                style="border-top:0px solid transparent; border-left:0px solid transparent; border-bottom:0px solid transparent; border-right:0px solid transparent; padding-top:0px; padding-bottom:0px; padding-right: 0px; padding-left: 0px;">
                                                <!--<![endif]-->
                                                <div class="mobile_hide">
                                                    <table border="0" cellpadding="0" cellspacing="0" class="divider"
                                                        role="presentation"
                                                        style="table-layout: fixed; vertical-align: top; border-spacing: 0; border-collapse: collapse; mso-table-lspace: 0pt; mso-table-rspace: 0pt; min-width: 100%; -ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%;"
                                                        valign="top" width="100%">
                                                        <tbody>
                                                            <tr style="vertical-align: top;" valign="top">
                                                                <td class="divider_inner"
                                                                    style="word-break: break-word; vertical-align: top; min-width: 100%; -ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%; padding-top: 30px; padding-right: 10px; padding-bottom: 0px; padding-left: 10px;"
                                                                    valign="top">
                                                                    <table align="center" border="0" cellpadding="0"
                                                                        cellspacing="0" class="divider_content"
                                                                        role="presentation"
                                                                        style="table-layout: fixed; vertical-align: top; border-spacing: 0; border-collapse: collapse; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-top: 0px solid #BBBBBB; width: 100%;"
                                                                        valign="top" width="100%">
                                                                        <tbody>
                                                                            <tr style="vertical-align: top;"
                                                                                valign="top">
                                                                                <td style="word-break: break-word; vertical-align: top; -ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%;"
                                                                                    valign="top">
                                                                                    <span></span>
                                                                                </td>
                                                                            </tr>
                                                                        </tbody>
                                                                    </table>
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                                <!--[if (!mso)&(!IE)]><!-->
                                            </div>
                                            <!--<![endif]-->
                                        </div>
                                    </div>
                                    <!--[if (mso)|(IE)]></td></tr></table><![endif]-->
                                    <!--[if (mso)|(IE)]></td></tr></table></td></tr></table><![endif]-->
                                </div>
                            </div>
                        </div>
                        <div style="background-color:transparent;">
                            <div class="block-grid"
                                style="Margin: 0 auto; min-width: 320px; max-width: 640px; overflow-wrap: break-word; word-wrap: break-word; word-break: break-word; background-color: #ffffff;">
                                <div
                                    style="border-collapse: collapse;display: table;width: 100%;background-color:#ffffff;">
                                    <!--[if (mso)|(IE)]><table width="100%" cellpadding="0" cellspacing="0" border="0" style="background-color:transparent;"><tr><td align="center"><table cellpadding="0" cellspacing="0" border="0" style="width:640px"><tr class="layout-full-width" style="background-color:#ffffff"><![endif]-->
                                    <!--[if (mso)|(IE)]><td align="center" width="640" style="background-color:#ffffff;width:640px; border-top: 0px solid transparent; border-left: 0px solid transparent; border-bottom: 0px solid transparent; border-right: 0px solid transparent;" valign="top"><table width="100%" cellpadding="0" cellspacing="0" border="0"><tr><td style="padding-right: 0px; padding-left: 0px; padding-top:0px; padding-bottom:0px;"><![endif]-->
                                    <div class="col num12"
                                        style="min-width: 320px; max-width: 640px; display: table-cell; vertical-align: top; width: 640px;">
                                        <div style="width:100% !important;">
                                            <!--[if (!mso)&(!IE)]><!-->
                                            <div
                                                style="border-top:0px solid transparent; border-left:0px solid transparent; border-bottom:0px solid transparent; border-right:0px solid transparent; padding-top:0px; padding-bottom:0px; padding-right: 0px; padding-left: 0px;">
                                                <!--<![endif]-->
                                                <table border="0" cellpadding="0" cellspacing="0" class="divider"
                                                    role="presentation"
                                                    style="table-layout: fixed; vertical-align: top; border-spacing: 0; border-collapse: collapse; mso-table-lspace: 0pt; mso-table-rspace: 0pt; min-width: 100%; -ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%;"
                                                    valign="top" width="100%">
                                                    <tbody>
                                                        <tr style="vertical-align: top;" valign="top">
                                                            <td class="divider_inner"
                                                                style="word-break: break-word; vertical-align: top; min-width: 100%; -ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%; padding-top: 15px; padding-right: 10px; padding-bottom: 0px; padding-left: 10px;"
                                                                valign="top">
                                                                <table align="center" border="0" cellpadding="0"
                                                                    cellspacing="0" class="divider_content"
                                                                    role="presentation"
                                                                    style="table-layout: fixed; vertical-align: top; border-spacing: 0; border-collapse: collapse; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-top: 0px solid #BBBBBB; width: 100%;"
                                                                    valign="top" width="100%">
                                                                    <tbody>
                                                                        <tr style="vertical-align: top;" valign="top">
                                                                            <td style="word-break: break-word; vertical-align: top; -ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%;"
                                                                                valign="top">
                                                                                <span></span>
                                                                            </td>
                                                                        </tr>
                                                                    </tbody>
                                                                </table>
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                                <div align="center" class="img-container center autowidth"
                                                    style="padding-right: 20px;padding-left: 20px;">
                                                    <!--[if mso]><table width="100%" cellpadding="0" cellspacing="0" border="0"><tr style="line-height:0px"><td style="padding-right: 20px;padding-left: 20px;" align="center"><![endif]-->
                                                    <div style="font-size:1px;line-height:20px">
                                                    </div>
                                                    <a href="" target="_blank"><img align="center" border="0"
                                                            class="center autowidth"
                                                            src="<?php echo base_url()?>public/images/detectlogo.png"
                                                            style="text-decoration: none; -ms-interpolation-mode: bicubic; border: 0; height: auto; width: 30%; max-width: 560px; display: block;"
                                                            width="260" /></a>
                                                    <div style="font-size:1px;line-height:20px">
                                                    </div>
                                                    <!--[if mso]></td></tr></table><![endif]-->
                                                </div>
                                                <table border="0" cellpadding="0" cellspacing="0" class="divider"
                                                    role="presentation"
                                                    style="table-layout: fixed; vertical-align: top; border-spacing: 0; border-collapse: collapse; mso-table-lspace: 0pt; mso-table-rspace: 0pt; min-width: 100%; -ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%;"
                                                    valign="top" width="100%">
                                                    <tbody>
                                                        <tr style="vertical-align: top;" valign="top">
                                                            <td class="divider_inner"
                                                                style="word-break: break-word; vertical-align: top; min-width: 100%; -ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%; padding-top: 18px; padding-right: 10px; padding-bottom: 0px; padding-left: 10px;"
                                                                valign="top">
                                                                <table align="center" border="0" cellpadding="0"
                                                                    cellspacing="0" class="divider_content"
                                                                    role="presentation"
                                                                    style="table-layout: fixed; vertical-align: top; border-spacing: 0; border-collapse: collapse; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-top: 0px solid #BBBBBB; width: 100%;"
                                                                    valign="top" width="100%">
                                                                    <tbody>
                                                                        <tr style="vertical-align: top;" valign="top">
                                                                            <td style="word-break: break-word; vertical-align: top; -ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%;"
                                                                                valign="top">
                                                                                <span></span>
                                                                            </td>
                                                                        </tr>
                                                                    </tbody>
                                                                </table>
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div style="background-color:transparent;">
                            <div class="block-grid"
                                style="Margin: 0 auto; min-width: 320px; max-width: 640px; overflow-wrap: break-word; word-wrap: break-word; word-break: break-word; background-color: #ffffff;">
                                <div
                                    style="border-collapse: collapse;display: table;width: 100%;background-color:#ffffff;">
                                    <div class="col num12"
                                        style="min-width: 320px; max-width: 640px; display: table-cell; vertical-align: top; width: 640px;">
                                        <div style="width:100% !important;">
                                            <div
                                                style="border-top:0px solid transparent; border-left:0px solid transparent; border-bottom:0px solid transparent; border-right:0px solid transparent; padding-top:0px; padding-bottom:0px; padding-right: 0px; padding-left: 0px;">
                                                <div align="center" class="img-container center autowidth"
                                                    style="padding-right: 0px;padding-left: 0px;">
                                                    <img align="center" border="0" class="center autowidth"
                                                        src="https://www.poojadarda.com/images/Invite_Illustration.png"
                                                        style="text-decoration: none; -ms-interpolation-mode: bicubic; border: 0; height: auto; width: 100%; max-width: 640px; display: block;"
                                                        width="640">
                                                </div>
                                                <div
                                                    style="color:#555555;font-family:Trebuchet MS, Lucida Grande, Lucida Sans Unicode, Lucida Sans, Tahoma, sans-serif;line-height:1.2;padding-top:20px;padding-right:40px;padding-bottom:10px;padding-left:40px;">
                                                    <div
                                                        style="line-height: 1.2; font-size: 12px; color: #555555; font-family: Trebuchet MS, Lucida Grande, Lucida Sans Unicode, Lucida Sans, Tahoma, sans-serif; mso-line-height-alt: 14px;">
                                                        <p
                                                            style="font-size: 46px; line-height: 1.2; text-align: center; word-break: break-word; mso-line-height-alt: 55px; margin: 0;">
                                                            <span style="font-size: 46px; color: #003188;"><strong>New
                                                                    Contact us
                                                                    Request</strong></span>
                                                        </p>
                                                    </div>
                                                </div>
                                                <div
                                                    style="color:#555555;font-family:Trebuchet MS, Lucida Grande, Lucida Sans Unicode, Lucida Sans, Tahoma, sans-serif;line-height:1.5;padding-top:10px;padding-right:40px;padding-bottom:10px;padding-left:40px;">
                                                    <div
                                                        style="line-height: 1.5; font-size: 12px; font-family: Trebuchet MS, Lucida Grande, Lucida Sans Unicode, Lucida Sans, Tahoma, sans-serif; color: #555555; mso-line-height-alt: 18px;">
                                                        <p
                                                            style="text-align: center; line-height: 1.5; word-break: break-word; font-family: inherit; font-size: 16px; mso-line-height-alt: 24px; margin: 0;">
                                                            <span style="font-size: 16px; color: #6d89bc;">Thanks
                                                                for being
                                                                a Team Part of "Detect
                                                                Diagnostics"!
                                                            </span><span
                                                                style="font-size: 16px; color: #6d89bc;"><br></span>
                                                        </p>
                                                    </div>
                                                </div>
                                                <!--[if mso]></td></tr></table><![endif]-->
                                                <table border="0" cellpadding="0" cellspacing="0" class="divider"
                                                    role="presentation"
                                                    style="table-layout: fixed; vertical-align: top; border-spacing: 0; border-collapse: collapse; mso-table-lspace: 0pt; mso-table-rspace: 0pt; min-width: 100%; -ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%;"
                                                    valign="top" width="100%">
                                                    <tbody>
                                                        <tr style="vertical-align: top;" valign="top">
                                                            <td class="divider_inner"
                                                                style="word-break: break-word; vertical-align: top; min-width: 100%; -ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%; padding-top: 20px; padding-right: 10px; padding-bottom: 0px; padding-left: 10px;"
                                                                valign="top">
                                                                <table align="center" border="0" cellpadding="0"
                                                                    cellspacing="0" class="divider_content"
                                                                    role="presentation"
                                                                    style="table-layout: fixed; vertical-align: top; border-spacing: 0; border-collapse: collapse; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-top: 0px solid #BBBBBB; width: 100%;"
                                                                    valign="top" width="100%">
                                                                    <tbody>
                                                                        <tr style="vertical-align: top;" valign="top">
                                                                            <td style="word-break: break-word; vertical-align: top; -ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%;"
                                                                                valign="top">
                                                                                <span></span>
                                                                            </td>
                                                                        </tr>
                                                                    </tbody>
                                                                </table>
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                                <div align="center" class="img-container center autowidth"
                                                    style="padding-right: 0px;padding-left: 0px;">
                                                    <!--[if mso]><table width="100%" cellpadding="0" cellspacing="0" border="0"><tr style="line-height:0px"><td style="padding-right: 0px;padding-left: 0px;" align="center"><![endif]--><img
                                                        align="center" border="0" class="center autowidth"
                                                        src="https://www.poojadarda.com/images/Divisor_Lines.png"
                                                        style="text-decoration: none; -ms-interpolation-mode: bicubic; border: 0; height: auto; width: 100%; max-width: 158px; display: block;"
                                                        width="158">
                                                    <!--[if mso]></td></tr></table><![endif]-->
                                                </div>
                                                <table border="0" cellpadding="0" cellspacing="0" class="divider"
                                                    role="presentation"
                                                    style="table-layout: fixed; vertical-align: top; border-spacing: 0; border-collapse: collapse; mso-table-lspace: 0pt; mso-table-rspace: 0pt; min-width: 100%; -ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%;"
                                                    valign="top" width="100%">
                                                    <tbody>
                                                        <tr style="vertical-align: top;" valign="top">
                                                            <td class="divider_inner"
                                                                style="word-break: break-word; vertical-align: top; min-width: 100%; -ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%; padding-top: 20px; padding-right: 10px; padding-bottom: 0px; padding-left: 10px;"
                                                                valign="top">
                                                                <table align="center" border="0" cellpadding="0"
                                                                    cellspacing="0" class="divider_content"
                                                                    role="presentation"
                                                                    style="table-layout: fixed; vertical-align: top; border-spacing: 0; border-collapse: collapse; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-top: 0px solid #BBBBBB; width: 100%;"
                                                                    valign="top" width="100%">
                                                                    <tbody>
                                                                        <tr style="vertical-align: top;" valign="top">
                                                                            <td style="word-break: break-word; vertical-align: top; -ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%;"
                                                                                valign="top">
                                                                                <span></span>
                                                                            </td>
                                                                        </tr>
                                                                    </tbody>
                                                                </table>
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                                <!--[if mso]><table width="100%" cellpadding="0" cellspacing="0" border="0"><tr><td style="padding-right: 40px; padding-left: 40px; padding-top: 10px; padding-bottom: 10px; font-family: Tahoma, sans-serif"><![endif]-->
                                                <div
                                                    style="color:#555555;font-family:Trebuchet MS, Lucida Grande, Lucida Sans Unicode, Lucida Sans, Tahoma, sans-serif;line-height:1.2;padding-top:10px;padding-right:40px;padding-bottom:10px;padding-left:40px;">
                                                    <div
                                                        style="line-height: 1.2; font-size: 12px; color: #555555; font-family: Trebuchet MS, Lucida Grande, Lucida Sans Unicode, Lucida Sans, Tahoma, sans-serif; mso-line-height-alt: 14px;">
                                                        <p
                                                            style="font-size: 24px; line-height: 1.2; text-align: center; word-break: break-word; mso-line-height-alt: 29px; margin: 0;">
                                                            <span style="font-size: 24px; color: #003188;"><strong>Here
                                                                    is
                                                                    the Customer
                                                                    Details<br></strong></span>
                                                        </p>
                                                    </div>
                                                </div>
                                                <!--[if mso]></td></tr></table><![endif]-->
                                                <!--[if mso]><table width="100%" cellpadding="0" cellspacing="0" border="0"><tr><td style="padding-right: 40px; padding-left: 40px; padding-top: 10px; padding-bottom: 10px; font-family: Tahoma, sans-serif"><![endif]-->
                                                <div
                                                    style="color:#555555;font-family:Trebuchet MS, Lucida Grande, Lucida Sans Unicode, Lucida Sans, Tahoma, sans-serif;line-height:1.5;padding-top:10px;padding-right:40px;padding-bottom:10px;padding-left:40px;">
                                                    <div
                                                        style="line-height: 1.5; font-size: 12px; font-family: Trebuchet MS, Lucida Grande, Lucida Sans Unicode, Lucida Sans, Tahoma, sans-serif; color: #555555; mso-line-height-alt: 18px;">
                                                        <p
                                                            style="text-align: center; line-height: 1.5; word-break: break-word; font-family: inherit; font-size: 16px; mso-line-height-alt: 24px; margin: 0;">
                                                            <span style="font-size: 16px;"><span
                                                                    style="color: #018abe; font-size: 17px; mso-ansi-font-size: 18px;"><strong>Name
                                                                        – </strong>
                                                                </span><span style="color: #6d89bc;">'
                                                                    . $name .
                                                                    '</span></span>
                                                        </p>

                                                        <p
                                                            style="text-align: center; line-height: 1.5; word-break: break-word; font-family: inherit; font-size: 16px; mso-line-height-alt: 24px; margin: 0;">
                                                            <span style="font-size: 16px;"><span
                                                                    style="color: #018abe; font-size: 17px; mso-ansi-font-size: 18px;"><strong>Email
                                                                        – </strong>
                                                                </span><span style="color: #6d89bc;">'
                                                                    . $email .
                                                                    '</span></span>
                                                        </p>
                                                        <p
                                                            style="text-align: center; line-height: 1.5; word-break: break-word; font-family: inherit; font-size: 16px; mso-line-height-alt: 24px; margin: 0;">
                                                            <span style="font-size: 16px;"><span
                                                                    style="color: #018abe; font-size: 17px; mso-ansi-font-size: 18px;"><strong>Subject
                                                                        – </strong>
                                                                </span><span style="color: #6d89bc;">'
                                                                    . $subject .
                                                                    '</span></span>
                                                        </p>
                                                        <p
                                                            style="text-align: center; line-height: 1.5; word-break: break-word; font-family: inherit; font-size: 16px; mso-line-height-alt: 24px; margin: 0;">
                                                            <span style="font-size: 16px;"><span
                                                                    style="color: #018abe; font-size: 17px; mso-ansi-font-size: 18px;"><strong>Message
                                                                        – </strong>
                                                                </span><span style="color: #6d89bc;">'
                                                                    . $message .
                                                                    '</span></span>
                                                        </p>
                                                    </div>
                                                </div>
                                                <!--[if mso]></td></tr></table><![endif]-->
                                                <div align="center" class="button-container"
                                                    style="padding-top:15px;padding-right:10px;padding-bottom:25px;padding-left:10px;">
                                                    <!--[if mso]><table width="100%" cellpadding="0" cellspacing="0" border="0" style="border-spacing: 0; border-collapse: collapse; mso-table-lspace:0pt; mso-table-rspace:0pt;"><tr><td style="padding-top: 15px; padding-right: 10px; padding-bottom: 25px; padding-left: 10px" align="center"><v:roundrect xmlns:v="urn:schemas-microsoft-com:vml" xmlns:w="urn:schemas-microsoft-com:office:word" href="" style="height:34.5pt; width:138pt; v-text-anchor:middle;" arcsize="131%" stroke="false" fillcolor="#fb5f3d"><w:anchorlock/><v:textbox inset="0,0,0,0"><center style="color:#ffffff; font-family:Tahoma, sans-serif; font-size:18px"><![endif]-->
                                                    <a href="#">
                                                        <div
                                                            style="text-decoration:none;display:inline-block;color:#ffffff;background-color:#018abe;border-radius:60px;-webkit-border-radius:60px;-moz-border-radius:60px;width:auto; width:auto;;border-top:1px solid #018abe;border-right:1px solid #018abe;border-bottom:1px solid #018abe;border-left:1px solid #018abe;padding-top:5px;padding-bottom:5px;font-family:Trebuchet MS, Lucida Grande, Lucida Sans Unicode, Lucida Sans, Tahoma, sans-serif;text-align:center;mso-border-alt:none;word-break:keep-all;">
                                                            <span
                                                                style="padding-left:20px;padding-right:20px;font-size:18px;display:inline-block;"><span
                                                                    style="font-size: 16px; line-height: 2; word-break: break-word; mso-line-height-alt: 32px;"><span
                                                                        data-mce-style="font-size: 18px; line-height: 36px;"
                                                                        style="font-size: 18px; line-height: 36px;"><strong>&nbsp;Login!&nbsp;</strong></span></span>
                                                            </span>
                                                        </div>
                                                    </a>
                                                    <!--[if mso]></center></v:textbox></v:roundrect></td></tr></table><![endif]-->
                                                </div>
                                                <!--[if (!mso)&(!IE)]><!-->
                                            </div>
                                            <!--<![endif]-->
                                        </div>
                                    </div>
                                    <!--[if (mso)|(IE)]></td></tr></table><![endif]-->
                                    <!--[if (mso)|(IE)]></td></tr></table></td></tr></table><![endif]-->
                                </div>
                            </div>
                        </div>
                        <div style="background-color:transparent;">
                            <div class="block-grid"
                                style="Margin: 0 auto; min-width: 320px; max-width: 640px; overflow-wrap: break-word; word-wrap: break-word; word-break: break-word; background-color: #ffffff;">
                                <div
                                    style="border-collapse: collapse;display: table;width: 100%;background-color:#ffffff;">
                                    <!--[if (mso)|(IE)]><table width="100%" cellpadding="0" cellspacing="0" border="0" style="background-color:transparent;"><tr><td align="center"><table cellpadding="0" cellspacing="0" border="0" style="width:640px"><tr class="layout-full-width" style="background-color:#ffffff"><![endif]-->
                                    <!--[if (mso)|(IE)]><td align="center" width="640" style="background-color:#ffffff;width:640px; border-top: 1px solid #E5EAF3; border-left: 0px solid transparent; border-bottom: 0px solid transparent; border-right: 0px solid transparent;" valign="top"><table width="100%" cellpadding="0" cellspacing="0" border="0"><tr><td style="padding-right: 0px; padding-left: 0px; padding-top:0px; padding-bottom:0px;"><![endif]-->
                                    <div class="col num12"
                                        style="min-width: 320px; max-width: 640px; display: table-cell; vertical-align: top; width: 640px;">
                                        <div style="width:100% !important;">
                                            <!--[if (!mso)&(!IE)]><!-->
                                            <div
                                                style="border-top:1px solid #E5EAF3; border-left:0px solid transparent; border-bottom:0px solid transparent; border-right:0px solid transparent; padding-top:0px; padding-bottom:0px; padding-right: 0px; padding-left: 0px;">
                                                <!--<![endif]-->
                                                <!--[if mso]><table width="100%" cellpadding="0" cellspacing="0" border="0"><tr><td style="padding-right: 40px; padding-left: 40px; padding-top: 10px; padding-bottom: 10px; font-family: Tahoma, sans-serif"><![endif]-->
                                                <div
                                                    style="color:#555555;font-family:Trebuchet MS, Lucida Grande, Lucida Sans Unicode, Lucida Sans, Tahoma, sans-serif;line-height:1.5;padding-top:10px;padding-right:40px;padding-bottom:10px;padding-left:40px;">
                                                    <div
                                                        style="line-height: 1.5; font-size: 12px; font-family: Trebuchet MS, Lucida Grande, Lucida Sans Unicode, Lucida Sans, Tahoma, sans-serif; color: #555555; mso-line-height-alt: 18px;">
                                                        <p
                                                            style="text-align: center; line-height: 1.5; word-break: break-word; font-family: inherit; font-size: 16px; mso-line-height-alt: 24px; margin: 0;">
                                                            <span style="font-size: 16px; color: #6d89bc;">Received
                                                                On :
                                                                ' . $weekday . ',&nbsp;'
                                                                . $month . '&nbsp;' .
                                                                $year . '&nbsp;' . $time
                                                                .
                                                                '&nbsp;GMT+5:30</span><span
                                                                style="font-size: 16px; color: #6d89bc;"><br /></span>
                                                        </p>
                                                    </div>
                                                </div>
                                                <!--[if mso]></td></tr></table><![endif]-->
                                                <table border="0" cellpadding="0" cellspacing="0" class="divider"
                                                    role="presentation"
                                                    style="table-layout: fixed; vertical-align: top; border-spacing: 0; border-collapse: collapse; mso-table-lspace: 0pt; mso-table-rspace: 0pt; min-width: 100%; -ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%;"
                                                    valign="top" width="100%">
                                                    <tbody>
                                                        <tr style="vertical-align: top;" valign="top">
                                                            <td class="divider_inner"
                                                                style="word-break: break-word; vertical-align: top; min-width: 100%; -ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%; padding-top: 25px; padding-right: 10px; padding-bottom: 0px; padding-left: 10px;"
                                                                valign="top">
                                                                <table align="center" border="0" cellpadding="0"
                                                                    cellspacing="0" class="divider_content"
                                                                    role="presentation"
                                                                    style="table-layout: fixed; vertical-align: top; border-spacing: 0; border-collapse: collapse; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-top: 0px solid #BBBBBB; width: 100%;"
                                                                    valign="top" width="100%">
                                                                    <tbody>
                                                                        <tr style="vertical-align: top;" valign="top">
                                                                            <td style="word-break: break-word; vertical-align: top; -ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%;"
                                                                                valign="top">
                                                                                <span></span>
                                                                            </td>
                                                                        </tr>
                                                                    </tbody>
                                                                </table>
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                                <div align="center" class="img-container center autowidth"
                                                    style="padding-right: 20px;padding-left: 20px;">
                                                    <!--[if mso]><table width="100%" cellpadding="0" cellspacing="0" border="0"><tr style="line-height:0px"><td style="padding-right: 20px;padding-left: 20px;" align="center"><![endif]-->
                                                    <div style="font-size:1px;line-height:20px">
                                                    </div>
                                                    <a href="#" target="_blank"><img align="center" border="0"
                                                            class="center autowidth"
                                                            src="<?php echo base_url()?>public/images/detectlogo.png"
                                                            style="text-decoration: none; -ms-interpolation-mode: bicubic; border: 0; height: auto; width: 20%; max-width: 247px; display: block;"
                                                            width="147" /></a>
                                                    <div style="font-size:1px;line-height:15px">
                                                    </div>
                                                    <!--[if mso]></td></tr></table><![endif]-->
                                                </div>
                                                <table cellpadding="0" cellspacing="0" class="social_icons"
                                                    role="presentation"
                                                    style="table-layout: fixed; vertical-align: top; border-spacing: 0; border-collapse: collapse; mso-table-lspace: 0pt; mso-table-rspace: 0pt;"
                                                    valign="top" width="100%">
                                                    <tbody>
                                                        <tr style="vertical-align: top;" valign="top">
                                                            <td style="word-break: break-word; vertical-align: top; padding-top: 10px; padding-right: 10px; padding-bottom: 10px; padding-left: 10px;"
                                                                valign="top">
                                                                <table align="center" cellpadding="0" cellspacing="0"
                                                                    class="social_table" role="presentation"
                                                                    style="table-layout: fixed; vertical-align: top; border-spacing: 0; border-collapse: collapse; mso-table-tspace: 0; mso-table-rspace: 0; mso-table-bspace: 0; mso-table-lspace: 0;"
                                                                    valign="top">
                                                                    <tbody>
                                                                        <tr align="center"
                                                                            style="vertical-align: top; display: inline-block; text-align: center;"
                                                                            valign="top">
                                                                            <td style="word-break: break-word; vertical-align: top; padding-bottom: 0; padding-right: 4px; padding-left: 4px;"
                                                                                valign="top">
                                                                                <a href="#" target="_blank"><img
                                                                                        height="32"
                                                                                        src="https://www.poojadarda.com/images/facebook2x.png"
                                                                                        style="text-decoration: none; -ms-interpolation-mode: bicubic; height: auto; border: none; display: block;"
                                                                                        width="32" /></a>
                                                                            </td>
                                                                            <td style="word-break: break-word; vertical-align: top; padding-bottom: 0; padding-right: 4px; padding-left: 4px;"
                                                                                valign="top">
                                                                                <a href="#" target="_blank"><img
                                                                                        height="32"
                                                                                        src="https://www.poojadarda.com/images/instagram2x.png"
                                                                                        style="text-decoration: none; -ms-interpolation-mode: bicubic; height: auto; border: none; display: block;"
                                                                                        width="32" /></a>
                                                                            </td>
                                                                            <td style="word-break: break-word; vertical-align: top; padding-bottom: 0; padding-right: 4px; padding-left: 4px;"
                                                                                valign="top">
                                                                                <a href="#" target="_blank"><img
                                                                                        height="32"
                                                                                        src="https://www.poojadarda.com/images/linkedin2x.png"
                                                                                        style="text-decoration: none; -ms-interpolation-mode: bicubic; height: auto; border: none; display: block;"
                                                                                        width="32" /></a>
                                                                            </td>
                                                                            <td style="word-break: break-word; vertical-align: top; padding-bottom: 0; padding-right: 4px; padding-left: 4px;"
                                                                                valign="top">
                                                                                <a href="#" target="_blank"><img
                                                                                        height="32"
                                                                                        src="https://www.poojadarda.com/images/youtube2x.png"
                                                                                        style="text-decoration: none; -ms-interpolation-mode: bicubic; height: auto; border: none; display: block;"
                                                                                        width="32" /></a>
                                                                            </td>
                                                                        </tr>
                                                                    </tbody>
                                                                </table>
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                                <table border="0" cellpadding="0" cellspacing="0" class="divider"
                                                    role="presentation"
                                                    style="table-layout: fixed; vertical-align: top; border-spacing: 0; border-collapse: collapse; mso-table-lspace: 0pt; mso-table-rspace: 0pt; min-width: 100%; -ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%;"
                                                    valign="top" width="100%">
                                                    <tbody>
                                                        <tr style="vertical-align: top;" valign="top">
                                                            <td class="divider_inner"
                                                                style="word-break: break-word; vertical-align: top; min-width: 100%; -ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%; padding-top: 30px; padding-right: 10px; padding-bottom: 0px; padding-left: 10px;"
                                                                valign="top">
                                                                <table align="center" border="0" cellpadding="0"
                                                                    cellspacing="0" class="divider_content"
                                                                    role="presentation"
                                                                    style="table-layout: fixed; vertical-align: top; border-spacing: 0; border-collapse: collapse; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-top: 0px solid #BBBBBB; width: 100%;"
                                                                    valign="top" width="100%">
                                                                    <tbody>
                                                                        <tr style="vertical-align: top;" valign="top">
                                                                            <td style="word-break: break-word; vertical-align: top; -ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%;"
                                                                                valign="top">
                                                                                <span></span>
                                                                            </td>
                                                                        </tr>
                                                                    </tbody>
                                                                </table>
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                                <!--[if (!mso)&(!IE)]><!-->
                                            </div>
                                            <!--<![endif]-->
                                        </div>
                                    </div>
                                    <!--[if (mso)|(IE)]></td></tr></table><![endif]-->
                                    <!--[if (mso)|(IE)]></td></tr></table></td></tr></table><![endif]-->
                                </div>
                            </div>
                        </div>
                        <div style="background-color:transparent;">
                            <div class="block-grid"
                                style="Margin: 0 auto; min-width: 320px; max-width: 640px; overflow-wrap: break-word; word-wrap: break-word; word-break: break-word; background-color: transparent;">
                                <div
                                    style="border-collapse: collapse;display: table;width: 100%;background-color:transparent;">
                                    <!--[if (mso)|(IE)]><table width="100%" cellpadding="0" cellspacing="0" border="0" style="background-color:transparent;"><tr><td align="center"><table cellpadding="0" cellspacing="0" border="0" style="width:640px"><tr class="layout-full-width" style="background-color:transparent"><![endif]-->
                                    <!--[if (mso)|(IE)]><td align="center" width="640" style="background-color:transparent;width:640px; border-top: 0px solid transparent; border-left: 0px solid transparent; border-bottom: 0px solid transparent; border-right: 0px solid transparent;" valign="top"><table width="100%" cellpadding="0" cellspacing="0" border="0"><tr><td style="padding-right: 0px; padding-left: 0px; padding-top:0px; padding-bottom:0px;"><![endif]-->
                                    <div class="col num12"
                                        style="min-width: 320px; max-width: 640px; display: table-cell; vertical-align: top; width: 640px;">
                                        <div style="width:100% !important;">
                                            <!--[if (!mso)&(!IE)]><!-->
                                            <div
                                                style="border-top:0px solid transparent; border-left:0px solid transparent; border-bottom:0px solid transparent; border-right:0px solid transparent; padding-top:0px; padding-bottom:0px; padding-right: 0px; padding-left: 0px;">
                                                <!--<![endif]-->
                                                <div class="mobile_hide">
                                                    <table border="0" cellpadding="0" cellspacing="0" class="divider"
                                                        role="presentation"
                                                        style="table-layout: fixed; vertical-align: top; border-spacing: 0; border-collapse: collapse; mso-table-lspace: 0pt; mso-table-rspace: 0pt; min-width: 100%; -ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%;"
                                                        valign="top" width="100%">
                                                        <tbody>
                                                            <tr style="vertical-align: top;" valign="top">
                                                                <td class="divider_inner"
                                                                    style="word-break: break-word; vertical-align: top; min-width: 100%; -ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%; padding-top: 30px; padding-right: 10px; padding-bottom: 0px; padding-left: 10px;"
                                                                    valign="top">
                                                                    <table align="center" border="0" cellpadding="0"
                                                                        cellspacing="0" class="divider_content"
                                                                        role="presentation"
                                                                        style="table-layout: fixed; vertical-align: top; border-spacing: 0; border-collapse: collapse; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-top: 0px solid #BBBBBB; width: 100%;"
                                                                        valign="top" width="100%">
                                                                        <tbody>
                                                                            <tr style="vertical-align: top;"
                                                                                valign="top">
                                                                                <td style="word-break: break-word; vertical-align: top; -ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%;"
                                                                                    valign="top">
                                                                                    <span></span>
                                                                                </td>
                                                                            </tr>
                                                                        </tbody>
                                                                    </table>
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                                <!--[if (!mso)&(!IE)]><!-->
                                            </div>
                                            <!--<![endif]-->
                                        </div>
                                    </div>
                                    <!--[if (mso)|(IE)]></td></tr></table><![endif]-->
                                    <!--[if (mso)|(IE)]></td></tr></table></td></tr></table><![endif]-->
                                </div>
                            </div>
                        </div>
                        <!--[if (mso)|(IE)]></td></tr></table><![endif]-->
                    </td>
                </tr>
            </tbody>
        </table>
        <!--[if (IE)]></div><![endif]-->
    </body>

    </html>';

    $headers = "MIME-Version: 1.0" . "\r\n";
    $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
    $headers .= "From:Detect Diagnostics<contact@detectdiagnostics.com>" . "\r\n";

        $headers .= "Reply-To:donotreply@detectdiagnostics.com" . "\r\n";

        $headers .= "X-Mailer:PHP/" . phpversion();

        mail($to1, $subject1, $htmlContent1, $headers,
        '-fcontact@detectdiagnostics.com');

        }

        }