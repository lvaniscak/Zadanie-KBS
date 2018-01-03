<?php

namespace App\Users;


use Laracasts\Presenter\Presenter;

class UserPresenter extends Presenter
{
    public function nameWithEmail()
    {
        return $this->name . ' (' . $this->email . ')';
    }


}
