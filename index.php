<!DOCTYPE html>
<!--[if IE 8 ]><html class="no-js oldie ie8" lang="pt-br"> <![endif]-->
<!--[if IE 9 ]><html class="no-js oldie ie9" lang="pt-br"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!--><html class="no-js" lang="pt-br"> <!--<![endif]-->
<head>

   <!--- basic page needs
   ================================================== -->
   <meta http-equiv="Content-Language" content="pt-br">
   <meta charset="utf-8">
	<title>QueroAulas</title>
	<meta name="description" content="">
	<meta name="author" content="root" >

   <!-- mobile specific metas
   ================================================== -->
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

 	<!-- CSS
   ================================================== -->
   <link rel="stylesheet" href="css/base.css">
   <link rel="stylesheet" href="css/vendor.min.css">
   <link rel="stylesheet" href="css/main.css">

   <!-- script
   ================================================== -->
	<script src="js/modernizr.js"></script>

   <!-- favicons
	================================================== -->
	<link rel="shortcut icon" href="favicon.png" >
	<?PHP
		require 'php/init.php';
		session_start();
		logout();

	?>

</head>

<body>

	<!-- header
   ================================================== -->
   <header id="main-header">

   	<div class="row">

	      <div class="logo">
	         <a href="index.html">Kreo</a>
	      </div>

	      <nav id="nav-wrap">

	         <a class="mobile-btn" href="#nav-wrap" title="Show navigation">
	         	<span class="menu-icon">Menu</span>
	         </a>
         	<a class="mobile-btn" href="#" title="Hide navigation">
         		<span class="menu-icon">Menu</span>
         	</a>

	         <ul id="nav" class="nav">
	            <li><a class="smoothscroll" href="#hero">Inicio.</a></li><!--é o slideshow-->
		         <li class="current"><a class="smoothscroll" href="#portfolio">Cadastro.</a></li>
	            <li><a class="smoothscroll" href="#services">Login.</a></li>
	            <li><a class="smoothscroll" href="#about">Sobre.</a></li>
	            <li><a class="smoothscroll" href="#contact">Contato.</a></li>
	         </ul> <!-- end #nav -->

	      </nav> <!-- end #nav-wrap -->

	      <ul class="header-social">
	        	<li><a href="#"><i class="fa fa-facebook"></i></a></li>
	        	<li><a href="#"><i class="fa fa-twitter"></i></a></li>
	        	<li><a href="#"><i class="fa fa-google-plus"></i></a></li>
	      </ul>

	   </div>

   </header> <!-- end header -->


   <!-- homepage hero slides
   ================================================== -->
   <section id="hero">

		<div class="row hero-content">

			<div class="twelve columns hero-container">

			   <!-- hero-slider start-->
			   <div id="hero-slider" class="flexslider">

				   <ul class="slides">

					   <!-- slide -->
					   <li>
						   <div class="flex-caption">
								<h1 class="">Diga olá para o <span>QueroAulas</span>.</h1>

								<h3 class="">Nosso objetivo é facilitar o relacionamento entre alunos e professores através de uma plataforma para
								agendamento de aulas.</h3>
							</div>
					   </li>

					   <!-- slide -->
					   <li>
							<div class="flex-caption">
								<h1 class="">Com <span>dificuldades</span> em alguma matéria?</h1>

								<h3 class="">Já pensou em contratar um professor particular?ajuda especializada pode facilitar as coisas.</h3>
							</div>
					   </li>

					   <!-- slide -->
					   <li>
						   <div class="flex-caption">
								<h1 class="">Ficou enteressado? <a class="smoothscroll" href="#portfolio" title="Cadastre-se" >cadastre-se</a>.</h1>

								<h3 class="">Com a ajuda do QueroAulas você pode encontrar um professor rapidamente e marcar aulas a hora q quiser.</h3>
							</div>
					   </li>

				   </ul>

			   </div> <!-- end hero-slider -->

	      </div> <!-- end twelve columns-->

		</div> <!-- end row -->

		<div id="more">
		      <a class="smoothscroll" href="#services">Faça Login<i class="fa fa-angle-down"></i></a>
		</div>

   </section> <!-- end homepage hero -->


   <!-- portfolio cadastro
   ================================================== -->
   <section id="portfolio">

      <div class="row section-head">

      	<div class="twelve columns">

      		<h1>Cadastre-se<span>.</span></h1>

	         <hr />

	         <p>Após o cadastro você poderá aproveitar ao maximo as funcionabilidades de nossa nossa plataforma.
	         <h4>Sou Um...</h4>
	         </p>

	         <div class="bgrid folio-item">
               <div class="item-wrap">
                  <a href="#modal-01">
                      <button>Professor</button>

                  </a>
               </div>
         	</div> <!-- item end -->

         	   <div class="bgrid folio-item">
               <div class="item-wrap">
                  <a href="#modal-02">
                      <button>Aluno</button>

                  </a>
               </div>
         	</div> <!-- item end -->


	      </div>

      </div> <!-- end section-head -->


<!-- modal popup
	   	========================================================= -->
         <div id="modal-01" class="popup-modal mfp-hide">

		      <div class="description-box">
		      <p>
			      <form name="cad-prof" id="cad-prof" action="php/add_prof.php" method="post">
			      	<h4>Cadastro de Professores</h4><br>
			      	Usuário: <input type="text" name="nome" size="40" style="margin-left: 10px" placeholder="Digite o seu nome de usuário" required />
						Senha: <input type="password" name="senha" size="40" style="margin-left: 20px" placeholder="Digite a sua senha" required= />
						Confirmar senha: <input type="password" name="senha2" size="28" style="margin-left: 20px" placeholder="Digite a sua senha novamente" required />
						E-mail: <input type="email" name="email" size="40" style="margin-left: 20px" placeholder="Digite o seu e-mail" required />
						Formação: <input type="text" name="formacao" size="40" style="margin-left: 20px" placeholder="Digite seu Maior grau de formação" required /><br/>
		 				Instituiçao: <input type="text" name="instituicao" size="40" style="margin-left: 20px" placeholder="Digite o nome da sua instituição" required />
						Telefone: <input type="text" name="telefone" size="40" style="margin-left: 20px" placeholder="Digite seu telefone" maxlenght="15" required/><br/>
			      </form>
				</p>
		      </div>

            <div class="link-box group">
            	<a href="#" class="popup-modal-dismiss">Voltar</a>
            	<a href="javascript:document.getElementById('cad-prof').submit();">Proximo</a>

            </div>

	      </div><!-- modal-01 end -->

	      <!--Modal2 começa-->

			<div id="modal-02" class="popup-modal mfp-hide">

		      <div class="description-box">
		      <p>
			      <form name="cad-aluno" id="cad-aluno" action="php/add_aluno.php" method="post">
			      	<h4>Cadastro de Alunos</h4><br>
			      	Usuário: <input type="text" name="nome" size="40" style="margin-left: 10px" placeholder="Digite o seu nome de usuário" required />
						Senha: <input type="password" name="senha" size="40" style="margin-left: 20px" placeholder="Digite a sua senha" required= />
						Confirmar senha: <input type="password" name="senha2" size="28" style="margin-left: 20px" placeholder="Digite a sua senha novamente" required />
						E-mail: <input type="email" name="email" size="40" style="margin-left: 20px" placeholder="Digite o seu e-mail" required />
						curso: <input type="text" name="curso" size="40" style="margin-left: 20px" placeholder="Digite seu curso" required /><br/>
		 				Instituiçao: <input type="text" name="instituicao" size="40" style="margin-left: 20px" placeholder="Digite o nome da sua instituição" required />
						Telefone: <input type="text" name="telefone" size="40" style="margin-left: 20px" placeholder="Digite seu telefone" maxlenght="15" required/><br/>
			      </form>
				</p>
		      </div>

            <div class="link-box group">
            	<a href="#" class="popup-modal-dismiss">Voltar</a>
            	<a href="javascript:document.getElementById('cad-aluno').submit();">Proximo</a>

            </div>

	      </div><!-- modal-02 end -->

   </section> <!-- end portfolio -->


   <!-- Services Section Login vai ser aqui
   ================================================== -->
   <section id="services">

   	<div class="row section-head">

      	<div class="twelve columns">

      		<h1>Já é cadastrado?faça login<span>.</span></h1>

	         <hr />

	         	<form name="F_Login" action="php/login.php" method="POST">
						<p class="login">
						Email: <input type="email" name="email" size="40" style="margin-left: 10px" placeholder="Digite o seu nome de usuário" /><br/>
						Senha: <input type="password" name="senha" size="40" style="margin-left: 20px" placeholder="Digite a sua senha" /><br/>
						</a> <input  type="submit" value="Entrar">
						</p>
					</form>

	      </div>

      </div> <!-- end section-head -->
</section>




   <!-- About Section sobre/time
   ================================================== -->
   <section id="about">

   	<div class="row section-head">

      	<div class="twelve columns">

      		<h1>Quem nós somos<span>.</span></h1>

	         <hr />

	         <p>Somo um grupo de alunos que começou um projeto durante as aulas para ajudar outros alunos,Sabemos que
	         as vezes uma cadeira pode ser realmente desafiadora e qua muitas vezes é dificil aprender sem ajuda.
	         Portanto decidimos criar o QueroAulas visando ajudar outro alunos.</p>

	      </div> <!-- end section-head -->


      <div class="row team section-head">

   		<div class="twelve columns">

	     <!--    <h1>Conheça nosso time<span>.</span></h1>

	         <hr />

	      </div>

      </div> <!-- end section-head -->
<!--
      <div class="row">

         <div id="team-wrapper" class="bgrid-fourth s-bgrid-third tab-bgrid-half mob-bgrid-whole group">

            <div class="bgrid member">

					<div class="member-pic">
						<img src="images/team/member01-k.jpg" alt=""/>
                 	<div class="mask"></div>
               </div>
               <div class="member-name">
                  <h3>Naruto Uzumaki</h3>
                  <span>Creative Director</span>
               </div>

               <p>Proin gravida nibh vel velit auctor aliquet. Aenean sollicitudin, lorem quis bibendum auctor,
               nisi elit consequat ipsum, nec sagittis sem nibh id elit. </p>

               <ul class="member-social">
                  <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                  <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                  <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                  <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                  <li><a href="#"><i class="fa fa-skype"></i></a></li>
               </ul>

            </div> <!-- end member -->
<!--
            <div class="bgrid member">

					<div class="member-pic">
                  <img src="images/team/member03-k.jpg" alt=""/>
               	<div class="mask"></div>
               </div>
               <div class="member-name">
                  <h3>Sasuke Uchiha</h3>
                  <span>Lead Designer</span>
               </div>

               <p>Proin gravida nibh vel velit auctor aliquet. Aenean sollicitudin, lorem quis bibendum auctor,
               nisi elit consequat ipsum, nec sagittis sem nibh id elit. </p>

               <ul class="member-social">
                  <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                  <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                  <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                  <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                  <li><a href="#"><i class="fa fa-skype"></i></a></li>
               </ul>

            </div> <!-- end member -->
<!--
            <div class="bgrid member">

					<div class="member-pic">
						<img src="images/team/member04-k.jpg" alt=""/>
                 	<div class="mask"></div>
               </div>
               <div class="member-name">
                  <h3>Shikamaru Nara</h3>
                  <span>Designer</span>
               </div>

               <p>Proin gravida nibh vel velit auctor aliquet. Aenean sollicitudin, lorem quis bibendum auctor,
               nisi elit consequat ipsum, nec sagittis sem nibh id elit. </p>

               <ul class="member-social">
                  <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                  <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                  <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                  <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                  <li><a href="#"><i class="fa fa-skype"></i></a></li>
               </ul>

     			</div> <!-- end member -->
<!--
            <div class="bgrid member">

					<div class="member-pic">
                 	<img src="images/team/member05-k.jpg" alt=""/>
                 	<div class="mask"></div>
               </div>
               <div class="member-name">
                  <h3>Sakura Haruno</h3>
                  <span>Designer</span>
               </div>

               <p>Proin gravida nibh vel velit auctor aliquet. Aenean sollicitudin, lorem quis bibendum auctor,
               nisi elit consequat ipsum, nec sagittis sem nibh id elit. </p>

               <ul class="member-social">
                  <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                  <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                  <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                  <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                  <li><a href="#"><i class="fa fa-skype"></i></a></li>
               </ul>

            </div> <!-- end member -->

      <!--   </div>  end team-wrapper -->

      <!--</div> <!-- end row -->

      <div id="call-to-action">



	   </div> <!-- end call-to-action -->

   </section> <!-- end about -->


   <!-- Testimonials Section testemunhos
   ================================================== -->
   <section id="testimonials">

      <div class="row content flex-container">

         <div id="testimonial-slider" class="flexslider">

            <ul class="slides">
               <li>
                  <p>Your work is going to fill a large part of your life, and the only way to be truly satisfied is
                  to do what you believe is great work. And the only way to do great work is to love what you do.
                  If you haven't found it yet, keep looking. Don't settle. As with all matters of the heart, you'll know when you find it.
                  </p>

                  <div class="testimonial-author">
                    	<img src="images/avatars/avatar-1.jpg" alt="Author image">
                    	<div class="author-info">
                    		Steve Jobs
                    		<span class="position">CEO, Apple.</span>
                    	</div>
                  </div>
             	</li> <!-- end slide -->

               <li>
                  <p>This is Photoshop's version  of Lorem Ipsum. Proin gravida nibh vel velit auctor aliquet.
                  Aenean sollicitudin, lorem quis bibendum auctor, nisi elit consequat ipsum, nec sagittis sem
                  nibh id elit. Duis sed odio sit amet nibh vulputate cursus a sit amet mauris.
                  </p>
                  <div class="testimonial-author">
                    	<img src="images/avatars/avatar-2.jpg" alt="Author image">
                    	<div class="author-info">
                    		John Doe
                    		<span>CEO, ABC Corp.</span>
                    	</div>
                  </div>
               </li> <!-- end slide -->

            </ul> <!-- end slides -->

         </div> <!-- end flexslider -->

      </div> <!-- end row -->

   </section> <!-- end testimonials section -->


   <!-- contact
   ================================================== -->
   <section id="contact">

   	<div class="row section-head">

   		<div class="twelve columns">

	         <h1>Entre em contato<span>.</span></h1>

	         <hr />

	      </div>

      </div> <!-- end section-head -->

      <div class="row">

      	<div id="contact-form" class="six columns tab-whole left">

            <!-- form -->
            <form name="contactForm" id="contactForm" method="post" action=""  >
      			<fieldset>

                  <div class="group">
 						   <input name="contactName" type="text" id="contactName" placeholder="Name" value="" minLength="2" required />
                  </div>
                  <div>
	      			   <input name="contactEmail" type="email" id="contactEmail" placeholder="Email" value="" required />
	               </div>
                  <div>
	     				   <input name="contactSubject" type="text" id="contactSubject" placeholder="Subject"  value="" />
	               </div>
                  <div>
	                 	<textarea name="contactMessage"  id="contactMessage" placeholder="message" rows="10" cols="50" required ></textarea>
	               </div>
                  <div>
                     <button class="submitform">Enviar</button>
                     <div id="submit-loader">
                        <div class="text-loader">Enviando...</div>
       				      <div class="s-loader">
								  	<div class="bounce1"></div>
								  	<div class="bounce2"></div>
								  	<div class="bounce3"></div>
								</div>
							</div>
                  </div>

      			</fieldset>
      		</form> <!-- Form End -->

            <!-- contact-warning -->
            <div id="message-warning"></div>
            <!-- contact-success -->
      		<div id="message-success">
               <i class="icon-ok"></i>Sua mensagem foi envia!<br />
      		</div>

         </div>

         <div class="six columns tab-whole right">

            <p class="lead">Tem uma duvida?fale conosco que faremos o possivel para esclarecela.Sugestão?mande tambem estamos sempre
            analisando o feedback de nossos usuarios para tornar a plataforma o mais uitl possivel</p>


            <h3>Numeros de Contato:</h3>
			   <p>Telefone: (000) 555 1212<br>
			   	Whtasapp: (000) 555 0100<br>
			     	Fax: (000) 555 0101
			   </p>

         </div>

      </div> <!-- end row -->

   </section>  <!-- end contact -->


   <!-- Footer
   ================================================== -->
   <footer>

      <div class="row">

      	<div class="twelve columns content group">

				<ul class="social-links">
               <li><a href="#"><i class="fa fa-facebook-square"></i></a></li>
               <li><a href="#"><i class="fa fa-twitter-square"></i></a></li>
               <li><a href="#"><i class="fa fa-google-plus-square"></i></a></li>
               <li><a href="#"><i class="fa fa-youtube-play"></i></a></li>
               <li><a href="#"><i class="fa fa-vimeo-square"></i></a></li>
               <li><a href="#"><i class="fa fa-flickr"></i></a></li>
               <li><a href="#"><i class="fa fa-skype"></i></a></li>
            </ul>

            <hr />

            <div class="info">

            	<div class="footer-logo"></div>

	            <p>Esse site é uma plataforma designada para auxiliar no relacionamento entre alunos e professores particulares
	            visando o melhor para ambos
	            </p>

	         </div>

      	</div>

         <ul class="copyright">
         	<li>&copy; Copyright 2015 KREO.</li>
         	<li>Design by <a href="http://www.styleshout.com/">Styleshout.</a>.</li>
         </ul>

         <div id="go-top">
            <a class="smoothscroll" title="Back to Top" href="#hero">Back to Top<i class="fa fa-angle-up"></i></a>
         </div>

      </div> <!-- end row -->

   </footer> <!-- end footer -->

   <div id="preloader">
    	<div id="loader"></div>
   </div>

   <!-- Java Script
   ================================================== -->
   <script src="js/jquery-1.11.3.min.js"></script>
   <script src="js/jquery-migrate-1.2.1.min.js"></script>
   <script src="js/jquery.flexslider-min.js"></script>
   <script src="js/jquery.waypoints.min.js"></script>
   <script src="js/jquery.validate.min.js"></script>
   <script src="js/jquery.fittext.js"></script>
   <script src="js/jquery.placeholder.min.js"></script>
   <script src="js/jquery.magnific-popup.min.js"></script>
   <script src="js/main.js"></script>

</body>

</html>
