@extends('layouts.app4')

<div class="container-fluid">
	<div class="row">
		<div class="col-md-12">
			<h3 class="text-center">
				Califica la transaccion.
			</h3>
			<div class="row">
				<div class="col-md-6">
					<div class="row">
						<div class="col-md-12">
							<img class="img-circle img-responsive" src="<?php echo $usr['pictureUrl']; ?>" alt="<?php echo $usr['name'];?>">
						</div>
					</div>
					<div class="row">
						<div class="col-md-12">
							<div class="rate-trans">
								<input type="radio" name="example" class="rating" value="1" />
								<input type="radio" name="example" class="rating" value="2" />
								<input type="radio" name="example" class="rating" value="3" />
								<input type="radio" name="example" class="rating" value="4" />
								<input type="radio" name="example" class="rating" value="5" />
							</div>
						</div>
					</div>
				</div>
				<div class="col-md-6">
					<div class="row">
						<div class="col-md-12">
							<p>
								Lorem ipsum dolor sit amet, <strong>consectetur adipiscing elit</strong>. Aliquam eget sapien sapien. Curabitur in metus urna. In hac habitasse platea dictumst. Phasellus eu sem sapien, sed vestibulum velit. Nam purus nibh, lacinia non faucibus et, pharetra in dolor. Sed iaculis posuere diam ut cursus. <em>Morbi commodo sodales nisi id sodales. Proin consectetur, nisi id commodo imperdiet, metus nunc consequat lectus, id bibendum diam velit et dui.</em> Proin massa magna, vulputate nec bibendum nec, posuere nec lacus. <small>Aliquam mi erat, aliquam vel luctus eu, pharetra quis elit. Nulla euismod ultrices massa, et feugiat ipsum consequat eu.</small>
							</p>
						</div>
					</div>
					<div class="row">
						<div class="col-md-12">
							<p>
								Lorem ipsum dolor sit amet, <strong>consectetur adipiscing elit</strong>. Aliquam eget sapien sapien. Curabitur in metus urna. In hac habitasse platea dictumst. Phasellus eu sem sapien, sed vestibulum velit. Nam purus nibh, lacinia non faucibus et, pharetra in dolor. Sed iaculis posuere diam ut cursus. <em>Morbi commodo sodales nisi id sodales. Proin consectetur, nisi id commodo imperdiet, metus nunc consequat lectus, id bibendum diam velit et dui.</em> Proin massa magna, vulputate nec bibendum nec, posuere nec lacus. <small>Aliquam mi erat, aliquam vel luctus eu, pharetra quis elit. Nulla euismod ultrices massa, et feugiat ipsum consequat eu.</small>
							</p>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>