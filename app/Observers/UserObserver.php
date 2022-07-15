<?php

namespace App\Observers;

use App\Models\User;
use Illuminate\Support\Facades\Storage;

class UserObserver
{
    public function deleting(User $user)
    {
        if ($user->image) {
            Storage::delete($user->image->url);
        }
    }
}
