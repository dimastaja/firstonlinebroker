
<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Онлайн страхование бизнеса</title>
    
    <script type="text/javascript" src="/js/jquery.js"></script>
    <link href="/css/style.css" rel="stylesheet"/>
    <!-- Jquery UI-->
    <link href="/jquery-ui/jquery-ui.min.css" rel="stylesheet"/>
    <script src="/jquery-ui/jquery-ui.min.js"></script>
    <!-- END Jquery UI-->
    
    <!-- BOOTSTRAP-->
    <link href="/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="/bootstrap/css/bootstrap-theme.min.css" rel="stylesheet" type="text/css" />
    <script type="text/javascript" src="/bootstrap/js/bootstrap.min.js"></script>
    <!-- END BOOTSTRAP-->
    
    <script src="/js/jquery.form.js"></script> 
    
    <script type="text/javascript" src="/js/script.js"></script>
</head>

<body>
    <div class="main">
        <div class="ins_header">
            <h1>Онлайн страхование бизнеса</h1>
            <div class="btn_cont">
                <button type="button" class="btn btn-primary " data-href="#anc_ins_seo" data-div='#ins_app_seo'>Страхование <br /> от-ти Директоров</button>
                <button type="button" class="btn btn-default">Страхование <br /> ГО</button>
                <button type="button" class="btn btn-success" style="height:54px; width:111px; ">Property</button>
            </div>
        </div>
        <br />
            <h3>Общая информация о страховании</h3>
        <div class="general_info">
            <div class="info_txt">
                Sed ut perspiciatis, unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam eaque ipsa, quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt, explicabo. Nemo enim ipsam voluptatem, quia voluptas sit, aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos, qui ratione voluptatem sequi nesciunt, neque porro quisquam est, qui dolorem ipsum, quia dolor sit, amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt, ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit, qui in ea voluptate velit esse, quam nihil molestiae consequatur, vel illum, qui dolorem eum fugiat, quo voluptas nulla pariatur? At vero eos et accusamus et iusto odio dignissimos ducimus, qui blanditiis praesentium voluptatum deleniti atque corrupti, quos dolores et quas molestias excepturi sint, obcaecati cupiditate non provident, similique sunt in culpa, qui officia deserunt mollitia animi, id est laborum et dolorum fuga. Et harum quidem rerum facilis est et expedita distinctio.
            </div>
            <div class="info_btn">
                <button type="button" class="btn btn-info" data-toggle="modal" data-target="#ins_rules">Правила <br /> страхования</button>
                <button type="button" class="btn btn-info" data-toggle="modal" data-target="#ins_ex_practice">Примеры из <br /> практики</button>
                <button type="button" class="btn btn-info" data-toggle="modal" data-target="#ins_faq">FAQ</button>
            </div> 
        </div>
        <div class="clear"></div>
        <p><a id="anc_ins_seo"> </a></p>
        
        <div id="ins_app_seo" class="ins_apps">
            <h3>Страхование ответственности Директоров</h3>
            <p>Sed ut perspiciatis, unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam eaque ipsa, quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt, explicabo.</p>
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
    </div>
</body>
</html>

<? require("texts.php")?>

<?/*<!-- Yandex.Metrika counter --><script type="text/javascript"> (function (d, w, c) { (w[c] = w[c] || []).push(function() { try { w.yaCounter33580444 = new Ya.Metrika({ id:33580444, clickmap:true, trackLinks:true, accurateTrackBounce:true, webvisor:true }); } catch(e) { } }); var n = d.getElementsByTagName("script")[0], s = d.createElement("script"), f = function () { n.parentNode.insertBefore(s, n); }; s.type = "text/javascript"; s.async = true; s.src = "https://mc.yandex.ru/metrika/watch.js"; if (w.opera == "[object Opera]") { d.addEventListener("DOMContentLoaded", f, false); } else { f(); } })(document, window, "yandex_metrika_callbacks");</script><noscript><div><img src="https://mc.yandex.ru/watch/33580444" style="position:absolute; left:-9999px;" alt="" /></div></noscript><!-- /Yandex.Metrika counter -->*/?>

