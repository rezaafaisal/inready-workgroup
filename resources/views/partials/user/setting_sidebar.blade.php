<aside class="w-3/12">
    <h3 class="text-3xl font-light">Pengaturan</h3>
    <ul class="mt-5 font-extralight">
        <li class="text-xl">
            <a href="{{ route('user.setting.profile') }}" class="py-4 px-7 block hover:bg-gray-200 setting-active">
                <i class="las la-user w-8 text-2xl"></i>
                <span>Profil</span>
            </a>
        </li>
        <li class="text-xl">
            <a href="{{ route('user.setting.personal') }}" class="py-4 px-7 block hover:bg-gray-200">
                <i class="las la-user-cog w-8 text-2xl"></i>
                <span>Data Pribadi</span>
            </a>
        </li>
        <li class="text-xl">
            <a href="#" class="py-4 px-7 block hover:bg-gray-200">
                <i class="las la-user-shield w-8 text-2xl"></i>
                <span>Akun</span>
            </a>
        </li>
    </ul>
</aside>
