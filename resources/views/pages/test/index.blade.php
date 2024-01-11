<?php

use Illuminate\View\View;
use function Laravel\Folio\{render};
use function Dgo\Pages\checkForDataPage;

render(function () {
    return checkForDataPage();
});

?>
<x-dgo::layouts.app>
    <x-slot:header>

        <x-slot:topBar>

        </x-slot:topBar>

        <x-slot:nav>
            <x-dgo::blocks.navbar.default/>
        </x-slot:nav>

        <x-slot:banner>

        </x-slot:banner>

    </x-slot:header>

    <x-slot:hero>
        <h1>Index Pages Testing</h1>
        <p>This is the folio folder index blade route.</p>
    </x-slot:hero>

    <x-slot:main>

        <x-slot:asideLeft>

        </x-slot:asideLeft>

        <x-slot:article>

        </x-slot:article>

        <x-slot:asideRight>

        </x-slot:asideRight>

    </x-slot:main>

    <x-slot:preFooter>

    </x-slot:preFooter>

    <x-slot:footer>

    </x-slot:footer>


</x-dgo::layouts.app>

