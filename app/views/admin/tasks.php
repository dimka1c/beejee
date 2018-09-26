<div class="container">
    <?php foreach($task as $key => $val): ?>
        <div class="row task-top">
            <div class="col-lg-10 col-md-10 col-sm-10 col-xs-10">
                <div><?= $val['user'] ?></a></div>
                <div><?= $val['email'] ?></div>
            </div>
            <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2">
                <div>
                    <button type="button" class="btn btn-default btn-sm">
                        <a href="/admin/edit-task/<?=$val['id']?>">Редактировать</a>
                    </button>

                </div>
            </div>
        </div>
        <div class="row task-content">
            <div class="col-lg-10 col-md-10 col-xs-12 col-sm-12">
                <?= htmlspecialchars_decode($val['task_text']) ?>
            </div>
        </div>
        <hr>
    <?php endforeach; ?>
</div>
<link rel="stylesheet" href="/css/editor.css">
