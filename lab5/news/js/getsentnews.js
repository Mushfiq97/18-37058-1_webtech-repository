
function MyAjaxFunc() {
  var xhttp = new XMLHttpRequest();
 
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
      res = JSON.parse(this.responseText);
    
      var maincontainer = document.getElementById("main-container");
      var name;
      var l = Object.keys(res).length;
      console.log(l);
      var f;
      var e;
      var a;
      var r;
   

      for (i = 0; i < l; i++) {
        f = document.createElement("div");
        f.innerHTML = `
        <div class="news-grid-container">
            <p>News Id :</p>
            <p>`+res[i].id+`</p>
            <p>News Status :</p>
            <p>`+res[i].status+`</p>
            <p>Category :</p>
            <p>`+res[i].catagory+`</p>
            <p>Publish Date :</p>
            <p>`+res[i].date+`</p>
            <img id="news-img" ; src="`+res[i].images+`" alt="" srcset="">

            <p>News Title :</p>
            <p class="news-title">`+res[i].title+`</p>
            <p>News Body :</p>
            <p class="news-title">`+res[i].body+`</p>
            <br>
            <form action="../control/delete-news.php" method="post">
        <input type="hidden" name="id" value="` + res[i].id + `">
        <input  type="submit" value="delete" name="delete">
        </form>
        </div>
        

        `;

        maincontainer.appendChild(f);
      }
    }
	
  };

  xhttp.open("GET", "http://localhost/lab5/news/control/getsentnews.php", true);
 
  xhttp.send();
}