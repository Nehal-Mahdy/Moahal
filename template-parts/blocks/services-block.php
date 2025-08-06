  <?php 
  $title           = get_field('title');
    $subHeading     = get_field('sub_heading');
    $services= get_field('services');


  ?>
  
  <section
      class="services-section bg-white md:bg-[#F5F5F3] relative overflow-hidden my-16 pb-16 mob:pb-0"
      id="services"
    >
    

    <div class="absolute right-0 top-0 h-full">
     

        <svg  class="object-cover object-left w-auto h-auto largeScreen:block hidden" xmlns="http://www.w3.org/2000/svg" width="604" height="728" viewBox="0 0 604 728" fill="none">
          <g opacity="0.56" filter="url(#filter0_f_491_2413)">
            <path
              d="M1475.94 -221.449C1470.18 -216.653 1462.31 -211.665 1452.7 -207.422L585.534 315.843L412.782 107.686C444.97 50.4085 532.388 -58.8647 624.554 -37.7416C739.762 -11.3377 847.527 -176.604 959.229 -319.097C1070.93 -461.589 1176.32 -339.198 1284.11 -245.378C1352.59 -185.772 1415.62 -191.054 1452.7 -207.422L1475.94 -221.449Z"
              fill="#93B3E2" />
          </g>
          <defs>
            <filter id="filter0_f_491_2413" x="0.982239" y="-795.973" width="1886.76" height="1523.62"
              filterUnits="userSpaceOnUse" color-interpolation-filters="sRGB">
              <feFlood flood-opacity="0" result="BackgroundImageFix" />
              <feBlend mode="normal" in="SourceGraphic" in2="BackgroundImageFix" result="shape" />
              <feGaussianBlur stdDeviation="205.9" result="effect1_foregroundBlur_491_2413" />
            </filter>
          </defs>
        </svg>




    </div>
      <!-- Background Image Container -->
      <div class="absolute left-0 top-0 h-full">
        <img
          src="<?php echo home_url(); ?>/wp-content/uploads/2025/04/Vector-9-1.png"
          alt="Background"
          class="object-cover object-left w-auto h-auto largeScreen:block hidden"
        />
      </div>

      <div
        class="relative grid grid-cols-1 md:grid-cols-2 items-center justify-center mb-16"
      >
        <!-- Services Title and Line -->
        <div class="flex flex-col gap-8 md:ps-16">
          <div
            class="flex flex-col gap-2 justify-center text-center items-center md:w-1/2 z-10"
          >
            <h3
              class="text-[#3773C9] md:text-[50px] text-[28px] leading-[150%] font-bold"
            >
              <!-- خدماتنا -->

              <?php echo isset($title) && !empty($title) ? $title : "خدماتنا"; ?>
            </h3>

            <svg
              class="px-5 mob:w-1/2"
              xmlns="http://www.w3.org/2000/svg"
              width="386"
              height="41"
              viewBox="0 0 386 41"
              fill="none"
            >
              <path
                fill-rule="evenodd"
                clip-rule="evenodd"
                d="M291.012 0.164153C236.744 0.630243 221.228 0.933445 191.118 2.11702C159.914 3.34358 137.583 4.57308 102.151 7.01539C93.9374 7.58157 85.1424 8.11889 74.8318 8.68429C36.9564 10.7612 29.5861 11.3146 17.342 13.0004C11.2754 13.8358 6.02883 14.414 3.0883 14.5716C0.473935 14.7115 0 14.7996 0 15.1456C0 15.4513 4.18131 15.7192 6.46831 15.5599C7.2879 15.503 9.50839 15.3634 11.4029 15.2502C13.2975 15.1368 17.4667 14.8324 20.6678 14.5737C28.2059 13.9644 31.8251 13.7722 44.7803 13.2936C66.5592 12.489 83.0115 11.7157 103.22 10.5471C110.668 10.1163 120.556 9.54445 125.195 9.27618C160.374 7.24128 203.345 5.42675 229.603 4.86764C261.467 4.18882 360.388 3.58869 358.717 4.08402C358.056 4.28047 346.736 5.74154 339.95 6.50652C333.717 7.20928 323.303 8.22291 310.492 9.37371C304.417 9.91967 296.078 10.6752 291.963 11.0528C276.501 12.4715 271.408 12.9115 262.624 13.5883C222.155 16.7062 195.423 19.423 158.216 24.1993C136.1 27.0382 117.973 30.2974 97.7436 35.0719C86.2423 37.7864 85.1217 38.2686 86.2537 40.0162C86.9904 41.1533 92.7935 41.3006 104.498 40.4793C125.888 38.9786 145.989 37.8147 165.461 36.9492C177.675 36.4064 179.293 36.3153 191.712 35.4726C196.35 35.1581 204.368 34.698 209.529 34.4508L218.913 34.0012L206.441 33.824C187.541 33.5553 167.268 33.5716 160.591 33.8608C138.487 34.8185 126.464 35.5556 106.825 37.1568C102.144 37.5385 98.1954 37.818 98.0496 37.778C96.6432 37.3906 128.122 31.5372 143.139 29.3938C177.038 24.5549 211.947 20.9445 265.593 16.7287C270.493 16.3437 280.328 15.5014 287.449 14.8571C294.57 14.2126 305.795 13.198 312.393 12.602C337.789 10.3084 345.356 9.45417 369.764 6.12481C385.396 3.99237 385.48 3.97413 385.906 2.57173C386.374 1.02981 385.122 0.330184 381.534 0.130207C378.126 -0.0599581 314.312 -0.036021 291.012 0.164153ZM219.925 33.8455C220.221 33.8924 220.648 33.8907 220.875 33.8416C221.102 33.7925 220.861 33.7541 220.338 33.7562C219.815 33.7584 219.63 33.7986 219.925 33.8455Z"
                fill="#E19B1B"
              />
            </svg>
          </div>

          <p
            class="md:w-3/4 text-[#2C5CA1] text-center md:text-start md:text-[30px] text-[18px] font-semibold"
          >
            <!-- مع مؤهل , حلول استيراد متكاملة لتلبية جميع احتياجاتك -->
        <?php echo isset($subHeading) && !empty($subHeading) ? $subHeading : "مع مؤهل , حلول استيراد متكاملة لتلبية جميع احتياجاتك"; ?>  
        </p>
        </div>

        <!-- Image of the Guy -->
        <div class="mt-20 z-10 hidden justify-center md:flex">
          <img
            src="<?php echo home_url(); ?>/wp-content/uploads/2025/04/confident-guy-national-costume-3.png"
            alt="Confident Guy"
            class="w-auto h-auto"
          />
        </div>
      </div>

      <div class="relative md:px-16 mob:px-4 px-10 flex flex-col gap-8 z-10">
       
      <?php
$services = get_field('services');
if (!empty($services)) :
  foreach ($services as $index => $service) :
    $service_title = $service['service_title'];
    $service_description = $service['service_description'];
    $service_image = $service['service_image'];
    $service_cta_button = $service['service_cta_button'];
    $service_steps = $service['service_steps'];
    $service_sub_text = $service['service_sub_text'];
    $service_cta_button_id = $service['service_cta_button_id'];
    $service_id = $service['service_id'];
?>
    <div
      class=" scroll-m-24 gap-6 md:gap-8 mob:gap-4 flex flex-row mob:flex-col <?php echo $index % 2 === 0 ? '' : 'mob:flex-col-reverse'; ?> rounded-xl border border-[#3773C9] py-[10px] px-3 w-full"
      data-aos="<?php echo $index % 2 === 0 ? 'fade-left' : 'fade-right'; ?>"
      id="<?php echo $service_id; ?>"
    >
   <?php if ($index % 2 === 0) : ?>
 <img
  src="<?php echo $service_image; ?>"
  alt="<?php echo $service_title; ?>"
  class="md:w-[350px] w-full <?php echo $index === 8 ? 'largeScreen:h-60 mob:h-[250px]' : ($index === 2 ? 'largeScreen:h-[208px] mob:h-[250px]' : ($index === 4 ? 'largeScreen:h-60 mob:h-[250px]' : ($index === 6 ? 'largeScreen:h-[545px] mob:h-[323px]' : 'largeScreen:h-80 mob:h-[250px]'))); ?> rounded-lg"
/>
<?php endif; ?>

      <div class="flex flex-col gap-4 justify-center">
     <h3 class="text-[22px] <?php echo $index === 6 ? 'md:w-3/4' : ''; ?> md:text-[30px] text-[#19345A] font-bold leading-[150%]">
  <?php echo esc_html($service_title); ?>
</h3>
       <p class="<?php echo $index === 6 ? 'flex flex-col gap-4 text-[18px] md:text-[22px] text-[#295697] leading-[1.725]' : 'text-[18px] md:text-[22px] text-[#295697] md:w-[90%] leading-[1.725]'; ?>">
  <?php echo esc_html($service_description); ?>
</p>
    <?php if (!empty($service_steps)) : ?>

            <?php foreach ($service_steps as $step) : ?>

            <div class="flex flex-row gap-4 items-center">
         <svg
                xmlns="http://www.w3.org/2000/svg"
                class="w-[30px] h-[30px]"
                viewBox="0 0 30 31"
                fill="none"
              >
                <path
                  d="M8.75 15.5L9.53125 16.2812M27.5 9.25L15 21.75L14.2188 20.9688M2.5 15.5L8.75 21.75L21.25 9.25"
                  stroke="#407D28"
                  stroke-width="2"
                  stroke-linecap="round"
                  stroke-linejoin="round"
                />
              </svg>
        <p class="text-[18px] md:text-[20px] text-[#295697] leading-[1.725]">
          <?php echo $step['step']; ?>
        </p>
  </div>
      <?php endforeach; ?>

  <?php endif; ?>

        <?php if (!empty($service_sub_text)) : ?>
          <p class="text-[18px] md:text-[22px] text-[#295697] md:w-[90%] leading-[1.725]">
            <?php echo esc_html($service_sub_text); ?>
          </p>
        <?php endif; ?>
        <?php if (!empty($service_cta_button)) : ?>
          <div class="flex">
            <a href="<?php echo esc_url($service_cta_button); ?>">
              <button
                class="flex flex-row px-4 py-2 justify-center items-center gap-2 rounded-lg bg-[#3773C9] text-white text-lg font-bold hover:bg-[#00796B] transition-all duration-700 ease-in-out"
             id="<?php echo esc_attr($service_cta_button_id); ?>" >
                اطلب الآن
                <svg xmlns="http://www.w3.org/2000/svg" width="35" height="35" viewBox="0 0 35 35" fill="none">
                  <path
                    d="M23.0968 10.7328C23.0116 10.3445 22.7757 10.006 22.4411 9.79149C22.1064 9.57701 21.7003 9.50414 21.3119 9.58888L13.4955 11.2974C13.1068 11.3825 12.7678 11.6185 12.553 11.9536C12.3383 12.2886 12.2655 12.6953 12.3506 13.084C12.4356 13.4728 12.6717 13.8118 13.0067 14.0265C13.3418 14.2412 13.7484 14.3141 14.1372 14.229L18.4152 13.2934L12.1912 23.0052C11.9765 23.3401 11.9037 23.7466 11.9887 24.1352C12.0738 24.5239 12.3098 24.8628 12.6447 25.0774C12.9796 25.2921 13.3861 25.3649 13.7748 25.2798C14.1634 25.1948 14.5023 24.9588 14.717 24.6239L20.941 14.9121L21.8771 19.1893C21.9192 19.3818 21.9988 19.5641 22.1114 19.7258C22.224 19.8875 22.3673 20.0255 22.5332 20.1318C22.6991 20.2381 22.8844 20.3107 23.0783 20.3455C23.2723 20.3802 23.4712 20.3764 23.6637 20.3343C23.8562 20.2922 24.0385 20.2125 24.2002 20.0999C24.3619 19.9874 24.4999 19.844 24.6062 19.6781C24.7125 19.5122 24.7851 19.327 24.8198 19.133C24.8546 18.9391 24.8508 18.7402 24.8087 18.5477L23.0968 10.7328Z"
                    fill="#EBF1FA"
                  />
                </svg>
              </button>
            </a>
          </div>
        <?php endif; ?>
      </div>

<?php if ($index % 2 !== 0) : ?>
  <img
  src="<?php echo $service_image; ?>"
  alt="<?php echo $service_title; ?>"
  class="md:w-[350px] w-full <?php echo $index === 7 ? 'largeScreen:h-[375px] mob:h-[326px]' : ($index === 5 ? 'largeScreen:h-[372px] mob:h-[354px]' : 'largeScreen:h-60 mob:h-[250px]'); ?> rounded-lg"
/>
<?php endif; ?>
    </div>
<?php
  endforeach;
endif;
?>
      </div>


          <div class="absolute right-0 bottom-0 ">
          
          
          <svg class="object-cover object-right w-auto h-auto largeScreen:block hidden" xmlns="http://www.w3.org/2000/svg" width="505" height="961" viewBox="0 0 505 961" fill="none">
            <g filter="url(#filter0_f_801_3920)">
              <path
                d="M1343.41 592.551C1338.51 596.935 1331.76 601.398 1323.41 605.045L577.425 1071.14L412.783 859.16C438.53 804.921 510.832 702.779 594.056 728.121C698.087 759.797 785.649 604.062 877.888 470.751C970.127 337.44 1070.33 462.277 1171.21 559.357C1235.3 621.034 1291.21 619.115 1323.41 605.045L1343.41 592.551Z"
                fill="#93B3E2" />
            </g>
            <defs>
              <filter id="filter0_f_801_3920" x="0.982239" y="0.875793" width="1754.22" height="1482.07"
                filterUnits="userSpaceOnUse" color-interpolation-filters="sRGB">
                <feFlood flood-opacity="0" result="BackgroundImageFix" />
                <feBlend mode="normal" in="SourceGraphic" in2="BackgroundImageFix" result="shape" />
                <feGaussianBlur stdDeviation="205.9" result="effect1_foregroundBlur_801_3920" />
              </filter>
            </defs>
          </svg>
          
          </div>
    </section>