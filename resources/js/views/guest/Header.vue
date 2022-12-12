<template>
    <div class="main-div-bg w-full bg-cover bg-no-repeat bg-center">
        <nav
            class="flex flex-wrap items-center justify-between w-full py-3 px-4 md:px-24 text-lg text-gray-700 md:bg-opacity-0 bg-slate-900 fixed top-0 navbar-fixed-top z-40"
        >
            <div>
                <a href="index.html">
                    <img
                        src="../../../../public/assets/images/images/logo2.png"
                        class="md:w-32 w-20 logo"
                        alt=""
                        srcset=""
                    />
                    <img
                        src="../../../../public/assets/images/images/logo1.png"
                        class="md:w-32 w-20 hidden logo-2"
                        alt=""
                        srcset=""
                    />
                </a>
            </div>

            <svg
                xmlns="http://www.w3.org/2000/svg"
                id="menu-button"
                class="h-6 w-6 cursor-pointer md:hidden block text-white"
                fill="none"
                viewBox="0 0 24 24"
                stroke="currentColor"
            >
                <path
                    stroke-linecap="round"
                    stroke-linejoin="round"
                    stroke-width="2"
                    d="M4 6h16M4 12h16M4 18h16"
                />
            </svg>

            <div
                class="hidden w-full md:flex md:items-center md:w-auto"
                id="menu"
            >
                <ul
                    class="pt-4 text-base text-gray-700 md:flex md:justify-between md:items-center md:pt-0"
                >
                    <li class="drop-down-hover">
                        <a
                            class="md:p-3 py-2 block hover:text-orange-600 transition duration-300 text-white text-scroll flex items-center"
                            href="#"
                        >
                            <img
                                src="../../../../public/assets/images/images/fr.png"
                                class="w-5 h-5 rounded-full inline-block mr-3"
                                alt=""
                            />
                            <span class="md:pr-5 font-semibold text-sm"
                                >Francais</span
                            >
                        </a>
                        <div class="absolute md:ml-0 ml-32 md:mt-0 mt-[-55px]">
                            <div
                                class="div absolute hidden bg-white px-2 py-2 mt-4 rounded-lg shadow-lg"
                            >
                                <a
                                    class="py-2 block hover:text-orange-600 transition duration-300 text-blue-900 text-scroll flex items-center"
                                    href="#"
                                >
                                    <img
                                        src="../../../../public/assets/images/images/en.png"
                                        class="w-5 h-5 rounded-full inline-block mr-3"
                                        alt=""
                                    />
                                    <span class="md:pr-5 font-semibold text-sm"
                                        >English</span
                                    >
                                </a>
                                <a
                                    class="py-2 block hover:text-orange-600 transition duration-300 text-blue-900 text-scroll flex items-center"
                                    href="#"
                                >
                                    <img
                                        src="../../../../public/assets/images/images/fr.png"
                                        class="w-5 h-5 rounded-full inline-block mr-3"
                                        alt=""
                                    />
                                    <span class="md:pr-5 font-semibold text-sm"
                                        >Francais</span
                                    >
                                </a>
                                <a
                                    class="py-2 block hover:text-orange-600 transition duration-300 text-blue-900 text-scroll flex items-center"
                                    href="#"
                                >
                                    <img
                                        src="../../../../public/assets/images/images/sp.png"
                                        class="w-5 h-5 rounded-full inline-block mr-3"
                                        alt=""
                                    />
                                    <span class="md:pr-5 font-semibold text-sm"
                                        >spain</span
                                    >
                                </a>
                            </div>
                        </div>
                    </li>
                    <div
                        class="md:inline hidden border-r-2 border-white h-3 mr-4 border-scroll"
                    ></div>
                    <li>
                        <a
                            class="md:p-3 py-2 block hover:text-orange-600 transition duration-300 text-white text-scroll"
                            href="#"
                        >
                            <span class="md:pr-5 font-semibold text-sm"
                                >MAD</span
                            ></a
                        >
                    </li>
                    <div
                        class="md:inline hidden border-r-2 border-white h-3 mr-4 border-scroll"
                    ></div>
                    <li>
                        <a
                            class="md:p-3 py-2 block hover:text-orange-600 transition duration-300 text-white text-scroll"
                            href="#"
                        >
                            <span class="md:pr-5 font-semibold text-sm"
                                >Service
                            </span></a
                        >
                    </li>
                    <div
                        class="md:inline hidden border-r-2 border-white h-3 mr-4 border-scroll"
                    ></div>
                    <li>
                        <router-link
                            class="md:p-3 md:mr-2 py-2 block hover:text-orange-600 transition duration-300 text-white text-scroll font-semibold text-sm"
                            :to="{ name: 'login' }"
                            > Se connecter </router-link
                        >
                    </li>
                    <li>
                        <a
                            class="md:mt-0 mt-2 md:px-4 md:py-1 py-2 block md:bg-orange-600 bg-orange-600 text-center md:rounded-lg rounded-lg md:hover:bg-gray-100 text-white md:hover:text-orange-600 text-semibold font-semibold text-sm transition duration-300"
                            href="#"
                            >Inscription</a
                        >
                    </li>
                </ul>
            </div>
        </nav>
        <!--
        <script>
            const button = document.querySelector("#menu-button");
            const menu = document.querySelector("#menu");
            button.addEventListener("click", () => {
                menu.classList.toggle("hidden");
            });

            $(function () {
                $(document).scroll(function () {
                    var $nav = $(".navbar-fixed-top");
                    var $nav_text = $(".text-scroll");
                    $nav.toggleClass(
                        "scrolled",
                        $(this).scrollTop() > $nav.height()
                    );
                    $nav_text.toggleClass(
                        "scrolled",
                        $(this).scrollTop() > $nav.height()
                    );
                });
            });
        </script> -->
        <div
            class="md:flex justify-between md:px-24 md:pb-20 pb-12 md:pt-36 pt-20 px-4"
        >
            <div class="md:w-1/2 w-full">
                <div>
                    <h1
                        class="text-white md:text-5xl text-2xl font-bold text-center md:text-left md:leading-tight leading-7"
                    >
                        Louer une voiture au <br />
                        <span class="text-orange-600">Maroc</span> <br />
                        n'a jamais été aussi <br />
                        facile.
                    </h1>
                </div>
                <div
                    class="md:w-20 md:h-2 w-16 h-1 bg-white rounded-full md:my-10 my-3 mx-auto md:mx-0"
                ></div>
                <div class="md:mt-4 mt-0">
                    <h1
                        class="text-white md:text-xl text-sm text-center md:text-left font-semibold"
                    >
                        Économiser d'avantage sur votre voiture <br />
                        de location.
                    </h1>
                </div>
            </div>
            <div class="md:w-1/2 w-full md:pl-12 md:mt-0 mt-5">
                <div class="w-full bg-white rounded-xl md:p-8 p-4">
                    <form action="reservation.html">
                        <div class="border border-gray-300 rounded-xl p-4">
                            <label
                                class="text-gray-700 md:text-sm text-xs block mb-2"
                                >Lieu de prise en charge et de
                                restitution</label
                            >
                            <i
                                class="fa-solid fa-location-dot mr-2 text-slate-500"
                            ></i>
                            <input
                                type="text"
                                class="md:w-56 w-48 text-sm"
                                placeholder="Ville , Aéroport , Port ,Garage .."
                            />
                        </div>
                        <div class="py-4 flex items-center">
                            <input
                                type="checkbox"
                                class="border-gray-300 rounded h-6 w-6 mr-3"
                            />
                            <label class="text-gray-700 text-sm"
                                >Je souhaite restituer la voiture dans un autre
                                endroit</label
                            >
                        </div>
                        <div class="border border-gray-300 rounded-xl p-4">
                            <div class="flex">
                                <div class="w-1/2">
                                    <label
                                        class="text-gray-700 md:text-sm text-xs block mb-2"
                                        >Date de pris en charge</label
                                    >
                                    <i
                                        class="fa-solid fa-calendar text-blue-900 mr-2"
                                    ></i>
                                    <input
                                        type="text"
                                        class="md:w-32 w-20 text-sm text-blue-900 font-bold"
                                        value="Mer. 15 Juin 22"
                                    />
                                </div>
                                <div class="w-1/2">
                                    <label
                                        class="text-gray-700 md:text-sm text-xs block mb-2"
                                        >Date de restitution
                                    </label>
                                    <i
                                        class="fa-solid fa-calendar text-blue-900 mr-2"
                                    ></i>
                                    <input
                                        type="text"
                                        class="md:w-32 w-20 text-sm text-blue-900 font-bold"
                                        value="Sam. 18 Juin 22"
                                    />
                                </div>
                            </div>
                            <div class="flex mt-2">
                                <div class="w-1/2">
                                    <label
                                        class="text-gray-700 md:text-sm text-xs block mb-2"
                                        >Heure de pris en charge</label
                                    >
                                    <i
                                        class="fa-solid fa-clock text-blue-900 mr-2"
                                    ></i>
                                    <input
                                        type="text"
                                        class="md:w-32 w-20 text-sm text-blue-900 font-bold"
                                        value="12 : 00 am"
                                    />
                                </div>
                                <div class="w-1/2">
                                    <label
                                        class="text-gray-700 md:text-sm text-xs block mb-2"
                                        >Heure de restitution</label
                                    >
                                    <i
                                        class="fa-solid fa-clock text-blue-900 mr-2"
                                    ></i>
                                    <input
                                        type="text"
                                        class="md:w-32 w-20 text-sm text-blue-900 font-bold"
                                        value="04 : 00 pm"
                                    />
                                </div>
                            </div>
                        </div>
                        <button
                            class="reserver-button bg-blue-800 w-full text-white font-bold md:text-2xl text-xl py-2 mt-4 rounded-xl transition duration-300"
                        >
                            Réserver
                        </button>
                    </form>
                </div>
            </div>
            <!-- button fix -->
            <a
                href="#"
                class="btn-fix-scroll animate-bounce hidden fixed bottom-6 md:right-24 right-8 z-40 py-3 px-3 text-2xl text-white bg-orange-600 rounded-2xl"
                ><i class="fa-solid fa-angles-up"></i
            ></a>
        </div>
    </div>
    <!-- <script>
        window.onscroll = function () {
            if (
                document.body.scrollTop > 20 ||
                document.documentElement.scrollTop > 20
            ) {
                document.querySelector(".btn-fix-scroll").style.display =
                    "block";
            } else {
                document.querySelector(".btn-fix-scroll").style.display =
                    "none";
            }
        };
    </script> -->
</template>
<script>
export default {};
</script>

<style>
.main-div-bg {
    background-image: url("../../../../public/assets/images/images/bg.png");
}
.navbar-fixed-top.scrolled {
    background-color: white !important;
    transition: background-color 100ms linear;
    box-shadow: rgba(100, 100, 111, 0.3) 0px 7px 29px 0px;
}

.navbar-fixed-top.scrolled #menu-button {
    color: #0f172a;
}

.text-scroll.scrolled {
    color: #0f172a !important;
}

.text-scroll.scrolled:hover {
    color: orangered !important;
}
.text-scroll:hover {
    color: orangered !important;
}
.reserver-button:hover {
    background-color: #ea580c !important;
}

.navbar-fixed-top.scrolled .border-scroll {
    border-color: orangered !important;
}

.navbar-fixed-top.scrolled .logo {
    display: none;
}

.navbar-fixed-top.scrolled .logo-2 {
    display: inline-flex;
}

html {
    scroll-behavior: smooth;
}

/* scroll bar */
::-webkit-scrollbar {
    width: 8px;
}

::-webkit-scrollbar-track {
    background-color: #f1f1f1;
}

::-webkit-scrollbar-thumb {
    background: #444;
}

::-webkit-scrollbar-thumb:hover {
    background: #555;
}

/* flag or language dropdown */
.drop-down-hover:hover .div {
    position: relative;
    display: block;
}
/* blue  */
.text-blue-900 {
    color: #013b79 !important;
}
.text-blue-800 {
    color: #013b79 !important;
}
.bg-blue-800 {
    background-color: #013b79 !important;
}
.bg-blue-900 {
    background-color: #00254d !important;
}
</style>
