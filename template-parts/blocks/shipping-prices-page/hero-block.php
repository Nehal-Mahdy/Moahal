<?php
$title       = get_field('main_heading');
$description = get_field('subheading');
$image       = get_field('hero_image');

// Fallback image
$default_image = get_template_directory_uri() . '/wp-content/uploads/2025/04/hero.png';
$hero_image = !empty($image) ? esc_url($image) : esc_url($default_image);

// Title & Description Fallbacks
$final_title = !empty($title)
    ? $title
    : "أسعار الشحن من الصين إلى السعودية";

$final_description = !empty($description)
    ? $description
    : "تعرف على أحدث أسعار الشحن من ميناء Ningbo الصيني إلى موانئ المملكة الثلاثة الدمام، الرياض، وجدة.";
?>

<section
  id="shipping-hero"
  class="relative md:h-[80vh] mintab:h-[60vh] mob:h-[50vh] w-full bg-cover bg-center flex items-start justify-start"
  style="background-image: url('<?php echo $hero_image; ?>');"
>
  <div class="absolute inset-0 bg-gradient-to-b from-[#02346D]/80 to-black/80 z-0"></div>

  <div class="container relative z-10 flex  justify-center h-full pt-16 sm:pt-24 md:pt-32">
    <div class="max-w-3xl w-full text-center">
      <h1 class="font-bold text-xl sm:text-2xl md:text-[40px] text-primary leading-[1.5] md:mb-8 mintab:mb-6 mb-3 ">
        <?php echo wp_kses_post($final_title); ?>
      </h1>
      <p class="text-base sm:text-lg md:text-2xl text-secondary font-normal leading-relaxed px-2 sm:px-0">
        <?php echo wp_kses_post($final_description); ?>
      </p>
    </div>
  </div>
</section>
