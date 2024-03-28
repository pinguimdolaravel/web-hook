<?php

use Livewire\Volt\Component;
use Illuminate\Support\Str;
use App\Models\Url;
use Illuminate\Database\Eloquent\Collection;
use Livewire\Attributes\Computed;

new class extends Component {
    public function createNewWebhook(): void
    {
        $url = Url::query()->create([
            'url' => $this->getSlug()
        ]);

        $this->urls [] = $url->url;
    }

    #[Computed]
    public function urls()
    {
        return Url::all();
    }

    public function getSlug()
    {
        $personagens = [
            "Frodo Bolseiro",
            "Samwise 'Sam' Gamgi",
            "Gandalf",
            "Aragorn (Strider)",
            "Legolas",
            "Gimli",
            "Boromir",
            "Arwen Undómiel",
            "Galadriel",
            "Elrond",
            "Saruman",
            "Sauron",
            "Gollum (Smeagol)",
            "Peregrin 'Pippin' Tûk",
            "Meriadoc 'Merry' Brandebuque",
            "Denethor II",
            "Faramir",
            "Théoden",
            "Éomer",
            "Gwaihir"
        ];

        $personagem = Str($personagens[random_int(0, sizeof($personagens) - 1)])->slug()->toString();

        if (Url::query()->whereUrl($personagem)->exists()) {
            return $this->getSlug();
        }

        return $personagem;
    }
}; ?>

<div class="grid grid-cols-2 gap-4 h-full p-10">
    <div class="bg-slate-900 rounded-lg p-4">
        <button class="bg-yellow-500 rounded-lg shadow px-4 text-slate-900 hover:bg-opacity-80" wire:click="createNewWebhook">
            Novo webhook
        </button>

        <ul class="overflow-y-auto h-[600px] text-lg flex flex-col space-y-2">
            @foreach($this->urls as $url)
                <li class="flex justify-between">
                    {{ route('handle-requests', $url) }}
                    <a class="bg-yellow-500 rounded-lg shadow px-4 text-slate-900 hover:bg-opacity-80" href="{{ route('handle-requests', $url) }}?test=1" target="_blank">
                        test
                    </a>
                </li>
            @endforeach
        </ul>
    </div>
    <div class="bg-slate-900 rounded-lg p-4 overflow-y-auto">
        kajsd
    </div>
</div>
