<head>
    <meta charset="utf-8">
    <!-- Bootstrap core CSS -->
    <link href="./bootstrap/bootstrap.min.css" rel="stylesheet">
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <link href="./bootstrap/ie10-viewport-bug-workaround.css" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="./bootstrap/form.css" rel="stylesheet">
    <script src="./bootstrap/ie-emulation-modes-warning.js"></script>

    <title>Planilha de ativos</title>
</head>
<body>
    <div class="container">
        <div id="myProgress">
          <div id="myBar" class="progress-bar progress-bar-striped active" role="progressbar">              
          </div>
      </div>
      <ul class="tab"id="tab" style="display:none">
          <li><a href="#Computadores" class="tablinks">Computadores</a></li>
          <li><a href="#Impressoras" class="tablinks">Impressoras</a></li>
          <li><a href="#Radios" class="tablinks">Radios</a></li>
          <li><a href="#Coletores" class="tablinks">Coletores</a></li>
      </ul>
      <br>
      <div id="Computadores" class="tabContent">
       <h3>Computadores</h3>
       <?php include"tabelaPCs.php" ?>
   </div>
   <div id="Impressoras" class="tabContent">
       <h3>Impressoras</h3>  
       <?php include"tabelaPrint.php" ?>
   </div>
   <div id="Radios" class="tabContent">
       <h3>Radios</h3>  
       <?php include"tabelaRadios.php" ?>
   </div>
   <div id="Coletores" class="tabContent">
       <h3>Coletores</h3>  
       <?php include"tabelaColetores.php" ?>
   </div>
</div>
</body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script type="text/javascript">
    $(document).ready(function () {

        var timeInterval, tabCount = 0, currnetIndex = 1;
        tabCount = $('ul#tab').find('li a').length;
        var tabContentObj = $('.tabContent');
        changeTabIndex();
        timeInterval = setInterval(function () { changeTabIndex(); }, 10 * 1000);

        function changeTabIndex() {
            if (currnetIndex > tabCount) {
                currnetIndex = 1;
            }
            tabContentObj.hide();
            $('ul#tab').find('li.selected').removeClass('selected');
            var currentAncorObj = $('ul#tab').find('li a').eq(currnetIndex - 1);
            currentAncorObj.parent().addClass('selected');
            $(currentAncorObj.attr('href')).show();
            currnetIndex++;
            var elem = document.getElementById("myBar"); 
            var width = 1;
            var id = setInterval(frame, 100);
            function frame() {
                if (width >= 100) {
                    clearInterval(id);
                } else {
                    width++; 
                    elem.style.width = width + '%'; 
                }
            }
        };
});
</script>
