<!DOCTYPE html>
<html lang="<?php language_attributes() ?>">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=M+PLUS+Rounded+1c:wght@500&family=Poppins&display=swap" rel="stylesheet">
    <?php wp_head() ?>
</head>

<body <?php body_class() ?>>
    <header id="header" class="bg-[#dfa87850] <?php echo is_home() ? 'fixed right-0 left-0 z-10' : 'sticky top-0'; ?> transition-all duration-1000">
        <div class="flex justify-between h-16 px-28 items-center">
            <div>
                <h1 class="text-white text-xl font-bold"><a href="<?php site_url() ?>">PT Samudera</a></h1>
            </div>
            <?php wp_nav_menu([
                'location' => 'header-menu'
            ]) ?>
        </div>
    </header>