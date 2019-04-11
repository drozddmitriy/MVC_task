<div>
    <form action="/uptask/<?php echo $data['id']; ?>" method="post">
        <div class="form-group">
            <label for="project">Edit Task</label>
            <input type="text" class="form-control" placeholder="Enter name" name="taskname" required
                   value="<?php echo $data['text']; ?>">
        </div>
        <div class="row justify-content-center">
            <button type="submit" class="btn btn-primary">Save</button>
        </div>
    </form>
</div>