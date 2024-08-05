<x-layouts.app>
    {{-- <h1>Blog</h1>
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
        @foreach ($posts as $post)
            <div class="bg-white rounded-lg shadow-md p-4">
                <h2 class="text-xl font-bold"><a href="{{ route('blog.show', $post->slug) }}">{{ $post->title }}</a></h2>
                <p class="text-gray-600">{{ $post->created_at->diffForHumans() }}</p>
                <p>{{ Str::limit($post->content, 100) }}</p>
                <a href="{{ route('blog.show', $post->slug) }}" class="text-blue-500 hover:underline">Read More</a>
            </div>
        @endforeach
    </div>
    {{ $posts->links() }} --}}






    <div class="blog">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="blog_posts d-flex flex-row align-items-start justify-content-between">
                        @foreach ($posts as $post)
                            <!-- Blog post -->
                            <div class="blog_post">
                                <div class="blog_image" style="background-image:url(images/blog_1.jpg)"></div>
                                <div class="blog_text">{{ $post->title }}</div>
                                <p class="text-gray-600">{{ $post->created_at->diffForHumans() }}</p>

                                <div class="blog_button"><a href="blog_single.html">Continue Reading</a></div>
                            </div>
                        @endforeach

                        <div class="mt-4">
                            <nav aria-label="Page navigation">
                                {{ $posts->links('pagination::bootstrap-5') }}
                            </nav>
                        </div>



                    </div>
                </div>

            </div>
        </div>
    </div>
</x-layouts.app>
