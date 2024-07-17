<x-app-layout>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.css" />

    <style>
        .italic-font {
            font-style: italic;
        }


        .body-carousel {
            display: flex;

            align-items: center;
            justify-content: center;
        }

        .wrapper-tecnicos {
            max-width: 1100px;
            width: 100%;
            position: relative;
        }

        .wrapper-tecnicos i {
            top: 50%;
            height: 50px;
            width: 50px;
            cursor: pointer;
            font-size: 1.25rem;
            position: absolute;
            text-align: center;
            line-height: 50px;
            background: #fff;
            border-radius: 50%;
            box-shadow: 0 3px 6px rgba(0, 0, 0, 0.23);
            transform: translateY(-50%);
            transition: transform 0.1s linear;
        }

        .wrapper-tecnicos i:active {
            transform: translateY(-50%) scale(0.85);
        }

        .wrapper-tecnicos i:first-child {
            left: -22px;
        }

        .wrapper-tecnicos i:last-child {
            right: -22px;
        }

        .wrapper-tecnicos .carousel {
            padding: 50px 0;
            display: grid;
            grid-auto-flow: column;
            grid-auto-columns: calc((100% / 3) - 12px);
            overflow-x: auto;
            scroll-snap-type: x mandatory;
            gap: 16px;
            border-radius: 8px;
            scroll-behavior: smooth;
            scrollbar-width: none;
        }

        .carousel::-webkit-scrollbar,
        .carousel2::-webkit-scrollbar,
        {
        display: none;
        }

        .carousel.no-transition,
        .carousel2.no-transition,
        {
        scroll-behavior: auto;
        }

        .carousel.dragging,
        .carousel2.dragging,
        {
        scroll-snap-type: none;
        scroll-behavior: auto;
        }

        .carousel.dragging .card,
        .carousel2.dragging .card,
        {
        cursor: grab;
        user-select: none;
        }

        .carousel :where(.card, .img),
        .carousel2 :where(.card, .img),
        {
        display: flex;
        justify-content: center;
        align-items: center;
        }

        .carousel .card,
        .carousel2 .card,
        {
        scroll-snap-align: center;
        height: 342px;
        /* width: 70%; */
        list-style: none;
        background: #fff;
        cursor: pointer;
        padding-bottom: 15px;
        flex-direction: column;
        border-radius: 8px;
        }

        .carousel .card .img,
        .carousel2 .card .img,
        {
        background: #04527b;
        height: 148px;
        width: 148px;
        border-radius: 50%;
        }

        .card .img img {
            width: 140px;
            height: 140px;
            border-radius: 50%;
            object-fit: cover;
            border: 4px solid #fff;
        }

        .carousel2 .card h2,
        {
        font-weight: 500;
        font-size: 1.56rem;
        margin: 30px 0 5px;
        }

        .carousel .card span,
        .carousel2 .card span,
        {
        color: #6A6D78;
        font-size: 1.31rem;
        }

        .card h2,
        .card span {
            text-align: center;
        }

        @media screen and (max-width: 900px) {
            .wrapper-tecnicos .carousel {
                grid-auto-columns: calc((100% / 2) - 9px);
            }
        }

        @media screen and (max-width: 600px) {
            .wrapper-tecnicos .carousel {
                grid-auto-columns: 100%;
            }
        }
    </style>

    <style>
        :root {
            /* FONT */
            --font: 'Poppins', sans-serif;

            /* COLORS */
            --color: #9176FF;
            --bg-color: #f4f4f4;
        }

        .body-swiper {
            font-family: var(--font);
            display: flex;
            justify-content: center;
            align-items: center;
            height: 60vh;

            background-color: var(--bg-color);

        }

        /* ----------- SLIDER ------------ */
        .swiper {
            width: 100%;
        }

        .swiper-wrapper {
            width: 100%;
            height: 35em;
            display: flex;
            align-items: center;
        }

        .card-adulto {
            width: 20em;
            height: 60%;
            background-color: #fff;
            border-radius: 2em;
            box-shadow: 0 0 2em rgba(0, 0, 0, .2);
            padding: 2em 1em;

            display: flex;
            align-items: center;
            flex-direction: column;

            margin: 0 2em;
        }

        .swiper-slide:not(.swiper-slide-active) {
            filter: blur(1px);
        }

        .card__image {
            width: 10em;
            height: 10em;
            border-radius: 50%;
            border: 5px solid var(--color);
            padding: 3px;
            margin-bottom: 2em;
        }

        .card__image img {
            width: 100%;
            height: 100%;
            border-radius: 50%;
            object-fit: cover;
        }

        .card__content {
            display: flex;
            align-items: center;
            flex-direction: column;
        }

        .card__title {
            font-size: 1.5rem;
            font-weight: 500;
            position: relative;
            top: .2em;
        }

        .card__name {
            color: var(--color);
        }

        .card__text {
            text-align: center;
            font-size: 1.1rem;
            margin: 1em 0;
        }

        .card__btn {
            background-color: var(--color);
            color: #fff;
            font-size: 1rem;
            text-transform: uppercase;
            font-weight: 600;
            border: none;
            padding: .5em;
            border-radius: .5em;
            margin-top: .5em;
            cursor: pointer;
        }
    </style>
    <x-slot name="header">
        <div :class="{ 'border border-green-500': isChildMode, }">
            <h2 :class="{ 'border border-green-500 text-red-500 bg-blue-500': isChildMode, 'border  text-blue-500 italic-font': isYoungMode, }"
                class="font-semibold text-xl  leading-tight">
                {{ __('Dashboard') }}
            </h2>
        </div>

    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div :class="{ 'bg-white': !isChildMode, 'border border-green-500 text-red-500 bg-green-500': isChildMode, }"
                class="overflow-hidden shadow-sm sm:rounded-lg">
                <div :class="{ 'text-gray-900': !isChildMode, 'border border-green-500 text-red-500 bg-green-500': isChildMode, }"
                    class="p-6 ">
                    {{ __("You're logged in!") }}
                </div>
            </div>
            <div :class="{ 'hidden': isYoungMode }">

                <img :class="{ 'hidden': !isChildMode, 'w-full h-100': isChildMode }"
                    src="https://i.pinimg.com/originals/ce/7c/4e/ce7c4ec19b614ccde9be9f45aa93035f.gif" alt="">
            </div>
            <div :class="{ 'hidden': isChildMode }">


                <section :class="{ 'hidden': !isYoungMode }" id="equipo">

                    <div class="body-carousel">

                        <div class="wrapper-tecnicos">
                            <i id="left" class="fa-solid fa-angle-left"></i>
                            <ul class="carousel">
                                <li class="card">
                                    <img src="{{ asset('img/img1.jpeg') }}" alt="">
                                </li>
                                <li class="card">
                                    <img src="{{ asset('img/img2.jpeg') }}" alt="">
                                </li>
                                <li class="card">
                                    <img src="{{ asset('img/img3.jpeg') }}" alt="">
                                </li>
                                <li class="card">
                                    <img src="{{ asset('img/img4.jpeg') }}" alt="">
                                </li>
                                <li class="card">
                                    <img src="{{ asset('img/img5.jpg') }}" alt="">
                                </li>
                                <li class="card">
                                    <img src="{{ asset('img/img6.jpg') }}" alt="">
                                </li>


                                {{-- <li class="card">
                                <div class="img"><img src="img/img-1.jpg" alt="img" draggable="false"></div>
                                <h2>Sra. Karen Garcia Escobar</h2>
                                <span>Secretaria - S.D.E.R</span>
                            </li> --}}
                            </ul>
                            <i id="right" class="fa-solid fa-angle-right"></i>
                        </div>

                    </div>
                </section>
            </div>
            <div :class="{ 'hidden': isChildMode }">

                <div :class="{ 'hidden': isYoungMode }">


                    <div class="body-swiper">

                        <section class="swiper mySwiper">

                            <div class="swiper-wrapper">

                                <div class="card-adulto swiper-slide">
                                    <img src="{{ asset('img/kiwi1.jpg') }}" alt="card image">
                                </div>
                                <div class="card-adulto swiper-slide">
                                    <img src="{{ asset('img/kiwi2.jpg') }}" alt="card image">
                                </div>
                                <div class="card-adulto swiper-slide">
                                    <img src="{{ asset('img/kiwi3.jpg') }}" alt="card image">
                                </div>
                                <div class="card-adulto swiper-slide">
                                    <img src="{{ asset('img/kiwi4.jpg') }}" alt="card image">
                                </div>
                                <div class="card-adulto swiper-slide">
                                    <img src="{{ asset('img/banana1.jpg') }}" alt="card image">
                                </div>
                                <div class="card-adulto swiper-slide">
                                    <img src="{{ asset('img/banana2.jpg') }}" alt="card image">
                                </div>
                                <div class="card-adulto swiper-slide">
                                    <img src="{{ asset('img/banana3.jpg') }}" alt="card image">
                                </div>
                                <div class="card-adulto swiper-slide">
                                    <img src="{{ asset('img/banana4.jpg') }}" alt="card image">
                                </div>
                                <div class="card-adulto swiper-slide">
                                    <img src="{{ asset('img/mango1.jpg') }}" alt="card image">
                                </div>
                                <div class="card-adulto swiper-slide">
                                    <img src="{{ asset('img/mango2.jpg') }}" alt="card image">
                                </div>

                                <div class="card-adulto swiper-slide">
                                    <img src="{{ asset('img/mango3.jpg') }}" alt="card image">
                                </div>
                                <div class="card-adulto swiper-slide">
                                    <img src="{{ asset('img/mango4.jpg') }}" alt="card image">
                                </div>
                            </div>



                        </section>
                    </div>
                </div>

            </div>



        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.js"></script>

    <script>
        const wrapper = document.querySelector(".wrapper-tecnicos");
        const carousel = document.querySelector(".carousel");
        const firstCardWidth = carousel.querySelector(".card").offsetWidth;
        const arrowBtns = document.querySelectorAll(".wrapper-tecnicos i");
        const carouselChildrens = [...carousel.children];

        let isDragging = false,
            isAutoPlay = true,
            startX,
            startScrollLeft,
            timeoutId;

        // Get the number of cards that can fit in the carousel at once
        let cardPerView = Math.round(carousel.offsetWidth / firstCardWidth);

        // Insert copies of the last few cards to beginning of carousel for infinite scrolling
        carouselChildrens
            .slice(-cardPerView)
            .reverse()
            .forEach((card) => {
                carousel.insertAdjacentHTML("afterbegin", card.outerHTML);
            });

        // Insert copies of the first few cards to end of carousel for infinite scrolling
        carouselChildrens.slice(0, cardPerView).forEach((card) => {
            carousel.insertAdjacentHTML("beforeend", card.outerHTML);
        });

        // Scroll the carousel at appropriate postition to hide first few duplicate cards on Firefox
        carousel.classList.add("no-transition");
        carousel.scrollLeft = carousel.offsetWidth;
        carousel.classList.remove("no-transition");

        // Add event listeners for the arrow buttons to scroll the carousel left and right
        arrowBtns.forEach((btn) => {
            btn.addEventListener("click", () => {
                carousel.scrollLeft += btn.id == "left" ? -firstCardWidth : firstCardWidth;
            });
        });

        const dragStart = (e) => {
            isDragging = true;
            carousel.classList.add("dragging");
            // Records the initial cursor and scroll position of the carousel
            startX = e.pageX;
            startScrollLeft = carousel.scrollLeft;
        };

        const dragging = (e) => {
            if (!isDragging) return; // if isDragging is false return from here
            // Updates the scroll position of the carousel based on the cursor movement
            carousel.scrollLeft = startScrollLeft - (e.pageX - startX);
        };

        const dragStop = () => {
            isDragging = false;
            carousel.classList.remove("dragging");
        };

        const infiniteScroll = () => {
            // If the carousel is at the beginning, scroll to the end
            if (carousel.scrollLeft === 0) {
                carousel.classList.add("no-transition");
                carousel.scrollLeft = carousel.scrollWidth - 2 * carousel.offsetWidth;
                carousel.classList.remove("no-transition");
            }
            // If the carousel is at the end, scroll to the beginning
            else if (
                Math.ceil(carousel.scrollLeft) ===
                carousel.scrollWidth - carousel.offsetWidth
            ) {
                carousel.classList.add("no-transition");
                carousel.scrollLeft = carousel.offsetWidth;
                carousel.classList.remove("no-transition");
            }

            // Clear existing timeout & start autoplay if mouse is not hovering over carousel
            clearTimeout(timeoutId);
            if (!wrapper.matches(":hover")) autoPlay();
        };

        const autoPlay = () => {
            // if (window.innerWidth < 800 || !isAutoPlay) return; // Return if window is smaller than 800 or isAutoPlay is false
            // Autoplay the carousel after every 2500 ms
            timeoutId = setTimeout(() => (carousel.scrollLeft += firstCardWidth), 2000);
        };
        autoPlay();

        carousel.addEventListener("mousedown", dragStart);
        carousel.addEventListener("mousemove", dragging);
        document.addEventListener("mouseup", dragStop);
        carousel.addEventListener("scroll", infiniteScroll);
        wrapper.addEventListener("mouseenter", () => clearTimeout(timeoutId));
        wrapper.addEventListener("mouseleave", autoPlay);
    </script>

    <!-- Initialize Swiper -->
    <script>
        var swiper = new Swiper(".mySwiper", {
            loop: true,
            autoplay: true,
            autoplayTimeout: 1000,
            autoplayHoverPause: true,

            effect: "coverflow",
            grabCursor: true,
            centeredSlides: true,
            slidesPerView: "auto",
            coverflowEffect: {
                rotate: 0,
                stretch: 0,
                depth: 300,
                modifier: 1,
                slideShadows: false,
            },
            pagination: {
                el: ".swiper-pagination",
            },
        });
    </script>

</x-app-layout>
