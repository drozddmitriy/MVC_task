<div>
    <form action="/update/<?php echo $data['id']; ?>" method="post">
        <div class="form-group">
            <label for="project">Edit project</label>
            <input type="text" class="form-control" placeholder="Enter name" name="project" id="project" required
                   value="<?php echo $data['name']; ?>">
        </div>
        <div class="row justify-content-center">
            <button type="submit" class="btn btn-primary">Save</button>
        </div>
    </form>
</div>