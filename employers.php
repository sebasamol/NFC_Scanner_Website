<html>
  <header>
         <style type="text/css">
       td {border: 1px #DDD solid; padding: 5px; cursor: pointer;}
       .selected {
                  background-color: brown;
                  color: #FFF;
                  }
          </style>
 </header>
        <body>
        <table id="table">
            <tr>
                <td>1 Ferrari F138</td>
                <td>1 000€</td>
                <td>1 200€</td>
            </tr>
            <tr>
                <td>2 Ferrari F138</td>
                <td>1 000€</td>
                <td>1 200€</td>
            </tr>
            
        </table>
      <input type="button" id="tst" value="OK" onclick="fnselect()" />
    
    <script>
        var table = document.getElementById('table');
        var selected = table.getElementsByClassName('selected');
        table.onclick = highlight;
    
    function highlight(e) {
        if (selected[0]) selected[0].className = '';
        e.target.parentNode.className = 'selected';
    }
    
    function fnselect(){
        var element = document.querySelectorAll('.selected');
        if(element[0]!== undefined){ //it must be selected
         alert(element[0].children[0].firstChild.data);
        }
    }
  </script>
 </body>
</html>
