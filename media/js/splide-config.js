const { 
  gap,
  arrows,
  pagination,
  perpage,
  perpagemedium,
  perpagelarge,
  perpagesmall,
  speed,
  ratioimagevalue,
  ratioimagevaluemedium,
  ratioimagevaluelarge,
  ratioimagevaluesmall,
} = Joomla.getOptions('mod_carouselticker.vars');

window.addEventListener("load", (event) => {
  const splide = new Splide(".splide", {
    type: "loop",
    drag: "free",
    focus: "center",
    heightRatio: ratioimagevalue/10,
    cover: true,
    perPage: perpage,
    breakpoints: {
      992: {
        perPage: perpagemedium,
        heightRatio: ratioimagevaluemedium/10,
      },
      640: {
        perPage: perpagelarge,
        heightRatio: ratioimagevaluelarge/10,
      },
      380: {
        perPage: perpagesmall,
        heightRatio: ratioimagevaluesmall/10,
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
