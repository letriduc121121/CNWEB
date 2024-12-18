@extends('tasks.app')

@section('content')
    <h1>Danh sách Task</h1>

    <!-- Button to add new task -->
    <a href="{{ route('tasks.create') }}" class="btn btn-primary">Thêm mới</a>
    
    <!-- Task List Table -->
    <table class="table mt-3">
        <thead>
            <tr>
                <th>ID</th>
                <th>Tiêu đề</th>
                <th>Mô tả</th>
                <th>Trạng thái</th>
                <th>Hành động</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($tasks as $task)
                <tr>
                    <td>{{ $task->id }}</td>
                    <td>{{ $task->title }}</td>
                    <td>{{ $task->description }}</td>
                    <td>{{ $task->completed ? 'Hoàn thành' : 'Chưa hoàn thành' }}</td>
                    <td>
                        <!-- View Task Button -->
                        <a href="{{ route('tasks.show', $task->id) }}" class="btn btn-info">Xem</a>
                        
                        <!-- Edit Task Button -->
                        <a href="{{ route('tasks.edit', $task->id) }}" class="btn btn-warning">Sửa</a>

                        <!-- Delete Task Form -->
                        <form action="{{ route('tasks.destroy', $task->id) }}" method="POST" style="display: inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger" onclick="return confirm('Bạn có chắc chắn muốn xóa?')">Xóa</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
