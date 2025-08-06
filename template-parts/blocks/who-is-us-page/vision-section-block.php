 <section
      class="our-vision-section px-16 mob:px-4 mb-24 mob:mb-14"
      id="vision"
    >
      <div class="flex flex-col gap-8 items-center justify-center">
        <div
          class="flex flex-col gap-2 justify-center text-center items-center md:w-1/2 z-10"
        >
          <h3
            class="text-[#3773C9] md:text-[50px] text-[28px] leading-[150%] font-bold"
          >
   <?= get_field('section_title') ?: 'رؤيتنا'; ?>
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
        <div class="flex flex-row mob:flex-col-reverse gap-12 mob:gap-6">
          <div class="flex flex-col gap-3">
            <div class="w-full flex justify-center">
              <div class="md:h-60 md:w-60 h-[150px] w-[150px]">
                <img
   src="<?= get_field('first_image') ?? home_url(). '/wp-content/uploads/2025/04/Ellipse-1.jpg'; ?>"             
        alt="Main"
                  class="w-full h-full object-cover rounded-full"
                />
              </div>
            </div>
            <div class="w-full flex flex-row gap-11">
              <div class="w-full flex justify-center">
                <div class="md:h-48 md:w-48 h-[150px] w-[150px]">
                  <img
   src="<?= get_field('second_image') ?? home_url(). '/wp-content/uploads/2025/04/Ellipse-2.jpg'; ?>"             
                    alt="Main"
                    class="w-full h-full object-cover rounded-full"
                  />
                </div>
              </div>

              <div class="w-full flex pt-10 justify-center items-center">
                <div class="md:h-60 md:w-60 h-[150px] w-[150px]">
                  <img
   src="<?= get_field('third_image') ?? home_url(). '/wp-content/uploads/2025/04/Ellipse-3.jpg'; ?>"             
                    alt="Main"
                    class="w-full h-full object-cover rounded-full"
                  />
                </div>
              </div>
            </div>
          </div>

          <div
            class="flex flex-col gap-5 mob:gap-4 w-full justify-center items-center"
          >
            <h2
              class="md:text-[30px] text-[24px] mob:text-[18px] font-bold w-full text-[#19345A]"
            >
    <?= get_field('section_header') ?: 'نحو استيراد أسهل وأذكى'; ?>            </h2>

            <p
              class="text-[18px] md:text-[23px] text-[#295697] leading-[1.725] w-full"
            >
              <?= get_field('section_details') ?: 'نحن نؤمن بأن الاستيراد يجب أن يكون عملية سهلة وذكية. رؤيتنا هي تقديم حلول استيراد مبتكرة ومبسطة، مما يتيح لك التركيز على ما يهمك حقًا. نحن هنا لدعمك في كل خطوة على الطريق، من اختيار المنتجات إلى تسليمها بأمان.'; ?>
            </p>
          </div>
        </div>
      </div>
    </section>