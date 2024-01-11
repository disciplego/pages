<?php

use Illuminate\View\View;
use function Laravel\Folio\{render};
use function Dgo\Pages\checkForDataPage;

render(function (View $view) {
    return checkForDataPage() ?? abort(404);
});

?>