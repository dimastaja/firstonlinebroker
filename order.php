<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Первый онлайн брокер</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css">

    <!-- Fonts -->
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
	<link href="css/animate.css" rel="stylesheet" />
    <!-- Squad theme CSS -->
    <link href="css/style.css" rel="stylesheet">
	<link href="color/default.css" rel="stylesheet">
    
    <link href="css/custom_style.css" rel="stylesheet">
	
    

</head>

<body id="page-top" data-spy="scroll" data-target=".navbar-custom">
	<!-- Preloader -->
	<div id="preloader">
	  <div id="load"></div>
	</div>
    
    <nav class="navbar navbar-custom navbar-fixed-top top-nav-collapse" role="navigation">
        <div class="container">
            

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse navbar navbar-main-collapse">
      <ul class="nav navbar-nav">
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown"><img  src="img/burger.png"/> </a>
          <ul class="dropdown-menu">
            <li><a href="/">Наши продукты</a></li>
            <li><a href="/order.php">Заказать полис</a></li>
            <li><a href="/">О компании</a></li>
          </ul>
        </li>
        <li class="active"><a href="#intro">Главная</a></li>
        <li><a href="#service">О сервисе</a></li>
		<li><a href="#why">Почему мы</a></li>
        <li><a href="#corp">Корп. клиентам</a></li>
        <li><a href="#reply">Отзывы</a></li>
		<li><a href="#contact">Контакты</a></li>
        
      </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>

	<div class="form-wrapper">
    <h4>Пожалуйста, заполните все поля анкеты</h4>
            <div class="app_form_wrapper">
                <form method="post" action="/app_fill.php" id="app_form" class="form-horizontal">
                <?
                    $arInputs=array(array('label'=>'Страхователь (Заявитель)', 'name'=>'applicant', 'type'=>'text', 'placeholder'=>''),
                                     array('label'=>'Адрес/местонахождение:', 'name'=>'address', 'type'=>'text', 'placeholder'=>''),
                                     array('label'=>'ИНН / КПП', 'name'=>'inn', 'type'=>'text', 'placeholder'=>'123123123 / 1231231212'),
                                     array('label'=>'Р/С', 'name'=>'rs', 'type'=>'text', 'placeholder'=>''),
                                     array('label'=>'К/С', 'name'=>'ks', 'type'=>'text', 'placeholder'=>''),
                                     array('label'=>'БИК', 'name'=>'bik', 'type'=>'text', 'placeholder'=>''),
                                     array('label'=>'Эл. адрес', 'name'=>'email', 'type'=>'email', 'placeholder'=>''),
                                     array('label'=>'телефон', 'name'=>'phone', 'type'=>'text', 'placeholder'=>''),
                                     array('label'=>'Валовая годовая<br/> выручка компании <br/>(за последний отчетный год):', 'name'=>'income', 'type'=>'text', 'placeholder'=>''),   
                    );
                    
                    foreach($arInputs as $input)
                    {?>
                        <div class="form-group ins_inputs">
                            <label for="inp_<?=$input['name']?>" class="col-sm-2 control-label"><?=$input['label']?>:</label>
                            <div class="col-sm-8">
                                <input id="inp_<?=$input['name']?>" name="<?=$input['name']?>" type="<?=$input['type']?>" class="form-control"  placeholder="<?=$input['placeholder']?>"/>
                            </div>
                        </div> 
                    <?}
                    
                    require("arrays.php");
                    $arLim=array('4 000 000 р.','7 000 000 р.','14 000 000 р.','21 000 000 р.','28 000 000  р.');
                    $arDaNet=array('Пожалуйста, ответьте на вопрос','Да','Нет');
                    $arSelects = array(
                        array('label'=>'Отрасль/Сектор', 'name'=>'sphere', 'type'=>'long', 'data'=>$arSphere),
                        array('label'=>'Пожалуйста, выберите требуемый лимит ответственности', 'name'=>'limit', 'type'=>'short', 'data'=>$arLim),
                        array('label'=>'1) Страхователь является резидентом Российской Федерации и осуществляет <br/>НЕПРЕРЫВНУЮ ДЕЯТЕЛЬНОСТЬ НА ПРОТЯЖЕНИИ, КАК МИНИМУМ, 3 лет. ', 'name'=>'q1', 'type'=>'short', 'data'=>$arDaNet),
                        array('label'=>'2)  Страхователь НЕ оказывает финансовых услуг и НЕ является финансовым учреждением или компанией, оказывающей услуги в области фармацевтики, биотехнологий или информационных технологий. ', 'name'=>'q2', 'type'=>'short', 'data'=>$arDaNet),
                        array('label'=>'3) Страхователь в настоящий момент не имеет действующего страхового покрытия ответственности директоров и должностных лиц в компании ЗАО "АИГ".', 'name'=>'q3', 'type'=>'short', 'data'=>$arDaNet),
                        array('label'=>'4) Ни Страхователь, ни одна из его дочерних компаний не имеет ценных бумаг в обращении на фондовой бирже (Московская фондовая биржа или др.).', 'name'=>'q4', 'type'=>'short', 'data'=>$arDaNet),
                        array('label'=>'5) После наведения справок выяснилось, что за последние 5 лет НЕ подавалось НИКАКИХ исков/ требований в отношении Страхователя, любых бывших или действующих директоров или должностных лиц Страхователя, или любых его дочерних компаний, и что Страхователю и его дочерним компаниям не известно о каких-либо обстоятельствах или действиях, которые могли бы стать причиной подачи такого иска/требования.', 'name'=>'q5', 'type'=>'short', 'data'=>$arDaNet),
                        array('label'=>'6) Страхователь находится в ПЛАТЕЖЕСПОСОБНОМ С ТЕХНИЧЕСКОЙ ТОЧКИ ЗРЕНИЯ положении (т.e. суммарные активы превышают суммарные пассивы).', 'name'=>'q6', 'type'=>'short', 'data'=>$arDaNet),
                    );
                    
                    foreach ($arSelects as $select)
                    {?>
                        <div class="form-group ins_sel_<?=$select['type']?>">
                            <label for="inputEmail3" class="col-sm-2 control-label"><?=$select['label']?>:</label>
                            <div class="col-sm-8">
                                <select  class="form-control" name="<?=$select['name']?>">
                                    <?
                                    foreach($select['data'] as $val => $txt)
                                    {
                                        ?><option value="<?=$txt?>"><?=$txt?></option><?
                                    }
                                    ?>
                                </select>
                                
                            </div>
                        </div>
                    <?}
                    ?>     
                   <div class="form-group">
                        <div class="">
                            <button type="submit" class="btn btn-default">Оформить полис</button>&nbsp;&nbsp;&nbsp;<span class="preloader formpreloader hidden"></span> <span class="res"></span>
                        </div>
                    </div>  
                    <div class="success_res"></div>
                </form>
            
    </div>
    </div>
    <footer>
		<div class="container">
			<div class="row">
				<div class="col-md-12 col-lg-12">
					
                    <div class="footer-menu">
                        <div class="footer-menu-block">
                            <a class="footer-menu-main-link" href="#intro">Главная</a><br />
                            <a href="#insPorpery">Страхование имущества</a><br />
                            <a href="#insCitResp">Гражданская ответственность</a><br />
                            <a href="#insDO">D & O</a><br />
                            <a href="#insProfResp">Профессиональная ответственность</a>
                        </div>
                        
                        <div class="footer-menu-block">
                            <a class="footer-menu-main-link" href="#service">О сервисе</a><br />
                            <a href="#insPorpery">Lorem ipsumа</a><br />
                            <a href="#insCitResp">Set dolor est</a><br />
                            <a href="#insDO">Bla bla bla</a><br />
                           
                        </div>
                        
                        
                        <div class="footer-menu-block">
                            <a class="footer-menu-main-link" href="#why">Почему мы</a><br />
                            
                        </div>
                        
                        <div class="footer-menu-block">
                            <a class="footer-menu-main-link" href="#reply">Отзывы</a><br />
                            
                        </div>
                        
                        <div class="clear"></div>
                    </div>
                    
                    <!--<ul class="nav footer-">
                        
                        <li class=""><a href="#intro">Главная</a></li>
                        <li class=""><a href="#service">О сервисе</a></li>
                		<li class=""><a href="#why">Почему мы</a></li>
                        <li class=""><a href="#corp">Корп. клиентам</a></li>
                        <li class=""><a href="#reply">Отзывы</a></li>
                		<li class="active"><a href="#contact">Контакты</a></li>
                        
                  </ul>-->
					<p>&copy; ООО ФОБ 2016. Все права защищены. </p>
                    
				</div>
			</div>	
		</div>
	</footer>

    <!-- Core JavaScript Files -->
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.easing.min.js"></script>	
	<script src="js/jquery.scrollTo.js"></script>
	<script src="js/wow.min.js"></script>
    <!-- Custom Theme JavaScript -->
    <script src="js/custom.js"></script>

</body>

</html>


<div class="modal fade" id="ins_rules" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Правила страхования</h4>
      </div>
      <div class="modal-body">
       
       <p>Sed ut perspiciatis, unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam eaque ipsa, quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt, explicabo. Nemo enim ipsam voluptatem, quia voluptas sit, aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos, qui ratione voluptatem sequi nesciunt, neque porro quisquam est, qui dolorem ipsum, quia dolor sit, amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt, ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit, qui in ea voluptate velit esse, quam nihil molestiae consequatur, vel illum, qui dolorem eum fugiat, quo voluptas nulla pariatur? At vero eos et accusamus et iusto odio dignissimos ducimus, qui blanditiis praesentium voluptatum deleniti atque corrupti, quos dolores et quas molestias excepturi sint, obcaecati cupiditate non provident, similique sunt in culpa, qui officia deserunt mollitia animi, id est laborum et dolorum fuga. Et harum quidem rerum facilis est et expedita distinctio.</p>
       
       <p>Sed ut perspiciatis, unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam eaque ipsa, quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt, explicabo. Nemo enim ipsam voluptatem, quia voluptas sit, aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos, qui ratione voluptatem sequi nesciunt, neque porro quisquam est, qui dolorem ipsum, quia dolor sit, amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt, ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit, qui in ea voluptate velit esse, quam nihil molestiae consequatur, vel illum, qui dolorem eum fugiat, quo voluptas nulla pariatur? At vero eos et accusamus et iusto odio dignissimos ducimus, qui blanditiis praesentium voluptatum deleniti atque corrupti, quos dolores et quas molestias excepturi sint, obcaecati cupiditate non provident, similique sunt in culpa, qui officia deserunt mollitia animi, id est laborum et dolorum fuga. Et harum quidem rerum facilis est et expedita distinctio.</p>
       
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Закрыть</button>
      </div>
    </div>
  </div>
</div>


<div class="modal fade" id="ins_ex_practice" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Примеры из практики</h4>
      </div>
      <div class="modal-body">
       
       <p>Sed ut perspiciatis, unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam eaque ipsa, quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt, explicabo. Nemo enim ipsam voluptatem, quia voluptas sit, aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos, qui ratione voluptatem sequi nesciunt, neque porro quisquam est, qui dolorem ipsum, quia dolor sit, amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt, ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit, qui in ea voluptate velit esse, quam nihil molestiae consequatur, vel illum, qui dolorem eum fugiat, quo voluptas nulla pariatur? At vero eos et accusamus et iusto odio dignissimos ducimus, qui blanditiis praesentium voluptatum deleniti atque corrupti, quos dolores et quas molestias excepturi sint, obcaecati cupiditate non provident, similique sunt in culpa, qui officia deserunt mollitia animi, id est laborum et dolorum fuga. Et harum quidem rerum facilis est et expedita distinctio.</p>
       
       <p>Sed ut perspiciatis, unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam eaque ipsa, quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt, explicabo. Nemo enim ipsam voluptatem, quia voluptas sit, aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos, qui ratione voluptatem sequi nesciunt, neque porro quisquam est, qui dolorem ipsum, quia dolor sit, amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt, ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit, qui in ea voluptate velit esse, quam nihil molestiae consequatur, vel illum, qui dolorem eum fugiat, quo voluptas nulla pariatur? At vero eos et accusamus et iusto odio dignissimos ducimus, qui blanditiis praesentium voluptatum deleniti atque corrupti, quos dolores et quas molestias excepturi sint, obcaecati cupiditate non provident, similique sunt in culpa, qui officia deserunt mollitia animi, id est laborum et dolorum fuga. Et harum quidem rerum facilis est et expedita distinctio.</p>
       
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Закрыть</button>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="ins_faq" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">FAQ</h4>
      </div>
      <div class="modal-body">
       
       <p>Sed ut perspiciatis, unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam eaque ipsa, quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt, explicabo. Nemo enim ipsam voluptatem, quia voluptas sit, aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos, qui ratione voluptatem sequi nesciunt, neque porro quisquam est, qui dolorem ipsum, quia dolor sit, amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt, ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit, qui in ea voluptate velit esse, quam nihil molestiae consequatur, vel illum, qui dolorem eum fugiat, quo voluptas nulla pariatur? At vero eos et accusamus et iusto odio dignissimos ducimus, qui blanditiis praesentium voluptatum deleniti atque corrupti, quos dolores et quas molestias excepturi sint, obcaecati cupiditate non provident, similique sunt in culpa, qui officia deserunt mollitia animi, id est laborum et dolorum fuga. Et harum quidem rerum facilis est et expedita distinctio.</p>
       
       <p>Sed ut perspiciatis, unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam eaque ipsa, quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt, explicabo. Nemo enim ipsam voluptatem, quia voluptas sit, aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos, qui ratione voluptatem sequi nesciunt, neque porro quisquam est, qui dolorem ipsum, quia dolor sit, amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt, ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit, qui in ea voluptate velit esse, quam nihil molestiae consequatur, vel illum, qui dolorem eum fugiat, quo voluptas nulla pariatur? At vero eos et accusamus et iusto odio dignissimos ducimus, qui blanditiis praesentium voluptatum deleniti atque corrupti, quos dolores et quas molestias excepturi sint, obcaecati cupiditate non provident, similique sunt in culpa, qui officia deserunt mollitia animi, id est laborum et dolorum fuga. Et harum quidem rerum facilis est et expedita distinctio.</p>
       
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Закрыть</button>
      </div>
    </div>
  </div>
</div>

