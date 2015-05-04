<?php
	if(isset($_SESSION['user'])){
        $user = $_SESSION['user'];
    }	
?>
<section id="page-title" class="page-title events-title">
    <div class="container">

        <div class="breadcrumb-trail breadcrumb breadcrumbs">
            <span class="trail-begin"><a href="<?php echo bloginfo('home')?>/profile/" title="PROFIEL">PROFIEL</a></span>
            
        </div>					
        <h1><?php echo strtoupper($user['p_voornaam']); ?></h1>
    </div>
</section>