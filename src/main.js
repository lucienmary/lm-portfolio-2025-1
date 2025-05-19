// src/main.js
import Swiper from "swiper/bundle";
import "swiper/css/bundle"; // inclut core + navigation + pagination + scrollbar

document.addEventListener("DOMContentLoaded", () => {
  const el = document.querySelector(".swiper");
  if (!el) return;

  new Swiper(el, {
    direction: "horizontal",
    loop: true,
    navigation: {
      nextEl: ".swiper-button-next-nostyle",
      prevEl: ".swiper-button-prev-nostyle",
    },
    autoHeight: true,
    speed: 1200,
  });
});

document.addEventListener("DOMContentLoaded", () => {
  const parent = document.querySelector(".follow-cursor-wrapper");
  const follower = parent.querySelector(".follow-cursor");

  parent.addEventListener("mousemove", (e) => {
    const rect = parent.getBoundingClientRect();
    const x = e.clientX - rect.left - follower.offsetWidth / 2;
    const y = e.clientY - rect.top - follower.offsetHeight / 2;
    const under = document.elementFromPoint(e.clientX, e.clientY);
    const isLeft = !!under.closest(".swiper-button-prev-nostyle");

    follower.style.setProperty("--fc-x", `${x}px`);
    follower.style.setProperty("--fc-y", `${y}px`);
    follower.style.setProperty("--fc-r", isLeft ? "180deg" : "0deg");
    follower.classList.add("opacity-100");
  });

  parent.addEventListener("mouseleave", () => {
    follower.classList.remove("opacity-100");
  });
});
