const { 
  gap,
  arrows,
  pagination,
  perpagevalue,
  perpagevaluemedium,
  perpagevaluelarge,
  perpagevaluesmall,
  speed,

} = Joomla.getOptions('mod_carouselticker.vars');

window.addEventListener("load", (event) => {
  const splide = new Splide(".splide", {
    type: "loop",
    drag: "free",
    focus: "center",
    heightRatio: perpagevalue['ratioimagevalue']/10,
    cover: true,
    perPage: perpagevalue['imagesperpagevalue'],
    breakpoints: {
      960: {
        perPage: perpagevaluemedium['imagesperpagevaluemedium'],
        heightRatio: perpagevaluemedium['ratioimagevaluemedium']/10,
      },
      768: {
        perPage: perpagevaluelarge['imagesperpagevaluelarge'],
        heightRatio: perpagevaluelarge['ratioimagevaluelarge']/10,
      },
      380: {
        perPage: perpagevaluesmall['imagesperpagevaluesmall'],
        heightRatio: perpagevaluesmall['ratioimagevaluesmall']/10,
      },
    },
    gap: Number(gap),
    arrows: Number(arrows),
    pagination: Number(pagination),
    autoScroll: {
      speed: Number(speed),
    },
  }).mount(window.splide.Extensions);
});
