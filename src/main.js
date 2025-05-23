import Swiper from "swiper/bundle";
import "swiper/css/bundle";

document.addEventListener("DOMContentLoaded", () => {
  const swiperEl = document.querySelector(".swiper");
  if (!swiperEl) return;
  const swiper = new Swiper(swiperEl, {
    direction: "horizontal",
    loop: true,
    autoHeight: true,
    speed: 1200,
    spaceBetween: 100,
    navigation: {
      nextEl: ".swiper-button-next-nostyle",
      prevEl: ".swiper-button-prev-nostyle",
    },
  });

  [
    { selector: ".swiper-button-prev-nostyle", method: "slidePrev" },
    { selector: ".swiper-button-next-nostyle", method: "slideNext" },
  ].forEach(({ selector, method }) => {
    const btn = document.querySelector(selector);
    if (!btn) return;
    btn.addEventListener("click", (e) => {
      const elems = document.elementsFromPoint(e.clientX, e.clientY);
      const link = elems.find((el) => el.tagName === "A");
      if (link) {
        e.preventDefault();
        e.stopPropagation();
        link.click();
      } else {
        swiper[method]();
      }
    });
  });

  const wrapper = document.querySelector(".follow-cursor-wrapper");
  const follower = wrapper?.querySelector(".follow-cursor");
  if (!wrapper || !follower) return;

  let posX = 0;
  let posY = 0;
  let targetX = 0;
  let targetY = 0;
  let rot = 0;
  let targetRot = 0;

  function animate() {
    posX += (targetX - posX) * 0.15;
    posY += (targetY - posY) * 0.15;
    rot += (targetRot - rot) * 0.15;

    follower.style.transform = `translate(${posX}px, ${posY}px) rotate(${rot}deg)`;

    requestAnimationFrame(animate);
  }
  requestAnimationFrame(animate);

  wrapper.addEventListener("mousemove", (e) => {
    const rect = wrapper.getBoundingClientRect();
    targetX = e.clientX - rect.left - follower.offsetWidth / 2;
    targetY = e.clientY - rect.top - follower.offsetHeight / 2;

    const elems = document.elementsFromPoint(e.clientX, e.clientY);
    const overLink = elems.some(
      (el) => el.tagName === "A" && el.href.includes("/project.php?slug")
    );
    const overPrev = elems.some((el) =>
      el.classList?.contains("swiper-button-prev-nostyle")
    );

    if (overLink) targetRot = -90;
    else if (overPrev) targetRot = 180;
    else targetRot = 0;

    follower.classList.add("opacity-100");
  });

  wrapper.addEventListener("mouseleave", () => {
    follower.classList.remove("opacity-100");
  });
});

document.querySelectorAll(".btn-magic").forEach((btn) => {
  btn.addEventListener("mousemove", function (e) {
    const rect = btn.getBoundingClientRect();
    const x = e.clientX - rect.left;
    const y = e.clientY - rect.top;
    btn.style.setProperty("--x", x + "px");
    btn.style.setProperty("--y", y + "px");
    btn.style.setProperty(
      "--hover-color",
      window.getComputedStyle(btn).borderColor
    );
  });
});

document.addEventListener('scroll', () => {
    if (window.scrollY > 100) {
        document.getElementById('header').classList.add('bg-header', 'backdrop-blur-sm', 'shadow-gray-800/30', 'shadow-[inset_0_-1px_15px]');
        document.getElementById('logo').classList.add('opacity-100');
    }else {
        document.getElementById('header').classList.remove('bg-header', 'backdrop-blur-sm', 'shadow-gray-800/30', 'shadow-[inset_0_-1px_15px]');
        document.getElementById('logo').classList.remove('opacity-100');
    }
})
