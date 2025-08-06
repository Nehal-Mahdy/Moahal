 <?php
 $title = get_field('title');
    $reasons = get_field('reasons');
    $cta_btn_text= get_field('section_cta_button_text');
    $cta_btn_link= get_field('section_cta_button_url');
    $cta_btn_class= get_field('section_cta_button_class');
 ?>
 
 <section id="why-us" class="bg-white relative overflow-hidden mb-16 md:py-16">
  <div class="absolute right-0 top-0 h-full">
  
  
    <svg class="object-cover object-left w-auto h-auto largeScreen:block hidden" xmlns="http://www.w3.org/2000/svg"
      width="604" height="728" viewBox="0 0 604 728" fill="none">
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

      <div class="absolute flex justify-center items-center w-full">
        <img
          src="<?php echo home_url(); ?>/wp-content/uploads/2025/04/young_arab_man_wearing_traditional_clothes_thinking_about_something-Photoroom-1.png"
          alt="Background"
          class="object-cover object-center mx-auto mt-56 w-auto h-auto largeScreen:block hidden"
        />
      </div>

      <div class="relative items-center justify-center mb-28">
        <!-- why us Title  -->
        <div
          class="flex flex-col justify-center items-center gap-2 largeScreen:mb-[90px] mb-10 mob:mb-8"
        >
          <div
            class="flex flex-col gap-2 justify-center text-center items-center md:w-1/2 z-10"
          >
            <h3
              class="text-[#3773C9] md:text-[50px] text-[28px] leading-[150%] font-bold"
            >
              <!-- لماذا مؤهل؟ -->
               <?php if( $title ) : ?>
                <?php echo esc_html( $title ); ?>
                <?php else: echo 'لماذا مؤهل؟';?>
                <?php endif; ?>

            </h3>

            <svg
              class="px-5 w-4/6"
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
        </div>

        <!-- <div class="flex flex-col md:px-16 mob:px-4 px-10">
          <div
            class="flex flex-row mob:flex-col largeScreen:gap-80 gap-4 largeScreen:mb-44"
          >
            <div class="flex flex-row py-[10px] px-3 w-full gap-[10px]">
              <h3
                class="text-[#C1D4EE] text-right font-cairo text-[100px] font-bold leading-[100%]"
              >
                1
              </h3>

              <div class="flex flex-col gap-2 justify-center pt-16">
                <h3
                  class="text-[22px] md:text-[30px] text-[#19345A] font-bold leading-[150%]"
                >
                  الشفافية والمصداقية
                </h3>
                <p
                  class="text-[18px] md:text-[22px] text-[#295697] md:w-[90%] leading-[1.725]"
                >
                  نوفر لك كافة المعلومات والتفاصيل المتعلقة بعملية الاستيراد
                </p>
              </div>
            </div>

            <div class="flex flex-row py-[10px] px-3 w-full gap-[10px]">
              <h3
                class="text-[#C1D4EE] text-right font-cairo text-[100px] font-bold leading-[100%]"
              >
                2
              </h3>

              <div class="flex flex-col gap-2 justify-center pt-16">
                <h3
                  class="text-[22px] md:text-[30px] text-[#19345A] font-bold leading-[150%]"
                >
                  حلول متكاملة
                </h3>
                <p
                  class="text-[18px] md:text-[22px] text-[#295697] md:w-[90%] leading-[1.725]"
                >
                  نغطي كافة جوانب الاستيراد من البحث عن الموردين إلى التوصيل
                  النهائي.
                </p>
              </div>
            </div>
          </div>

          <div
            class="flex flex-row mob:flex-col largeScreen:gap-80 gap-4 largeScreen:mb-28"
          >
            <div class="flex flex-row py-[10px] px-3 w-full gap-[10px]">
              <h3
                class="text-[#C1D4EE] text-right font-cairo text-[100px] font-bold leading-[100%]"
              >
                3
              </h3>

              <div class="flex flex-col gap-2 justify-center pt-16">
                <h3
                  class="text-[22px] md:text-[30px] text-[#19345A] font-bold leading-[150%]"
                >
                  ضمان الجودة
                </h3>
                <p
                  class="text-[18px] md:text-[22px] text-[#295697] md:w-[90%] leading-[1.725]"
                >
                  نشرف على مراحل التصنيع لضمان وصول المنتجات وفق المواصفات
                  المطلوبة.
                </p>
              </div>
            </div>

            <div class="flex flex-row py-[10px] px-3 w-full gap-[10px]">
              <h3
                class="text-[#C1D4EE] text-right font-cairo text-[100px] font-bold leading-[100%]"
              >
                4
              </h3>

              <div class="flex flex-col gap-2 justify-center pt-16">
                <h3
                  class="text-[22px] md:text-[30px] text-[#19345A] font-bold leading-[150%]"
                >
                  شبكة واسعة من الشراكات
                </h3>
                <p
                  class="text-[18px] md:text-[22px] text-[#295697] md:w-[90%] leading-[1.725]"
                >
                  لدينا تعاون مع أفضل شركات التخليص الجمركي والنقل الدولي.
                </p>
              </div>
            </div>
          </div>

          <div class="flex flex-row mob:flex-col largeScreen:gap-52 gap-4">
            <div class="flex flex-row py-[10px] px-3 w-full gap-[10px]">
              <h3
                class="text-[#C1D4EE] text-right font-cairo text-[100px] font-bold leading-[100%]"
              >
                5
              </h3>

              <div class="flex flex-col gap-2 justify-center pt-16">
                <h3
                  class="text-[22px] md:text-[30px] text-[#19345A] font-bold leading-[150%]"
                >
                  أفضل الأسعار
                </h3>
                <p
                  class="text-[18px] md:text-[22px] text-[#295697] md:w-[90%] leading-[1.725]"
                >
                  نضمن لك استيراد منتجات عالية الجودة بأقل التكاليف وبأسعار
                  تنافسية.
                </p>
              </div>
            </div>

            <div class="flex flex-row py-[10px] px-3 w-full gap-[10px]">
              <h3
                class="text-[#C1D4EE] text-right font-cairo text-[100px] font-bold leading-[100%]"
              >
                6
              </h3>

              <div class="flex flex-col gap-2 justify-center pt-16">
                <h3
                  class="text-[22px] md:text-[30px] text-[#19345A] font-bold leading-[150%]"
                >
                  الدعم الفني والمساعدة المستمرة
                </h3>
                <p
                  class="text-[18px] md:text-[22px] text-[#295697] md:w-[90%] leading-[1.725]"
                >
                  فريقنا جاهز لتقديم المساعدة والإجابة عن استفساراتكم في أي وقت
                </p>
              </div>
            </div>
          </div>
        </div> -->
<?php
$reasons = get_field('reasons'); // ACF repeater
if ($reasons):
  $count = count($reasons);
?>
<div class="flex flex-col md:px-16 mob:px-4 px-10">
  <?php foreach (array_chunk($reasons, 2) as $i => $chunk): ?>
    <div class="flex flex-row mob:flex-col gap-4 
                <?php echo $i === 0 ? 'largeScreen:gap-80 largeScreen:mb-44' : ($i === 1 ? 'largeScreen:gap-80 largeScreen:mb-28' : 'largeScreen:gap-52'); ?>">
      <?php foreach ($chunk as $j => $reason): 
        $index = $i * 2 + $j + 1;
      ?>
        <div class="flex flex-row py-[10px] px-3 w-full gap-[10px]">
          <h3 class="text-[#C1D4EE] text-right font-cairo text-[100px] font-bold leading-[100%]">
            <?php echo $index; ?>
          </h3>
          <div class="flex flex-col gap-2 justify-center pt-16">
            <h3 class="text-[22px] md:text-[30px] text-[#19345A] font-bold leading-[150%]">
              <?php echo esc_html($reason['title']); ?>
            </h3>
            <p class="text-[18px] md:text-[22px] text-[#295697] md:w-[90%] leading-[1.725]">
              <?php echo esc_html($reason['description']); ?>
            </p>
          </div>
        </div>
      <?php endforeach; ?>
    </div>
  <?php endforeach; ?>
</div>
<?php endif; ?>


            <div class="absolute left-0 bottom-0 ">
            
              <svg class="object-cover object-left w-auto h-auto largeScreen:block hidden" xmlns="http://www.w3.org/2000/svg"
                width="479" height="1266" viewBox="0 0 479 1266" fill="none">
                <g filter="url(#filter0_f_491_2355)">
                  <path
                    d="M-1457.68 644.839C-1449.69 637.315 -1438.66 629.346 -1425 622.344L-205.989 -216.845L66.6063 77.3361C24.963 164.389 -92.5412 332.462 -229.411 308.326C-400.499 278.156 -542.442 530.48 -692.316 749.472C-842.189 968.463 -1008.05 795.784 -1174.7 665.485C-1280.58 582.702 -1372.31 595.33 -1425 622.344L-1457.68 644.839Z"
                    fill="#93B3E2" />
                </g>
                <defs>
                  <filter id="filter0_f_491_2355" x="-1869.47" y="-628.645" width="2347.88" height="1894.54"
                    filterUnits="userSpaceOnUse" color-interpolation-filters="sRGB">
                    <feFlood flood-opacity="0" result="BackgroundImageFix" />
                    <feBlend mode="normal" in="SourceGraphic" in2="BackgroundImageFix" result="shape" />
                    <feGaussianBlur stdDeviation="205.9" result="effect1_foregroundBlur_491_2355" />
                  </filter>
                </defs>
              </svg>
            
            </div>



            
      </div>

      <div class="flex justify-center items-center z-10">
        <a href="<?php echo $cta_btn_link ?: '#';?>">
        <button
          class="flex items-center justify-center p-4 md:p-6 gap-3 rounded-lg bg-[#3773C9] text-[#EBF1FA] text-right md:text-[28px] text-lg font-bold leading-[42px] font-[Cairo] hover:bg-[#00796B] transition-all duration-700 ease-in-out <?php echo $cta_btn_class ?: 'why-us-cta-btn'; ?> "
        >

                     
         <?php
if (isset($cta_btn_text) && !empty($cta_btn_text)) {
    echo $cta_btn_text;
} else {
           echo " ابدأ استيرادك الآن مع خبراء مؤهل";
}?>  
          <svg
            xmlns="http://www.w3.org/2000/svg"
            class="md:w-10 md:h-10 w-8 h-8"
            viewBox="0 0 41 40"
            fill="none"
          >
            <path
              fill-rule="evenodd"
              clip-rule="evenodd"
              d="M30.7748 4.60874L31.1998 4.66207C32.3232 4.81707 33.8098 5.0254 34.6515 5.86874C35.3415 6.55707 35.6065 7.67707 35.7648 8.67707L35.8582 9.3204C36.0682 10.8371 36.1232 12.8237 35.7648 15.0304C35.0582 19.3854 32.7398 24.5821 26.9182 28.6054C26.8865 28.9187 26.8848 29.2354 26.8915 29.5521L26.9082 30.0254C26.9348 30.7537 26.9615 31.4821 26.7582 32.1887C26.4415 33.2887 25.3132 34.0137 24.2582 34.5337L23.7415 34.7787L23.0748 35.0721C21.8282 35.6021 20.1448 36.1454 19.0898 35.0887C18.4565 34.4571 18.1965 33.5304 17.9848 32.6087L17.9065 32.2637C17.817 31.8284 17.7057 31.3979 17.5732 30.9737C17.4898 30.7293 17.3998 30.4821 17.3032 30.2321C17.1968 30.3627 17.0839 30.4878 16.9648 30.6071C16.3898 31.1821 15.5315 31.5837 14.8248 31.8654C14.0532 32.1704 13.1798 32.4371 12.3715 32.6571L11.9565 32.7671L11.1615 32.9654L10.4415 33.1321L9.57984 33.3154L9.0415 33.4204C8.77302 33.4701 8.49647 33.4538 8.23571 33.3728C7.97496 33.2918 7.73781 33.1486 7.54474 32.9555C7.35167 32.7624 7.20846 32.5253 7.12746 32.2645C7.04647 32.0038 7.03013 31.7272 7.07984 31.4587L7.22317 30.7404L7.47984 29.5771L7.6865 28.7271L7.84317 28.1271C8.06317 27.3204 8.32984 26.4471 8.6365 25.6771C8.9165 24.9687 9.31817 24.1104 9.89317 23.5354L10.0265 23.4071L9.91984 23.3637C9.63496 23.2555 9.34646 23.1572 9.05484 23.0687L8.59317 22.9271C7.4365 22.5771 6.19984 22.2004 5.4315 21.4304C4.49817 20.4987 4.81317 19.0804 5.26317 17.9004L5.4465 17.4437L5.7415 16.7771L5.9865 16.2604C6.5065 15.2071 7.2315 14.0787 8.3315 13.7621C8.91484 13.5954 9.5215 13.5854 10.1315 13.6021L10.4982 13.6137C10.9748 13.6304 11.4498 13.6487 11.9148 13.6037C15.9382 7.7804 21.1348 5.46207 25.4898 4.7554C27.2369 4.46886 29.0146 4.41953 30.7748 4.60874ZM14.4215 25.7337C14.1593 25.5394 13.8458 25.4263 13.5198 25.4085C13.1939 25.3907 12.87 25.4691 12.5882 25.6337L12.4048 25.7571L12.2498 25.8954L12.0415 26.1587C11.6082 26.7854 11.3615 27.6521 11.1698 28.4621L10.9898 29.2421L10.9048 29.5971L11.2232 29.5204L11.9198 29.3604C12.8832 29.1354 13.9515 28.8437 14.6082 28.2521C14.8937 27.9667 15.0659 27.5874 15.0929 27.1846C15.1199 26.7818 14.9998 26.383 14.7548 26.0621L14.6182 25.9054L14.5782 25.8671L14.4215 25.7337ZM26.3932 14.1104C26.0837 13.8008 25.7163 13.5552 25.3119 13.3876C24.9075 13.22 24.474 13.1337 24.0363 13.1336C23.5985 13.1336 23.165 13.2197 22.7606 13.3872C22.3561 13.5546 21.9886 13.8001 21.679 14.1096C21.3694 14.4191 21.1238 14.7865 20.9562 15.1909C20.7886 15.5953 20.7023 16.0287 20.7022 16.4665C20.7022 16.9042 20.7883 17.3377 20.9558 17.7422C21.1232 18.1466 21.3687 18.5141 21.6782 18.8237C22.3032 19.449 23.151 19.8003 24.0351 19.8005C24.9192 19.8006 25.7671 19.4496 26.3923 18.8246C27.0176 18.1995 27.3689 17.3517 27.3691 16.4677C27.3692 15.5836 27.0182 14.7356 26.3932 14.1104Z"
              fill="#EBF1FA"
            />
          </svg>
        </button>
        </a>
      </div>

      
          <div class="absolute left-0 bottom-0 ">
          <svg class="object-cover object-left w-auto h-auto largeScreen:block hidden" xmlns="http://www.w3.org/2000/svg" width="472" height="800" viewBox="0 0 472 800" fill="none">
            <g filter="url(#filter0_f_491_2356)">
              <path
                d="M-1464.68 1273.84C-1456.69 1266.31 -1445.66 1258.35 -1432 1251.34L-212.989 412.155L59.6063 706.336C17.963 793.389 -99.5412 961.462 -236.411 937.326C-407.499 907.156 -549.442 1159.48 -699.316 1378.47C-849.189 1597.46 -1015.05 1424.78 -1181.7 1294.48C-1287.58 1211.7 -1379.31 1224.33 -1432 1251.34L-1464.68 1273.84Z"
                fill="#93B3E2" />
            </g>
            <defs>
              <filter id="filter0_f_491_2356" x="-1876.47" y="0.355286" width="2347.88" height="1894.54"
                filterUnits="userSpaceOnUse" color-interpolation-filters="sRGB">
                <feFlood flood-opacity="0" result="BackgroundImageFix" />
                <feBlend mode="normal" in="SourceGraphic" in2="BackgroundImageFix" result="shape" />
                <feGaussianBlur stdDeviation="205.9" result="effect1_foregroundBlur_491_2356" />
              </filter>
            </defs>
          </svg>
          
          </div>




          <div class="absolute right-0 bottom-0 ">
          
          
            <svg class="object-cover object-right w-auto h-auto largeScreen:block hidden" xmlns="http://www.w3.org/2000/svg"
              width="505" height="961" viewBox="0 0 505 961" fill="none">
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