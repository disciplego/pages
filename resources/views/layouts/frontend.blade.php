<x-dgo::layouts.base :wrap="'test'">
    @isset($header)

        <x-dgo::wrappers.header>
            @isset($topBar)
                <x-dgo::wrappers.top-bar>
                    {{ $topBar }}
                </x-dgo::wrappers.top-bar>
            @endisset
            @isset($nav)
                <x-dgo::wrappers.nav>
                    {{ $nav }}
                </x-dgo::wrappers.nav>
            @endisset

            {{ $header }}

            @isset($banner)
                <x-dgo::wrappers.banner>
                    {{ $banner }}
                </x-dgo::wrappers.banner>

            @endisset

        </x-dgo::wrappers.header>
    @endisset

    @isset($hero)
        <x-dgo::wrappers.hero>
            {{ $hero }}
        </x-dgo::wrappers.hero>
    @endisset

    @isset($main)
        <x-dgo::wrappers.main>

            @isset($asideLeft)
                <x-dgo::wrappers.aside-left>
                    {{ $asideLeft }}
                </x-dgo::wrappers.aside-left>
            @endisset

            @isset($article)
                <x-dgo::wrappers.article>
                    {{ $article }}
                </x-dgo::wrappers.article>
            @endisset

            @isset($asideRight)
                <x-dgo::wrappers.aside-right>
                    {{ $asideRight }}
                </x-dgo::wrappers.aside-right>
            @endisset


            {{$main}}

        </x-dgo::wrappers.main>
    @endisset

    {{$slot}}

    @isset($preFooter)
        <x-dgo::wrappers.pre-footer>
            {{ $preFooter }}
        </x-dgo::wrappers.pre-footer>
    @endisset

    @isset($footer)
        <x-dgo::wrappers.footer>
            {{ $footer }}
        </x-dgo::wrappers.footer>
    @endisset
</x-dgo::layouts.base>