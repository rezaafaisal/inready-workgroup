<aside x-data="{show:false}" :class="show?'left-0':'-left-full'" class="fixed z-10 top-20 w-full py-5 md:p-0 h-screen bg-white md:bg-transparent md:static md:w-3/12 shrink-0 duration-200">
    <button @click="show=true" class="-right-10 md:hidden absolute bg-white  w-10 h-12 rounded shadow-md rounded-l-none flex justify-center items-center"><i class="fas fa-angle-right"></i></button>
    <button @click="show=false" class="absolute md:hidden right-5"><i class="fas fa-xmark"></i></button>
    <h3 class="text-3xl text-slate-400 md:text-inr-black font-light ml-7 md:ml-0">Pengaturan</h3>
    <ul class="mt-5 font-extralight">
        <li class="text-xl">
            <a href="{{ route('user.setting.profile') }}" class="py-4 px-7 block hover:bg-gray-200 {{ ($active == 'profile') ? 'setting-active' : '' }}">
                <i class="las la-user w-8 text-2xl"></i>
                <span>Profil</span>
            </a>
        </li>
        <li class="text-xl">
            <a href="{{ route('user.setting.personal') }}" class="py-4 px-7 block hover:bg-gray-200  {{ ($active == 'personal') ? 'setting-active' : '' }}">
                <i class="las la-user-cog w-8 text-2xl"></i>
                <span>Data Pribadi</span>
            </a>
        </li>
        <li class="text-xl">
            <a href="{{ route('user.setting.account') }}" class="py-4 px-7 block hover:bg-gray-200  {{ ($active == 'account') ? 'setting-active' : '' }}">
                <i class="las la-user-shield w-8 text-2xl"></i>
                <span>Akun</span>
            </a>
        </li>
        <li class="text-xl">
            <a href="{{ route('user.setting.etcetera') }}" class="py-4 px-7 block hover:bg-gray-200  {{ ($active == 'etcetera') ? 'setting-active' : '' }}">
                <i class="las la-user-tag w-8 text-2xl"></i>
                <span>Lainnya</span>
            </a>
        </li>
    </ul>
</aside>
