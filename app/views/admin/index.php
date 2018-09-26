<div class="container top">
    <div class="row">

    </div>
    <form class="form-horizontal needs-validation" novalidate action="/admin/index" method="post">
        <div class="form-row">
            <div class="col-md-4 mb-3">
                <label for="validationCustom01">Login</label>
                <input type="text" class="form-control" name="login" id="validationCustom01" placeholder="Login" required>
                <div class="invalid-feedback">
                    Заполните поле
                </div>
                <div class="valid-feedback">
                    Ok
                </div>
            </div>
            <div class="col-md-4 mb-3">
                <label for="validationCustom02">Password</label>
                <input type="password" class="form-control" name="psw" id="validationCustom02" placeholder="password" required>
                <div class="invalid-feedback">
                    Заполните поле
                </div>
                <div class="valid-feedback">
                    Ok
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4 col-lg-4 col-sm-6 col-xs-6">
                <button class="btn btn-default" type="submit">Вход</button>
            </div>
        </div>

    </form>
</div>

<script src="/js/validate.js"></script>
<link rel="stylesheet" href="/css/editor.css">