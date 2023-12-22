<div>
    <x-slot:header>

        <x-slot:topBar>

        </x-slot:topBar>

        <x-slot:nav>
            <x-dgo::blocks.navbar />
        </x-slot:nav>

        <x-slot:banner>
            <x-dgo::blocks.breadcrumb />

        </x-slot:banner>

        <x-dgo::blocks.alert.default :type="'danger'"/>

    </x-slot:header>
    <x-slot:hero>
        <x-dgo::email-subscribe-simple-form/>
        <x-dgo::blocks.jumbotron.default/>
    </x-slot:hero>

    <x-slot:main>
        <x-slot:asideLeft>
            <x-dgo::blocks.aside.navigation/>
        </x-slot:asideLeft>
        <x-slot:article>
            <x-dgo::blocks.blog.post/>
        </x-slot:article>
        <x-slot:asideRight>
            <x-dgo::blocks.aside.sidebar/>
        </x-slot:asideRight>


    </x-slot:main>

    <x-slot:preFooter>

    </x-slot:preFooter>

    <x-slot:footer>
        <x-dgo::blocks.footer.default/>
    </x-slot:footer>
</div>




