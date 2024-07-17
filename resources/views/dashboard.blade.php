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
        {
        display: none;
        }

        .carousel.no-transition,
        {
        scroll-behavior: auto;
        }

        .carousel.dragging,
        {
        scroll-snap-type: none;
        scroll-behavior: auto;
        }

        .carousel.dragging .card,
        {
        cursor: grab;
        user-select: none;
        }

        .carousel :where(.card, .img),
        {
        display: flex;
        justify-content: center;
        align-items: center;
        }

        .carousel .card,
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

        .carousel .card h2,
        {
        font-weight: 500;
        font-size: 1.56rem;
        margin: 30px 0 5px;
        }

        .carousel .card span,
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



            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="p-6 lg:p-8 bg-white border-b border-gray-200">
                    <h3 class="font-semibold text-lg">KPI</h3>
                    <div class="flex gap-2">
                        <div class="bg-green-200 mt-5 p-3 rounded-lg flex flex-col justify-center">
                            <p class="font-bold">Cantidad de Productos vendidos: <span
                                    class="font-normal">{{ $cantProdVendidos ?? 'N/A' }}</span>
                            </p>
                            <!-- <p>Vendida: <span>{{ $pizzaMasVendida['total_pedidos'] ?? '0' }}</span>
                                                    veces</p>-->
                        </div>
                        <div class="bg-red-200 mt-5 p-3 rounded-lg flex flex-col justify-center">
                            <p class="font-bold">Cantidad de ventas obtenidads: <span
                                    class="font-normal">{{ $cantVentasObtenidas ?? 'N/A' }}</span>
                            </p>
                            <!--<p>Vendida: <span>{{ $pizzaMenosVendida['total_pedidos'] ?? '0' }}</span>
                                                    veces</p>-->
                        </div>
                        <div class="bg-blue-200 mt-5 p-3 rounded-lg">
                            <p class="font-bold">Cantidad de usuarios: <span
                                    class="font-normal">{{ $cantUser }}</span></p>
                            <p>Cantidad de clientes: <span>{{ $cantClientes }}</span></p>
                            <p>Cantidad de administradores: <span>{{ $cantAdmin }}</span></p>
                        </div>
                        <div class="bg-yellow-200 mt-5 p-3 rounded-lg flex flex-col justify-center">
                            <p class="font-bold">Cantidad Total en Bs por ventas: <span
                                    class="font-normal">{{ $cantidadTotalVentas ?? 'N/A' }}</span>
                            </p>
                            <!--<p>Vendida: <span>{{ $pizzaMenosVendida['total_pedidos'] ?? '0' }}</span>
                                                    veces</p>-->
                        </div>
                    </div>
                    <div class="flex flex-wrap">

                        <div class="w-full md:w-1/2 p-3">
                            <div class="bg-white shadow-md rounded-lg overflow-hidden">
                                <h3 class="font-semibold text-lg p-4">
                                    {{ $pedidos_month_chart->options['chart_title'] }}
                                </h3>
                                <div class="p-4">
                                    {!! $pedidos_month_chart->renderHtml() !!}
                                    {!! $pedidos_month_chart->renderChartJsLibrary() !!}
                                    {!! $pedidos_month_chart->renderJs() !!}
                                </div>
                            </div>
                        </div>


                        <div class="w-full md:w-1/2 p-3">
                            <div class="bg-white shadow-md rounded-lg overflow-hidden">
                                <h3 class="font-semibold text-lg p-4">
                                    {{ $productos_chart_instance->options['chart_title'] }}
                                </h3>
                                <div class="p-8">
                                    {!! $productos_chart_instance->renderHtml() !!}
                                    {!! $productos_chart_instance->renderChartJsLibrary() !!}
                                    {!! $productos_chart_instance->renderJs() !!}
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>

        </div>
    </div>
    <x-visits> {{ $visits->cant }} </x-visits>
    @section('scripts')
        {!! $user_month_chart->renderChartJsLibrary() !!}
        {!! $user_month_chart->renderJs() !!}
        {!! $pedidos_month_chart->renderChartJsLibrary() !!}
        {!! $pedidos_month_chart->renderJs() !!}

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
    @endsection



</x-app-layout>