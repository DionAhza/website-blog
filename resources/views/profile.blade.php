<x-layout>
    <x-slot:title>{{ $user->name." ".$title }}</x-slot>
    <div class="container">
        <header>
            <h1 class="font-bold text-center py-3 text-gray-800" >User Profile</h1>
        </header>
        <div class="profile">
            <img src="https://media.licdn.com/dms/image/v2/C5103AQESAKqtV_IhIA/profile-displayphoto-shrink_200_200/profile-displayphoto-shrink_200_200/0/1545183234135?e=2147483647&v=beta&t=RJRR6YiVkZCW7SSwhJG1xjsStxemUEOrZPD85Vv-Z60" alt="Profile Picture" class="profile-pic">
            <div class="profile-info">
                <h2 id="username">{{ $user->name }}</h2>
                <p id="email">{{ $user->email }}</p>
                <p id="bio">Telah Menulis {{ $jumlah }} artikel</p>
                <button id="editProfileBtn" class="button-profile">Edit Profile</button>
            </div>
        </div>
    </div>

    <script>
        document.getElementById('editProfileBtn').addEventListener('click', function() {
            alert('Edit Profile button clicked!');
            // Tambahkan logika untuk menunjukkan form edit atau redirect ke halaman edit.
        });
    </script>

    <style>
       /* body {
    font-family: Arial, sans-serif;
    margin: 0;
    padding: 0;
    background-color: #f4f4f4;
} */

.container {
    width: 80%;
    margin: 0 auto;
    padding: 20px;
    background: #fff;
    border-radius: 8px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
}

header {
    text-align: center;
    margin-bottom: 20px;
}

.profile {
    display: flex;
    align-items: center;
}

.profile-pic {
    border-radius: 50%;
    width: 150px;
    height: 150px;
    margin-right: 20px;
}

.profile-info {
    max-width: 500px;
}

.profile-info h2 {
    margin: 0;
    font-size: 24px;
    color: #333;
}



.button-profile {
    background-color: #007bff;
    color: #fff;
    border: none;
    padding: 10px 20px;
    border-radius: 5px;
    cursor: pointer;
    font-size: 16px;
}

.button-profile:hover {
    background-color: #0056b3;
}

    </style>
       
    <div class="max-w-4xl mx-auto my-12">
        <h1 class="text-4xl font-bold text-center py-3 text-gray-800">
            Artikel Anda 
        </h1>
        <hr class="border-t-2 border-gray-300 w-1/2 mx-auto my-6">
    </div>
    @if (session('delete'))
       <div id="alert" class="bg-green-100 border-l-4 border-red-500 text-red-700 p-4 mb-4" role="alert">
           <p class="font-bold">Berhasil menghapus data</p>
           <p>{{ session('success') }}</p>
       </div>
   
       <script>
           setTimeout(function() {
               document.getElementById('alert').style.display = 'none';
           }, 3000); // Alert akan menghilang setelah 3 detik
       </script>
   @endif
       @if (session('update'))
       <div id="alert" class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4 mb-4" role="alert">
           <p class="font-bold">Success</p>
           <p>{{ session('success') }}</p>
       </div>
   
       <script>
           setTimeout(function() {
               document.getElementById('alert').style.display = 'none';
           }, 3000); // Alert akan menghilang setelah 3 detik
       </script>
   @endif
    @if ($jumlah == 0)
        <h2 class="text-3xl font-bold text-center text-gray-800">Anda belum mempunyai artikel !!</h2>
    @endif

     @foreach ($posts as $post )
     <article class="p-6 my-4 bg-white rounded-lg border border-gray-200 shadow-md dark:bg-gray-800 dark:border-gray-700">
        <div class="flex justify-between items-center mb-5 text-gray-500">
            <a href="/categories/{{ $post->category->slug }}">
                <span class="bg-{{ $post->category->color }}-100 text-primary-800 text-xs font-medium inline-flex items-center px-2.5 py-0.5 rounded dark:bg-primary-200 dark:text-primary-800">
                    {{ $post->category->name }}
                </span>
            </a>
            <span class="text-sm">{{ $post->created_at->diffForHumans() }}</span>
        </div>
        
        <a href="/post/{{ $post->slug }}">
            <h2 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white hover:underline">
                {{ $post->title }}
            </h2>
        </a>
        
        <p class="mb-5 font-light text-gray-500 dark:text-gray-400">
            {{ Str::limit($post->body, 100) }}
        </p>
        
        <div class="flex justify-between items-center">
            <a href="/authors/{{ $post->author->username }}">
                <div class="flex items-center space-x-4">
                    <img class="w-7 h-7 rounded-full" src="https://flowbite.s3.amazonaws.com/blocks/marketing-ui/avatars/jese-leos.png" alt="{{ $post->author->name }}" />
                    <span class="font-medium text-sm dark:text-white">
                        {{ $post->author->name }}
                    </span>
                </div>
            </a>
            
            <div class="flex space-x-3">
                <a href="/post/{{ $post->slug }}" class="inline-flex items-center font-medium text-primary-600 dark:text-primary-500 hover:underline">
                    Read more
                    <svg class="ml-2 w-4 h-4" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                </a>
                
                <!-- Update Button -->
                <button>
                <a id="updateProductButton" data-modal-target="updateProductModal{{ $post->slug }}" data-modal-toggle="updateProductModal{{ $post->slug }}" class="inline-flex items-center px-3 py-1.5 text-sm font-medium text-blue-600 bg-blue-100 rounded-lg hover:bg-blue-200 focus:outline-none dark:bg-blue-600 dark:text-white dark:hover:bg-blue-500">
                    Update
                    <svg class="ml-2 w-4 h-4" fill="currentColor" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" stroke="currentColor"><path d="M12.293 2.293a1 1 0 011.414 0L17.414 6a1 1 0 010 1.414l-9 9a1 1 0 01-.52.272l-5 1a1 1 0 01-1.211-1.211l1-5a1 1 0 01.272-.52l9-9zM15 7l-2-2-8.586 8.586L5 13l1.414.414L15 7z"></path></svg>
                </a>
                </button>
                <!-- Delete Button -->
                <form action="{{ route('post.destroy',$post->slug,'delete') }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this post?');">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="inline-flex items-center px-3 py-1.5 text-sm font-medium text-red-600 bg-red-100 rounded-lg hover:bg-red-200 focus:outline-none dark:bg-red-600 dark:text-white dark:hover:bg-red-500">
                        Delete
                        <svg class="ml-2 w-4 h-4" fill="currentColor" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" stroke="currentColor"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-11a1 1 0 10-2 0v3H7a1 1 0 100 2h2v3a1 1 0 102 0v-3h2a1 1 0 100-2h-2V7z" clip-rule="evenodd"></path></svg>
                    </button>
                </form>
            </div>
        </div>
    </article>
      
     @endforeach
</x-layout>
{{-- --------------------------------- --}}
<!-- Modal toggle -->
{{-- <div class="flex justify-center m-5">
    <button id="updateProductButton" data-modal-target="updateProductModal{{ $post->slug }}" data-modal-toggle="updateProductModal{{ $post->slug }}" class="block text-white bg-primary-700 hover:bg-primary-800 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800" type="button">
    Update product
    </button>
</div> --}}

<!-- Main modal -->
<div id="updateProductModal{{ $post->slug }}" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-modal md:h-full">
    <div class="relative p-4 w-full max-w-2xl h-full md:h-auto">
        <!-- Modal content -->
        <div class="relative p-4 bg-white rounded-lg shadow dark:bg-gray-800 sm:p-5">
            <!-- Modal header -->
            <div class="flex justify-between items-center pb-4 mb-4 rounded-t border-b sm:mb-5 dark:border-gray-600">
                <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
                    Update Product
                </h3>
                <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-toggle="updateProductModal{{ $post->slug }}">
                    <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                    <span class="sr-only">Close modal</span>
                </button>
            </div>
            <!-- Modal body -->
            @if ($jumlah > 0)
                
            <form action="{{ route('post.update', $post->slug ) }}" method="POST">
                @csrf
                @method('PUT')
                
                <div class="grid gap-4 mb-4 sm:grid-cols-2">
                    <div>
                        <label for="title" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Title</label>
                        <input type="text" name="title" id="title" 
                               value="{{ old('title', $post->title) }}" 
                               class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" 
                               placeholder="Ex. Apple iMac 27&ldquo;">
                    </div>
                    
                    <div>
                        <label for="category" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Category</label>
                        <select id="category" name="category_id" 
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                            @foreach ($genres as $genre)
                                <option value="{{ $genre->id }}" {{ $genre->id == old('category_id', $post->category_id) ? 'selected' : '' }}>
                                    {{ $genre->name }}
                                </option>
                            @endforeach
                        </select>
                        
                    </div>
                    
                    <div class="sm:col-span-2">
                        <label for="body" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Description</label>
                        <textarea id="body" name="body" rows="5"
                                  class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-primary-500 focus:border-primary-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                  placeholder="Write a description...">{{ old('description', $post->body) }}</textarea>                    
                    </div>
                </div>
                
                <div class="flex items-center space-x-4">
                    <button type="submit" class="text-white bg-primary-700 hover:bg-primary-800 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800">
                        Update blog
                    </button>
                </div>
            </form>
            @endif
        </div>
    </div>
</div>