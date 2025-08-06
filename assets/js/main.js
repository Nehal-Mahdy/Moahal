document.addEventListener("DOMContentLoaded", function() {
  AOS.init();
});
const menuButton = document.getElementById("menu-button");
const mobileMenu = document.getElementById("mobile-menu");
const mobileMenuOverlay = document.getElementById("mobile-menu-overlay");
const closeButton = document.getElementById("close-menu");
const links = document.querySelectorAll(".link");
menuButton == null ? void 0 : menuButton.addEventListener("click", () => {
  mobileMenu.classList.remove("-translate-x-full");
  mobileMenu.classList.add("translate-x-0");
  mobileMenuOverlay.classList.remove("hidden");
});
const closeMenu = () => {
  mobileMenu.classList.add("-translate-x-full");
  mobileMenu.classList.remove("translate-x-0");
  mobileMenuOverlay.classList.add("hidden");
};
closeButton == null ? void 0 : closeButton.addEventListener("click", closeMenu);
mobileMenuOverlay == null ? void 0 : mobileMenuOverlay.addEventListener("click", closeMenu);
links == null ? void 0 : links.forEach((link) => link.addEventListener("click", closeMenu));
document.addEventListener("DOMContentLoaded", function() {
  var _a, _b;
  const navLinks = document.querySelectorAll(".nav-link");
  const mobileNavLinks = document.querySelectorAll(".mobile-nav-link");
  const footerLinks = document.querySelectorAll(".footer-link");
  const sections = document.querySelectorAll("section");
  const navbar = document.querySelector("nav");
  const navbarHeight = navbar ? navbar.offsetHeight + 20 : 100;
  const serviceLinks = document.querySelectorAll(".service-link");
  function removeActiveClasses() {
    navLinks.forEach((link) => link.classList.remove("active"));
    mobileNavLinks.forEach((link) => link.classList.remove("active-mob-nav"));
  }
  function isHomePage() {
    return window.location.pathname === "/moahal/wordpress/" || window.location.pathname === "/index.php";
  }
  serviceLinks.forEach((link) => {
    link.addEventListener("click", function(e) {
      console.log("Service link clicked");
      const targetId = this.getAttribute("href").substring(1);
      if (!isHomePage()) {
        window.location.href = "/moahal/wordpress/#" + targetId;
        return;
      }
    });
  });
  navLinks.forEach((link) => {
    link.addEventListener("click", function(e) {
      if (isHomePage() && this.getAttribute("href").includes("#")) {
        e.preventDefault();
      }
      const targetId = this.getAttribute("href").substring(1);
      const targetSection = document.getElementById(targetId);
      if (!isHomePage() && this.getAttribute("href").includes("#")) {
        window.location.href = "/moahal/wordpress/#" + targetId;
        return;
      }
      if (targetSection) {
        removeActiveClasses();
        this.classList.add("active");
        window.scrollTo({
          top: targetSection.offsetTop - navbarHeight,
          behavior: "smooth"
        });
      }
    });
  });
  footerLinks.forEach((link) => {
    link.addEventListener("click", function(e) {
      if (isHomePage() && this.getAttribute("href").includes("#")) {
        e.preventDefault();
      }
      const targetId = this.getAttribute("href").substring(1);
      const targetSection = document.getElementById(targetId);
      if (!isHomePage() && this.getAttribute("href").includes("#")) {
        window.location.href = "/moahal/wordpress/#" + targetId;
        return;
      }
      if (targetSection) {
        const isMobile = window.innerWidth <= 768;
        const offset = isMobile ? navbarHeight + 50 : navbarHeight;
        window.scrollTo({
          top: targetSection.offsetTop - offset,
          behavior: "smooth"
        });
      }
    });
  });
  mobileNavLinks.forEach((link) => {
    link.addEventListener("click", function(e) {
      if (isHomePage() && this.getAttribute("href").includes("#")) {
        e.preventDefault();
      }
      const targetId = this.getAttribute("href").substring(1);
      const targetSection = document.getElementById(targetId);
      if (!isHomePage() && this.getAttribute("href").includes("#")) {
        window.location.href = "/moahal/wordpress/#" + targetId;
        return;
      }
      if (targetSection) {
        removeActiveClasses();
        this.classList.add("active-mob-nav");
        window.scrollTo({
          top: targetSection.offsetTop - (navbarHeight + 30),
          // Extra padding for mobile
          behavior: "smooth"
        });
        closeMenu();
      }
    });
  });
  function setActiveNav() {
    var _a2, _b2;
    if (!isHomePage()) {
      return;
    }
    const isMobile = window.innerWidth <= 768;
    const offset = isMobile ? navbarHeight + 50 : navbarHeight;
    const scrollPosition = window.scrollY + offset + 5;
    let currentSectionId = null;
    sections.forEach((section) => {
      const sectionTop = section.offsetTop;
      const sectionHeight = section.offsetHeight;
      const sectionId = section.getAttribute("id");
      if (scrollPosition >= sectionTop && scrollPosition < sectionTop + sectionHeight) {
        currentSectionId = sectionId;
      }
    });
    if (currentSectionId) {
      removeActiveClasses();
      (_a2 = document.querySelector(`a[href="#${currentSectionId}"]`)) == null ? void 0 : _a2.classList.add("active");
      (_b2 = document.querySelector(`a[href="#${currentSectionId}"].mobile-nav-link`)) == null ? void 0 : _b2.classList.add("active-mob-nav");
    }
  }
  if (isHomePage()) {
    removeActiveClasses();
    (_a = document.querySelector(`a[href="#hero"]`)) == null ? void 0 : _a.classList.add("active");
    (_b = document.querySelector(`a[href="#hero"]`)) == null ? void 0 : _b.classList.add("active-mob-nav");
  }
  window.addEventListener("scroll", setActiveNav);
});
document.addEventListener("DOMContentLoaded", function() {
  const tabs = document.querySelectorAll(".tab-btn");
  const contents = document.querySelectorAll(".tab-content");
  tabs.forEach((tab) => {
    tab.addEventListener("click", function() {
      tabs.forEach((t) => t.classList.remove("active-tab"));
      contents.forEach((c) => c.classList.add("hidden"));
      this.classList.add("active-tab");
      const target = this.getAttribute("data-target");
      document.getElementById(target).classList.remove("hidden");
    });
  });
});
const headers = document.querySelectorAll(".import-accordion-header");
headers.forEach((header) => {
  header.addEventListener("click", () => {
    const body = header.nextElementSibling;
    const isOpen = body.classList.contains("open");
    document.querySelectorAll(".import-accordion-body").forEach((el) => {
      if (el !== body) {
        el.style.maxHeight = "0px";
        el.classList.remove("open");
      }
    });
    if (isOpen) {
      body.style.maxHeight = "0px";
      body.classList.remove("open");
      setTimeout(() => {
        const offset = 220;
        const y = header.getBoundingClientRect().top + window.scrollY - offset;
        window.scrollTo({ top: y, behavior: "smooth" });
      }, 300);
    } else {
      body.classList.add("open");
      body.style.maxHeight = body.scrollHeight + "px";
      setTimeout(() => {
        const offset = 220;
        const y = header.getBoundingClientRect().top + window.scrollY - offset;
        window.scrollTo({ top: y, behavior: "smooth" });
      }, 400);
    }
  });
});
window.addEventListener("load", () => {
  document.querySelectorAll(".import-accordion-body.open").forEach((body) => {
    body.style.maxHeight = body.scrollHeight + "px";
  });
});
document.addEventListener("DOMContentLoaded", function() {
  const swiperContainer = document.querySelector(".mySwiper");
  let hasTriggered = false;
  let hasStopped = false;
  const swiper = new Swiper(".mySwiper", {
    loop: false,
    autoplay: false,
    // Start autoplay manually
    navigation: {
      nextEl: ".swiper-button-next",
      prevEl: ".swiper-button-prev"
    },
    on: {
      slideChange: function() {
        if (!hasStopped && this.activeIndex === 2) {
          hasStopped = true;
          setTimeout(() => {
            swiper.slideTo(0);
            swiper.autoplay.stop();
          }, 1e3);
        }
      }
    }
  });
  const observer = new IntersectionObserver(
    (entries) => {
      if (entries[0].isIntersecting && !hasTriggered) {
        hasTriggered = true;
        swiper.params.autoplay = {
          delay: 1e3,
          disableOnInteraction: false
        };
        swiper.autoplay.start();
      }
    },
    { threshold: 0.5 }
    // 50% of swiper visible
  );
  if (swiperContainer) {
    observer.observe(swiperContainer);
  }
});
document.querySelectorAll(".accordion-toggle").forEach((button) => {
  button.addEventListener("click", () => {
    const parent = button.closest(".accordion");
    parent.classList.toggle("accordion-open");
  });
});
const notificationButtons = document.querySelectorAll(".notification-button");
const notificationMenu = document.getElementById("notification-menu");
const notificationOverlay = document.getElementById("notification-overlay");
const closeNotifications = document.getElementById("close-notifications");
notificationButtons.forEach((button) => {
  button.addEventListener("click", () => {
    notificationMenu.classList.remove("translate-x-full");
    notificationOverlay.classList.remove("hidden");
  });
});
closeNotifications.addEventListener("click", () => {
  notificationMenu.classList.add("translate-x-full");
  notificationOverlay.classList.add("hidden");
});
notificationOverlay.addEventListener("click", () => {
  notificationMenu.classList.add("translate-x-full");
  notificationOverlay.classList.add("hidden");
});
//# sourceMappingURL=main.js.map
