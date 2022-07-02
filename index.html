
<!DOCTYPE html>
<html lang="hu">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="gallery.css" rel="stylesheet">
    <script src="jquery-3.5.1.js"></script>
    <title>Document</title>
</head>
<body onload="kepek()" >
    <div id="letakar2" onclick="megjelenitclose()"></div>

    <div id="letakar" onclick="letakarki()">
        
            <div class="ablak" onclick="asd()">
                <div class="adatok">
                    <div class="rfelhnev"><input type="text" placeholder="Felhasználónév" id="rfelhnev" class="rinput"></div>
                    <div class="rjelszo"><input type="password" placeholder="Jelszó" id="rjelszo" class="rinput"></div>
                    <div class="remail"><input type="email" placeholder="Email" id="remail" class="rinput"></div>
                </div>
                <br>
                <div class="rbuttons">
                    <button onclick="regisztracio()">Regisztráció</button>
                </div>
            </div>
       
    </div>

</div>
    <div class="keret" id="keret">

        

        
            <div class="header" id="header">
                <div class="cim">
                    <h1>Gallery</h1>
                </div>
                <div class="mygallery">
                    <h1 class="gmygallery" onclick="nemtom()">My Gallery</h1>
                    
                </div>
                <div class="bejelentkezes">
                    <div class="felhnev"><label>Felhasználónév:<input type="text" id="felhnev"></label></div>
                    <div class="jelszo"><label>Jelszó:<input type="password" id="jelszo" class="jinput"></label></div>
                    <br>
                    <div class="buttons">
                        <button onclick="bejelentkezes()">Bejelentkezés</button>
                        <button onclick="letakarbe()">Regisztráció</button>
                    </div>
                </div>
            </div>
            <div class="contents" id="contents">
                
            </div>
            <div class="footer">

            </div>
        
    </div>



    <script>
        function asd(){
        
            event.stopPropagation();
        }
        function letakarbe(){
            document.getElementById("letakar").style.setProperty("display","flex");
        }
        function letakarki(){
            document.getElementById("letakar").style.setProperty("display","none");
        }

        function regisztracio(){
            let felhnev = $("#rfelhnev").val();
            let jelszo = $("#rjelszo").val();
            let email = $("#remail").val();

            $.ajax({
                url: "register.php",
                method: "POST",
                dataType: "json",
                data: {felhnev:felhnev,jelszo:jelszo,email:email},
                success: function(vissza){
                    alert(vissza.hibaszöveg);
                    window.location.href="gallery.php";
                },
                error: function(a,b){
                    console.log(a.responseText);
                }
            })
        }
        function bejelentkezes(){
            let felhnev = $("#felhnev").val();
            let jelszo = $("#jelszo").val();

            $.ajax({
                url: "bejelentkezes.php",
                method: "POST",
                dataType: "json",
                data: {felhnev:felhnev,jelszo:jelszo},
                success: function(vissza){
                    console.log(vissza);
                    if(vissza.hibakód==0){
                        window.location.href='login.php?nev='+vissza.nev;
                    }
                    else{
                        alert(vissza.hibaszoveg);
                    }
                    
                },
                error: function(a,b){
                    console.log(a.responseText);
                }
            })
        }

        function megjelenit(){
            document.getElementById("letakar2").style.setProperty("display","flex");
            

            let div = document.createElement('div');
            div.id = "kepablak";
            let nev=document.getElementById(event.target.id).getAttribute('src');
            div.innerHTML="<img class='nagykep' src="+nev+">";
            document.getElementById("letakar2").appendChild(div);
            document.getElementById("keret").style.setProperty("overflow-y","hidden");
            
            
        }

        function megjelenitclose(){
            document.getElementById("letakar2").style.setProperty("display","none");            
            document.getElementById("letakar2").removeChild(document.getElementById("kepablak"));
            document.getElementById("keret").style.setProperty("overflow-y","auto");
        }

    function kepek(){
        
    
        $.ajax({
            url:"kepek.php",
            method:"POST",
            dataType:"json",
            data:{},
            success: function(vissza){
                console.log(vissza);
                for(let i=0;i<vissza.kep.length;i++){
                    if(vissza.kep[i].ImageNev!=null){
                        let div=document.createElement('div');
                        div.className="kartya";
                        let nev = vissza.kep[i].ImageNev;
                        div.id="kartya"+i;
                        div.onclick=function(){
                            megjelenit();
                        }
                        div.innerHTML="<img class='img1' id="+i+" src="+"kepek/"+nev+">"
                    
                        document.getElementById("contents").appendChild(div);
                        
                        let div1=document.createElement('div');
                        div1.className="kartyanev";
                        let nev1 = vissza.felhasznalonev[i].felhnev;
                        div1.id="kartyanev";

                        div1.innerHTML="Feltöltő: "+nev1
                        document.getElementById("kartya"+i).appendChild(div1);
                    }
                }
                
                
            },
            error: function(a,b){
                console.log(a.responseText);
            }
        })
}
    function nemtom(){
        alert("előbb jelentkezz be");
    }
    </script>
    
</body>
</html>