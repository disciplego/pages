<?php


use Dgo\ModelHelp\Traits\HasTitleIdentifier;
use Dgo\Pages\Traits\Menuable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphOne;


it('uses the Menuable and HasTitleIdentifier traits', function () {
    // Create a test model that uses the Menuable trait
    class MenuableModel extends Model
    {
        use Menuable;

    }
    $model = new MenuableModel;

    // Check if the model uses the specific traits
    expect(in_array(Menuable::class, class_uses_recursive($model)))->toBeTrue()
        ->and(in_array(HasTitleIdentifier::class, class_uses_recursive($model)))->toBeTrue();
});

it('has a MorphOne relationship with Item', function () {
    // Create a test model that uses the Menuable trait
    class MenuableModel2 extends Model
    {
        use Menuable;

    }
    $model = new MenuableModel2;

    // Check if the item() method returns a MorphOne relationship
    $relation = $model->item();
    expect($relation)->toBeInstanceOf(MorphOne::class);
});

