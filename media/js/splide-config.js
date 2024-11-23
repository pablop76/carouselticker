const { gap,arrows,pagination,perpage,perpagemedium,perpagelarge,perpagesmall,speed } = Joomla.getOptions('mod_carouselticker.vars');

window.addEventListener("load", (event) => {
  const splide = new Splide(".splide", {
    type: "loop",
    drag: "free",
    focus: "center",
    perPage: perpage,
    breakpoints: {
      992: {
        perPage: perpagemedium,
      },
      640: {
        perPage: perpagelarge,
      },
      380: {
        perPage: perpagesmall,
      },
    },
    gap: Number(gap),
    arrows: Number(arrows),
    pagination: Number(pagination),
    autoScroll: {
      speed: Number(speed),
    },
  }).mount(window.splide.Extensions);

  splide.mount();
});