<form method="post">
	@csrf
    <div class="form-group">
        <input class="form-control" placeholder="이메일" name="name" type="text" autofocus required>
    </div>
    <div class="form-group">
        <input class="form-control" placeholder="비밀번호" name="password" type="password" value="" required>
    </div>
    <input type="submit" value="로그인" class="btn btn-lg btn-success btn-block"/>
</form>
