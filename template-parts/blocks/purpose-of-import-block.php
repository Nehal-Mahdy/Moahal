  <?php
    $title           = get_field('title');
    $subHeading     = get_field('sub_heading');
    $purpose           = get_field('purpose');
  ?>

    <section data-aos="zoom-in" class="purpose-of-import-section px-16 mob:px-4 my-24" id="purpose">
      <div class="container flex flex-col gap-8 items-center justify-center">
        <div class="flex flex-col justify-center items-center">
          <h2 class="text-[#3773C9] text-center md:text-[50px] text-[28px] leading-[150%] font-bold">
            <!-- الغرض من الاستيراد -->
              <?php echo !empty($title) ? esc_html($title) : 'الغرض من '; ?>

          </h2>
          <div class="relative w-full md:px-16 max-w-md mx-auto mt-2">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 386 41" fill="none" class="w-auto h-auto"
              preserveAspectRatio="xMidYMid meet">
              <path fill-rule="evenodd" clip-rule="evenodd"
                d="M291.012 0.164153C236.744 0.630243 221.228 0.933445 191.118 2.11702C159.914 3.34358 137.583 4.57308 102.151 7.01539C93.9374 7.58157 85.1424 8.11889 74.8318 8.68429C36.9564 10.7612 29.5861 11.3146 17.342 13.0004C11.2754 13.8358 6.02883 14.414 3.0883 14.5716C0.473935 14.7115 0 14.7996 0 15.1456C0 15.4513 4.18131 15.7192 6.46831 15.5599C7.2879 15.503 9.50839 15.3634 11.4029 15.2502C13.2975 15.1368 17.4667 14.8324 20.6678 14.5737C28.2059 13.9644 31.8251 13.7722 44.7803 13.2936C66.5592 12.489 83.0115 11.7157 103.22 10.5471C110.668 10.1163 120.556 9.54445 125.195 9.27618C160.374 7.24128 203.345 5.42675 229.603 4.86764C261.467 4.18882 360.388 3.58869 358.717 4.08402C358.056 4.28047 346.736 5.74154 339.95 6.50652C333.717 7.20928 323.303 8.22291 310.492 9.37371C304.417 9.91967 296.078 10.6752 291.963 11.0528C276.501 12.4715 271.408 12.9115 262.624 13.5883C222.155 16.7062 195.423 19.423 158.216 24.1993C136.1 27.0382 117.973 30.2974 97.7436 35.0719C86.2423 37.7864 85.1217 38.2686 86.2537 40.0162C86.9904 41.1533 92.7935 41.3006 104.498 40.4793C125.888 38.9786 145.989 37.8147 165.461 36.9492C177.675 36.4064 179.293 36.3153 191.712 35.4726C196.35 35.1581 204.368 34.698 209.529 34.4508L218.913 34.0012L206.441 33.824C187.541 33.5553 167.268 33.5716 160.591 33.8608C138.487 34.8185 126.464 35.5556 106.825 37.1568C102.144 37.5385 98.1954 37.818 98.0496 37.778C96.6432 37.3906 128.122 31.5372 143.139 29.3938C177.038 24.5549 211.947 20.9445 265.593 16.7287C270.493 16.3437 280.328 15.5014 287.449 14.8571C294.57 14.2126 305.795 13.198 312.393 12.602C337.789 10.3084 345.356 9.45417 369.764 6.12481C385.396 3.99237 385.48 3.97413 385.906 2.57173C386.374 1.02981 385.122 0.330184 381.534 0.130207C378.126 -0.0599581 314.312 -0.036021 291.012 0.164153ZM219.925 33.8455C220.221 33.8924 220.648 33.8907 220.875 33.8416C221.102 33.7925 220.861 33.7541 220.338 33.7562C219.815 33.7584 219.63 33.7986 219.925 33.8455Z"
                fill="#E19B1B" />
            </svg>
          </div>
        </div>
    
        <p class="leading-10 md:w-2/3 text-[#2C5CA1] text-[18px] md:text-[24px] font-semibold mb-20 mob:mb-8 text-center">
         <?php echo !empty($subHeading) ? esc_html($subHeading) : 'سواء كنت فردًا، تاجرًا، أو صاحب مصنع، نحن نقدم لك حلول استيراد متكاملة تناسب احتياجاتك، بأفضل الأسعار وأعلى جودة اختر غرض الاستيراد وابدأ طلبك'; ?>
        </p>
      </div>
    
      <div class="mob:hidden justify-center items-center">
      <?php if (have_rows('purpose')): ?>
    <div class="flex flex-row gap-[60px] mob:gap-4 justify-center mb-[62px] mob:flex-col">
        <?php
        $is_first = true;
        while (have_rows('purpose')): the_row();
            $svg = get_sub_field('svg');
            $tab_target = get_sub_field('tab_data_target');
            $title = get_sub_field('title');
            ?>
            <button
                class="flex justify-center items-center flex-col gap-[22px] tab-btn px-8 py-3 rounded-xl border border-[#3773C9] bg-[#EBF1FA] text-[#3268B5] shadow-sm transition <?php echo $is_first ? 'active-tab' : ''; ?>"
                data-target="<?php echo esc_attr($tab_target); ?>">
                <?php if ($svg): ?>
                    <?php echo $svg; ?>
                <?php endif; ?>
                <?php if ($title): ?>
                    <span class="text-[24px] mob:text-[20px] md:text-[30px] font-bold leading-10"><?php echo esc_html($title); ?></span>
                <?php endif; ?>
            </button>
            <?php $is_first = false; ?>
        <?php endwhile; ?>
    </div>
<?php endif; ?>

    
        <!-- Tab Content -->
        <div class="bg-white rounded-xl border border-[#3773C9] py-10">
      

        <?php
        $is_first = true;
        while (have_rows('purpose')): the_row();
            $svg = get_sub_field('svg');
            $tab_target = get_sub_field('tab_data_target');
            $title = get_sub_field('title');
            $description = get_sub_field('description');
            $points = get_sub_field('points');

            ?>


        <div id="<?php echo esc_attr($tab_target); ?>"
            class="tab-content   flex-col gap-8 mob:gap-12 px-8 mob:px-3 bg-[url('<?php echo home_url(); ?>/wp-content/uploads/2025/04/vector3.png')] bg-no-repeat bg-left-center mob:bg-none <?php echo $is_first ? 'flex' : 'hidden flex'; ?>"
            style="background-position: left center; background-size: 39%">
            <h2 class="md:text-[30px] text-[24px] mob:text-[18px] font-bold md:w-[80%] w-full text-[#19345A]">
            
            <?php echo esc_html($description); ?>

            </h2>
            <div class="flex flex-col gap-9 mob:gap-[22px]">

<?php
 while (have_rows('points')): the_row();
?>

              <div class="flex flex-row gap-4 items-center">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-[50px] h-[50px] mob:w-[30px] mob:h-[30px]"
                  viewBox="0 0 50 50" fill="none">
                  <path
                    d="M14.5837 24.9999L15.8857 26.302M45.8337 14.5833L25.0003 35.4166L23.6982 34.1145M4.16699 24.9999L14.5837 35.4166L35.417 14.5833"
                    stroke="#407D28" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                </svg>
                <p class="md:text-[24px] text-[18px] font-medium text-[#214579] w-[75%] mob:w-full">
                
                  <?php echo esc_html(get_sub_field('point')); ?>

                </p>
              </div>

              <?php endwhile; ?>
    
         <?php if (get_sub_field('alert')): ?>
    
              <div class="flex flex-row gap-4 items-center">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-[50px] h-[50px] mob:w-[30px] mob:h-[30px]"
                  viewBox="0 0 50 50" fill="none">
                  <path
                    d="M39.9664 16.2603L33.7893 10.0791C29.5664 5.84992 27.456 3.7395 25.1872 4.2395C22.9185 4.7395 21.8935 7.54575 19.8372 13.1562L18.4456 16.9541C17.8977 18.4499 17.6227 19.1978 17.1289 19.777C16.9082 20.0374 16.6563 20.2697 16.3789 20.4687C15.7622 20.9124 14.9956 21.1228 13.4622 21.5458C10.0039 22.4999 8.27266 22.977 7.62058 24.1082C7.33869 24.5979 7.19201 25.1537 7.19558 25.7187C7.20391 27.0249 8.47266 28.2937 11.0081 30.8333L13.9581 33.7832L4.63308 43.1166C4.34892 43.4178 4.19335 43.8179 4.19939 44.232C4.20542 44.646 4.37259 45.0414 4.66541 45.3343C4.95822 45.6271 5.35363 45.7942 5.76768 45.8003C6.18174 45.8063 6.58185 45.6507 6.88308 45.3666L16.206 36.0332L19.2602 39.0916C21.8143 41.6457 23.0914 42.9249 24.406 42.9249C24.9581 42.9249 25.5018 42.7832 25.9831 42.5082C27.1247 41.8562 27.6039 40.1145 28.5643 36.6291C28.9852 35.0978 29.1956 34.3333 29.6372 33.7145C29.8317 33.4451 30.0553 33.2006 30.3081 32.9812C30.881 32.4853 31.6247 32.2062 33.1102 31.6478L36.9518 30.2041C42.5018 28.1208 45.2768 27.077 45.7643 24.8166C46.2539 22.5541 44.1602 20.4562 39.9664 16.2603Z"
                    fill="#3773C9" />
                </svg>
    
                <p class="md:text-[24px] text-[18px] font-bold text-[#214579] w-[75%] mob:w-full leading-relaxed">
              <?php
              echo (get_sub_field('alert'));
              ?>  
              
              </p>
              <?php endif; ?>
              </div>


              <?php if (get_sub_field('cta_button_text')): ?>
            <div class="flex mob:justify-center mob:items-center">
            <a href="<?php echo esc_url(get_sub_field('cta_button_url')); ?>">
 
            <button
                class="px-4 py-[14px] justify-center items-center gap-2 rounded-lg bg-[#3773C9] text-white text-lg font-bold hover:bg-[#00796B] transition-all duration-700 ease-in-out <?php echo get_sub_field('cta_button_class') ?  get_sub_field('cta_button_class') : ''; ?>">
<?php echo esc_html(get_sub_field('cta_button_text')); ?>
                
              </button>
              </a>
            </div>
            <?php endif; ?>
            </div>

          </div>
          
          <?php 
          $is_first = false;?>
          <?php endwhile; ?>
        </div>
      </div>

<!-- Mobile view -->
        <!-- Accordion -->
        <div class="w-full md:w-3/4 space-y-6 mob:block hidden">
        

        <?php if (have_rows('purpose')): ?>
          <?php
          $is_first = true;
          while (have_rows('purpose')): the_row();
              $svg = get_sub_field('svg');
              $tab_target = get_sub_field('tab_data_target');
              $title = get_sub_field('title');
              $description = get_sub_field('description');
              $points = get_sub_field('points');
                ?>
        
          <!-- Accordion Item -->
          <div class="import-accordion">
            <button
              class="w-full text-center flex justify-center items-center flex-col gap-[22px] tab-btn px-8 py-3 rounded-xl border border-[#3773C9] bg-[#EBF1FA] text-[#3268B5] shadow-sm transition import-accordion-header <?php echo $is_first ? 'active-tab' : ''; ?>">
              <?php if ($svg): ?>
                    <?php echo $svg; ?>
                <?php endif; ?>
                <?php if ($title): ?>
              <span class="text-xl font-bold"> 
                <?php echo $title; ?>
              </span>
              <?php endif; ?>
            </button>
          
            <div
              class="import-accordion-body open flex flex-col gap-7 h-full  px-3   transition-all duration-500 ease-in-out overflow-hidden bg-white rounded-xl border border-[#3773C9] mt-2"
           <?php if (!$is_first) echo 'style="max-height: 0;"'; ?>>

           <h2  class="md:text-[30px] text-[24px] mob:text-[18px] font-bold md:w-[80%] w-full text-[#19345A] pt-8">
            <?php echo esc_html($description); ?>
          </h2>

          <div class="flex flex-col gap-5 ">

<?php
 while (have_rows('points')): the_row();
?>

          <div class="flex flex-row gap-4 items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-[50px] h-[50px] mob:w-[30px] mob:h-[30px]" viewBox="0 0 50 50"
                      fill="none">
                      <path
                        d="M14.5837 24.9999L15.8857 26.302M45.8337 14.5833L25.0003 35.4166L23.6982 34.1145M4.16699 24.9999L14.5837 35.4166L35.417 14.5833"
                        stroke="#407D28" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                    </svg>
                    <p class="md:text-[24px] text-[18px] font-medium text-[#214579] w-[75%] mob:w-full">
                     
                  <?php echo esc_html(get_sub_field('point')); ?>

                    </p>
                 

            
                  </div>
                  <?php endwhile; ?>


                  <?php if (get_sub_field('alert')): ?>
                    <div class="flex flex-row gap-4 items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-[50px] h-[50px] mob:w-[30px] mob:h-[30px]" viewBox="0 0 50 50"
                      fill="none">
                      <path
                        d="M39.9664 16.2603L33.7893 10.0791C29.5664 5.84992 27.456 3.7395 25.1872 4.2395C22.9185 4.7395 21.8935 7.54575 19.8372 13.1562L18.4456 16.9541C17.8977 18.4499 17.6227 19.1978 17.1289 19.777C16.9082 20.0374 16.6563 20.2697 16.3789 20.4687C15.7622 20.9124 14.9956 21.1228 13.4622 21.5458C10.0039 22.4999 8.27266 22.977 7.62058 24.1082C7.33869 24.5979 7.19201 25.1537 7.19558 25.7187C7.20391 27.0249 8.47266 28.2937 11.0081 30.8333L13.9581 33.7832L4.63308 43.1166C4.34892 43.4178 4.19335 43.8179 4.19939 44.232C4.20542 44.646 4.37259 45.0414 4.66541 45.3343C4.95822 45.6271 5.35363 45.7942 5.76768 45.8003C6.18174 45.8063 6.58185 45.6507 6.88308 45.3666L16.206 36.0332L19.2602 39.0916C21.8143 41.6457 23.0914 42.9249 24.406 42.9249C24.9581 42.9249 25.5018 42.7832 25.9831 42.5082C27.1247 41.8562 27.6039 40.1145 28.5643 36.6291C28.9852 35.0978 29.1956 34.3333 29.6372 33.7145C29.8317 33.4451 30.0553 33.2006 30.3081 32.9812C30.881 32.4853 31.6247 32.2062 33.1102 31.6478L36.9518 30.2041C42.5018 28.1208 45.2768 27.077 45.7643 24.8166C46.2539 22.5541 44.1602 20.4562 39.9664 16.2603Z"
                        fill="#3773C9" />
                    </svg>
                
                    <p class="md:text-[24px] text-[18px] font-bold text-[#214579] w-[75%] mob:w-full leading-relaxed">
                  <?php   echo (get_sub_field('alert'));
                  ?>
                  </p>
                  </div>
                    <?php endif; ?>

            </div>




            <div class="flex mob:justify-center mob:items-center pb-8">
                <a href="<?php echo esc_url(get_sub_field('cta_button_url')); ?>">
  
                <button
                    class="px-4 py-[14px] justify-center items-center gap-2 rounded-lg bg-[#3773C9] text-white text-lg font-bold hover:bg-[#00796B] transition-all duration-700 ease-in-out <?php echo get_sub_field('cta_button_class') ?  get_sub_field('cta_button_class') : ''; ?>">
                  <?php echo esc_html(get_sub_field('cta_button_text')); ?>
                  </button>
                  </a>
                </div>



            </div>




          </div>
    
            <?php $is_first = false; ?>

          <?php
          endwhile;
          endif;
          ?>
        </div>
    </section>