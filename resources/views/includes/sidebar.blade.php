<div :class="sidebarOpen ? 'block' : 'hidden'" @click="sidebarOpenMethod" class="fixed z-20 inset-0 bg-black opacity-50 transition-opacity lg:hidden"></div>

<div :class="sidebarOpen ? 'translate-x-0 ease-out' : '-translate-x-full ease-in'" class="fixed z-30 inset-y-0 left-0 w-64 transition duration-300 transform bg-gray-900 overflow-y-auto lg:translate-x-0 lg:static lg:inset-0">
    <div class="flex items-center justify-center mt-8">
        <div class="flex items-center">
            <span class="text-white text-2xl mx-2 font-semibold">لوحة التحكم</span>
            <svg class="h-12 w-12" viewBox="0 0 512 512" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M364.61 390.213C304.625 450.196 207.37 450.196 147.386 390.213C117.394 360.22 102.398 320.911 102.398 281.6C102.398 242.291 117.394 202.981 147.386 172.989C147.386 230.4 153.6 281.6 230.4 307.2C230.4 256 256 102.4 294.4 76.7999C320 128 334.618 142.997 364.608 172.989C394.601 202.981 409.597 242.291 409.597 281.6C409.597 320.911 394.601 360.22 364.61 390.213Z" fill="#4C51BF" stroke="#4C51BF" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                <path d="M201.694 387.105C231.686 417.098 280.312 417.098 310.305 387.105C325.301 372.109 332.8 352.456 332.8 332.8C332.8 313.144 325.301 293.491 310.305 278.495C295.309 263.498 288 256 275.2 230.4C256 243.2 243.201 320 243.201 345.6C201.694 345.6 179.2 332.8 179.2 332.8C179.2 352.456 186.698 372.109 201.694 387.105Z" fill="white"/>
            </svg>

        </div>
    </div>

    <nav class="mt-10">

        <a class="flex items-center mt-4 py-2 px-6 bg-opacity-25 text-decoration-none
        {{Request::is('/')? 'bg-gray-700  text-gray-100': 'hover:bg-gray-700  text-gray-500'}}" href="/">
            <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 3.055A9.001 9.001 0 1020.945 13H11V3.055z" />
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20.488 9H15V3.512A9.025 9.025 0 0120.488 9z" />
            </svg>

            <span class="mx-3">لوحة التحكم</span>
        </a>

        @can('super-admin')

        <a class="flex items-center mt-4 py-2 px-6 bg-opacity-25 text-decoration-none
        {{Request::is('users*')? 'bg-gray-700  text-gray-100': 'text-gray-500 hover:bg-gray-700 hover:bg-opacity-25 hover:text-gray-100'}}" href="{{route('users.index')}}">
        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" clip-rule="evenodd" d="M8 11C10.2091 11 12 9.20914 12 7C12 4.79086 10.2091 3 8 3C5.79086 3 4 4.79086 4 7C4 9.20914 5.79086 11 8 11ZM8 9C9.10457 9 10 8.10457 10 7C10 5.89543 9.10457 5 8 5C6.89543 5 6 5.89543 6 7C6 8.10457 6.89543 9 8 9Z" fill="currentColor" /><path d="M11 14C11.5523 14 12 14.4477 12 15V21H14V15C14 13.3431 12.6569 12 11 12H5C3.34315 12 2 13.3431 2 15V21H4V15C4 14.4477 4.44772 14 5 14H11Z" fill="currentColor" /><path d="M18 7H20V9H22V11H20V13H18V11H16V9H18V7Z" fill="currentColor" /></svg>

            <span class="mx-3">المستخدمين</span>

        </a>

        <a class="flex items-center mt-4 py-2 px-6 bg-opacity-25 text-decoration-none
        {{Request::is('organizations*')? 'bg-gray-700  text-gray-100': 'text-gray-500 hover:bg-gray-700 hover:bg-opacity-25 hover:text-gray-100'}}" href="{{route('organizations.index')}}">
        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" clip-rule="evenodd" d="M6 22.8787C4.34315 22.8787 3 21.5355 3 19.8787V9.87866C3 9.84477 3.00169 9.81126 3.00498 9.77823H3C3 9.20227 3.2288 8.64989 3.63607 8.24262L9.87868 2.00002C11.0502 0.828445 12.9497 0.828445 14.1213 2.00002L20.3639 8.24264C20.7712 8.6499 21 9.20227 21 9.77823H20.995C20.9983 9.81126 21 9.84477 21 9.87866V19.8787C21 21.5355 19.6569 22.8787 18 22.8787H6ZM12.7071 3.41423L19 9.70713V19.8787C19 20.4309 18.5523 20.8787 18 20.8787H15V15.8787C15 14.2218 13.6569 12.8787 12 12.8787C10.3431 12.8787 9 14.2218 9 15.8787V20.8787H6C5.44772 20.8787 5 20.4309 5 19.8787V9.7072L11.2929 3.41423C11.6834 3.02371 12.3166 3.02371 12.7071 3.41423Z" fill="currentColor" /></svg>

            <span class="mx-3">الجهات</span>
        </a>

        <a @click="operationToggle" class="flex items-center mt-4 py-2 px-6 text-gray-500 hover:bg-gray-700 hover:bg-opacity-25 text-decoration-none hover:text-gray-100">
            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M8 11C7.44772 11 7 11.4477 7 12C7 12.5523 7.44772 13 8 13H15.9595C16.5118 13 16.9595 12.5523 16.9595 12C16.9595 11.4477 16.5118 11 15.9595 11H8Z" fill="currentColor" /><path d="M8.04053 15.0665C7.48824 15.0665 7.04053 15.5142 7.04053 16.0665C7.04053 16.6188 7.48824 17.0665 8.04053 17.0665H16C16.5523 17.0665 17 16.6188 17 16.0665C17 15.5142 16.5523 15.0665 16 15.0665H8.04053Z" fill="currentColor" /><path fill-rule="evenodd" clip-rule="evenodd" d="M5 3C3.89543 3 3 3.89543 3 5V19C3 20.1046 3.89543 21 5 21H19C20.1046 21 21 20.1046 21 19V5C21 3.89543 20.1046 3 19 3H5ZM7 5H5L5 19H19V5H17V6C17 7.65685 15.6569 9 14 9H10C8.34315 9 7 7.65685 7 6V5ZM9 5V6C9 6.55228 9.44772 7 10 7H14C14.5523 7 15 6.55228 15 6V5H9Z" fill="currentColor" /></svg>
            <span class="mx-3">العمليات</span>
            {{-- Arrow --}}
            <svg v-if="!operationIsOpen" class="fill-current w-3 text-gray-500" version="1.1" id="Layer_1"
                xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px"
                y="0px" viewBox="0 0 491.996 491.996" style="enable-background:new 0 0 491.996 491.996;"
                xml:space="preserve">
                <path
                    d="M484.132,124.986l-16.116-16.228c-5.072-5.068-11.82-7.86-19.032-7.86c-7.208,0-13.964,2.792-19.036,7.86l-183.84,183.848L62.056,108.554c-5.064-5.068-11.82-7.856-19.028-7.856s-13.968,2.788-19.036,7.856l-16.12,16.128c-10.496,10.488-10.496,27.572,0,38.06l219.136,219.924c5.064,5.064,11.812,8.632,19.084,8.632h0.084c7.212,0,13.96-3.572,19.024-8.632l218.932-219.328c5.072-5.064,7.856-12.016,7.864-19.224C491.996,136.902,489.204,130.046,484.132,124.986z" />
            </svg>
            <svg v-else class="fill-current w-3 text-gray-500" version="1.1" id="Layer_1"
                xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px"
                y="0px" viewBox="0 0 491.996 491.996" style="enable-background:new 0 0 491.996 491.996;"
                xml:space="preserve">
                <path
                    d="M484.136,328.473L264.988,109.329c-5.064-5.064-11.816-7.844-19.172-7.844c-7.208,0-13.964,2.78-19.02,7.844L7.852,328.265C2.788,333.333,0,340.089,0,347.297c0,7.208,2.784,13.968,7.852,19.032l16.124,16.124c5.064,5.064,11.824,7.86,19.032,7.86s13.964-2.796,19.032-7.86l183.852-183.852l184.056,184.064c5.064,5.06,11.82,7.852,19.032,7.852c7.208,0,13.96-2.792,19.028-7.852l16.128-16.132C494.624,356.041,494.624,338.965,484.136,328.473z" />
            </svg>
            {{-- Arrow --}}
        </a>
        {{-- Sub --}}
        <div v-if="operationIsOpen">
            <a href="{{route('operation.shipping')}}" class="flex items-center py-2 px-6 text-gray-500 hover:bg-gray-700 hover:bg-opacity-25 text-decoration-none hover:text-gray-100">
                <span class="mx-3">الوكلاء</span>
                {{-- <span class="mx-2 text-gray-300"></span> --}}
            </a>
            <a href="{{route('operation.receiving')}}" class="flex items-center py-2 px-6 text-gray-500 hover:bg-gray-700 hover:bg-opacity-25 text-decoration-none hover:text-gray-100">
                <span class="mx-3">المخابز</span>
                {{-- <span class="mx-2 text-gray-300"></span> --}}
            </a>

        </div>
        {{-- Sub --}}
        @endcan

        @canany(['super-admin', 'tread-mill'])
        <a class="flex items-center mt-4 py-2 px-6 hover:bg-opacity-25 text-decoration-none
        {{Request::is('cteharvests*')? 'bg-gray-700  text-gray-100': 'text-gray-500 hover:bg-gray-700 hover:bg-opacity-25 hover:text-gray-100'}}" href="{{route('cteharvests.index')}}">
            <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 14v6m-3-3h6M6 10h2a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v2a2 2 0 002 2zm10 0h2a2 2 0 002-2V6a2 2 0 00-2-2h-2a2 2 0 00-2 2v2a2 2 0 002 2zM6 20h2a2 2 0 002-2v-2a2 2 0 00-2-2H6a2 2 0 00-2 2v2a2 2 0 002 2z" />
            </svg>

            <span class="mx-3">المطحنة</span>
        </a>
        @endcanany

        @canany(['super-admin', 'agent'])
        <a @click="agentToggle" class="flex items-center mt-4 py-2 px-6 text-gray-500 hover:bg-gray-700 hover:bg-opacity-25 text-decoration-none hover:text-gray-100">
            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" clip-rule="evenodd" d="M17 7C17 5.34315 15.6569 4 14 4H10C8.34315 4 7 5.34315 7 7H6C4.34315 7 3 8.34315 3 10V18C3 19.6569 4.34315 21 6 21H18C19.6569 21 21 19.6569 21 18V10C21 8.34315 19.6569 7 18 7H17ZM14 6H10C9.44772 6 9 6.44772 9 7H15C15 6.44772 14.5523 6 14 6ZM6 9H18C18.5523 9 19 9.44772 19 10V18C19 18.5523 18.5523 19 18 19H6C5.44772 19 5 18.5523 5 18V10C5 9.44772 5.44772 9 6 9Z" fill="currentColor" /></svg>

            <span class="mx-3">الوكيل</span>
            {{-- Arrow --}}
            <svg v-if="!agentIsOpen" class="fill-current w-3 text-gray-500" version="1.1" id="Layer_1"
                xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px"
                y="0px" viewBox="0 0 491.996 491.996" style="enable-background:new 0 0 491.996 491.996;"
                xml:space="preserve">
                <path
                    d="M484.132,124.986l-16.116-16.228c-5.072-5.068-11.82-7.86-19.032-7.86c-7.208,0-13.964,2.792-19.036,7.86l-183.84,183.848L62.056,108.554c-5.064-5.068-11.82-7.856-19.028-7.856s-13.968,2.788-19.036,7.856l-16.12,16.128c-10.496,10.488-10.496,27.572,0,38.06l219.136,219.924c5.064,5.064,11.812,8.632,19.084,8.632h0.084c7.212,0,13.96-3.572,19.024-8.632l218.932-219.328c5.072-5.064,7.856-12.016,7.864-19.224C491.996,136.902,489.204,130.046,484.132,124.986z" />
            </svg>
            <svg v-else class="fill-current w-3 text-gray-500" version="1.1" id="Layer_1"
                xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px"
                y="0px" viewBox="0 0 491.996 491.996" style="enable-background:new 0 0 491.996 491.996;"
                xml:space="preserve">
                <path
                    d="M484.136,328.473L264.988,109.329c-5.064-5.064-11.816-7.844-19.172-7.844c-7.208,0-13.964,2.78-19.02,7.844L7.852,328.265C2.788,333.333,0,340.089,0,347.297c0,7.208,2.784,13.968,7.852,19.032l16.124,16.124c5.064,5.064,11.824,7.86,19.032,7.86s13.964-2.796,19.032-7.86l183.852-183.852l184.056,184.064c5.064,5.06,11.82,7.852,19.032,7.852c7.208,0,13.96-2.792,19.028-7.852l16.128-16.132C494.624,356.041,494.624,338.965,484.136,328.473z" />
            </svg>
            {{-- Arrow --}}
        </a>
        {{-- Sub --}}
        <div v-if="agentIsOpen">
            <a href="{{route('cteagents.index')}}" class="flex items-center py-2 px-6 text-gray-500 hover:bg-gray-700 hover:bg-opacity-25 text-decoration-none hover:text-gray-100">
                <span class="mx-3">الوارد</span>
                {{-- <span class="mx-2 text-gray-300"></span> --}}
            </a>
            <a href="{{route('cteshippings.index')}}" class="flex items-center py-2 px-6 text-gray-500 hover:bg-gray-700 hover:bg-opacity-25 text-decoration-none hover:text-gray-100">
                <span class="mx-3">الشحن</span>
                {{-- <span class="mx-2 text-gray-300"></span> --}}
            </a>
            <a href="{{route('transports.index')}}" class="flex items-center py-2 px-6 text-gray-500 hover:bg-gray-700 hover:bg-opacity-25 text-decoration-none hover:text-gray-100">
                <span class="mx-3">السائقين</span>
                {{-- <span class="mx-2 text-gray-300"></span> --}}
            </a>
        </div>
        {{-- Sub --}}
        @endcanany

        @canany(['super-admin', 'bakery'])
        <a class="flex items-center mt-4 py-2 px-6 hover:bg-opacity-25 text-decoration-none
        {{Request::is('ctereceivings*')? 'bg-gray-700  text-gray-100': 'text-gray-500 hover:bg-gray-700 hover:bg-opacity-25 hover:text-gray-100'}}" href="{{route('ctereceivings.index')}}">
        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M7 6C5.34315 6 4 7.34315 4 9H20C20 7.34315 18.6569 6 17 6H7Z" fill="currentColor" /><path d="M7 18C5.34315 18 4 16.6569 4 15H20C20 16.6569 18.6569 18 17 18H7Z" fill="currentColor" /><path d="M3 11C2.44772 11 2 11.4477 2 12C2 12.5523 2.44772 13 3 13H21C21.5523 13 22 12.5523 22 12C22 11.4477 21.5523 11 21 11H3Z" fill="currentColor" /></svg>

            <span class="mx-3">المخبز</span>
        </a>

        <a class="flex items-center mt-4 py-2 px-6 bg-opacity-25 text-decoration-none
        {{Request::is('consumers*')? 'bg-gray-700  text-gray-100': 'text-gray-500 hover:bg-gray-700 hover:bg-opacity-25 hover:text-gray-100'}}" href="{{route('consumers.index')}}">
        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" clip-rule="evenodd" d="M5.79166 2H1V4H4.2184L6.9872 16.6776H7V17H20V16.7519L22.1932 7.09095L22.5308 6H6.6552L6.08485 3.38852L5.79166 2ZM19.9869 8H7.092L8.62081 15H18.3978L19.9869 8Z" fill="currentColor" /><path d="M10 22C11.1046 22 12 21.1046 12 20C12 18.8954 11.1046 18 10 18C8.89543 18 8 18.8954 8 20C8 21.1046 8.89543 22 10 22Z" fill="currentColor" /><path d="M19 20C19 21.1046 18.1046 22 17 22C15.8954 22 15 21.1046 15 20C15 18.8954 15.8954 18 17 18C18.1046 18 19 18.8954 19 20Z" fill="currentColor" /></svg>
            <span class="mx-3">المستهلكين</span>

        </a>
        @endcanany

    </nav>
</div>

