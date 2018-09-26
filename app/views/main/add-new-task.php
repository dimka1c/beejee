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
    <form class="needs-validation" id="form-task" name="form-task" novalidate action="/main/add-new-task" method="post" enctype="multipart/form-data">
        <div class="form-row">
            <div class="col-md-4 mb-3">
                <label for="user-name">Ваше имя</label>
                <input type="text" class="form-control" name="user-name" id="id-user-name" placeholder="Введите имя" required>
                <div class="invalid-feedback">
                    Введите имя
                </div>
            </div>
            <div class="col-md-4 mb-3">
                <label for="user-email">Ваш Email</label>
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="inputGroupPrepend">@</span>
                    </div>
                    <input type="email" class="form-control" name="user-email" id="id-user-email" placeholder="Email" required>
                    <div class="invalid-feedback">
                        Введите Email
                    </div>
                </div>
            </div>
        </div>
        <div class="form-group">
            <label for="user-text">Введите текст</label>
            <textarea name="content" id="editor" required></textarea>
            <div class="invalid-feedback">
                Введите текст
            </div>
        </div>
        <input type="file" name='file' id="picture" accept="image/jpeg,image/png,image/gif">
        <button type="button" class="btn btn-primary" id="id-preview">Предосмотр</button>
        <p><input type="submit" name="submit-task" value="Сохранить"></p>
    </form>
</div>
<link rel="stylesheet" href="/css/editor.css">
<script src="/js/validate.js"></script>
<script src="https://cdn.ckeditor.com/ckeditor5/11.0.1/classic/ckeditor.js"></script>
<script src="/js/editor.js"></script>
<script src="/js/preview.js"></script>
