<div class="container top">
    <div class="modal fade" id="myModal" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Предварительный просмотр</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body" id="resp-preview">
                    <p>Modal body text goes here.</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
    <form class="needs-validation" id="form-task" name="form-task" novalidate action="/admin/save-edit-task" method="post" enctype="multipart/form-data">
        <input type="text" name="save-edit-task" value="1" hidden>
        <input type="text" name="id" value="<?=$task[0]['id']?>" hidden>
        <div class="form-group">
            <label for="user-text">Редактирование сообщения</label>
            <textarea name="content" id="editor" required><?=htmlspecialchars_decode($task[0]['task_text'])?></textarea>
            <div class="invalid-feedback">
                Введите текст
            </div>
        </div>
        <div class="form-group form-check">
            <input type="checkbox" class="form-check-input" name="status" id="status" <?= $task[0]['status'] == 1 ? 'checked' : '' ?>>
            <label class="form-check-label" for="exampleCheck1">Выполнено</label>
        </div>
        <p><input type="submit" name="submit-task" value="Сохранить"></p>
    </form>
</div>
<link rel="stylesheet" href="/css/editor.css">
<script src="https://cdn.ckeditor.com/ckeditor5/11.0.1/classic/ckeditor.js"></script>
<script src="/js/editor.js"></script>


