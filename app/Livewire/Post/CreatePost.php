<?php

namespace App\Livewire\Post;

use App\Livewire\Forms\PostForm;
use App\Models\Post;
use App\Models\SocialMediaAccount;
use App\Notifications\PostScheduledNotification;
use Livewire\Component;
use Livewire\Features\SupportFileUploads\WithFileUploads;

class CreatePost extends Component
{
    use WithFileUploads;

    public PostForm $form;

    public function submit()
    {
        $this->form->store();
    }

    public function render()
    {
        $socialMediaAccounts = SocialMediaAccount::get();
        return view('livewire.post.create-post', compact('socialMediaAccounts'));
    }

    public function accountChanged($value) : void {
        $this->form->setFollowers($value);
    }

}
