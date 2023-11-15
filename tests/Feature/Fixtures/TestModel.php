<?php

namespace Dgo\Pages\Tests\Feature\Fixtures;

use Dgo\Pages\Traits\Pageable;
use Illuminate\Database\Eloquent\Model;

class TestModel extends Model
{
    use Pageable;

    protected $table = 'test_models';

    protected $fillable = ['title'];


}