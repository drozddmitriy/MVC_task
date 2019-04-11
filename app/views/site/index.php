<?php if (isset($_SESSION['account']['id'])): ?>
    <?php foreach ($vars as $var): ?>
        <?php if ($_SESSION['account']['id'] == $var['account_id']): ?>

            <div class="card f1 f2 f3" id="test">
                <div class="card-header">
                    <nav class="navbar navbar-light bg-light">
                        <span class="navbar-brand mb-0 h1"><?php echo($var['name']); ?></span>
                        <div class='text-right'>
                            <a href="update/<?php echo $var['id']; ?>" class="btn btn-primary btn-sm"
                               role="button">Update</a>
                            <a href="delete/<?php echo $var['id']; ?>" class="btn btn-danger btn-sm"
                               role="button">Delete</a>
                        </div>
                    </nav>
                </div>
                <div class="card-body">

                    <div class="form-group">
                        <form action='/addtask' class="form-inline" method="post">
                            <input type="text" class="form-control" id="taskname" name="taskname" style="width: 80%"
                                   required
                                   maxlength="100">
                            <input type="hidden" name="id_project" value="<?php echo $var['id']; ?>"></p>
                            <button type="submit" class="btn btn-primary">Add task</button>
                        </form>
                    </div>

                    <?php foreach ($tasks as $mas): ?>
                        <?php foreach ($mas as $task): ?>
                            <?php if ($var['id'] == $task['id_project']): ?>
                                <div class="container">
                                    <div class="row">
                                        <div class="col text-center">
                                            <input type="checkbox" class="form-check-input" name="checkboxmas"
                                                   id="<?php echo $task['id']; ?>"
                                                   value="<?php echo $task['status']; ?>"
                                                <?php if ($task['status'] == true) {
                                                    echo 'checked';
                                                } ?>>
                                        </div>
                                        <div class="col-4">
                                            <p><?php echo $task['text']; ?></p>
                                        </div>
                                        <div class="col-7 text-right">
                                            <input type="date" name="datemas" id="<?php echo $task['id']; ?>"
                                                   value="<?php echo $task['date']; ?>">
                                            <a href="uptask/<?php echo $task['id']; ?>" class="btn btn-primary btn-sm"
                                               role="button">Update</a>
                                            <a href="deltask/<?php echo $task['id']; ?>" class="btn btn-danger btn-sm"
                                               role="button">Delete</a>
                                        </div>
                                    </div>
                                    <hr>
                                </div>
                            <?php endif; ?>
                        <?php endforeach; ?>
                    <?php endforeach; ?>

                </div>
            </div>
            <div style="height: 20px"></div>

        <?php endif; ?>

    <?php endforeach; ?>

    <div class="row justify-content-center">
        <a href="add" class="btn btn-primary" role="button">Add TODO List</a>
    </div>
    <div style="height: 40px"></div>
<?php endif; ?>

