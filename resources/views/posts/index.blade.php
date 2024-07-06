<x-app-layout>
    <div class="max-w-xl mx-auto p-4">
        @if (session('message'))
            <div class="bg-red-100 text-red400 p-2 mb-6 rounded">{{ session('message') }}</div>
        @endif
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
        <div class="mt-6">
            @foreach ($posts as $post)
                <div class="mt-2 p-6 bg-white border-2 border-b-gray-400 rounded-4">
                    <span class="text-gray-600">{{ $post->user->name }}</span>
                    {{-- <div class="mt-l text-lg">{{ $post->content }}</div> --}}
                    <div class="mt-1 text-lg">
                        {{ $post->content }}
                        @unless ($post->created_at->eq($post->updated_at))
                            <span class="text-sm text-gray-600 ml-auto">(edited)</span>
                        @endunless
                    </div>
                    @if ($post->user->is(auth()->user()))
                        <div class="ml-auto mt-auto">
                            <form action="{{ route('posts.edit', $post) }}" method="get">
                                <x-secondary-button type="submit">Edit</x-secondary-button>
                            </form>
                        </div>
                    @endif
                </div>
            @endforeach
        </div>
    </div>
</x-app-layout>
