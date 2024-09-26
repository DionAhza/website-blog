<x-layout>
  <x-slot:title>{{ $title }}</x-slot>
  {{-- <h3 class="text-xl"> Welcome to my Blog</h3> --}}
  
  {{-- <article class="py-8 max-w-screen-md border-b">
    <h2 class="mb-1 text-3xl tracking-tight font-bold text-gray-900">{{ $post['title'] }}</h2>
  
    <div >
      By
      <a class="text-base text-gray-500 hover:underline" href="/authors/{{ $post->author->username }}" >{{ $post->author->name }}</a> |
      <a class="text-base text-gray-500 hover:underline" href="/categories/{{ $post->category->slug }}" >{{ $post->category->name }}</a>|
       {{ $post->created_at->diffForHumans() }} 
    </div>
    <p class=" my-4 font-light">{{ $post['body'] }}</p>
    <a href="/posts" class="font-medium text-blue-500 hover:underline">Back to posts &laquo;</a>
  </article> --}}
  <!-- 
Install the "flowbite-typography" NPM package to apply styles and format the article content: 

URL: https://flowbite.com/docs/components/typography/ 
-->

<main class="pt-8 pb-16 lg:pt-16 lg:pb-24 bg-white dark:bg-gray-900 antialiased">
  <div class="flex justify-between px-4 mx-auto max-w-screen-xl ">
      <article class="mx-auto w-full max-w-4xl format format-sm sm:format-base lg:format-lg format-blue dark:format-invert">
          <header class="mb-4 lg:mb-6 not-format">
           
              <address class="flex items-center mb-6 not-italic">
                  <div class="inline-flex items-center mr-3 text-sm text-gray-900 dark:text-white">
                      <img class="mr-4 w-16 h-16 rounded-full" src="https://flowbite.com/docs/images/people/profile-picture-2.jpg" alt="{{ $post->author->name }}">
                      <div>
                          <a href="/authors/{{ $post->author->username }}" rel="author" class="text-xl font-bold text-gray-900 dark:text-white">{{ $post->author->name }}</a>
                          <p class="text-base text-gray-500 dark:text-gray-400">{{ $post->created_at->diffForHumans() }}</p>
                          <a href="/categories/{{ $post->category->slug }}">
                            <span class="bg-{{ $post->category->color }}-100 text-primary-800 text-xs font-medium inline-flex items-center px-2.5 py-0.5 rounded dark:bg-primary-200 dark:text-primary-800">
                              {{ $post->category->name }}
                            </span>
                           </a>
                      </div>
                  </div>
              </address>
              <h1 class="mb-4 text-3xl font-extrabold leading-tight text-gray-900 lg:mb-6 lg:text-4xl dark:text-white">{{ $post->title }}</h1>
          </header>
          <p>{{ $post->body }}</p> 
          <a href="/posts" class="font-medium text-xl text-blue-500 hover:underline">&laquo; back</a>
          </article>
  </div>
</main>

</x-layout>;