const body = document.querySelector("body"),
    sidebar = body.querySelector(".sidebar"),
    toggle = body.querySelector(".toggle"),
    modeSwitch = body.querySelector(".toggle-switch"),
    modeText = body.querySelector(".mode-text");
     
    toggle.addEventListener("click", ()=>{
        sidebar.classList.toggle("close");
    });


    modeSwitch.addEventListener("click", ()=>{
        body.classList.toggle("dark");

        if(body.classList.contains("dark")){
            modeText.innerText = "Mode sombre";

        }else{
            modeText.innerText = "Mode clair";
        }
    });

    function Popup(){
        document.getElementById("popup").classList.toggle("active");
     }
            document.querySelector(".popup .close-btn").addEventListener("click", function() {
                document.querySelector(".popup").classList.remove("active");
            });
