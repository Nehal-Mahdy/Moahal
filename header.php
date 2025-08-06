<?php
require_once get_template_directory() . '/includes/class-moahal-walker-nav-menu.php';

/**
 * The header
 *
 * @package Bathe
 */

?>

<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<!-- Google Tag Manager -->
<script type="text/javascript" async="" src="https://www.googletagmanager.com/gtag/js?id=GT-PL9D4CP7&amp;l=dataLayer&amp;cx=c&amp;gtm=45He54p1v9218066826za200&amp;tag_exp=102887800~103051953~103077950~103106314~103106316~103116025~103200001"></script><script type="text/javascript" async="" src="https://www.googletagmanager.com/gtag/js?id=G-99GQVESHRW&amp;l=dataLayer&amp;cx=c&amp;gtm=45He54p1v9218066826za200&amp;tag_exp=102887800~103051953~103077950~103106314~103106316~103116025~103200001"></script><script src="https://connect.facebook.net/signals/config/685274933876745?v=2.9.199&amp;r=stable&amp;domain=moahalksa.com&amp;hme=53363064397d256bdf8f213dd9a9e18c291fc2ed691e4233e4a9e488f248f817&amp;ex_m=73%2C128%2C113%2C117%2C64%2C5%2C106%2C72%2C18%2C100%2C92%2C53%2C57%2C182%2C203%2C210%2C206%2C207%2C209%2C31%2C107%2C55%2C80%2C208%2C177%2C180%2C204%2C205%2C190%2C139%2C43%2C195%2C192%2C193%2C36%2C152%2C17%2C52%2C199%2C198%2C141%2C20%2C42%2C1%2C45%2C68%2C69%2C70%2C74%2C96%2C19%2C16%2C99%2C95%2C94%2C114%2C54%2C116%2C41%2C115%2C32%2C97%2C28%2C178%2C181%2C149%2C13%2C14%2C15%2C7%2C8%2C27%2C24%2C25%2C60%2C65%2C67%2C78%2C56%2C105%2C108%2C29%2C79%2C11%2C9%2C83%2C50%2C23%2C110%2C109%2C111%2C102%2C12%2C22%2C3%2C40%2C77%2C21%2C161%2C89%2C135%2C49%2C48%2C101%2C76%2C0%2C98%2C59%2C87%2C35%2C30%2C85%2C86%2C91%2C39%2C6%2C93%2C84%2C46%2C34%2C37%2C90%2C4%2C88%2C248%2C175%2C126%2C164%2C157%2C2%2C38%2C66%2C44%2C112%2C47%2C82%2C71%2C118%2C63%2C62%2C33%2C103%2C61%2C58%2C51%2C81%2C75%2C26%2C104%2C10%2C119" async=""></script><script async="" src="https://connect.facebook.net/en_US/fbevents.js"></script><script async="" src="https://www.googletagmanager.com/gtm.js?id=GTM-P4W7Z52S"></script><script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
})(window,document,'script','dataLayer','GTM-P4W7Z52S');</script>
<!-- End Google Tag Manager -->




<meta charset="<?php bloginfo( 'charset' ); ?>" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <!-- Preconnect for Google Fonts -->
     <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Cairo:wght@200..1000&display=swap"
      rel="stylesheet"
    />
    
    <!-- External Stylesheets -->
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
    />
   
    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css"
    />

<link rel="icon" href="<?php echo home_url(); ?>/wp-content/uploads/2025/04/Frame-7342.png" type="image/png">

    
<link href="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.js"></script>

<?php wp_head(); ?>





<!-- Meta Pixel Code -->
<script>
!function(f,b,e,v,n,t,s)
{if(f.fbq)return;n=f.fbq=function(){n.callMethod?
n.callMethod.apply(n,arguments):n.queue.push(arguments)};
if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';
n.queue=[];t=b.createElement(e);t.async=!0;
t.src=v;s=b.getElementsByTagName(e)[0];
s.parentNode.insertBefore(t,s)}(window, document,'script',
'https://connect.facebook.net/en_US/fbevents.js');
fbq('init', '685274933876745');
fbq('track', 'PageView');
</script>
<noscript><img height="1" width="1" style="display:none"
src="https://www.facebook.com/tr?id=685274933876745&ev=PageView&noscript=1"
/></noscript>
<!-- End Meta Pixel Code -->
</head>

  <body class=" font-cairo">
 
<header class=" font-cairo">
	 <nav>
      <section class=" fixed top-0 left-0 z-50 w-full bg-white">
       
        <div
          class="md:container mx-auto flex items-center justify-between md:px-0 px-4 py-2 md:py-0 gap-4 md:gap-14 bg-white"
        >
          <div class="flex items-center">
			<?php
  /**
   * Get custom logo URL
   * @link https://developer.wordpress.org/reference/functions/the_custom_logo/
   */
  $custom_logo_id = get_theme_mod( 'custom_logo' );
  $image = wp_get_attachment_image_src( $custom_logo_id, 'full');
  ?>
            <img
			src="<?php echo $image[0]; ?>"
			alt="Logo"
              class="md:w-full md:h-full h-[37px] w-[90px]"
            />
          </div>

          <button class="text-2xl cursor-pointer flex items-center gap-2 md:hidden relative" >
           
          <svg
              class="notification-button"
              xmlns="http://www.w3.org/2000/svg"
              width="25"
              height="25"
              viewBox="0 0 25 25"
              fill="none"
            >
              <path
                d="M15.595 19.6446C15.4874 20.3887 15.1154 21.0691 14.5471 21.5612C13.9787 22.0534 13.2521 22.3242 12.5003 22.3242C11.7485 22.3242 11.0219 22.0534 10.4535 21.5612C9.8852 21.0691 9.5132 20.3887 9.40568 19.6446H15.595ZM12.5003 2.67857C14.474 2.67839 16.3701 3.44707 17.7864 4.82158C19.2028 6.19609 20.0279 8.06829 20.0869 10.0411V10.2687H20.0905V13.9402L21.353 17.1937C21.3869 17.2818 21.4098 17.3729 21.4217 17.467L21.4307 17.6071C21.4308 17.8902 21.3259 18.1633 21.1362 18.3735C20.9465 18.5836 20.6855 18.7159 20.4039 18.7446L20.2878 18.75H4.71014C4.53409 18.7501 4.36038 18.7096 4.20257 18.6315C4.04477 18.5535 3.90713 18.44 3.80039 18.3C3.69366 18.16 3.62071 17.9972 3.58724 17.8244C3.55378 17.6515 3.5607 17.4733 3.60746 17.3036L3.64496 17.1929L4.90925 13.9393V10.2696C4.90901 9.2727 5.1052 8.28548 5.48661 7.36439C5.86801 6.44329 6.42716 5.60636 7.1321 4.90142C7.83704 4.19648 8.67397 3.63733 9.59506 3.25593C10.5162 2.87452 11.5034 2.67834 12.5003 2.67857Z"
                fill="#3268B5"
              />
            </svg>
<?php 
$notifications = get_field('site_notifications', 'option');
if ($notifications): 
    $count = count($notifications); 
?>
    <span class="notification-count absolute -top-1 -right-1 bg-red-500 text-white text-xs rounded-full w-4 h-4 flex items-center justify-center">
        <?php echo $count; ?>
    </span>
<?php endif; ?>

          
          
          <svg
          id="menu-button"
              xmlns="http://www.w3.org/2000/svg"
              width="36"
              height="36"
              viewBox="0 0 36 36"
              fill="none"
            >
              <path
                fill-rule="evenodd"
                clip-rule="evenodd"
                d="M5.20215 23.8333H31.4521V26.75H5.20215V23.8333ZM5.20215 16.5417H31.4521V19.4583H5.20215V16.5417ZM5.20215 9.25H31.4521V12.1667H5.20215V9.25Z"
                fill="#2C5CA1"
              />
            </svg>
          </button>

                 <?php
wp_nav_menu(array(
    'theme_location' => 'primary',
    'menu_class' => 'hidden items-center text-[#132846] font-medium tab:text-[18px] text-[20px] py-7 md:flex md:justify-between md:w-full', // Tailwind classes for styling
    'container' => false, 
    'walker' => new Moahal_Walker_Nav_Menu(), 
    'fallback_cb' => false, 
));
?>
 <div class="hidden md:block relative cursor-pointer">
            <svg
              class="notification-button"
              xmlns="http://www.w3.org/2000/svg"
              width="30"
              height="30"
              viewBox="0 0 50 50"
              fill="none"
            >
              <path
                d="M31.1889 39.2893C30.9739 40.7774 30.2299 42.1383 29.0932 43.1225C27.9565 44.1067 26.5033 44.6485 24.9997 44.6485C23.4961 44.6485 22.0428 44.1067 20.9061 43.1225C19.7694 42.1383 19.0254 40.7774 18.8104 39.2893H31.1889ZM24.9997 5.35714C28.947 5.35677 32.7392 6.89415 35.5719 9.64317C38.4046 12.3922 40.0549 16.1366 40.1729 20.0821V20.5375H40.18V27.8804L42.705 34.3875C42.7729 34.5637 42.8187 34.7458 42.8425 34.9339L42.8604 35.2143C42.8606 35.7805 42.6508 36.3267 42.2714 36.747C41.892 37.1673 41.3701 37.4318 40.8068 37.4893L40.5747 37.5H9.4193C9.06719 37.5003 8.71978 37.4192 8.40417 37.2631C8.08856 37.107 7.81328 36.8801 7.59981 36.6C7.38634 36.32 7.24044 35.9945 7.17351 35.6488C7.10658 35.3031 7.12042 34.9466 7.21395 34.6071L7.28895 34.3857L9.81752 27.8786V20.5393C9.81705 18.5454 10.2094 16.571 10.9722 14.7288C11.735 12.8866 12.8533 11.2127 14.2632 9.80284C15.6731 8.39296 17.347 7.27467 19.1892 6.51186C21.0313 5.74905 23.0058 5.35667 24.9997 5.35714Z"
                fill="#3268B5"
              />
            </svg>
<?php 
$notifications = get_field('site_notifications', 'option');
if ($notifications): 
    $count = count($notifications); 
?>
    <span class="notification-count absolute -top-1 -right-1 bg-red-500 text-white text-xs rounded-full w-5 h-5 flex items-center justify-center">
        <?php echo $count; ?>
    </span>
<?php endif; ?>

          </div>
        </div>
      </section>


            <!-- Notification Overlay -->
      <div
        id="notification-overlay"
        class="fixed top-0 left-0 z-50 hidden w-full h-screen bg-black bg-opacity-30"
      ></div>

      <!-- Notification Panel -->
      <div
        id="notification-menu"
        class="fixed pt-5 top-0 right-0 h-full mob:w-full w-1/2 bg-white shadow-lg z-50 transform translate-x-full transition-transform duration-300 ease-in-out"
      >
        <div class="px-6 flex">
          <button
            id="close-notifications"
            class="text-2xl font-bold text-[#132846]"
          >
            <svg
              xmlns="http://www.w3.org/2000/svg"
              class="md:w-12 md:h-12 w-8 h-8"
              viewBox="0 0 50 50"
              fill="none"
            >
              <path
                fill-rule="evenodd"
                clip-rule="evenodd"
                d="M24.9998 29.4208L36.0477 40.4687C36.634 41.055 37.4291 41.3843 38.2582 41.3843C39.0872 41.3843 39.8823 41.055 40.4686 40.4687C41.0548 39.8825 41.3842 39.0874 41.3842 38.2583C41.3842 37.4293 41.0548 36.6342 40.4686 36.0479L29.4165 25L40.4665 13.9521C40.7566 13.6618 40.9868 13.3172 41.1437 12.938C41.3007 12.5588 41.3814 12.1524 41.3813 11.742C41.3812 11.3316 41.3003 10.9252 41.1432 10.546C40.986 10.1669 40.7557 9.82243 40.4655 9.53229C40.1752 9.24215 39.8306 9.01203 39.4514 8.85506C39.0722 8.69809 38.6658 8.61735 38.2553 8.61744C37.8449 8.61754 37.4385 8.69847 37.0594 8.85562C36.6803 9.01277 36.3358 9.24306 36.0457 9.53333L24.9998 20.5812L13.9519 9.53333C13.6638 9.23473 13.3191 8.9965 12.9379 8.83255C12.5567 8.66859 12.1467 8.58219 11.7317 8.57839C11.3168 8.57459 10.9053 8.65347 10.5212 8.81041C10.137 8.96736 9.78801 9.19924 9.49446 9.49251C9.20091 9.78579 8.9687 10.1346 8.81139 10.5186C8.65408 10.9025 8.57482 11.314 8.57823 11.7289C8.58164 12.1439 8.66765 12.554 8.83125 12.9353C8.99484 13.3166 9.23275 13.6616 9.53108 13.95L20.5832 25L9.53316 36.05C9.23483 36.3384 8.99693 36.6834 8.83333 37.0647C8.66973 37.446 8.58372 37.8561 8.58031 38.2711C8.5769 38.686 8.65617 39.0975 8.81348 39.4814C8.97078 39.8654 9.20299 40.2142 9.49654 40.5075C9.79009 40.8008 10.1391 41.0326 10.5232 41.1896C10.9074 41.3465 11.3189 41.4254 11.7338 41.4216C12.1488 41.4178 12.5588 41.3314 12.94 41.1675C13.3211 41.0035 13.6659 40.7653 13.954 40.4667L24.9998 29.4208Z"
                fill="#295697"
              />
            </svg>
          </button>
        </div>
        <h2
          class="md:text-[40px] -mt-9 text-2xl text-[#19345A] text-center font-bold leading-[75px]"
        >
          التنبيهات والإعلانات
        </h2>

        <div class="md:px-16 px-4 space-y-8 md:py-16 py-8  overflow-y-auto max-h-[calc(100vh-150px)] hide-scrollbar">
        
        <?php
$notifications = get_field('site_notifications', 'option');

        if ($notifications && count($notifications) > 0):

?>
  <?php foreach ($notifications as $note): ?>
    <div class="flex gap-3 rounded-[8px] border p-6
      <?php
        // Set border and bg based on notification type
        switch ($note['notification_type']) {
          case 'warning':
            echo 'border-[#FFB020] bg-[#FFF4E5]';
            break;
          case 'error':
            echo 'border-[#F04438] bg-[#FEE4E2]';
            break;
          default:
            echo 'border-[#3773C9] bg-[#EBF1FA]';
            break;
        }
      ?>">

<img
              src="<?php echo home_url(); ?>/wp-content/uploads/2025/04/Frame-7342.png"
              class="md:w-12 md:h-12 w-8 h-8"
              alt=""
              srcset=""
            />
      <div class="flex flex-col gap-3">
        <h3 class="text-[#1E293B] text-base md:text-[18px] font-bold leading-[18px]">
          <?= esc_html($note['notification_title']) ?>
        </h3>
        <p class="text-[#1E293B] text-[14px] md:text-[16px] leading-[18px] font-normal">
          <?= esc_html($note['notification_message']) ?>
        </p>

        
        <?php if (!empty($note['date'])): ?>
          <div class="flex items-center gap-2 text-sm text-[#555]">
             <svg
                  xmlns="http://www.w3.org/2000/svg"
                  width="18"
                  height="18"
                  viewBox="0 0 18 18"
                  fill="none"
                >
                  <path
                    d="M6.375 10.5C6.62364 10.5 6.8621 10.4012 7.03791 10.2254C7.21373 10.0496 7.3125 9.81114 7.3125 9.5625C7.3125 9.31386 7.21373 9.0754 7.03791 8.89959C6.8621 8.72377 6.62364 8.625 6.375 8.625C6.12636 8.625 5.8879 8.72377 5.71209 8.89959C5.53627 9.0754 5.4375 9.31386 5.4375 9.5625C5.4375 9.81114 5.53627 10.0496 5.71209 10.2254C5.8879 10.4012 6.12636 10.5 6.375 10.5ZM6.375 13.125C6.62364 13.125 6.8621 13.0262 7.03791 12.8504C7.21373 12.6746 7.3125 12.4361 7.3125 12.1875C7.3125 11.9389 7.21373 11.7004 7.03791 11.5246C6.8621 11.3488 6.62364 11.25 6.375 11.25C6.12636 11.25 5.8879 11.3488 5.71209 11.5246C5.53627 11.7004 5.4375 11.9389 5.4375 12.1875C5.4375 12.4361 5.53627 12.6746 5.71209 12.8504C5.8879 13.0262 6.12636 13.125 6.375 13.125ZM9.9375 9.5625C9.9375 9.81114 9.83873 10.0496 9.66291 10.2254C9.4871 10.4012 9.24864 10.5 9 10.5C8.75136 10.5 8.5129 10.4012 8.33709 10.2254C8.16127 10.0496 8.0625 9.81114 8.0625 9.5625C8.0625 9.31386 8.16127 9.0754 8.33709 8.89959C8.5129 8.72377 8.75136 8.625 9 8.625C9.24864 8.625 9.4871 8.72377 9.66291 8.89959C9.83873 9.0754 9.9375 9.31386 9.9375 9.5625ZM9 13.125C9.24864 13.125 9.4871 13.0262 9.66291 12.8504C9.83873 12.6746 9.9375 12.4361 9.9375 12.1875C9.9375 11.9389 9.83873 11.7004 9.66291 11.5246C9.4871 11.3488 9.24864 11.25 9 11.25C8.75136 11.25 8.5129 11.3488 8.33709 11.5246C8.16127 11.7004 8.0625 11.9389 8.0625 12.1875C8.0625 12.4361 8.16127 12.6746 8.33709 12.8504C8.5129 13.0262 8.75136 13.125 9 13.125ZM12.5625 9.5625C12.5625 9.81114 12.4637 10.0496 12.2879 10.2254C12.1121 10.4012 11.8736 10.5 11.625 10.5C11.3764 10.5 11.1379 10.4012 10.9621 10.2254C10.7863 10.0496 10.6875 9.81114 10.6875 9.5625C10.6875 9.31386 10.7863 9.0754 10.9621 8.89959C11.1379 8.72377 11.3764 8.625 11.625 8.625C11.8736 8.625 12.1121 8.72377 12.2879 8.89959C12.4637 9.0754 12.5625 9.31386 12.5625 9.5625Z"
                    fill="#295697"
                  />
                  <path
                    fill-rule="evenodd"
                    clip-rule="evenodd"
                    d="M6 2.4375C6.14918 2.4375 6.29226 2.49676 6.39775 2.60225C6.50324 2.70774 6.5625 2.85082 6.5625 3V3.5625H11.4375V3C11.4375 2.85082 11.4968 2.70774 11.6023 2.60225C11.7077 2.49676 11.8508 2.4375 12 2.4375C12.1492 2.4375 12.2923 2.49676 12.3977 2.60225C12.5032 2.70774 12.5625 2.85082 12.5625 3V3.5685C12.6765 3.5715 12.7827 3.577 12.8812 3.585C13.1662 3.6075 13.4332 3.6585 13.686 3.7875C14.0742 3.98525 14.3897 4.30083 14.5875 4.689C14.7165 4.94175 14.7675 5.20875 14.79 5.49375C14.8125 5.7675 14.8125 6.10125 14.8125 6.5025V12.2475C14.8125 12.6488 14.8125 12.9825 14.79 13.2562C14.7675 13.5412 14.7165 13.8082 14.5875 14.061C14.3899 14.4491 14.0746 14.7646 13.6868 14.9625C13.4333 15.0915 13.1662 15.1425 12.8812 15.165C12.6075 15.1875 12.2738 15.1875 11.8733 15.1875H6.1275C5.72625 15.1875 5.3925 15.1875 5.11875 15.165C4.83375 15.1425 4.56675 15.0915 4.314 14.9625C3.92606 14.7651 3.61051 14.4501 3.4125 14.0625C3.2835 13.809 3.2325 13.542 3.21 13.257C3.1875 12.9833 3.1875 12.6495 3.1875 12.249V6.5025C3.1875 6.10125 3.1875 5.7675 3.21 5.49375C3.2325 5.20875 3.2835 4.94175 3.4125 4.689C3.61025 4.30083 3.92583 3.98525 4.314 3.7875C4.56675 3.6585 4.83375 3.6075 5.11875 3.585C5.21725 3.577 5.3235 3.5715 5.4375 3.5685V3C5.4375 2.92613 5.45205 2.85299 5.48032 2.78474C5.50859 2.71649 5.55002 2.65449 5.60225 2.60225C5.65449 2.55002 5.7165 2.50859 5.78474 2.48032C5.85299 2.45205 5.92613 2.4375 6 2.4375ZM5.4375 4.875V4.6935C5.36165 4.69583 5.28588 4.70008 5.21025 4.70625C4.995 4.7235 4.89225 4.755 4.82475 4.7895C4.64806 4.87943 4.50443 5.02306 4.4145 5.19975C4.38 5.26725 4.3485 5.37 4.33125 5.58525C4.31325 5.80725 4.3125 6.09525 4.3125 6.525V6.9375H13.6875V6.525C13.6875 6.096 13.6875 5.80725 13.6688 5.58525C13.6515 5.37 13.62 5.26725 13.5855 5.19975C13.4956 5.02306 13.3519 4.87943 13.1752 4.7895C13.1077 4.755 13.005 4.7235 12.789 4.70625C12.7136 4.7001 12.6381 4.69585 12.5625 4.6935V4.875C12.5625 5.02418 12.5032 5.16726 12.3977 5.27275C12.2923 5.37824 12.1492 5.4375 12 5.4375C11.8508 5.4375 11.7077 5.37824 11.6023 5.27275C11.4968 5.16726 11.4375 5.02418 11.4375 4.875V4.6875H6.5625V4.875C6.5625 5.02418 6.50324 5.16726 6.39775 5.27275C6.29226 5.37824 6.14918 5.4375 6 5.4375C5.85082 5.4375 5.70774 5.37824 5.60225 5.27275C5.49676 5.16726 5.4375 5.02418 5.4375 4.875ZM13.6875 7.6875H4.3125V12.225C4.3125 12.654 4.3125 12.9427 4.33125 13.164C4.3485 13.38 4.38 13.4827 4.4145 13.5502C4.5045 13.7272 4.64775 13.8705 4.82475 13.9605C4.89225 13.995 4.995 14.0265 5.21025 14.0438C5.43225 14.0618 5.72025 14.0625 6.15 14.0625H11.85C12.279 14.0625 12.5677 14.0625 12.789 14.0438C13.005 14.0265 13.1077 13.995 13.1752 13.9605C13.3519 13.8706 13.4956 13.7269 13.5855 13.5502C13.62 13.4827 13.6515 13.38 13.6688 13.164C13.6868 12.9427 13.6875 12.654 13.6875 12.225V7.6875Z"
                    fill="#295697"
                  />
                  <path
                    fill-rule="evenodd"
                    clip-rule="evenodd"
                    d="M7.3125 5.8125C7.3125 5.66332 7.37176 5.52024 7.47725 5.41475C7.58274 5.30926 7.72582 5.25 7.875 5.25H10.125C10.2742 5.25 10.4173 5.30926 10.5227 5.41475C10.6282 5.52024 10.6875 5.66332 10.6875 5.8125C10.6875 5.96168 10.6282 6.10476 10.5227 6.21025C10.4173 6.31574 10.2742 6.375 10.125 6.375H7.875C7.72582 6.375 7.58274 6.31574 7.47725 6.21025C7.37176 6.10476 7.3125 5.96168 7.3125 5.8125Z"
                    fill="#295697"
                  />
                </svg>

          <span><?= esc_html($note['date']) ?></span>
          </div>
        <?php endif; ?>
    

                 <?php if (!empty($note['live'])): ?>
          <div class="flex items-center gap-2 text-sm text-[#555]">
           
      <svg
                  xmlns="http://www.w3.org/2000/svg"
                  width="14"
                  height="17"
                  viewBox="0 0 14 17"
                  fill="none"
                >
                  <path
                    fill-rule="evenodd"
                    clip-rule="evenodd"
                    d="M7.25 1.50241C9.04021 1.50241 10.7571 2.21357 12.023 3.47944C13.2888 4.74531 14 6.4622 14 8.25241C14 10.5579 12.743 12.4449 11.4185 13.7987C10.7568 14.4677 10.0347 15.0743 9.2615 15.6107L8.942 15.8282L8.792 15.9279L8.50925 16.1079L8.25725 16.2617L7.94525 16.4432C7.73348 16.564 7.49384 16.6276 7.25 16.6276C7.00616 16.6276 6.76652 16.564 6.55475 16.4432L6.24275 16.2617L5.85275 16.0217L5.70875 15.9279L5.40125 15.7232C4.56712 15.1588 3.79018 14.5142 3.0815 13.7987C1.757 12.4442 0.5 10.5579 0.5 8.25241C0.5 6.4622 1.21116 4.74531 2.47703 3.47944C3.7429 2.21357 5.45979 1.50241 7.25 1.50241ZM7.25 3.00241C5.85761 3.00241 4.52226 3.55553 3.53769 4.5401C2.55312 5.52467 2 6.86002 2 8.25241C2 9.99391 2.954 11.5224 4.15325 12.7494C4.6689 13.2714 5.22624 13.7505 5.81975 14.1819L6.16325 14.4264C6.27425 14.5039 6.381 14.5759 6.4835 14.6424L6.776 14.8299L7.03325 14.9867L7.25 15.1134L7.59125 14.9117L7.8665 14.7392C8.013 14.6462 8.16975 14.5419 8.33675 14.4264L8.68025 14.1819C9.27376 13.7505 9.8311 13.2714 10.3468 12.7494C11.546 11.5232 12.5 9.99391 12.5 8.25241C12.5 6.86002 11.9469 5.52467 10.9623 4.5401C9.97774 3.55553 8.64239 3.00241 7.25 3.00241ZM7.25 5.25241C8.04565 5.25241 8.80871 5.56848 9.37132 6.13109C9.93393 6.6937 10.25 7.45676 10.25 8.25241C10.25 9.04806 9.93393 9.81112 9.37132 10.3737C8.80871 10.9363 8.04565 11.2524 7.25 11.2524C6.45435 11.2524 5.69129 10.9363 5.12868 10.3737C4.56607 9.81112 4.25 9.04806 4.25 8.25241C4.25 7.45676 4.56607 6.6937 5.12868 6.13109C5.69129 5.56848 6.45435 5.25241 7.25 5.25241ZM7.25 6.75241C6.85218 6.75241 6.47064 6.91045 6.18934 7.19175C5.90804 7.47306 5.75 7.85459 5.75 8.25241C5.75 8.65024 5.90804 9.03177 6.18934 9.31307C6.47064 9.59438 6.85218 9.75241 7.25 9.75241C7.64782 9.75241 8.02936 9.59438 8.31066 9.31307C8.59196 9.03177 8.75 8.65024 8.75 8.25241C8.75 7.85459 8.59196 7.47306 8.31066 7.19175C8.02936 6.91045 7.64782 6.75241 7.25 6.75241Z"
                    fill="#295697"
                  />
                </svg>

          <span><?= esc_html($note['live']) ?></span>
          </div>
        <?php endif; ?>


<?php if (!empty($note['image_or_video'])): 
    $mediaUrl = $note['image_or_video'];
    $isYouTube = strpos($mediaUrl, 'youtube') !== false;
?>
    <?php if ($isYouTube): ?>
        <div class="relative w-full max-w-3xl mx-auto bg-black rounded-lg overflow-hidden">
            <iframe 
                id="customVideo" 
                class="w-full"
                style="height: 400px;" 
                src="<?= esc_url($mediaUrl) ?>" 
                frameborder="0" 
                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" 
                allowfullscreen>
            </iframe>
        </div>
    <?php else: ?>
        <img
            src="<?= esc_url($mediaUrl) ?>"
            class="w-full h-auto"
            alt="Media"
        />
    <?php endif; ?>
<?php endif; ?>


 



        <p  class="text-[#475569] text-[12px] leading-[18px] font-normal text-right" dir="ltr">
                2 min ago
              </p>
        
      </div>
    </div>
  <?php endforeach; ?>

<?php else: ?>
  <div class="flex flex-col items-center justify-center h-full py-16">
    <svg xmlns="http://www.w3.org/2000/svg" class="w-16 h-16 mb-4 text-blue-100" fill="none" viewBox="0 0 48 48">
        <circle cx="24" cy="24" r="22" stroke="#E5E7EB" stroke-width="3" fill="#F3F4F6"/>
        <path d="M24 16v8m0 4h.01" stroke="#3773C9" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"/>
    </svg>
    <p class="text-[#3773C9] text-xl font-semibold mt-2">لا توجد تنبيهات حالياً</p>
    <span class="text-gray-400 text-sm mt-1">تابعنا لمعرفة آخر التنبيهات والإعلانات</span>
</div>
  


<?php endif; ?>


   
        </div>
      </div>



  <div class="md:hidden">
    <div id="mobile-menu-overlay" class="fixed top-0 left-0 z-50 hidden w-full h-screen bg-black bg-opacity-30"></div>
    
    <ul id="mobile-menu"
        class="fixed font-medium text-[#132846] text-[20px] top-0 left-0 z-50 flex flex-col w-2/3 h-screen gap-4 py-4 pe-4 ps-8 transition-transform -translate-x-full bg-[#EBF1FA] shadow-lg">
        <!-- Close Button -->
        <button id="close-menu" class="self-end text-2xl pe-[6px] pt-[18px]">
            <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 32 32" fill="none">
                <path d="M16.0001 17.8667L9.46673 24.4C9.22229 24.6444 8.91118 24.7667 8.5334 24.7667C8.15562 24.7667 7.84451 24.6444 7.60006 24.4C7.35562 24.1556 7.2334 23.8444 7.2334 23.4667C7.2334 23.0889 7.35562 22.7778 7.60006 22.5333L14.1334 16L7.60006 9.46667C7.35562 9.22223 7.2334 8.91111 7.2334 8.53334C7.2334 8.15556 7.35562 7.84445 7.60006 7.6C7.84451 7.35556 8.15562 7.23334 8.5334 7.23334C8.91118 7.23334 9.22229 7.35556 9.46673 7.6L16.0001 14.1333L22.5334 7.6C22.7778 7.35556 23.089 7.23334 23.4667 7.23334C23.8445 7.23334 24.1556 7.35556 24.4001 7.6C24.6445 7.84445 24.7667 8.15556 24.7667 8.53334C24.7667 8.91111 24.6445 9.22223 24.4001 9.46667L17.8667 16L24.4001 22.5333C24.6445 22.7778 24.7667 23.0889 24.7667 23.4667C24.7667 23.8444 24.6445 24.1556 24.4001 24.4C24.1556 24.6444 23.8445 24.7667 23.4667 24.7667C23.089 24.7667 22.7778 24.6444 22.5334 24.4L16.0001 17.8667Z" fill="#132846" />
            </svg>
        </button>

        <?php
            wp_nav_menu(array(
                'theme_location' => 'primary', 
                'menu_class' => '', 
                'container' => false, 
                'walker' => new Moahal_Mobile_Walker_Nav_Menu(),  // Mobile menu walker
                'items_wrap' => '%3$s', 
                'fallback_cb' => false, 
            ));
        ?>
    </ul>
</div>


      <div class="md:h-[57px] h-0"></div>
    </nav>

</header>

<div class="">
	<main id="primary" class="grow" role="main">

