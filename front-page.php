<?php get_header() ?>
<main class="flex flex-col items-center bg-[#BA704F]">
    <section class="w-[100%] bg-[url('https://images.unsplash.com/photo-1575936123452-b67c3203c357?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8Mnx8aW1hZ2V8ZW58MHx8MHx8fDA%3D&w=1000&q=80')] h-[110vh] bg-cover filter: contrast-75 filter: grayscale(0) flex items-center justify-center">
        <div class="w-1/2 flex flex-col items-center">
            <h1 class="text-5xl text-white text-center mb-4 font-semibold"><?php echo get_site_option('title_banner') ?></h1>
            <p class="text-2xl text-white mb-3 text-center">
                <?php echo get_site_option('description_banner') ?>
            </p>
            <a href="<?php echo get_site_option('link_button') ?>" class="bg-[#6C3428] px-10 py-3 rounded-full font-semibold" style="background-color: <?php echo get_site_option('button_color') ?>;"><?php echo get_site_option('text_button') ?></a>
        </div>
    </section>
    <section class="relative -top-10 bg-white w-[80%] drop-shadow-md rounded-xl py-10 px-16 text-center">
        <h1 class="mb-8 text-3xl font-semibold">About Us</h1>
        <div class="flex justify-evenly flex-wrap">
            <?php $aboutCards = new WP_Query([
                'post_type' => 'about-card',
            ]);
            while ($aboutCards->have_posts()) {
                $aboutCards->the_post() ?>
                <div class="w-[31%] flex flex-col items-center mb-3">
                    <img class="h-20 mb-3" src="<?php the_field('icon') ?>" alt="">
                    <p class="font-semibold mb-3"><?php the_title() ?></p>
                    <p class="text-sm text-center mb-3">
                        <?php the_field('content') ?>
                    </p>
                </div>
            <?php
            }
            wp_reset_query();
            ?>
        </div>
    </section>
    <section class="flex flex-col items-center pb-20">
        <h2 class="text-4xl font-bold mb-8 text-white">Blog</h2>
        <div class="flex w-[70%] h-64 justify-between flex-wrap">
            <?php
            $posts = new WP_Query([
                'post_type' => 'post',
                'posts_per_page' => 2
            ]);
            while ($posts->have_posts()) {
                $posts->the_post() ?>
                <div class="flex w-[48%] border-white border-2 px-8 py-12 rounded-md">
                    <img class="w-1/3 object-cover mr-9" src="https://cdn.pixabay.com/photo/2015/04/23/22/00/tree-736885_1280.jpg" alt="">
                    <div>
                        <h3 class=" mb-3 "><a class="text-sm font-bold text-white" href="<?php the_permalink() ?>"><?php echo wp_trim_words(get_the_title(), 10) ?></a></h3>
                        <p class="text-xs text-white"><?php echo wp_trim_words(get_the_content(), 30) ?></p>
                        <a class="text-xs text-white" href="<?php the_permalink() ?>">Read More . . .</a>
                    </div>
                </div>
            <?php } ?>
        </div>
    </section>
</main>
<?php get_footer() ?>