<div class="container">
    <div class="row">
        <div class="offset-8 col-md-4 col-lg-4 col-xs-6 col-sm-6">
            <ul class="navbar-nav">
                <li class="nav-item active">
                    <select class="form-control" id="sort">
                        <option <?= $sort == 'user' ? 'selected' : ''?> value="user">По имени</option>
                        <option <?= $sort == 'email' ? 'selected' : ''?> value="email">По email</option>
                        <option <?= $sort == 'status' ? 'selected' : ''?> value="status">По статусу</option>
                    </select>
                </li>
            </ul>
        </div>
    </div>
    <?php foreach($task as $key => $val): ?>
        <div class="row task-top"  <?= (int)$val['status'] == 1 ? 'style="background:#7ad6a3"' : ''?>>
            <div class="col-lg-10 col-md-10 col-sm-12 col-xs-12">
                <span><?= $val['user'] ?></a></span>
                <span><?= $val['email'] ?></span>
                <?php if ((int)$val['status'] == 1): ?>
                    <span class="offset-4">Задача выполнена</span>
                <?php endif; ?>
            </div>
        </div>

        <div class="row task-content">
            <div class="col-lg-10 col-md-10 col-xs-12 col-sm-12">
                <?= htmlspecialchars_decode($val['task_text']) ?>
                <?php if(!empty($val['img'])): ?>
                    <div><img src="/images/<?=$val['img']?>"></div>
                <?php endif;?>

            </div>
        </div>
        <hr>
    <?php endforeach; ?>
    <nav>
        <ul class="pagination">
            <?php for($i = 1; $i <= $countPages; $i++): ?>
                <?php if ($i == $nextPage): ?>
                    <li class="page-item active">
                        <span class="page-link"><?= $i ?><span class="sr-only">(current)</span></span>
                    </li>
                <?php else: ?>
                    <li class="page-item"><a class="page-link" href="/main/index/<?= $i ?>"><?= $i ?></a></li>
                <?php endif; ?>
            <?php endfor; ?>
        </ul>
    </nav>
</div>

<link rel="stylesheet" href="/css/editor.css">
<script src="/js/sort.js"></script>


