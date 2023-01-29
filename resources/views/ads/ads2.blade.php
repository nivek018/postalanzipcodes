<div class="mt-8 mb-4">

    <div
    x-data='{
        init() {
            $nextTick(() => {
                new Swiper(this.$refs.bottomAdSlider, {
                    loop: false,
                    loopFillGroupWithBlank: true,
                    autoplay: {
                        delay: 3000,
                        disableOnInteraction: false,
                        pauseOnMouseEnter: true,
                        reverseDirection: true
                    },

                    // Responsive breakpoints
                    breakpoints: {
                        1280: {
                        slidesPerView: 2,
                        slidesPerGroup: 2,
                        spaceBetween: 15,
                        },
                        1024: {
                        slidesPerView: 2,
                        slidesPerGroup: 2,
                        spaceBetween: 12,
                        },
                        320: {
                        slidesPerView: 1,
                        slidesPerGroup: 1,
                        spaceBetween: 12,
                        }
                    },
                    // Navigation arrows
                    navigation: {
                    nextEl: ".swiper-next",
                    prevEl: ".swiper-prev",
                    },
                })
            })
        },
    }'
    >
        {{-- Slider main container --}}
        <div x-ref="bottomAdSlider" class="swiper block relative group w-full h-auto max-h-[180px] overflow-hidden">

            {{--slider items wrapper --}}
            <ul class="swiper-wrapper" id="offersList">
                <li class="swiper-slide flex flex-col items-center justify-center">
                    <a href="https://shope.ee/8zWtQtYwc9" class="relative rounded-sm overflow-hidden" title="Shopee MAS MURA Home Appliances" aria-label="Shopee MAS MURA Home Appliances">
                        <picture>
                            <source media="(max-width: 799px)" srcset="https://res.cloudinary.com/mnoquiao/image/upload/f_auto,w_320/v1674963189/postalandzipcodes.ph/ads-images/758536feb7249f5b89c4a4c496764f4d.png" />
                            <source media="(min-width: 800px) and (max-width: 991px)" srcset="https://res.cloudinary.com/mnoquiao/image/upload/f_auto,w_768/v1674963189/postalandzipcodes.ph/ads-images/758536feb7249f5b89c4a4c496764f4d.png" />
                            <source media="(min-width: 992px) and (max-width: 1199px)" srcset="https://res.cloudinary.com/mnoquiao/image/upload/f_auto,w_992/v1674963189/postalandzipcodes.ph/ads-images/758536feb7249f5b89c4a4c496764f4d.png" />
                            <source media="(min-width: 1200px)" srcset="https://res.cloudinary.com/mnoquiao/image/upload/f_auto,w_1200/v1674963189/postalandzipcodes.ph/ads-images/758536feb7249f5b89c4a4c496764f4d.png" />
                            <img class="object-cover w-full h-auto" src="https://res.cloudinary.com/mnoquiao/image/upload/f_auto,w_1200/v1674963189/postalandzipcodes.ph/ads-images/758536feb7249f5b89c4a4c496764f4d.png" alt="" />
                        </picture>
                    </a>
                </li>

                <li class="swiper-slide flex flex-col items-center justify-center">
                    <a href="https://shope.ee/20N9L0BptQ" class="relative rounded-sm overflow-hidden" title="ShopeePay On Load Promos up to 10% Discount" aria-label="ShopeePay On Load Promos up to 10% Discount">
                        <picture>
                            <source media="(max-width: 799px)" srcset="https://res.cloudinary.com/mnoquiao/image/upload/f_auto,w_320/v1674963197/postalandzipcodes.ph/ads-images/3a385114fd54b4d4f46d9d751f7b8b93.png" />
                            <source media="(min-width: 800px) and (max-width: 991px)" srcset="https://res.cloudinary.com/mnoquiao/image/upload/f_auto,w_768/v1674963197/postalandzipcodes.ph/ads-images/3a385114fd54b4d4f46d9d751f7b8b93.png" />
                            <source media="(min-width: 992px) and (max-width: 1199px)" srcset="https://res.cloudinary.com/mnoquiao/image/upload/f_auto,w_992/v1674963197/postalandzipcodes.ph/ads-images/3a385114fd54b4d4f46d9d751f7b8b93.png" />
                            <source media="(min-width: 1200px)" srcset="https://res.cloudinary.com/mnoquiao/image/upload/f_auto,w_1200/v1674963197/postalandzipcodes.ph/ads-images/3a385114fd54b4d4f46d9d751f7b8b93.png" />
                            <img class="object-cover w-full h-auto" src="https://res.cloudinary.com/mnoquiao/image/upload/f_auto,w_1200/v1674963197/postalandzipcodes.ph/ads-images/3a385114fd54b4d4f46d9d751f7b8b93.png" alt="" />
                        </picture>
                    </a>
                </li>

                <li class="swiper-slide flex flex-col items-center justify-center">
                    <a href="https://shope.ee/9zPQroRUWY" class="relative rounded-sm overflow-hidden" title="ShopeePay Scan All, Pay All. Win up to ₱88,888" aria-label="ShopeePay Scan All, Pay All. Win up to ₱88,888">
                        <picture>
                            <source media="(max-width: 799px)" srcset="https://res.cloudinary.com/mnoquiao/image/upload/f_auto,w_320/v1674963202/postalandzipcodes.ph/ads-images/758536feb7249f5b89c4a4c496764f4d.png" />
                            <source media="(min-width: 800px) and (max-width: 991px)" srcset="https://res.cloudinary.com/mnoquiao/image/upload/f_auto,w_768/v1674963202/postalandzipcodes.ph/ads-images/758536feb7249f5b89c4a4c496764f4d.png" />
                            <source media="(min-width: 992px) and (max-width: 1199px)" srcset="https://res.cloudinary.com/mnoquiao/image/upload/f_auto,w_992/v1674963202/postalandzipcodes.ph/ads-images/758536feb7249f5b89c4a4c496764f4d.png" />
                            <source media="(min-width: 1200px)" srcset="https://res.cloudinary.com/mnoquiao/image/upload/f_auto,w_1200/v1674963202/postalandzipcodes.ph/ads-images/758536feb7249f5b89c4a4c496764f4d.png" />
                            <img class="object-cover w-full h-auto" src="https://res.cloudinary.com/mnoquiao/image/upload/f_auto,w_1200/v1674963202/postalandzipcodes.ph/ads-images/758536feb7249f5b89c4a4c496764f4d.png" alt="" />
                        </picture>
                    </a>
                </li>

                <li class="swiper-slide flex flex-col items-center justify-center">
                    <a href="https://shope.ee/9zPQroRUWY" class="relative rounded-sm overflow-hidden" title="ShopeePay Scan All, Pay All. Win up to ₱88,888" aria-label="ShopeePay Scan All, Pay All. Win up to ₱88,888">
                        <picture>
                            <source media="(max-width: 799px)" srcset="https://res.cloudinary.com/mnoquiao/image/upload/f_auto,w_320/v1674963202/postalandzipcodes.ph/ads-images/ph-50009109-84f115cc090d7a8d0bb71ae0da2193e4.png" />
                            <source media="(min-width: 800px) and (max-width: 991px)" srcset="https://res.cloudinary.com/mnoquiao/image/upload/f_auto,w_768/v1674963202/postalandzipcodes.ph/ads-images/ph-50009109-84f115cc090d7a8d0bb71ae0da2193e4.png" />
                            <source media="(min-width: 992px) and (max-width: 1199px)" srcset="https://res.cloudinary.com/mnoquiao/image/upload/f_auto,w_992/v1674963202/postalandzipcodes.ph/ads-images/ph-50009109-84f115cc090d7a8d0bb71ae0da2193e4.png" />
                            <source media="(min-width: 1200px)" srcset="https://res.cloudinary.com/mnoquiao/image/upload/f_auto,w_1200/v1674963202/postalandzipcodes.ph/ads-images/ph-50009109-84f115cc090d7a8d0bb71ae0da2193e4.png" />
                            <img class="object-cover w-full h-auto" src="https://res.cloudinary.com/mnoquiao/image/upload/f_auto,w_1200/v1674963202/postalandzipcodes.ph/ads-images/ph-50009109-84f115cc090d7a8d0bb71ae0da2193e4.png" alt="" />
                        </picture>
                    </a>
                </li>
            </ul>

            {{--slider navs --}}
            <div class="pointer-events-none absolute inset-0 flex items-center justify-between z-10 invisible lg:visible">
                {{--Previous Button --}}
                <button
                    class="swiper-prev
                        transition-all ease-in-out duration-300
                        hover:scale-125 h-full px-2
                        pointer-events-auto disabled:invisible">
                    <span aria-hidden="true">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-gray-50" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="3"><path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7" /></svg>
                    </span>
                    <span class="sr-only">Skip to previous slide page</span>
                </button>

                {{--Next Button --}}
                <button
                    class="swiper-next
                        transition-all ease-in-out duration-300
                        hover:scale-125 h-full px-2
                        pointer-events-auto disabled:invisible">
                    <span aria-hidden="true">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-gray-50" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="3"><path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7" /></svg>
                    </span>
                    <span class="sr-only">Skip to next slide page</span>
                </button>
            </div>

        </div>
    </div>

</div>
