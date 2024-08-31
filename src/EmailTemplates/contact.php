<!DOCTYPE html>
<html>
<head>
    <title><?= "{SITENAME}" ?></title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }

        .container {
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
            background-color: #ffffff;
            border-radius: 5px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        h1 {
            color: #3a9dff;
            font-size: 28px;
            margin-top: 0;
            text-align: center;
        }

        p {
            color: #333333;
            font-size: 18px;
            line-height: 1.5;
            margin-bottom: 20px;
        }

        .signature {
            color: #808080;
            font-size: 14px;
            text-align: center;
        }
    </style>
</head>

<body>
    <div class="container">
        <h1><?= "{SITENAME}" ?></h1>
        
        <h2><?= CONTACT_INFORMATION ?></h2>
        <p><strong><?= LABEL_NAME.':' ?></strong> <?= "{CONTACT_NAME}"; ?></p>
        <p><strong><?= LABEL_LAST_NAME.':' ?></strong> <?= "{CONTACT_LASTNAME}"; ?></p>
        <p><strong><?= LABEL_EMAIL.':' ?></strong> <?= "{CONTACT_EMAIL}"; ?></p>

        <?php if(!empty($requestData['company'])) { ?>
            <p><strong><?= LABEL_COMPANY.':' ?></strong> <?= "{CONTACT_COMPANY}"; ?></p>
        <?php } ?>

        <p><strong><?= LABEL_DESCRIPTION.':' ?></strong></p>
        <p><?= "{CONTACT_MESSAGE}"; ?></p>
        
        <p class="signature"><?= SIGNATURE." {SITENAME}" ?></p>
    </div>
</body>
</html>
