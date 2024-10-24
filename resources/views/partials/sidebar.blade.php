<aside class="py-6 w-[240px] bg-white h-screen fixed">
    <div class="flex flex-col items-center justify-between w-full h-full">
        <div class="w-full text-center">
            <p class="text-lg font-extrabold">
                <span class="text-primary">Meow</span>Cafe
            </p>
            <section class="flex flex-col mt-8">
                <div class="relative px-6">
                    <a
                        href="{{ route('dashboard') }}"
                        class="p-3 group {{ request()->is('dashboard') ? 'bg-primary text-white' : '' }} items-center flex w-full rounded-md"
                        data-page="{{ request()->is('dashboard') ? 'active' : '' }}"
                    >
                        <div
                            class="absolute top-0 left-0 hidden w-1 h-full bg-primary rounded-e-lg group-data-active:block"
                        ></div>
                        <i class="mr-4 text-lg ri-dashboard-line"></i>
                        <span class="font-semibold">Dashboard</span>
                    </a>
                </div>
                <div class="relative px-6">
                    <a
                        href="/products"
                        class="p-3 group {{ request()->is('products*') ? 'bg-primary text-white' : '' }} items-center flex w-full rounded-md"
                        data-page="{{ request()->is('products*') ? 'active' : '' }}"
                    >
                        <div
                            class="absolute top-0 left-0 hidden w-1 h-full bg-primary rounded-e-lg group-data-active:block"
                        ></div>
                        <i class="mr-4 text-lg ri-microsoft-line"></i>
                        <span class="font-semibold">Products</span>
                    </a>
                </div>
            </section>
            <div class="h-[1px] bg-[#E0E0E0] w-full my-4"></div>
            <section>
                <div class="w-full px-4 mb-4">
                    <span
                        class="px-4 uppercase text-[#202224] font-bold text-sm w-full flex"
                        >Pages</span
                    >
                </div>
                <div class="relative px-6">
                    <a
                        href="/orders"
                        class="p-3 group {{ request()->is('orders') ? 'bg-primary text-white' : '' }} items-center flex w-full rounded-md"
                        data-page="{{ request()->is('orders') ? 'active' : '' }}"
                    >
                        <div
                            class="absolute top-0 left-0 hidden w-1 h-full bg-primary rounded-e-lg group-data-active:block"
                        ></div>
                        <i class="mr-4 text-lg ri-clipboard-line"></i>
                        <span class="font-semibold">Orders</span>
                    </a>
                </div>
            </section>
            {{-- <section>
                <div class="w-full px-4 mb-4">
                    <span
                        class="px-4 uppercase text-[#202224] font-bold text-sm w-full flex"
                        >Pages</span
                    >
                </div>
                <div class="relative px-6">
                    <a
                        href="./orders.html"
                        class="flex items-center w-full p-3 rounded-md group data-active:bg-primary data-active:text-white"
                        data-page="active"
                    >
                        <div
                            class="absolute top-0 left-0 hidden w-1 h-full bg-primary rounded-e-lg group-data-active:block"
                        ></div>
                        <i class="mr-4 text-lg ri-clipboard-line"></i>
                        <span class="font-semibold">Orders</span>
                    </a>
                </div>
            </section> --}}
        </div>
        <div class="w-full px-6">
            <form method="POST" action="/logout">
                @csrf
                <button type="submit" class="flex items-center w-full p-3 rounded-md">
                    <i class="mr-4 text-lg ri-logout-circle-line"></i>
                    <span class="font-semibold">Logout</span>
                </button>
            </form>
        </div>
    </div>
</aside>
