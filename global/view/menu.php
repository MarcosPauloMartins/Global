<?php if(empty($_GET['action'])){

echo '<div id="carouselExampleSlidesOnly" class="carousel slide"
	data-ride="carousel">
	<div class="carousel-inner">
		<div class="carousel-item active">
			<img style="max-width: 100%; max-height: 100%" src="./_support/img/BannerMP1.png" />
		</div>
		<div class="carousel-item">
			<img style="max-width: 100%; max-height: 100%" src="./_support/img/BannerMP2.png" />
		</div>
		<div class="carousel-item">
			<img style="max-width: 100%; max-height: 100%" src="./_support/img/BannerMP3.png" />
		</div>
	</div>
</div>

<div class="container">
	<div class="row">
		<div class="col-sm-4">
			<h3 style="text-align: center">Nossos produtos</h3>
			<p>De uma conferida na nossa variedade de produtos de otima
				qualidade, frete gratuito para todo o Brasil, ou se tiver pressa,
				pode retirar diretamente na loja.</p>

			<p style="text-align: center">
				<a href="#"><button type="button" class="btn btn-secondary">Ir
						para a loja</button></a>
			</p>
		</div>
		<div class="col-sm-4">
			<h3 style="text-align: center">Cadastre-se</h3>
			<p>Cadastre-se! Aproveite promoções, ofertas exclusivas e agilize
				suas compras com seus dados salvos, receba tambem diretamente em seu
				e-mail ofertas especiais e cupons de desconto.</p>
			<p style="text-align: center">
				<a href="./cadastroCliente.php"><button type="button"
						class="btn btn-secondary">Cadestre-se já</button></a>
			</p>
		</div>
		<div class="col-sm-4">
			<h3 style="text-align: center">Serviços</h3>
			<p>Faça seu orçamento com a gente, monte um computador para seu lazer
				ou para sua empresa com o melhor custo beneficio do mercado, faça o
				cadastrado e acompanhe o orçamento on-line.</p>
			<p style="text-align: center">
				<a href="ordemDeServico.jsf"><button type="button"
						class="btn btn-secondary">Faça já seu orçamento</button></a>
			</p>
		</div>
	</div>
</div>';
}?>
