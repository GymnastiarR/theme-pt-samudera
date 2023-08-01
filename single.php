<?php get_header();
the_post() ?>
<main class="px-10">
    <div class="w-[70%] article">
        <h1 class="text-xl font-semibold mb-5"><?php the_title() ?></h1>
        <?php the_content() ?>
    </div>
</main>
<?php get_footer() ?>