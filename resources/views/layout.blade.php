<!DOCTYPE HTML>
<html lang="ja">
<head>
<meta charset="utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>FAKE HITOSARA</title>

<!-- Bootstrapの読み込み -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap-theme.min.css">

<style type="text/css">
/* スマホとタブレットのみに適用 */
@media screen and (max-width: 768px) {
	.side-collapse-container{
		width:100%;
		position:relative;
		left:0;
		transition:left .4s;
	}
	.side-collapse-container.out{
		left:200px;
	}
	.side-collapse {
		top:50px;
		bottom:0;
		left:0;
		width:200px;
		position:fixed;
		overflow:hidden;
		transition:width .4s;
	}
	.side-collapse.in {
		width:0;
	}
}
</style>

</head>

<body>
<header>

<nav class="navbar navbar-inverse">
	<div class="container">

		<!-- nav -->
		<div class="navbar-header">
			<button data-toggle="collapse-side" data-target=".side-collapse" data-target-2=".side-collapse-container" type="button" class="navbar-toggle pull-left">
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
			<a class="navbar-brand" href="#">
				FAKE HITOSARA
			</a>
		</div>
		<div class="navbar-inverse side-collapse in">
			<nav role="navigation" class="navbar-collapse">
				<ul class="nav navbar-nav">
					<li><a href="#Home">ホーム</a></li>
					<li><a href="#users">FAKE HITOSARAとは</a></li>
					<li><a href="#">マイページ</a></li>
					<li><a href="#">Contact</a></li>
                    @if ($user->owner ==True)
                    <li><a href="#">店舗情報登録</a></li>
                    @endif
				</ul>
			</nav>
		</div>
		<!-- /nav -->

	</div>
</nav>

</header>

<!-- メインのコンテンツエリア -->
<section>
<article></article>
</section>
<!-- /メインのコンテンツエリア -->

<footer>
</footer>
</body>



<!-- BootstrapとjQueryの読み込み -->
<script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
<script type="text/javascript">
	$(document).ready(function() {
	var sideslider = $('[data-toggle=collapse-side]');
	var sel = sideslider.attr('data-target');
	var sel2 = sideslider.attr('data-target-2');
	sideslider.click(function(event){
        $(sel).toggleClass('in');
		$(sel2).toggleClass('out');
	});
});
</script>

@yield('content')
</html>
