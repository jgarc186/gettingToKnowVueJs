<!DOCTYPE html>
<html>
<head>
	<title>Example</title>
</head>
<body>
<?php $total_packages = 19; ?>

	<div id="app"></div>

	<!-- production version, optimized for size and speed -->
	<script src="https://cdn.jsdelivr.net/npm/vue"></script>

	<script type="text/javascript">
		var app = new Vue({
			el: '#app',

			data: {
				number: 0,
				percentage: 0
			},

			methods: {
				multiplicationBySix: function(digit, packages) {
					if (packages == 5) {
						this.percentage = .10;
					} else if (packages == 9) {
						this.percentage = .20;
					} else if (packages == 14) {
						this.percentage = .30;
					} else if (packages == 19) {
						this.percentage = .35;
					}

					return digit - (digit * this.percentage);
				}
			},

			template: `
			<div class="col-md-12 mb-3">
                <small class="text-muted"><b>Gran Total</b></small>
				<input v-model.number="number" class="form-control" placeholder="000" name="grand_total" type="text" value="<?php if (isset($_POST['grand_total'])) print $_POST['grand_total']; ?>" required>
				<p>Numero de paquetes recogidos: <?= $total_packages; ?></p> 
				<p>Descuento: {{ percentage * 100 }}%</p> 
				<p>Gran Total: $ {{ multiplicationBySix(number, <?= $total_packages ?>) }}</p>
			</div>
			`
		});
	</script>

</body>
</html>