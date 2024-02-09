<x-app-layout>   
        <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">  
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <table class="w-full">
                        Tasks
                            <tr>
                                <td>Title</td>
                                <td>Description</td>
                                <td>Due Date</td>
                                <td>Category</td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                        </thead>
                        @foreach($tasks as $task)
                            <tr>
                                <td>{{$task->title}}</td>
                                <td>{{$task->description}}</td>
                                <td>{{$task->due_date}}</td>
                                <td>{{$task->category}}</td>
                                <td> <a href="{{ route('tasks.show', $task->id) }}" class="btn btn-primary btn-sm">View</a></td>
                                <td> <a href="{{ route('tasks.edit', $task->id) }}" class="btn btn-primary btn-sm">Edit</a></td>
                                <td> <a href="{{ route('tasks.destroy', $task->id) }}" class="btn btn-primary btn-sm">Delete</a></td>
                            </tr>
                        @endforeach
                        
                    </table>
                    <br />
                    <div class="">
                        <a class="btn btn-sm btn-success" href="{{ route('tasks.create') }}">Add task</a>
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