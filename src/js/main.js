document.addEventListener('DOMContentLoaded', function () {
  AOS.init();
});

// console.log("AOS initialized");

// main menu / mobile menu
const menuButton = document.getElementById('menu-button');
const mobileMenu = document.getElementById('mobile-menu');
const mobileMenuOverlay = document.getElementById('mobile-menu-overlay');
const closeButton = document.getElementById('close-menu');
const links = document.querySelectorAll('.link');

menuButton?.addEventListener('click', () => {
  mobileMenu.classList.remove('-translate-x-full');
  mobileMenu.classList.add('translate-x-0');
  mobileMenuOverlay.classList.remove('hidden');
});

const closeMenu = () => {
  mobileMenu.classList.add('-translate-x-full');
  mobileMenu.classList.remove('translate-x-0');
  mobileMenuOverlay.classList.add('hidden');
};

closeButton?.addEventListener('click', closeMenu);
mobileMenuOverlay?.addEventListener('click', closeMenu);
links?.forEach((link) => link.addEventListener('click', closeMenu));

document.addEventListener('DOMContentLoaded', function () {
  const navLinks = document.querySelectorAll('.nav-link');
  const mobileNavLinks = document.querySelectorAll('.mobile-nav-link'); // Added for mobile
  const footerLinks = document.querySelectorAll('.footer-link'); // Added for footer
  const sections = document.querySelectorAll('section');
  const navbar = document.querySelector('nav');
  const navbarHeight = navbar ? navbar.offsetHeight + 20 : 100; // Extra padding

  const serviceLinks =document.querySelectorAll('.service-link');
  // Function to remove 'active' from all links (both mobile and desktop)
  function removeActiveClasses() {
    navLinks.forEach((link) => link.classList.remove('active'));
    mobileNavLinks.forEach((link) => link.classList.remove('active-mob-nav'));
  }
 function isHomePage() {
    return window.location.pathname === '/moahal/wordpress/' || window.location.pathname === '/index.php'; 
  }

  // smooth scrolling on click for service links
  serviceLinks.forEach((link) => {
    
    link.addEventListener('click', function (e) {
      console.log("Service link clicked"); // Debugging line
      
      const targetId = this.getAttribute('href').substring(1);
      if (!isHomePage()) {
        window.location.href = '/moahal/wordpress/' + '#' + targetId;
        return;
      }
     
    });
  });

  // Smooth scrolling on click for desktop navigation
  navLinks.forEach((link) => {
    link.addEventListener('click', function (e) {
      
if (isHomePage() && this.getAttribute('href').includes('#')) {

  e.preventDefault(); 
      }
      
      const targetId = this.getAttribute('href').substring(1);
      const targetSection = document.getElementById(targetId);
      if (!isHomePage() && this.getAttribute('href').includes('#')) {
    window.location.href = '/moahal/wordpress/' + '#' + targetId;
      return;
  }
      
      if (targetSection) {
        removeActiveClasses();
        this.classList.add('active');

        // Smooth scroll with offset
        window.scrollTo({
          top: targetSection.offsetTop - navbarHeight,
          behavior: 'smooth',
        });
      }
    });
  });

  //    // Smooth scrolling on click for footer links (if needed)
  footerLinks.forEach((link) => {
    link.addEventListener('click', function (e) {
if (isHomePage() && this.getAttribute('href').includes('#')) {

  e.preventDefault(); 
      }
            const targetId = this.getAttribute('href').substring(1);
      const targetSection = document.getElementById(targetId);
  if (!isHomePage() && this.getAttribute('href').includes('#')) {
    window.location.href = '/moahal/wordpress/' + '#' + targetId;
      return;
  }
      if (targetSection) {
        const isMobile = window.innerWidth <= 768; // Adjust breakpoint as needed
        const offset = isMobile ? navbarHeight + 50 : navbarHeight;

        window.scrollTo({
          top: targetSection.offsetTop - offset,
          behavior: 'smooth',
        });
      }
    });
  });
  // Smooth scrolling on click for mobile navigation (same as desktop)
  mobileNavLinks.forEach((link) => {
    link.addEventListener('click', function (e) {
if (isHomePage() && this.getAttribute('href').includes('#')) {

  e.preventDefault(); 
      }
      const targetId = this.getAttribute('href').substring(1);
      const targetSection = document.getElementById(targetId);
  if (!isHomePage() && this.getAttribute('href').includes('#')) {
    window.location.href = '/moahal/wordpress/' + '#' + targetId;
      return;
  }
      if (targetSection) {
        //   console.log("Mobile link clicked"); // Debugging line
        removeActiveClasses();
        this.classList.add('active-mob-nav');

        // console.log(this);
        // Smooth scroll with offset
        window.scrollTo({
          top: targetSection.offsetTop - (navbarHeight + 30), // Extra padding for mobile
          behavior: 'smooth',
        });

        // Close mobile menu
        closeMenu();
      }
    });
  });

  // Detect scroll and highlight active menu item (both desktop and mobile)
  function setActiveNav() {
     if (!isHomePage()) {
       return; // Skip if not on the home page
    }
    const isMobile = window.innerWidth <= 768;
    const offset = isMobile ? navbarHeight + 50 : navbarHeight; // Match scroll offset in clicks
    const scrollPosition = window.scrollY + offset + 5; // Small buffer to avoid edge misfires

    let currentSectionId = null;

    sections.forEach((section) => {
      const sectionTop = section.offsetTop;
      const sectionHeight = section.offsetHeight;
      const sectionId = section.getAttribute('id');

      if (
        scrollPosition >= sectionTop &&
        scrollPosition < sectionTop + sectionHeight
      ) {
        currentSectionId = sectionId;
      }
    });

    if (currentSectionId) {
      removeActiveClasses();
      document
        .querySelector(`a[href="#${currentSectionId}"]`)
        ?.classList.add('active');
      document
        .querySelector(`a[href="#${currentSectionId}"].mobile-nav-link`)
        ?.classList.add('active-mob-nav');
    }
  }

  // Ensure "الرئيسية" is active by default
  if (isHomePage()) {
      removeActiveClasses();

    document.querySelector(`a[href="#hero"]`)?.classList.add('active');
    document.querySelector(`a[href="#hero"]`)?.classList.add('active-mob-nav');
  }

  window.addEventListener('scroll', setActiveNav);
});

// purpose section tabs

document.addEventListener('DOMContentLoaded', function () {
  const tabs = document.querySelectorAll('.tab-btn');
  const contents = document.querySelectorAll('.tab-content');

  tabs.forEach((tab) => {
    tab.addEventListener('click', function () {
      // Remove active styles from all tabs
      tabs.forEach((t) => t.classList.remove('active-tab'));
      // Hide all tab contents
      contents.forEach((c) => c.classList.add('hidden'));

      // Add active styles to clicked tab
      this.classList.add('active-tab');

      // Show the targeted tab content
      const target = this.getAttribute('data-target');
      document.getElementById(target).classList.remove('hidden');
    });
  });
});

// purpose section tabs for mobile
const headers = document.querySelectorAll('.import-accordion-header');

headers.forEach((header) => {
  header.addEventListener('click', () => {
    const body = header.nextElementSibling;
    const isOpen = body.classList.contains('open');

    // Close all other bodies
    document.querySelectorAll('.import-accordion-body').forEach((el) => {
      if (el !== body) {
        el.style.maxHeight = '0px';
        el.classList.remove('open');
      }
    });

    // Toggle clicked one
    if (isOpen) {
      body.style.maxHeight = '0px';
      body.classList.remove('open');

      // Scroll to header (even if collapsing)
      setTimeout(() => {
        const offset = 220;
        const y = header.getBoundingClientRect().top + window.scrollY - offset;
        window.scrollTo({ top: y, behavior: 'smooth' });
      }, 300);
    } else {
      body.classList.add('open');
      body.style.maxHeight = body.scrollHeight + 'px';

      // Delay scroll slightly longer to allow full collapse + expand transition
      setTimeout(() => {
        const offset = 220;
        const y = header.getBoundingClientRect().top + window.scrollY - offset;
        window.scrollTo({ top: y, behavior: 'smooth' });
      }, 400); // Slightly longer to account for full layout update
    }
  });
});

// Ensure any open body on load is fully shown
window.addEventListener('load', () => {
  document.querySelectorAll('.import-accordion-body.open').forEach((body) => {
    body.style.maxHeight = body.scrollHeight + 'px';
  });
});

// swiper initialization for how it works section
document.addEventListener('DOMContentLoaded', function () {
  const swiperContainer = document.querySelector('.mySwiper');
  let hasTriggered = false;
  let hasStopped = false;

  const swiper = new Swiper('.mySwiper', {
    loop: false,
    autoplay: false, // Start autoplay manually
    navigation: {
      nextEl: '.swiper-button-next',
      prevEl: '.swiper-button-prev',
    },
    on: {
      slideChange: function () {
        // Stop autoplay at third slide, go back to first, and stop forever
        if (!hasStopped && this.activeIndex === 2) {
          hasStopped = true;

          setTimeout(() => {
            swiper.slideTo(0); // Return to first slide
            swiper.autoplay.stop(); // Stop autoplay forever
          }, 1000);
        }
      },
    },
  });

  const observer = new IntersectionObserver(
    (entries) => {
      if (entries[0].isIntersecting && !hasTriggered) {
        hasTriggered = true;

        // Start autoplay manually once visible
        swiper.params.autoplay = {
          delay: 1000,
          disableOnInteraction: false,
        };
        swiper.autoplay.start();
      }
    },
    { threshold: 0.5 } // 50% of swiper visible
  );

  if (swiperContainer) {
    observer.observe(swiperContainer);
  }
});

//  faqs section accordion
document.querySelectorAll('.accordion-toggle').forEach((button) => {
  button.addEventListener('click', () => {
    const parent = button.closest('.accordion');
    parent.classList.toggle('accordion-open');
  });
});

// notification menu
const notificationButtons = document.querySelectorAll('.notification-button');
const notificationMenu = document.getElementById('notification-menu');
const notificationOverlay = document.getElementById('notification-overlay');
const closeNotifications = document.getElementById('close-notifications');

notificationButtons.forEach((button) => {
  button.addEventListener('click', () => {
    notificationMenu.classList.remove('translate-x-full');
    notificationOverlay.classList.remove('hidden');
  });
});

closeNotifications.addEventListener('click', () => {
  notificationMenu.classList.add('translate-x-full');
  notificationOverlay.classList.add('hidden');
});

// Optional: close panel when clicking the overlay
notificationOverlay.addEventListener('click', () => {
  notificationMenu.classList.add('translate-x-full');
  notificationOverlay.classList.add('hidden');
});
