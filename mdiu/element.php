<?
  $head =  "

          <div class='col-sm-3 col-xs-12 hidden-xs' >
            <img src='assets/tavis_logo.png'  >
          </div>
          <div class='col-sm-5 col-xs-12 '>
            <img src='assets/tavis_logo2.png' >
          </div>
          <div class='col-sm-4 col-xs-pull-left col-xs-push-1  hidden-xs'>
            <img src='assets/telek.png' > 
          </div>";
  $dim=" <img src='assets/logo.png' >";
 $nav_shapka_foother = array (
  array('Мій Дім in UA','http://www.tavis.com.ua'),
  array('УПРАВЛІННЯ','per.php'),
  array('ПОСЛУГИ','http://www.tavis.com.ua/equipment/'),
  array('НОВИНИ','http://www.tavis.com.ua/uslugi/'),
  array('ВХІД / РЕЄСТРАЦІЯ','http://www.tavis.com.ua/about/'),
  array('КОНТАКТИ','http://www.tavis.com.ua/kontakty/'),
);        
foreach($nav_shapka_foother as $key => $value) {
    $nav_panel .= " <li ".($point == $key ? " class ='current_page_item'":"")." ><a ' href= $value[1]> $value[0]</a></li>";
}

$nav_content = array(
 nav_1=>array(
  array ('Тротуарная плитка', 'http://www.tavis.com.ua/plitka_trotuarnaja/n'),
  array('Стеновые бетонные блоки','http://www.tavis.com.ua/stenovye_bloki/'),
  array('Заборы из бетона, оградки, памятники','http://www.tavis.com.ua/zabor/'),
  array('Котёл пиролизный','http://www.tavis.com.ua/kotel_na_opilkah/'),
  array('Пигмент чёрный'),
  ),
  nav_2=>array(
  array('Горбыль деловой термообработанный','http://www.tavis.com.ua/gorbyl/'),
  array('Импортные технологии и оборудование для термообработки древесины','http://www.tavis.com.ua/tehnologija/'),
  array('Обработка древесины. История и перспективы.','http://www.tavis.com.ua/istoria_drevesiny/'),
  array('Термодревесина – путь в будущее','http://www.tavis.com.ua/future/'),
  array('Терраса из дерева или мрамора','http://www.tavis.com.ua/terrasa_iz_dereva/'),
  array('Термодерево','http://www.tavis.com.ua/termoderevo/'),
  array('Недостатки термодревесины','http://www.tavis.com.ua/nedostatki/'),
  array('Деревянная вагонка','http://www.tavis.com.ua/vagonka_iz_dereva/'),
  array('Термодоска по доступной цене', 'http://www.tavis.com.ua/termodoska/'),
  array('Чем болеют деревянные дома?','http://www.tavis.com.ua/bolezni_dereva/'),
  array('Термомодификация древесины','http://www.tavis.com.ua/termomodifikacija/'),
  array('История термообработки древесины','http://www.tavis.com.ua/history/'),
  array('Що вибрати: дерев’яний зруб чи цегляну хатинку?', 'http://www.tavis.com.ua/zrub_vs_cegla/'),
  array('Термососна: где купить, сравнение цен, обзор качества','http://www.tavis.com.ua/termososna/'),
  array('Строим баню на загородном участке','http://www.tavis.com.ua/stroim_baniu/'),
  ),
);
  $right_nav_panel .= "
    <h2 class='widget-title'>Другая продукция</h2>
    <ul>
    ";  
     foreach($nav_content[nav_1] as $key => $value) {
                  $right_nav_panel.= " <li class='arrow '><a class = 'non-podch' href= ".$value[1].">$value[0]</a></li>";
      }
    $right_nav_panel .= "
      </ul>
        <h2 class='widget-title'>Статьи</h2>
          
            <ul > ";
              foreach($nav_content[nav_2] as $key => $value) {
                $right_nav_panel .="<li class='arrow'><a class = 'non-podch' href= $value[1]>$value[0]</a></li>";
              }
              $right_nav_panel .= "
                    </ul>
                  
            ";

  $foother = " <footer id='colophon' class='site-footer' role='contentinfo'>
                <div id='footer-navigation' >
                  <ul  class='menu'>";
  foreach($nav_shapka_foother as $key => $value) {
    $foother .= " <li><a href= $value[1]> $value[0]</a></li>";
  }
  $foother .= " </ul> </div> ";
  $foother .= "<div class='copyright'>
                  © 2004-2017 Всі права захищені.   
        <script type='text/javascript'>
document.write('<a href='http://www.liveinternet.ru/click' '+
'target=_blank><img src='//counter.yadro.ru/hit?t26.11;r'+
escape(document.referrer)+((typeof(screen)=='undefined')?'':
';s'+screen.width+'*'+screen.height+'*'+(screen.colorDepth?
screen.colorDepth:screen.pixelDepth))+';u'+escape(document.URL)+
';'+Math.random()+' alt='' title='LiveInternet''+
'border='0' width='88' height='15'><\/a>')
</script>
      </div></footer>";
    

$menu =  " 
      <nav class='navbar navbar-default'>
        <div class='container'>
          <!-- СПИСОК СВОРАЧИВАНИЯ -->
          <div class='navbar-header '>
            <button type='button' class='navbar-toggle collapsed' data-toggle='collapse' data-target='#bs-example-navbar-collapse-1' aria-expanded='false'>
              <span class='sr-only'></span>
              <span class='icon-bar'></span>
              <span class='icon-bar'></span>
              <span class='icon-bar'></span>
            </button>
             <a class='navbar-brand ' href='index.php'>Мій Дім in UA</a>
          </div>

          <!-- Collect the nav links, forms, and other content for toggling -->
          
          <div class='collapse navbar-collapse ' id='bs-example-navbar-collapse-1'>
            <ul class='nav navbar-nav'>
      
             <li class='dropdown'>
                <a href='#' class='dropdown-toggle' data-toggle='dropdown'>Управління  <span class='glyphicon glyphicon-menu-down'></span></a>
                <ul class='dropdown-menu '>
                  <li ><a href='index2.html'>Бюджет</a></li>
                  <li role='separator' class='divider'></li>
                  <li><a href='#'>Бухгалтерія</a></li>
                  <li role='separator' class='divider'></li>
                  <li><a href='#'>Сусіди</a></li>
                  <li role='separator' class='divider'></li>
                </ul>
              </li>
              <li class='dropdown'>
                <a href='#' class='dropdown-toggle' data-toggle='dropdown'>Послуги <span class='glyphicon glyphicon-menu-down'></span></a>
                <ul class='dropdown-menu '>
                  <li ><a href='index2.html'>Сантехніки</a></li>
                  <li role='separator' class='divider'></li>
                  <li><a href='#'>Електрики</a></li>
                  <li role='separator' class='divider'></li>
                  <li><a href='#'>Бухгалтери</a></li>
                  <li role='separator' class='divider'></li>
                  <li><a href='#'>Інше</a></li>
                  <li role='separator' class='divider'></li>
                </ul>
              </li>
              <li><a href='#'>Новини</a></li>
              <li class='dropdown'>
                <a href='#' class='dropdown-toggle' data-toggle='dropdown'>Вхід / Реєстрація <span class='glyphicon glyphicon-menu-down'></span></a>
                <ul class='dropdown-menu '>
                  <li ><a href='index2.html'>Реєстрація</a></li>
                  <li role='separator' class='divider'></li>

                  <form class='navbar-form navbar-left'>
                    <div class='form-group'>
                      <input type='text' class='form-control otsy' placeholder='Логін'>
                    </div>
                    <div class='form-group'>
                      <input type='password' class='form-control otsy' placeholder='Пароль'>
                    </div>
                    <button style='background-color:#27ae60; color:white; width:100px;height:40px;' type='submit' class='btn btn-default'>Увійти</button>
                  </form>  

                </ul>
              </li>
            
            </ul>

          </div><!-- /.navbar-collapse -->
          
          </div>
    </nav>
";


    require_once("shablon.html");
    require_once("funcion.php");

?>