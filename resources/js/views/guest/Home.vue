<script setup>
import Header from "./Header.vue";
import Footer from "./Footer.vue";
</script>

<template>
    <Header />
    <!-- Meilleurs prix garantis -->
    <div class="mb-3 bg-gray-200 px-8 pb-5 md:px-24 md:pb-10">
        <div class="py-5 md:py-10">
            <h1 class="text-center text-lg font-bold text-gray-600 md:text-2xl">
                Meilleurs prix garantis pour vous !
            </h1>
        </div>
        <div
            class="gab-x-8 ml-10 grid grid-cols-3 md:ml-0 md:flex md:items-center md:justify-between"
        >
            <img
                src="../../../../public/assets/images/images/alfa.png"
                class="h-16 w-16 md:h-20 md:w-20"
            />
            <img
                src="../../../../public/assets/images/images/audi.png"
                class="hidden h-16 w-16 md:flex md:h-20 md:w-28"
            />
            <img
                src="../../../../public/assets/images/images/chev.png"
                class="hidden h-16 w-16 md:flex md:h-20 md:w-20"
            />
            <img
                src="../../../../public/assets/images/images/bmw.png"
                class="h-16 w-16 md:h-20 md:w-20"
            />
            <img
                src="../../../../public/assets/images/images/ford.png"
                class="hidden h-16 w-16 md:flex md:h-20 md:w-20"
            />
            <img
                src="../../../../public/assets/images/images/ben.png"
                class="h-16 w-16 md:h-20 md:w-20"
            />
        </div>
    </div>
    <!-- Comment ça fonctionne ? -->
    <div class="mx-8 md:mx-24">
        <div class="py-10">
            <h1
                class="text-center text-xl font-bold text-blue-800 md:text-left md:text-4xl"
            >
                Comment ça fonctionne ?
            </h1>
            <div
                class="mx-auto mt-3 h-2 w-16 rounded-full bg-blue-800 md:mx-0 md:w-20"
            ></div>
        </div>
        <div class="md:flex md:justify-between">
            <div class="w-full text-center md:w-1/5">
                <h1 class="text-2xl font-bold text-orange-600">
                    1. <span class="text-xl">Choisir</span>
                </h1>
                <p class="mt-2 font-semibold text-gray-800">
                    le lieu, les dates et les heures de votre prochaine
                    location.
                </p>
            </div>
            <div class="mt-4 w-full text-center md:mt-0 md:w-1/5">
                <h1 class="text-2xl font-bold text-orange-600">
                    2. <span class="text-xl">Comparez</span>
                </h1>
                <p class="mt-2 font-semibold text-gray-800">
                    des centaines d’offres et choisissez la mieux adaptée à vos
                    besoins.
                </p>
            </div>
            <div class="mt-4 w-full text-center md:mt-0 md:w-1/5">
                <h1 class="text-2xl font-bold text-orange-600">
                    3. <span class="text-xl">Réservez</span>
                </h1>
                <p class="mt-2 font-semibold text-gray-800">
                    Contacter notre equipe pour reserver votre voiture.
                </p>
            </div>
            <div class="mt-4 w-full text-center md:mt-0 md:w-1/5">
                <h1 class="text-2xl font-bold text-orange-600">
                    4. <span class="text-xl">Confirmer</span>
                </h1>
                <p class="mt-2 font-semibold text-gray-800">
                    Patienter , pour nous confirmons votre resérvation.
                </p>
            </div>
        </div>
        <div class="py-8">
            <h1 class="text-center text-2xl font-bold text-gray-600">Ou</h1>
            <h1 class="text-center font-bold text-gray-500">
                Confiez-nous votre réservation par téléphone
            </h1>
            <h1 class="text-center text-2xl font-bold text-orange-600">
                <a href="tel:+212707786109">+212 7-07 78 61 09</a>
            </h1>
            <h1 class="text-center text-2xl font-bold text-orange-600">
                <a href="tel:+212661839986">+212 6-61 83 99 86</a>
            </h1>
        </div>
    </div>
    <!--Pourquoi locaoto.ma ? -->
    <div class="mx-8 mb-4 md:mx-24">
        <div class="py-10">
            <h1
                class="text-center text-xl font-bold text-blue-800 md:text-left md:text-4xl"
            >
                Pourquoi locaoto.ma ?
            </h1>
            <div
                class="mx-auto mt-3 h-2 w-16 rounded-full bg-blue-800 md:mx-0 md:w-20"
            ></div>
        </div>
        <div
            class="grid-col-1 grid place-content-center py-3 md:mx-36 md:flex md:justify-around md:py-4"
        >
            <div
                class="tarnsition-all flex w-72 items-center rounded-xl border-2 border-gray-200 p-3 duration-100 hover:shadow-xl md:w-96 md:p-5"
            >
                <img
                    src="../../../../public/assets/images/images/credit-card.png"
                    class="h-10 w-10 md:h-12 md:w-12"
                    alt=""
                    srcset=""
                />
                <div class="ml-4">
                    <h1 class="text-lg font-bold text-gray-600 md:text-xl">
                        Paiement sécurisé
                    </h1>
                    <p class="text-xs text-gray-500 md:text-sm">
                        Transactions et données sécurisées et chiffrées.
                    </p>
                </div>
            </div>
            <div
                class="tarnsition-all mt-4 flex w-72 items-center rounded-xl border-2 border-gray-200 p-3 duration-100 hover:shadow-xl md:mt-0 md:w-96 md:p-5"
            >
                <img
                    src="../../../../public/assets/images/images/price-tag.png"
                    class="h-10 w-10 md:h-12 md:w-12"
                    alt=""
                    srcset=""
                />
                <div class="ml-4">
                    <h1 class="text-lg font-bold text-gray-600 md:text-xl">
                        Prix transparents
                    </h1>
                    <p class="text-xs text-gray-500 md:text-sm">
                        Payez et conduisez ce que vous réservez. Aucune surprise
                        !
                    </p>
                </div>
            </div>
        </div>
        <div
            class="grid-col-1 grid place-content-center py-1 md:mx-36 md:flex md:justify-around md:py-4"
        >
            <div
                class="tarnsition-all flex w-72 items-center rounded-xl border-2 border-gray-200 p-3 duration-100 hover:shadow-xl md:w-96 md:p-5"
            >
                <img
                    src="../../../../public/assets/images/images/call-center.png"
                    class="h-10 w-10 md:h-12 md:w-12"
                    alt=""
                    srcset=""
                />
                <div class="ml-4">
                    <h1 class="text-lg font-bold text-gray-600 md:text-xl">
                        Support
                    </h1>
                    <p class="text-xs text-gray-500 md:text-sm">
                        Equipe Locaoto.ma disponible <br />
                        7j/7
                    </p>
                </div>
            </div>
            <div
                class="tarnsition-all mt-4 flex w-72 items-center rounded-xl border-2 border-gray-200 p-3 duration-100 hover:shadow-xl md:mt-0 md:w-96 md:p-5"
            >
                <img
                    src="../../../../public/assets/images/images/deposit.png"
                    class="h-10 w-10 md:h-12 md:w-12"
                    alt=""
                    srcset=""
                />
                <div class="ml-4">
                    <h1 class="text-lg font-bold text-gray-600 md:text-xl">
                        Caution à petit prix
                    </h1>
                    <p class="text-xs text-gray-500 md:text-sm">
                        Cautions abordables avec facilités de dépôt
                        intéressantes.
                    </p>
                </div>
            </div>
        </div>
    </div>
    <!-- Top destination  -->
    <div class="mx-8 md:mx-24 md:mb-4">
        <div class="py-16">
            <h1
                class="text-center text-xl font-bold text-blue-800 md:text-left md:text-4xl"
            >
                Top destinations
            </h1>
            <div
                class="mx-auto mt-3 h-2 w-16 rounded-full bg-blue-800 md:mx-0 md:w-20"
            ></div>
        </div>
        <div class="md:flex md:justify-around">
            <div
                class="relative mb-4 h-80 w-full overflow-hidden rounded-xl bg-cover bg-center bg-no-repeat md:mb-0 md:w-1/4"
                style="background-image: url('assets/images/images/rabat.jpg')"
            >
                <div
                    class="tarnsition-all absolute top-[-160px] h-60 w-full rounded-t-xl bg-slate-900 opacity-95 duration-500 hover:top-0"
                >
                    <div class="h-2/3 pt-4">
                        <a
                            href="#"
                            class="buttom-0 ml-3 block text-xl font-semibold text-white"
                        >
                            link
                        </a>
                        <a
                            href="#"
                            class="buttom-0 ml-3 block text-xl font-semibold text-white"
                        >
                            link
                        </a>
                        <a
                            href="#"
                            class="buttom-0 ml-3 block text-xl font-semibold text-white"
                        >
                            link
                        </a>
                        <a
                            href="#"
                            class="buttom-0 ml-3 block text-xl font-semibold text-white"
                        >
                            link
                        </a>
                    </div>
                    <div class="h-1/3 py-6">
                        <h1
                            class="buttom-0 text-center text-2xl font-bold text-white opacity-100"
                        >
                            Rabat
                        </h1>
                    </div>
                </div>
            </div>
            <div
                class="relative mb-4 h-80 w-full overflow-hidden rounded-xl bg-cover bg-center bg-no-repeat md:mb-0 md:w-1/4"
                style="background-image: url('assets/images/images/casa.jpg')"
            >
                <div
                    class="tarnsition-all absolute top-[-160px] h-60 w-full rounded-t-xl bg-slate-900 opacity-95 duration-500 hover:top-0"
                >
                    <div class="h-2/3 pt-4">
                        <a
                            href="#"
                            class="buttom-0 ml-3 block text-xl font-semibold text-white"
                        >
                            link
                        </a>
                        <a
                            href="#"
                            class="buttom-0 ml-3 block text-xl font-semibold text-white"
                        >
                            link
                        </a>
                        <a
                            href="#"
                            class="buttom-0 ml-3 block text-xl font-semibold text-white"
                        >
                            link
                        </a>
                        <a
                            href="#"
                            class="buttom-0 ml-3 block text-xl font-semibold text-white"
                        >
                            link
                        </a>
                    </div>
                    <div class="h-1/3 py-6">
                        <h1
                            class="buttom-0 text-center text-2xl font-bold text-white"
                        >
                            Casablanca
                        </h1>
                    </div>
                </div>
            </div>
            <div
                class="relative h-80 w-full overflow-hidden rounded-xl bg-cover bg-center bg-no-repeat md:w-1/4"
                style="
                    background-image: url('assets/images/images/marrakesh.jpg');
                "
            >
                <div
                    class="tarnsition-all absolute top-[-160px] h-60 w-full rounded-t-xl bg-slate-900 opacity-95 duration-500 hover:top-0"
                >
                    <div class="h-2/3 pt-4">
                        <a
                            href="#"
                            class="buttom-0 ml-3 block text-xl font-semibold text-white"
                        >
                            link
                        </a>
                        <a
                            href="#"
                            class="buttom-0 ml-3 block text-xl font-semibold text-white"
                        >
                            link
                        </a>
                        <a
                            href="#"
                            class="buttom-0 ml-3 block text-xl font-semibold text-white"
                        >
                            link
                        </a>
                        <a
                            href="#"
                            class="buttom-0 ml-3 block text-xl font-semibold text-white"
                        >
                            link
                        </a>
                    </div>
                    <div class="h-1/3 py-6">
                        <h1
                            class="buttom-0 text-center text-2xl font-bold text-white"
                        >
                            Marrakesh
                        </h1>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- footer -->
    <!-- nos partenaire -->
    <div class="mx-8 md:mx-24">
        <div class="py-3">
            <div class="py-10">
                <h1
                    class="text-center text-xl font-bold text-gray-600 md:text-2xl"
                >
                    Nos partenaires
                </h1>
            </div>
            <div class="ml-4 md:ml-16">
                <section class="customer-logos slider flex justify-around">
                    <div class="slide">
                        <img
                            src="../../../../public/assets/images/images2/adidas.png"
                            style="width: 100px"
                            alt="logo"
                        />
                    </div>
                    <div class="slide">
                        <img
                            src="../../../../public/assets/images/images2/facebook.png"
                            style="width: 100px"
                            alt="logo"
                        />
                    </div>
                    <div class="slide">
                        <img
                            src="../../../../public/assets/images/images2/google.png"
                            style="width: 100px"
                            alt="logo"
                        />
                    </div>
                    <div class="slide">
                        <img
                            src="../../../../public/assets/images/images2/instagram.png"
                            style="width: 100px"
                            alt="logo"
                        />
                    </div>
                    <div class="slide">
                        <img
                            src="../../../../public/assets/images/images2/nike.png"
                            style="width: 100px"
                            alt="logo"
                        />
                    </div>
                    <div class="slide">
                        <img
                            src="../../../../public/assets/images/images2/twitter.png"
                            style="width: 100px"
                            alt="logo"
                        />
                    </div>
                    <div class="slide">
                        <img
                            src="../../../../public/assets/images/images2/uber.png"
                            style="width: 100px"
                            alt="logo"
                        />
                    </div>
                    <div class="slide">
                        <img
                            src="../../../../public/assets/images/images2/youtube.png"
                            style="width: 100px"
                            alt="logo"
                        />
                    </div>
                </section>
                <!-- <script>
                    $(document).ready(function () {
                        $('.customer-logos').slick({
                            slidesToShow: 7,
                            slidesToScroll: 1,
                            autoplay: true,
                            autoplaySpeed: 1000,
                            arrows: false,
                            dots: false,
                            pauseOnHover: false,
                            responsive: [{
                                breakpoint: 600,
                                settings: {
                                    slidesToShow: 3
                                }
                            }, {
                                breakpoint: 400,
                                settings: {
                                    slidesToShow: 2
                                }
                            }]
                        });
                    });
                </script> -->
            </div>
        </div>
        <div class="my-12 flex">
            <div
                class="w-full rounded-xl bg-blue-900 pb-10 md:w-1/2 md:rounded-tl-2xl md:rounded-bl-2xl md:rounded-br-none md:rounded-tr-none md:pb-0"
            >
                <div class="px-12 py-12">
                    <h1 class="text-3xl font-bold text-white md:text-4xl">
                        Devenir partenaire ?
                    </h1>
                    <div
                        class="mt-5 h-2 w-20 rounded-full bg-white md:mt-3"
                    ></div>
                </div>
                <div
                    class="px-12 text-justify font-semibold text-white md:text-left"
                >
                    <p>
                        Vous possédez une agence de location de voiture au Maroc
                        et vous souhaitez exposer votre flotte sur la centrale
                        de réservation Locaoto.ma, vous êtes au bon endroit !
                    </p>
                </div>
                <div class="mt-10 px-12">
                    <button
                        class="w-full rounded-xl bg-orange-600 py-2 px-6 text-lg font-semibold text-white md:w-52"
                    >
                        Rejoignez-nous
                    </button>
                </div>
            </div>
            <div
                class="hidden h-96 w-1/2 rounded-tr-2xl rounded-br-2xl bg-cover bg-center bg-no-repeat md:inline-flex"
                style="background-image: url('assets/images/images/bg2.jpg')"
            ></div>
        </div>
    </div>
    <Footer />
</template>
