<x-layout>

    <x-slot:title>{{ $title }}</x-slot:title>
      
    {{-- <article class="py-5 max-w-screen-md border-b border-gray-300">
    
        <h2 class="mb-1 text-3xl tracking-tight font-bold text-gray-900 ">{{ $blog['title'] }}</h2>

        <div class="text-base text-gray-500">
         {{$blog->author->name }} | {{ $blog->created_at->diffForHumans() }}
        </div>
          <p class="my-4 font-light">
            {{ $blog['content'] }}
          </p>
          <a href="/Blogs" class="font-medium text-blue-600"> &laquo; Back to blogs </a>
        </article> --}}
  
        <article class="p-6 bg-white rounded-lg border border-gray-200 shadow-md dark:bg-gray-800 dark:border-gray-700">
          <div class="flex justify-between items-center mb-5 text-gray-500">
              <span class="bg-primary-100 text-primary-800 text-xs font-medium inline-flex items-center px-2.5 py-0.5 rounded dark:bg-primary-200 dark:text-primary-800">
                  <svg class="mr-1 w-3 h-3" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M2 6a2 2 0 012-2h6a2 2 0 012 2v8a2 2 0 01-2 2H4a2 2 0 01-2-2V6zM14.553 7.106A1 1 0 0014 8v4a1 1 0 00.553.894l2 1A1 1 0 0018 13V7a1 1 0 00-1.447-.894l-2 1z"></path></svg>
                <a href="/Blogs?category={{ $blog->category->slug }}"> {{ $blog->category->name }}</a> 
              </span>
              <span class="text-sm"> {{ $blog->created_at->diffForHumans() }}</span>
          </div>
          <h2 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">{{ $blog['title'] }}</h2>
          <p class="mb-5 font-light text-gray-500 dark:text-gray-400">{{ $blog['content'] }}</p>
          <div class="flex justify-between items-center">
              <div class="flex items-center space-x-4">
                  <img class="w-7 h-7 rounded-full" src="https://flowbite.s3.amazonaws.com/blocks/marketing-ui/avatars/jese-leos.png" alt="Jese Leos avatar" />
                  <span class="font-medium dark:text-white">
                    <a href="/authors/{{$blog->author->username }}">{{$blog->author->name }}</a>
                  </span>
              </div>
              <a href="/Blogs" class="inline-flex items-center font-medium text-primary-600 dark:text-primary-500 hover:underline">
                  &laquo; Back To Blogs
              </a>
          </div>
      </article>        
      </x-layout>