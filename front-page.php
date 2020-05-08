<?php
get_header();
$eventos_no_inicio = 7;
$mensagens_no_inicio = 3;
$avisos_no_inicio = 5;
$events = tribe_get_events(
  array(
    'start_date' => 'now',
    'featured' => true,
    'posts_per_page' => $eventos_no_inicio,
  )
);
$events_thumbnail = [];
foreach ($events as $post) {
  setup_postdata($post);
  if (has_post_thumbnail()) {
    $img_mobile = get_field('imagem_evento_mobile');
    $img_mobile_url = $img_mobile['url'];
    $img_mobile_alt = $img_mobile['alt'];
    $events_thumbnail[] = [
      'eventos_desktop' => get_the_post_thumbnail_url($post, 'full'),
      'img_mobile' => $img_mobile,
      'img_mobile_alt' => $img_mobile_alt,
      'img_mobile_url' => $img_mobile_url,
      'evento_url' => get_permalink(),
      'evento_website' => tribe_get_event_meta(get_the_ID(), '_EventURL', true),
    ];
  }
}

wp_reset_postdata();
?>

<!-- galeria -->
<div class="w-100 swiper-container bg-dark">
  <div class="swiper-wrapper">
    <?php
    foreach ($events_thumbnail as $event) : ?>
      <div class="swiper-slide">
        <a href="<?php echo $event['evento_website'] ? $event['evento_website'] : $event['evento_url']; ?>" <?php echo empty($event['evento_website']) || strpos($event['evento_website'], 'ibasp.org.br') !== false
                                                                                                              ? ''
                                                                                                              : 'target="_blank"';
                                                                                                            ?> rel="noopener">
          <picture>
            <source srcset="<?php echo $event['eventos_desktop']; ?>" media="(min-width: 768px)" />
            <img class="w-100 lazyload" data-src="<?php echo $event['img_mobile']["sizes"]["mobile_events"]; ?>" data-srcset="<?php echo $event['img_mobile']["sizes"]["mobile_events_retina"]; ?> 2x" alt="<?php echo $event['img_mobile_alt'] ?>" width="360" height="360" />
          </picture>
        </a>
      </div>
    <?php endforeach; ?>
  </div>
  <div class="swiper-scrollbar"></div>
  <div class="swiper-button-next d-none d-md-block"></div>
  <div class="swiper-button-prev d-none d-md-block"></div>
</div>

<!-- seção das últimas mensagens -->
<div id="mensagens-div" class="bg-light pb-5">
  <div class="col">
    <div class="row justify-content-center">
      <h2 class="text-center text-light p-5" style="font-weight: 800">Últimas Mensagens</h2>
    </div>

    <div class="row text-center justify-content-center" style="max-width: 1200px; min-height: 50vh; margin: 0 auto">
      <?php
      $args = array(
        'posts_per_page' => $mensagens_no_inicio,
        'category_name' => 'mensagens'
      );
      $ultimas_mensagens = new WP_Query($args);
      if ($ultimas_mensagens->have_posts()) {
        while ($ultimas_mensagens->have_posts()) : $ultimas_mensagens->the_post(); ?>
          <div class="col-md p-0 mb-5">
            <div class="card" style="width: 18rem; margin: auto;">
              <?php if (has_post_thumbnail()) {
                the_post_thumbnail('mensagens_thumbnail', ['class' => 'card-img-top lazyload']);
              } ?>
              <div class="card-body pt-1">
                <div class="card-title text-center mb-1">
                  <h3 class="h5 mb-0"><?php the_title(); ?></h3>
                </div>
                <hr class="m-0 mb-1 p-0" />
                <p class="mb-2" style="width: 100%; text-align: justify; text-justify: inter-word">
                  <?php echo get_the_excerpt(); ?>
                </p>
                <hr class="m-0 mb-1 p-0" />
                <a href="<?php the_permalink(); ?>" class="btn btn-outline-dark mt-2">Leia mais →</a>
              </div>
            </div>
          </div>
      <?php endwhile;
        wp_reset_postdata();
      } ?>
    </div>

    <div class="row">
      <div class="col text-center">
        <a class="btn btn-warning" href="<?php echo get_site_url(null, '/categoria/mensagens/'); ?>" style="background-color: #fdce02; color: black;">
          Arquivo de Mensagens
        </a>
      </div>
    </div>
  </div>
</div>

<!-- seção das últimos avisos -->
<div id="avisos-div" class="bg-light pb-5">
  <div class="col">
    <div class="row justify-content-center">
      <h2 class="text-center text-light p-5" style="font-weight: 800">Avisos e Notícias</h2>
    </div>

    <div class="row">
      <div class="col">
        <?php
        $args = array(
          'posts_per_page' => $avisos_no_inicio,
          'category_name' => 'avisos'
        );
        $ultimas_noticias = new WP_Query($args);
        if ($ultimas_noticias->have_posts()) {
          while ($ultimas_noticias->have_posts()) : $ultimas_noticias->the_post(); ?>
            <div class="list-group" style="max-width: 850px; margin: 10px auto">
              <a href="<?php the_permalink(); ?>" class="list-group-item list-group-item-action">
                <h3 class="h5">
                  <span style="color: #655200"><?php echo get_the_date(); ?></span> <?php the_title(); ?>
                </h3>
              </a>
            </div>
        <?php endwhile;
          wp_reset_postdata();
        } ?>
      </div>
    </div>

    <div class="row mt-5">
      <div class="col text-center">
        <a class="btn btn-warning" href="<?php echo get_site_url(null, '/categoria/avisos/'); ?>" style="background-color: #fdce02; color: black;">
          Arquivo de Avisos
        </a>
      </div>
    </div>
  </div>
</div>

<script>
  window.onload = function() {
    var mySwiper = new Swiper('.swiper-container', {
      //loop: true,
      longSwipesRatio: 0.1,
      speed: 1500,
      effect: 'coverflow',
      coverflowEffect: {
        rotate: 50,
        slideShadows: true,
      },
      autoplay: {
        delay: 7000,
        disableOnInteraction: true,
      },
      navigation: {
        nextEl: '.swiper-button-next',
        prevEl: '.swiper-button-prev',
      },
      scrollbar: {
        el: '.swiper-scrollbar',
      },
    });
  };
</script>

<?php get_footer();
