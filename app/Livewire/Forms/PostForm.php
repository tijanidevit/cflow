<?php

namespace App\Livewire\Forms;

use App\Models\SocialMediaAccount;
use App\Notifications\PostScheduledNotification;
use Livewire\Form;
use RocketAPI\InstagramAPI;

class PostForm extends Form
{

    public $followers = [];

    public $content;
    public $file;
    public $file_path;
    public $account;
    public $scheduled_at;
    public $social_media_account_id;

    protected $rules = [
        'content' => 'required|string|max:500',
        'social_media_account_id' => 'required|exists:social_media_accounts,id',
        'file' => 'required|file|mimes:jpeg,png,jpg,gif,mp4', // I accept images and mp4 videos here
        'scheduled_at' => 'required|date|after:now',
    ];


    public function store(): void {
        $this->validate();
        $this->file_path  = $this->file?->store('posts', 'public');

        $user = auth()->user();

        $post = $user->posts()->create($this->all());

        $user->notify(new PostScheduledNotification($post));

        session()->flash('success', 'Post scheduled successfully!');
        $this->reset();
    }

    public function setFollowers($value) : void {
        $account = SocialMediaAccount::find($value);
        $api = new InstagramAPI(config('services.rocket_api.key'));

        $data = $api->getUserFollowers($account->account_id, 12);

        if ($data['status'] == 'ok') {
            $this->followers = $data['users'];
        }

    }
}
