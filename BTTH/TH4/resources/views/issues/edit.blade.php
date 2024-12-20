<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chỉnh Sửa Sự Cố</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container mt-5">
        <h1 class="text-center mb-4">Chỉnh Sửa</h1>

        <div class="card">
            <div class="card-body">

                <form action="{{ route('issues.update', $issue->id) }}" method="POST">
                    @csrf
                    @method('PUT') 

                    <div class="mb-3">
                        <label for="computer_id" class="form-label">Chọn Máy Tính</label>
                        <select class="form-control" id="computer_id" name="computer_id" required>
                            @foreach ($computers as $computer)
                            <option value="{{ $computer->id }}" {{ old('computer_id', $issue->computer_id) == $computer->id ? 'selected' : '' }}>
                                {{ $computer->computer_name }} ({{ $computer->model }})
                            </option>
                            @endforeach
                        </select>
                    </div>


                    <div class="mb-3">
                        <label for="reported_by" class="form-label">Người Báo Cáo</label>
                        <input type="text" class="form-control" id="reported_by" name="reported_by"
                            value="{{ old('reported_by', $issue->reported_by) }}" required>
                    </div>

                    
                    <div class="mb-3">
                        <label for="reported_date" class="form-label">Ngày Báo Cáo</label>
                        <input type="date" class="form-control" id="reported_date" name="reported_date"
                            value="{{ old('reported_date', $issue->reported_date) }}" required>
                    </div>


                    <div class="mb-3">
                        <label for="description" class="form-label">Mô Tả</label>
                        <textarea class="form-control @error('description') is-invalid @enderror" id="description" name="description" rows="3" required>{{ old('description', $issue->description) }}</textarea>
                        @error('description')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>


                    <div class="mb-3">
                        <label for="urgency" class="form-label">Mức Độ</label>
                        <select class="form-control" id="urgency" name="urgency" required>
                            <option value="Low" {{ old('urgency', $issue->urgency) == 'Low' ? 'selected' : '' }}>Low</option>
                            <option value="Medium" {{ old('urgency', $issue->urgency) == 'Medium' ? 'selected' : '' }}>Medium</option>
                            <option value="High" {{ old('urgency', $issue->urgency) == 'High' ? 'selected' : '' }}>High</option>
                        </select>
                    </div>


                    <div class="mb-3">
                        <label for="status" class="form-label">Trạng Thái</label>
                        <select class="form-control" id="status" name="status" required>
                            <option value="Open" {{ old('status', $issue->status) == 'Open' ? 'selected' : '' }}>Mới (Open)</option>
                            <option value="In Progress" {{ old('status', $issue->status) == 'In Progress' ? 'selected' : '' }}>Đang Xử Lý (In Progress)</option>
                            <option value="Resolved" {{ old('status', $issue->status) == 'Resolved' ? 'selected' : '' }}>Đã Giải Quyết (Resolved)</option>
                        </select>
                    </div>

                 

                    <div class="d-flex justify-content-end">
                        <a href="{{ route('issues.index') }}" class="btn btn-secondary me-2">Hủy</a>
                        <button type="submit" class="btn btn-primary">Cập Nhật</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
