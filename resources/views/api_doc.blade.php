<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>PetSociety | API Doc</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
</head>
<body>
	<div class="container-fluid">
		<h1 class="text-center"><a href="//petsociety-cliente.herokuapp.com">PetSociety</a>: Documentación de la API</h1>
		<div class="row">
			<div class="col-12">
				<table class="table table-hover table-striped table-bordered table-sm">
					<thead>
						<th>Verbo HTTP</th>
						<th>URL</th>
						<th>Parámetros</th>
						<th>Acción</th>
						<th>Respuesta</th>
					</thead>
					<tbody>
						<tr>
							<td>POST</td>
							<td>http://petsociety.herokuapp.com/api/organization/login</td>
							<td>
<pre><code class="json">{
 username    : string,
 password    : string
}</code></pre>
							</td>
							<td>Se autentica la organización con los parámetros enviados</td>
							<td>
<pre><code class="json">{
 nombre      : string,
 api_token   : string,
}</code></pre>
							</td>
						</tr>
						<tr>
							<td>GET</td>
							<td>http://petsociety.herokuapp.com/api/organization/{id}</td>
							<td>
<pre><code class="json">{
 api_token : string,
}</code></pre>
							</td>
							<td>Obtiene la organización con el id de la URL</td>
							<td>
<pre><code class="json">{
 id          : int,
 rif         : int,
 nombre      : string,
 direccion   : string,
 descripcion : string,
 email       : string,
 api_token   : string,
 created_at  : string,
 updated_at  : string
}</code></pre>
							</td>
						</tr>
						<tr>
							<td>POST</td>
							<td>http://petsociety.herokuapp.com/api/organization</td>
							<td>
<pre><code class="json">{
 rif                   : int,
 nombre                : string,
 direccion             : string,
 descripcion           : string,
 email                 : string,
 password              : string,
 password_confirmation : string
}</code></pre>
							</td>
							<td>Almacena una organización con los parámetros enviados</td>
							<td>
<pre><code class="json">{
 id          : int,
 rif         : int,
 nombre      : string,
 direccion   : string,
 descripcion : string,
 email       : string,
 api_token   : string,
 created_at  : string,
 updated_at  : string
}</code></pre>
							</td>
						</tr>
						<tr>
							<td>DELETE</td>
							<td>http://petsociety.herokuapp.com/api/organization/{id}</td>
							<td>
<pre><code class="json">{
 api_token : string,
}</code></pre>
							</td>
							<td>Elimina la organización con el id de la URL</td>
							<td>
<pre><code class="json">{
 success : boolean
}</code></pre>
							</td>
						</tr>
						<tr>
							<td>GET</td>
							<td>http://petsociety.herokuapp.com/api/organization</td>
							<td>
								<pre><code class="json">{}</code></pre>
							</td>
							<td>Devuelve un array de organizaciones</td>
							<td>
								<pre>[{object}, {object}, {object}...]</pre>
							</td>
						</tr>
						<tr>
							<td>GET</td>
							<td>http://petsociety.herokuapp.com/api/owner/{cedula}</td>
							<td>
								<pre><code class="json">{}</code></pre>
							</td>
							<td>Obtiene el dueño con la cédula de la URL</td>
							<td>
<pre><code class="json">{
 id         : int,
 cedula     : int,
 nombre     : string,
 direccion  : string,
 created_at : string,
 updated_at : string
}</code></pre>
							</td>
						</tr>
						<tr>
							<td>POST</td>
							<td>http://petsociety.herokuapp.com/api/owner</td>
							<td>
<pre><code class="json">{
 cedula     : int,
 nombre     : string,
 direccion  : string,
 api_token  : string
}</code></pre>
							</td>
							<td>Almacena un dueño con los parámetros enviados</td>
							<td>
<pre><code class="json">{
 id         : int,
 cedula     : int,
 nombre     : string,
 direccion  : string,
 created_at : string,
 updated_at : string
}</code></pre>
							</td>
						</tr>
						<tr>
							<td>DELETE</td>
							<td>http://petsociety.herokuapp.com/api/owner/{id}</td>
							<td>
<pre><code class="json">{
 api_token : string,
}</code></pre>
							</td>
							<td>Elimina el dueño con el id de la URL</td>
							<td>
<pre><code class="json">{
 success : boolean
}</code></pre>
							</td>
						</tr>
						<tr>
							<td>PUT</td>
							<td>http://petsociety.herokuapp.com/api/owner/{id}</td>
							<td>
<pre><code class="json">{
 cedula     : int,
 nombre     : string,
 direccion  : string,
 api_token : string,
}</code></pre>
							</td>
							<td>Modifica el dueño con los parámetros enviados</td>
							<td>
<pre><code class="json">{
 id         : int,
 cedula     : int,
 nombre     : string,
 direccion  : string,
 created_at : string,
 updated_at : string
}</code></pre>
							</td>
						</tr>
						<tr>
							<td>GET</td>
							<td>http://petsociety.herokuapp.com/api/owner</td>
							<td>
								<pre><code class="json">{}</code></pre>
							</td>
							<td>Devuelve un array de dueños</td>
							<td>
								<pre>[{object}, {object}, {object}...]</pre>
							</td>
						</tr>
						<tr>
							<td>GET</td>
							<td>http://petsociety.herokuapp.com/api/animal/{id}</td>
							<td>
								<pre><code class="json">{}</code></pre>
							</td>
							<td>Obtiene el animal con el id de la URL</td>
							<td>
<pre><code class="json">{
 id              : int,
 tipo            : string,
 nombre          : string,
 anio_nacimiento : int,
 estatus         : string,
 procedencia     : string,
 descripcion     : string,
 vacunas         : string,
 owner_id        : int,
 organization_id : int,
 created_at      : string,
 updated_at      : string,
 owner           : {object},
 organization    : {object}
}</code></pre>
							</td>
						</tr>
						<tr>
							<td>POST</td>
							<td>http://petsociety.herokuapp.com/api/animal</td>
							<td>
<pre><code class="json">{
 tipo            : string,
 nombre          : string,
 cedula          : int,
 anio_nacimiento : int,
 estatus         : string,
 vacunas         : string,
 procedencia     : string,
 descripcion     : string,
 api_token       : string,
}</code></pre>
							</td>
							<td>Almacena un animal con los parámetros enviados</td>
							<td>
<pre><code class="json">{
 id              : int,
 tipo            : string,
 nombre          : string,
 anio_nacimiento : int,
 estatus         : string,
 procedencia     : string,
 descripcion     : string,
 vacunas         : string,
 owner_id        : int,
 organization_id : int,
 created_at      : string,
 updated_at      : string,
 owner           : {object},
 organization    : {object}
}</code></pre>
							</td>
						</tr>
						<tr>
							<td>DELETE</td>
							<td>http://petsociety.herokuapp.com/api/animal/{id}</td>
							<td>
<pre><code class="json">{
 api_token : string,
}</code></pre>
							</td>
							<td>Elimina el animal con el id de la URL</td>
							<td>
<pre><code class="json">{
 success : boolean
}</code></pre>
							</td>
						</tr>
						<tr>
							<td>PUT</td>
							<td>http://petsociety.herokuapp.com/api/animal/{id}</td>
							<td>
<pre><code class="json">{
 tipo            : string,
 nombre          : string,
 anio_nacimiento : int,
 estatus         : string,
 procedencia     : string,
 descripcion     : string,
 vacunas         : string,
 cedula          : int,
 api_token       : string,
}</code></pre>
							</td>
							<td>Modifica el animal con los parámetros enviados</td>
							<td>
<pre><code class="json">{
 id              : int,
 tipo            : string,
 nombre          : string,
 anio_nacimiento : int,
 estatus         : string,
 procedencia     : string,
 descripcion     : string,
 vacunas         : string,
 owner_id        : int,
 organization_id : int,
 created_at      : string,
 updated_at      : string,
 owner           : {object},
 organization    : {object}
}</code></pre>
							</td>
						</tr>
						<tr>
							<td>GET</td>
							<td>http://petsociety.herokuapp.com/api/animal</td>
							<td>
								<pre><code class="json">{}</code></pre>
							</td>
							<td>Devuelve un array de animales</td>
							<td>
								<pre>[{object}, {object}, {object}...]</pre>
							</td>
						</tr>
					</tbody>
				</table>
			</div>
		</div>
	</div>

</body>
</html>
