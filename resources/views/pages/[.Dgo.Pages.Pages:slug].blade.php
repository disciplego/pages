<?php

use Illuminate\View\View;
use function Laravel\Folio\{render};
use function Dgo\Pages\checkForDataPage;
use function Laravel\Folio\name;

name('page.index');

render(function (View $view) {
    return checkForDataPage() ?? abort(404);
});

?>