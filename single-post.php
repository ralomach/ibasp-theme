<?php get_header(); ?>

<main>
    <h1 class="h2"><?php the_title(); ?></h1>

    <p style="padding: 0 0 20px 0; font-size: calc(12px + 0.3vw);">
        <i class="fa fa-clock-o" aria-hidden="true"></i>
        <?php the_time('d/m/Y'); ?>
        <span>|</span>
        <i class="fa fa-folder-open-o" aria-hidden="true"></i>
        <?php the_category(', '); ?>
    </p>

    <div style="margin: 10px 0; text-align: center;">
        <?php the_post_thumbnail(); ?>
    </div>
    <?php the_content(); ?>
</main>

<hr />

<div id="nav-posts" style="display: flex; justify-content: space-around; align-items: center;">
    <?php
        if (in_category('3')) {
            $previous_link_text = "Mensagem anterior";
            $next_link_text = "Próxima mensagem";
        } else if (in_category('20')) {
            $previous_link_text = "Aviso anterior";
            $next_link_text = "Próximo aviso";
        } else {
            $previous_link_text = "Postagem anterior";
            $next_link_text = "Próxima postagem";
        }

        previous_post_link(
            '%link',
            '<i class="fa fa-arrow-left"></i>'. $previous_link_text . ':<br />%title',
            TRUE
        );
        next_post_link(
            '%link',
            '<i class="fa fa-arrow-right"></i>'. $next_link_text . ':<br />%title',
            TRUE
        );
    ?>
</div>

<?php get_footer(); ?>