<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thêm Sự Cố Mới</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container mt-5">
        <h1 class="text-center mb-4">Thêm Mới</h1>

        <div class="card">
            <div class="card-body">
                <!-- Form thêm sự cố -->
                <form action="{{ route('issues.store') }}" method="POST">
                    @csrf


                    <div class="mb-3">
                        <label for="computer_id" class="form-label">Chọn Máy Tính</label>
                         <select class="form-control" id="computer_id" name="computer_id" required>
                        @foreach ($computers as $computer)
                                <option value="{{ $computer->id }}">{{ $computer->computer_name }} ({{ $computer->model }})</option>
                        @endforeach
                            </select>
                     </div>

                    <!-- Người báo cáo -->
                    <div class="mb-3">
                        <label for="reported_by" class="form-label">Người Báo Cáo</label>
                        <input type="text" class="form-control" id="reported_by" name="reported_by" required>
                    </div>

                    <!-- Ngày báo cáo -->
                    <div class="mb-3">
                        <label for="reported_date" class="form-label">Ngày Báo Cáo</label>
                        <input type="date" class="form-control" id="reported_date" name="reported_date" required>
                    </div>

                    <!-- Mô tả -->
                    <div class="mb-3">
                        <label for="description" class="form-label">Mô Tả</label>
                        <textarea class="form-control @error('description') is-invalid @enderror" id="description" name="description" rows="3">{{ old('description') }}</textarea>
                        @error('description')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Mức độ -->
                    <div class="mb-3">
                        <label for="urgency" class="form-label">Mức Độ</label>
                        <select class="form-control" id="urgency" name="urgency" required>
                            <option value="Low">Low</option>
                            <option value="Medium">Medium</option>
                             <option value="High">High</option>
                        </select>
                    </div>

                    <!-- Trạng thái -->
                    <div class="mb-3">
                        <label for="status" class="form-label">Trạng Thái</label>
                         <select class="form-control" id="status" name="status" required>
                            <option value="Open">Mới (Open)</option>
                            <option value="In Progress">Đang Xử Lý (In Progress)</option>
                            <option value="Resolved">Đã Giải Quyết (Resolved)</option>
                        </select>
                    </div>

                    <!-- Máy tính -->
                    

                    <!-- Nút Lưu -->
                    <div class="d-flex justify-content-end">
                        <a href="{{ route('issues.index') }}" class="btn btn-secondary me-2">Hủy</a>
                        <button type="submit" class="btn btn-primary">Lưu Sự Cố</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>