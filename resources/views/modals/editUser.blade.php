<form id="edit-form" enctype="multipart/form-data">

    {{ csrf_field() }}
    <input type="hidden" name="id" value="{{$user->id}}">
    <div class="form-group">
        <label for="name">Name:</label>
        <input type="text" name="name" class="form-control" value="{{$user->name}}" required/>
    </div>
    <div class="form-group">
        <label for="name">Email:</label>
        <input type="email" name="email" class="form-control" value="{{$user->email}}" required/>
    </div>

    <div class="form-group">
        <button type="submit" class="btn btn-success">Update</button>
    </div>

</form>


<script>

    $('#edit-form').on('submit', function (e) {
        e.preventDefault();
        update();
    });
</script>
