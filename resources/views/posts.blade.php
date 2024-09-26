<x-layout>
  <x-slot:title>{{ $title }}
<!-- Modal toggle -->
@auth
    <div class="flex justify-center m-5">
  <button id="defaultModalButton" data-modal-target="defaultModal" data-modal-toggle="defaultModal" class="block text-white bg-blue-600 hover:bg-blue-700 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-500 dark:hover:bg-blue-600 dark:focus:ring-blue-800" type="button">
    Create Blog
  </button>
</div>
@endauth
@guest
<div class="flex justify-center m-5">
    <button onclick="alert('Login untuk membuat blog!!')" class="block text-white bg-blue-600 hover:bg-blue-700 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-500 dark:hover:bg-blue-600 dark:focus:ring-blue-800" type="button">
      Create Blog
    </button>
  </div>
@endguest



<!-- Main modal -->
<div id="defaultModal" tabindex="-1" aria-hidden="true" class="hidden fixed inset-0 z-50 overflow-y-auto  justify-center items-center">
  <div class="relative p-4 w-full max-w-2xl h-full md:h-auto">
      <!-- Modal content -->
      <div class="relative bg-white rounded-lg shadow dark:bg-gray-800">
          <!-- Modal header -->
          <div class="flex justify-between items-center p-5 rounded-t border-b dark:border-gray-700">
              <h3 class="text-xl font-medium text-gray-900 dark:text-white">
                  Add Blog
              </h3>
              <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-toggle="defaultModal">
                  <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                      <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                  </svg>
                  <span class="sr-only">Close modal</span>
              </button>
          </div>
          <!-- Modal body -->
          <form action="/post/create" method="POST">
            <div class="p-6 space-y-6">
                @csrf
                <div>
                    <label for="title" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Blog Title</label>
                    <input type="text" name="title" id="title" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Enter blog title" required>
                </div>
                <div>
                    <label for="category" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Category</label>
                    <select id="category" name="category" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
                        @foreach ($genres as $genre)
                            <option type="hidden" name="category_id" value="{{ $genre->id}}">{{ $genre->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div>
                    <label for="slug" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"      >Sub title</label>
                    <input id="slug" name="slug" rows="4" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Isi untuk sub title" required></input>
                </div>
                <div>
                    <label for="body" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Blog Content</label>
                    <textarea id="body" name="body" rows="4" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Isi artikel kamu disini" required></textarea>
                </div>
            </div>
            <!-- Modal footer -->
            <div class="flex items-center p-6 space-x-2 rounded-b border-t border-gray-200 dark:border-gray-700">
                <button type="submit" class="text-white bg-blue-600 hover:bg-blue-700 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-500 dark:hover:bg-blue-600 dark:focus:ring-blue-800">
                    Add new blog
                </button>
                <button type="button" class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-blue-300 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600" data-modal-toggle="defaultModal">
                    Cancel
                </button>
            </div>
        </form>        
      </div>
  </div>
</div>

</x-slot>
  <div class="py-4 px-4 mx-auto max-w-screen-xl  lg:px-6">
    <div class="mx-auto max-w-screen-md sm:text-center">
        <form action="/posts" method="GET">
            <div class="items-center mx-auto mb-3 space-y-4 max-w-screen-sm sm:flex sm:space-y-0">
                <div class="relative w-full">
                    <label for="search" class="hidden mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Search</label>
                    <div class="flex absolute inset-y-0 left-0 items-center pl-3 pointer-events-none">
                      <svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                        <path stroke="currentColor" stroke-linecap="round" stroke-width="2" d="m21 21-3.5-3.5M17 10a7 7 0 1 1-14 0 7 7 0 0 1 14 0Z"/>
                      </svg>
                    </div>
                    <input class="block p-3 pl-10 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 sm:rounded-none sm:rounded-l-lg focus:ring-primary-500 focus:border-primary-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Search article" type="search" id="search" name="search" autocomplete="off">
                </div>
                <div>
                    <button type="submit" class="py-3 px-5 w-full text-sm font-medium text-center text-white rounded-lg border cursor-pointer bg-primary-700 border-primary-600 sm:rounded-none sm:rounded-r-lg hover:bg-primary-800 focus:ring-4 focus:ring-primary-300 dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800">Search</button>
                </div>
            </div>
        </form>
    </div>
</div>
  {{-- <h3 class="text-xl"> Welcome to my Blog</h3> --}}

    <div class="py-4 px-4 mx-auto max-w-screen-xl lg:py-8 lg:px-0">    
        <div class="grid gap-8 lg:grid-cols-3">
  @foreach ($posts as $post )
          <article class="p-6 bg-white rounded-lg border border-gray-200 shadow-md dark:bg-gray-800 dark:border-gray-700">
              <div class="flex justify-between items-center mb-5 text-gray-500">
               <a href="/categories/{{ $post->category->slug }}">
                  <span class="bg-{{ $post->category->color }}-100 text-primary-800 text-xs font-medium inline-flex items-center px-2.5 py-0.5 rounded dark:bg-primary-200 dark:text-primary-800">
                    {{ $post->category->name }}
                  </span>
                 </a>
                  <span class="text-sm">{{ $post->created_at->diffForHumans() }}</span>
              </div><a href="/post/{{ $post->slug }}">
              <h2 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white hover:underline" >{{ $post->title }}</h2></a>
              <p class="mb-5 font-light text-gray-500 dark:text-gray-400">{{ Str::limit($post->body,100) }}</p>
              <div class="flex justify-between items-center">
                <a href="/authors/{{ $post->author->username  }}">
                  <div class="flex items-center space-x-4">
                      <img class="w-7 h-7 rounded-full" src="https://flowbite.s3.amazonaws.com/blocks/marketing-ui/avatars/jese-leos.png" alt="{{ $post->author->name }}" />
                      <span class="font-medium text-sm dark:text-white">
                          {{ $post->author->name }}
                      </span>
                  </div>  
                </a>
                  <a href="/post/{{ $post->slug }}" class="inline-flex items-center font-medium text-primary-600 dark:text-primary-500 hover:underline">
                      Read more
                      <svg class="ml-2 w-4 h-4" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                  </a>
              </div>
          </article>                 
  @endforeach
</div>  
</div>
{{-- Create section --}}


</x-layout> 