<!-- Default Bootstrap Navbar -->
<nav class="navbar navbar-default">
            <div class="container-fluid">
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="/">HIGH TECH</a>
                </div>

                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                    <li class="<?php echo e(Request::is('/') ? 'active' : ''); ?>"><a href="<?php echo e(url('/')); ?>">Home <span class="sr-only">(current)</span></a></li>
                    <li class="<?php echo e((Request::is('posts')) ? 'active' : ''); ?>"><a href="<?php echo e(url('posts')); ?>">Sale</a></li>
                    <!--<li class="<?php echo e(Request::is('about') ? 'active' : ''); ?>"><a href="<?php echo e(url('about')); ?>">About</a></li>-->
                    <li class="<?php echo e(Request::is('contact') ? 'active' : ''); ?>"><a href="<?php echo e(url('contact')); ?>">Contact</a></li>
                </ul>
                <?php echo Form::open(array('method'=>'post', 'route' => 'search.store', 'data-parsley-validate' => '', 'class' => 'navbar-form navbar-left')); ?>

                <!--<form class="navbar-form navbar-left" action="<?php echo e(route('search.store')); ?>" method="post">-->
                    <div class="form-group">
                    <input name="search" type="text" class="form-control" placeholder="Search">
                    </div>
                    <button type="submit" class="btn btn-default">Rechercher</button>
                <?php echo Form::close(); ?>

                
                <ul class="nav navbar-nav navbar-right">
                    <?php if(!Auth::check()): ?>
                        <li><a href="<?php echo e(url('login')); ?>">login</a></li>
                        <li><a href="<?php echo e(url('register')); ?>">register</a></li>
                    <?php else: ?>
                    <li class="dropdown">
                    <a href="" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><?php echo e(Auth::user()->name); ?> <span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="<?php echo e(url('profil')); ?>">Profil</a></li>
                        <li><a href="<?php echo e(route('pannier.index')); ?>">Pannier</a></li>
                        <?php if(Auth::user()->admin==1): ?>
                        <li><a href="<?php echo e(url('administration')); ?>">Administration</a></li>
                        <?php endif; ?>
                        <!--<li><a href="#">Something else here</a></li>-->
                        <li role="separator" class="divider"></li>
                        <li><a href="<?php echo e(route('logout')); ?>">logout</a></li>
                    </ul>
                    </li>
                    <?php endif; ?>
                </ul>
                
                </div><!-- /.navbar-collapse -->
            </div><!-- /.container-fluid -->
</nav>