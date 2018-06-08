<?= $this->layout('layout'); ?>

<section class="pages container">
		<div class="page page-contact">
			
			<div class="divider-2" style="margin:25px 0;"></div>
			<div class="form-contact">
				<form method="POST" action="/login/doLogin">
					<div class="input-container container-flex space-between">
						<label>Email</label><input type="email" placeholder="Email" name="email" class="input-email">						
					</div>
					<div class="input-container container-flex space-between">

					<label>Contraseña</label><input type="password" name="password" >
					</div>
					<div class="send-message">
						<button type="submit">Enviar</button>
					</div>
				</form>
			</div>
			
		</div>
	</section>