  
  <?php
     $title           = get_field('title');
    $description     = get_field('description');
    $faqs= get_field('faqs');
    $cta_btn_text= get_field('section_cta_button_text');
    $cta_btn_link= get_field('section_cta_button_url');
    $cta_btn_class= get_field('section_cta_button_class');
  ?>
  
  <section id="faqs" class=" mt-24">


      
            <div class="relative grid grid-cols-1 md:grid-cols-2 items-center justify-center mb-28 mob:mb-8">
              <!-- Services Title and Line -->
  <div class="absolute left-0 top-0 ">
  
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

              
              <div class="flex flex-col gap-8 md:ps-16 px-16 mob:px-4">
                <div class="flex flex-col gap-2 justify-center text-center items-center md:w-1/2 z-10">
                  <h3 class="text-[#3773C9] md:text-[50px] text-[28px] leading-[150%] font-bold">

                        <?php
if (isset($title) && !empty($title)) {
    echo $title;
} else {
    echo "FAQS";
}
?>
                  </h3>
            
                  <svg class="px-5 mob:w-1/2" xmlns="http://www.w3.org/2000/svg" width="386" height="41" viewBox="0 0 386 41"
                    fill="none">
                    <path fill-rule="evenodd" clip-rule="evenodd"
                      d="M291.012 0.164153C236.744 0.630243 221.228 0.933445 191.118 2.11702C159.914 3.34358 137.583 4.57308 102.151 7.01539C93.9374 7.58157 85.1424 8.11889 74.8318 8.68429C36.9564 10.7612 29.5861 11.3146 17.342 13.0004C11.2754 13.8358 6.02883 14.414 3.0883 14.5716C0.473935 14.7115 0 14.7996 0 15.1456C0 15.4513 4.18131 15.7192 6.46831 15.5599C7.2879 15.503 9.50839 15.3634 11.4029 15.2502C13.2975 15.1368 17.4667 14.8324 20.6678 14.5737C28.2059 13.9644 31.8251 13.7722 44.7803 13.2936C66.5592 12.489 83.0115 11.7157 103.22 10.5471C110.668 10.1163 120.556 9.54445 125.195 9.27618C160.374 7.24128 203.345 5.42675 229.603 4.86764C261.467 4.18882 360.388 3.58869 358.717 4.08402C358.056 4.28047 346.736 5.74154 339.95 6.50652C333.717 7.20928 323.303 8.22291 310.492 9.37371C304.417 9.91967 296.078 10.6752 291.963 11.0528C276.501 12.4715 271.408 12.9115 262.624 13.5883C222.155 16.7062 195.423 19.423 158.216 24.1993C136.1 27.0382 117.973 30.2974 97.7436 35.0719C86.2423 37.7864 85.1217 38.2686 86.2537 40.0162C86.9904 41.1533 92.7935 41.3006 104.498 40.4793C125.888 38.9786 145.989 37.8147 165.461 36.9492C177.675 36.4064 179.293 36.3153 191.712 35.4726C196.35 35.1581 204.368 34.698 209.529 34.4508L218.913 34.0012L206.441 33.824C187.541 33.5553 167.268 33.5716 160.591 33.8608C138.487 34.8185 126.464 35.5556 106.825 37.1568C102.144 37.5385 98.1954 37.818 98.0496 37.778C96.6432 37.3906 128.122 31.5372 143.139 29.3938C177.038 24.5549 211.947 20.9445 265.593 16.7287C270.493 16.3437 280.328 15.5014 287.449 14.8571C294.57 14.2126 305.795 13.198 312.393 12.602C337.789 10.3084 345.356 9.45417 369.764 6.12481C385.396 3.99237 385.48 3.97413 385.906 2.57173C386.374 1.02981 385.122 0.330184 381.534 0.130207C378.126 -0.0599581 314.312 -0.036021 291.012 0.164153ZM219.925 33.8455C220.221 33.8924 220.648 33.8907 220.875 33.8416C221.102 33.7925 220.861 33.7541 220.338 33.7562C219.815 33.7584 219.63 33.7986 219.925 33.8455Z"
                      fill="#E19B1B" />
                  </svg>
                </div>
            
                <p class="md:w-3/4 text-[#2C5CA1] text-center md:text-start md:text-[30px] text-[18px] font-semibold">
<!-- أسئلتك، إجاباتنا – كل ما تحتاج إلى معرفته عن الاستيراد     -->
                  <?php
if (isset($description) && !empty($description)) {
    echo $description;
} else {
    echo "أسئلتك، إجاباتنا – كل ما تحتاج إلى معرفته عن الاستيراد";
} ?>
            </p>
              </div>
            
              
              <!-- Image of the Guy -->
              <div class="mt-20 z-10 hidden justify-end md:flex items-center">
                
                <img src="<?php echo home_url(); ?>/wp-content/uploads/2025/04/image_fx_-2-Photoroom-1.png" alt="Confident Guy"
                  class="w-auto h-auto" />
              </div>

              
            </div>

 
  <div class="flex flex-col gap-8 md:gap-16 px-16 mob:px-4">

<?php 
$faqs = get_field('faqs'); 

if ($faqs): // Check if there are any FAQs
?>


        <?php foreach ($faqs as $index => $faq): // Loop through each FAQ and keep track of the index ?>

  <div class="<?php echo ($index === 0) ? 'accordion-open' : ''; ?> border border-[#3773C9] rounded-lg md:py-12 md:px-7 py-4 px-3 bg-white accordion">
    
  
  <button class=" flex justify-between items-center w-full text-lg font-medium text-gray-900 accordion-toggle">
        <div class="flex items-center gap-3">
          <div class="icon">
            <svg xmlns="http://www.w3.org/2000/svg" class="w-8 h-8 icon-close" viewBox="0 0 50 50" fill="none">
              <path
                d="M39.5837 27.0788H27.0837V39.5788H22.917V27.0788H10.417V22.9121H22.917V10.4121H27.0837V22.9121H39.5837V27.0788Z"
                fill="#132846" />
            </svg>
            <svg xmlns="http://www.w3.org/2000/svg" class="w-8 h-8 hidden icon-open" viewBox="0 0 50 50" fill="none">
              <path d="M39.5837 27.0788H10.417V22.9121H39.5837V27.0788Z" fill="#009688" />
            </svg>
          </div>
          <span class="text-[#132846] leading-[130%]  md:text-start md:text-[30px] text-[18px] font-semibold">
 <?php echo esc_html($faq['question']); ?>
          </span>
        </div>
      </button>
      <div class="accordion-content  ">
        <p class="p-4 text-[#214579] md:pt-12 leading-[170%] pt-8 md:text-start md:text-[30px] text-[16px] ">
       
<?php echo esc_html($faq['answer']); ?>
        </p>
      </div>
    </div>

<?php endforeach; ?>
  
<?php else: ?>
 <!-- Item 1 -->
    <div class="accordion-open border border-[#3773C9] rounded-lg md:py-12 md:px-7 py-4 px-3 bg-white accordion">
      <button class=" flex justify-between items-center w-full text-lg font-medium text-gray-900 accordion-toggle">
        <div class="flex items-center gap-3">
          <div class="icon">
            <svg xmlns="http://www.w3.org/2000/svg" class="w-8 h-8 icon-close" viewBox="0 0 50 50" fill="none">
              <path
                d="M39.5837 27.0788H27.0837V39.5788H22.917V27.0788H10.417V22.9121H22.917V10.4121H27.0837V22.9121H39.5837V27.0788Z"
                fill="#132846" />
            </svg>
            <svg xmlns="http://www.w3.org/2000/svg" class="w-8 h-8 hidden icon-open" viewBox="0 0 50 50" fill="none">
              <path d="M39.5837 27.0788H10.417V22.9121H39.5837V27.0788Z" fill="#009688" />
            </svg>
          </div>
          <span class="text-[#132846] leading-[130%]  md:text-start md:text-[30px] text-[18px] font-semibold">ما الذي يميز خدمات مؤهل عن شركات الاستيراد الأخرى؟</span>
        </div>
      </button>
      <div class="accordion-content  ">
        <p class="p-4 text-[#214579] md:pt-12 leading-[170%] pt-8 md:text-start md:text-[30px] text-[16px] ">
          في مؤهل نحن أكثر من مجرد وسيط استيراد، بل نقدم حلولًا متكاملة تشمل البحث عن الموردين، التفاوض على الأسعار، فحص الجودة،
          الشحن الدولى، والتخليص الجمركي، وإدارة سلاسل التوريد. كما نمتلك فريقًا متخصصًا في الصين لضمان أفضل جودة بأفضل سعر، مما
          يجعلنا شريكًا استراتيجيًا لنجاح أعمالك
        </p>
      </div>
    </div>
  
    <!-- Item 2 -->
    <div class="border border-[#3773C9] rounded-lg md:py-12 md:px-7 py-4 px-3 bg-white accordion">
      <button class=" flex justify-between items-center w-full text-lg font-medium text-gray-900 accordion-toggle">
        <div class="flex items-center gap-3">
          <div class="icon">
            <svg xmlns="http://www.w3.org/2000/svg" class="w-8 h-8 icon-close" viewBox="0 0 50 50" fill="none">
              <path
                d="M39.5837 27.0788H27.0837V39.5788H22.917V27.0788H10.417V22.9121H22.917V10.4121H27.0837V22.9121H39.5837V27.0788Z"
                fill="#132846" />
            </svg>
            <svg xmlns="http://www.w3.org/2000/svg" class="w-8 h-8 hidden icon-open" viewBox="0 0 50 50" fill="none">
              <path d="M39.5837 27.0788H10.417V22.9121H39.5837V27.0788Z" fill="#009688" />
            </svg>
          </div>
          <span class="text-[#132846] leading-[130%]  md:text-start md:text-[30px] text-[18px] font-semibold"> كيف يمكنني التأكد من جودة المنتجات المستوردة؟
            </span>
        </div>
      </button>
      <div class="accordion-content">
        <p class="p-4 text-[#214579] md:pt-12 leading-[170%] pt-8 md:text-start md:text-[30px] text-[16px]">
       
      نحن نعمل فقط مع مصانع موثوقة ونوفر خدمة الفحص والجودة قبل الشحن، لضمان استلامك منتجات مطابقة للمواصفات المطلوبة. كما
      نوفر تقارير فحص شاملة وصورًا وفيديوهات توضيحية لضمان الشفافية الكاملة قبل شحن الطلبية
        </p>
      </div>
    </div>
    

    <!-- Item 3 -->
    <div class="border border-[#3773C9] rounded-lg md:py-12 md:px-7 py-4 px-3 bg-white accordion">
      <button class=" flex justify-between items-center w-full text-lg font-medium text-gray-900 accordion-toggle">
        <div class="flex items-center gap-3">
          <div class="icon">
            <svg xmlns="http://www.w3.org/2000/svg" class="w-8 h-8 icon-close" viewBox="0 0 50 50" fill="none">
              <path
                d="M39.5837 27.0788H27.0837V39.5788H22.917V27.0788H10.417V22.9121H22.917V10.4121H27.0837V22.9121H39.5837V27.0788Z"
                fill="#132846" />
            </svg>
            <svg xmlns="http://www.w3.org/2000/svg" class="w-8 h-8 hidden icon-open" viewBox="0 0 50 50" fill="none">
              <path d="M39.5837 27.0788H10.417V22.9121H39.5837V27.0788Z" fill="#009688" />
            </svg>
          </div>
          <span class="text-[#132846] leading-[130%]  md:text-start md:text-[30px] text-[18px] font-semibold">هل تساعدون في
            اختيار الموردين والمصانع المناسبة؟
          </span>
        </div>
      </button>
      <div class="accordion-content">
        <p class="p-4 text-[#214579] md:pt-12 leading-[170%] pt-8 md:text-start md:text-[30px] text-[16px]">
          نعم، فريقنا في الصين لديه خبرة واسعة في البحث عن الموردين الموثوقين، والتفاوض للحصول على أفضل جودة بأفضل الأسعار.
          كما
          نتأكد من امتلاك المصنع جميع الشهادات المطلوبة وامتثاله لمواصفات السوق المستهدف، مما يضمن لك عملية استيراد آمنة
          وناجحة
        </p>
      </div>
    </div>


      <!-- Item 4 -->
      <div class="border border-[#3773C9] rounded-lg md:py-12 md:px-7 py-4 px-3 bg-white accordion">
        <button class=" flex justify-between items-center w-full text-lg font-medium text-gray-900 accordion-toggle">
          <div class="flex items-center gap-3">
            <div class="icon">
              <svg xmlns="http://www.w3.org/2000/svg" class="w-8 h-8 icon-close" viewBox="0 0 50 50" fill="none">
                <path
                  d="M39.5837 27.0788H27.0837V39.5788H22.917V27.0788H10.417V22.9121H22.917V10.4121H27.0837V22.9121H39.5837V27.0788Z"
                  fill="#132846" />
              </svg>
              <svg xmlns="http://www.w3.org/2000/svg" class="w-8 h-8 hidden icon-open" viewBox="0 0 50 50" fill="none">
                <path d="M39.5837 27.0788H10.417V22.9121H39.5837V27.0788Z" fill="#009688" />
              </svg>
            </div>
            <span class="text-[#132846] leading-[130%]  md:text-start md:text-[30px] text-[18px] font-semibold">  

              كيف تضمنون وصول الشحنات في الوقت المحدد؟
            </span>
          </div>
        </button>
        <div class="accordion-content">
          <p class="p-4 text-[#214579] md:pt-12 leading-[170%] pt-8 md:text-start md:text-[30px] text-[16px]">
          لدينا شراكات مع أفضل شركات الشحن العالمية، ونعمل على تخطيط عمليات الشحن والتخليص الجمركي بكفاءة لضمان وصول شحناتك في
          أسرع وقت ممكن. كما نوفر تحديثات دورية عن حالة الشحنات حتى تصل إلى بابك بأمان
          </p>
        </div>
      </div>


        <!-- Item 5 -->
        <div class="border border-[#3773C9] rounded-lg md:py-12 md:px-7 py-4 px-3 bg-white accordion">
          <button class=" flex justify-between items-center w-full text-lg font-medium text-gray-900 accordion-toggle">
            <div class="flex items-center gap-3">
              <div class="icon">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-8 h-8 icon-close" viewBox="0 0 50 50" fill="none">
                  <path
                    d="M39.5837 27.0788H27.0837V39.5788H22.917V27.0788H10.417V22.9121H22.917V10.4121H27.0837V22.9121H39.5837V27.0788Z"
                    fill="#132846" />
                </svg>
                <svg xmlns="http://www.w3.org/2000/svg" class="w-8 h-8 hidden icon-open" viewBox="0 0 50 50" fill="none">
                  <path d="M39.5837 27.0788H10.417V22.9121H39.5837V27.0788Z" fill="#009688" />
                </svg>
              </div>
              <span class="text-[#132846] leading-[130%]  md:text-start md:text-[30px] text-[18px] font-semibold">هل يمكنكم
                المساعدة في عمليات التخليص الجمركي؟
              </span>
            </div>
          </button>
          <div class="accordion-content">
            <p class="p-4 text-[#214579] md:pt-12 leading-[170%] pt-8 md:text-start md:text-[30px] text-[16px]">
              نعم، نحن نقدم خدمات التخليص الجمركي باحترافية، ونتولى جميع الإجراءات الورقية والمستندات المطلوبة، مما يضمن مرور
              شحنتك
              بسهولة وسرعة دون أي تعقيدات
            </p>
          </div>
        </div>

        <?php endif; // End of FAQs check ?>


</div>


<div class="flex justify-center items-center py-20 px-16 mob:px-4">
<a href="<?php echo $cta_btn_link ?: '#';?>">
<button
    class="flex items-center justify-center p-4 md:p-6 gap-3 rounded-lg bg-[#3773C9] text-[#EBF1FA] text-right md:text-[28px] text-lg font-bold leading-[42px] font-[Cairo] hover:bg-[#00796B] transition-all duration-700 ease-in-out <?php echo $cta_btn_class ?: 'faqs-cta-btn'; ?> ">
 
    <?php
if (isset($cta_btn_text) && !empty($cta_btn_text)) {
    echo $cta_btn_text;
} else {
    echo " لم تجد إجابتك؟ تواصل معنا الآن";
}?>  
    
    <svg xmlns="http://www.w3.org/2000/svg" class="md:w-8 md:h-8 w-6 h-6" viewBox="0 0 32 32" fill="none">
      <path fill-rule="evenodd" clip-rule="evenodd"
        d="M25.3337 4C26.3945 4 27.4119 4.42143 28.1621 5.17157C28.9122 5.92172 29.3337 6.93913 29.3337 8V21.3333C29.3337 22.3942 28.9122 23.4116 28.1621 24.1618C27.4119 24.9119 26.3945 25.3333 25.3337 25.3333H9.77766L5.33366 28.6667C4.23499 29.4907 2.66699 28.7067 2.66699 27.3333V8C2.66699 6.93913 3.08842 5.92172 3.83857 5.17157C4.58871 4.42143 5.60613 4 6.66699 4H25.3337ZM14.667 16H10.667C10.3134 16 9.97423 16.1405 9.72418 16.3905C9.47413 16.6406 9.33366 16.9797 9.33366 17.3333C9.33366 17.687 9.47413 18.0261 9.72418 18.2761C9.97423 18.5262 10.3134 18.6667 10.667 18.6667H14.667C15.0206 18.6667 15.3598 18.5262 15.6098 18.2761C15.8598 18.0261 16.0003 17.687 16.0003 17.3333C16.0003 16.9797 15.8598 16.6406 15.6098 16.3905C15.3598 16.1405 15.0206 16 14.667 16ZM21.3337 10.6667H10.667C10.3272 10.667 10.0003 10.7972 9.75317 11.0305C9.50605 11.2638 9.35735 11.5826 9.33743 11.9219C9.31751 12.2611 9.42789 12.5952 9.64601 12.8558C9.86413 13.1164 10.1735 13.2839 10.511 13.324L10.667 13.3333H21.3337C21.6735 13.333 22.0004 13.2028 22.2475 12.9695C22.4946 12.7362 22.6433 12.4174 22.6632 12.0781C22.6831 11.7389 22.5728 11.4048 22.3546 11.1442C22.1365 10.8836 21.8271 10.7161 21.4897 10.676L21.3337 10.6667Z"
        fill="#EBF1FA" />
    </svg>
  </button>
  </a> 
</div>

    </section>