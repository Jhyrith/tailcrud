<x-app-layout>   
        <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">  
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <table class="w-full">
                        Categories
                            <tr>
                                <td>Title</td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                        </thead>
                        @foreach($categories as $category)
                            <tr>
                                <td>{{$category->title}}</td>
                                <td> <a href="{{ route('categories.show', $category->id) }}" class="btn btn-primary btn-sm">View</a></td>
                                <td> <a href="{{ route('categories.edit', $category->id) }}" class="btn btn-primary btn-sm">Edit</a></td>
                                <td> <a href="{{ route('categories.destroy', $category->id) }}" class="btn btn-primary btn-sm">Delete</a></td>
                            </tr>
                        @endforeach
                        
                    </table>
                    <br />
                    <div class="">
                        <a class="btn btn-sm btn-success" href="{{ route('categories.create') }}">Add category</a>
                     </div>
                     <br />
                     @if (session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif

 
                </div>
            </div>
        </div>
    </div>
     
  


</x-app-layout>