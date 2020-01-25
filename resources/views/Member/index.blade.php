<!doctype html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>會員資料</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css"
          integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
            integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
            crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js"
            integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut"
            crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js"
            integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k"
            crossorigin="anonymous"></script>
    <script src="{{ url("assets/jquery/validation/jquery.validate.min.js") }}" type="text/javascript"></script>
</head>
<body>
<div class="modal" tabindex="-1" role="dialog" id="appendModal">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">新增會員資料</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="appendForm" method="post">
                <div class="modal-body">
                    @csrf
                    <div class="form-group">
                        <label for="account">帳號</label>
                        <input type="text" class="form-control" name="account" required>
                    </div>
                    <div class="form-group">
                        <label for="name">名稱</label>
                        <input type="text" class="form-control" name="name" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Save changes</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </form>

        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-2"></div>
    <div class="col-md-8">
        <button type="button" class="btn btn-primary" onclick="model_append()">新增會員</button>
        <table class="table">
            <thead class="thead-dark">
            <tr>
                <th>會員編號</th>
                <th>會員帳戶</th>
                <th>建立時間</th>
                <th>修改時間</th>
                <th>操作</th>
            </tr>
            </thead>
            <tbody>
            @foreach($res as $item)
                <tr>
                    <td>{{ $item->serial }}</td>
                    <td>{{ $item->account }}</td>
                    <td>{{ $item->created_at }}</td>
                    <td>{{ $item->updated_at }}</td>
                    <td></td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
    <div class="col-md-2"></div>
</div>
<script type="text/javascript">
    function model_append() {
        $('#appendModal').modal('show');
    }

    $('#appendForm').validate({
        submitHandler: function () {
            $.ajax({
                url: "{{ url('member') }}",
                data: $(this).serialize(),
                method: 'post',
                success: function () {
                    location.reload();
                }
            })
        }
    })
</script>
</body>
</html>
