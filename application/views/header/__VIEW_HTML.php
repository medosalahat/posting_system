<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse"
                    data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Toggle navigation</span><span class="icon-bar"/><span
                    class="icon-bar"></span><span class="icon-bar"></span></button>
            <a class="navbar-brand" href="<?= $HOME_PAGE ?>"><?=$SITE_NAME?></a>
        </div>
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
                <?php foreach ($LINK as $key => $value) { ?>
                    <li><a href="<?= $value ?>"><?= $key ?></a></li><?php } ?>
            </ul>
            <?PHP IF(!$IS_LOGIN) { ?>
            <ul class="nav navbar-nav navbar-right">
                <form class="navbar-form navbar-left" role="search" method="post" id="<?= $Login_user[2]?>" action="<?=$LOGIN?>">
                    <div class="form-group">
                        <input type="email" name="<?= $Login_user[0]?>" id="<?= $Login_user[0]?>"
                               class="form-control" placeholder="EMAIL">
                    </div>
                    <div class="form-group">
                        <input type="password" name="<?= $Login_user[1]?>" id="<?= $Login_user[1]?>"
                               class="form-control" placeholder="PASSWORD">
                    </div>
                    <button type="submit" class="btn btn-default">Sign In</button>
                </form>
                <div class="col-sm-12" id="m"></div>
            </ul>
            <?PHP } ?>
        </div>
    </div>
</nav>
