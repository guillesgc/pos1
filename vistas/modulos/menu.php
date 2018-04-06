<aside class="main-sidebar">

	 <section class="sidebar">

		<ul class="sidebar-menu">

		<?php

		if($_SESSION["perfil"] == "Administrador"){

			echo '<li class="active">

				<a href="inicio">

					<i class="fa fa-home"></i>
					<span>Inicio</span>

				</a>

			</li>

			<li>

				<a href="usuarios">

					<i class="fa fa-user"></i>
					<span>Usuarios</span>

				</a>

			</li>

			<li class="treeview">

				<a href="#">

					<i class="fa fa-cogs"></i>
					
					<span>Mantenedores</span>
					
					<span class="pull-right-container">
					
						<i class="fa fa-angle-left pull-right"></i>

					</span>

				</a>

				<ul class="treeview-menu">
					
					<li>

						<a href="ccosto">

							<i class="fa fa-th"></i>
							<span>Centros de Costo</span>

						</a>

					</li>

					<li>

				<a href="item">

					<i class="fa fa-info"></i>
					<span>Item (CC)</span>

				</a>

			</li>

			<li>

				<a href="tipo-sepultura">

					<i class="fa fa-linode"></i>
					<span>Tipo Sepultura</span>

				</a>

			</li>


			<li>

				<a href="cuartel-cuerpo">

					<i class="fa fa-linode"></i>
					<span>Cuartel - Cuerpo</span>

				</a>

			</li>

			<li>

				<a href="sepulturas">

					<i class="fa fa-sort-numeric-asc"></i>
					<span>Sepultura</span>

				</a>

			</li>


			<li>

				<a href="agenda">

					<i class="fa fa-calendar"></i>
					<span>Agenda</span>

				</a>

			</li>

			<li>

				<a href="utm">

					<i class="fa fa-usd"></i>
					<span>U.T.M</span>

				</a>

			</li>

			
				</ul>
			</li>		

			';

		}

		if($_SESSION["perfil"] == "Administrador" || $_SESSION["perfil"] == "Especial"){

			echo '

			<li>

				<a href="productos">

					<i class="fa fa-product-hunt"></i>
					<span>Productos</span>

				</a>

			</li>'

			;

		}

		if($_SESSION["perfil"] == "Administrador" || $_SESSION["perfil"] == "Vendedor"){

			echo '

			<li>

				<a href="calendario">

					<i class="fa fa-calendar"></i>
					<span>Agenda</span>

				</a>

			</li>


			<li>

				<a href="difuntos">

					<i class="fa fa-bed"></i>
					<span>Búsqueda de Fallecidos</span>

				</a>

			</li>


			<li>

				<a href="listproductos">

					<i class="fa fa-list"></i>
					<span>Listar Sepulturas</span>

				</a>

			</li>

			<li>

				<a href="clientes">

					<i class="fa fa-users"></i>
					<span>Clientes</span>

				</a>

			</li>

			
			<li class="treeview">

				<a href="#">

					<i class="fa fa-money"></i>
					
					<span>Ventas</span>
					
					<span class="pull-right-container">
					
						<i class="fa fa-angle-left pull-right"></i>

					</span>

				</a>

				<ul class="treeview-menu">
					
					<li>

						<a href="ventas">
							
							<i class="fa fa-circle-o"></i>
							<span>Administrar ventas</span>

						</a>

					</li>

					<li>

						<a href="crear-venta">
							
							<i class="fa fa-circle-o"></i>
							<span>Crear venta</span>

						</a>

					</li>';

					if($_SESSION["perfil"] == "Administrador" || $_SESSION["perfil"] == "Especial"){

					echo '<li>

						<a href="reportes">
							
							<i class="fa fa-circle-o"></i>
							<span>Reporte de ventas</span>

						</a>

					</li>';

					}

				

				echo '</ul>

			</li>';

		}

		?>

		</ul>

	 </section>

</aside>