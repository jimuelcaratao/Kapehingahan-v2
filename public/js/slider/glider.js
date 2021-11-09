//foreach
const gliders = document.querySelectorAll("[id^=glider]");

gliders.forEach((glide) => {
    const glider = document.querySelector(`#${glide.id} .glider`);
    const gliderPrev = document.querySelector(`#${glide.id} .glider-prev`);
    const gliderNext = document.querySelector(`#${glide.id} .glider-next`);

new Glider(glider, {
    slidesToShow: 1.5,
    slidesToScroll: 1,
    draggable: true,
    dots: ".dots",
    responsive: [
        {
            // If Screen Size More than 320px
            breakpoint: 320,
            settings: {
              slidesToShow: 0.5,
              slidesToScroll: 0.5,
              duration: 0.5,
              arrows: {
                prev: gliderPrev,
                next: gliderNext
              }
            }
          },
        {
            // If Screen Size More than 480px
            breakpoint: 480,
            settings: {
              slidesToShow: 0.5,
              slidesToScroll: 0.5,
              duration: 0.5,
              arrows: {
                prev: gliderPrev,
                next: gliderNext
              }
            }
          },
      {
        // If Screen Size More than 768px
        breakpoint: 768,
        settings: {
          slidesToShow: 1.5,
          slidesToScroll: 1,
          duration: 0.5,
          arrows: {
            prev: gliderPrev,
            next: gliderNext
          }
        }
      },
      {
        // If Screen Size More than 1024px
        breakpoint: 1024,
        settings: {
          slidesToShow: 2.5,
          slidesToScroll: 1,
          duration: 0.5,
          arrows: {
            prev: gliderPrev,
            next: gliderNext
          }
        }
      }
    ]
  });
});
