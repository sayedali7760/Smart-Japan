<style>
    /* -------------------------------------
    GLOBAL
    A very basic CSS reset
------------------------------------- */
    * {
        margin: 0;
        padding: 0;
        font-family: "Helvetica Neue", "Helvetica", Helvetica, Arial, sans-serif;
        box-sizing: border-box;
        font-size: 14px;
    }

    img {
        max-width: 100%;
    }

    body {
        -webkit-font-smoothing: antialiased;
        -webkit-text-size-adjust: none;
        width: 100% !important;
        height: 100%;
        line-height: 1.6;
    }

    table td {
        vertical-align: top;
    }

    /* -------------------------------------
    BODY & CONTAINER
------------------------------------- */
    body {
        background-color: #f6f6f6;
    }

    .body-wrap {
        background-color: #f6f6f6;
        width: 100%;
    }

    .container {
        display: block !important;
        max-width: 600px !important;
        margin: 0 auto !important;
        clear: both !important;
    }

    .content {
        max-width: 600px;
        margin: 0 auto;
        display: block;
        padding: 20px;
    }

    /* -------------------------------------
    HEADER, FOOTER, MAIN
------------------------------------- */
    .main {
        background: #fff;
        border: 1px solid #e9e9e9;
        border-radius: 3px;
    }

    .content-wrap {
        padding: 20px;
    }

    .content-block {
        padding: 0 0 20px;
    }

    .header {
        width: 100%;
        margin-bottom: 20px;
    }

    .footer {
        width: 100%;
        clear: both;
        color: #999;
        padding: 20px;
    }

    .footer a {
        color: #999;
    }

    .footer p,
    .footer a,
    .footer unsubscribe,
    .footer td {
        font-size: 12px;
    }

    /* -------------------------------------
    TYPOGRAPHY
------------------------------------- */
    h1,
    h2,
    h3 {
        font-family: "Helvetica Neue", Helvetica, Arial, "Lucida Grande", sans-serif;
        color: #000;
        margin: 40px 0 0;
        line-height: 1.2;
        font-weight: 400;
    }

    h1 {
        font-size: 32px;
        font-weight: 500;
    }

    h2 {
        font-size: 24px;
    }

    h3 {
        font-size: 18px;
    }

    h4 {
        font-size: 14px;
        font-weight: 600;
    }

    p,
    ul,
    ol {
        margin-bottom: 10px;
        font-weight: normal;
    }

    p li,
    ul li,
    ol li {
        margin-left: 5px;
        list-style-position: inside;
    }

    /* -------------------------------------
    LINKS & BUTTONS
------------------------------------- */
    a {
        color: #1ab394;
        text-decoration: underline;
    }

    .btn-primary {
        text-decoration: none;
        color: #FFF;
        background-color: #1ab394;
        border: solid #1ab394;
        border-width: 5px 10px;
        line-height: 2;
        font-weight: bold;
        text-align: center;
        cursor: pointer;
        display: inline-block;
        border-radius: 5px;
        text-transform: capitalize;
    }

    /* -------------------------------------
    OTHER STYLES THAT MIGHT BE USEFUL
------------------------------------- */
    .last {
        margin-bottom: 0;
    }

    .first {
        margin-top: 0;
    }

    .aligncenter {
        text-align: center;
    }

    .alignright {
        text-align: right;
    }

    .alignleft {
        text-align: left;
    }

    .clear {
        clear: both;
    }

    /* -------------------------------------
    ALERTS
    Change the class depending on warning email, good email or bad email
------------------------------------- */
    .alert {
        font-size: 16px;
        color: #fff;
        font-weight: 500;
        padding: 20px;
        text-align: center;
        border-radius: 3px 3px 0 0;
    }

    .alert a {
        color: #fff;
        text-decoration: none;
        font-weight: 500;
        font-size: 16px;
    }

    .alert.alert-warning {
        background: #f8ac59;
    }

    .alert.alert-bad {
        background: #ed5565;
    }

    .alert.alert-good {
        background: #1ab394;
    }

    /* -------------------------------------
    INVOICE
    Styles for the billing table
------------------------------------- */
    .invoice {
        margin: 40px auto;
        text-align: left;
        width: 80%;
    }

    .invoice td {
        padding: 5px 0;
    }

    .invoice .invoice-items {
        width: 100%;
    }

    .invoice .invoice-items td {
        border-top: #eee 1px solid;
    }

    .invoice .invoice-items .total td {
        border-top: 2px solid #333;
        border-bottom: 2px solid #333;
        font-weight: 700;
    }

    /* -------------------------------------
    RESPONSIVE AND MOBILE FRIENDLY STYLES
------------------------------------- */
    @media only screen and (max-width: 640px) {

        h1,
        h2,
        h3,
        h4 {
            font-weight: 600 !important;
            margin: 20px 0 5px !important;
        }

        h1 {
            font-size: 22px !important;
        }

        h2 {
            font-size: 18px !important;
        }

        h3 {
            font-size: 16px !important;
        }

        .container {
            width: 100% !important;
        }

        .content,
        .content-wrap {
            padding: 10px !important;
        }

        .invoice {
            width: 100% !important;
        }
    }
</style>
<table class="body-wrap" width="100%">
    <tr>
        <td></td>
        <td class="container" width="100%">
            <div class="content">

                <table class="main" width="100%" cellpadding="0" cellspacing="0">
                    <tr>
                        <td class="content-wrap">
                            <table cellpadding="0" cellspacing="0">
                                <tr>
                                    <td>
                                        <img class="img-responsive"
                                            src="<?php echo base_url(); ?>assets/media/logos/Logo.png" alt="logo"
                                            style="width:250px;" />

                                    </td>
                                </tr>
                                <tr>

                                    <td class="content-block">
                                        <br />
                                        Dear <?php echo $email; ?>,
                                        <br /><br />
                                        Your Account Activated Successfully.</br>Your account is now ready to use.
                                        Please log in to your account using the credentials you provided during registration. <br />


                                        <br />
                                        <br />
                                    </td>

                                </tr>


                                <tr>
                                    <td class="content-block">
                                        <br />
                                        Thanks
                                        <br />
                                        <br />
                                        Regards,<br />
                                        SmartFX
                                    </td>
                                </tr>


                            </table>
                        </td>
                    </tr>
                </table>

                <br /><br />
                <hr>
                <div class="footer">
                    <table width="100%">
                        <tr>
                            <td class="aligncenter content-block">
                                <span style="color:red"> ****************DO NOT REPLY TO THIS E-MAIL****************<br>
                                    This is an automated e-mail message sent from our support system. Do not reply to
                                    this e-mail as we won't receive your reply!</span>
                            </td>
                        </tr>
                    </table>
                </div>
            </div>
        </td>
        <td></td>
    </tr>
</table>
<p><i>Note : If you unsubscribe this mail,you won't be able to receive email from this domain.</i></p>