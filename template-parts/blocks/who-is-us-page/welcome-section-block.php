<section class="welcome-message px-16 mob:px-4 my-24 mob:my-14">
  <div class="flex flex-row">
    <div class="flex flex-col gap-7 mob:gap-4 w-full">
      <div class="z-10">
        <h2 class="md:w-3/4 text-center md:text-right md:text-[30px] text-[24px] mob:text-[18px] font-bold w-full text-[#19345A]">
          <?php echo get_field('section_title') ?: 'مرحبًا بك في مؤهل – شريكك الموثوق في عالم الاستيراد!'; ?>
        </h2>
      </div>

      <p class="text-[18px] md:text-[23px] text-[#295697] leading-[1.725] w-full">
        <?php echo get_field('section_details') ?: 'نحن متخصصون في تقديم حلول استيراد مبتكرة للأفراد والشركات، مما يتيح لك استيراد المنتجات بسهولة وأمان. سواء كنت تحتاج إلى منتج شخصي، كميات تجارية، أو خطوط إنتاج متطورة، فنحن هنا لدعمك. بفضل خبراتنا الواسعة وعلاقاتنا القوية مع الموردين حول العالم، نضمن لك استيرادًا موثوقًا بأسعار تنافسية، مع متابعة دقيقة لكل خطوة حتى وصول المنتج إلى مستودعك.'; ?>
      </p>

      <div class="flex items-end mob:justify-center">
        <a href="<?php echo get_field('button_url') ?: '#'; ?>" 
           class="flex items-center justify-center mob:px-16 mob:py-2 py-4 px-8 gap-3 rounded-lg bg-[#3773C9] text-[#EBF1FA] text-right md:text-[24px] text-base font-bold leading-[42px] font-[Cairo] hover:bg-[#00796B] transition-all duration-700 ease-in-out <?= get_field('cta_button_class') ? ' ' . esc_attr(get_field('cta_button_class')) : '' ?>">
          <?php echo get_field('button_text') ?: 'ابدأ استيرادك معنا اليوم'; ?>
          <svg xmlns="http://www.w3.org/2000/svg" class="md:w-10 md:h-10 w-6 h-6" viewBox="0 0 33 32" fill="none">
            <path fill-rule="evenodd" clip-rule="evenodd"
              d="M25.8337 4C26.8945 4 27.9119 4.42143 28.6621 5.17157C29.4122 5.92172 29.8337 6.93913 29.8337 8V21.3333C29.8337 22.3942 29.4122 23.4116 28.6621 24.1618C27.9119 24.9119 26.8945 25.3333 25.8337 25.3333H10.2777L5.83366 28.6667C4.73499 29.4907 3.16699 28.7067 3.16699 27.3333V8C3.16699 6.93913 3.58842 5.92172 4.33857 5.17157C5.08871 4.42143 6.10613 4 7.16699 4H25.8337ZM15.167 16H11.167C10.8134 16 10.4742 16.1405 10.2242 16.3905C9.97413 16.6406 9.83366 16.9797 9.83366 17.3333C9.83366 17.687 9.97413 18.0261 10.2242 18.2761C10.4742 18.5262 10.8134 18.6667 11.167 18.6667H15.167C15.5206 18.6667 15.8598 18.5262 16.1098 18.2761C16.3598 18.0261 16.5003 17.687 16.5003 17.3333C16.5003 16.9797 16.3598 16.6406 16.1098 16.3905C15.8598 16.1405 15.5206 16 15.167 16ZM21.8337 10.6667H11.167C10.8272 10.667 10.5003 10.7972 10.2532 11.0305C10.0061 11.2638 9.85735 11.5826 9.83743 11.9219C9.81751 12.2611 9.92789 12.5952 10.146 12.8558C10.3641 13.1164 10.6735 13.2839 11.011 13.324L11.167 13.3333H21.8337C22.1735 13.333 22.5004 13.2028 22.7475 12.9695C22.9946 12.7362 23.1433 12.4174 23.1632 12.0781C23.1831 11.7389 23.0728 11.4048 22.8546 11.1442C22.6365 10.8836 22.3271 10.7161 21.9897 10.676L21.8337 10.6667Z"
              fill="#EBF1FA" />
          </svg>
        </a>
      </div>
    </div>

    <div class="largeScreen:flex hidden relative w-3/4 justify-end mt-40">
      <div class="w-96 h-64 rounded-xl z-0">
        <img 
        src="<?php echo get_field('second_image') ?:  home_url(). '/wp-content/uploads/2025/04/aerial-view-cargo-ship-cargo-container-harbor-1-1.png'; ?>" 
             alt="Main" 
             class="w-full h-full object-cover rounded-xl" />
      </div>
      <div class="w-96 h-64 rounded-xl -top-[10.5rem] right-[2rem] z-10 absolute">
        <img src="<?php echo get_field('first_image') ?: home_url(). '/wp-content/uploads/2025/04/container-terminal-wharf-transport-1.png'; ?>" 
             alt="Overlay" 
             class="w-full h-full object-cover rounded-xl" />
      </div>
    </div>
  </div>
</section>
