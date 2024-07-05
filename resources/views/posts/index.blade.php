<x-app-layout>
    <div class="max-w-xl mx-auto p-4">
        <form action="{{ route('posts.store') }}" method="post">
            @csrf
            <div class="flex">
                <x-text-input name="content" placeholder="What's Happening?" class="w-full"></x-text-input>
                <x-primary-button class="ml-px">Post</x-primary-button>
            </div>
            <div>
                <x-input-error :messages="$errors->get('content')" />
            </div>
        </form>
    </div>
</x-app-layout>
